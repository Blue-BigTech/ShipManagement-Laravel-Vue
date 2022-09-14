@extends('admin.layout')
@section('title', __("admin_messages.page_title_attach_file") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_title"))
@section('content')
  <div class="container-fluid">
    <div class="row mt-3 mb-1">
      <div class="col-6">
        <h3 class="page-header">{{__("admin_messages.menu.attachment_file")}}</h3>
      </div>
      <div class="col-6">
        <div class="input-group input-group-sm">
          <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">
                            <i class="fas fa-search"></i>
                        </span>
          </div>
          <input type="text" id="attach_file_search" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          <a class="btn btn-sm btn-danger text-light ml-2 file_delete_btn"><i class="fas fa-trash" style="color: #fff;"></i></a>
        </div>
      </div>
    </div>
    @include("admin.include.message")
    @isset($append['admin_attach_file_upper_ul']){!! $append['admin_attach_file_upper_ul'] !!}@endisset
    <ul id="file_block_container" class="row flex-wrap file_block_container">
      <?php $jp_hidden_class = ""; ?>
      @foreach($files as $file)
        @if($loop->index >= $perPage)
          <?php $jp_hidden_class = "jp-hidden";?>
        @endif
        <li class="col-2 mt-2 file_block <?php echo $jp_hidden_class;?>">
          <div class="border rounded p-3 shadow-sm">
            <div class="text-center d-flex justify-content-center align-items-center" style="min-height: 100px;">
              @switch($file->type)
                @case("image")
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} Image file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
                @case("excel")
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} Excel file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
                @case("word")
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} Word file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
                @case("pdf")
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} PDF file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
                @case("powerpoint")
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} PowerPoint file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
                @case("other")
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
                @default
                <a href="{{ route('admin.attach_file.getfile', $file->name) }}"
                   data-toggle="tooltip"
                   title="{{$file->form_name}} file"
                   target="_blank">
                  {!!$file->icon!!}
                </a>
                @break
              @endswitch
            </div>
            <p class="search_contentes_block font80 mb-1">
              {{$file->form_name}}<br>
              {{$file->created_at}}<br>
              {{$file->user_email}}
            </p>
            <div class="custom-control custom-checkbox font80">
              <input type="checkbox" name="delete_check[]" value="{{$file->name}}" class="custom-control-input delete_check_input" id="customCheck{{$loop->index}}">
              <label class="custom-control-label" for="customCheck{{$loop->index}}">{{__("admin_messages.attach_file.select")}}</label>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    @isset($append['admin_attach_file_under_ul']){!! $append['admin_attach_file_under_ul'] !!}@endisset
    <div class="holder"></div>
  </div>

  <form action="{{ route('admin.attach_file.destroy') }}" method="post" id="attach_file_delete_form">
    @csrf
    <input type="hidden" id="delete_file" name="delete_file" value="">
  </form>
  <input type="hidden" id="delTarget" value="attach_file_delete_form">

  <style>
    .file_delete_btn {
      display: none;
    }

    ul li {
      list-style-type: none;
    }

    .attach_thumbnail {
      width: auto;
      height: auto;
      max-width: 100%;
      max-height: 200px;
    }
  </style>
  <script>
    $ ( document ).ready ( function() {
      $ ( '.file_delete_btn' ).on ( 'click', function() {
        $ ( '#delete_file' ).val ( '' );
        let file_name = "";
        $ ( '.delete_check_input' ).each ( function() {
          if ( $ ( this ).is ( ':checked' ) ) {
            file_name += $ ( this ).val () + ",";
          }
        } );
        $ ( '#delete_file' ).val ( file_name );

        let msg = '';
        msg += '<p>{!! __("admin_messages.attach_file.delete_conf_msg_top") !!}</p>';
        msg += '<p>{!! __("admin_messages.attach_file.delete_conf_msg_bottom") !!}</p>';
        $ ( '.modal-dialog' ).removeClass ( 'modal-sm' );
        $ ( '#deleteConfModalBody' ).html ( msg );
        $ ( '#deleteConfModal' ).modal ( 'show' );
      } );

      $ ( '.delete_check_input' ).on ( 'change', function() {
        let flag = false;
        $ ( '.delete_check_input' ).each ( function() {
          if ( $ ( this ).is ( ':checked' ) ) {
            flag = true;
          }
        } );
        if ( flag === true ) {
          $ ( '.file_delete_btn' ).fadeIn ( 'fast' );
        }
        else {
          $ ( '.file_delete_btn' ).fadeOut ( 'fast' );
        }
      } );

      $ ( '#attach_file_search' ).on ( 'keyup', function() {
        let search = $ ( this );
        $ ( '.file_block' ).each ( function() {
          let html = $ ( this ).find ( ".search_contentes_block" ).html ();
          console.log ( html );
          if ( html.indexOf ( search.val () ) === -1 ) {
            $ ( this ).fadeOut ( 'fast' );
          }
          else {
            $ ( this ).fadeIn ( 'fast' );
          }
        } );
      } );
    } );
  </script>
  @include('admin.modal.deleteConfModal')
  <?php isset( $_COOKIE['attach_file_list_page'] ) ? $page = $_COOKIE['attach_file_list_page'] : $page = 1; ?>
  <script>
    $ ( document ).ready ( function() {
      $ ( "div.holder" ).jPages ( {
        containerID: "file_block_container",
        previous: "{{__("admin_messages.list_page.forward")}}",
        next: "{{__("admin_messages.list_page.next")}}",
        perPage: {{$perPage}},
        startPage: {{$page}},
        delay: 10,
        animation: "flipInY",
        callback: function( pages, items ) {
          $.cookie ( "attach_file_list_page", pages.current );
        }
      } );
    } );

    $ ( ".lazyload" ).lazyload ();
  </script>
  @isset($append['admin_attach_file_bottom_section']){!! $append['admin_attach_file_bottom_section'] !!}@endisset
@endsection
