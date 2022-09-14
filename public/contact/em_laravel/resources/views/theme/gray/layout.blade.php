<!DOCTYPE html>
<html lang="ja">
<head>
  @isset($append['head_top']){!! $append['head_top'] !!}@endisset
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @isset( $form->description )<meta name="description" content="{{ $form->description }}">@endisset
  <title>{{ $form_title }}</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ $data->theme_path }}css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  @yield('style')
  @isset($append['head_bottom']){!! $append['head_bottom'] !!}@endisset
</head>
<body>
  @isset($append['body_top']){!! $append['body_top'] !!}@endisset
  @yield("style")
  <div class="container-fluid p-0 mb-5 pb-5">
    @include("theme.{$data->theme_name}.header")
    @yield("content")
    @yield("script")
    @include("theme.{$data->theme_name}.google_recaptcha")
    @include("theme.{$data->theme_name}.footer")
  </div>
  @isset($append['body_bottom']){!! $append['body_bottom'] !!}@endisset
  @if(config( "app.demo_mode" ))
  <script>
    $.blockUI ({
      message: "デモ画面ですので、保存、複製、削除、メール送信などの動作はできなくなっています。",
      fadeIn: 400,
      fadeOut: 700,
      // timeout: 5000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '60%',
        height: '46px',
        top: '10px',
        left: '20%',
        border: '1px solid #fa3701',
        padding: '12px',
        backgroundColor: "#fff",
        'border-radius': '3px',
        'border-color': '#fa3701',
        '-webkit-border-radius': '3px',
        '-moz-border-radius': '3px',
        opacity: 0.7,
        color: '#fa3701',
        'font-weight': 'bold',
        transition: 'box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)',
        cursor: 'default'
      }
    });
  </script>
  @endif
</body>
</html>
