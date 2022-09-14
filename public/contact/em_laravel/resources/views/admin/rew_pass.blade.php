@extends('admin.layout')
@section('title', __("admin_messages.page_title_rew_pass") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" id="rew_pass_btn" class="btn btn-sm btn-danger" data-toggle="tooltip" data-title="{{__("admin_messages.save")}}">
        <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.save")}}
      </a>
    </div>
    <div class="row">
      <div class="col-4 mt-3 mb-1">
        <h3 class="page-header">{{__("admin_messages.rew_pass.rewriting_pass")}}</h3>
      </div>
    </div>
    @include("admin.include.message")
    @if ($errors->any())
      <div class="row mb-1">
        <ul class="col-6 list-group m-0">
          @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="table-responsive">
      @isset($append['admin_rew_pass_upper_form']){!! $append['admin_rew_pass_upper_form'] !!}@endisset
      <form action="{{ route("admin.rew_pass") }}" method="post" id="rewForm">
        @csrf
        @isset($append['admin_rew_pass_form_hidden']){!! $append['admin_rew_pass_form_hidden'] !!}@endisset
        <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
          <tbody>
          <tr>
            <th>{{__("admin_messages.rew_pass.now_login_email")}}</th>
            <td>
              <input type="text" name="email" id="email" class="form-control" value="{{ $email ?? old("email")}}">
              <span class="email_error_msg"></span>
            </td>
          </tr>
          <tr>
            <th>{{__("admin_messages.rew_pass.now_login_password")}}</th>
            <td>
              <input type="password" name="password" id="password" class="form-control" value="">
              <span class="password_error_msg"></span>
            </td>
          </tr>
          <tr>
            <th>{{__("admin_messages.rew_pass.new_login_email")}}</th>
            <td>
              <input type="text" name="new_email" id="new_email" class="form-control" value="{{old("new_email")}}">
              <span class="new_email_error_msg"></span>
            </td>
          </tr>
          <tr>
            <th>{{__("admin_messages.rew_pass.new_login_password")}}</th>
            <td>
              <input type="text" name="new_password" id="random_pass" class="form-control" value="">
              <span class="new_password_error_msg"></span>
              <button type="button" id="auto_pass" class="btn btn-sm btn-outline-secondary mt-1">{{__("admin_messages.rew_pass.password_generator")}}</button>
            </td>
          </tr>
          </tbody>
        </table>
      </form>
      @isset($append['admin_rew_pass_under_form']){!! $append['admin_rew_pass_under_form'] !!}@endisset
    </div>
  </div>
  @include('admin.modal.passRewConfModal')
  @include('admin.include.random_password')
  <style>
    th {
      width: 20%;
      font-weight: normal;
    }
  </style>
  <script>
    $ ( document ).ready ( function() {
      $ ( '#rew_pass_btn' ).on ( 'click', function() {
        let msg = '';
        msg += '<div>{{__("admin_messages.rew_pass.conf_msg_top")}}</div>';
        msg += '<div>{{__("admin_messages.rew_pass.conf_msg_middle")}}</div>';
        msg += '<div>{{__("admin_messages.rew_pass.conf_msg_bottom")}}</div>';
        $ ( '.modal-dialog' ).removeClass ( 'modal-sm' );
        $ ( '#passRewConfModalBody' ).html ( msg );
        $ ( '#passRewConfModal' ).modal ( 'show' );
      } );
      $ ( "#passRewYesBtn" ).on ( 'click', function() {
        $ ( "#rewForm" ).submit ();
      } );

    } );
  </script>
  @isset($append['admin_rew_pass_bottom_section']){!! $append['admin_rew_pass_bottom_section'] !!}@endisset
@endsection
