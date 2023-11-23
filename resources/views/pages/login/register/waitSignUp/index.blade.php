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
        <div class="form-sameNisNip border rounded-sm p-3">
            <h1 class="text-2xl font-bold mt-4 text-center">Akun Berhasil Dibuat!</h1>
            <p class="text-xs py-5 ">Selamat! Akun dengan email {email} dan NIS/NIP {nip} telah berhasil didaftarkan. Kami informasikan bahwa akun Anda saat ini sedang menunggu konfirmasi dari admin. Hasil konfirmasi akan dikirimkan melalui email.</p>
        </div>
        <button type="submit" class="bg-[#000000] text-sm text-white font-bold py-2 rounded-lg my-3 mt-2 " > Continue </button>
    </form>
@endsection
@section('custom-script')

@endsection
