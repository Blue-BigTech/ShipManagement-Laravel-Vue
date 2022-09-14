@extends("theme.{$data->theme_name}.layout")
@section('content')
  <div class="partsGrayBg">
    <div class="partsWrap partsWhitebox">
      <div class="finishTexts">
        @if(isset($form->thanks_message)){!! nl2br($form->thanks_message) !!}@endif
      </div>
    </div><!-- /.partsWhitebox -->
  </div><!-- /.partsGrayBg -->
@endsection
@section('style')
@endsection
