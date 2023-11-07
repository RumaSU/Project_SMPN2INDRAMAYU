<div class="logImageSchool-navRight flex justify-between align-items-center px-12 py-5">
    <a href="/" class="gotoHomepage">
        <div class="image-Logoschool flex justify-center align-items-center gap-2">
            <div class="image self-center">
                <img src="assets/img/main/example-image.jpg" alt="" class="w-11">
            </div>
            <div class="textNameSchool hidden md:flex flex-col justify-center align-items-center">
                <p class="text-base text-blue-700 font-bold -my-1 p-0">SMP NEGERI 2 INDRAMAYU</p>
                <p class="text-sm font-bold -my-1 p-0">INDRAMAYU - JAWA BARAT</p>
            </div>
        </div>
    </a>
    <div class="navigation self-center relative hidden lg:flex items-center">
        <ul class="flex flex-column align-items-center justify-between gap-4 text-black font-bold group">
            <li class="relative group">
                <div class="gotoHome">
                    <a href="/" class="py-1.5 px-4">Beranda</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoProfile" onmouseover="showDropdown()" onmouseleave="hideDropdown()">
                    <a href="" class="py-1.5 px-4 group">Profil</a>
                    <div id="dropDownProfile" class="dropDownProfile absolute w-48 -right-14 transition-all duration-400 ease-in-out z-50" style="top: -200%; visibility: hidden; opacity: 0;">
                        <div class="p-4 text-sm font-normal mt-4 w-48  border border-black rounded-md bg-white">
                            <div class="py-1 flex">
                                <a href="" class="hover:text-gray-400">Sekolah</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Pendidik</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Tenaga Kependidikan</a>
                            </div>
                            <div class="py-1">
                                <a href="/kelas" class="hover:text-gray-400">Siswa</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Osis</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Ekstrakurikuler</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </li>
            <li class="relative group">
                <div class="gotoNews">
                    <a href="" class="py-1.5 px-4">Berita</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoGalery">
                    <a href="" class="py-1.5 px-4">Galeri</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoLogin">
                    <a href="/login" class="py-1.5 px-4">Login</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="ml-2 -my-1 flex lg:hidden">
        <button id="tglBtn-navWrapper" type="button" class="text-slate-500 w-8 h-8 flex items-center justify-center self-center hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
            <span class="sr-only"></span>
            <img src="assets/img/icon/three_dots.svg" alt="">
        </button>
    </div>
    <div class="navigation-wrap fixed top-12 right-4 w-full max-w-xs bg-white rounded-lg shadow-lg p-6 text-base font-semibold text-black dark:highlight-white/5 z-[10] lg:hidden hidden">
        <button id="tglClsBtn-navWrapper" type="button" class="absolute top-5 right-5 w-8 h-8 flex items-center justify-center text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300 z-[11]">
            <span class="sr-only">Close navigation</span>
            <img src="assets/img/icon/close-lights.svg" alt="">
        </button>
        <ul class="group space-y-4 mt-8">
            <li class="relative group">
                <div class="gotoHome">
                    <a href="" class="py-1.5 px-4 flex hover:bg-gray-200">Beranda</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoProfile">
                    <a href="" class="py-1.5 px-4 group">Profil</a>
                    <div id="dropDownProfile" class="dropDownProfile">
                        <div class="text-sm font-normal ml-8 w-48 space-y-0">
                            <div class="py-1 flex">
                                <a href="" class="hover:text-gray-400">Sekolah</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Pendidik</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Tenaga Kependidikan</a>
                            </div>
                            <div class="py-1">
                                <a href="/kelas" class="hover:text-gray-400">Siswa</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Osis</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Ekstrakurikuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoNews">
                    <a href="" class="py-1.5 px-4">Berita</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoGalery">
                    <a href="" class="py-1.5 px-4">Galeri</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoLogin">
                    <a href="" class="py-1.5 px-4">Login</a>
                </div>
            </li>
        </ul>
    </div>
</div>

