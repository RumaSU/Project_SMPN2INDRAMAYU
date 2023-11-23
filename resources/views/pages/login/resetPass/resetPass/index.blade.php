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
            <h1 class="text-2xl font-bold mt-6 text-center">Lupa Password ?</h1>
            <p class="text-xs py-5 text-center ">Mohon masukkan alamat email dan NIS/NIP Anda di bawah ini untuk proses reset password. Kami akan mengirimkan email konfirmasi kepada Anda.</p>
            <div class="the-labels flex justify-between items-center py-2 mt-3 " >
                <label for="nama" class="font-bold text-[#000000]">Email</label>
            </div>
            <input type="nama" id="nama" name="nama" class="w-full py-2 px-1 border border-black rounded-sm" >
            <div class="the-labels flex justify-between items-center py-2 mt-6 " >
                <label for="nama" class="font-bold text-[#000000]">NIS / NIP</label>
            </div>
            <input type="nama" id="nama" name="nama" class="w-full py-2 px-1 border border-[#CED4DA]" >
        </div>
        <button type="submit" class="bg-[#000000] text-sm text-white font-bold py-2 rounded-lg my-3 mt-2 " > Continue </button>
    </form>
@endsection
@section('custom-script')

@endsection
