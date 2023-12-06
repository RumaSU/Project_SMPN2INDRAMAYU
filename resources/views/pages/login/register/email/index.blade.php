@extends('layouts.login.main')
@section('content')
<div class="form-login mx-auto w-1/3 px-8 py-4 border border-black rounded-2xl" >
    <h1 class="text-2xl font-bold">Sign Up</h1>
    <form method="POST" action="/register/{{session()->get('register_token')}}" class="flex flex-col gap-6 mt-12">
        @csrf
        <input type="hidden" name="register_token" id="register_token" value="{{ session()->get('register_token') }}" class="hidden" readonly>
        <div class="form-email">
            <div class="the-labels flex justify-between items-center " >
                <label for="email" class="font-bold"> Email </label>
                <p class="create-account text-[12px]">
                    Mempunyai akun ? <a href="/login" class="text-[#0000FF] font-bold">Log In</a>
                </p>
            </div>
            <input type="email" id="email" name="email" class="w-full py-2 px-1 border border-[#CED4DA]" value="{{old('email')}}" required >
        </div>
        <div class="form-username">
            <div class="the-labels flex justify-between items-center " >
                <label for="username" class="font-bold"> Username </label>
            </div>
            <input type="text" id="username" name="username" class="w-full py-2 px-1 border border-[#CED4DA]" value="{{old('username')}}" required >
        </div>
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
            <input type="password" id="password" name="password" class=" w-full py-2 px-1 border border-[#CED4DA]" required >
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
            <input type="password" id="confPassword" name="confPassword" class=" w-full py-2 px-1 border border-[#CED4DA]" required >
        </div>
        <button type="submit" class="bg-[#0096FF] text-sm text-white font-bold py-2 rounded-lg " > Continue </button>
        @if (session('errorBruh'))
            <p>Something error i dunno where bruh</p>
        @endif
        @if (session('isthisdone'))
            <p>I dunno if this done but not to new page</p>
        @endif
    </form>
    <div class="divide-or flex justify-center items-center p-3 gap-3 mt-3">
        <hr class="border border-black w-1/2  ">
        <p class="text-center text-xs ">
            OR
        </p>
        <hr class="border border-black w-1/2 ">
    </div>
    <p class="text-center my-3 text-xs">
        <a href="/register">
            Sign In ?
        </a>
    </p>
</div>

@endsection
@section('custom-script')
    <script src="{{ asset ('assets/js/login/password.js') }}"></script>
@endsection
