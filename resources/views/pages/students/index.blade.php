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
    <section class="listClass mt-12 px-12 py-20 space-y-12">
        <div class="class-vii">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black">
                <p>Kelas VII</p>
                <button class="text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800">
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </button>
            </div>
            <div class="list mt-6 flex flex-wrap gap-5">
                <div class="group bg-white regular-shadow w-48 h-64 border rounded-2xl overflow-hidden relative">
                    <div class="button-editDel absolute z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                        <button class="editB border border-black p-2 rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="delB border border-black p-2 rounded-lg hover:bg-gray-200">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                    <p class="itemClass w-full py-[15%] text-center font-bold bg-gray-400/30 absolute -bottom-full translate-y-full transition-all group-hover:bottom-0 group-hover:translate-y-0">VII A</p>
                    <a href="" class="block w-full h-full absolute inset-0"></a>
                </div>
                <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <a href="" class="block w-full h-full inset-0 absolute"></a>
                </div>
            </div>
        </div>
        <div class="class-viii">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black">
                <p>Kelas VIII</p>
                <button class="text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800">
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </button>
            </div>
            <div class="list mt-6 flex flex-wrap gap-5">
                <div class="group bg-white regular-shadow w-48 h-64 border rounded-2xl overflow-hidden relative">
                    <div class="button-editDel absolute z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                        <button class="editB border border-black p-2 rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="delB border border-black p-2 rounded-lg hover:bg-gray-200">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                    <p class="itemClass w-full py-[15%] text-center font-bold bg-gray-400/30 absolute -bottom-full translate-y-full transition-all group-hover:bottom-0 group-hover:translate-y-0">VII A</p>
                    <a href="" class="block w-full h-full absolute inset-0"></a>
                </div>
                <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative  hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <a href="" class="block w-full h-full absolute inset-0"></a>
                </div>
            </div>
        </div>
        <div class="class-ix">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black">
                <p>Kelas IX</p>
                <button class="text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800">
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </button>
            </div>
            <div class="list mt-6 flex flex-wrap gap-5">
                <div class="group bg-white regular-shadow w-48 h-64 border rounded-2xl overflow-hidden relative">
                    <div class="button-editDel absolute z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                        <button class="editB border border-black p-2 rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="delB border border-black p-2 rounded-lg hover:bg-gray-200">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                    <p class="itemClass w-full py-[15%] text-center font-bold bg-gray-400/30 absolute -bottom-full translate-y-full transition-all group-hover:bottom-0 group-hover:translate-y-0">VII A</p>
                    <a href="" class="block w-full h-full absolute inset-0"></a>
                </div>
                <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative  hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <a href="" class="block w-full h-full absolute inset-0"></a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-script')

@endsection
