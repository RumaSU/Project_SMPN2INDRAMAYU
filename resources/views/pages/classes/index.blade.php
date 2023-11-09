@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="img-students flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
        style="background-image: url('assets/img/main/126465066756.jpg');">
        <div class="content relative z-10 selft-center">
            <h1 class="text-4xl font-bold">Daftar Kelas</h1>
            <h2 class="text-xl">Profil/Siswa</h2>
        </div>
    </section>
    <section class="listClass mt-12 px-12 py-20 space-y-12">
        <div class="class-vii">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <p>Kelas VII</p>
                <button class="btrpp-vii text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="showPopUpForm(this); addVals(this);">
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </button>
                <button class="expandList p-1 float-right absolute right-0 -rotate-90 transition-all duration-300" onclick="shList(this)">
                    <i class="bi bi-chevron-left text-4xl"></i>
                </button>
            </div>
            <div class="list mt-6 flex flex-wrap gap-5">
                @foreach ($tempClassVII as $class)
                    <div class="group bg-white regular-shadow w-48 h-64 border rounded-2xl overflow-hidden relative">
                        <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <img src="assets/img/main/126465066756.jpg" alt="" class="supImg w-full h-full object-cover object-center relative">
                        <a href="/kelas/testing/siswa" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all">
                            <p class="itemClass w-3/4 py-2 text-white text-center font-bold bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                {{ $class->tag }} {{ $class->class }}
                            </p>
                        </a>
                    </div>
                @endforeach
                <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <button type="button" class="btrpp-vii block w-full h-full inset-0 absolute z-10" onclick="showPopUpForm(this); addVals(this);"></button>
                </div>
            </div>
        </div>
        <div class="class-viii">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <p>Kelas VIII</p>
                <button class="btrpp-viii text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="showPopUpForm(this); addVals(this);">
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </button>
                <button class="expandList p-1 float-right absolute right-0 -rotate-90 transition-all duration-300" onclick="shList(this)">
                    <i class="bi bi-chevron-left text-4xl"></i>
                </button>
            </div>
            <div class="list mt-6 flex flex-wrap gap-5">
                @foreach ($tempClassVIII as $class)
                    <div class="group bg-white regular-shadow w-48 h-64 border rounded-2xl overflow-hidden relative">
                        <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('delClass', ['id' => $class->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $class->id }}">
                                    <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <img src="assets/img/main/126465066756.jpg" alt="" class="supImg w-full h-full object-cover object-center relative">
                        <a href="" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all">
                            <p class="itemClass w-3/4 py-2 text-white text-center font-bold bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                {{ $class->tag }} {{ $class->class }}
                            </p>
                        </a>
                    </div>
                @endforeach
                <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <button type="button" class="btrpp-viii block w-full h-full inset-0 absolute z-10" onclick="showPopUpForm(this); addVals(this);"></button>
                </div>
            </div>
        </div>
        <div class="class-ix">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <p>Kelas IX</p>
                <button class="btrpp-ix text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="showPopUpForm(this); addVals(this);">
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </button>
                <button class="expandList p-1 float-right absolute right-0 -rotate-90 transition-all duration-300" onclick="shList(this)">
                    <i class="bi bi-chevron-left text-4xl"></i>
                </button>
            </div>
            <div class="list mt-6 flex flex-wrap gap-5">
                @foreach ($tempClassIX as $class)
                    <div class="group bg-white regular-shadow w-48 h-64 border rounded-2xl overflow-hidden relative">
                        <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('delClass', ['id' => $class->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $class->id }}">
                                <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                        <img src="{{ asset('storage/app/public/images/' . $class->name_files) }}" alt="" class="supImg w-full h-full object-cover object-center relative">
                        <a href="" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all">
                            <p class="itemClass w-3/4 py-2 text-white text-center font-bold bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                {{ $class->tag }} {{ $class->class }}
                            </p>
                        </a>
                    </div>
                @endforeach
                <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <button type="button" class="btrpp-ix block w-full h-full inset-0 absolute z-10" onclick="showPopUpForm(this); addVals(this);"></button>
                </div>
            </div>
        </div>
    </section>
    <section id="pop-upFormAdd" class="pop-upFormAdd hidden fixed w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50">
        <div class="mx-auto">
            <button id="btrpp" type="button" class="icon border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]" onclick="closePopUpForm(this)">
                <i class="bi bi-x text-5xl"></i>
            </button>
            <form action="/kelas/add/" method="POST" class="form-addClass space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="classList" id="classInput" value="VII">
                <div class="imgClass block">
                    <div class="group bg-white regular-shadow w-80 h-80 border-dashed rounded-2xl overflow-hidden relative mx-auto">
                        <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <label for="imgClass"  class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 cursor-pointer">
                                <i class="bi bi-pencil"></i>
                            </label>
                            <button type="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <img src="assets/img/main/126465066756.jpg" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50">
                        <label for="imgClass" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all cursor-pointer">
                            <label for="imgClass" class="itemClass w-3/4 py-2 text-white text-center font-bold cursor-pointer bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                <i class="bi bi-plus-circle text-lg"></i>
                                Add Image
                            </label>
                        </label>
                        <input type="file" name="imgClass" id="imgClass" accept="image/*" class="w-15 h-15 border border-black sr-only" onchange="previewFile(event)" value="">
                    </div>
                </div>
                <div class="teClass">
                    <div class="theLabels">
                        <label for="teacher" class="teachers font-bold">Wali Kelas</label>
                    </div>
                    <input type="text" name="teacher" id="teacher" class="border w-full py-2 px-4 rounded-lg">
                </div>
                <div class="tagClass">
                    <div class="theLabels">
                        <label for="tagClass" class="tagClass font-bold">Tag</label>
                    </div>
                    <input type="text" name="tagClass" id="tagClass" class="border w-full py-2 px-4 rounded-lg">
                </div>
                <div class="descClass">
                    <div class="theLabels">
                        <label for="desc" class="descClass font-bold" >Deskripsi Kelas</label>
                    </div>
                    <textarea name="desc" id="desc" rows="3" class="border w-full h-auto py-2 px-4 rounded-lg resize-none" maxlength="250"></textarea>
                </div>
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-blue-400"> Simpan </button>
            </form>
        </div>
    </section>
    <div id="overlayPopUp" class="overlayPopUp hidden w-full h-full bg-black/30 fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-40"></div>
@endsection
@section('custom-script')
    <script src="assets/js/students/grouplist.js"></script>
    <script src="assets/js/students/formsAdd.js"></script>
@endsection
