<?php

namespace App\Http\Controllers;

use App\Models\ClassesModels;
use App\Models\ClassesImagesModels;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
            ->where('classes.year', $latestYears[0])
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();
        $tempClassVIII = DB::table("classes")
            ->leftJoin('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
            ->where('classes.class_grade', 'VIII')
            ->where('classes.year', $latestYears[1])
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();
        $tempClassIX = DB::table("classes")
            ->leftJoin('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
            ->where('classes.class_grade', 'IX')
            ->where('classes.year', $latestYears[2])
            ->orderBy('classes.class_tag', 'asc')
            ->select('classes.class_id', 'classes.class_grade', 'classes.class_tag', 'classes_images.name_files')
            ->get();

        return view("pages.classes.index", compact("tempClassVII", "tempClassVIII", "tempClassIX"));
        // return view("pages.classes.index");
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
    
    public function listTeacher() {
        $nowRoute = $this->checkRoute();
        $listTeacher = DB::table('teachers')
            ->leftJoin('classes', 'teachers.teacher_id', '=', 'classes.teacher_id') // Menggunakan leftJoin agar bisa mengambil guru yang tidak terhubung dengan kelas
            // ->leftJoin('classes', function($join) use ($previousYear, $inputYear) {
            //     $join->on('teachers.teacher_id', '=', 'classes.teacher_id')
            //         ->where('classes.year', '=', $previousYear);
            //         // ->where('classes.year', '=', $inputYear);
            // })
            ->whereNull('classes.teacher_id') // Hanya ambil guru yang tidak terhubung dengan kelas
            ->where('teachers.status', '=', 'Aktif')
            ->where('teachers.type', '=', 'Pendidik')
            // ->when($condition, function ($query) {
            //     return $query->orWhere('classes.status', 'Alumni');
            // })
            ->orWhere('classes.status', '=', 'Alumni')
            ->select('teachers.teacher_id', 'teachers.name')
            ->get();
        if($nowRoute == 'Ajax') {
            return response()->json($listTeacher);
        } else {
            return $listTeacher;
        }
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
        // return response()->json(['error' => 'Error penolakan'], 404);
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
                ->select('teachers.teacher_id', 'teachers.name', 'teachers_images.name_files')
                ->where('teachers.teacher_id', '=', $dataClass->teacher_id)
                ->first();
            // $dataTeacher = TeachersModels::select('teacher_id', 'name')->where('teacher_id', $dataClass->teacher_id)->first();
            $listTeacherEdit = DB::table('teachers')
                ->leftJoin('classes', 'teachers.teacher_id', '=', 'classes.teacher_id')
                ->whereNull('classes.teacher_id') // Hanya ambil guru yang tidak terhubung dengan kelas
                ->where('teachers.status', '=', 'Aktif')
                ->where('teachers.type', '=', 'Pendidik')
                ->where('teachers.teacher_id', '!=', $dataClass->teacher_id)
                ->orWhere('classes.status', '=', 'Alumni')
                ->select('teachers.teacher_id', 'teachers.name')
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
        $listTeacher = $this->listTeacher()->pluck('teacher_id')->toArray();
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
    public function update(Request $request, ClassesModels $classesModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classes = ClassesModels::find($id);
        if($classes) {
            $classes->delete();
            return redirect()->back()->with('status','Data berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data');
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
