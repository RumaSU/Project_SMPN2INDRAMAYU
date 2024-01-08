<div class="frmEd" style="display: ">
    <form action="" method="POST" class="">
        <div class="cntnFrm">
            <div class="cntChsLeOs mt-4 relative">
                <div class="chsTChsLeStd flex justify-between items-center gap-2">
                    <div class="tChs">
                        <strong>Ketua Osis</strong>
                    </div>
                    <div class="wrpSearchStd">
                        <div class="liChsLeStdnt">
                            <input type="checkbox" id="shwLiChsLeStdnt" class="peer hidden sr-only">
                            <label role="button" for="shwLiChsLeStdnt" class="p-2 block bg-white rounded-lg relative *:peer-checked:-rotate-90 w-fit border border-black">
                                <div class="d transition-all">
                                    <i class="bi bi-chevron-left text-lg"></i>
                                </div>
                            </label>
                            <div class="liStdntChsLe mt-2 absolute left-0 z-[4] bg-white rounded-lg p-2 w-full h-0 opacity-0 invisible transition-all peer-checked:last:grid peer-checked:h-auto peer-checked:opacity-100 peer-checked:visible border border-black">
                                <div class="searchStd">
                                    <div class="searchStd rounded-lg flex items-center gap-2 p-2">
                                        <i class="bi bi-search"></i>
                                        <input type="text" id="searchStdLe" class="rounded-lg w-full" placeholder="Cari siswa...">
                                    </div>
                                </div>
                                <ul class="hidden gap-1 py-4 h-52 overflow-y-scroll">
                                    @for ($i=1; $i<10; $i++)
                                        <li>
                                            <label for="chsLeOsisStdn_{{$i}}" class="cursor-pointer relative block">
                                                <input type="radio" name="stdntLeOsis" id="chsLeOsisStdn_{{$i}}" value="" class="hidden sr-only peer">
                                                <div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm">
                                                    <div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden">
                                                        <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                                    </div>
                                                    <p class="w-full select-none">kjsaf ajsf afjwl f {{$i}} </p>
                                                </div>
                                                <div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible">
                                                    <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>
                                                </div>
                                            </label>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cntStdntLeChsd mt-4">
                    @if (!isset($studentLeOsis))
                        <div class="noOsisLeStdntChoosed px-4">
                            <div class="infStdChsd flex justify-between gap-2 ">
                                <div class="std flex items-center gap-2 w-full">
                                    <div class="imgStdChsd flex items-center justify-center aspect-[1/1] w-16 rounded-[100%] p-1 shrink-0 bg-gray-200 overflow-hidden">
                                        <i class="bi bi-image text-gray-400"></i>
                                    </div>
                                    <div class="nm w-full">
                                        <div class="t">Tidak ada ketua osis yang terpilih</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="itmStdntChsd px-4">
                            <div class="lazyLoadPopStatItem px-4 animate-pulse">
                                <div class="std flex items-center gap-2 w-full">
                                    <div class="imgStdChsd flex items-center justify-center aspect-[1/1] w-16 rounded-[100%] p-1 shrink-0 bg-gray-200 overflow-hidden">
                                        <i class="bi bi-image text-gray-400"></i>
                                    </div>
                                    <div class="nm w-36 h-8 bg-gray-200 rounded-lg"></div>
                                </div>
                            </div>
                            <div class="cntnItmStdntChsd px-4" style="display: none">
                                <input type="hidden" name="studentChsdLeStdn" value="" class="inpValStdChs">
                                <div class="infStdChsd flex justify-between gap-2 ">
                                    <div class="std flex items-center gap-2 w-full">
                                        <div class="imgStdChsd aspect-[1/1] w-16 p-1 shrink-0">
                                            <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full rounded-[100%] overflow-hidden">
                                        </div>
                                        <div class="nm w-full">
                                            <div class="t">Namanya</div>
                                        </div>
                                    </div>
                                    <div class="delThis shrink-0 flex justify-center items-center">
                                        <span role="button" class="btnDelStdntChsd">
                                            <i class="bi bi-trash-fill text-red-600 text-xl p-3"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="cntrChsMemOs mt-4 relative">
                <div class="tbleCntnStdntChossed">
                    <div class="sStChsd flex items-center gap-2 ">
                        <div class="searchStudentStdChsd rounded-lg flex items-center gap-2 p-2 ">
                            <i class="bi bi-search"></i>
                            <input type="text" id="searchStdMemChsd" class="rounded-lg" placeholder="Cari siswa...">
                        </div>
                        <div class="wrpSearchLiChsMemOs">
                            <div class="liChsMembrStdnt">
                                <input type="checkbox" id="shwLiChsMemrStdnt" class="peer hidden sr-only">
                                <label role="button" for="shwLiChsMemrStdnt" class="p-2 block bg-white rounded-lg relative *:peer-checked:-rotate-90 border border-black">
                                    <div class="d transition-all">
                                        <i class="bi bi-chevron-left text-lg"></i>
                                    </div>
                                </label>
                                <div class="liStdntChsMemr mt-2 absolute left-0 z-[4] bg-white rounded-lg p-2 w-full h-0 opacity-0 invisible transition-all peer-checked:h-auto peer-checked:opacity-100 peer-checked:visible border border-black">
                                    <div class="searchStd">
                                        <div class="searchStd rounded-lg flex items-center gap-2 p-2">
                                            <i class="bi bi-search"></i>
                                            <input type="text" id="searchStdMem" class="rounded-lg w-full" placeholder="Cari siswa...">
                                        </div>
                                    </div>
                                    <ul class="grid xl:grid-cols-2 gap-1 py-4 h-52 overflow-y-scroll" style="display: ">
                                        @for ($i=1; $i<10; $i++)
                                            <li>
                                                <label for="chsMemOsisStdn_{{$i}}" class="cursor-pointer relative block">
                                                    <input type="checkbox" id="chsMemOsisStdn_{{$i}}" data-student-id="student_id_{{$i}}" value="" class="hidden sr-only peer">
                                                    <div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm">
                                                        <div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden">
                                                            <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                                        </div>
                                                        <p class="w-full select-none">kjsaf ajsf afjwl f {{$i}} </p>
                                                    </div>
                                                    <div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible">
                                                        <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>
                                                    </div>
                                                </label>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="liStdntChsd h-56 overflow-y-scroll">
                        <ul class="grid lg:grid-cols-2 gap-1 py-4 h-52 overflow-y-scroll" style="display: ">
                            @if (!isset($studentOsisMember))
                                <li>
                                    <div class="noOsisStdntChsd px-4">
                                        <div class="std flex items-center gap-2 w-full">
                                            <div class="imgStdChsd flex items-center justify-center aspect-[1/1] w-16 rounded-[100%] p-1 shrink-0 bg-gray-200 overflow-hidden">
                                                <i class="bi bi-image text-gray-400"></i>
                                            </div>
                                            <div class="nm w-full">
                                                <div class="t">Tidak ada siswa yang terpilih</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                @for ($i=1; $i<10; $i++)
                                    <li class="itmStdntChsd">
                                        <div class="lazyLoadPopStatItem px-4 animate-pulse">
                                            <div class="std flex items-center gap-2 w-full">
                                                <div class="imgStdChsd flex items-center justify-center aspect-[1/1] w-16 rounded-[100%] p-1 shrink-0 bg-gray-200 overflow-hidden">
                                                    <i class="bi bi-image text-gray-400"></i>
                                                </div>
                                                <div class="nm w-48 h-8 bg-gray-200 rounded-lg"></div>
                                            </div>
                                        </div>
                                        <div class="cntnItmStdntChsd px-4" style="display: none">
                                            <input type="hidden" name="studentChsId_{{$i}}" value="" class="inpValStdChs">
                                            <div class="infStdChsd flex justify-between gap-2 ">
                                                <div class="std flex items-center gap-2 w-full">
                                                    <div class="imgStdChsd aspect-[1/1] w-16 p-1 shrink-0">
                                                        <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full rounded-[100%] overflow-hidden">
                                                    </div>
                                                    <div class="nm w-full">
                                                        <div class="t">Namanya{{$i}}</div>
                                                    </div>
                                                </div>
                                                <div class="delThis shrink-0 flex justify-center items-center">
                                                    <span role="button" class="btnDelStdntChsd">
                                                        <i class="bi bi-trash-fill text-red-600 text-xl p-3"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>