<div class="lzyLoadFrm animate-pulse">
    <div class="topLoad flex items-center gap-2">
        <div class="bg-gray-200 aspect-[1/1] w-16 rounded-[100%]"></div>
        <div class="bg-gray-200 w-1/3 py-6 rounded-lg"></div>
    </div>
    <div class="midLoad px-4 mt-4 space-y-2">
        <div class="bg-gray-200 py-6 rounded-lg"></div>
        <div class="bg-gray-200 py-16 rounded-lg"></div>
    </div>
    <div class="bottomLoad flex items-center justify-end gap-2 px-4 mt-4">
        <div class="bg-gray-200 py-6 w-36 rounded-lg"></div>
        <div class="bg-gray-200 py-6 w-48 rounded-lg"></div>
    </div>
</div>
<form action="" method="" style="display: none">
    <div class="cntFrm">
        <div class="flex flex-col items-center p-1 gap-2 w-10/12 teChosed relative rounded-xl overflow-hidden">
            <div class="cnt flex items-center w-full gap-2">
                <div class="imgTe aspect-[1/1] w-16 rounded-[100%] overflow-hidden shrink-0">
                    <img src="{{asset('storage/images/teachers/default.png')}}" id="tempTeacherImageOsisGuide" alt="" class="w-full h-full object-cover object-center">
                </div>
                <div class="chsNm min-w-40">
                    <div class="t border-2 border-gray-600 rounded-xl py-2 px-2">
                        <p id="tempTeacherNameOsisGuide" class="block">
                            <i class="italic text-opacity-50">placeholder name teacher</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="liRadTChs relative group">
            <input type="checkbox" name="toggleLiTea" id="toggleLiTea" class="peer hidden sr-only">
            
            <div class="searchBx flex items-center w-10/12 rounded-xl overflow-hidden border-2 border-gray-600 pr-4">
                <label for="searchLiTe">
                    <i class="bi bi-search px-2"></i>
                </label>
                <input type="text" name="searchLiTe" maxlength="255" id="searchLiTe" placeholder="Search..." class="w-full border-none focus:ring-0 focus:ring-transparent">                                    
            </div>
            <span role="button" class="h-0 w-0 *:peer-checked:-rotate-90">
                <label for="toggleLiTea" class="biCvr p-2 bg-white transition-all absolute right-0 top-1/2 -translate-x-0 -translate-y-1/2">
                    <i class="bi bi-chevron-left p-1 transition-all text-3xl"></i>
                </label>
            </span>
            
            <div class="mt-6 p-2 rounded-xl bg-white overflow-y-scroll transition-all w-full h-0 shadow-sm shadow-gray-500 opacity-0 invisible peer-checked:h-44 peer-checked:visible peer-checked:opacity-100 absolute top-1/2 z-[2]">
                <div class="listChsTeacher px-4">
                    <div class="lazyLoadChsTe grid lg:grid-cols-2 py-4 gap-2 animate-pulse">
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                        <div class="bg-gray-200 w-full h-12 rounded-lg"></div>
                    </div>
                    <ul class="grid lg:grid-cols-2 gap-1 py-4" style="display: none"></ul>
                </div>
            </div>
        </div>
        <div class="fieldCpQuot mt-6">
            <div class="inpField relative border border-black p-2 rounded-xl">
                <div class="tx">
                    <textarea name="txtInpQtTe" id="txtInpQtTe" placeholder="Input quote" class="resize-none w-full p-2 rounded-xl border-none focus:ring-transparent"></textarea>
                </div>
            </div>
        </div>
        <div class="cnclSubmChseTeGuid mt-6">
            <div class="ceqsuf flex items-center justify-end gap-2">
                <div class="cncl">
                    <span role="button" id="_cnclChsTeGuid" class="block px-8 py-2 rounded-xl border-2 border-gray-600 bg-gray-200 hover:bg-gray-400">
                        <div class="t">Cancel</div>
                    </span>
                </div>
                <div class="sbmtChsTeGuid">
                    <button type="submit" id="sbmtChsTeGuid" class="">
                        <div class="t block px-8 py-2 rounded-xl border-2 border-blue-800 bg-blue-600 text-white hover:bg-blue-700">
                            <p>Submit</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="" method="POST">
    <div class="schollLogoBall">
        <label for="lgoBallImg" class="mg block aspect-[1/1] w-72 mx-auto rounded-[100%] p-1 border-2 border-black bg-white overflow-hidden">
            <input type="file" name="lgoBallImg" id="lgoBallImg" class="hidden sr-only">
            <img src="{{asset('assets/img/icon/camera.png')}}" style="display: " alt="" id="prevBgBallOsis" class="lazyLoadThisPage w-full h-full object-cover object-center rounded-[100%] grayscale">
        </label>
    </div>
    <div class="osisDesc mt-6 w-9/12 mx-auto">
        <div class="contentDesc text-base text-center font-bold space-y-2">
            <div class="t p-4 border border-black rounded-xl">
                <textarea name="inpTxtDescOsis" id="inpTxtDescOsis" maxlength="512" placeholder="text description in here" class="text-center w-full resize-none border-none focus:ring-transparent"></textarea>
            </div>
        </div>
    </div>
    <div class="sbEdPageOs mt-6 mr-8">
        <div class="ceqsolf flex items-center justify-end gap-2">
            <div class="cncl">
                <span role="button" id="_cncEdPgOs" class="block px-8 py-2 rounded-xl border-2 border-gray-600 bg-gray-200 hover:bg-gray-400">
                    <div class="t">Cancel</div>
                </span>
            </div>
            <div class="sbmtChsTeGuid">
                <button type="submit" id="sbmtEdPgOgs" class="">
                    <div class="t block px-8 py-2 rounded-xl border-2 border-blue-800 bg-blue-600 text-white hover:bg-blue-700">
                        <p>Submit</p>
                    </div>
                </button>
            </div>
        </div>
    </div>
</form>
<form action="" method="POST" class="">
    <div class="flex flex-col md:flex-row justify-center items-center h-full gap-6 select-none">
        <div class="cntrChsLeOs p-6 rounded-lg">
            <div class="searchStd bg-white rounded-lg flex items-center gap-2 p-2">
                <i class="bi bi-search"></i>
                <input type="text" id="searchStdLe" class="rounded-lg border-none">
            </div>
            <div class="liChsLeStdnt relative mt-2">
                <input type="checkbox" id="shwLiChsLeStdnt" class="peer hidden sr-only">
                <label for="shwLiChsLeStdnt" class="py-4 block bg-white rounded-lg relative *:peer-checked:-rotate-90">
                    <div class="d absolute top-1/2 -translate-y-1/2 right-4 z-[5] transition-all">
                        <i class="bi bi-chevron-left text-lg"></i>
                    </div>
                </label>
                <div class="liStdntChsLe mt-2 absolute z-[4] bg-white rounded-lg p-2 w-full h-0 opacity-0 invisible transition-all peer-checked:h-auto peer-checked:opacity-100 peer-checked:visible">
                    <ul class="grid gap-1 py-4 h-52 overflow-y-scroll" style="display: "></ul>
                </div>
            </div>
        </div>
        <div class="cntrChsMemOs p-6 rounded-lg">
            <div class="searchStd bg-white rounded-lg flex items-center gap-2 p-2">
                <i class="bi bi-search"></i>
                <input type="text" id="searchStdMem" class="rounded-lg border-none">
            </div>
            <div class="liChsMembrStdnt relative mt-2">
                <input type="checkbox" id="shwLiChsMemrStdnt" class="peer hidden sr-only">
                <label for="shwLiChsMemrStdnt" class="py-4 block bg-white rounded-lg relative *:peer-checked:-rotate-90">
                    <div class="d absolute top-1/2 -translate-y-1/2 right-4 z-[5] transition-all">
                        <i class="bi bi-chevron-left text-lg"></i>
                    </div>
                </label>
                <div class="liStdntChsMemr mt-2 absolute z-[4] bg-white rounded-lg px-2 w-full h-0 opacity-0 invisible transition-all peer-checked:h-auto peer-checked:opacity-100 peer-checked:visible">
                    <ul class="grid gap-1 py-4 h-52 overflow-y-scroll" style="display: ">
                        {{-- @for ($i=1; $i<10; $i++)
                            <li><label for="chsMemOsisStdn_{{$i}}" class="cursor-pointer relative block"><input type="checkbox" name="stdntChsMemberOsis{{$i}}" id="chsMemOsisStdn_{{$i}}" value="chsMemOsisStdn_{{$i}}" class="hidden sr-only peer"><div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm"><div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden"><img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center"></div><p class="w-full select-none">Name std {{$i}}</p></div><div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible"><i class="bi bi-check-circle-fill text-green-600 text-xl"></i></div></label></li>
                        @endfor --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="cnclSubmChStd">
            <div class="ceqsuf flex items-center justify-end gap-2">
                <div class="cncl">
                    <span role="button" id="_cnclChsStdn" class="block px-8 py-2 rounded-xl border-2 border-gray-600 bg-gray-200 hover:bg-gray-400">
                        <div class="t">Cancel</div>
                    </span>
                </div>
                <div class="sbmtChsStdn">
                    <button type="submit" id="sbmtChsStdn" class="">
                        <div class="t block px-8 py-2 rounded-xl border-2 border-blue-800 bg-blue-600 text-white hover:bg-blue-700">
                            <p>Submit</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>