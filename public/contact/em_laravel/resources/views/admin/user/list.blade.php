@inject('user','App\User')
@extends('admin.layout')
@section('title', __("admin_messages.page_title_user_list") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 mt-3">
        <h3 class="page-header">{{__("admin_messages.menu.users_list")}}</h3>
      </div>
    </div>
    @include("admin.include.message")
    <div class="table-responsive">
      <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
          <td>{{__("admin_messages.user.email")}}</td>
          <td>{{__("admin_messages.user.authority")}}</td>
          <td>{{__("admin_messages.form.language")}}</td>
          <td>{{__("admin_messages.user.login")}}</td>
          <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
          <tr>
            <td>{{$row->email}}</td>
            <td>{{$user->getUserRoleLanguage($row->role)}}</td>
            <td>{{$row->language}}</td>
            <td>
              @if ($row->login_flag == 1)
                <label class="alert alert-success form-list-view-flag">{{__("admin_messages.user.login_permissions")}}</label>
              @else
                <label class="alert alert-danger form-list-view-flag">{{__("admin_messages.user.login_rejection")}}</label>
              @endif
            </td>
            <td>
              <div class="col text-right">
                <a href="{{ route('admin.users.edit', $row->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="{{__("admin_messages.edit")}}">
                  <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{$row->id}}" class="btn btn-sm btn-danger listDeleteBtn" data-toggle="tooltip" title="{{__("admin_messages.delete")}}">
                  <i class="fas fa-trash" style="color: #fff;"></i>
                </a>
              </div>
              <form action="{{ route('admin.user.destroy', $row->id) }}" method="post" id="{{$row->id}}">
                @csrf
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="holder"></div>
    <input type="hidden" id="delTarget">
  </div>
  @include('admin.modal.deleteConfModal')
  @include('admin.include.list_bottom')
  @isset($append['admin_form_list_bottom_section']){!! $append['admin_form_list_bottom_section'] !!}@endisset
@endsection
