<div class="lzyPlaceHolder animate-pulse">
    <div class="topLoad">
        <div class="bg-gray-200 w-full h-16 rounded-lg"></div>
    </div>
    <div class="middleLoad mt-4 space-y-2">
        <div class="bg-gray-200 w-24 h-6 rounded-md"></div>
        <div class="flex items-center gap-2">
            <div class="bg-gray-200 w-full h-8 rounded-md"></div>
            <div class="bg-gray-200 w-8 h-8 rounded-md"></div>
        </div>
        <div class="flex items-center gap-2">
            <div class="bg-gray-200 w-full h-8 rounded-md"></div>
            <div class="bg-gray-200 w-8 h-8 rounded-md"></div>
        </div>
        <div class="flex items-center gap-2">
            <div class="bg-gray-200 w-full h-8 rounded-md"></div>
            <div class="bg-gray-200 w-8 h-8 rounded-md"></div>
        </div>
    </div>
    <div class="bottomLoad w-fit mt-4 mx-auto flex items-center gap-2">
        <div class="bg-gray-200 w-32 h-10 rounded-md"></div>
        <div class="bg-gray-200 w-32 h-10 rounded-md"></div>
    </div>
</div>
<form action="{{route('saveVisiMisi')}}" method="POST" class="formElementViMiProfile" style="display: none">
    @csrf
    <div class="visiInp">
        <div class="inpField relative">
            <label for="visiProfile" class="select-none ml-4 px-7 py-1 bg-white rounded-md absolute">Visi</label>
            <textarea name="visiProfil" id="visiProfile" class="resize-none w-full  mt-6 px-2 py-1.5 border border-black rounded-lg focus:outline-none" maxlength="512"></textarea>
        </div>
    </div>
    <div class="misiInp mt-4">
        <div class="ti">
            <strong>Misi</strong>
        </div>
        <div id="containerListInpMiProfile" class="listMisiInp space-y-1">
            {{-- <div class="itmInpMi relative flex items-center gap-4">
                <i class="bi bi-check-circle-fill text-2xl text-blue-600"></i>
                <div class="inpField w-full flex items-center gap-2">
                    <textarea name="misiProfil_1" id="misiProfil_1" class="resize-none w-full py-1 px-2 border border-black rounded-lg focus:outline-none"></textarea>
                    <div class="delElemn">
                        <span role="button" class="delItmInp border border-red-800 p-1.5 rounded-md bg-red-100 transition-all group hover:bg-red-600">
                            <i class="bi bi-trash-fill text-red-600 transition-all group-hover:text-red-50"></i>
                        </span>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="addMisi mt-4">
            <span role="button" id="addMisiProfile" class="flex py-2 items-center justify-center gap-2 border border-black rounded-lg bg-gray-100 hover:bg-gray-300 transition-all">
                <i class="bi bi-plus-circle"></i>
                <p>Tambah</p>
            </span>
        </div>
    </div>
    <div class="canSveViMi mt-6">
        <div class="cnt flex w-fit items-center gap-4 mx-auto">
            <span role="button" id="cancelEdViMi" class="block w-fit px-7 py-1 border-2 rounded-lg bg-gray-100 hover:bg-gray-300">
                <div class="t">Cancel</div>
            </span>
            <button type="submit" class="block w-fit px-7 py-1 text-white border-2 border-blue-900 rounded-lg transition-all bg-blue-500 hover:bg-blue-700">
                <div class="t">Simpan</div>
            </button>
        </div>
    </div>
</form>