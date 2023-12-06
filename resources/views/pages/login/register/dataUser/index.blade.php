@extends('layouts.login.main')
@section('content')
<div class="form-login mx-auto w-1/3 px-8 py-4 border border-black rounded-2xl" >
    <h1 class="text-2xl font-bold">Sign In</h1>
    <form method="POST" action="/register/{{session()->get('register_token')}}/data/{{session()->get('validateToken')}}" class="flex flex-col gap-6 mt-12">
        @csrf
        <div class="form-nama">
            <div class="the-labels flex justify-between items-center " >
                <label for="nama" class="font-bold"> Nama </label>
            </div>
            <input type="text" id="nama" name="nama" class="w-full py-2 px-1 border border-[#CED4DA]" value="{{old('nama')}}" required >
        </div>
        <div class="form-nisNip">
            <div class="the-labels flex items-center justify-between">
                <label for="nisNip" class="font-bold"> NIS / NIP </label>
            </div>
            <input type="text" id="nisNip" name="nisNip" class=" w-full py-2 px-1 border border-[#CED4DA]" value="{{old('nisNip')}}" required >
        </div>
        <div class="form-noTelp">
            <div class="the-labels flex items-center justify-between">
                <label for="noTelp" class="font-bold"> No Telepon</label>
            </div>
            <input type="text" id="noTelp" name="noTelp" class=" w-full py-2 px-1 border border-[#CED4DA]" value="{{old('noTelp')}}" required >
        </div>
        <button type="submit" class="bg-[#0096FF] text-sm text-white font-bold py-2 rounded-lg " > Sign Up </button>
    </form>
    <div class="divide-or flex justify-center items-center p-3 gap-3 mt-3">
        <hr class="border border-black w-1/2  ">
        <p class="text-center text-xs ">
            OR
        </p>
        <hr class="border border-black w-1/2 ">
    </div>
    <p class="text-center my-3 text-xs">
        <a href="/login">
            Cancel?
        </a>
    </p>
</div>

@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/login/password.js') }}"></script>
@endsection
