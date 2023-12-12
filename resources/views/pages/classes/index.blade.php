@extends('layouts.main.main')
@section('link-rel')
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
        #classYear::-webkit-outer-spin-button, #classYear::-webkit-inner-spin-button{-webkit-appearance: none; margin:0;}
    </style>
@endsection
@section('content')
    <div class="alertContent fixed right-0 z-[9999] space-y-2 text-2xl">
        @if (session('errorSomething'))
            <div class="errorDelete min-w-[20rem] px-4 py-3 bg-red-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-x-circle-fill text-red-500"></i>
                    <p class="text-lg">{{ session('errorSomething') }}</p>
                </div>
            </div>
        @endif
        @if (session('successAdd'))
            <div class="confirmDelete min-w-[20rem] px-4 py-3 bg-green-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-check-circle-fill text-green-500"></i>
                    <p class="text-lg">{{ session('successAdd') }}</p>
                </div>
            </div>
        @endif
        @if (session('updateSomething'))
            <div class="confirmUpdate min-w-[20rem] px-4 py-3 bg-blue-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-upload text-blue-700"></i>
                    <p class="text-lg">{{ session('updateSomething') }}</p>
                </div>
            </div>
        @endif
    </div>
    
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
                <span role="button" class="btrpp-vii text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100" data-class-grade='VII'>
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </span>
                <span role="button" class="expandList p-1 float-right absolute right-0 -rotate-90 transition-all duration-300" >
                    <i class="bi bi-chevron-left text-4xl"></i>
                </span>
            </div>
            <div class="list mt-6 grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
                @foreach ($tempClassVII as $class)
                    <div class="group aspect-[3/4] bg-white regular-shadow border rounded-2xl overflow-hidden relative">
                        <div class="lazy-placeholder w-full h-full animate-pulse relative hidden">
                            <div class="flex items-center justify-center w-full h-full bg-gray-300 rounded">
                                <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                </svg>
                            </div>
                            <div class="lzLR flex items-center gap-2 absolute bg-gray-200 py-1 px-4 rounded-xl right-[5%] top-[5%] -translate-x-[5%] -translate-y-[5%] ">
                                <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                                <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                            </div>
                            <div class="bg-gray-200 w-3/4 py-6 rounded-xl absolute bottom-[5%] left-1/2 -translate-y-[5%] -translate-x-1/2"></div>
                        </div>
                        <div class="contentItems w-full h-full">
                            <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                    <span role="button" class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-trash3"></i>
                                    </span>
                                </div>
                            </div>
                            <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                            <a href="" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}">
                                <p class="itemClass w-3/4 py-2 text-center font-bold bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                    {{$class->class_grade . ' ' . $class->class_tag}}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
                
                {{-- <div class="group bg-white regular-shadow flex justify-center items-center w-48 h-64 border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <span role="button" class="btrpp-viii block w-full h-full inset-0 absolute z-10" onclick="showPopUpForm(this); addVals(this);"></span>
                </div> --}}
            </div>
        </div>
        <div class="class-viii">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <p>Kelas VIII</p>
                <span role="button" class="btrpp-viii text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100" data-class-grade='VIII'>
                    <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                    Kelas
                </span>
                <span role="button" class="expandList p-1 float-right absolute right-0 -rotate-90 transition-all duration-300" >
                    <i class="bi bi-chevron-left text-4xl"></i>
                </span>
            </div>
            <div class="list mt-6 grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
                @foreach ($tempClassVIII as $class)
                    <div class="group aspect-[3/4] bg-white regular-shadow border rounded-2xl overflow-hidden relative">
                        <div class="lazy-placeholder w-full h-full animate-pulse relative hidden">
                            <div class="flex items-center justify-center w-full h-full bg-gray-300 rounded">
                                <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                </svg>
                            </div>
                            <div class="lzLR flex items-center gap-2 absolute bg-gray-200 py-1 px-4 rounded-xl right-[5%] top-[5%] -translate-x-[5%] -translate-y-[5%] ">
                                <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                                <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                            </div>
                            <div class="bg-gray-200 w-3/4 py-6 rounded-xl absolute bottom-[5%] left-1/2 -translate-y-[5%] -translate-x-1/2"></div>
                        </div>
                        <div class="contentItems w-full h-full">
                            <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                    <span role="button" class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-trash3"></i>
                                    </span>
                                </div>
                            </div>
                            <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                            <a href="" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}">
                                <p class="itemClass w-3/4 py-2 text-center font-bold bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                    {{$class->class_grade . ' ' . $class->class_tag}}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="class-ix">
            <div class="title-class flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <p class="flex-shrink-0 text-2xl">Kelas IX</p>
                <div class="spanButton flex items-center justify-between w-full relative">
                    <span role="button" class="btrpp-ix text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100" data-class-grade='IX'>
                        <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                        <p>Kelas</p>
                    </span>
                    <div class="makeAlumniWthExpand flex items-center gap-4 relative">
                        <div class="relative">
                            <span role="button" class="expandList p-1 flex items-center gap-1">
                                <i class="bi bi-mortarboard text-4xl border-r-2 px-4"></i>
                                <p>Jadikan Alumni</p>
                            </span>    
                        </div>
                        <div class="relative block w-12">
                            <span role="button" class="expandList p-1 block absolute left-0 top-1/2 -translate-x-0 -translate-y-1/2 -rotate-90 transition-all duration-300" >
                                <i class="bi bi-chevron-left text-4xl"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list mt-6 grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
                @foreach ($tempClassIX as $class)
                    <div class="group aspect-[3/4] bg-white regular-shadow border rounded-2xl overflow-hidden relative">
                        <div class="lazy-placeholder w-full h-full animate-pulse relative hidden">
                            <div class="flex items-center justify-center w-full h-full bg-gray-300 rounded">
                                <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                </svg>
                            </div>
                            <div class="lzLR flex items-center gap-2 absolute bg-gray-200 py-1 px-4 rounded-xl right-[5%] top-[5%] -translate-x-[5%] -translate-y-[5%] ">
                                <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                                <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                            </div>
                            <div class="bg-gray-200 w-3/4 py-6 rounded-xl absolute bottom-[5%] left-1/2 -translate-y-[5%] -translate-x-1/2"></div>
                        </div>
                        <div class="contentItems w-full h-full">
                            <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                    <span role="button" class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-trash3"></i>
                                    </span>
                                </div>
                            </div>
                            <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                            <a href="" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}">
                                <p class="itemClass w-3/4 py-2 text-center font-bold bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                    {{$class->class_grade . ' ' . $class->class_tag}}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="pop-upFormAdd" class="pop-upFormAdd lozad fixed w-full xl:w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50 hidden">
        <div class="mx-auto">
            <span role="button" id="closeForm" type="button" class="icon border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]">
                <i class="bi bi-x text-5xl"></i>
            </span>
            <form action="{{ route('storeClass') }}" method="POST" class="form-addClass space-y-6" enctype="multipart/form-data">
                @csrf
                <div class="imgClass block">
                    <div class="group bg-white regular-shadow w-80 h-80 border-dashed rounded-2xl overflow-hidden relative mx-auto">
                        <div class="button-editDel flex items-center gap-2 absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <label for="imgClass"  class="editB block border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-pencil"></i>
                            </label>
                            <span role="button" type="button" id="resetImageClass" class="resetImageClass block border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-arrow-repeat"></i>
                            </span>
                        </div>
                        <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50">
                        <label for="imgClass" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all cursor-pointer">
                            <label for="imgClass" class="itemClass w-3/4 py-2 text-center font-bold cursor-pointer bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                <i class="bi bi-plus-circle text-lg"></i>
                                Add Image
                            </label>
                        </label>
                        <input type="file" name="imgClass" id="imgClass" value="" accept="image/*" class="w-15 h-15 border border-black sr-only" onchange="previewFile(event)" value="">
                    </div>
                </div>
                <div class="teClass">
                    <div class="imgSelectTeachers flex items-center gap-4">
                        <div class="img flex-shrink-0 aspect-square w-40 rounded-[100%] p-1">
                            <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full object-center object-cover rounded-[100%]" id="teacherSelectedImage">
                        </div>
                        <div class="slctTeacherAndChseClass w-full space-y-4">
                            <div class="selectTeachers">
                                <div class="theLabels">
                                    <label for="teacherList" class="teachers font-bold">Wali Kelas</label>
                                </div>
                                <select name="teacherList" id="teacherList" class="w-full px-6 py-2 rounded-lg" required>
                                    <option value="" selected disabled>Pilih Guru</option>
                                </select>
                            </div>
                            <div class="chseClass flex items-center gap-3">
                                <label for="chooseClassVii" class="chooseClass block relative font-bold" data-class-grade='VII'>
                                    <div class="chsClassVii elemRdChsClass w-24 py-2 px-2 border border-gray-400 rounded-lg hover:bg-blue-100 cursor-pointer">
                                        <div class="t">
                                            <p>VII</p>
                                        </div>
                                    </div>
                                    <input type="radio" name="chooseClass" id="chooseClassVii" value="VII" class="hidden sr-only" style="display: hidden;" required>
                                </label>
                                <label for="chooseClassViii" class="chooseClass block relative font-bold" data-class-grade='VIII'>
                                    <div class="chsClassViii elemRdChsClass w-24 py-2 px-2 border border-gray-400 rounded-lg hover:bg-blue-100 cursor-pointer">
                                        <div class="t">
                                            <p>VIII</p>
                                        </div>
                                    </div>
                                    <input type="radio" name="chooseClass" id="chooseClassViii" value="VIII" class="hidden sr-only" style="display: hidden;">
                                </label>
                                <label for="chooseClassIx" class="chooseClass block relative font-bold" data-class-grade='IX'>
                                    <div class="chsClassIx elemRdChsClass w-24 py-2 px-2 border border-gray-400 rounded-lg hover:bg-blue-100 cursor-pointer">
                                        <div class="t">
                                            <p>IX</p>
                                        </div>
                                    </div>
                                    <input type="radio" name="chooseClass" id="chooseClassIx" value="IX" class="hidden sr-only" style="display: hidden;">
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- <input type="text" id="teacher" class="border w-full py-2 px-4 rounded-lg"> --}}
                </div>
                <div class="tagAndClassYear flex items-center gap-3">
                    <div class="tagClass block flex-grow">
                        <div class="theLabels">
                            <label for="tagClass" class="tagClass font-bold">Tag</label>
                        </div>
                        <input type="text" name="tagClass" id="tagClass" class="border w-full py-2 px-4 rounded-lg" required>
                    </div>
                    <div class="classYear block flex-grow">
                        <div class="theLabels">
                            <label for="classYear" class="tagClass font-bold">Tahun Angkatan</label>
                        </div>
                        <input type="number" min="1900" max="" maxlength="4" name="classYear" id="classYear" class="border w-full py-2 px-4 rounded-lg" style="" required>
                    </div>
                </div>
                <div class="descClass">
                    <div class="theLabels">
                        <label for="descClass" class="descClass font-bold" >Deskripsi Kelas</label>
                    </div>
                    <textarea name="descClass" id="descClass" rows="3" class="border w-full h-auto py-2 px-4 rounded-lg resize-none" maxlength="250"></textarea>
                </div>
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-blue-400"> Simpan </button>
            </form>
        </div>
    </section>
    <div id="overlayPopUp" class="overlayPopUp hidden w-full h-full bg-black/30 fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-40"></div>
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/students/grouplist.js')}}"></script>
    <script src="{{asset('assets/js/students/form.js')}}"></script>
    {{-- <script src="assets/js/students/formsAdd.js"></script> --}}
@endsection
