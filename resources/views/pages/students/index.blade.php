@extends('layouts.main.main')
@section('link-rel')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        @if (session('succedSomething'))
            <div class="confirmDelete min-w-[20rem] px-4 py-3 bg-green-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-check-circle-fill text-green-500"></i>
                    <p class="text-lg">{{ session('succedSomething') }}</p>
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
    <section class="img-classes flex items-center justify-center relative overflow-hidden  text-center text-white h-80 lg:h-[28rem]">
        <div class="lazy-placeholder animate-pulse w-full h-full absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-gray-300">
            <div class="txPlace absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex flex-col justify-center items-center gap-2">
                <div class="bg-gray-200 w-56 py-6 rounded-xl"></div>                
                <div class="bg-gray-200 w-32 py-2 rounded-md"></div>                
            </div>
        </div>
        <div class="cntnTopImage hidden">
            <div class="imgBgTop absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full -z-10">
                <div class="ovTop bg-black/60 w-full h-full absolute left-0 top-1/2 -translate-y-1/2"></div>
                <img src="{{asset('storage/images/classes/' . $classData->name_files) }}" alt="Gambar kelas {{$classData->class_grade}} {{$classData->class_tag}} Tahun {{$classData->year}}" class="w-full h-full object-cover object-center">            
            </div>
            <div class="content relative z-10">
                <h1 class="text-4xl font-bold">Kelas {{$teacherClass->class_grade}} {{$teacherClass->class_tag}}</h1>
                <p class="flex justify-end">{{$classData->year}}</p>
            </div>
        </div>
    </section>
    <section class="teachers-class mt-12 text-center text-xl font-bold space-y-4" data-teacher-id="{{$teacherClass->teacher_id}}">
        <div class="placeHolderTeacherClass space-y-2 animate-pulse">
            <div class="imgTe mx-auto w-52 lg:w-72 relative group">
                <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 relative bg-gray-200"></div>
            </div>
            <div class="bg-gray-200 w-32 py-4 mx-auto rounded-xl"></div>
            <div class="socmedTe space-x- text-2xl group-">
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
            </div>
        </div>
        <div class="contentTeachersClass hidden">
            <div class="imgTe mx-auto w-52 lg:w-72 relative group">
                <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 relative">
                    <img src="{{asset('storage/images/teachers/' . $teacherClass->name_files)}}" alt="" class="w-full h-full object-cover object-center rounded-[100%]">
                </div>
                <div class="editImgTe absolute right-[5%] top-[15%] -translate-x-[5%] -translate-y-[15%] opacity-0 transition-opacity group-hover:opacity-100">
                    <span role="button" class="editBImgTeacher bg-white p-2 rounded-lg hover:bg-gray-200">
                        <i class="bi bi-pencil"></i>
                    </span>
                </div>
            </div>
            <h2> {{$teacherClass->name}} </h2>
            <div class="socmedLiTe space-x- text-2xl group-">
                @if ($teacherSocmed->facebook)
                    <a href="{{$teacherSocmed->facebook}}" class="inline-block p-2 rounded-xl hover:opacity-70">
                        <i class="bi bi-facebook"></i>
                    </a>
                @endif
                @if ($teacherSocmed->instagram)
                    <a href="{{$teacherSocmed->instagram}}" class="inline-block p-2 rounded-xl hover:opacity-70">
                        <i class="bi bi-instagram"></i>
                    </a>
                @endif
                @if ($teacherSocmed->twitter)
                    <a href="{{$teacherSocmed->twitter}}" class="inline-block p-2 rounded-xl hover:opacity-70">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                @endif
                @if ($teacherSocmed->tiktok)
                    <a href="{{$teacherSocmed->tiktok}}" class="inline-block p-2 rounded-xl hover:opacity-70">
                        <i class="bi bi-tiktok"></i>
                    </a>
                @endif
                @if ($teacherSocmed->youtube)
                    <a href="{{$teacherSocmed->youtube}}" class="inline-block p-2 rounded-xl hover:opacity-70">
                        <i class="bi bi-youtube"></i>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <section class="frmAddStnds mt-12">
        <div class="title-students text-2xl flex items-center px-6 md:px-12 gap-6 py-4 font-bold border-b-4 border-black relative">
            <form action="" method="POST" enctype="multipart/form-data" class="sr-only">
                @csrf
                <input type="file" name="fmt_Excel" id="fmtExcel" accept=".xlsx, .xls" value="" class="sr-only" onchange="openExcelPopUp(this)">
                <button type="submit" id="sbFmtExcel" class="sr-only"></button>
            </form>
            <span role="button" type="button" class="btrinp-file text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100">
                <i class="bi bi-file-earmark-arrow-up-fill md:mr-2 text-2xl text-gray-600"></i>
                <p class="hidden md:block">File</p>
            </span>
            <span role="button" id="btrcr-fm" class="btrcr-fm text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100">
                <i class="bi bi-plus-circle md:mr-2 text-2xl"></i>
                <p class="hidden md:block">Siswa</p>
            </span>
        </div>
    </section>
    <section class="listStudents mt-8 px-4 space-y-12">
        {{-- <div class="list-items flex flex-wrap gap-5"> --}}
        <div class="list-student mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
            @if ($listStudents !== null)
                @foreach ($listStudents as $student)
                    <div class="itemStudent relative group transition-all overflow-hidden duration-500" aria-haspopup="true">
                        <div class="questionSummaryStudent items-center absolute p-2 rounded-bl-xl bg-white right-0 translate-x-0 z-20 border-l border-b hidden">
                            <div class="button-editDel text-sm md:text-base -z-10 flex items-center absolute rounded-l-lg bg-white overflow-hidden -right-full top-0 md:top-auto translate-x-full group-hover:right-[29%] md:group-hover:right-[36%] group-hover:-translate-x-[29%] md:group-hover:-translate-x-[36%] transition-all">
                                <span role="button" class="editBtStudent px-3 flex bg-white p-2 hover:bg-gray-200" data-student-id="{{$student->student_id}}">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span role="button" class="delBtStudent px-3 flex bg-white p-2 hover:bg-gray-200" data-student-id="{{$student->student_id}}">
                                    <i class="bi bi-trash3"></i>
                                </span>
                                {{-- <form action="/kelas/studentlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="classId" value="{{$student->student_id}}">
                                    <button type="submit" class="cursor-pointer px-3 flex bg-white p-2 hover:bg-gray-200" data-student-id="{{$student->student_id}}">
                                        <i class="bi bi-trash3" ></i>
                                    </button>
                                </form> --}}
                            </div>
                            <div class="icnQs">
                                <span role="button" class="icnQsStudentInfo cursor-pointer md:p-1 flex hover:opacity-30" data-student-id="{{$student->student_id}}">
                                    <i class="bi bi-question-circle-fill md:text-2xl" ></i>                                    
                                </span>
                                {{-- <form action="/kelas/info" method="POST">
                                    @csrf
                                    <input type="hidden" name="classId" value="{{$class->class_id}}">
                                    <button type="submit" class="cursor-pointer p-1 flex hover:opacity-30" data-class-id="{{$class->class_id}}">
                                        <i class="bi bi-question-circle-fill text-2xl" ></i>
                                    </button>
                                </form> --}}
                            </div>
                        </div>
                        <div class="contentStudent group aspect-[3/4] bg-white regular-shadow border rounded-md md:rounded-2xl overflow-hidden relative" data-student-id={{$student->student_id}}>
                            <div class="lazy-placeholder w-full h-full animate-pulse relative">
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
                            <div class="contentItems w-full h-full hidden" data-student-id={{$student->student_id}}>
                                {{-- <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                    <span role="button" class="editBtClass border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span role="button" class="delBtClass border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                        <i class="bi bi-trash3"></i>
                                    </span>
                                </div> --}}
                                <img src="{{asset('storage/images/students/' . $student->name_files)}}" alt="" class="supImg w-full h-full object-cover object-center relative" loading="lazy">
                                <div class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-student-id={{$student->student_id}} data-nis="{{$student->nis}}">
                                    <p class="nameStudent w-full md:w-3/4 py-2 text-center text-sm md:text-base font-bold bg-white md:rounded-xl z-10 absolute bottom-0 md:-bottom-full left-1/2 -translate-y-0 md:translate-y-full -translate-x-1/2 transition-all md:group-hover:bottom-[5%] md:group-hover:-translate-y-[5%]">{{$student->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="noStudent group bg-gray-300 regular-shadow border rounded-2xl relative py-6" style="grid-column: 1 / -1">
                    <div>
                        <div class="rounded w-fit mx-auto relative p-4">
                            <i class="bi bi-people-fill text-gray-400 flex" style="font-size: 16rem"></i>
                            <div class="questionMark absolute right-0 bottom-[5%] -translate-x-0 -translate-y-[5%] bg-gray-300 p-2 rounded-xl">
                                <i class="bi bi-question-circle-fill text-gray-500 flex" style="font-size: 4rem"></i>
                            </div>
                        </div>
                        <div class="bg-gray-200 w-3/4 mx-auto py-6 text-center rounded-xl">
                            <strong>Tidak ada siswa saat ini</strong>
                        </div>
                    </div>
                </div>
            @endif
            <div class="group aspect-[3/4] bg-white regular-shadow flex justify-center items-center border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                <div class="add-icon">
                    <i class="bi bi-plus-circle text-4xl md:text-8xl opacity-50"></i>
                </div>
                <span role="button" class="buttonAddStudent block w-full h-full inset-0 absolute z-10"></span>
            </div>
        </div>
    </section>
    <section id="pop-upFormAddStudent" class="pop-upFormAddStudent fixed w-full lg:w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white lg:border lg:border-black rounded-2xl overflow-auto z-50" style="display: none">
        <div class="hdrPopup py-4">
            <div class="titlePopupAdd">
                <div class="t text-2xl">
                    <strong>Tambah Siswa</strong>
                </div>
            </div>
            <div class="clsFrmAdd">
                <span role="button" id="btrpp-clsFrm" type="button" class="icon rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]">
                    <i class="bi bi-x text-5xl"></i>
                </span>
            </div>
        </div>
        {{-- <div class="lazyLoadFormStudent animate-pulse">
            <div class="topLoad">
                <div class="aspect-square w-full md:w-80 bg-gray-200 rounded-xl mx-auto"></div>
            </div>
            <div class="middleLoad mt-4">
                <div class="flex flex-col-reverse lg:flex-row lg:items-center gap-2">
                    <div class="w-full space-y-1.5">
                        <div class="w-32 h-6 bg-gray-200 rounded-lg"></div>
                        <div class="w-full h-12 bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="space-y-1.5">
                        <div class="w-24 h-6 bg-gray-200 rounded-lg"></div>
                        <div class="flex-shrink-0 w-48 h-12 bg-gray-200 rounded-lg"></div>
                    </div>
                </div>
                <div class="w-full mt-4 space-y-1.5">
                    <div class="w-32 h-6 bg-gray-200 rounded-lg"></div>
                    <div class="w-full h-12 bg-gray-200 rounded-lg"></div>
                </div>
            </div>
            <div class="bottomLoad mt-12">
                <div class="w-24 h-10 bg-gray-200 rounded-lg"></div>
                <div class="grid 2xl:grid-cols-2 gap-4 px-4 mt-6">
                    <div class="inline-flex items-center gap-2">
                        <div class="w-12 h-12 bg-gray-200 rounded-[100%]"></div>
                        <div class="w-24 lg:w-32 h-8 bg-gray-200 rounded-lg"></div>
                        <div class="w-20 h-8 bg-gray-200 rounded-full"></div>
                    </div>
                    <div class="inline-flex items-center gap-2">
                        <div class="w-12 h-12 bg-gray-200 rounded-[100%]"></div>
                        <div class="w-20 lg:w-40 h-8 bg-gray-200 rounded-lg"></div>
                        <div class="w-20 h-8 bg-gray-200 rounded-full"></div>
                    </div>
                    <div class="inline-flex items-center gap-2">
                        <div class="w-12 h-12 bg-gray-200 rounded-[100%]"></div>
                        <div class="w-28 lg:w-48 h-8 bg-gray-200 rounded-lg"></div>
                        <div class="w-20 h-8 bg-gray-200 rounded-full"></div>
                    </div>
                    <div class="inline-flex items-center gap-2">
                        <div class="w-12 h-12 bg-gray-200 rounded-[100%]"></div>
                        <div class="w-24 lg:w-36 h-8 bg-gray-200 rounded-lg"></div>
                        <div class="w-20 h-8 bg-gray-200 rounded-full"></div>
                    </div>
                    <div class="inline-flex items-center gap-2">
                        <div class="w-12 h-12 bg-gray-200 rounded-[100%]"></div>
                        <div class="w-24 h-8 bg-gray-200 rounded-lg"></div>
                        <div class="w-20 h-8 bg-gray-200 rounded-full"></div>
                    </div>
                </div>
            </div>
            <div class="w-36 h-11 rounded-lg bg-gray-200 mx-auto mt-6"></div>
        </div> --}}
        <div class="frmAddStudent mx-auto" style="display: none">
            <form action="" method="POST" class="form-addClass space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="_tokenFormStudent" name="_tokenFormStudent">
                <div class="frmStdnt">
                    <div class="imgStudent block">
                        <div class="group bg-white regular-shadow aspect-square aspect-[1/1] w-full md:w-80 border-dashed rounded-2xl overflow-hidden relative mx-auto">
                            <div class="btnResetImage flex absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                <span role="button" id="resetImageStudent" class="resetImageStudent border border-black bg-white p-0.5 rounded-lg hover:bg-gray-200 text-2xl">
                                    <i class="bi bi-arrow-clockwise flex"></i>
                                </span>
                            </div>
                            <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50">
                            <label for="imgFrmStudent" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all cursor-pointer">
                                <label for="imgFrmStudent" class="itemClass w-3/4 py-2 text-center font-bold cursor-pointer bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                    <i class="bi bi-plus-circle text-lg"></i>
                                    Add Image
                                </label>
                            </label>
                            <input type="file" name="imgFrmStudent" id="imgFrmStudent" accept="image/*" class="w-15 h-15 border border-black sr-only" value="">
                        </div>
                    </div>
                    <div class="nmeAndNisStdnt space-y-2">
                        <div class="nameWithClassStudent flex flex-col-reverse lg:flex-row lg:items-center gap-2">
                            <div class="nameStudent w-full">
                                <div class="theLabels">
                                    <label for="nameFrmStudent" class="nameFrmStudent font-bold">Nama Siswa</label>
                                </div>
                                <input type="text" name="nameFrmStudent" id="nameFrmStudent" class="border w-full py-2 px-4 rounded-lg">
                            </div>
                            <div class="classStudent flex-shrink-0 w-48">
                                <div class="thHeadClass font-bold">
                                    <p>Kelas</p>
                                </div>
                                <div class="t">
                                    <p class="border w-full py-2 px-4 rounded-lg text-gray-500">{{$classGrade}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="nisStudent">
                            <div class="theLabels">
                                <label for="nisFrmStudent" class="nisFrmStudent font-bold">NIS Siswa</label>
                            </div>
                            <input type="text" name="nisFrmStudent" id="nisFrmStudent" class="border w-full py-2 px-4 rounded-lg">
                        </div>
                    </div>
                    <div class="lnkSocmedStudent mt-8">
                        <div class="cntnLnkSocmedStudent">
                            <div class="tiLnkSocmedStudent">
                                <div class="txt">
                                    <strong class="font-bold text-2xl">
                                        Link
                                    </strong>
                                </div>
                            </div>
                            <div class="cntnLnk mt-6 px-4">
                                <ul class="list-link-form grid 2xl:grid-cols-2 gap-4" role="list">
                                    <li class="link-item" role="listitem">
                                        <div class="overflow-hidden ">
                                            <div class="cntnItem flex items-center gap-4">
                                                <i class="bi bi-facebook text-2xl md:text-3xl"
                                                    aria-hidden="true"></i>
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="facebook-active" class="text-sm md:text-base">Facebook</label>
                                                            <label for="facebook-active" class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                    <span class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="facebook-active" id="facebook-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Facebook Account">
                                                    </div>
                                                    <div class="inpLnkFacebook">
                                                        <input type="text" name="facebookLink" id="facebookLink" class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
                                                            aria-label="Facebook Link">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="link-item" role="listitem">
                                        <div class="overflow-hidden">
                                            <div class="cntnItem flex items-center gap-4">
                                                <i class="bi bi-instagram text-2xl md:text-3xl"
                                                    aria-hidden="true"></i>
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="instagram-active"
                                                                class="text-sm md:text-base">Instagram</label>
                                                            <label for="instagram-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="instagram-active"
                                                            id="instagram-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Instagram Account">
                                                    </div>
                                                    <div class="inpLnkinstagram">
                                                        <input type="text" name="instagramLink"
                                                            id="instagramLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
                                                            aria-label="Instagram Account">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="link-item" role="listitem">
                                        <div class="overflow-hidden">
                                            <div class="cntnItem flex items-center gap-4">
                                                <i class="bi bi-twitter-x text-2xl md:text-3xl"
                                                    aria-hidden="true"></i>
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="twitter-active"
                                                                class="text-sm md:text-base">Twitter</label>
                                                            <label for="twitter-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span
                                                                        class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="twitter-active"
                                                            id="twitter-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Twitter Account">
                                                    </div>
                                                    <div class="inpLnkTwitter">
                                                        <input type="text" name="twitterLink" id="twitterLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
                                                            aria-label="Twitter Link">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="link-item" role="listitem">
                                        <div class="overflow-hidden">
                                            <div class="cntnItem flex items-center gap-4">
                                                <i class="bi bi-tiktok text-2xl md:text-3xl"
                                                    aria-hidden="true"></i>
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="tiktok-active"
                                                                class="text-sm md:text-base">Tiktok</label>
                                                            <label for="tiktok-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span
                                                                        class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="tiktok-active"
                                                            id="tiktok-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Tiktok Account">
                                                    </div>
                                                    <div class="inpLnkTiktok">
                                                        <input type="text" name="tiktokLink" id="tiktokLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
                                                            aria-label="Tiktok Link">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="link-item" role="listitem">
                                        <div class="overflow-hidden">
                                            <div class="cntnItem flex items-center gap-4">
                                                <i class="bi bi-youtube text-2xl md:text-3xl" aria-hidden="true"></i>
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="youtube-active"
                                                                class="text-sm md:text-base">Youtube</label>
                                                            <label for="youtube-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span
                                                                        class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="youtube-active" id="youtube-active" value="" class="checkboxActiveLink hidden" aria-checked="false" aria-label="Youtube Account">
                                                    </div>
                                                    <div class="inpLnkYoutube">
                                                        <input type="text" name="youtubeLink" id="youtubeLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
                                                            aria-label="Youtube Account">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-blue-400"> Simpan </button>
            </form>
        </div>
    </section>
    <div class="detailShowStudent" id="detailShowStudent" role="dialog" style="display: none;">
        <div class="rootShowDetails rootPopDetails w-full h-full max-h-fit lg:h-fit lg:w-1/3 bg-white shadow-slate-950 shadow-md fixed pb-8 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 rounded-lg overflow-hidden">
            <div class="heaAbtSumTeDats flex items-center justify-between text-2xl sticky w-full left-0 top-0 pt-4 xl:pt-12 pb-2 px-8">
                <div class="tiAbt">
                    <div class="txt">
                        <strong>Tentang</strong>
                    </div>
                </div>
                <div class="x-close-btn">
                    <div class="btnX">
                        <span role="button" class="overflow-hidden aspect-square items-center block" id="clsPop-sumTeDats">
                            <i class="bi bi-x text-4xl"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="contentShowStudent">
                <div class="contentWrapperShow h-[30rem] xl:h-[32rem] 2xl:h-[36rem] overflow-y-scroll p-8 text-sm xl:text-base">
                    <div class="contentDisplayDetails" style="display: none;">
                        <div class="abtSumEks">
                            <div class="cntnAbtSumEks overflow-hidden">
                                <div class="imgWthNameTeDats block">
                                    <div class="thImgStud mx-auto aspect-square border-2 w-52 rounded-[100%] overflow-hidden p-1">
                                        <img src="" alt=" Image" class="h-full w-full object-cover object-center rounded-[100%]" id="popupImageStudent">
                                    </div>
                                    <div class="nmeStudWthEdDel space-y-2">
                                        <div class="nmeStud" aria-label="Name student">
                                            <div class="tlStd">
                                                <div class="t text-2xl">
                                                    <strong>Nama</strong>
                                                </div>
                                            </div>
                                            <div class="nme">
                                                <div class="txt">
                                                    <p class="text-lg" id="nameShowStudents" data-value="">namanya</p>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="edDelStud flex items-center gap-2">
                                            <div class="btEdStudDats">
                                                <span role="button" id="editStudents"
                                                    class="border-2 px-6 py-1 rounded-md block" title=""
                                                    data-show-item-id="" data-show-item-name="">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Edit</p>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="btDelStudDats">
                                                <span role="button" class="border-2 px-6 py-1 rounded-md block"
                                                    aria-label="Delete" title="" data-show-item-id=""
                                                    data-show-item-name="">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Hapus</p>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="displayLnkSumStudDats mt-8">
                            <div class="cntnDisplayLnkSumStudDats ">
                                <div class="tiDisplayLnkSumStudDats">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Link
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnLnk mt-6 px-4">
                                    <ul class="list-link-display grid 2xl:grid-cols-2 gap-4" role="list">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="dtlSumStudDats mt-8">
                            <div class="cntnDtlSumStudDats ">
                                <div class="tiDtlSumStudDats">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Detail Studnaga Kependidikan
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnDtl mt-6 px-4">
                                    <ul class="list-data-student space-y-3">
                                        <li class="itemEmailStudent"></li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-people text-2xl md:text-3xl" title="Status"
                                                        aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="statusDisplayStudents" data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-briefcase text-2xl md:text-3xl" title="Bidang"
                                                        aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="sectorDisplayStudents"
                                                            data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-clock-history text-2xl md:text-3xl"
                                                        title="Tahun Studrdaftar" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="yearsDisplaySignStudents"
                                                            data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foo mb-96"></div>
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/students/student.js')}}"></script>
    <script src="{{asset('assets/js/students/studentLinkActive.js')}}"></script>
    <script src="{{asset('assets/js/students/studentLazy.js')}}"></script>
    <script src="{{asset('assets/js/students/studentForm.js')}}"></script>
    <script src="{{asset('assets/js/students/studentImagePreview.js')}}"></script>
    {{-- <script src="assets/js/students/formsInpExcel.js"></script>
    <script src="assets/js/students/grouplist.js"></script>
    <script src="assets/js/students/formsAdd.js"></script> --}}
@endsection
