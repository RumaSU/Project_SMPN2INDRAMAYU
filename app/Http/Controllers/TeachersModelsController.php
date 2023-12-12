<?php

namespace App\Http\Controllers;

use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Uuid;


class TeachersModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nowRoute = $this->checkRoute();
        if ($nowRoute != 'Unknown') {
            $listTeachers = DB::table('teachers')
                ->select(
                    'teachers.teacher_id',
                    'teachers.name',
                    'teachers_images.name_files'
                )
                ->join('teachers_images', 'teachers_images.teacher_id', '=', 'teachers.teacher_id')
                ->where('teachers.status' , '=', $nowRoute)
                ->orderBy('teachers.name', 'asc')
                ->get();
            
            if($nowRoute == 'Pendidik') {
                return view("pages.teachersMain.teachers.index", compact('listTeachers'));                
            } else if($nowRoute == 'Tenaga Kependidikan') {
                return view("pages.teachersMain.tenpendidik.index", compact('listTeachers'));                
            }
        }
        return redirect('/');
    }
    
    public function getCount() {
        $nowRoute = $this->checkRoute();
        $countTeachers = DB::table('teachers')->where('status', '=', $nowRoute)->count('teacher_id');
        
        return response()->json($countTeachers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nowRoute = $this->checkRoute();
        if ($nowRoute != 'Unknown') {
            $request_validate = $request->validate([
                'nameTeachers' => 'required|string',
                'nipTeachers' => 'required|string',
                'emailsAccount' => 'nullable|email',
                'bidangTeachers' => 'required|string',
                'yearsSignTeachers' => 'required|date',
            ]);
            if($request_validate){
                $teachersId = Uuid::uuid4()->toString();
                $searchNIP = TeachersModels::where('nip', $request->nipTeachers)->exists();
                if(!$searchNIP) {
                    $storeTeachers = TeachersModels::create([
                        'teacher_id' => $teachersId,
                        'nip' => $request->nipTeachers,
                        'name' => $request->nameTeachers,
                        'status' => $nowRoute,
                        'sector' => $request->bidangTeachers,
                        'email' => $request->emailsAccount,
                        'years_sign' => $request->yearsSignTeachers,
                    ]);
                    if ($storeTeachers){
                        $storeTeachersImage = TeachersImagesModels::create([
                            'teacher_id' => $teachersId,
                        ]);
                        $storeTeacherSocmed = TeachersSocmedModels::create([
                            'teacher_id' => $teachersId,
                        ]);
                        $validFile = $request->validate([
                            'imageTeachers' => 'nullable|image',
                        ]);
                        if($validFile){ 
                            if($request->hasFile('imageTeachers')) {
                                $image = $request->file('imageTeachers');
                                $imageName = $image->hashName(); // Menamai gambar
                                $image->storeAs('public/images/teachers/'. $imageName);
                                $image->move(public_path('media'), $imageName);
                                TeachersImagesModels::where('teacher_id', $teachersId)->update([
                                    'name_files' => $imageName,
                                ]);
                            }
                        }
                        if($storeTeachersImage && $storeTeacherSocmed) {
                            $listSocmed = ["facebook", "twitter", "instagram", "tiktok", "youtube"];
                            foreach($listSocmed as $socmed) {
                                $this->validateSocmed($request, $socmed , $socmed.'-active', $socmed.'Link', $teachersId);
                            }
                            if($nowRoute == 'Pendidik') {
                                return redirect('/pendidik')->with('succedSomething', 'Data now added');
                            } else if($nowRoute == 'Tenaga Kependidikan') {
                                return redirect('/tenpendidik')->with('succedSomething', 'Data now added');
                            }
                        }
                        $this->storeFail($storeTeachers->teacher_id);
                        return redirect()->back()->with('errorSomething', 'This is invalid');
                    }
                    $this->storeFail($storeTeachers->teacher_id);
                    return redirect()->back()->with('errorSomething', 'This is invalid');
                }
                return redirect()->back()->with('errorSomething', 'This is invalid');
            }
            return redirect()->back()->with('errorSomething', 'This is invalid');
        }
        echo "URl saat ini bukan tenaga kependidikan";
        // return redirect('/');
    }
    
    public function validateSocmed($request, $socmed, $nameActive, $nameLink, $teacherID) {
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
                // Lakukan pengecekan dan update jika ada perubahan pada link
                $linkSocmed = (str_contains($link, "https://") || str_contains($link, "http://")) ? $link : "https://" . $link;
                if ($linkSocmed != TeachersSocmedModels::where('teacher_id', $teacherID)->where($socmed, $linkSocmed)->exists()) {
                    TeachersSocmedModels::where("teacher_id", $teacherID)
                        ->update([
                            $socmed => $linkSocmed,
                        ]);
                }
            }
        }
    }
    
    public function show($teacherName, $teacherId)
    {
        $popupData = DB::table('teachers')
            ->select(
                'teachers.teacher_id', 'teachers.name', 'teachers.nip', 'teachers.status', 'teachers.sector', 'teachers.email', 'teachers.years_sign',
                'teachers_images.name_files',
                'teachers_socmed.facebook', 'teachers_socmed.instagram', 'teachers_socmed.twitter', 'teachers_socmed.tiktok', 'teachers_socmed.youtube',
                )
            ->join('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
            ->join('teachers_socmed', 'teachers.teacher_id', '=', 'teachers_socmed.teacher_id')
            ->where('teachers.teacher_id', '=', $teacherId)
            ->where('teachers.name', '=', $teacherName)
            ->first();
        // return view('pages.teachers.index', compact('popupData'));
        return response()->json($popupData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachersModels $teachersModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $teacherName, $teacherId)
    {
        // $values = array_map('is_string', $request->except('imageTeachers'));
        // if (in_array(false, $values, true)) {
        //     return redirect()->back()->with('errorSomething', 'Request data is invalid ');
        // }
        
        $nowRoute = $this->checkRoute();
        if($nowRoute != 'Unknown') {
            $foundTeacherId = DB::table('teachers')
                ->select('teacher_id')
                ->where('teacher_id', '=', $teacherId)
                ->where('name', '=', $teacherName)
                ->first();
            $temporaryData = $this->storeDataTemp($teacherId, $teacherName);
            if ($foundTeacherId) {
                $request_validate = $request->validate([
                    'nameTeachers' => 'required|string',
                    'nipTeachers' => 'required|string',
                    'emailsAccount' => 'nullable|email',
                    'bidangTeachers' => 'required|string',
                    'yearsSignTeachers' => 'required|date',
                ]);
                if($request_validate){                
                    $searchNIP = TeachersModels::where('nip', $request->nipTeachers)->where('teacher_id', '!=', $foundTeacherId->teacher_id)->exists();
                    if(!$searchNIP) {
                        $columnTeachers  = ['nip', 'name', 'sector', 'email', 'years_sign'];
                        $requestTeachers = ['nipTeachers', 'nameTeachers', 'bidangTeachers', 'emailsAccount', 'years_sign'];
                        foreach($columnTeachers as $idx => $column) {
                            if ($request->input($requestTeachers[$idx]) != TeachersModels::where($column, $request->input($requestTeachers[$idx]))->where('teacher_id', $teacherId)->exists()) {
                                TeachersModels::where('teacher_id', $teacherId)
                                    ->update([
                                        $column => $request->input($requestTeachers[$idx]),
                                    ]);
                            }
                        }
                        if(!empty($request->imageTeachers)) {
                            $validFile = $request->validate([
                                'imageTeachers' => 'image',
                            ]);
                            if($validFile){ 
                                // $nameFileDatabase = DB::table('teachers_images')->where('teacher_id', '=', $foundTeacherId->teacher_id)->first();
                                $nameFileDatabase = TeachersImagesModels::select('name_files')->where('teacher_id', '=' ,$foundTeacherId->teacher_id)->first();
                                if($nameFileDatabase == 'default.png') {
                                    if($request->hasFile('imageTeachers')) {
                                        $succedStore = $this->storeImage($request->file('imageTeachers'), $teacherId);
                                        if (!$succedStore) {
                                            $this->rollbackData($temporaryData, $teacherId);
                                            return redirect()->back()->with('errorSomething', 'Image not store');
                                        }
                                    } else {
                                        $this->rollbackData($temporaryData, $teacherId);
                                        return redirect()->back()->with('errorSomething', 'Image not found');
                                    }
                                }
                                else {
                                    $deleteImage = Storage::delete('public/images/teachers/' . $nameFileDatabase);
                                    if($deleteImage) {
                                        if($request->hasFile('imageTeachers')) {
                                            $succedStore = $this->storeImage($request->file('imageTeachers'), $teacherId);
                                            if (!$succedStore) {
                                                $this->rollbackData($temporaryData, $teacherId);
                                                return redirect()->back()->with('errorSomething', 'Image not store');
                                            }
                                        }
                                        else {
                                            $this->rollbackData($temporaryData, $teacherId);
                                            return redirect()->back()->with('errorSomething', 'Image not found');
                                        }
                                    } else {
                                        $this->rollbackData($temporaryData, $teacherId);
                                        return redirect()->back()->with('errorSomething', 'Path not found');
                                    }
                                }
                            }
                        }
                        
                        if($searchNIP) {
                            $listSocmed = ["facebook", "twitter", "instagram", "tiktok", "youtube"];
                            foreach($listSocmed as $socmed) {
                                $this->validateSocmed($request, $socmed , $socmed.'-active', $socmed.'Link', $foundTeacherId->teacher_id);
                            }
                        }
                        return redirect()->back()->with('updateSomething', 'Data now update');
                    }
                    else {
                        $this->rollbackData($temporaryData, $teacherId);
                        return redirect()->back()->with('errorSomething', 'request is invalid after check nip');
                    }
                }
                else {
                    $this->rollbackData($temporaryData, $teacherId);
                    return redirect()->back()->with('errorSomething', 'request is invalid after request validate');
                }
            }
            else {
                $this->rollbackData($temporaryData, $teacherId);
                return redirect()->back()->with('errorSomething', 'request is invalid after select id');
            }
        }
        return redirect()->back()->with('errorSomething', 'request is invalid root');
    }
    
    function storeImage($image, $teachersId) {
        $imageName = $image->hashName();
        $storeImage = $image->storeAs('public/images/teachers/'. $imageName);
        if($storeImage) {
            TeachersImagesModels::where('teacher_id', $teachersId)->update([
                'name_files' => $imageName,
            ]);
            return true;
        }
        return false;
    }
    
    function storeDataTemp($teacherId, $teacherName) {
        $teacherDataTemp = TeachersModels::where('teacher_id', $teacherId)->where('name', $teacherName)->first();
        $teacherImageTemp = TeachersImagesModels::where('teacher_id', $teacherId)->first();
        $teacherSocmedTemp = TeachersSocmedModels::where('teacher_id', $teacherId)->first();
        
        return [$teacherDataTemp, $teacherImageTemp, $teacherSocmedTemp];
    }
    
    function rollbackData($dataBefore, $teacherId) {
        TeachersModels::where('teacher_id', $teacherId)->update([
            'name' => $dataBefore[0]->name,
            'nip' => $dataBefore[0]->nip,
            'status' => $dataBefore[0]->status,
            'sector' => $dataBefore[0]->sector,
            'email' => $dataBefore[0]->email,
            'years_sign' => $dataBefore[0]->years_sign,
            'updated_at' => $dataBefore[0]->updated_at,
        ]);
        TeachersImagesModels::where('teacher_id', $teacherId)->update([
            'name_files' => $dataBefore[1]->name_files,
            'updated_at' => $dataBefore[1]->updated_at,
        ]);
        TeachersSocmedModels::where('teacher_id', $teacherId)->update([
            'facebook' => $dataBefore[2]->facebook,
            'instagram' => $dataBefore[2]->instagram,
            'twitter' => $dataBefore[2]->twitter,
            'tiktok' => $dataBefore[2]->tiktok,
            'youtube' => $dataBefore[2]->youtube,
            'updated_at' => $dataBefore[2]->updated_at,
        ]);
    }
    
    function storeFail($teacherId) {
        TeachersModels::findOrFail($teacherId)->delete();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tempTeacherName, $tempTeacherId)
    {
        try {
            $teacher = TeachersModels::where('teacher_id', $tempTeacherId)
                ->where('name', $tempTeacherName)
                ->firstOrFail(); // Mengambil objek guru atau memberikan respons 404 jika tidak ditemukan
    
            if ($teacher) {
                $image = TeachersImagesModels::where('teacher_id', $teacher->teacher_id)->first();
                if ($image && $image->name_files != 'default.png') {
                    $this->deleteImage($image->name_files);
                }
                $teacher->delete();
                $nowData = DB::table('teachers')->count('teacher_id');
                return response()->json(['succedSomething' => 'Data berhasil dihapus', 'nowData' => $nowData], 200);
            }
    
            return response()->json(['errorSomething' => 'Data tidak ditemukan'], 400);
        } catch (\Throwable $th) {
            return response()->json(['errorSomething' => 'Terjadi kesalahan dalam menghapus data'], 500);
        }
    }
    
    public function deleteImage($nameFiles) {
        $filePath = 'public/images/teacher/' . $nameFiles;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return true; // Penghapusan berhasil
        }
        return false; // Penghapusan gagal
    }
    
    public function checkRoute() {
        $routeFrom = Route::current()->uri();
        $splitRoute = explode('/', $routeFrom);
        if($routeFrom == 'pendidik' || $splitRoute[0] == 'pendidik') {
            return "Pendidik";
        }
        else if ($routeFrom == 'tenpendidik' || $splitRoute[0] == 'tenpendidik') {
            return "Tenaga Kependidikan";
        }
        
        return "Unknown";
    }
}
