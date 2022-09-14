@extends('admin.layout')
@section('title', __("admin_messages.page_title_theme") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="row mt-3">
      <h4 class="page-header">
        {{ __("admin_messages.menu.theme") }}
      </h4>
    </div>
    @include("admin.include.message")
    <div class="row" style="max-width: 1400px;">
      @foreach( $theme as $theme_row)
        <div class="col-12 col-sm-4 col-md-3 mt-3 text-center">
          <div class="border rounded p-2 shadow-sm h-100">
            <div class="col-12 p-1">
              <div class="col-12 text-right mb-2">
                <a href="{{route("admin.theme.show", $theme_row->theme_name)}}" class=""><i class="far fa-edit"></i></a>
              </div>
              <img src="{{$theme_row->screen_shot}}" class="img-fluid">
              <p>{{$theme_row->theme_name}}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </div>
@endsection
