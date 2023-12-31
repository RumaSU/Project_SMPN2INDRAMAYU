@extends('layouts.login.main')
@section('content')
<div class="form-login mx-auto w-1/3 px-8 py-4 border border-black rounded-2xl" >
    <h1 class="text-2xl font-bold">Log In</h1>
    <form action="/login/authenticate" method="POST" class="flex flex-col gap-6 mt-12">
        @csrf
        <div class="form-email">
            <div class="the-labels flex justify-between items-center " >
                <label for="email" class="font-bold"> Email </label>
                <p class="create-account text-[12px]">
                    Akun baru ? <a href="/register" class="text-[#0000FF] font-bold">Daftar disini</a>
                </p>
            </div>
            <input type="email" id="email" name="email" class="w-full py-2 px-1 border border-[#CED4DA]" >
        </div>
        <div class="form-password">
            <div class="the-labels flex items-center justify-between">
                <label for="password" class="font-bold"> Password </label>
                <div class="show-password">
                    <span role="button" class="flex items-center gap-1 " onclick="showPassword(this)">
                        <i class="bi bi-eye-slash text-xl"></i>
                        <p class="text-xs font-bold">show</p>
                    </span>
                </div>
            </div>
            <input type="password" id="password" name="password" class=" w-full py-2 px-1 border border-[#CED4DA]" >
        </div>
        <div class="form-remember flex items-center gap-4">
            <input type="checkbox" id="remember" name="remember" class="w-5 h-5 cursor-pointer">
            <label for="remember" class="text-sm font-bold "  >Remember me</label>
        </div>
        <button type="submit" class="bg-[#0096FF] text-sm text-white font-bold py-2 rounded-lg " > Login </button>
        {{-- <a href="/" class="bg-[#0096FF] text-sm text-white font-bold py-2 rounded-lg text-center" > Login </a> --}}
    </form>
    <div class="divide-or flex justify-center items-center p-3 gap-3 mt-3">
        <hr class="border border-black w-1/2  ">
        <p class="text-center text-xs ">
            OR
        </p>
        <hr class="border border-black w-1/2 ">
    </div>


    <p class="text-center my-3 text-xs">
        <a href="/login/resetPass">
            Forgot Password ?
        </a>
    </p>

</div>


@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/login/password.js') }}"></script>
@endsection
