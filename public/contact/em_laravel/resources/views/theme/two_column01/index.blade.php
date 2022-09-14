@extends("theme.{$data->theme_name}.layout")
@section('content')
    <div class="content">
        <div class="contentHead">
            <h2 class="contentHead__ttl">{{$form_title}}</h2>
            <p><span class="reqdMark">※</span>{{__("validation.attributes.form_message2")}}</p>
        </div>
        <div class="formWrap">
            @include("theme.{$data->theme_name}.form")
        </div>
    </div>
@endsection

@section('style')
@endsection
