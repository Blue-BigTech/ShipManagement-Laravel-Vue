@extends('admin.layout')
@section('title', __("admin_messages.page_title_language") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_title"))
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h4 class="page-header">
                {{__("admin_messages.menu.language")}}
            </h4>
        </div>
        @include("admin.include.message")
        <div class="d-flex flex-wrap align-content-stretch">
            @foreach( $lang as $lang_row)
                <div class="col-3 mt-3 animated flipInY text-center">
                    <div class="border rounded p-3 shadow-sm h-100" style="min-height: 250px;">
                        <div class="col-12 mb-4">
                            <p>{{$lang_row->lang_name}}</p>
                        </div>
                        <div class="col-12 lang_detail_btn_wrap p-0">
                            <a href="{{route("admin.language_file.show", $lang_row->lang_name)}}" class="">
                                <i class="far fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
