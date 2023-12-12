@extends('pages.teachersMain.main')
@section('teachers.content')
    <section class="img-students flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
        style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
        <div class="content relative z-10 selft-center">
            <h1 class="text-4xl font-bold">Tenaga Kependidikan</h1>
            <a href="/tenPendidik" class="text-xl">Profil/Tenaga Kependidikan</a>
        </div>
    </section>
    <section class="frmAddTeachers mt-12">
        <div class="title-teachers text-2xl flex flex-col px-6 w-full lg:w-3/4 lg:mx-auto md:px-12 gap-6 py-4 font-bold border-b-4 border-black relative">
            <span role="button" id="btrcr-fmte" class="btrcr-fmte py-2 px-4 lg:px-6 flex items-center">
                <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                <p class="text-lg lg:text-3xl">Tenaga Kependidikan</p>
            </span>
        </div>
    </section>
    <section class="listTeachersStaff mt-8 px-4 md:px-8 space-y-12">
        <div id="list-itemsTeachers" class="list-items grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
            @foreach ($listTeachers as $teacher)
                <div class="items-teacher aspect-[3/4] overflow-hidden rounded-md relative group" title="{{ $teacher->name }}" data-item-id="{{ $teacher->teacher_id }}" aria-haspopup="true">
                    <div class="button-editDel hidden md:flex items-center gap-1 bg-black/40 absolute py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                        <span role="button"
                            class="editButtonTeacher border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit"
                            title="Edit {{ $teacher->name }}" aria-label="Edit {{ $teacher->name }}"
                            data-edit-id="{{ $teacher->teacher_id }}">
                            <i class="bi bi-pencil"></i>
                        </span>
                        <span role="button"
                            class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit"
                            title="Delete {{ $teacher->name }}" aria-label="Delete {{ $teacher->name }}" data-
                            data-delete-id="{{ $teacher->teacher_id }}">
                            <i class="bi bi-trash3"></i>
                        </span>
                    </div>
                    <div class="itemsTeacher-content bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl w-full h-full"
                        data-id="{{ $teacher->teacher_id }}">
                        <img src="{{ asset('storage/images/teachers/' . $teacher->name_files) }}" alt=""
                            class="supImg w-full h-full object-cover object-center">
                        <div
                            class="lg:w-3/4 lg:py-2 bg-white shadow-gray-500 shadow-sm rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] cursor-pointer">
                            <p class="itemClass text-center font-bold line-clamp-1" title="{{ $teacher->name }}"
                                aria-roledescription="">{{ $teacher->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($listTeachers) >= 1)
                <div id="addTeacher"
                    class="aspect-[3/4] group bg-white regular-shadow flex justify-center items-center border rounded-2xl overflow-hidden relative hover:bg-gray-500/25"
                    aria-haspopup="true"
                    @if (count($listTeachers) == 0) style="grid-column: 1 / -1; height: 14rem" @endif>
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <span role="button" class="btrpp-vii block w-full h-full inset-0 absolute"
                        title="add more teachers"></span>
                </div>
            @endif
            @if (!count($listTeachers))
                <div id="noData" class="group py-10 block bg-gray-200 regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25" style="grid-column: 1 / -1"> <div class="text-center text-gray-500"> <i class="bi bi-people-fill text-8xl"></i> <p>Belum ada data saat ini</p> </div> </div>
            @endif
        </div>
    </section>
@endsection