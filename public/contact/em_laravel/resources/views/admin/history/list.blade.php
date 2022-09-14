@extends('admin.layout')
@section('title', __("admin_messages.page_title_history") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="row mt-3 mb-1">
      <div class="col-4">
        <h3 class="page-header">{{__("admin_messages.menu.history")}}</h3>
      </div>
    </div>
    <div class="row mt-3 mb-1">
      <div class="col-4">
        <form action="{{route("admin.history.list_in_form")}}" method="post" id="list_in_form">
          @csrf
          <select id="list_in_form_select" name="form_id" class="form-control" onchange="this.form.submit();">
            <option value="">{{ __("admin_messages.history.select_form_history") }}</option>
            @foreach($forms as $form)
              <option value="{{$form->id}}">{{$form->name}}</option>
            @endforeach
          </select>
        </form>
      </div>
    </div>
    @include("admin.include.message")
    <div class="table-responsive">
      @isset($append['admin_history_upper_table']){!! $append['admin_history_upper_table'] !!}@endisset
      @isset($append['admin_history_under_table']){!! $append['admin_history_under_table'] !!}@endisset
    </div>
    <input type="hidden" id="delTarget">
  </div>

  @include('admin.modal.deleteConfModal')
  @include('admin.include.list_bottom')
  @isset($append['admin_history_bottom_section']){!! $append['admin_history_bottom_section'] !!}@endisset
@endsection
