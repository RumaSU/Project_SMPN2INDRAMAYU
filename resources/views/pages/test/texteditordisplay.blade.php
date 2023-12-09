@extends('layouts.main.main')
@section('link-rel')
    <script src="{{asset('assets/vendor/ckeditor5/build/ckeditor.js')}}"></script>
@endsection
@section('content')
    <h1 class="text-4xl">Hasil dari CKEditor</h1>
    <div class="list-items">
        <div class="items border border-black container mx-auto">
            <div class="title text-center">
                <h1 class="text-4xl">{{$contentFromDatabase->title}}</h1>
            </div>
            <div class="contentItems relative border">
                <div id="editor" class="prose prose-headings:my-0 prose-p:m-0 prose-ul:space-y-0 prose-li:m-0 prose-li:p-0 prose-img:object-cover prose-img:object-center">
                    {!! $contentFromDatabase->content !!}
                    {{-- {!! html_entity_decode($contentFromDatabase->content) !!} --}}
                    {{-- <br> --}}
                    {{-- {!! nl2br(htmlspecialchars($contentFromDatabase->content, ENT_QUOTES, 'UTF-8')) !!} --}}
                </div>
            </div>
            
            <div class="createAt">
                <p>{{$contentFromDatabase->created_at}}</p>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
@endsection