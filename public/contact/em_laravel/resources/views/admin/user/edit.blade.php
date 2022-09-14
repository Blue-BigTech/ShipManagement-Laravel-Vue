@inject('user','App\User')
@extends('admin.layout')
@section('title', __("admin_messages.page_title_user_create") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <form action="{{ route("admin.users.update", $data->id) }}" method="post" id="rewForm">
      @csrf
      <div class="button_area">
        <a href="javascript:void(0);" class="btn btn-sm btn-primary text-white save_btn" data-toggle="tooltip" title="{{__("admin_messages.form.saved")}}">
          <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.form.saved")}}
        </a>
        <a onclick="" class="btn btn-sm btn-danger text-white detailDeleteBtn form_delete_btn" data-toggle="tooltip" title="{{__("admin_messages.delete")}}">
          <i class="fas fa-trash"></i>&nbsp;{{__("admin_messages.delete")}}
        </a>
      </div>
      <div class="row">
        <div class="col-12 mt-3 mb-1">
          <h3 class="page-header">{{__("admin_messages.menu.user_edit")}}</h3>
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
      @isset($append['admin_user_edit_form_hidden']){!! $append['admin_user_edit_form_hidden'] !!}@endisset
      <table class="table table-hover">
        <tbody>
        @isset($append['admin_user_edit_form_item_top']){!! $append['admin_user_edit_form_item_top'] !!}@endisset
        <tr>
          <th>{{__("admin_messages.user.login")}}</th>
          <td colspan="2">
            <div class="custom-control custom-switch">
              <input name="login_flag" type="hidden" value="0"/>
              <input type="checkbox" name="login_flag" value="1" class="custom-control-input" id="custom_switch_login_flag" @isset($data) @if($data->login_flag == 1) checked @endif @endisset {{ old('login_flag') == 1 ? 'checked' : '' }}>
              <label class="custom-control-label" for="custom_switch_login_flag">{{__("admin_messages.user.login_permissions")}}</label>
            </div>
          </td>
        </tr>
        <tr>
          <th>{{__("admin_messages.user.auth_role")}}</th>
          <td>
            <select name="role" class="form-control">
              @foreach($user::$auth_role as $key => $role)
                @if ($data->role == $key)
                  <option value="{{ $key }}" selected>{{ $user->getUserRoleLanguage($key) }}</option>
                @else
                  <option value="{{ $key }}">{{ $user->getUserRoleLanguage($key) }}</option>
                @endif
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <th>{{__("admin_messages.user.email")}}<span class="red f80">※</span></th>
          <td>
            <input type="text" name="email" id="email" class="form-control" value="{{ $data->email ?? old('email') }}">
          </td>
        </tr>
        <tr>
          <th>{{__("admin_messages.user.password")}}</th>
          <td colspan="2">
            <input type="text" name="password" id="random_pass" class="form-control" value="">
            <span class="password_error_msg"></span>
            <button type="button" id="auto_pass" class="btn btn-sm btn-outline-secondary mt-1">{{__("admin_messages.rew_pass.password_generator")}}</button>
          </td>
        </tr>
        <tr>
          <th>{{__("admin_messages.form.language")}}</th>
          <td>
            <select name="language" id="language" class="form-control w-25">
              @isset($language)
                @foreach($language as $key => $val)
                  <option value="{!! $val->lang_name !!}">{!! $val->lang_name !!}</option>
                @endforeach
              @endisset
            </select>
          </td>
        </tr>
        @isset($append['admin_user_item_bottom']){!! $append['admin_user_item_bottom'] !!}@endisset
        @isset($append['admin_user_edit_user_item_bottom']){!! $append['admin_user_edit_user_item_bottom'] !!}@endisset
        </tbody>
      </table>
    </form>
    <script>
      $ ( document ).ready ( function() {
        $ ( '.save_btn' ).on ( 'click', function() {
          $ ( window ).off ( 'beforeunload' );
          $ ( '#rewForm' ).submit ();
        } );

        function genRandomStr () {
          // 使用する文字の定義
          let str = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789_";
          // 桁数の定義
          let len = 32;

          let result = "";
          for ( let i = 0; i < len; i++ ) {
            result += str.charAt ( Math.floor ( Math.random () * str.length ) );
          }
          $ ( '#random_pass' ).val ( result );
        }

        $ ( '#auto_pass' ).on ( "click", function() {
          genRandomStr ();
        } );

      } );
    </script>

  </div>
  <script src="{{ config('app.admin_assets_url') }}/js/admin_form.js"></script>
  @isset($append['admin_from_create_bottom_section']){!! $append['admin_from_create_bottom_section'] !!}@endisset
@endsection
