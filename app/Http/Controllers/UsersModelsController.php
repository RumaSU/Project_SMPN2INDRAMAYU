<?php

namespace App\Http\Controllers;

use App\Models\UsersModels;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UsersModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.login.login.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createEmail()
    {
        $hashToken=md5(rand());
        session()->put("register_token", $hashToken);
        return view("pages.login.register.email.index", compact("hashToken"));
    }
    public function validateEmail(Request $request)
    {
        $validateRequest=$request->validate([
            'register_token' => 'required',
            'email' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'confPassword' => 'required|max:255',
        ]);
        if($validateRequest){
            $sessionNow = $request->session()->get("register_token");

            if ($sessionNow == $request->register_token){
                $request->session()->put("validateEmail", $validateRequest);
                return redirect("/register/data");
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function createData()
    {
        return view("pages.login.register.dataUser.index");

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(UsersModels $usersModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersModels $usersModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersModels $usersModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersModels $usersModels)
    {
        //
    }
}