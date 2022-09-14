@extends('admin.layout')
@section('title', __("admin_messages.page_title_form_block") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <style>
    .copy_btn {
      padding: 0;
      border: none;
      padding: 0 3px;
    }
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 mt-3">
        <h3 class="page-header">{{__("admin_messages.menu.item_list")}}</h3>
      </div>
    </div>
    @include("admin.include.message")
    <div class="table-responsive">
      <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th style="width: 50px;">{{__("admin_messages.list_page.sort")}}</th>
          <th>{{__("admin_messages.form_block.title")}}</th>
          <th>{{__("admin_messages.form_block.attr")}}</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $row)
          <tr>
            <td>{{$row['view_no']}}</td>
            <td>
              {{ __("validation.attributes.".$row['name']) != "validation.attributes.".$row['name'] ? __("validation.attributes.".$row['name']) : $row['title'] }}
            </td>
            <td>
              <div class="row">
                <div class="col-8">
                  @foreach($row['use_form_item_name'] as $val)
                    <a href="{{config( 'app.url' )}}/{{$val['url']}}" class="btn border-1 btn-outline-dark text-decoration-none font80 mt-1 text-center" target="_blank" data-toggle="tooltip" title="{{__("admin_messages.form.open_form")}}">
                      {{$val['name']}}&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
                    </a>
                  @endforeach
                </div>
                <div class="col-4 d-flex justify-content-end">
                  <a href="{{ route('admin.form_block.copy', $row['id']) }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="{{__("admin_messages.form.copy_form")}}" style="max-height: 30px; max-width: 30px;">
                    <i class="fas fa-copy"></i>
                  </a>
                  <a href="{{ route('admin.form_block.edit', $row['id']) }}" class="btn btn-sm btn-primary ml-1" data-toggle="tooltip" title="{{__("admin_messages.edit")}}" style="max-height: 30px; max-width: 30px;">
                    <i class="fas fa-edit"></i>
                  </a>
                  @if(count($row['use_form_item_name']) > 0 || $row['name'] == "email" && $row['html_id'] == 'email' && $row['html_class'] == 'form-control' )
                    <a href="javascript:void (0);" class="btn btn-sm btn-default border-dark ml-1 disabled" data-toggle="tooltip" data-title="{{__("admin_messages.cant_delete")}}">
                      <i class="fas fa-trash"></i>
                    </a>
                  @else
                    <form action="{{ route('admin.form_block.destroy', $row['id']) }}" method="post" id="{{$row['id']}}">
                      @csrf
                    </form>
                    <a data-id="{{$row['id']}}" class="btn btn-sm list-btn btn-danger listDeleteBtn ml-1" data-toggle="tooltip" title="{{__("admin_messages.delete")}}" style="max-height: 30px; max-width: 30px;">
                      <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                  @endif
                </div>
              </div>

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
  @isset($append['admin_form_block_list_bottom_section']){!! $append['admin_form_block_list_bottom_section'] !!}@endisset
@endsection
