<div class="confirmHideAlert text-blue-950 w-full lg:w-[26rem] px-4 py-3 bg-blue-100 border-l-4 border-blue-600 rounded-md transition-all translate-x-[125%]" role="alert" aria-live="assertive">
    <div class="titleConfirmHide flex items-center gap-4">
        <i class="bi bi-eye-slash-fill text-blue-700"></i>
        <p class="text-lg">Kelas berhasil disembunyikan</p>
    </div>
    <div class="cntnWht ml-6 mt-2">
        <div class="infoWhatClassHide flex flex-col md:flex-row md:gap-4">
            <div class="icn flex items-center gap-2">
                <i class="bi bi-info-circle-fill text-lg text-blue-700"></i>
                <p class="text-base block md:hidden">Info</p>
            </div>
            <div class="listInfoClassHide text-base">
                <ul class="text-sm">
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm inline-flex gap-1"><p>Kelas <strong class="classGradeAlert"></strong> <strong class="classYearAlert"></strong> sudah disembunyikan</p></div>
                    </li>
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm inline-flex gap-1"><p class="line-clamp-2">Setidaknya terdapat <strong> <div class="studentInfoAlert font-bold"></div> siswa</strong> yang terhubung </p></div>
                    </li>
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-blue-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm"><p>Data di disembunyikan pada <strong class="deleteDateAlert"></strong></p></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="confirmDeleteAlert text-red-950 w-full lg:w-[26rem] px-4 py-3 bg-red-100 border-l-4 border-red-600 rounded-md transition-all translate-x-[125%]" role="alert" aria-live="assertive">
    <div class="titleConfirmHide flex items-center gap-4">
        <i class="bi bi-trash-fill text-red-700"></i>
        <p class="text-lg">Kelas berhasil dihapus</p>
    </div>
    <div class="cntnWht ml-6 mt-2">
        <div class="infoWhatClassHide flex flex-col md:flex-row md:gap-4">
            <div class="icn flex items-center gap-2">
                <i class="bi bi-info-circle-fill text-lg text-red-700"></i>
                <p class="text-base block md:hidden">Info</p>
            </div>
            <div class="listInfoClassDelete text-base">
                <ul class="text-sm">
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-red-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm inline-flex gap-1"><p>Kelas <strong class="classGradeAlert"></strong> <strong class="classYearAlert"></strong> sudah dihapus</p></div>
                    </li>
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-red-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm inline-flex gap-1"><p class="line-clamp-2">Setidaknya terdapat <strong> <div class="studentInfoAlert font-bold"></div> siswa</strong> yang terhubung </p></div>
                    </li>
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-red-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm"><p>Data di dihapus pada <strong class="deleteDateAlert"></strong></p></div>
                    </li>
                    {{-- <li class="flex items-center">
                        <i class="dotList shrink-0 bg-red-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm"><p>Kelas @{{Kelas}} (@{{tahun}}) sudah dihapus</p></div>
                    </li>
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-red-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm"><p>Setidaknya terdapat 5 siswa yang terhubung</p></div>
                    </li>
                    <li class="flex items-center">
                        <i class="dotList shrink-0 bg-red-700 rounded-[100%] w-1.5 h-1.5 block mr-2"></i>
                        <div class="itm"><p>Data di hapus pada @{{waktu saat ini}}</p></div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>