@csrf
@isset($append['admin_form_block_edit_form_hidden']){!! $append['admin_form_block_edit_form_hidden'] !!}@endisset
  <table class="table">
    @isset($append['admin_form_block_edit_form_item_top']){!! $append['admin_form_block_edit_form_item_top'] !!}@endisset
    <tr>
        <th>{{ __('admin_messages.list_page.sort') }}<span class="red f80">※</span></th>
        <td>
            <input type="text" name="view_no" id="view_no" class="form-control"
                value=" @isset($data) {{ $data->view_no }} @else 1 @endisset">
        </td>
    </tr>
    <tr>
      <th>{{ __('admin_messages.form_block.from_category') }}<span class="red f80">※</span></th>
      <td>
      <select name="form_type" id="form_type" class="form-control">
          <option value="">{{ __('admin_messages.select') }}</option>
          @foreach ($form_type as $key => $value)
              <option value="{{ $key }}" @isset($data) {{ $data->form_type === $key ? 'selected' : '' }}@endisset>
                  {{ $value }}</option>
          @endforeach
          @isset($append['admin_form_block_edit_form_type_option']){!! $append['admin_form_block_edit_form_type_option'] !!}@endisset
          </select>
      </td>
    </tr>
    <tr>
        <th>{{ __('admin_messages.form_block.title') }}<span class="red f80">※</span></th>
        <td>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ $data->title ?? old('title') }}">
        </td>
    </tr>
    <tr class="name_input init-tr">
        <th>{{ __('admin_messages.form_block.attr_name') }}</th>
        @isset($data)
          @if($data['name'] == 'email' && $data['html_id'] == 'email' && $data['html_class'] == 'form-control')
            <td>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ $data->name ?? old('name') }}" disabled>
                <input type="hidden" name="name" id="name" class="form-control" value="email">
            </td>
          @else
            <td>
              <input type="text" name="name" id="name" class="form-control"
                  value="{{ $data->name ?? old('name') }}">
            </td>
          @endif
        @else
          <td>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ $data->name ?? old('name') }}">
          </td>
        @endisset
    </tr>
    <tr class="id_input init-tr">
        <th>{{ __('admin_messages.form_block.attr_id') }}</th>
        @isset($data)
          @if ($data['name'] == 'email' && $data['html_id'] == 'email' && $data['html_class'] == 'form-control')
              <td>
                  <input type="text" name="html_id" id="html_id" class="form-control"
                      value="{{ $data->html_id ?? old('html_id') }}" disabled>
              </td>
          @else
              <td>
                  <input type="text" name="html_id" id="html_id" class="form-control"
                      value="{{ $data->html_id ?? old('html_id') }}">
              </td>
          @endif
        @else
          <td>
            <input type="text" name="html_id" id="html_id" class="form-control"
                value="{{ $data->html_id ?? old('html_id') }}">
          </td>
        @endisset
    </tr>
    <tr class="class_input init-tr">
        <th>{{ __('admin_messages.form_block.attr_class') }}</th>
        @isset($data)
          @if ($data['name'] == 'email' && $data['html_id'] == 'email' && $data['html_class'] == 'form-control')
            <td>
                <input type="text" name="html_class" id="html_class" class="form-control"
                    value="{{ $data->html_class ?? old('html_class') }}" disabled>
            </td>
          @else
            <td>
                <input type="text" name="html_class" id="html_class" class="form-control"
                    value="{{ $data->html_class  ?? old('html_class') }}">
            </td>
          @endif
        @else
          <td>
            <input type="text" name="html_class" id="html_class" class="form-control"
                value="{{ $data->html_class  ?? old('html_class') }}">
          </td>
        @endisset
    </tr>
    <tr class="init-tr">
        <th>{{ __('admin_messages.form_block.required_error_msg') }}</th>
        <td>
            <input type="text" name="required_error_msg" id="required_error_msg" class="form-control"
                value="{{ $data->required_error_msg ?? old('required_error_msg') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.forbidden_characters') }}<p class="font80">
                {{ __('admin_messages.form_block.forbidden_characters_input_msg') }}</p>
        </th>
        <td>
            <input type="text" name="forbidden_characters" id="forbidden_characters" class="form-control"
                value="{{ $data->forbidden_characters ?? old('forbidden_characters') }}">
        </td>
    </tr>

    {{-- text password textarea --}}
    <tr class="hide-input text-input restriction-input">
        <th>{{ __('admin_messages.form_block.restriction') }}</th>
        <td>
            <select name="restriction" id="restriction" class="form-control">
                <option value="">{{ __('admin_messages.select') }}</option>
                @foreach ($restriction as $key => $value)
                  <option value="{{ $key }}" @isset($data)@if ($data->restriction == $key) selected @endif @endisset {{old('restriction') == $key ? 'selected' : ''}}>{{ $value }}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr class="hide-input text-input restriction-input">
        <th>{{ __('admin_messages.form_block.restriction_error_msg') }}</th>
        <td>
            <input type="text" name="restriction_error_msg" id="restriction_error_msg" class="form-control"
                value="{{ $data->restriction_error_msg ?? old('restriction_error_msg') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.restriction_char_limit') }}</th>
        <td class="form-inline">
            <input type="number" name="min_length" id="min_length" class="form-control"
                value="{{ $data->min_length ?? old('min_length') }}">～
            <input type="number" name="max_length" id="max_length" class="form-control"
                value="{{ $data->max_length ?? old('max_length') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.restriction_char_limit_error_msg') }}</th>
        <td>
            <input type="text" name="length_error_msg" id="length_error_msg" class="form-control"
                value="{{ $data->length_error_msg  ?? old('length_error_msg') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.initial_value') }}</th>
        <td>
            <input type="text" name="initial_value" id="initial_value" class="form-control"
                value="{{ $data->initial_value ?? old('initial_value') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.placeholder') }}</th>
        <td>
            <input type="text" name="placeholder" id="placeholder" class="form-control"
                value="{{ $data->placeholder ?? old('placeholder') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.re_enter_error_msg') }}</th>
        <td>
            <input type="text" name="re_enter_error_msg" id="re_enter_error_msg" class="form-control"
                value="{{ $data->re_enter_error_msg ?? old('re_enter_error_msg') }}">
        </td>
    </tr>
    <tr class="hide-input text-input">
        <th>{{ __('admin_messages.form_block.hankaku_zenkaku_automatic_conversion') }}</th>
        <td class="d-flex">
            <div class="mr-5 custom-control custom-radio hide-input text-input ">
                <input type="radio" id="default" name="hankaku_zenkaku_automatic_conversion"
                    class="custom-control-input" value="default" @isset($data)@if ($data->hankaku_zenkaku_automatic_conversion == 'default') checked @endif @endisset {{old('hankaku_zenkaku_automatic_conversion') == 'default' ? 'checked' : ''}} checked>
                <label class="custom-control-label"
                    for="default">{{ __('admin_messages.form_block.default') }}</label>
            </div>
            <div class="mr-5 custom-control custom-radio hide-input text-input hankaku">
                <input type="radio" id="hankaku" name="hankaku_zenkaku_automatic_conversion"
                    class="custom-control-input" value="hankaku" @isset($data)@if ($data->hankaku_zenkaku_automatic_conversion == 'hankaku') checked @endif @endisset {{old('hankaku_zenkaku_automatic_conversion') == 'hankaku' ? 'checked' : ''}} >
                <label class="custom-control-label"
                    for="hankaku">{{ __('admin_messages.form_block.zenkaku_to_hankaku') }}</label>
            </div>
            <div class="mr-5 custom-control custom-radio hide-input text-input zenkaku">
                <input type="radio" id="zenkaku" name="hankaku_zenkaku_automatic_conversion"
                    class="custom-control-input " value="zenkaku" @isset($data) @if ($data->hankaku_zenkaku_automatic_conversion == 'zenkaku') checked @endif @endisset {{old('hankaku_zenkaku_automatic_conversion') == 'zenkaku' ? 'checked' : ''}}>
                <label class="custom-control-label"
                    for="zenkaku">{{ __('admin_messages.form_block.hankaku_to_zenkaku') }}</label>
            </div>
        </td>
    </tr>

    {{-- select --}}
    <tr class="{{ old('select_choice_label_text') ? '' : 'hide-input' }}  select-input">
        <th>{{ __('admin_messages.form_block.choice') }}</th>
        <td>
          <div class="col-1">
              <i class="far fa-plus-square add_select_choice_btn"></i>
          </div>
          <div class="col-11">
              <div id="select_choice_wrap">
                @isset($select_choice)
                  @foreach ($select_choice as $row)
                      <div class="row form-inline mb-1">
                          <input type="text" name="select_choice_label_text[]"
                              class="form-control type_select_input select_choice_label_text"
                              value="{{ $row->label_text }}">
                          <i class="far fa-trash-alt trash_select_choice_btn"></i>
                      </div>
                  @endforeach
                @else
                  @foreach((array)old('select_choice_label_text') as $value)
                    <div class="row form-inline mb-1">
                      <input type="text" name="select_choice_label_text[]" class="form-control type_select_input select_choice_label_text" value="{{$value}}">
                      <i class="far fa-trash-alt trash_select_choice_btn"></i>
                    </div>
                  @endforeach
                @endisset
              </div>
            </div>
        </td>
    </tr>

    {{-- radio checkbox --}}
    <tr class="{{ old('radio_choice_label_text') ? '' : 'hide-input' }}  radio-input">
        <th>{{ __('admin_messages.form_block.choice') }}</th>
        <td>
            <div class="col-1">
                <i class="far fa-plus-square add_radio_choice_btn"></i>
            </div>
            <div class="col-11">
              <div id="radio_choice_wrap">
                @isset($radio_choice)
                  @foreach ($radio_choice as $row)
                    <div class="row form-inline mb-1">
                      <input type="hidden" name="radio_choice_id[]"
                        value="@isset($row->id){{ $row->id }}@endisset" />
                    <input type="hidden" name="choice_image_old[]" value="@isset($row->image){{ $row->image }}@endisset" />
                    <input type="text" name="radio_choice_label_text[]" class="form-control type_select_input radio_choice_label_text" value="@isset($row->label_text){{ $row->label_text }}@endisset">
                      @isset($row->image)
                          <img src="{{ url(Storage::disk('form_item_image')->url($row->image)) }}" class="img-thumbnail choice_img" />
                      @endisset
                    <div class="custom-control custom-checkbox ml-1">
                        <input type="checkbox" name="radio_choice_image_delete[]"
                            id="customCheck{{ $loop->iteration }}" class="custom-control-input"
                            value="@isset($row->image){{ $row->image }}@endisset">
                            <label class="custom-control-label"
                                for="customCheck{{ $loop->iteration }}">{{ __('admin_messages.form_block.image_delete') }}</label>
                        </div>
                        <input type="file" name="choice_image[]" class="form-control type_select_input"
                            accept=".jpg,.png,.gif,image/jpeg">
                        <i class="far fa-trash-alt trash_radio_choice_btn"></i>
                    </div>
                  @endforeach
                @else
                  @foreach((array)old('radio_choice_label_text') as $value)
                    <div class="row form-inline mb-1">
                      <input type="text" name="radio_choice_label_text[]" class="form-control type_select_input radio_choice_label_text" value="{{$value}}">
                      <div id="choice_image_place"></div>
                      <input type="file" name="choice_image[]" class="form-control type_select_input" accept=".jpg,.png,.gif,image/jpeg">
                      <i class="far fa-trash-alt trash_radio_choice_btn"></i>
                    </div>
                  @endforeach
                @endisset
              </div>
            </div>
        </td>
      </tr>

      <tr class="hide-input radio-input">
          <th>{{ __('admin_messages.form_block.columns') }}</th>
          <td class="form-inline">
              <input type="number" name="columns" id="columns" class="form-control"
                  value="{{ $data->columns ?? old('columns') }}">
          </td>
      </tr>

      {{-- file --}}
      <tr class="hide-input file-input">
          <th>{{ __('admin_messages.form_block.file_type') }}</th>
          <td>
              <input type="text" name="file_type" id="file_type" class="form-control"
                  value="{{ $data->file_type ?? old('file_type') }}">
              <span class="font80 w-100">{{ __('admin_messages.form_block.file_extension') }}</span>
          </td>
      </tr>
      <tr class="hide-input file-input">
          <th>{{ __('admin_messages.form_block.file_capacity_limit') }}（kbyte）</th>
          <td class="form-inline">
              <input type="number" name="file_capacity_limit" id="file_capacity_limit" class="form-control"
                  value="{{ $data->file_capacity_limit ?? old('file_capacity_limit') }}">kbyte
              <span class="font80 w-100">1MB = 1024kbyte</span>
              <span class="font80 w-100">※{{ __('admin_messages.form_block.file_capacity_limit_alert_message') }}</span>
          </td>
      </tr>
      {{-- description --}}
      <tr class="init-tr">
          <th>{{ __('admin_messages.form_block.description_above') }}</th>
          <td>
              <textarea type="text" name="description_above" id="editor"
                  class="form-control">{{ $data->description_above ?? old('description_above') }}</textarea>
          </td>
      </tr>
      <tr class="init-tr">
          <th>{{ __('admin_messages.form_block.description_below') }}</th>
          <td>
              <textarea type="text" name="description_below" id="editor2"
                  class="form-control">{{ $data->description_below ?? old('description_below') }}</textarea>
          </td>
      </tr>
    @isset($append['admin_form_block_edit_form_item_bottom']){!! $append['admin_form_block_edit_form_item_bottom'] !!}@endisset
  </table>
  <style>
    .hide-input {
      display: none;
    }

    .fa-plus-square {
      color: cornflowerblue;
      font-size: 1.8rem;
      cursor: pointer;
    }

    .fa-trash-alt {
      color: #dc3545;
      margin-left: 5px;
      cursor: pointer;
    }

    input[type=file] {
      margin-left: 10px;
    }

    .form-inline .form-control.radio_choice_label_text, .form-inline .form-control.select_choice_label_text {
      width: 400px;
    }

    .choice_img {
      max-width: 100px;
      max-height: 100px;
      margin-left: 10px;
    }
  </style>
