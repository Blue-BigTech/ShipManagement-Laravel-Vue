@extends('admin.layout')
@section('title', __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="col-12 mt-4">
      <h5 class="d-inline-block">
        {{ config("app.name") }}
      </h5>
      &nbsp;{{ config("app.version") }}
    </div>
    <div class="col-12 mt-4">
      @isset($append['admin_upper_news']){!! $append['admin_upper_news'] !!}@endisset
      <div class="card mb-4">
        <div class="card-header">
          <img src="{{ config('app.admin_assets_url') }}/images/news_icon.svg" class="news_icon">
          &nbsp;&nbsp;News
        </div>
        <div class="card-body">
          @foreach($news_ar as $news)
            <div class="row mt-3">
              <div class="col-4">{{$news->date}}</div>
              <div class="col-8">
                <a href="{{ $news->url }}" aria-expanded="false" aria-controls="collapseExample" target="_blank">
                  {!! $news->title !!}
                </a>
                <div class="collapse" id="collapseExample{{$loop->index}}">
                  <div class="card card-body">
                    {!! $news->content !!}
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    @isset($append['admin_under_news']){!! $append['admin_under_news'] !!}@endisset
    <div class="text-center">
      <a href="{{__('admin_messages.easymail_url')}}/news/" target="_blank">
        <span>{{__('admin_messages.past_news')}}</span>
      </a>
    </div>
  </div>
  <div class="container-fluid">

  </div>
  @isset($append['admin_top_bottom_section']){!! $append['admin_top_bottom_section'] !!}@endisset
@endsection
