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
        <div class="form-sameNisNip border rounded-sm p-6">
            <h1 class="text-2xl font-bold mt-6 text-center">Akun Sudah Ada</h1>
            <p class="text-xs py-5 text-center ">Akun yang kamu daftarkan untuk NIS/NIP {nip} sudah terdaftar</p>
            <div class="the-labels flex justify-between items-center py-3 mt-12 " >
                <label for="nama" class="font-bold text-[#FF0000]">NIS / NIP</label>
            </div>
            <input type="nama" id="nama" name="nama" class="w-full py-2 px-1 bg-[#FFEDED] border border-[#DD8181] rounded-sm" >
        </div>
        <button type="submit" class="bg-[#000000] text-sm text-white font-bold py-2 rounded-lg my-3 mt-2 " > Continue </button>
        
    </form>
@endsection
@section('custom-script')
    <script src="{{ asset ('assets/js/login/password.js') }}"></script>
@endsection
