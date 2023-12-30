<div class="lazyLoadFormStudent animate-pulse">
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
</div>

<div class="contentWhatStudentDelete px-6 mt-12 md:mt-4 overflow-y-scroll" style="display: none">
    <div class="titleWthDescDeleteStudent text-center">
        <div class="titleDeleteStudent text-2xl">
            <strong>Hapus Siswa?</strong>
        </div>
        <div class="descDeleteStudent">
            <p>Apakah kamu yakin ingin menghapus siswa ini?</p>
        </div>
    </div>
    <div class="dataDeleteStudent mt-6">
        <div class="dataContent flex flex-col items-center lg:flex-row">
            <div class="imgStudentDelete flex-shrink-0">
                <div class="mg aspect-square aspect-[1 / 1] w-48 rounded-[100%] p-1 border-2">
                    <img src="" alt="" class="w-full h-full object-cover object-center rounded-[100%]" draggable="false">
                </div>
            </div>
            <div class="detailDataStudent w-full md:px-4">
                <div class="ti">
                    <div class="t">
                        <strong>Data Siswa</strong>
                    </div>
                </div>
                <div class="datSDe px-4 text-sm space-y-2">
                    <fieldset class="border border-black px-2 rounded-lg mt-2">
                        <legend class=" bg-orange-50 px-4 rounded-lg">
                            <strong>Nama</strong>
                        </legend>
                        <p id="nameStudentDelete" class="md:px-6 mb-2"></p>
                    </fieldset>
                    <fieldset class="border border-black px-2 rounded-lg mt-2">
                        <legend class=" bg-orange-50 px-4 rounded-lg">
                            <strong>NIS</strong>
                        </legend>
                        <p id="nisStudentDelete" class="md:px-6 mb-2"></p>
                    </fieldset>
                    <fieldset class="border border-black px-2 rounded-lg">
                        <legend class=" bg-orange-50 px-4 rounded-lg">
                            <strong>Kelas</strong>
                        </legend>
                        <p id="classStudentDelete" class="md:px-6 mb-2"></p>
                    </fieldset>
                    <fieldset class="border border-black px-2 rounded-lg">
                        <legend class=" bg-orange-50 px-4 rounded-lg">
                            <strong>Sosial Media</strong>
                        </legend>
                        <ul role="list" aria-label="List Sosial Media" id="listSocialMediaStudentDelete" class="flex items-center gap-2"></ul>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="warningDeleteStudent md:w-3/4 mx-auto mt-8">
        <div class="warningContent flex flex-col md:flex-row px-6 py-3 md:gap-8 bg-orange-100/90 border-l-8 border-orange-600 rounded-lg">
            <div class="warningIcon">
                <div class="icnB text-2xl text-orange-700">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
            </div>
            <div class="reasonWarningDelete">
                <div class="reasonTopWarning" role="alert" aria-live="assertive">
                    <p>Harap pastikan untuk memperhatikan poin-poin berikut:</p>
                </div>
                <div class="shortListStudent overflow-y-scroll mt-2 text-orange-950">
                    <ul role="list" aria-label="Daftar Siswa">
                        <li role="listitem">                                    
                            <div class="warn flex items-center">
                                <i class="dotList shrink-0 bg-orange-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                <p class="text-sm">Data tidak bisa dikembalikan seperti semula.</p>
                            </div>
                        </li>
                        <li role="listitem">
                            <div class="warn flex items-center">
                                <i class="dotList shrink-0 bg-orange-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                <p class="text-sm">Semua data terkait dengan siswa ini akan dihapus permanen.</p>
                            </div>
                        </li>
                        <li role="listitem">
                            <div class="warn flex items-center">
                                <i class="dotList shrink-0 bg-orange-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                <p class="text-sm">Tindakan ini akan mempengaruhi jumlah siswa yang ada.</p>
                            </div>
                        </li>
                        <li role="listitem">
                            <div class="warn flex items-center">
                                <i class="dotList shrink-0 bg-orange-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                                <p class="text-sm">Data ini bisa disembunyikan jika memang diinginkan.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="confirmWthCancelDeleteThisStudent mt-8">
        <div class="cancelDeleteThis flex flex-col-reverse md:flex-row md:items-center md:justify-center gap-6 select-none">
            <span role="button" id="cancelDeleteThisStudent" class="block border-2 border-gray-300 bg-gray-100 rounded-xl px-8 py-2 hover:bg-gray-300">
                <div class="t">
                    Cancel
                </div>
            </span>
            <span role="button" id="hideThisStudent" title="Hide this class" class="block relative border-2 border-blue-800 bg-blue-700 rounded-xl px-8 py-2 hover:bg-blue-950" data-student-id="" data-token-delete="">
                <div class="icnBwT text-white flex items-center gap-2">
                    <div class="t">Hide</div>
                    <div class="incB"><i class="bi bi-eye-slash-fill"></i></div>
                </div>
            </span>
            {{-- <form action="/kelas/delete" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" id="actionToThis" name="acd" value="Delete">
                <input type="hidden" id="tokenDeleteThis" name="tokenStudentDelete">
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
            <span role="button" id="confirmDeleteThisStudent" title="Delete this class" class="block border-2 border-red-800 bg-red-500 rounded-xl px-8 py-2 hover:bg-red-800" data-student-id="" data-token-delete="">
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
<div class="lazyLoadDeleteStudent absolute w-full h-full left-0 top-0 animate-pulse">
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