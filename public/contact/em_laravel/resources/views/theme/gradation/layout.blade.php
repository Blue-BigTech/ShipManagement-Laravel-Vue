<!DOCTYPE html>
<html lang="ja">
<head>
@isset($append['head_top']){!! $append['head_top'] !!}@endisset
<!-- meta -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @isset( $form->description )
    <meta name="description" content="{{ $form->description }}">@endisset
  <meta property="og:type" content="website">
  <meta property="og:url" content="{siteURL}/dummy">
  <meta property="og:image" content="">
  <meta property="og:title" content="{{ $form_title }}">
  <meta property="og:site_name" content="{{ $form_title }}"/>
  @isset( $form->description )
    <meta property="og:description" content="{{ $form->description }}">@endisset
<!-- title -->
  <title>{{ $form_title }}</title>
  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" media="all" href="{{ $data->theme_path }}css/initial.css">
  <link rel="stylesheet" media="all" href="{{ $data->theme_path }}css/style.css">
  <!-- js -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{ config('app.admin_assets_url') }}/js/jquery.blockUI.js"></script>
  <script src="https://yubinbango.github.io/yubinbango-core/yubinbango-core.js" charset="UTF-8"></script> {{-- 郵便番号チェック --}}
  <script src="{{ config('app.laravel_url') }}/public/js/gradation_validate.js"  defer></script>
  @yield('style')
  @isset($append['head_bottom']){!! $append['head_bottom'] !!}@endisset
</head>
<body>
@isset($append['body_top']){!! $append['body_top'] !!}@endisset
<div id="wrapper" class="formPage">
{{--<div id="wrapper" class="confirmPage">--}}
  @yield("style")
  @include("theme.{$data->theme_name}.header")
  <main id="container">
    <div id="app">
      @yield("content")
    </div>
    @yield("script")
    @include("theme.{$data->theme_name}.google_recaptcha")
    @include("theme.{$data->theme_name}.footer")
  </main><!-- /#container -->
  @isset($append['body_bottom']){!! $append['body_bottom'] !!}@endisset
</div>
</body>
@if($form->beforeunload_flag == 1)
  <script>
    window.onbeforeunload = function(e) {
      e.preventDefault();
      return '';
    };
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
  {{-- gradition_validate.jsに記載 --}}
@endif
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
</html>
