@csrf
@isset($append['admin_user_edit_form_hidden']){!! $append['admin_user_edit_form_hidden'] !!}@endisset
<table class="table table-hover">
  @isset($append['admin_user_edit_form_item_top']){!! $append['admin_user_edit_form_item_top'] !!}@endisset
  <tr>
    <th>{{__("admin_messages.user.login")}}</th>
    <td colspan="2">
      <div class="custom-control custom-switch">
        <input type="checkbox" name="login_flag" value="1" class="custom-control-input" id="custom_switch_login_flag" @isset($data) @if($data->login_flag == 1) checked @endif @endisset {{ old('login_flag') == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="custom_switch_login_flag">{{__("admin_messages.user.login_permissions")}}</label>
      </div>
    </td>
  </tr>
  <tr>
    <th>{{__("admin_messages.user.auth_role")}}</th>
    <td>
      <select name="role" class="form-control">
      @foreach($user::$auth_role as $key => $role)
        <option value="{{ $key }}">{{ $user->getUserRoleLanguage($key) }}</option>
      @endforeach
      </select>
    </td>
  </tr>
  <tr>
    <th>{{__("admin_messages.user.email")}}<span class="red f80">※</span></th>
    <td>
      <input type="text" name="email" id="email" class="form-control" value="{{ $data->email ?? old('email') }}">
    </td>
  </tr>
  <tr>
    <th>{{__("admin_messages.user.password")}}<span class="red f80">※</span></th>
    <td colspan="2">
      <input type="text" name="password" id="random_pass" class="form-control" value="">
      <span class="password_error_msg"></span>
      <button type="button" id="auto_pass" class="btn btn-sm btn-outline-secondary mt-1">{{__("admin_messages.rew_pass.password_generator")}}</button>
    </td>
  </tr>
  <tr>
    <th>{{__("admin_messages.form.language")}}</th>
    <td>
      <select name="language" id="language" class="form-control w-25">
        @isset($language)
          @foreach($language as $key => $val)
            <option value="{!! $val->lang_name !!}">{!! $val->lang_name !!}</option>
          @endforeach
        @endisset
      </select>
    </td>
  </tr>
  @isset($append['admin_user_item_bottom']){!! $append['admin_user_item_bottom'] !!}@endisset
  @isset($append['admin_user_edit_user_item_bottom']){!! $append['admin_user_edit_user_item_bottom'] !!}@endisset
</table>
<script>
  $ ( document ).ready ( function() {
    function genRandomStr () {
      // 使用する文字の定義
      let str = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789_";
      // 桁数の定義
      let len = 32;

      let result = "";
      for ( let i = 0; i < len; i++ ) {
        result += str.charAt ( Math.floor ( Math.random () * str.length ) );
      }
      $ ( '#random_pass' ).val ( result );
    }

    $ ( '#auto_pass' ).on ( "click", function() {
      genRandomStr ();
    } );

  } );
</script>
