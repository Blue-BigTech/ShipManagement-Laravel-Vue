@extends("theme.{$data->theme_name}.layout")
@section('content')
    <div class="container text-center">
        <h3 class="mt-5 mb-4">{{$form->name}}</h3>
        <h4 class="mt-5 mb-4">{{ __("messages.form.hidden") }}</h4>
    </div>
@endsection

@section('style')
@endsection
