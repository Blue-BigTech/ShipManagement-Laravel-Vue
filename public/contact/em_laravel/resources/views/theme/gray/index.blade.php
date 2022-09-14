@extends("theme.{$data->theme_name}.layout")
@section('content')
    <div class="container text-center">
        <h3 class="mt-5 mb-4">{{$form_title}}</h3>
        <div class="container mb-4 p-0">
            @include("theme.{$data->theme_name}.form")
        </div>
    </div>
@endsection

@section('style')
@endsection
