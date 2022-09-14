<!DOCTYPE html>
<html lang="ja">
<head>
  @isset($append['head_top']){!! $append['head_top'] !!}@endisset
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @isset( $form->description )<meta name="description" content="{{ $form->description }}">@endisset
  <title>{{$form_title}}</title>
  <link rel="stylesheet" href="{{ $data->theme_path }}css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="{{ $data->theme_path }}css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  @isset($append['head_bottom']){!! $append['head_bottom'] !!}@endisset
</head>
<body>
  @isset($append['body_top']){!! $append['body_top'] !!}@endisset
  @yield("style")
  @include("theme.{$data->theme_name}.header")
  @yield("content")
  @yield("script")
  @include("theme.{$data->theme_name}.google_recaptcha")
  @include("theme.{$data->theme_name}.footer")
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
