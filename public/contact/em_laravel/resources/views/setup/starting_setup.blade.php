@extends("setup.layout")
@section('title', __('admin_messages.app_title').' Setup')
@section('content')
    <div class="container mt-3 pb-5">
        @include("admin.include.message")
        <h2>Welcometo EasyMail</h2>
        <a href="{{ route("admin.setup") }}">Strat EasyMail Setup</a>
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
@endsection
