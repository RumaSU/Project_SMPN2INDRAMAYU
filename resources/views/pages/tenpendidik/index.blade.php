@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="img-students flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
        style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
        <div class="content relative z-10 selft-center">
            <h1 class="text-4xl font-bold">Tenaga Kependidikan</h1>
            <h2 class="text-xl"> @{{Deskripsinya}} </h2>
        </div>
    </section>
    <section class="frmAddStnds mt-12">
        <div class="title-students text-2xl flex items-center px-6 md:px-12 gap-6 py-4 font-bold border-b-4 border-black relative">
            {{-- <form action="" method="POST" enctype="multipart/form-data" class="sr-only">
                @csrf
                <input type="file" name="fmt_Excel" id="fmtExcel" accept=".xlsx, .xls" value="" class="sr-only" onchange="openExcelPopUp(this)">
                <button type="submit" id="sbFmtExcel" class="sr-only"></button>
            </form>
            <button type="button" class="btrinp-file text-sm py-2 px-3 lg:px-6 border-2 border-gray-600 bg-gray-100 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="document.getElementById('fmtExcel').click()">
                <i class="bi bi-file-earmark-arrow-up-fill md:mr-2 text-2xl text-sky-400"></i>
                <p class="hidden md:block">File</p>
            </button> --}}
            <button class="btrcr-fm text-sm text-white py-2 px-4 lg:px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="showPopUpForm(this); addVals(this);">
                <i class="bi bi-plus-circle md:mr-2 text-2xl"></i>
                <p class="hidden md:block">Tenaga Kependidikan</p>
            </button>
        </div>
    </section>
    <section class="listStudents mt-8 px-4 md:px-8 space-y-12">
        {{-- <div class="list-items flex flex-wrap gap-5"> --}}
        <div class="list-items grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5">
            @for ($i=0; $i < 10; $i++)
                <div class="items-students aspect-[3/4]">
                    <div class="imgCont bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl overflow-hidden w-full h-full group relative">
                        <div class="button-editDel hidden md:block absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <img src="{{asset('assets/img/dumb/imgtemp 3.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                        <div class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-pointer" onclick="openPopup(this.previousElementSibling.src)">
                            <p class="itemClass text-white text-center font-bold ">
                                Test
                            </p>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="group bg-white regular-shadow flex justify-center items-center border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                <div class="add-icon">
                    <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                </div>
                <button type="button" class="btrpp-vii block w-full h-full inset-0 absolute z-10" onclick="showPopUpForm(this); addVals(this);"></button>
            </div>
        </div>
    </section>
    <section id="pop-upFormAdd" class="pop-upFormAdd hidden fixed w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50">
        <div class="mx-auto">
            <button id="btrpp" type="button" class="icon border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]" onclick="closePopUpForm(this)">
                <i class="bi bi-x text-5xl"></i>
            </button>
            <form action="{{ route('storeClass') }}" method="POST" class="form-addClass space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="classList" id="classInput" value="VII">
                <div class="imgClass block">
                    <div class="group bg-white regular-shadow w-80 h-80 border-dashed rounded-2xl overflow-hidden relative mx-auto">
                        <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <label for="imgClass"  class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 cursor-pointer">
                                <i class="bi bi-pencil"></i>
                            </label>
                            <button type="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <img src="" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50">
                        <label for="imgClass" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all cursor-pointer">
                            <label for="imgClass" class="itemClass w-3/4 py-2 text-white text-center font-bold cursor-pointer bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                <i class="bi bi-plus-circle text-lg"></i>
                                Add Image
                            </label>
                        </label>
                        <input type="file" name="imgClass" id="imgClass" accept="image/*" class="w-15 h-15 border border-black sr-only" onchange="previewFile(event)" value="">
                    </div>
                </div>
                <div class="teClass">
                    <div class="theLabels">
                        <label for="teacher" class="teachers font-bold">Wali Kelas</label>
                    </div>
                    <input type="text" id="teacher" class="border w-full py-2 px-4 rounded-lg">
                </div>
                <div class="tagClass">
                    <div class="theLabels">
                        <label for="tagClass" class="tagClass font-bold">Tag</label>
                    </div>
                    <input type="text" name="tagClass" id="tagClass" class="border w-full py-2 px-4 rounded-lg">
                </div>
                <div class="descClass">
                    <div class="theLabels">
                        <label for="desc" class="descClass font-bold" >Deskripsi Kelas</label>
                    </div>
                    <textarea name="desc" id="desc" rows="3" class="border w-full h-auto py-2 px-4 rounded-lg resize-none" maxlength="250"></textarea>
                </div>
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-blue-400"> Simpan </button>
            </form>
        </div>
    </section>
    <div id="confInpExcForm" class="flex flex-col justify-center items-center gap-[10%] fixed text-center overflow-hidden z-50 p-6 w-full h-full lg:w-1/3 lg:h-1/3 bg-white border border-black rounded-3xl aspect-square" style="top: 200%; left:50%; transform:translate(-50%, -50%); visibility: hidden; opacity: 0; transition: all .3s ease-in-out">
        <div class="close-btn absolute py-1 px-4 rounded-xl z-10 right-[2%] top-[5%] -translate-x-[2%] -translate-y-[5%]" onclick="closeExcelPopUp()">
            <i class="bi bi-x-circle-fill p-2 text-red-600 bg-white border border-black rounded-xl cursor-pointer" onclick="closeExcelPopUp()"></i>
        </div>
        <h1 class="text-lg 2xl:text-2xl font-bold">Konfirmasi Upload File</h1>
        <p class="line-clamp-1 overflow-hidden overflow-ellipsis max-w-[80%]">
            File : <label for="fmtExcel" id="labsFmtExcel" class="cursor-pointer font-bold px-4 py-2 transition duration-300 ease-in-out relative after:absolute after:w-full after:h-full after:border-2 after:rounded-xl after:border-transparent after:hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">text.xlsx</label>
        </p>
        <div class="btnCaSb flex items-center gap-6">
            <button type="button" class="text-sm py-2 px-6 border-2 border-gray-600 bg-gray-100 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="closeExcelPopUp()">Cancel</button>
            <button type="button" class="text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="document.getElementById('sbFmtExcel').click()">Submit</button>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="assets/js/students/formsInpExcel.js"></script>
    <script src="assets/js/students/grouplist.js"></script>
    <script src="assets/js/students/formsAdd.js"></script>
@endsection
