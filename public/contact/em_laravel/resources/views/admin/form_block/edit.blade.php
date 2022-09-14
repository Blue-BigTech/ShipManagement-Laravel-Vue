@extends('admin.layout')
@section('title', __("admin_messages.page_title_form_item_edit") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="formRegistBtn" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="{{__("admin_messages.save")}}" onclick="$('#rewForm').submit();">
        <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.save")}}
      </a>
      @if(count($use_form_item_name) > 0 ||  $data['name'] == "email" && $data['html_id'] == "email" && $data['html_class'] == 'form-control')
        <a href="javascript:void (0);" class="btn btn-sm btn-default border-dark disabled" data-toggle="tooltip" data-title="{{__("admin_messages.cant_delete")}}">
          <i class="fas fa-trash"></i>&nbsp;{{__("admin_messages.cant_delete")}}
        </a>
      @else
        <a href="javascript:void (0);" class="btn btn-sm btn-danger detailDeleteBtn" data-toggle="tooltip" data-title="{{__("admin_messages.delete")}}">
          <i class="fas fa-trash"></i>&nbsp;{{__("admin_messages.delete")}}
        </a>
      @endif
    </div>
    <div class="row">
      <div class="col-3 mt-3 mb-1">
        <h3 class="page-header d-inline">{{__("admin_messages.form_block.form_block_edit")}}</h3>
        <a href="{{ route("admin.form_block.list") }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="{{ __("admin_messages.form_block.back_to_form_block_list") }}">
          <i class="fas fa-list-alt"></i>&nbsp;{{ __("admin_messages.form_block.back_to_form_block_list") }}
        </a>
      </div>
      <div class="col-7 mt-3 mb-1">
        @foreach($use_form_item_name as $val)
          <a href="{{config( 'app.url' )}}/{{$val['url']}}" class="btn border-1 btn-outline-dark text-decoration-none mt-1 font80" target="_blank" data-toggle="tooltip" title="{{ __("admin_messages.form.open_form") }}">
            {{$val['name']}}&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
          </a>
        @endforeach
      </div>
    </div>
    @include("admin.include.message")
    @if ($errors->any())
      <div class="row mt-1 mb-1">
        <ul class="col-6 list-group m-0">
          @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row mt-1">
      <div class="col-12">
        @isset($append['admin_form_block_edit_upper_form']){!! $append['admin_form_block_edit_upper_form'] !!}@endisset
        <form action="{{ route("admin.form_block.update", $data->id) }}" method="post" id="rewForm" enctype="multipart/form-data">
          @include('admin.form_block.form')
        </form>
        @isset($append['admin_form_block_edit_under_form']){!! $append['admin_form_block_edit_under_form'] !!}@endisset
        <form action="{{ route("admin.form_block.destroy", $data->id) }}" method="post" id="delForm">
          @csrf
        </form>
      </div>
    </div>

  </div>

  <input type="hidden" id="delTarget">
  @include('admin.modal.deleteConfModal')
  @include('admin.include.form_block_js')
  @include('admin.include.editor')
  <script>
    /**
     * フォームタイプ別に表示
     */
    if ( $ ( '#form_type' ).val () == 'text'|| $ ( '#form_type' ).val () == 'email' || $ ( '#form_type' ).val () == 'tel' ||
        $ ( '#form_type' ).val () == 'url' || $ ( '#form_type' ).val () == 'password' || $ ( '#form_type' ).val () == 'textarea') {
      $ ( '.text-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'select' || $ ( '#form_type' ).val () == 'multi_select' ) {
      $ ( '.select-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'radio' || $ ( '#form_type' ).val () == 'checkbox' ) {
      $ ( '.radio-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'file' ) {
      $ ( '.file-input' ).fadeIn ( 'fast' );
    }
    else if ( $ ( '#form_type' ).val () == 'name_and_furigana' ) {
      $ ( ".name_input" ).hide ();
      $ ( ".id_input" ).hide ();
      $ ( ".class_input" ).hide ();
      $ ( '.restriction-input' ).fadeIn ( 'fast' );
    }



    if (
      $ ( '#restriction' ).val () == 'katakana' ||
      $ ( '#restriction' ).val () == 'hiragana')
    {
      $ ( '.hankaku' ).hide ();
    }
    else if (
      $ ( '#restriction' ).val () == 'num' ||
      $ ( '#restriction' ).val () == 'alphabet_num' ||
      $ ( '#restriction' ).val () == 'alphabet' ||
      $ ( '#restriction' ).val () == 'alphabet_num_mix' ||
      $ ( '#restriction' ).val () == 'num_hyphen' ||
      $ ( '#restriction' ).val () == 'email' ||
      $ ( '#restriction' ).val () == 'tel' ||
      $ ( '#restriction' ).val () == 'tel_hyphen' ||
      $ ( '#restriction' ).val () == 'zip' ||
      $ ( '#restriction' ).val () == 'zip_hyphen'
    ) {
      $ ( '.zenkaku' ).hide ();
    }

  </script>
  @isset($append['admin_form_block_edit_form_bottom_section']){!! $append['admin_form_block_edit_form_bottom_section'] !!}@endisset
@endsection
