@inject('user','App\User')
@extends('admin.layout')
@section('title', __("admin_messages.page_title_user_create") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="formRegistBtn" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="{{__("admin_messages.save")}}" onclick="$('#main_form').submit();">
        <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.save")}}
      </a>
    </div>
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h3 class="page-header">{{__("admin_messages.menu.user_regist")}}</h3>
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
        @isset($append['admin_user_create_upper_form']){!! $append['admin_user_create_upper_form'] !!}@endisset
        <form action="{{ route("admin.users.store") }}" method="post" id="main_form">
          @include('admin.user.form')
        </form>
      </div>
    </div>

  </div>
  <script>
    let is_rewrite = false;
    $ ( window ).on ( 'beforeunload', function( e ) {
      if ( is_rewrite === true ) {
        e.returnValue = "{{ __("admin_messages.user.no_saved_alert_msg") }}";
      }
    } );
    $ ( document ).ready ( function() {
      $ ( '.form-control' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '.custom-control-input' ).on ( 'change', function() {
        is_rewrite = true;
      } );
      $ ( '#formRegistBtn' ).on ( 'click', function() {
        is_rewrite = false;
      } );
    } );
  </script>
  <script src="{{ config('app.admin_assets_url') }}/js/admin_form.js"></script>
  @isset($append['admin_from_create_bottom_section']){!! $append['admin_from_create_bottom_section'] !!}@endisset
@endsection
