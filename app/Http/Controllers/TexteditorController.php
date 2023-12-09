<?php

namespace App\Http\Controllers;

use App\Models\texteditor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class TexteditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contentFromDatabase = DB::table('texteditor')->orderBy('created_at', 'desc')->first();
        return view('pages.test.texteditordisplay', compact('contentFromDatabase'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.test.texteditor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contenId = Uuid::uuid4()->toString();
        $content = new texteditor;
        $content->content_id = $contenId;
        $content->title = $request->title;
        // $content->content = htmlspecialchars($request->content);
        $content->content = $request->editor1;
        $content->save();
        return back()->with("success", "Post has been created");
    }

    /**
     * Display the specified resource.
     */
    public function show(texteditor $texteditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(texteditor $texteditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, texteditor $texteditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(texteditor $texteditor)
    {
        //
    }
    
    public function upload(Request $request) {
        if ($request->hasFile('body')){
            // $originName = $request->file('upload')->getClientOriginalName();
            // $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $request->file('upload')->getClientOriginalExtension();
            // $fileName = $fileName . '_' . time() . '.' . $extension;
            
            // $request->file('upload')->move(public_path('media'), $fileName);
            
            // $url = asset('media/' . $fileName);
            // return response()->json([
            //     'fileName' => $fileName, 
            //     'uploaded' => 1, 
            //     'url' => $url
            // ]);
            $fileName = time() . '_' . $request->file('body')->getClientOriginalName();
        
            // Pindahkan file ke direktori public/media
            $request->file('body')->move(public_path('media'), $fileName);
            
            // Dapatkan URL file yang diunggah
            $url = asset('media/' . $fileName);
            
            return response()->json([
                'fileName' => $fileName, 
                'uploaded' => 1, 
                'url' => $url
            ]);
        }
        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            // Pindahkan file ke direktori public/images
            $image->move(public_path('images'), $fileName);
            
            // Atau gunakan storage_path untuk menyimpan di storage Laravel
            // $image->storeAs('images', $fileName);
            
            // URL file yang diunggah
            $url = asset('images/' . $fileName);
            
            return response()->json([
                'fileName' => $fileName, 
                'uploaded' => 1, 
                'url' => $url
            ]);
        }
    }
    // public function uploadImage(Request $request) {		
    //     if($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName.'_'.time().'.'.$extension;
        
    //         $request->file('upload')->move(public_path('images'), $fileName);
    
    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('images/'.$fileName); 
    //         $msg = 'Image uploaded successfully'; 
    //         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
    //         @header('Content-type: text/html; charset=utf-8'); 
    //         echo $response;
    //     }
    // }	
    public function uploadImage(Request $request)
    {
        // $uploadedImage = $request->file('upload');

        // // Validasi bahwa file yang diunggah adalah gambar
        // $validatedData = $request->validate([
        //     'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // sesuaikan dengan kebutuhan Anda
        // ]);

        // // Simpan gambar ke dalam direktori public/storage
        // $path = $uploadedImage->store('public/images');

        // // Ubah path agar dapat diakses publik
        // $url = Storage::url($path);

        // return response()->json([
        //     'url' => $url // Kirim URL gambar kembali ke CKEditor
        // ]);
        $image = $request->file('upload');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $url = asset('images/' . $imageName);

        return response()->json(['url' => $url]);
    }
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('media'), $fileName);
    
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}
