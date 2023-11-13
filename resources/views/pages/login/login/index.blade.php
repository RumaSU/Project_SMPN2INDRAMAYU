@extends('layouts.login.main')
@section('content')
<div class="form-login mx-auto w-1/3 px-8 py-4 border border-black rounded-2xl" >
    <h1 class="text-2xl font-bold">Log In</h1>
    <form method="" class="flex flex-col gap-6 mt-12">
        <div class="form-email">
            <div class="the-labels flex justify-between items-center " >
                <label for="email" class="font-bold"> Email </label>
                <p class="create-account text-[12px]">
                    Akun baru ? <a href="" class="text-[#0000FF] font-bold">Daftar disini</a>
                </p>
            </div>
            <input type="email" id="email" name="email" class="w-full py-2 px-1 border border-[#CED4DA]" >
        </div>
        <div class="form-password">
            <div class="the-labels">
                <label for="password" class="font-bold"> Password </label>
            </div>
            <input type="password" id="password" name="password" class=" w-full py-2 px-1 border border-[#CED4DA]" >
        </div>
        <div class="form-remember flex items-center gap-4">
            <input type="checkbox" id="remember" name="remember" class="w-5 h-5 cursor-pointer">
            <label for="remember" class="text-sm font-bold "  >Remember me</label>
        </div>
        <button type="submit" class="bg-[#0096FF] text-sm text-white font-bold py-3 rounded-lg " > Login </button>
    </form>
    <p class="text-center relative after:absolute after:w-1/3 after:border-b-2 after:border-gray-400 after:left-[15%] after:top-1/2 after:-translate-x-[15%] after:-translate-y-1/2 before:absolute before:w-1/3 before:border-b-2 before:border-gray-400 before:right-0 before:top-1/2 before:-translate-x-0 before:-translate-y-1/2">
        OR
    </p>
    <a href="" class="self-center">Forgot password</a>
</div>


@endsection
@section('custom-script')

@endsection
