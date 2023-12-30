@extends('layouts.main.main')
@section('link-rel')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
        #classYear::-webkit-outer-spin-button, #classYear::-webkit-inner-spin-button{-webkit-appearance: none; margin:0;}
        
        @keyframes bounce {
            0%, 100% {
                transform: translateY(-40%);
                animation-timing-function: cubic-bezier(0.8,0,1,1);
            }
            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0,0,0.2,1);
            }
        }
        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }
        
        @keyframes animateBlur{
            50% {
                filter: blur(4px);
            }
        }
        
        
        .animation-loading {
            animation: bounce 1s infinite, pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        .animation-blur{
            animation: animateBlur 1s infinite;
        }
        .shortListStudent::-webkit-scrollbar-thumb { background-color: rgb(255, 204, 145);}
    </style>
@endsection
@section('content')
    <div class="alertContent fixed right-0 top-4 md:right-4 z-[9999] space-y-2 text-2xl">
        @if (session('errorSomething'))
            <div class="errorDelete min-w-[20rem] px-4 py-3 bg-red-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-x-circle-fill text-red-500"></i>
                    <p class="text-lg">{{ session('errorSomething') }}</p>
                </div>
            </div>
        @endif
        @if (session('successAdd'))
            <div class="succedSomething text-green-950 w-full lg:w-[26rem] px-4 py-3 bg-green-100 border-l-4 border-green-600 rounded-md transition-all translate-x-[125%]" role="alert" aria-live="assertive">
                <div class="titleConfirmHide flex items-center gap-4">
                    <i class="bi bi-check-circle-fill text-green-700"></i>
                    <p class="text-lg">Kelas berhasil ditambahkan</p>
                </div>
                <div class="cntnWht ml-6 mt-2">
                    <div class="infoWhatClassHide flex flex-col md:flex-row md:gap-4">
                        <div class="icn flex items-center gap-2">
                            <i class="bi bi-info-circle-fill text-lg text-green-700"></i>
                            <p class="text-base block md:hidden">Info</p>
                        </div>
                        <div class="text-base">
                            <ul class="text-sm">
                                <li class="flex items-center">
                                    <i class="dotList shrink-0 bg-green-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                    <div class="itm"><p>Kelas <strong>{{ session('successAdd')['classes'] }} {{ session('successAdd')['year'] }}</strong> berhasil ditambahkan</p></div>
                                </li>
                                <li class="flex items-center">
                                    <i class="dotList shrink-0 bg-green-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                    <div class="itm"><p><strong>{{ session('successAdd')['teacherName'] }}</strong> dijadikan wali kelas</p></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (session('updateSomething'))
            <div class="updateSomething text-blue-950 w-full lg:w-[26rem] px-4 py-3 bg-blue-100 border-l-4 border-blue-600 rounded-md transition-all" role="alert" aria-live="assertive">
                <div class="titleConfirmHide flex items-center gap-4">
                    <i class="bi bi-upload text-blue-700"></i>
                    <p class="text-lg">Kelas berhasil diperbaharui</p>
                </div>
                <div class="cntnWht ml-6 mt-2">
                    <div class="infoWhatClassHide flex flex-col md:flex-row md:gap-4">
                        <div class="icn flex items-center gap-2">
                            <i class="bi bi-info-circle-fill text-lg text-blue-700"></i>
                            <p class="text-base block md:hidden">Info</p>
                        </div>
                        <div class="text-base">
                            <ul class="text-sm">
                                @if (isset(session('updateSomething')['teacher_id']))
                                    <li class="flex items-center">
                                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                        <div class="itm"><p>{!!session('updateSomething')['teacher_id']!!}</p></div>
                                    </li>
                                @endif
                                @if (isset(session('updateSomething')['class_grade']))
                                    <li class="flex items-center">
                                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                        <div class="itm"><p>{!! session('updateSomething')['class_grade'] !!}</p></div>
                                    </li>
                                @endif
                                @if (isset(session('updateSomething')['class_tag']))
                                    <li class="flex items-center">
                                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                        <div class="itm"><p>{!! session('updateSomething')['class_tag'] !!}</p></div>
                                    </li>
                                @endif
                                @if (isset(session('updateSomething')['description']))
                                    <li class="flex items-center">
                                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                        <div class="itm"><p>{!! session('updateSomething')['description'] !!}</p></div>
                                    </li>
                                @endif
                                @if (isset(session('updateSomething')['year']))
                                    <li class="flex items-center">
                                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                        <div class="itm"><p>{!! session('updateSomething')['year'] !!}</p></div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
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
                <img src="{{asset('assets/img/main/126465066756.jpg')}}" alt="" class="w-full h-full object-cover object-center">            
            </div>
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Daftar Kelas</h1>
                <h2 class="text-xl">Profil/Siswa</h2>
            </div>
        </div>
    </section>
    <section class="listClass mt-12 md:px-12 py-20 space-y-12 px-4">
        <div class="class-vii">
            <div class="title-class-ndExpand text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <div class="tlClass flex flex-col md:flex-row md:items-center md:gap-6">
                    <p>Kelas VII</p>
                    <span role="button" class="btrpp-vii text-sm py-1 md:py-2 px-3 md:px-6 border-2 rounded-lg flex items-center hover:bg-gray-100" data-class-grade='VII'>
                        <i class="bi bi-plus-circle mr-2 text-xl md:text-2xl"></i>
                        <p>Kelas</p>
                    </span>
                </div>
                <span role="button" class="expandList p-1 float-right absolute right-0 -rotate-90 transition-all duration-300" >
                    <i class="bi bi-chevron-left text-4xl"></i>
                </span>
            </div>
            <div class="list-class mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
                @foreach ($tempClassVII as $class)
                    <div class="itemClass relative group overflow-hidden transition-all duration-500" data-class-id="{{$class->class_id}}">
                        <div class="questionSummaryClass items-center absolute p-2 rounded-bl-xl bg-white right-0 translate-x-0 z-20 border-l border-b hidden">
                            <div class="button-editDel -z-10 flex items-center absolute rounded-l-lg bg-white overflow-hidden -right-full translate-x-full group-hover:right-[36%] group-hover:-translate-x-[36%] transition-all">
                                <span role="button" class="editBtClass px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span role="button" class="delBtClass px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-trash3"></i>
                                </span>
                                {{-- <form action="/kelas/studentlist" method="POST">
                                    @csrf
                                    <input type="hidden" name="classId" value="{{$class->class_id}}">
                                    <button type="submit" class="cursor-pointer px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                        <i class="bi bi-trash3" ></i>
                                    </button>
                                </form> --}}
                            </div>
                            <div class="icnQs">
                                <span role="button" class="icnQsClassInfo cursor-pointer p-1 flex hover:opacity-30" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-question-circle-fill text-2xl" ></i>                                    
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
                        <div class="contentClass group aspect-[3/4] bg-white regular-shadow border rounded-2xl relative" data-class-id="{{$class->class_id}}">
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
                            <div class="contentItems w-full h-full dvClass hidden" data-class-id="{{$class->class_id}}">
                                <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                                <a href="/kelas/siswa/{{$class->class_grade}}/{{$class->class_tag}}?ic={{$class->class_id}}" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}">
                                    <p class="gradeAndTagClass w-3/4 py-2 text-center font-bold bg-white rounded-xl absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                        {{$class->class_grade . ' ' . $class->class_tag}}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="contentItems w-full h-full dvClass"> <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]"> <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]"> <span role="button" class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200"> <i class="bi bi-pencil"></i> </span> <span role="button" class="delBtClass border border-black bg-white p-2 rounded-lg hover:bg-gray-200"> <i class="bi bi-trash3"></i> </span> </div> </div> <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy"> <a href="" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}"> <p class="gradeAndTagClass w-3/4 py-2 text-center font-bold bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]"> {{$class->class_grade . ' ' . $class->class_tag}} </p> </a> </div> --}}
                @endforeach
            </div>
        </div>
        <div class="class-viii">
            <div class="title-class text-2xl flex items-center gap-6 py-4 font-bold border-b-4 border-black relative">
                <div class="tlClass flex @if (count($tempClassVIII) > 0) flex-col md:flex-row  @else flex-row justify-between md:justify-normal w-full @endif md:items-center md:gap-6">
                    <p>Kelas VIII</p>
                    <span role="button" class="btrpp-vii text-sm py-1 md:py-2 px-3 md:px-6 border-2 rounded-lg flex items-center hover:bg-gray-100" data-class-grade='VIII'>
                        <i class="bi bi-plus-circle mr-2 text-xl md:text-2xl"></i>
                        <p>Kelas</p>
                    </span>
                </div>
                <span role="button" class="expandList p-1 @if (count($tempClassVIII) > 0) block @else hidden @endif float-right absolute right-0 transition-all duration-300 @if (count($tempClassVIII) < 5) -rotate-90 @endif" >
                    <i class="bi bi-chevron-left text-4xl"></i>
                </span>
            </div>
            <div class="list-class mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative @if (count($tempClassVIII) > 4) hidden @endif">
                @foreach ($tempClassVIII as $class)
                    <div class="itemClass relative group overflow-hidden  transition-all duration-500" data-class-id="{{$class->class_id}}">
                        <div class="questionSummaryClass items-center absolute p-2 rounded-bl-xl bg-white right-0 translate-x-0 z-20 border-l border-b hidden">
                            <div class="button-editDel -z-10 flex items-center absolute rounded-l-lg bg-white overflow-hidden -right-full translate-x-full group-hover:right-[36%] group-hover:-translate-x-[36%] transition-all">
                                <span role="button" class="editBtClass px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span role="button" class="delBtClass px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-trash3"></i>
                                </span>
                            </div>
                            <div class="icnQs">
                                <span role="button" class="icnQsClassInfo cursor-pointer p-1 flex hover:opacity-30" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-question-circle-fill text-2xl" ></i>                                    
                                </span>
                            </div>
                        </div>
                        <div class="contentClass group aspect-[3/4] bg-white regular-shadow border rounded-2xl relative" data-class-id="{{$class->class_id}}">
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
                            <div class="contentItems w-full h-full dvClass hidden" data-class-id="{{$class->class_id}}">
                                <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                                <a href="/kelas/siswa/{{$class->class_grade}}/{{$class->class_tag}}?ic={{$class->class_id}}" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}">
                                    <p class="gradeAndTagClass w-3/4 py-2 text-center font-bold bg-white rounded-xl absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                        {{$class->class_grade . ' ' . $class->class_tag}}
                                    </p>
                                </a>
                            </div>
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
                    {{-- <div class="makeAlumniWthExpand @if (count($tempClassIX) > 0) flex @else hidden @endif items-center gap-4 relative"> --}}
                    <div class="makeAlumniWthExpand @if (count($tempClassIX) > 0) flex @else hidden @endif items-center gap-4 relative">
                        <div class="relative">
                            <span role="button" class="p-1 flex items-center gap-1">
                                <i class="bi bi-mortarboard text-4xl border-r-2 px-4"></i>
                                <p>Jadikan Alumni</p>
                            </span>    
                        </div>
                        <div class="relative w-12">
                            <span role="button" class="expandList p-1 block absolute left-0 top-1/2 -translate-x-0 -translate-y-1/2  transition-all duration-300 @if (count($tempClassIX) < 5) -rotate-90 @endif" >
                                <i class="bi bi-chevron-left text-4xl"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-class mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative @if (count($tempClassIX) > 4) hidden @endif">
                @foreach ($tempClassIX as $class)
                    <div class="itemClass relative group overflow-hidden  transition-all duration-500" data-class-id="{{$class->class_id}}">
                        <div class="questionSummaryClass items-center absolute p-2 rounded-bl-xl bg-white right-0 translate-x-0 z-20 border-l border-b hidden">
                            <div class="button-editDel -z-10 flex items-center absolute rounded-l-lg bg-white overflow-hidden -right-full translate-x-full group-hover:right-[36%] group-hover:-translate-x-[36%] transition-all">
                                <span role="button" class="editBtClass px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span role="button" class="delBtClass px-3 flex bg-white p-2 hover:bg-gray-200" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-trash3"></i>
                                </span>
                            </div>
                            <div class="icnQs">
                                <span role="button" class="icnQsClassInfo cursor-pointer p-1 flex hover:opacity-30" data-class-id="{{$class->class_id}}">
                                    <i class="bi bi-question-circle-fill text-2xl" ></i>                                    
                                </span>
                            </div>
                        </div>
                        <div class="contentClass group aspect-[3/4] bg-white regular-shadow border rounded-2xl relative" data-class-id="{{$class->class_id}}">
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
                            <div class="contentItems w-full h-full dvClass hidden" data-class-id="{{$class->class_id}}">
                                <img src="{{asset('storage/images/classes/' . $class->name_files )}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                                <a href="/kelas/siswa/{{$class->class_grade}}/{{$class->class_tag}}?ic={{$class->class_id}}" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="{{$class->class_grade}}" data-class-id="{{$class->class_id}}">
                                    <p class="gradeAndTagClass w-3/4 py-2 text-center font-bold bg-white rounded-xl absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                        {{$class->class_grade . ' ' . $class->class_tag}}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div id="pop-upFormAdd" class="pop-upFormAdd lozad fixed w-full xl:w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50 hidden">
        <div class="mx-auto">
            <span role="button" id="closeForm" type="button" class="icon border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]">
                <i class="bi bi-x text-5xl"></i>
            </span>
            <form action="" method="POST" id="form-addClass" class="form-addClass space-y-6" enctype="multipart/form-data">
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
                            <label for="imgClass" class="itemAddImage w-3/4 py-2 text-center font-bold cursor-pointer bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                <i class="bi bi-plus-circle text-lg"></i>
                                Add Image
                            </label>
                        </label>
                        <input type="file" name="imgClass" id="imgClass" value="" accept="image/*" class="w-15 h-15 border border-black sr-only" value="">
                    </div>
                </div>
                <div class="teClass">
                    <div class="imgSelectTeachers flex items-center gap-4">
                        <div class="imgSelected flex-shrink-0 aspect-square w-40 rounded-[100%] overflow-hidden p-1 relative">
                            {{-- <div class="plcImgFrm w-full h-full flex justify-center items-center absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-gray-300 rounded-[100%] overflow-hidden animate-pulse"> <i class="bi bi-image-fill text-4xl text-gray-400"></i> </div> --}}
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
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-gray-200"> Simpan </button>
            </form>
        </div>
    </div>
    <div class="infoClassPopup fixed w-full xl:w-1/2 min-h-[32rem] max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-white border border-black rounded-2xl overflow-auto z-50" style="display: none" role="dialog">
        <div class="px-8 py-6 relative">
            <div class="closeClassInfo text-6xl absolute right-0 top-0 -translate-x-0 -translate-y-0 z-10 bg-white rounded-lg">
                <span role="button" class="bi bi-x"></span>
            </div>
        </div>
    </div>
    <div class="deleteClassPopupAlert fixed bg-orange-50 w-full xl:w-1/2 min-h-[32rem] max-h-full lg:max-h-[32rem] left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl overflow-auto z-50 shadow-gray-500 shadow-lg" style="display: none" role="alertdialog">
        <div class="px-8 py-6 relative">
            <div class="px-6 py-6 flex items-center gap-2 text-red-500 absolute left-0 top-0 -translate-x-0 -translate-y-0 z-10 bg-orange-50 rounded-lg">
                <i class="bi bi-exclamation-circle-fill text-4xl"></i>
                <strong>Peringatan</strong>
            </div>
            <div class="closeClassAlertDelete text-6xl text-gray-600 absolute right-0 top-0 -translate-x-0 -translate-y-0 z-10 bg-orange-50 rounded-lg">
                <span role="button" class="bi bi-x"></span>
            </div>
        </div>
    </div>
    
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/kelas/classGrouplist.js')}}"></script>
    <script src="{{asset('assets/js/kelas/classForm.js')}}"></script>
    <script src="{{asset('assets/js/kelas/class.js')}}"></script>
    <script src="{{asset('assets/js/kelas/classInfo.js')}}"></script>
    <script src="{{asset('assets/js/kelas/classEdit.js')}}"></script>
    <script src="{{asset('assets/js/kelas/classDelete.js')}}"></script>
@endsection
