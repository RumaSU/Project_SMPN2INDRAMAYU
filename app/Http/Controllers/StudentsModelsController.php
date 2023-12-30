<?php

namespace App\Http\Controllers;

use App\Models\StudentsModels;
use App\Models\StudentsImagesModels;
use App\Models\StudentsSocmedModels;
use App\Models\ClassesModels;
use App\Models\ClassesImagesModels;
use App\Models\ClassesStudentsModels;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;


class StudentsModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($classGrade, $classTag, Request $request)
    {
        $idClass = $request->ic;
        $isClassFound = ClassesModels::where('class_grade', $classGrade)
            ->where('class_tag', $classTag)
            ->where('class_id', $idClass)
            ->exists();
        if($isClassFound) {
            $classData = ClassesModels::where('classes.class_id', $idClass)
                ->leftJoin('classes_images', 'classes_images.class_id', '=', 'classes.class_id')
                ->select(
                    'classes.class_grade',
                    'classes.class_tag',
                    'classes.year',
                    'classes_images.name_files', 
                )
                ->first();
            // $classImage = ClassesImagesModels::where('class_id', $idClass)->select('name_files')->first();
            $teacherClass = DB::table('teachers')
                ->join('teachers_images', 'teachers_images.teacher_id', '=', 'teachers.teacher_id')
                ->join('classes', 'classes.teacher_id', '=', 'teachers.teacher_id')
                ->where('classes.class_id', '=', $idClass)
                ->first();
            $teacherSocmed = DB::table('teachers_socmed')
                ->where('teacher_id', '=', $teacherClass->teacher_id)
                ->first();
                
            $listStudents = DB::table('students')
                ->join('students_images', 'students.student_id', '=', 'students_images.student_id')
                ->join('classes_students', 'classes_students.student_id', '=', 'students.student_id')
                ->where('classes_students.class_id', '=', $idClass)
                ->select('students.*', 'students_images.name_files')
                ->get();
            
            return view("pages.students.index", compact('classData','listStudents', 'teacherClass', 'teacherSocmed', 'classGrade', 'classTag', 'idClass'));
        } else {
            return redirect('/kelas');
        }
        // $listStudents = DB::table('students')
        //     ->join('students_images', 'students.student_id', '=', 'students_images.student_id')
        //     ->join('classes', 'classes.class_id', '=', 'classes_students.class_id')
        //     ->join('classes_students', 'classes_students.class_id', '=', 'classes.class_id')
        //     ->where('classes.class_id', '=', $idClass)
        //     ->get();
        // $teacherClass = DB::table('teachers')
        //     ->join('teachers_images', 'teachers_images.teacher_id', '=', 'teachers.teacher_id')
        //     ->join('classes', 'classes.teacher_id', '=', 'teachers.teacher_id')
        //     ->where('classes.class_id', '=', $idClass)
        //     ->first();
        // if($teacherClass){
        //     $teacherSocmed = DB::table('teachers_socmed')
        //         ->where('teacher_id', '=', $teacherClass->teacher_id)
        //         ->first();
        //     $listStudents = DB::table('classes')
        //         ->join('classes_students', 'classes_students.class_id', '=', 'classes.class_id')
        //         ->where('classes.class_id', '=', $idClass)
        //         ->select('classes_students.student_id')
        //         ->get();
            
        //     return view("pages.students.index", compact('listStudents', 'teacherClass', 'teacherSocmed', 'classGrade', 'classTag', 'idClass'));
        
        
        // return view("pages.students.index");
    }
    
    public function createTokenForm(Request $request) {
        $uuidToken = Uuid::uuid4()->toString();
        $tokenForm = $uuidToken . $request->gradeClass . $request->tagClass . $request->idClass;
        $md5Hash = md5(rand() . $tokenForm);
        
        $cacheKey = $request->gradeClass . $request->tagClass;
        
        // Menyimpan nilai dalam cache sebagai array yang bersarang
        $cachedData = Cache::get('tokenForFormStudent', []);
        // if(isset($cachedData[$cacheKey])) {
        //     unset($cachedData[$cacheKey]);
        // }
        
        $cachedData[$cacheKey] = $md5Hash;
        
        // Simpan nilai dalam cache
        Cache::put('tokenForFormStudent', $cachedData, now()->addMinutes(10)); // Simpan selama 60 menit
        return response()->json(['tokenForm' => $md5Hash]);
    }
    
    public function createTokenResetImage(Request $request) {
        $uuidToken = Uuid::uuid4()->toString();
        $tokenForm = $uuidToken . $request->gradeClass . $request->tagClass . $request->idStudent;
        $md5Hash = md5(rand() . $tokenForm);
        
        $cacheKey = 'img_' . $request->idStudent;
        
        // Menyimpan nilai dalam cache sebagai array yang bersarang
        $cachedData = Cache::get('tokenForFormStudent', []);
        // if(isset($cachedData[$cacheKey])) {
        //     unset($cachedData[$cacheKey]);
        // }
        
        $cachedData[$cacheKey] = $md5Hash;
        
        // Simpan nilai dalam cache
        Cache::put('tokenForFormStudent', $cachedData, now()->addMinutes(10)); // Simpan selama 60 menit
        return response()->json(['tokenImage' => $md5Hash]);
    }
    
    public function checkToken($keyToken, $requestToken) {
        // Mengambil data dari cache
        $cachedData = Cache::get('tokenForFormStudent', []);
    
        if (array_key_exists($keyToken, $cachedData)) {
            $savedToken = $cachedData[$keyToken];
    
            // Memeriksa apakah token yang disimpan cocok dengan yang diberikan
            if ($savedToken === $requestToken) {
                // Token cocok, lakukan tindakan yang diinginkan
                return true;
            }
        }
    
        // Jika tidak cocok atau tidak ada dalam cache
        return false;
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $classGrade, $classTag)
    {
        $keyToken = $classGrade . $classTag;
        $requestToken = $request->_tokenFormStudent;
        $isTokenValid = $this->checkToken($keyToken, $requestToken);
        
        if($isTokenValid) {
            $idClass = $request->ic;
            $checkClass = ClassesModels::where('class_id', $idClass)
                ->where('class_grade', $classGrade)
                ->where('class_tag', $classTag)
                ->first();
            if ($checkClass) {
                $validateNisName = $request->validate([
                    'nameFrmStudent' => 'required|string|max:255',
                    'nisFrmStudent' => 'required|string|max:255|unique:students,nis',
                ]);
                
                if($validateNisName) {
                    $studentId = Uuid::uuid4()->toString();;
                    $createStudent = StudentsModels::create([
                        'student_id' => $studentId,
                        'nis' => $request->nisFrmStudent, 
                        'name' => $request->nameFrmStudent, 
                        'status' => $checkClass->status,  
                        'year' => $checkClass->year,
                    ]);
                    
                    if($createStudent) {
                        $studentImageCreate = StudentsImagesModels::create(['student_id' => $studentId]);
                        $studentSocmedCreate = StudentsSocmedModels::create([
                            'student_id' => $studentId,
                        ]);
                        $validFile = $request->validate([
                            'imgFrmStudent' => 'nullable|image',
                        ]);
                        
                        if($validFile) {
                            if($request->hasFile('imgFrmStudent')) {
                                $image = $request->file('imgFrmStudent');
                                $imageName = $image->hashName(); // Menamai gambar
                                $image->storeAs('public/images/students/'. $imageName);
                                StudentsImagesModels::where('student_id', $studentId)->update([
                                    'name_files' => $imageName,
                                ]);
                            }
                        }
                        if($studentImageCreate && $studentSocmedCreate) {
                            $listSocmed = ["facebook", "twitter", "instagram", "tiktok", "youtube"];
                            foreach($listSocmed as $socmed) {
                                $this->validateSocmed($request, $socmed , $socmed.'-active', $socmed.'Link', $studentId);
                            }
                            
                            $linkClassWithStudent = ClassesStudentsModels::create([
                                'class_id' => $idClass, 
                                'student_id' => $studentId,
                            ]);
                            
                            if(!$linkClassWithStudent) {
                                $this->ifStoreFail($studentId);
                                return redirect()->back()->with('errorSomething', 'Something error when add student');
                            }
                            
                            return redirect()->back()->with('succedSomething', 'Success add student');
                        } else {
                            $this->ifStoreFail($studentId);
                            return redirect()->back()->with('errorSomething', 'Something error when add student');
                        }
                    } else {
                        $this->ifStoreFail($studentId);
                        return redirect()->back()->with('errorSomething', 'Something error when add student');
                    }
                } else {
                    return redirect()->back()->with('errorSomething', 'Something error when add student');
                }
            } else {
                return redirect()->back()->with('errorSomething', 'Something error when add student');
            }
        } else {
            return redirect()->back()->with('errorSomething', 'Something error when add student');
        }
    }
    
    public function validateSocmed($request, $socmed, $nameActive, $nameLink, $studentId) {
        $active = $request->input($nameActive);
        $link = $request->input($nameLink);

        // Jika input active tidak sesuai string "active" atau null, set menjadi null
        if ($active !== "active" && $active !== null) {
            $active = null;
        }

        // Jika input link bukan string atau null, atur link menjadi null
        if (!is_string($link) && $link !== null) {
            $link = null;
        }

        // Lakukan validasi ulang terhadap variabel yang sudah diubah
        $validSocmed = Validator::make([
            $nameActive => $active,
            $nameLink => $link,
        ], [
            $nameActive => 'string|nullable',
            $nameLink => 'string|nullable',
        ]);

        if ($validSocmed->passes()) {
            // Melakukan validasi sukses, lakukan update jika nilai berubah
            if ($active === "active") {
                
                $linkSocmed = $this->validateSocialMediaLink($link, $socmed);
                $isLinkSocmedSame = StudentsSocmedModels::where('student_id', $studentId)->where($socmed, $linkSocmed)->value($socmed);
                if ($linkSocmed != $isLinkSocmedSame) {
                // if ($linkSocmed) {
                    StudentsSocmedModels::where("student_id", $studentId)
                        ->update([
                            $socmed => $linkSocmed,
                        ]);
                }
            }
        }
    }
    
    function validateSocialMediaLink($link, $socmed) {
        // check https:// di awal
        if (strpos($link, 'https://') === 0) {
            // Jika tidak ditemukan $socmed .com setelah https://
            if (strpos($link, $socmed . '.com') === false) {
                // Tambahkan $socmed .com setelah https://
                return str_replace('https://', 'https://' . $socmed . '.com/', $link);
            }
        } else {
            // Jika tidak ada https:// di awal URL
            // Cek jika $socmed .com/namanya ditemukan
            if (strpos($link, $socmed . '.com/') !== false) {
                // Tambahkan https:// di awal jika hanya ada $socmed .com/namanya
                return 'https://' . $link;
            } else {
                // Jika tidak ditemukan https:// dan $socmed .com, tambahkan keduanya
                return 'https://'. $socmed .'.com/' . $link;
            }
        }
        return $link;
    }
    
    public function ifStoreFail($studentId) {
        StudentsModels::where('student_id', $studentId)->delete();
        ClassesStudentsModels::where('student_id', $studentId)->delete();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $stdId = $request->studentId;
        $existsStudents = StudentsModels::where('student_id', $stdId)->exists();
        if($existsStudents) {
            $selectStudent = DB::table('students')
                ->leftJoin('students_images', 'students_images.student_id', '=', 'students.student_id')
                ->leftJoin('students_socmed', 'students_socmed.student_id', '=', 'students.student_id')
                ->select(
                    'students.student_id',
                    'students.name',
                    'students.nis',
                    'students_images.name_files', 
                    'students_socmed.facebook', 
                    'students_socmed.instagram', 
                    'students_socmed.twitter', 
                    'students_socmed.tiktok', 
                    'students_socmed.youtube')
                ->where('students.student_id', '=', $stdId)
                ->first();
            if ($selectStudent) {
                return response()->json($selectStudent);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $classGrade, $classTag)
    {
        $keyToken = $classGrade . $classTag;
        $requestToken = $request->_tokenFormStudent;
        $isTokenValid = $this->checkToken($keyToken, $requestToken);
        
        if($isTokenValid) {
            $idStudent = $request->si;
            $checkStudent = StudentsModels::where('student_id', $idStudent)->first();
            if ($checkStudent) {
                $validInput = Validator::make([
                    'nameFrmStudent' => $request->nameFrmStudent,
                    'nisFrmStudent' => $request->nisFrmStudent,
                ], [
                    'nameFrmStudent' => 'required|string|max:255',
                    'nisFrmStudent' => 'required|string|max:255',
                ]);
                // $validInput = $request->validate([
                //     'nameFrmStudent' => 'required|string|max:255',
                //     'nisFrmStudent' => 'required|string|max:255',
                // ]);
                if($validInput->passes()) {
                    $arrColumnStudent = ['name', 'nis'];
                    $arrReqInpSt = ['nameFrmStudent', 'nisFrmStudent'];
                    foreach($arrColumnStudent as $idx => $column) {
                        $existingData = StudentsModels::where('student_id', $idStudent)->value($column);
                        $input = $request->input($arrReqInpSt[$idx]);
                        if($existingData !== $input) {
                            StudentsModels::where('student_id',$idStudent)
                                ->update([
                                    $column => $input,
                                ]);
                        }
                    }
                    
                    $listSocmed = ["facebook", "twitter", "instagram", "tiktok", "youtube"];
                    foreach($listSocmed as $socmed) {
                        $this->validateSocmed($request, $socmed , $socmed.'-active', $socmed.'Link', $idStudent);
                    }
                    
                    
                    $nameFileInDatabase = StudentsImagesModels::where('student_id', $idStudent)->value('name_files');
                    if ($request->_tokenResetImage) {
                        $keyToken = 'img_' . $idStudent;
                        $requestToken = $request->_tokenResetImage;
                        
                        $isTokenValid = $this->checkToken($keyToken, $requestToken);
                        if($isTokenValid){
                            if($nameFileInDatabase !== 'siswa.png') {
                                $deleteImage = $this->deleteImage($nameFileInDatabase);
                                if($deleteImage) {
                                    StudentsImagesModels::where('student_id', $idStudent)
                                        ->update([
                                            'name_files' => 'siswa.png',
                                        ]);
                                }
                            }
                        }
                    } else {
                        if ($request->hasFile('imgFrmStudent')) {
                            $this->storeImage($request->file('imgFrmStudent'), $idStudent);
                        }
                    }
                    
                    return redirect()->back()->with('updateSomething', 'Update succed');
                    
                } 
                else {
                    return redirect()->back()->with('errorSomething', 'Something error when add student');                
                }
            } else {
                return redirect()->back()->with('errorSomething', 'Something error when add student');
            }
        } else {
            return redirect()->back()->with('errorSomething', 'Something error when add student');
        }
    }
    
    function storeImage($image, $studentId) {
        $imageName = $image->hashName();
        $storeImage = $image->storeAs('public/images/students/'. $imageName);
        if($storeImage) {
            StudentsImagesModels::where('student_id', $studentId)->update([
                'name_files' => $imageName,
            ]);
            return true;
        }
        return false;
    }
    
    public function deleteImage($nameFiles) {
        $filePath = 'public/images/students/' . $nameFiles;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return true; // Penghapusan berhasil
        }
        return false; // Penghapusan gagal
    }
    
    
    public function getDataStudent(Request $request) {
        $studentId = $request->studentId;
        $checkStudent = StudentsModels::where('student_id', $studentId)->exists();
        if ($checkStudent) {
            $studentClass = ClassesStudentsModels::where('classes_students.student_id', $studentId)
                ->leftJoin('classes', 'classes.class_id', '=', 'classes_students.class_id')
                ->select(
                    'classes.class_id',
                    'classes.class_grade',
                    'classes.class_tag',
                    'classes.year',
                )
                ->first();
            $dataStudent = StudentsModels::where('students.student_id', $studentId)
                ->leftJoin('students_images', 'students_images.student_id', '=', 'students.student_id')
                ->select(
                    'students.name',
                    'students.nis',
                    'students_images.name_files',
                )
                ->first();
            $socmedStudent = StudentsSocmedModels::where('student_id', $studentId)
            ->select(
                'facebook',
                'instagram',
                'twitter',
                'tiktok',
                'youtube',
            )
            ->first();
            
            return response()->json([
                'whatClass' => $studentClass,
                'dataStudent' => $dataStudent,
                'socmedStudent' => $socmedStudent,
            ]);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentsModels $studentsModels)
    {
        //
    }
}
