@extends("theme.{$data->theme_name}.layout")
@section('content')
    <div class="container mb-5">
        <h6 class="text-center mt-3">@if(isset($form->thanks_message)){!! nl2br($form->thanks_message) !!}@endif</h6>
    </div>
@endsection

@section('style')
@endsection
