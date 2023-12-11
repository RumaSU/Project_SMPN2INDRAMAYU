<?php

namespace App\Http\Controllers;

use App\Models\ClassesModels;
use App\Models\ClassesImages;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ClassesModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tempClassVII = DB::table("classes")
        //     ->join('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
        //     ->where('classes.tag', 'VII')
        //     ->orderBy('classes.class', 'asc')
        //     ->get();
        // $tempClassVIII = DB::table("classes")
        //     ->join('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
        //     ->where('classes.tag', 'VIII')
        //     ->orderBy('classes.class', 'asc')
        //     ->get();
        // $tempClassIX = DB::table("classes")
        //     ->join('classes_images', 'classes.class_id', '=', 'classes_images.class_id')
        //     ->where('classes.tag', 'IX')
        //     ->orderBy('classes.class', 'asc')
        //     ->get();

        // return view("pages.classes.index", compact("tempClassVII", "tempClassVIII", "tempClassIX"));
        return view("pages.classes.index");

        // $tempClass = DB::table("classes")->select('tag')->distinct()->get();
        // $listClass = [];

        // foreach ($tempClass as $tag) {
        //     // Mengambil data 'class' dari tabel 'classes' sesuai dengan setiap 'tag'
        //     $class = DB::table('classes')
        //                 ->where('tag', $tag->tag)
        //                 ->pluck('class')
        //                 ->toArray();

        //     // Menambahkan hasil ke dalam array yang dibuat
        //     $listClass[] = [
        //         'Tag' => $tag->tag,
        //         'Class' => $class,
        //     ];
        // }

        // return view("pages.students.index", compact("listClass"));
        // SELECT classes.*, classes_images.name_files
        // FROM classes
        // JOIN classes_images ON classes.id = classes_images.class_id
        // ORDER BY classes.class ASC;
    }
    
    public function listTeacher() {
        $listTeacher = DB::table('teachers')
            ->leftJoin('classes', 'teachers.teacher_id', '=', 'classes.teacher_id') // Menggunakan leftJoin agar bisa mengambil guru yang tidak terhubung dengan kelas
            ->whereNull('classes.teacher_id') // Hanya ambil guru yang tidak terhubung dengan kelas
            ->select('teachers.teacher_id', 'teachers.name')
            ->get();
        return response()->json($listTeacher);
    }
    
    public function teacherImage(Request $request){
        $nameFiles = TeachersImagesModels::select('name_files')
            ->where('teacher_id', $request->teacherId)
            ->first();
        return response()->json($nameFiles);
    }
    
    public function tagClass(Request $request) {
        $latestClass = ClassesModels::select('class_tag')
            ->where('class_grade', $request->classGrade)
            ->orderBy('created_at', 'desc')
            ->first();
        return response()->json($latestClass);
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
        if ($request->hasFile('imgClass')) {
            $image = $request->file('imgClass');
            $imageName = $image->hashName(); // Menamai gambar
            $image->storeAs('public/images/classes/', $imageName); // Simpan gambar di direktori 'images' dalam direktori publik
        } else {
            $imageName = 'default.jpg';
        }

        $classes = ClassesModels::create([
            // 'teacher_class' => $request->teacher,
            'class' => $request->tagClass,
            'tag' => $request->classList,
            'description' => $request->desc
        ]);
        if ($classes) {
            $classesImg = ClassesImages::create([
                'name_files' => $imageName,
                'class_id' => $classes->class_id, // Atur 'class_id' sesuai dengan id kelas yang baru dibuat
            ]);
            if ($classesImg) {
                $classes->images()->save($classesImg);
                return redirect()->back()->with('status','Classes and Images Added Successfully');
            } else {
                return redirect()->back()->with('status','Classes Added, Images Failed');
            }
        } else {
            return redirect();
        }
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
}
