<style>
    .regular-shadow {
        box-shadow: 0 2px 4px black;
    }
</style>
@extends('layouts.main.main')
@section('link-rel')
    
@endsection
@section('content')
    <section class="img-students flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full" style="background-image: url('assets/img/main/126465066756.jpg');">
        <div class="content relative z-10 selft-center">
            <h1 class="text-4xl font-bold">Daftar Kelas</h1>
            <h2 class="text-xl">Profil/Siswa</h2>
        </div>
    </section>
    <section class="listClass mt-12 px-12">
        <div class="class-vii">
            <div class="title-class text-2xl font-bold border-b-4 border-black">Kelas VII</div>
            <div class="list mt-6">
                <div class="bg-white regular-shadow w-48 h-64 border rounded-2xl">
                    <div class="editB">
                        
                    </div>
                    <div class="delB">
                        
                    </div>
                    <div class="itemClass font-bold bg-gray-400">VII A</div>
                </div>
            </div>
        </div>
        <div class="class-viii">
            
        </div>
        <div class="class-ix">
            
        </div>
    </section>
@endsection
@section('custom-script')
    
@endsection
