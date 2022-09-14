@extends('admin.layout')
@section('title', __("admin_messages.page_title_setting") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="button_area">
      <a href="javascript:void (0);" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-title="{{__("admin_messages.save")}}" onclick="$('#rewForm').submit();">
        <i class="fas fa-save"></i>&nbsp;{{__("admin_messages.save")}}
      </a>
    </div>
    <div class="row">
      <div class="col-4 mt-3 mb-1">
        <h3 class="page-header">{{__("admin_messages.menu.admin_setting")}}</h3>
      </div>
    </div>
    @include("admin.include.message")
    <div class="table-responsive mb-4">
      @isset($append['admin_setting_upper_form']){!! $append['admin_setting_upper_form'] !!}@endisset
      <form action="{{ route("admin.setting.update") }}" method="post" id="rewForm">
        @csrf
        @isset($append['admin_setting_form_hidden']){!! $append['admin_setting_form_hidden'] !!}@endisset
        <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
          <tbody>
          <tr>
            <th>URL</th>
            <td>
              <input type="text" name="url" class="form-control" value="{{$url}}">
            </td>
          </tr>
          <tr>
            <th>TimeZone</th>
            <td>
              <select name="time_zone" class="form-control">
                @foreach($time_zone as $value)
                  <option value="{{ $value }}" {{ $value == $timezone ? "selected" : "" }}>{{ $value }}</option>
                @endforeach
              </select>
            </td>
          </tr>
          </tbody>
        </table>
      </form>
      @isset($append['admin_setting_under_form']){!! $append['admin_setting_under_form'] !!}@endisset
    </div>
  </div>

  <style>
    th {
      width: 20%;
      font-weight: normal;
    }
  </style>
  @isset($append['admin_setting_form_bottom_section']){!! $append['admin_setting_form_bottom_section'] !!}@endisset
@endsection
