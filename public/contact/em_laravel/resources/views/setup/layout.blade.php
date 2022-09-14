<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @yield('style')
</head>
<body>
<style>
    h1 {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 3rem;
        font-weight: normal;
    }
    footer{
        color: #fff;
    }
    footer a{
        text-decoration: none;
        color: #fff;
    }
    footer a:hover{
        text-decoration: none;
        color: #9fcdff;
    }
</style>
<header>
    <div class="col-12 bg-dark text-light text-center p-5">
        <h1>{{__('admin_messages.app_title')}} Setup</h1>
    </div>
</header>

@yield('content')

<footer class="fixed-bottom bg-dark p-1 align-items-center justify-content-between small">
    <div class="row">
        <div class="col-6 text">
            <a href="{{__('admin_messages.easymail_url')}}" target="_blank" rel="noopener noreferrer">
                {{__('admin_messages.easymail_url')}}
            </a>
        </div>
    </div>
</footer>

@yield('script')
</body>
</html>
