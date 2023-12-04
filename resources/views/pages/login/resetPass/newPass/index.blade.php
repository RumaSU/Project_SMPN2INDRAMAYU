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
        <div class="form-newPass border rounded-sm p-6 space-y-6">
            <div class="tiResPass">
                <h1 class="text-2xl font-bold mt-6 text-center">Masukan Password</h1>
                <p class="text-xs py-5 text-center ">Masukan password anda yang baru untuk proses lupa password!</p>
            </div>
            <div class="inpPass-confPass space-y-9">
                <div class="form-password">
                    <div class="the-labels flex items-center justify-between">
                        <label for="password" class="font-bold"> Password </label>
                        <div class="show-password">
                            <button type="button" class="flex items-center gap-1" onclick="showPassword(this)">
                                <i class="bi bi-eye-slash text-xl"></i>
                                <p class="text-xs font-bold">show</p>
                            </button>
                        </div>
                    </div>
                    <input type="password" id="password" name="password" class="w-full py-2 px-1 border border-[#CED4DA]" >
                </div>
                <div class="form-confPassword">
                    <div class="the-labels flex items-center justify-between">
                        <label for="confPassword" class="font-bold"> Confirmation Password </label>
                        <div class="show-confPassword">
                            <button type="button" class="flex items-center gap-1" onclick="showPassword(this)">
                                <i class="bi bi-eye-slash text-xl"></i>
                                <p class="text-xs font-bold">show</p>
                            </button>
                        </div>
                    </div>
                    <input type="password" id="confPassword" name="confPassword" class=" w-full py-2 px-1 border border-[#CED4DA]" >
                </div>
            </div>
        </div>
        <button type="submit" class="bg-[#000000] text-sm text-white font-bold py-3 rounded-lg my-3 mt-2 " > Continue </button>
    </form>
@endsection
@section('custom-script')
    <script src="{{ asset ('assets/js/login/password.js') }}"></script>
@endsection
