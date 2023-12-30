<div id="lazyLoadInfoClassContent" class="lazyLoadInfoClass px-8 py-6 animate-pulse">
    <div class="topLoadInfo h-64 grid grid-cols-5 grid-rows-5">
        <div class="bg-gray-200 rounded-xl" style="grid-column: 1 / 6; grid-row: 1 / 6"></div>
        <div class="space-y-1" style="grid-column: 3 / 4; grid-row: 3 / 4">
            <div class="w-full h-8 bg-gray-300 rounded-xl"></div>
            <div class="w-1/2 h-4 bg-gray-300 rounded-xl float-right"></div>
        </div>
        <div class="" style="grid-column: 1 / 6; grid-row: 5 / 6">
            <div class="flex items-center">
                <div class="aspect-square w-32 rounded-l-[100%] rounded-r-[90%] p-2 pr-5 bg-gray-300"></div>
                <div class="-ml-2 w-[40%] bg-gray-300 rounded-xl h-14 py-2 px-2 relative">
                    <div class="absolute top-full flex items-center gap-2 mt-2">
                        <div class="w-7 h-7 rounded-[100%] bg-gray-300"></div>
                        <div class="w-7 h-7 rounded-[100%] bg-gray-300"></div>
                        <div class="w-7 h-7 rounded-[100%] bg-gray-300"></div>
                        <div class="w-7 h-7 rounded-[100%] bg-gray-300"></div>
                        <div class="w-7 h-7 rounded-[100%] bg-gray-300"></div>
                        <div class="w-7 h-7 rounded-[100%] bg-gray-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middleLoadInfo flex justify-between items-center mt-32">
        <div class="bg-gray-300 w-32 h-8 rounded-xl"></div>
        <div class="bg-gray-300 w-44 h-12 rounded-xl"></div>
    </div>
    <div class="tableLoadInfo mt-5 px-5 space-y-2">
        <div class="flex items-center gap-0.5">
            <div class="h-8 w-10 bg-gray-300 rounded-xl"></div>
            <div class="h-8 w-full bg-gray-300 rounded-xl"></div>
        </div>
        <div class="h-8 w-full bg-gray-300 rounded-xl flex items-center justify-center gap-2">
            <div class="w-2 h-2 rounded-[100%] bg-gray-700 animation-loading"></div>
            <div class="w-2 h-2 rounded-[100%] bg-gray-700 animation-loading" style="animation-delay: 250ms"></div>
            <div class="w-2 h-2 rounded-[100%] bg-gray-700 animation-loading" style="animation-delay: 500ms"></div>
        </div>
    </div>
</div>
<div id="contentInfoElement" class="contentInfo px-8 py-6 relative" style="display: none">
    <div class="classInfoWthTeacher relative h-64 grid grid-cols-5 grid-rows-5">
        <div class="imgClassInfo relative" style="grid-column: 1 / 6; grid-row: 1 / 6">
            <img src="" alt="" class="w-full h-full object-cover object-center rounded-xl">
        </div>
        <div class="ovBlack bg-black/40 z-[2] rounded-xl" style="grid-column: 1 / 6; grid-row: 1 / 6"></div>
        <div class="clsGradeTag z-10" style="grid-column: 3 / 4; grid-row: 3 / 4">
            <div class="cntGradeTag text-white px-6 py-1 leading-3">
                <div class="gradeTagInfo text-2xl text-center font-bold">
                    <p>Kelas VII C</p>
                </div>
                <div class="yearClassInfo text-xs flex justify-end">2023</div>
            </div>
        </div>
        <div class="teacherClass z-10" style="grid-column: 1 / 6; grid-row: 5 / 6">
            <div class="cnt flex items-center">
                <div class="tchrImg bg-white rounded-l-[100%] rounded-r-[90%] w-fit p-2 pr-5">
                    <div class="imgTeacherInfo aspect-square w-32 rounded-[100%] relative overflow-hidden">
                        <img src="" alt=""
                            class="w-full h-full object-cover object-center rounded-[100%]">
                    </div>
                </div>
                <div class="tchInfo -ml-2 min-w-[40%] py-2 px-2 rounded-r-xl bg-white relative">
                    <div class="tchNmeNip">
                        <div class="nmeTeacherInfo text-lg leading-3">
                            <div class="t">
                                <p>Nama nya</p>
                            </div>
                        </div>
                        <div class="nipTeacherInfo text-sm">
                            <div class="t">
                                <p>165194465</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-scmedTch absolute top-full">
                        <div id="listSocmedTch-ClassInfo" class="flex items-center gap-2 text-2xl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="editDeleteClassInfo flex items-center gap-2 mt-32">
        <div class="">
            <span role="button" class="editClassInfo block px-8 py-2 border-2 rounded-xl hover:bg-gray-100"
                data-class-id="">
                <p>Edit</p>
            </span>
        </div>
        <div class="">
            <span role="button" class="deleteClassInfo block px-8 py-2 border-2 rounded-xl hover:bg-gray-100"
                data-class-id="">
                <p>Hapus</p>
            </span>
        </div>
    </div>
    <div class="listStudentInfo block z-50 text-black mt-4">
        <div class="titleListWthSumInfo flex items-center gap-4 justify-between">
            <div class="titleTable w-full">
                <div class="t flex items-center justify-between w-full font-bold">
                    <p>Daftar Siswa</p>
                    <span role="button" class="expandListStudentClassInfo text-3xl duration-300 -rotate-90 ">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                </div>
            </div>
            <div class="summTotalStudent border border-black px-6 py-2 w-fit rounded-lg flex gap-1">
                <p>
                <div class="cntStudent font-bold"></div> Siswa</p>
            </div>
        </div>
        <div class="mt-5 px-2">
            <div class="tableStudent border border-black overflow-hidden rounded-xl">
                <table class="border-collapse w-full">
                    <thead class="bg-gray-100">
                        <th class="px-2 py-2 uppercase">No</th>
                        <th colspan="2" class="px-2 py-2 uppercase">Nama</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="contentWhatClassDelete px-6 mt-12 md:mt-4" style="display: none">
    <div class="titleWthDescDeleteClass text-center">
        <div class="titleDeleteClass text-2xl">
            <strong>Hapus Kelas?</strong>
        </div>
        <div class="descDeleteClass">
            <p>Apakah kamu yakin ingin menghapus kelas ini?</p>
        </div>
    </div>
    <div class="warningDeleteClass md:w-3/4 mx-auto mt-8">
        <div class="warningContent flex flex-col md:flex-row px-6 py-3 md:gap-8 bg-orange-100/90 border-l-8 border-orange-600 rounded-lg">
            <div class="warningIcon">
                <div class="icnB text-2xl text-orange-700">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
            </div>
            <div class="reasonWarningDelete">
                <div class="reasonTopWarning" role="alert" aria-live="assertive">
                    <p>Dengan menghapus kelas ini, akan mempengaruhi <strong></strong> yang terhubung.</p>
                </div>
                <div class="shortListStudent overflow-y-scroll max-h-[12rem] mt-4">
                    <ul role="list" aria-label="Daftar Siswa"></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="confirmWthCancelDeleteThisClass mt-8">
        <div class="cancelDeleteThis flex flex-col-reverse md:flex-row md:items-center md:justify-center gap-6 select-none">
            <span role="button" id="cancelDeleteThisClass" class="block border-2 border-gray-300 bg-gray-100 rounded-xl px-8 py-2 hover:bg-gray-300">
                <div class="t">
                    Cancel
                </div>
            </span>
            <span role="button" id="hideThisClass" title="Hide this class" class="block relative border-2 border-blue-800 bg-blue-500 rounded-xl px-8 py-2 hover:bg-blue-800" data-class-id="" data-token-delete="">
                <div class="icnBwT text-white flex items-center gap-2">
                    <div class="t">Hide</div>
                    <div class="incB"><i class="bi bi-eye-slash-fill"></i></div>
                </div>
            </span>
            {{-- <form action="/kelas/delete" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" id="actionToThis" name="acd" value="Delete">
                <input type="hidden" id="tokenDeleteThis" name="tokenClassDelete">
                <input type="hidden" id="classIdThis" name="classId">
                <button type="submit"   id="" title="Delete this class" class="block border-2 border-red-800 bg-red-500 rounded-xl px-8 py-2 hover:bg-red-800" data-class-id="" data-token-delete="">
                    <div class="icnBwT text-white flex items-center gap-2">
                        <div class="t">
                            Confirm
                        </div>
                        <div class="incB">
                            <i class="bi bi-trash-fill"></i>
                        </div>
                    </div>
                </button>
            </form> --}}
            <span role="button" id="confirmDeleteThisClass" title="Delete this class" class="block border-2 border-red-800 bg-red-500 rounded-xl px-8 py-2 hover:bg-red-800" data-class-id="" data-token-delete="">
                <div class="icnBwT text-white flex items-center gap-2">
                    <div class="t">
                        Confirm
                    </div>
                    <div class="incB">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
<div class="lazyLoadDeleteClass absolute w-full h-full left-0 top-0 animate-pulse">
    <div class="px-8 py-6">
        <div class="topLoad mt-4 space-y-2">
            <div class="bg-gray-200 h-10 w-40 mx-auto rounded-lg"></div>
            <div class="bg-gray-200 h-6 w-96 mx-auto rounded-lg"></div>
        </div>
        <div class="middleLoad mt-5">
            <div class="bg-gray-200 h-64 w-3/4 mx-auto rounded-lg flex px-6 py-3 gap-8">
                <div class="w-8 h-8 bg-gray-300 rounded-lg"></div>
                <div>
                    <div class="w-[32rem] h-6 bg-gray-300 rounded-lg"></div>
                    <div class="mt-6 space-y-2">
                        <div class="w-64 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-52 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-72 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-40 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-96 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-52 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-40 h-4 bg-gray-300 rounded-lg"></div>
                        <div class="w-72 h-4 bg-gray-300 rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottomLoad mt-10 w-fit mx-auto flex items-center gap-4">
            <div class="bg-gray-200 h-10 w-40 rounded-lg"></div>
            <div class="bg-gray-200 h-10 w-40 rounded-lg"></div>
        </div>
    </div>
</div>
<div class="loadConfirmationDelete absolute w-full h-full left-0 top-0" style="display:">
    <div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div>
    </div>
</div>