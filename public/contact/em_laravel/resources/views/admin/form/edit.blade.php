@extends('admin.layout')
@section('title', __("admin_messages.page_title_form_edit") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="button_area">
      URL
      <a href="{{$url}}/{{$data->url}}" class="btn border-0 btn-outline-dark" target="_blank" data-toggle="tooltip" title="{{__("admin_messages.form.open_form")}}">
        {{$url}}/{{$data->url}}&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
      </a>
      <a href="{{ route("admin.form.list") }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="{{__("admin_messages.form.back_to_form_list")}}">
        <i class="fas fa-list"></i>&nbsp;{{__("admin_messages.form.back_to_form_list")}}
      </a>
      <a href="{{ route('admin.form_item.edit', $data->id) }}" class="btn btn-sm btn-primary form_rew_btn" data-toggle="tooltip" title="{{__("admin_messages.form.edit_item")}}">
        <i class="fas fa-list-alt"></i>&nbsp;{{__("admin_messages.form.edit_item")}}
      </a>
      <a href="javascript:void(0);" class="btn btn-sm btn-primary text-white save_btn" data-toggle="tooltip" title="{{__("admin_messages.form.saved")}}">
        <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.form.saved")}}
      </a>
      <a onclick="" class="btn btn-sm btn-danger text-white detailDeleteBtn form_delete_btn" data-toggle="tooltip" title="{{__("admin_messages.delete")}}">
        <i class="fas fa-trash"></i>&nbsp;{{__("admin_messages.delete")}}
      </a>
    </div>
    <div class="row mt-3">
      <h4 class="page-header col-4">
        {{__("admin_messages.form.form_edit")}}
      </h4>
    </div>
    @include("admin.include.message")
    @if ($errors->any())
      <div class="row mb-1 mt-1">
        <ul class="col-6 list-group m-0">
          @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row mt-1">
      <div class="col-12">
        @isset($append['admin_form_edit_upper_form']){!! $append['admin_form_edit_upper_form'] !!}@endisset
        <form action="{{ route("admin.form.update", $data->id) }}" method="post" id="rewForm" enctype="multipart/form-data">
          @include('admin.form.form')
          <form action="{{ route("admin.form.destroy", $data->id) }}" method="post" id="delForm">
            @csrf
          </form>
      </div>
    </div>
  </div>
  <input type="hidden" id="delTarget">
  @include('admin.modal.deleteConfModal')

  <script>
    $ ( document ).ready ( function() {
      let is_rewrite = false;
      $ ( window ).on ( 'beforeunload', function( e ) {
        if ( is_rewrite === true ) {
          e.returnValue = "{{ __("admin_messages.form_item.no_saved_alert_msg") }}";
        }
      } );

      $ ( '.save_btn' ).on ( 'click', function() {
        $ ( window ).off ( 'beforeunload' );
        $ ( '#rewForm' ).submit ();
      } );
      $ ( '.form-control' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '.custom-control-input' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '.form_rew_btn' ).on ( 'click', function() {
        is_rewrite = false;
      } );
      $ ( '.form_delete_btn' ).on ( 'click', function() {
        is_rewrite = false;
      } );

    } );
  </script>
  <script src="{{ config('app.admin_assets_url') }}/js/admin_form.js"></script>
  @isset($append['admin_form_edit_bottom_section']){!! $append['admin_form_edit_bottom_section'] !!}@endisset
@endsection
