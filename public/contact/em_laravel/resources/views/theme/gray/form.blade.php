@if ($errors->any())
  <div class="row mb-1">
    <ul class="col-6 list-group m-0">
      @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
{!! nl2br($form->input_form_header_message ? '<div class="js_input_control">'.$form->input_form_header_message.'</div>' : "") !!}
{!! nl2br($form->conf_form_header_message ? '<div class="js_conf_control">'.$form->conf_form_header_message.'</div>' : "") !!}
{!! nl2br($form->error_form_header_message ? '<div class="js_error_control">'.$form->error_form_header_message.'</div>' : "") !!}
@isset($append['upper_form']){!! $append['upper_form'] !!}@endisset
<form action="{{ $form->url ? route("index.send.url", ["url" => $form->url]) : route("index.send")}}" method="post" enctype="multipart/form-data" class="js_main_form">
  @csrf
  @isset($append['form_item_top']){!! $append['form_item_top'] !!}@endisset
  @isset($append['form_hidden']){!! $append['form_hidden'] !!}@endisset
  @isset($form->google_re_captcha_site_key)
    <input type="hidden" name="g-recaptcha-token" id="g-recaptcha-token" value="">
  @endisset
  @foreach($form_items as $form_item)
    {{-- お名前(フリガナ補完)に対応 --}}
    @if($form_item->form_type == "name_and_furigana")
      <dl class="d-flex flex-wrap align-items-center">
        <dt class="col-12 col-sm-4">
          {{$form_item->title}}
          @if($form_item->required == 1)
            <span class="text-danger js_input_control">※</span>
          @endif
        </dt>
        <dd class="col-12 col-sm-8 d-flex flex-wrap align-items-center">
          @if ($form_item->description_above)
            <span class="font80 js_input_control w-100">{!! nl2br($form_item->description_above) !!}</span>
          @endif
          <input type="text" name="your_name" id="your_name" class="js_input_control" value="{{ old('your_name') }}"/>
          {{--{{エラーメッセージ}}--}}
          <span class="js_error_control your_name_error_msg err_msg"></span>
          {{--{{確認メッセージ}} --}}
          <span class="js_conf_control your_name_conf_msg conf_msg"></span>
          @if ($form_item->description_below)
          <span class="font80 js_input_control w-100">{!! nl2br($form_item->description_below) !!}</span>
          @endif
        </dd>
      </dl>
      <dl class="d-flex flex-wrap align-items-center">
        <dt class="col-12 col-sm-4">
          @if($form_item->restriction == "hiragana")
          {{ __( "validation.attributes.kana_furigana" ) }}
          @else
          {{ __( "validation.attributes.furigana" ) }}
          @endif
          @if($form_item->required == 1)
            <span class="text-danger js_input_control">※</span>
          @endif
        </dt>
        <dd class="col-12 col-sm-8 d-flex flex-wrap align-items-center">
          <input type="text" name="name_and_furigana" id="name_and_furigana" class="js_input_control" value="{{ old('name_and_furigana') }}"/>
          {{--{{エラーメッセージ}}--}}
          <span class="js_error_control name_and_furigana_error_msg err_msg"></span>
          {{--{{確認メッセージ}} --}}
          <span class="js_conf_control name_and_furigana_conf_msg conf_msg"></span>
        </dd>
      </dl>
      @if($form_item->restriction == "hiragana")
        <script>
          $(function() {
            $.fn.autoKana('#your_name', '#name_and_furigana');
          });
        </script>
      @else
        <script>
          $(function() {
            $.fn.autoKana('#your_name', '#name_and_furigana', {katakana:true});
          });
        </script>
      @endif
      @continue
    @endif
    <dl class="d-flex flex-wrap align-items-center">
      <dt class="col-12 col-sm-4">
        {{$form_item->title}}
        @if($form_item->required == 1)
          <span class="text-danger js_input_control">※</span>
        @endif
      </dt>
      <dd class="col-12 col-sm-8 d-flex flex-wrap align-items-center">
        {{-- 説明文上 --}}
        @if ($form_item->description_above)
          <span class="font80 js_input_control w-100">{!! nl2br($form_item->description_above) !!}</span>
        @endif
        @switch($form_item->form_type)
          @case("text")
          <input type="text" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("number")
          <input type="number" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("email")
          <input type="email" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("tel")
          <input type="tel" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("url")
          <input type="url" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("date")
          <input type="date" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("datetime")
          <input type="datetime-local" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("month")
          <input type="month" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("time")
          <input type="time" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("password")
          <input type="password" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
          @break
          @case("textarea")
          <textarea name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" placeholder="{{$form_item->placeholder}}">@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif</textarea>
          @break
          @case("select")
          <select name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control">
            <option value="">{{__("restriction.select_option",["attribute" => $form_item->title] ) }}</option>
            @foreach($choices as $choice)
              @if($choice->choice_type == "select" && $form_item->form_block_id == $choice->block_id)
                <option value="{{$choice->label_text}}" @if(old($form_item->name) == $choice->label_text) selected @endif>{{$choice->label_text}}</option>
              @endif
            @endforeach
          </select>
          @break
          @case("multi_select")
          <select name="{{$form_item->name}}[]" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control h-auto" multiple>
            @foreach($choices as $choice)
              @if($choice->choice_type == "select" && $form_item->form_block_id == $choice->block_id)
                <option value="{{$choice->label_text}}" @if(old($form_item->name) == $choice->label_text) selected @endif>{{$choice->label_text}}</option>
              @endif
            @endforeach
          </select>
          @break
          @case("radio")
          @foreach($choices as $choice)
            @if($choice->choice_type == "radio" && $form_item->form_block_id == $choice->block_id)
              <div class="col-12 col-md{{$form_item->columns ? "-".(12/$form_item->columns) : ""}} {{$form_item->html_id}}_wrap js_input_control">
                <label for="{{$form_item->html_id}}{{$loop->index}}" class="{{$form_item->html_id}}_label">
                  @if($choice->image)
                    <img src="{{ url(Storage::disk('form_item_image')->url($choice->image)) }}" class="img-fluid choice_img"/>
                  @endif
                  <input type="radio" name="{{$form_item->name}}" value="{{$choice->label_text}}" id="{{$form_item->html_id}}{{$loop->index}}" class="{{$form_item->html_class}}" @if(old($form_item->name) == $choice->label_text) checked @endif>
                  {{$choice->label_text}}
                </label>
              </div>
            @endif
          @endforeach
          @break
          @case("checkbox")
          @foreach($choices as $choice)
            @if($choice->choice_type == "checkbox" && $form_item->form_block_id == $choice->block_id)
              <div class="col-12 col-md{{$form_item->columns ? "-".(12/$form_item->columns) : ""}} {{$form_item->html_id}}_wrap js_input_control">
                <label for="{{$form_item->html_id}}{{$loop->index}}" class="{{$form_item->html_id}}_label">
                  @if($choice->image)
                    <img src="{{ url(Storage::disk('form_item_image')->url($choice->image)) }}" class="img-fluid choice_img"/>
                  @endif
                  <input type="checkbox" name="{{$form_item->name}}[]" value="{{$choice->label_text}}" id="{{$form_item->html_id}}{{$loop->index}}" class="{{$form_item->html_class}}" @if (is_array(old($form_item->name)) && in_array($choice->label_text, old($form_item->name), true)) checked @endif>
                  {{$choice->label_text}}
                </label>
              </div>
            @endif
          @endforeach
          @break
          @case("file")
          <input type="file" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="{{$form_item->initial_value}}" placeholder="{{$form_item->placeholder}}" accept="{{$form_item->file_accept}}"/>
          @break
          @case("zp_address")
          <div class="col-12">
            <span class="js_input_control">{{__("validation.attributes.zip")}}&nbsp;</span>
            <input type="tel" name="zip" class="js_input_control js_zip" value="{{ old("zip") }}" placeholder="{{$form_item->placeholder}}">
          </div>
          <div class="col-12 js_input_control">
            <span class="js_input_control">{{__("validation.attributes.pref")}}&nbsp;</span>
            <select name="pref" class="mt-1 js_pref">
              <option value="">{{__("validation.attributes.pref")}}</option>
              @foreach($pref_choices as $pref_choice)
                <option value="{{$pref_choice->label_text}}" @if(old("pref") == $pref_choice->label_text) selected @endif>{{$pref_choice->label_text}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 p-0 pl-2 mt-1 js_input_control js_address">
            <input type="text" name="address" value="{{ old("address") }}" class="form-control js_address" placeholder="{{$form_item->placeholder}}">
          </div>
          @break
          @case("first_last_name")
          <div class="d-flex flex-wrap js_input_control">
            <div class="js_input_control"><input type="text" name="last_name" id="last_name" class="js_input_control" value="{{ old("last_name") }}" placeholder="{{$form_item->placeholder}}"></div>
            <div class="js_input_control ml-2"><input type="text" name="first_name" id="first_name" class="js_input_control" value="{{ old("first_name") }}" placeholder="{{$form_item->placeholder}}"></div>
          </div>
          @break
          @case("calendar")
          <div class="d-flex flex-wrap js_input_control">
            <input type="text" name="{{$form_item->name}}" id="{{$form_item->html_id}}" class="{{$form_item->html_class}} js_input_control" value="@if(old($form_item->name)){{ old($form_item->name) }}@else{{$form_item->initial_value}}@endif" placeholder="{{$form_item->placeholder}}"/>
            <script>
              $ ( document ).ready ( function() {
                $ ( '#{{$form_item->html_id}}' ).datepicker ( { dateFormat: 'yy-mm-dd', autoclose: true } );
              } );
            </script>
          </div>
          @break
        @endswitch

        {{--{{エラーメッセージ}}--}}
        <span class="js_error_control {{$form_item->name}}_error_msg err_msg"></span>

        {{--{{確認メッセージ}} --}}
        <span class="js_conf_control {{$form_item->name}}_conf_msg conf_msg"></span>

        {{-- {{入力制限}}    --}}
        {{-- @if($form_item->restriction)
          <span class="font80 js_input_control w-100">{{__("restriction.".$form_item->restriction)}}</span>
        @endif --}}
        {{-- 説明文下 --}}
        @if ($form_item->description_below)
          <span class="font80 js_input_control w-100">{!! nl2br($form_item->description_below) !!}</span>
        @endif

        {{-- {{文字数制限}}--}}
        @if($form_item->min_length > 0 && $form_item->max_length > 0)
          <span class="font80 js_input_control w-100">{{__("restriction.length",["min" => $form_item->min_length, "max" => $form_item->max_length])}}</span>
        @elseif($form_item->min_length > 0)
          <span class="font80 js_input_control w-100"> {{__("restriction.min_length",["min" => $form_item->min_length])}}</span>
        @elseif($form_item->max_length > 0)
          <span class="font80 js_input_control w-100">{{__("restriction.max_length",["max" => $form_item->max_length])}}</span>
        @endif

      </dd>
    </dl>
  @endforeach
  @isset($append['form_item_bottom']){!! $append['form_item_bottom'] !!}@endisset
</form>

@isset($append['under_form']){!! $append['under_form'] !!}@endisset
{!! nl2br($form->input_form_footer_message ? '<div class="js_input_control">'.$form->input_form_footer_message.'</div>' : "") !!}
{!! nl2br($form->conf_form_footer_message ? '<div class="js_conf_control">'.$form->conf_form_footer_message.'</div>' : "") !!}
{!! nl2br($form->error_form_footer_message ? '<div class="js_error_control">'.$form->error_form_footer_message.'</div>' : "") !!}

<div class="row mt-5">
  <div class="col-12 text-center js_input_control">
    <button class="col-6 btn btn-primary js_conf_btn">{{__("validation.attributes.conf_btn")}}</button>
  </div>
  <div class="col-6 text-center js_conf_control">
    <button class="col-8 btn btn-outline-primary js_back_btn">{{__("validation.attributes.back_btn")}}</button>
  </div>
  <div class="col-6 text-center js_conf_control">
    <button class="col-8 btn btn-primary js_send_btn">{{__("validation.attributes.send_btn")}}</button>
  </div>
</div>

@section('script')
  <script src="{{ $data->theme_path }}js/jquery-ui.js"></script>
  <script src="{{ $data->theme_path }}js/jquery.autoKana.js"></script>
  <script src="{{ $data->theme_path }}js/jquery.jpostal.min.js"></script>
  <script src="{{ $data->theme_path }}js/jquery.blockUI.js"></script>
  <script src='{{ $data->theme_path }}js/jquery.ui.datepicker-ja.js'></script>
  <script src="{{ $data->theme_path }}js/validation.js"></script>
  <script src="{{ $data->theme_path }}js/jquery.emform.js?t={{time()}}"></script>
  <script>
    $ ( document ).ready ( function() {
      $ ( ".js_main_form" ).emform ( {
        form_item: @json($form_items),
        file_limit_error_msg: '{{__("validation.js_file_limit_error_msg")}}',
        file_extension_error_msg: '{{__("validation.js_file_extension_error_msg")}}',
        input_error_msg: '{{__("validation.js_input_error_msg")}}',
        top_error_msg_view_flag: true,
        input_init_color: "#ffffff",
        input_error_color: "#fff0f5",
        scroll_to: "form"
      } );
    } );
  </script>
@endsection
@if($form->beforeunload_flag == 1)
  <script>
    let onBeforeunloadHandler = function(e) {
      e.returnValue = "{{ __("admin_messages.form_item.no_saved_alert_msg") }}"; //現在はカスタムメッセージは制御できない
    };
    // イベントを登録
    window.addEventListener('beforeunload', onBeforeunloadHandler, false);

    document.querySelector('.js_send_btn').addEventListener('click', function(){
      // イベントを削除
      window.removeEventListener('beforeunload', onBeforeunloadHandler, false);
      document.querySelector('.js_main_form').submit();
    }, false);
  </script>
@endif
@if($form->enter_forbidden_flag == 1)
  <script>
    window.onload = function(){
      document.onkeypress = enterForbidden;

      function enterForbidden(){
        if(window.event.keyCode == 13 && window.event.target.indexOf("textarea") === -1 ){
          return false;
        }
      }
    }
  </script>
@endif

@if($form->submit_disabled_flag == 1)
  <script>
    document.querySelector('.js_main_form').addEventListener('submit', function(){
      let elements = this.elements;
      for (let i = 0; i < elements.length; i++) {
        if (elements[i].type == 'submit') {// type属性値がsubmitの場合
          elements[i].disabled = true;// disabledにする
        }
      }
    });
  </script>
@endif

@section('style')
  <style>
    .js_conf_control {
      display: none;
    }
  </style>
@endsection
