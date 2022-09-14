@extends("setup.layout")
@section('title', __('admin_messages.app_title').' '.__('setup.setup_complete'))

@section('content')
    <div class="container">
        <h3 class="text-center mt-4">{{ __('setup.setup_complete') }}</h3>
        <p class="text-center">{{ __('setup.dash_board_login_comp_msg') }}</p>
        <p class="text-center">{{ __('setup.dash_board_login_comp_url_msg') }}</p>
        <div class="col-12 text-center">
            <a href="{{ $login_url }}" class="btn btn-outline-primary" target="_blank">
                {{ __('setup.login') }}
            </a>
            <p class="mt-2">If you can't make a transition, please wait a moment and try again.</p>
        </div>
    </div>
@endsection
