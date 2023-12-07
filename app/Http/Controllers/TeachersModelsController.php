<?php

namespace App\Http\Controllers;

use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TeachersModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.teachers.index");
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
        $request_validate = $request->validate([
            'nameTeachers' => 'required',
            'nipTeachers' => 'required',
            'emailsAccount' => 'email',
            'bidangTeachers' => 'required',
            'yearsSignTeachers' => 'required',
        ]);
        if($request_validate){
            $teachersId = Uuid::uuid4()->toString();
            $storeTeachers = TeachersModels::create([
                'teacher_id' => $teachersId,
                'nip' => $request->nipTeachers,
                'name' => $request->nameTeachers,
                'status' => "Pendidik",
                'sector' => $request->bidangTeachers,
                'email' => $request->emailsAccount,
                'tahun_terdaftar' => $request->yearsSignTeachers,
            ]);
            if ($storeTeachers){
                $storeTeachersImage = TeachersImagesModels::create([
                    'name_files' => "defaul.png",
                    'teacher_id' => $teachersId,
                ]);
                if($storeTeachersImage) {
                    return redirect('/homepage')->with('succedSomething', 'This is succed');
                }
                return redirect()->back()->with('errorSomething', 'this is error');
            }
            return redirect()->back()->with('errorSomething', 'this is error');
        }
        return redirect()->back()->with('errorSomething', 'this is error');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeachersModels $teachersModels)
    {
        //
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
    public function update(Request $request, TeachersModels $teachersModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachersModels $teachersModels)
    {
        //
    }
}
