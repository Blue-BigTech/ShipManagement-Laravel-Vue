@extends('admin.layout')
@section('title', __("admin_messages.page_title_form_block_create") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="formRegistBtn" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="{{__("admin_messages.save")}}" onclick="$('#main_form').submit();">
        <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.save")}}
      </a>
    </div>
    <div class="row">
      <div class="col-4 mt-3 mb-1">
        <h3 class="page-header">{{__("admin_messages.menu.item_regist")}}</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="row mb-1">
        <ul class="col-6 list-group m-0">
          @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row">
      <div class="col-12">
        @isset($append['create_upper_form']){!! $append['create_upper_form'] !!}@endisset
        <form action="{{ route("admin.form_block.create") }}" method="post" enctype="multipart/form-data" id="main_form">
          @include('admin.form_block.form')
        </form>
        @isset($append['admin_form_block_create_under_form']){!! $append['admin_form_block_create_under_form'] !!}@endisset
      </div>
    </div>

  </div>
  @include('admin.include.form_block_js')
  @include('admin.include.editor')

  @isset($append['admin_form_block_create_bottom_section']){!! $append['admin_form_block_create_bottom_section'] !!}@endisset
@endsection
