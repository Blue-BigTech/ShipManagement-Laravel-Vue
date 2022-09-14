@extends("theme.{$data->theme_name}.layout")

@section('content')
  <div class="content">
    <div class="contentWrap container colWrap rtl">
      <div class="main">
        <h3 class="col-12 text-center">404 Not found</h3>
      </div>
    </div>
  </div>
@endsection
@section('style')
  <style>
    .main{
      width: 100% !important;
      margin-top: 50px;
    }
  </style>
@endsection
