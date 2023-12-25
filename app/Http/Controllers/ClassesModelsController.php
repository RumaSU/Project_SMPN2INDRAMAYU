<?php

namespace App\Http\Controllers;

use App\Models\ClassesModels;
use App\Models\ClassesImagesModels;
use App\Models\ClassesStudentsModels;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

use function Laravel\Prompts\select;

class ClassesModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classGrade = ['VII', 'VIII', 'IX'];
        $latestYears = $this->getLatestYearClass($classGrade);
        $tempClassVII = DB::table("classes")
            ->leftJoin('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
            ->where('classes.class_grade', 'VII')
            ->where('classes.status', 'Aktif')
            ->where('classes.year', $latestYears[0])
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();
        $tempClassVIII = DB::table("classes")
            ->leftJoin('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
            ->where('classes.class_grade', 'VIII')
            ->where('classes.status', 'Aktif')
            ->where('classes.year', $latestYears[1])
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();
        $tempClassIX = DB::table("classes")
            ->leftJoin('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
            ->where('classes.class_grade', 'IX')
            ->where('classes.status', 'Aktif')
            ->where('classes.year', $latestYears[2])
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();

        return view("pages.classes.index", compact("tempClassVII", "tempClassVIII", "tempClassIX"));
    }
    
    public function getListClass()
    {
        $tempClass = DB::table("classes")
            ->leftJoin('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();

        return view("pages.classes.index", compact("tempClass"));
    }
    
    public function listTeacher($year) {
        $nowRoute = $this->checkRoute();
        $listTeacher = DB::table('teachers')
            // ->leftJoin('classes', 'teachers.teacher_id', '=', 'classes.teacher_id')
            ->leftJoin('classes', function($join) use ($year) {
                $join->on('teachers.teacher_id', '=', 'classes.teacher_id')
                        ->where('classes.year', '=', $year);
            })
            ->where(function($query) {
                $query->whereNull('classes.teacher_id')
                    ->orWhere(function($subQuery) {
                        $subQuery->where('classes.status', '=', 'Alumni')
                            ->orWhere('classes.status', '=', 'Tidak Aktif');
                    });
            })
            ->where('teachers.status', '=', 'Aktif')
            ->where('teachers.type', '=', 'Pendidik')
            ->select('teachers.teacher_id', 'teachers.name')
            ->distinct()
            ->get();
        
        if($nowRoute == 'Ajax') {
            return response()->json($listTeacher);
        } else {
            return $listTeacher;
        }
    }
    
    public function listTeacherOnInput(Request $request) {
        $listTeacher = DB::table('teachers')
            ->leftJoin('classes', function($join) use ($request) {
                $join->on('teachers.teacher_id', '=', 'classes.teacher_id')
                        ->where('classes.year', '=', $request->yearInput);
            })
            ->where(function($query) {
                $query->whereNull('classes.teacher_id')
                    ->orWhere(function($subQuery) {
                        $subQuery->where('classes.status', '=', 'Alumni')
                            ->orWhere('classes.status', '=', 'Tidak Aktif');
                    });
            })
            ->where('teachers.status', '=', 'Aktif')
            ->where('teachers.type', '=', 'Pendidik')
            ->select('teachers.teacher_id', 'teachers.name')
            ->distinct()
            ->get();
        
        return response()->json($listTeacher);
    }
    
    public function teacherImage(Request $request){
        $nameFiles = TeachersImagesModels::where('teacher_id', $request->teacherId)
            ->select('name_files')
            ->first();
            // ->value('name_files');
        // if($request->teacherId){
        //     $nameFiles = DB::table('teachers_images')
        //         ->where('teacher_id', $request->teacherId)
        //         ->select('name_files')
        //         ->first();
        //     if($nameFiles) {
        //         return response()->json($nameFiles);            
        //     } else {
        //         return response()->json(['error' => 'Gambar tidak ditemukan'], 404);
        //     }
        // }
        // $nameFiles = DB::table('teachers_images')
        //     ->select('name_files')
        //     ->where('teacher_id', '=' ,$request->teacherId)
        //     ->first();
        // return response()->json($nameFiles);
        return response()->json($nameFiles);
    }
    
    public function tagClass(Request $request) {
        $latestClass = ClassesModels::select('class_tag')
            ->where('class_grade', $request->classGrade)
            ->where('year', $request->classYear)
            ->orderBy('created_at', 'desc')
            ->first();
        $countTag = ClassesModels::select('class_tag')
            ->where('class_grade', $request->classGrade)
            ->where('year', $request->classYear)
            ->count();
        return response()->json([
            'latestTag' => $latestClass,
            'countTag' => $countTag,
        ]);
    }
    
    public function getDataClass(Request $request) {
        $dataClass = DB::table('classes')
            ->leftJoin('classes_images', 'classes_images.class_id', '=', 'classes.class_id')
            ->where('classes.class_id', '=', $request->class_id)
            ->first();
        // $dataClass = ClassesModels::where('class_id', $request->class_id)->first();
        if($dataClass){
            $dataTeacher = DB::table('teachers')
                ->leftJoin('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
                ->where('teachers.teacher_id', '=', $dataClass->teacher_id)
                ->select('teachers.teacher_id', 'teachers.name', 'teachers_images.name_files')
                ->first();
            $listTeacherEdit = DB::table('teachers')
                ->leftJoin('classes', 'teachers.teacher_id', '=', 'classes.teacher_id')
                ->where(function($query) {
                    $query->whereNull('classes.teacher_id')
                        ->orWhere(function($subQuery) {
                            $subQuery->where('classes.status', '=', 'Alumni')
                                ->orWhere('classes.status', '=', 'Tidak Aktif');
                        });
                })
                ->where('teachers.status', '=', 'Aktif')
                ->where('teachers.type', '=', 'Pendidik')
                ->where('teachers.teacher_id', '!=', $dataClass->teacher_id)
                ->select('teachers.teacher_id', 'teachers.name')
                ->distinct()
                ->get();
                
            return response()->json([
                'dataClass' => $dataClass, 
                'dataTeacher' => $dataTeacher, 
                'listEdit' => $listTeacherEdit,
            ]);
        } else {
            return response()->json();
        }
    }
    
    public function getLatestYearClass($classGrade) {
        $latestYear = [];
        foreach($classGrade as $grade){
            $getYear = ClassesModels::where('class_grade', $grade)
            ->where('status', '=', 'Aktif')
            ->select('year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->value('year');
            
            $latestYear[] = $getYear;
        }
        return $latestYear;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $listTeacher = $this->listTeacher($request->classYear)->pluck('teacher_id')->toArray();
        $currentYear = Date('Y');
        $validateRequest = $request->validate([
            'teacherList' => ['required', Rule::in($listTeacher)],
            'chooseClass' => 'required|in:VII,VIII,IX',
            'tagClass' => 'required|string',
            'classYear' => 'required|numeric|min:1900|max:' . $currentYear,
            'descClass' => 'nullable|string',
        ]);
        if($validateRequest) {
            $checkTeacher = $this->checkTeacher($request->teacherList);
            if(!$checkTeacher){
                $classId = Uuid::uuid4()->toString();
                $classCreate = ClassesModels::create([
                    'class_id' => $classId,
                    'teacher_id' => $request->teacherList,
                    'class_grade' => $request->chooseClass,
                    'class_tag' => $request->tagClass,
                    'description' => $request->descClass,
                    'status' => 'Aktif',
                    'is_published' => true,
                    'year' => $request->classYear,
                ]);
                if($classCreate) {
                    $classImageCreate = ClassesImagesModels::create(['class_id' => $classId]);
                    $validFile = $request->validate([
                        'imgClass' => 'nullable|image',
                    ]);
                    if($validFile) {
                        if($request->hasFile('imgClass')) {
                            $image = $request->file('imgClass');
                            $imageName = $image->hashName(); // Menamai gambar
                            $image->storeAs('public/images/classes/'. $imageName);
                            $image->move(public_path('media'), $imageName);
                            ClassesImagesModels::where('class_id', $classId)->update([
                                'name_files' => $imageName,
                            ]);
                        }
                    }
                    if($classImageCreate) {
                        return redirect('/kelas')->with('successAdd', 'Success add ' . $classCreate->class_grade . ' ' . $classCreate->class_tag);
                    } else {
                        ClassesModels::where('class_id', $classId)->delete();
                        return redirect('/kelas')->with('errorSomething', 'Error add ' . $classCreate->class_grade . ' ' . $classCreate->class_tag);
                    }
                } else {
                    return redirect('/kelas')->with('errorSomething', 'Error add ' . $classCreate->class_grade . ' ' . $classCreate->class_tag);
                }
            } else {
                return redirect('/kelas')->with('errorSomething', 'Error add ' . $request->chooseClass . ' ' . $request->tagClass);
            }
        }
    }
    
    public function checkTeacher($teacher_id){
        $checkTeacher = DB::table('teachers')
            ->join('classes', 'teachers.teacher_id', '=', 'classes.teacher_id')
            ->where('classes.status', '=', 'Tidak Aktif')
            ->where('classes.status', '=', 'Alumni')
            ->where('teachers.teacher_id', '=', $teacher_id)
            ->first();
        return $checkTeacher;
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassesModels $classesModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassesModels $classesModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $findClass = ClassesModels::where('class_id', $request->ic)->first();
        if ($findClass) {
            $classId = $findClass->class_id;
            $temporaryData = $this->storeDataTemp($classId);
            $foundTeacherId = TeachersModels::where('teacher_id', $findClass->teacher_id)->first();
            if ($foundTeacherId) {
                $listTeacher = $this->isTeacherValid($findClass->teacher_id, $classId)->pluck('teacher_id')->toArray();
                $currentYear = Date('Y');
                $validateRequest = $request->validate([
                    'teacherList' => ['required', Rule::in($listTeacher)],
                    'chooseClass' => 'required|in:VII,VIII,IX',
                    'tagClass' => 'required|string',
                    'classYear' => 'required|numeric|min:1900|max:' . $currentYear,
                    'descClass' => 'nullable|string',
                ]);
                if($validateRequest){
                    $columnClasses  = ['teacher_id', 'class_grade', 'class_tag', 'description', 'year'];
                    $requestClasses = ['teacherList', 'chooseClass', 'tagClass', 'descClass', 'classYear'];
                    foreach($columnClasses as $idx => $column) {
                        if ($request->input($requestClasses[$idx]) != ClassesModels::where('class_id', $classId)->where($column, $request->input($requestClasses[$idx]))->exists()) {
                            ClassesModels::where('class_id', $classId)
                                ->update([
                                    $column => $request->input($requestClasses[$idx]),
                                ]);
                        }
                    }
                    if(!empty($request->imgClass)) {
                        $validFile = $request->validate([
                            'imgClass' => 'image',
                        ]);
                        if($validFile && $request->hasFile('imgClass')){
                            $nameFileDatabase = ClassesImagesModels::select('name_files')->where('class_id', '=' , $classId)->first();
                            if($nameFileDatabase == 'default.png') {
                                $succedStore = $this->storeImage($request->file('imgClass'), $classId);
                                if (!$succedStore) {
                                    $this->rollbackData($temporaryData, $classId);
                                    return redirect()->back()->with('errorSomething', 'Image not store');
                                }
                            }
                            else {
                                $deleteImage = Storage::delete('public/images/classes/' . $nameFileDatabase);
                                if($deleteImage) {
                                    $succedStore = $this->storeImage($request->file('imgClass'), $classId);
                                    if (!$succedStore) {
                                        $this->rollbackData($temporaryData, $classId);
                                        return redirect()->back()->with('errorSomething', 'Image not store');
                                    }
                                } else {
                                    $this->rollbackData($temporaryData, $classId);
                                    return redirect()->back()->with('errorSomething', 'Path not found');
                                }
                            }
                        } else {
                            $this->rollbackData($temporaryData, $classId);
                            return redirect()->back()->with('errorSomething', 'Image invalid');
                        }
                    }
                    echo "request is valid <br>";
                    $columnClasses  = ['teacher_id', 'class_grade', 'class_tag', 'description', 'year'];
                    $requestClasses = ['teacherList', 'chooseClass', 'tagClass', 'descClass', 'classYear'];
                    foreach($columnClasses as $idx => $column) {
                        $valueModel =  ClassesModels::where('class_id', $classId)->first();
                        if ($valueModel) {
                            echo "Request = " . $request->input($requestClasses[$idx]) . "<br>";
                            echo "Value Model = " . $valueModel->$column . "<br><br>";
                        } else {
                            echo "No data found for class_id = $classId . <br>";
                        }
                    }
                    return redirect()->back()->with('updateSomething', 'Data now update');
                }
                else {
                    $this->rollbackData($temporaryData, $classId);
                    return redirect()->back()->with('errorSomething', 'request is invalid');
                }
            }
            else {
                $this->rollbackData($temporaryData, $classId);
                return redirect()->back()->with('errorSomething', 'request is invalid');
            }
        } else {
            return redirect()->back()->with('errorSomething', 'request is invalid');
        }
        
    }
    
    public function isTeacherValid($teacherId, $classId) {
        $listTeacher = DB::table('teachers')
            ->leftJoin('classes', function($join) use ($teacherId) {
                $join->on('teachers.teacher_id', '=', 'classes.teacher_id')
                    ->where(function($query) use ($teacherId) {
                        $query->whereNull('classes.teacher_id') // Guru belum terdaftar sebagai wali kelas
                            ->orWhere('classes.status', '=', 'Alumni') // Kelas dengan status "Alumni"
                            ->orWhere('classes.teacher_id', '!=', $teacherId); // Guru yang bukan $teacherId
                    });
            })
            ->where('teachers.type', '=', 'Pendidik')
            ->select('teachers.teacher_id')
            ->get();
        return $listTeacher;
    }
    
    
    function storeImage($image, $class_id) {
        $imageName = $image->hashName();
        $storeImage = $image->storeAs('public/images/classes/'. $imageName);
        if($storeImage) {
            ClassesImagesModels::where('class_id', $class_id)->update([
                'name_files' => $imageName,
            ]);
            return true;
        }
        return false;
    }
    
    function storeDataTemp($classId) {
        $classDataTemp = ClassesModels::where('class_id', $classId)->first();
        $classImageTemp = ClassesImagesModels::where('class_id', $classId)->first();
        
        return [$classDataTemp, $classImageTemp];
    }
    
    function rollbackData($dataBefore, $class_id) {
        ClassesModels::where('class_id', $class_id)->update([
            'teacher_id' => $dataBefore[0]->teacher_id,
            'class_grade' => $dataBefore[0]->class_grade,
            'class_tag' => $dataBefore[0]->class_tag,
            'description' => $dataBefore[0]->description,
            'status' => $dataBefore[0]->status,
            'is_published' => $dataBefore[0]->is_published,
            'year' => $dataBefore[0]->year,
            'updated_at' => $dataBefore[0]->updated_at,
        ]);
        ClassesImagesModels::where('class_id', $class_id)->update([
            'name_files' => $dataBefore[1]->name_files,
            'updated_at' => $dataBefore[1]->updated_at,
        ]);
    }
    
    function storeFail($teacherId) {
        ClassesModels::findOrFail($teacherId)->delete();
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function listStudentWhenDelete(Request $request) {
        //
    }
    
    public function destroy(Request $request)
    {
        $isIdTrue = $request->validate([
            'classId' => 'required',
        ]);
        if ($isIdTrue) {
            $classes = ClassesModels::where('class_id', $request->classId)
                ->firstOrFail();
            if ($classes) {
                $isStudent = $this->isStudentsOnThere($classes->class_id);
                if($isStudent === NULL) {
                    // $image = ClassesImagesModels::where('class_id', $classes->class_id)->first();
                    $image = ClassesImagesModels::where('class_id', $classes->class_id)->first();
                    if ($image && $image->name_files != 'default.png') {
                        $this->deleteImage($image->name_files);
                    }
                    $classes->delete();
                    $nowData = DB::table('classes')->where('status', '=', 'Aktif')->count('class_id');
                    return response()->json(['succedSomething' => 'Data berhasil dihapus', 'nowData' => $nowData], 200);
                } else {
                    $nowData = DB::table('classes')->where('status', '=', 'Aktif')->count('class_id');
                    $this->ifStudentsOnThere($classes->class_id);
                    return response()->json(['succedSomething' => 'Data berhasil disembunyikan', 'nowData' => $nowData], 200);
                }
            }
    
            return response()->json(['errorSomething' => 'Data tidak ditemukan'], 400);
        } else {
            return response()->json(['errorSomething' => 'Data tidak ditemukan'], 400);
        }
    }
    
    public function isStudentsOnThere($class_id) {
        $searchIsStudentInThere = ClassesStudentsModels::where('class_id', $class_id)->first();
        return $searchIsStudentInThere;
    }
    
    public function ifStudentsOnThere($class_id) {
        ClassesModels::where('class_id', $class_id)
            ->update([ 
                'status' => 'Tidak Aktif', 
            ]);
        return;
    }
    
    public function deleteImage($nameFiles) {
        $filePath = 'public/images/classes/' . $nameFiles;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return true; // Penghapusan berhasil
        }
        return false; // Penghapusan gagal
    }
    
    public function checkRoute() {
        $routeFrom = Route::current()->uri();
        $splitRoute = explode('/', $routeFrom);
        if ($splitRoute[0] == 'kelas') {
            return "Controller";
        } else if ($splitRoute[1] == 'pendidik' || $splitRoute[1] == 'tag') {
            return "Ajax";
        }
        
        return "Error";
    }
}
