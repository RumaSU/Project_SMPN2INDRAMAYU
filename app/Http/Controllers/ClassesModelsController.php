<?php

namespace App\Http\Controllers;

use App\Models\ClassesModels;
use App\Models\ClassesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tempClassVII = DB::table("classes")
            ->join('classes_images', 'classes.id', '=', 'classes_images.class_id')
            ->where('classes.tag', 'VII')
            ->orderBy('classes.class', 'asc')
            ->get();
        $tempClassVIII = DB::table("classes")
            ->join('classes_images', 'classes.id', '=', 'classes_images.class_id')
            ->where('classes.tag', 'VIII')
            ->orderBy('classes.class', 'asc')
            ->get();
        $tempClassIX = DB::table("classes")
            ->join('classes_images', 'classes.id', '=', 'classes_images.class_id')
            ->where('classes.tag', 'IX')
            ->orderBy('classes.class', 'asc')
            ->get();
        
        return view("pages.students.index", compact("tempClassVII", "tempClassVIII", "tempClassIX"));
        
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
            'teacher_class' => $request->teacher,
            'class' => $request->tagClass,
            'tag' => $request->classList,
            'description' => $request->desc
        ]);
        if ($classes) {
            $classesImg = ClassesImages::create([
                'name_files' => $imageName,
                'class_id' => $classes->id, // Atur 'class_id' sesuai dengan id kelas yang baru dibuat
            ]);
            
            $classes->images()->save($classesImg);
            return redirect()->back()->with('status','Classes Added Successfully');
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
