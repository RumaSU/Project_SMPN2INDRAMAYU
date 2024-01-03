<?php

namespace App\Http\Controllers;

use App\Models\UsersDataModels;
use App\Models\UsersRolesModels;
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
        return view("pages.login.register.email.index");
    }
    public function validateEmail(Request $request, $hashToken)
    {
        $validateRequest=$request->validate([
            'register_token' => 'required',
            'email' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'confPassword' => 'required|max:255',
        ]);
        if($validateRequest){
            $sessionNow = session()->get("register_token");
            if (($sessionNow == $request->register_token) && ($sessionNow == $hashToken)){
                // Check if email is already in use
            $existingUser = UsersModels::where('email', $validateRequest['email'])->first();

        if ($existingUser) {
            // Email is already in use, handle the error as needed
            return redirect()->back()->withErrors(['email' => 'Email is already in use.']);
        }
            // Continue with the registration process
                $request->session()->put("validateEmail", $validateRequest);

                $validateToken=md5(implode(', ', $validateRequest));
                session()->put("validateToken", $validateToken);
                return redirect()->route('register.data', ['hashToken' => $sessionNow]);
            }
            return redirect()->back()->with('errorBruh', 'Bruh something error i dunno where');
        }
        return redirect()->back()->with('errorBruh', 'Bruh something error i dunno where');
    }
    public function createData($hashToken)
    {
        $checkSession = session()->get('register_token');
        if($hashToken == $checkSession){
            return view("pages.login.register.dataUser.index");
        }
        return redirect('/register');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $hashToken, $validateToken)
    {
        $checkRegisterToken = session()->get('register_token');
        $checkValidateToken = session()->get('validateToken');
        if(($hashToken == $checkRegisterToken) && ($validateToken == $checkValidateToken)){
            $validateRequest=$request->validate([
                'nama' => 'required|max:255',
                'nisNip' => 'required|unique:users_data,nis_nip|max:255',
                'noTelp' => 'required|max:255',
            ]);
            if ($validateRequest){
                $dataUser = session()->get('validateEmail');
                $idUser = Uuid::uuid4()->toString();
                $insertUser = UsersModels::create([
                    'user_id'=>$idUser,
                    'username'=>$dataUser['username'],
                    'email'=>$dataUser['email'],
                    'password'=>bcrypt($dataUser['password']),
                ]);
                $insertData = UsersDataModels::create([
                    'user_id'=>$idUser,
                    'nama'=>$request->nama,
                    'nis_nip'=>$request->nisNip,
                    'no_telepon'=>$request->noTelp,
                ]);
                $insertType = UsersRolesModels::create([
                    'user_id'=>$idUser,
                    'roles'=>"User",
                ]);
                if ($insertUser && $insertData && $insertType){
                    return redirect('/');
                }

            }
        }
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
