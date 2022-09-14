@extends("setup.layout")
@section('title', __('admin_messages.app_title').' Setup')
@section('content')
    <div class="container mt-3 pb-5">
        @if (isset($errors))
            <div class="row mb-1">
                <ul class="col-6 list-group m-0">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger p-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-1">
            @foreach($languages as $language)
                <div class="col-{{ 12/count($languages) }} text-center">
                    <a class="btn btn-sm btn-outline-dark col-12" href="{{ route('admin.setup.switch_language',["language" => $language->lang_name]) }}">
                        {{__("admin_messages.lang.".$language->lang_name)}}
                    </a>
                </div>
            @endforeach
        </div>
        @include("admin.include.message")
        <div class="form">
            <form method="POST" action="{{ route('admin.setup') }}" id="login_form">
                @csrf
                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4>URL</h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.install_url') }}</dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="url" value="@isset($req->url){{ $req->url }}@else{{ old("url") }}@endif" class="form-control" placeholder="https://exsample.com/contact">
                        </dd>
                    </dl>
                </div>
                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4>{{ __('setup.db_setting_info') }}</h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.db_host') }}</dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="host" value="@isset($req->host){{ $req->host }}@else{{ old("host", "localhost") }}@endif" class="form-control" placeholder="localhost">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.db_port') }}</dt>
                        <dd class="col-12 col-sm-8">
                            <input type="number" name="port" value="@isset($req->port){{ $req->port }}@else{{ old("port", "3306") }}@endif" class="form-control" placeholder="3306">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.db_name') }}</dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="database" value="@isset($req->database){{ $req->database }}@else{{ old("database") }}@endif" class="form-control">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.db_username') }}</dt>
                        <dd class="col-12 col-sm-8">
                            <input type="text" name="username" value="@isset($req->username){{ $req->username }}@else{{ old("username") }}@endif" class="form-control">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.db_password') }}</dt>
                        <dd class="col-12 col-sm-8 input-group">
                            <input type="password" name="password" value="{{ old("password") }}" class="form-control">
                            <div class="input-group-append">
                                <button class="btn password_eye_btn" type="button" data-name="password">
                                    <i class="fas fa-eye"></i>
                                    <i class="fas fa-eye-slash" style="display: none;"></i>
                                </button>
                            </div>
                        </dd>
                    </dl>
                </div>

                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4 class="">{{ __('setup.dash_board_login_info') }}</h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.dash_board_login_email') }}</dt>
                        <dd class="col-12 col-sm-8">
                            <input type="email" name="login_email" value="@isset($req->login_email){{ $req->login_email }}@else{{ old("login_email") }}@endif" class="form-control">
                        </dd>
                        <dt class="col-12 col-sm-4 text-right">{{ __('setup.dash_board_login_password') }}</dt>
                        <dd class="col-12 col-sm-8 input-group">
                            <input type="password" name="login_password" id="random_pass" value="@isset($req->login_password){{ $req->login_password }}@else{{ old("login_password") }}@endif" class="form-control">
                            <div class="input-group-append">
                                <button class="btn password_eye_btn" type="button" data-name="login_password">
                                    <i class="fas fa-eye"></i>
                                    <i class="fas fa-eye-slash" style="display: none;"></i>
                                </button>
                            </div>
                            <span class="font80 js_input_control w-100">{{__("restriction.alphabet_num_mix")}}{{__("restriction.length", ["min" => 8, "max" => 32])}}</span>
                            <button type="button" id="auto_pass" class="btn btn-sm btn-outline-secondary mt-1">{{__("admin_messages.rew_pass.password_generator")}}</button>
                        </dd>
                    </dl>
                </div>

                @include('admin.include.random_password')

                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4 class="">{{ __('setup.language_select') }}</h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">
                            {{ __('setup.language') }}
                        </dt>
                        <dd class="col-12 col-sm-8">
                            <select name="language" class="form-control col-3">
                                @foreach($languages as $lang)
                                    <option value="{{$lang->lang_name}}" {{ old("language") == $lang->lang_name ? "selected" : "" }}>
                                        {{__("admin_messages.lang.".$lang->lang_name)}}
                                    </option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>
                </div>

                <div class="shadow p-3 mb-5 bg-light rounded">
                    <h4 class="">{{ __('setup.timezone_select') }}</h4>
                    <dl class="d-flex flex-wrap align-items-center">
                        <dt class="col-12 col-sm-4 text-right">
                            {{ __('setup.timezone') }}
                        </dt>
                        <dd class="col-12 col-sm-8">
                            <select name="timezone" class="form-control col-3">
                                @foreach($time_zone as $value)
                                    <option value="{{ $value }}" {{ old("timezone") == $value ? "selected" : "" }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>
                </div>

                <div class="col-12 mt-3 mb-3">
                    <button type="submit" class="btn btn-outline-primary col-4 offset-4">{{ __('setup.setting_form_submit') }}</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('style')
    <style>
        dt {
            font-weight: normal;
        }

        .password_eye_btn {
            border: 1px solid lightgray;
            color: gray;
        }

        .password_eye_btn:hover {
            border: 1px solid #343a40;
            color: #343a40;
            transition-duration: 0.3s;
            transition-delay: 0s;
        }

        label:hover, input[type="radio"] {
            cursor: pointer;
        }
    </style>
    <script>
        $ ( document ).ready ( function() {
          $ ( '.fa-eye-slash' ).hide ();
          $ ( '.password_eye_btn' ).on ( 'click', function() {
              if ( !$ ( this ).data ( "name" ) ) {
                  return false;
              }
              if ( $ ( '[name=' + $ ( this ).data ( "name" ) + ']' ).get ( 0 ).type == 'password' ) {
                  $ ( '[name=' + $ ( this ).data ( "name" ) + ']' ).get ( 0 ).type = 'text';
                  $ ( this ).children ( '.fa-eye' ).hide ();
                  $ ( this ).children ( '.fa-eye-slash' ).show ();
              }
              else {
                  $ ( '[name=' + $ ( this ).data ( "name" ) + ']' ).get ( 0 ).type = 'password';
                  $ ( this ).children ( '.fa-eye' ).show ();
                  $ ( this ).children ( '.fa-eye-slash' ).hide ();
              }
          } );
        } );
    </script>
@endsection
