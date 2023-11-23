@extends('layouts.login.main')
@section('content')
<div class="form-login mx-auto w-1/3 px-8 py-4 border border-black rounded-2xl" >
    <div class="imgError">
        <div class="imgItem relative">
            <img src="" alt="">
            <div class="icExcepMark">
                <i></i>
            </div>
        </div>
    </div>
    <form method="POST" class="flex flex-col gap-6 mt-12">
        @csrf
        <div class="form-newPass border rounded-sm p-6">
            <h1 class="text-2xl font-bold mt-6 text-center">Masukan Password</h1>
            <p class="text-xs py-5 text-center ">Masukan password anda yang baru untuk proses lupa password!</p>
            <div class="form-password">
                <div class="the-labels flex justify-between items-center py-2 mt-3 " >
                    <label for="password" class="font-bold text-[#000000]">Password</label>
                    <div class="show-confPassword">
                        <button type="button" class="flex items-center gap-1" onclick="showPassword(this)">
                            <i class="bi bi-eye-slash text-xl"></i>
                            <p class="text-xs font-bold">show</p>
                        </button>
                    </div>
                </div>
                <input type="password" id="password" name="password" class="w-full py-2 px-1 border border-black rounded-sm" >
            </div>
            <div class="form-confPassword">
                <div class="the-labels flex justify-between items-center py-2 mt-6 " >
                    <label for="confirmpass" class="font-bold text-[#000000]">Confirm Password</label>
                    <div class="show-confPassword">
                        <button type="button" class="flex items-center gap-1" onclick="showPassword(this)">
                            <i class="bi bi-eye-slash text-xl"></i>
                            <p class="text-xs font-bold">show</p>
                        </button>
                    </div>
                </div>
                <input type="confirmpass" id="confirmpass" name="confirmpass" class="w-full py-2 px-1 border border-black rounded-sm" >
            </div>
        </div>
        <button type="submit" class="bg-[#000000] text-sm text-white font-bold py-4 rounded-lg my-3 mt-2 " > Continue </button>
    </form>
@endsection
@section('custom-script')
    <script src="assets/js/login/password.js"></script>
@endsection
