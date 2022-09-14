<?php
//title タイトル
//name name属性
//form_type フォームの種類 (text password textarea select multi_select radio checkbox file)
//hml_id id
//html_class class
//required_error_msg 未入力エラー時メッセージ
//restriction 入力制限 （katakana hiragana num alphabet_num alphabet alphabet_num_mix num_hyphen email tel tel_hyphen zip zip_hyphen）
//restriction_error_msg 入力制限エラー時メッセージ
//min_length 最小入力文字数(半角数字）
//max_length 最大入力文字数(半角数字）
//length_error_msg 文字数制限エラー時メッセージ
//initial_value 入力初期値
//placeholder Placeholder
//columns radio checkboxを選択した時の1行に表示する選択肢数
//file_type fileを選択した時のアップできるファイル形式（拡張子を:区切りで複数指定）
//file_capacity_limit fileを選択した時の1ファイルの容量上限（キロbyte）
//{{$form_item_parts[<name属性>][<出力するkey>]}}
?>

{{--{{$form_item_parts['email']['title']}}--}}
{{--{{$form_item_parts['email']['name']}}--}}
{{--{{$form_item_parts['email']['html_id']}}--}}
{{--{{$form_item_parts['email']['html_class']}}--}}
{{--{{$form_item_parts['email']['restriction']}}--}}
{{--{{$form_item_parts['email']['form_type']}}--}}
{{--{{$form_item_parts['email']['restriction']}}--}}
{{--{{$form_item_parts['email']['min_length']}}--}}
{{--{{$form_item_parts['email']['max_length']}}--}}
{{--{{$form_item_parts['email']['initial_value']}}--}}
{{--{{$form_item_parts['email']['placeholder']}}--}}
{{--{{$form_item_parts['email']['columns']}}--}}
{{--{{$form_item_parts['email']['file_type']}}--}}
{{--{{$form_item_parts['email']['file_capacity_limit']}}--}}
{{--{{$form_item_parts['email']['length_error_msg']}}--}}
{{--{{$form_item_parts['email']['required_error_msg']}}--}}
{{--{{$form_item_parts['email']['restriction_error_msg']}}--}}
{{--{{$form_item_parts['email']['required']}}--}}
{{--{{$form_item_parts['email']['re_enter_html_id']}}--}}

<div class="container mb-4">
    @if ($errors->any())
        <div class="row mb-1">
            <ul class="col-6 list-group m-0">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! $form->conf_form_header_message ? '<div class="js_conf_control">'.$form->conf_form_header_message.'</div>' : "" !!}
    {!! $form->error_form_header_message ? '<div class="js_error_control">'.$form->error_form_header_message.'</div>' : "" !!}

    <form action="{{route("index.send", $form->url)}}" method="post" enctype="multipart/form-data" class="js_main_form">
        @csrf
        <dl class="d-flex flex-wrap align-items-center">
            <dt class="col-12 col-sm-4">
                お名前
                @if($form_item_parts['name']['required'] == 1)
                    <span class="text-danger js_input_control">※</span>
                @endif
            </dt>
            <dd class="col-12 col-sm-8 d-flex flex-wrap align-items-center">
                <input type="text" name="{{ $form_item_parts['name']['name'] }}" id="{{ $form_item_parts['name']['name'] }}" class="{{ $form_item_parts['name']['name'] }} js_input_control" value="{{$form_item_parts['name']['initial_value']}}" placeholder="{{$form_item_parts['email']['initial_value']}}"/>
                <span class="js_error_control {{ $form_item_parts['name']['name'] }}_error_msg err_msg"></span>
                <span class="js_conf_control {{ $form_item_parts['name']['name'] }}_conf_msg conf_msg"></span>
            </dd>
            <dt class="col-12 col-sm-4">
                メールアドレス
                @if($form_item_parts['email']['required'] == 1)
                    <span class="text-danger js_input_control">※</span>
                @endif
            </dt>
            <dd class="col-12 col-sm-8 d-flex flex-wrap align-items-center">
                <input type="text" name="{{ $form_item_parts['email']['name'] }}" id="{{ $form_item_parts['email']['name'] }}" class="{{ $form_item_parts['name']['name'] }} js_input_control" value="{{$form_item_parts['email']['initial_value']}}" placeholder="{{$form_item_parts['email']['initial_value']}}"/>
                <span class="js_error_control {{ $form_item_parts['email']['name'] }}_error_msg err_msg"></span>
                <span class="js_conf_control {{ $form_item_parts['email']['name'] }}_conf_msg conf_msg"></span>
            </dd>
        </dl>
    </form>

    {!! $form->conf_form_footer_message ? '<div class="js_conf_control">'.$form->conf_form_footer_message.'</div>' : "" !!}
    {!! $form->error_form_footer_message ? '<div class="js_error_control">'.$form->error_form_footer_message.'</div>' : "" !!}

    <div class="row mt-5">
        <div class="col-12 text-center js_input_control">
            <button class="col-6 btn btn-primary js_conf_btn">確認</button>
        </div>
        <div class="col-6 text-center js_conf_control">
            <button class="col-4 btn btn-outline-primary js_back_btn">戻る</button>
        </div>
        <div class="col-6 text-center js_conf_control">
            <button class="col-4 btn btn-primary js_send_btn">送信</button>
        </div>
    </div>

</div>

@section('script')
    <script src="{{ $data->theme_path }}js/jquery-ui.js"></script>
    <script src="{{ $data->theme_path }}js/jquery.jpostal.min.js"></script>
    <script src="{{ $data->theme_path }}js/jquery.blockUI.js"></script>
    <script src='{{ $data->theme_path }}js/jquery.ui.datepicker-ja.js'></script>
    <script src="{{ $data->theme_path }}js/validation.js"></script>
    <script src="{{ $data->theme_path }}js/jquery.emform.js?t={{time()}}"></script>
    <script>
        $ (document).ready (function() {
            $ (".js_main_form").emform ({
                form_item: @json($form_items),
                file_limit_error_msg: '{{__("validation.js_file_limit_error_msg")}}',
                file_extension_error_msg: '{{__("validation.js_file_extension_error_msg")}}',
                input_error_msg: '{{__("validation.js_input_error_msg")}}',
                top_error_msg_view_flag: true
            });
        });
    </script>
@endsection

@section('style')
    <style>
        .js_conf_control {
            display: none;
        }
    </style>
@endsection
