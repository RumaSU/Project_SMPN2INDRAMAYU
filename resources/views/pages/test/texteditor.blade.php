@extends('layouts.main.main')
@section('link-rel')
    {{-- <script src="{{asset('assets/vendor/ckeditor5/build/ckeditor.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/vendor/ckeditor5-noImage/build/ckeditor.js')}}"></script> --}}
    <script src="{{asset('assets/vendor/ckeditor4-nolts/ckeditor.js')}}"></script>
    <style>
        .ck-editor__editable_inline {
            min-height: 450px;
        }
    </style>
@endsection
@section('content')
    <h1 class="text-4xl">CKEditor</h1>
    <div class="container mx-auto mt-5">
        <form action="/texteditor" method="POST">
            @csrf
            <div class="">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ Session::get('failed') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="card-title"> Create Post </h4>
                </div>
                <div class="container">
                    {{-- <div class="" style="display: block">
                        <label> Main Image </label>
                        <input type="file" name="additionalImage" placeholder="Enter the Title" class="w-full py-4 px-7 font-bold" accept="image/*" multiple>
                    </div> --}}
                    <div class="" style="display: block">
                        <label> Title </label>
                        <input type="text" name="title" placeholder="Enter the Title" class="w-full py-4 px-7 text-2xl font-bold">
                    </div>
                    {{-- <div class="">
                        <label> Body </label>
                        <textarea class="form-control p-0" id="content" placeholder="Enter the Description" rows="5" name="content"></textarea>
                    </div> --}}
                    <div class="">
                        <label> Body </label>
                        <textarea name="editor1" id="editor1" rows="10" cols="80" value="this is value">
                            {{old('editor1')}}
                        </textarea>
                    </div>
                    {{-- <div class="" style="display: block">
                        <label> Additional Image </label>
                        <input type="file" name="additionalImage" placeholder="Enter the Title" class="w-full py-4 px-7 font-bold" accept="image/*" multiple>
                    </div> --}}
                </div>
                <div class="mt-6">
                    <button type="submit" class="border-2 text-4xl border-green-900 px-12 py-4 rounded-xl"> Save </button>
                </div>
            </div>
        </form>
    </div>
    <div id="outputTextarea">
        asda
    </div>
@endsection
@section('custom-script')
    {{-- <script src="{{asset('assets/js/testing/texteditor.js')}}"></script> --}}
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#content') )
        //     .then(editor => {
        //         // window.editor = editor;
        //         console.log('Editor was initialized', editor);
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection