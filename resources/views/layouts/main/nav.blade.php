<div class="logImageSchool-navRight bg-white flex justify-between align-items-center px-6 lg:px-12 py-5">
    <a href="/" class="gotoHomepage">
        <div class="image-Logoschool flex justify-center align-items-center gap-2">
            <div class="image self-center">
                <img src="{{asset('assets/img/main/example-image.jpg')}}" alt="" class="w-11">
            </div>
            <div class="textNameSchool hidden md:flex flex-col justify-center align-items-center">
                <p class="text-base text-blue-700 font-bold -my-1 p-0">SMP NEGERI 2 INDRAMAYU</p>
                <p class="text-sm font-bold -my-1 p-0">INDRAMAYU - JAWA BARAT</p>
            </div>
        </div>
    </a>
    <div id="navigation-desktop" class="navigation-desktop self-center relative hidden lg:flex items-center">
        <ul class="flex flex-column align-items-center justify-between gap-4 text-black font-bold">
            <li class="relative">
                <div class="gotoHome">
                    <a href="/" class="py-1.5 px-4">Beranda</a>
                </div>
            </li>
            <li class=" relative">
                <div class="gotoProfile  group">
                    <a href="" class="py-1.5 px-4 group">Profil</a>
                    <div id="dropDownProfile" class="dropDownProfile absolute w-48 -right-14 transition-all duration-400 ease-in-out z-10 invisible opacity-0 group-hover:visible group-hover:opacity-100">
                        <div class="p-4 text-sm font-normal mt-4 w-48  border border-black rounded-md bg-white">
                            <div class="py-1 flex">
                                <a href="/profil" class="hover:text-gray-400">Sekolah</a>
                            </div>
                            <div class="py-1">
                                <a href="/pendidik" class="hover:text-gray-400">Pendidik</a>
                            </div>
                            <div class="py-1">
                                <a href="/tenpendidik" class="hover:text-gray-400">Tenaga Kependidikan</a>
                            </div>
                            <div class="py-1">
                                <a href="/kelas" class="hover:text-gray-400">Siswa</a>
                            </div>
                            <div class="py-1">
                                <a href="/osis" class="hover:text-gray-400">Osis</a>
                            </div>
                            <div class="py-1">
                                <a href="/ekstrakurikuler" class="hover:text-gray-400">Ekstrakurikuler</a>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            <li class="relative">
                <div class="gotoNews">
                    <a href="/berita" class="py-1.5 px-4">Berita</a>
                </div>
            </li>
            <li class="relative">
                <div class="gotoGalery">
                    <a href="/galeri" class="py-1.5 px-4">Galeri</a>
                </div>
            </li>
            <li class="relative">
                <div class="gotoLogin">
                    <a href="/login" class="py-1.5 px-4">Login</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="ml-2 -my-1 flex lg:hidden">
        <span role="button" id="tglBtn-navWrapper" type="button" class="text-3xl flex items-center justify-center self-center hover:text-slate-600">
            <span class="sr-only">Navigation Mobile</span>
            <i class="bi bi-three-dots-vertical"></i>
        </span>
    </div>
    <div id="navigation-mobile" class="navigation-wrap-mobile fixed top-0 left-0 w-full h-full bg-white z-50 lg:hidden hidden">
        <span role="button" id="tglClsBtn-navWrapper" type="button" class="text-3xl absolute top-5 right-5 w-8 h-8 flex items-center justify-center hover:text-slate-600 z-[11]">
            <span class="sr-only">Close navigation</span>
            <i class="bi bi-x text-3xl"></i>
        </span>
        <ul class="group space-y-4 mt-12 h-full overflow-y-scroll p-6">
            <li class="relative group">
                <div class="gotoHome">
                    <a href="" class="py-1.5 px-4 font-semibold flex hover:bg-gray-200">Beranda</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoProfile">
                    <a href="" class="py-1.5 px-4 group font-semibold">Profil</a>
                    <div id="dropDownProfile" class="dropDownProfile">
                        <div class="text-sm font-normal ml-8 w-48 space-y-0">
                            <div class="py-1 flex">
                                <a href="/profil" class="hover:text-gray-400">Sekolah</a>
                            </div>
                            <div class="py-1">
                                <a href="" class="hover:text-gray-400">Pendidik</a>
                            </div>
                            <div class="py-1">
                                <a href="/tenpendidik" class="hover:text-gray-400">Tenaga Kependidikan</a>
                            </div>
                            <div class="py-1">
                                <a href="/kelas" class="hover:text-gray-400">Siswa</a>
                            </div>
                            <div class="py-1">
                                <a href="/osis" class="hover:text-gray-400">Osis</a>
                            </div>
                            <div class="py-1">
                                <a href="/ekstrakurikuler" class="hover:text-gray-400">Ekstrakurikuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoNews">
                    <a href="/berita" class="py-1.5 px-4 font-semibold">Berita</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoGalery">
                    <a href="/galeri" class="py-1.5 px-4 font-semibold">Galeri</a>
                </div>
            </li>
            <li class="relative group">
                <div class="gotoLogin">
                    <a href="/login" class="py-1.5 px-4 font-semibold">Login</a>
                </div>
            </li>
        </ul>
    </div>
</div>

