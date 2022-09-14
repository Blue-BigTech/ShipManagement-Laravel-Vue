@extends('admin.layout')
@section('title', __("admin_messages.page_title_plugin_search") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="row mt-3 mb-1">
      <div class="col-4">
        <h3 class="page-header">{{__("admin_messages.plugin.search")}}</h3>
      </div>
    </div>
    @include("admin.include.message")
    <style>
      .stretch-row {
        justify-content: stretch;
      }

      .stretch-col {
        align-self: stretch;
      }

      .plugin_thumbnail {
        max-width: 300px;
      }

      .font-small {
        font-size: 0.8rem;
      }

      .spinner {
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        display: none;
      }
    </style>
    <div class="row stretch-row">
      @foreach($plugin_ar as $row)
        <div class="col-12 col-lg-4 col- col-xl-3 stretch-col plugin_wrap{{ $row->uid }}">
          <div class="border rounded p-1 shadow-sm h-100">
            <div class="col-12 alert font-weight-bold alert-secondary">
              <a href="javascript:void(0);" class="under-line description_btn" data-versionuid="{{ $row->version_uid }}" data-description="{{ $row->description }}">
                {{ $row->name }}
              </a>
            </div>
            @if($row->screen_shot_url !== null)
              <div class="col-12 pb-2 text-center">
                <img src="{{ $row->screen_shot_url }}" class="col-12 img-thumbnail plugin_thumbnail">
              </div>
            @endif
            <div class="row mb-2 ml-3 mr-3">
              <div class="col-12 text-center mb-2">
                <div class="bg-secondary text-white rounded font-small p-2 already_installed_msg{{ $row->uid }}" @if($row->install_flag == false) style="display: none;" @endif>{{__("admin_messages.plugin.already_installed")}}</div>
                <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary install_btn install_btn{{ $row->uid }}" data-uid="{{ $row->uid }}" data-versionuid="{{ $row->version_uid }}" data-downloadurl="{{ $row->download_url }}" @if($row->install_flag == true) style="display: none;" @endif>{{__("admin_messages.plugin.install")}}</a>
              </div>
            </div>
            @isset($row->price)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.price")}}</div>
                <div class="col-7">
                  @if($row->price == 0)
                    {{ __("admin_messages.plugin.free") }}
                  @else
                    {{ __("admin_messages.plugin.front_currency_unit") }}{{ number_format($row->price) }}{{ __("admin_messages.plugin.behind_currency_unit") }}
                  @endif
                </div>
              </div>
            @endisset
            @isset($row->overview)
              <div class="row font-small ml-3 mr-3 mt-2 mb-2">
                <div class="col-12">{{__("admin_messages.plugin.overview")}}</div>
                <div class="col-12">{!! nl2br($row->overview) !!}</div>
              </div>
            @endisset
            @isset($row->version)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.version")}}</div>
                <div class="col-7">{{ $row->version }}</div>
              </div>
            @endisset
            @isset($row->version)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.download_count")}}</div>
                <div class="col-7">{{ number_format($row->download_count) }}</div>
              </div>
            @endisset
            @isset($row->release_date)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.release_date")}}</div>
                <div class="col-7">{{ $row->release_date }}</div>
              </div>
            @endisset
            @isset($row->corresponding_version)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.corresponding_version")}}</div>
                <div class="col-7">{{ $row->corresponding_version }}</div>
              </div>
            @endisset
            @isset($row->developer_name)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.developer")}}</div>
                <div class="col-7">{{ $row->developer_name }}</div>
              </div>
            @endisset
            @isset($row->developer_url)
              <div class="row font-small ml-3 mr-3">
                <div class="col-5">{{__("admin_messages.plugin.url")}}</div>
                <div class="col-7">
                  <a href="{{ $row->developer_url }}" target="_blank" rel="noopener noreferrer">
                    {{ $row->developer_url }}&nbsp;<i class="fas fa-external-link-alt"></i>
                  </a>
                </div>
              </div>
            @endisset
          </div>
          <div class="spinner spinner{{ $row->uid }} spinner-border text-secondary position-absolute" role="status"><span class="sr-only">Loading...</span></div>
        </div>
      @endforeach
    </div>
    @csrf
    <div class="holder"></div>
    @include('admin.modal.plugin_descriptionModal')
  </div>
  <script>
    $ ( document ).ready ( function() {
      $ ( '.install_btn' ).on ( 'click', function() {
        let uid          = $ ( this ).data ( "uid" );
        let version_uid  = $ ( this ).data ( "versionuid" );
        let download_url = $ ( this ).data ( "downloadurl" );
        $ ( ".install_btn" + uid ).addClass ( "disabled" );
        $ ( ".spinner" + uid ).show ();
        $.ajax ( {
          headers: { 'X-CSRF-TOKEN': $ ( 'input[name="_token"]' ).val () },
          type: "POST",
          url: "{{ route("admin.plugin.install") }}",
          dataType: 'json',
          data: {
            'uid': uid,
            'version_uid': version_uid,
            'download_url': download_url,
          }
        } ).done ( function( data ) {
          $ ( ".install_btn" + uid ).hide ();
          $ ( '.already_installed_msg' + uid ).show ();
          $ ( ".spinner" + uid ).hide ();
        } ).fail ( function( XMLHttpRequest, textStatus, errorThrown ) {
          $ ( ".install_btn" + uid ).removeClass ( "disabled" );
          $ ( ".spinner" + uid ).hide ();
          alert ( "Server connection error.." );
        } );
      } );

      $ ( '.description_btn' ).on ( 'click', function() {
        $.blockUI ( { message: 'Loading ...' } );
        $.ajax ( {
          headers: { 'X-CSRF-TOKEN': $ ( 'input[name="_token"]' ).val () },
          type: "POST",
          url: "{{ route("admin.plugin.search_description") }}",
          dataType: 'json',
          data: {
            'version_uid': $ ( this ).data ( "versionuid" ),
          }
        } ).done ( function( data ) {
          console.log ( data );
          $.unblockUI ();
          let msg = "";
          $ ( '#plugin_descriptionModalHeader' ).removeClass ( "alert-primary" );
          $ ( '#plugin_descriptionModalHeader' ).removeClass ( "alert-dark" );
          if ( data['active_flag'] == true ) {
            $ ( '#plugin_descriptionModalHeader' ).addClass ( "alert-primary" );
          }
          else {
            $ ( '#plugin_descriptionModalHeader' ).addClass ( "alert-dark" );
          }
          $ ( '#plugin_descriptionModalTitle' ).html ( data['name'] );
          if ( data['description'] ) {
            $ ( '.description_content' ).html ( nl2br ( data['description'] ) );
          }
          $ ( '.developer_content' ).html ( data['developer_name'] );
          if ( data['developer_url'] ) {
            $ ( '.developer_url_content' ).html ( '<a href="' + data['developer_url'] + '" target="_blank" rel="noopener noreferrer">' + data['developer_url'] + '&nbsp;<i class="fas fa-external-link-alt"></i></a>' );
          }
          if ( data['price'] > '0' ) {
            $ ( '.price_content' ).html ( data['price'] + "{{ __("admin_messages.plugin.behind_currency_unit") }}" );
          }
          else if ( data['price'] == '0' ) {
            $ ( '.price_content' ).html ( "{{ __("admin_messages.plugin.free") }}" );
          }
          $ ( '.release_date_content' ).html ( data['release_date'] );
          $ ( '.final_update_date_content' ).html ( data['final_update_date'] );
          $ ( '.required_version_content' ).html ( data['required_version'] );
          $ ( '.latest_version_supported_content' ).html ( data['latest_version_supported'] );
          $ ( '#plugin_descriptionModal' ).modal ( 'show' );
        } ).fail ( function( XMLHttpRequest, textStatus, errorThrown ) {
          $.unblockUI ();
          alert ( "Server connection error.." );
        } );
      } );


    } );
  </script>
  <style>
    .under-line{
      text-decoration: underline;
    }
  </style>
@endsection
