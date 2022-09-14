@extends("theme.{$data->theme_name}.layout")
@section('content')
    <div class="container text-center">
        <h3 class="mt-5 mb-4">{{$form->name}}</h3>
        <h4 class="mt-5 mb-4">
            @isset($form->denied_ip_host_error_msg){{ $form->denied_ip_host_error_msg }}@endisset
        </h4>
    </div>
@endsection

@section('style')
@endsection
