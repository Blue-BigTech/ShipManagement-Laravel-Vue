@isset($append['upper_form']){!! $append['upper_form'] !!}@endisset
  <validation-observer ref="observer" slim>
    <div class="partsGrayBg">
      <form name="main_form" action="{{ $form->url ? route("index.send.url", ["url" => $form->url]) : route("index.send")}}" method="post" enctype="multipart/form-data" id="post_form" class="js_main_form">
        @csrf
        @isset($append['form_item_top']){!! $append['form_item_top'] !!}@endisset
        @isset($append['form_hidden']){!! $append['form_hidden'] !!}@endisset
        @isset($form->google_re_captcha_site_key)<input type="hidden" name="g-recaptcha-token" id="g-recaptcha-token" value="">@endisset

          @if ($errors->any())
            <div class="partsWrap row mb-1">
              <ul class="col-6 list-group m-0">
                @foreach ($errors->all() as $error)
                  <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <h2 class="partsWrap partsTitle01">{{ $form_title }}</h2>
          <p class="partsWrap mb80_pc mb30_sp "><span class="partsRed">※</span>{{ __("validation.attributes.form_message2") }}</p>
          {!! nl2br($form->input_form_header_message ? '<div v-if="!confirmMode" class="partsWrap mb30">'.$form->input_form_header_message.'</div>' : "") !!}
          {!! nl2br($form->conf_form_header_message ? '<div v-if="confirmMode" class="partsWrap mb30">'.$form->conf_form_header_message.'</div>' : "") !!}
          {!! nl2br($form->error_form_header_message ? '<div v-if="!confirmMode && validationMode" class="partsWrap mb30">'.$form->error_form_header_message.'</div>' : "") !!}
          <p v-if="confirmMode" class="partsWrap mb80_pc mb30_sp">{{ __("validation.attributes.form_message3") }}</p>
          <div class="partsWrap partsWhitebox">
            @foreach($form_items as $form_item)
              <div class="partsFormitem">
                <div class="name">
                  {{$form_item->title}}
                  @if($form_item->required == 1)<span class="partsRed inReq">※</span>@endif
                </div>
                @if ($form_item->description_above)
                  <span v-if="!confirmMode" class="font80  w-100">{!! nl2br($form_item->description_above) !!}</span>
                @endif
                @if ($form_item->form_type == 'text')
                  @if( $form_item->real_time_validation == 1)
                    <text-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </text-validate>
                  @else
                    <text-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </text-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'number')
                  @if( $form_item->real_time_validation == 1)
                    <number-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </number-validate>
                  @else
                    <number-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </number-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'email')
                  @if( $form_item->real_time_validation == 1)
                    <email-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </email-validate>
                  @else
                    <email-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </email-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'tel')
                  @if( $form_item->real_time_validation == 1)
                    <tel-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </tel-validate>
                  @else
                    <tel-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </tel-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'date')
                  @if( $form_item->real_time_validation == 1)
                    <date-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </date-validate>
                  @else
                    <date-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </date-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'datetime')
                  @if( $form_item->real_time_validation == 1)
                    <datetime-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </datetime-validate>
                  @else
                    <datetime-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </datetime-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'month')
                  @if( $form_item->real_time_validation == 1)
                    <month-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </month-validate>
                  @else
                    <month-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </month-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'time')
                  @if( $form_item->real_time_validation == 1)
                    <time-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </time-validate>
                  @else
                    <time-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </time-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'password')
                  @if( $form_item->real_time_validation == 1)
                    <password-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </password-validate>
                  @else
                    <password-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </password-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'textarea')
                  @if( $form_item->real_time_validation == 1)
                    <textarea-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </textarea-validate>
                  @else
                    <textarea-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </textarea-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'url')
                  @if( $form_item->real_time_validation == 1)
                    <url-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </url-validate>
                  @else
                    <url-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </url-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'zp_address')
                  @if( $form_item->real_time_validation == 1)
                    <zip-validate
                    :form_item='@json($form_item)'
                    :pref_choices='@json($pref_choices)'
                    :confirm-mode="confirmMode"
                    >
                    </zip-validate>
                  @else
                    <zip-none-real-validate
                    :form_item='@json($form_item)'
                    :pref_choices='@json($pref_choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </zip-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'select')
                  {{-- @if( $form_item->real_time_validation == 1)
                    <select-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    >
                    </select-validate>
                  @else
                    <select-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </select-none-real-validate>
                  @endif --}}
                  <select-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                  </select-none-real-validate>
                @endif
                @if ($form_item->form_type == 'multi_select')
                  {{-- @if( $form_item->real_time_validation == 1)
                    <multiselect-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    >
                    </multiselect-validate>
                  @else
                    <multiselect-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </multiselect-none-real-validate>
                  @endif --}}
                  <multiselect-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </multiselect-none-real-validate>
                @endif
                @if ($form_item->form_type == 'radio')
                  {{-- @if( $form_item->real_time_validation == 1)
                    <radio-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    >
                    </radio-validate>
                  @else
                    <radio-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </radio-none-real-validate>
                  @endif --}}
                  <radio-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </radio-none-real-validate>
                @endif
                @if ($form_item->form_type == 'checkbox')
                  {{-- @if( $form_item->real_time_validation == 1)
                    <checkbox-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    >
                    </checkbox-validate>
                  @else
                    <checkbox-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </checkbox-none-real-validate>
                  @endif --}}
                  <checkbox-none-real-validate
                    :form_item='@json($form_item)'
                    :choices='@json($choices)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </checkbox-none-real-validate>
                @endif
                @if ($form_item->form_type == 'file')
                  @if( $form_item->real_time_validation == 1)
                    <file-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </file-validate>
                  @else
                    <file-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </file-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'first_last_name')
                  @if( $form_item->real_time_validation == 1)
                    <fullname-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </fullname-validate>
                  @else
                    <fullname-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </fullname-none-real-validate>
                  @endif
                @endif
                @if ($form_item->form_type == 'name_and_furigana')
                  @if( $form_item->real_time_validation == 1)
                    <name-and-furigana-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    >
                    </name-and-furigana-validate>
                  @else
                    <name-and-furigana-none-real-validate
                    :form_item='@json($form_item)'
                    :confirm-mode="confirmMode"
                    :validation-mode="validationMode"
                    >
                    </name-and-furigana-none-real-validate>
                  @endif
                @endif

                {{-- 説明文下 --}}
                @if ($form_item->description_below)
                  <span v-if="!confirmMode">{!! nl2br($form_item->description_below) !!}</span>
                @endif

                {{-- {{文字数制限}}--}}
                @if($form_item->min_length > 0 && $form_item->max_length > 0)
                  <span v-if="!confirmMode">{{__("restriction.length",["min" => $form_item->min_length, "max" => $form_item->max_length])}}</span>
                @elseif($form_item->min_length > 0)
                  <span v-if="!confirmMode"> {{__("restriction.min_length",["min" => $form_item->min_length])}}</span>
                @elseif($form_item->max_length > 0)
                  <span v-if="!confirmMode">{{__("restriction.max_length",["max" => $form_item->max_length])}}</span>
                @endif

              </div>
            @endforeach
            @isset($append['form_item_bottom']){!! $append['form_item_bottom'] !!}@endisset
          </div>
      </form>

    @isset($append['under_form']){!! $append['under_form'] !!}@endisset
    {!! nl2br($form->input_form_footer_message ? '<div v-if="!confirmMode" class="partsWrap mt30">'.$form->input_form_footer_message.'</div>' : "") !!}
    {!! nl2br($form->conf_form_footer_message ? '<div v-if="confirmMode" class="partsWrap mt30">'.$form->conf_form_footer_message.'</div>' : "") !!}
    {!! nl2br($form->error_form_footer_message ? '<div v-if="!confirmMode && validationMode" class="partsWrap mt30 error">'.$form->error_form_footer_message.'</div>' : "") !!}

    <div class="formBtnarea">
      <p class="inLead confirmView">{{ __("validation.attributes.form_message4") }}</p>
      <div class="inBtns">
        <button
          type="button"
          v-on:click="confirm"
          v-if="!confirmMode"
          class="formBtns__btn outline js_conf_btn"
        >{{__("validation.attributes.conf_btn")}}
        </button>
        <button
          type="button"
          v-on:click="back"
          v-if="confirmMode"
          class="formBtns__btn outline submitarea "
        >{{__("validation.attributes.back_btn")}}
        </button>
        <submit-button
          :form='@json($form)'
          :send-btn='@json(__("validation.attributes.send_btn"))'
          :confirm-mode="confirmMode"
        >
        </submit-button>
      </div>
    </div>
  </validation-observer>
</div>

@section('script')
@endsection

@section('style')
@endsection
