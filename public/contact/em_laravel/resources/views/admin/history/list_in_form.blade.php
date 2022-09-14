@extends('admin.layout')
@section('title', __("admin_messages.page_title_history") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
  <div class="container-fluid">
    <div class="row mt-3 mb-1">
      <div class="col-3">
        <h3 class="page-header">@isset($form->name){{ $form->name }}&nbsp;{{__("admin_messages.menu.history")}}@endisset</h3>
      </div>
      <div class="col-9">
        <div class="row">
          <div class="col-5">
            <span class="font80">URL&nbsp;&nbsp;</span>
            <a href="{{config("app.url")}}/@isset($form->url){{$form->url}}@endisset" class="btn border-0 btn-outline-dark" target="_blank" data-toggle="tooltip" title="{{ __("admin_messages.form.open_form") }}">
              {{config("app.url")}}/@isset($form->url){{$form->url}}@endisset&nbsp;
            </a>
          </div>
          <div class="col-3 text-right">
            <a href="javascript:void (0);" class="btn btn-outline-dark csv_down_load" data-toggle="tooltip" title="{{ __("admin_messages.csv_download") }}">
              <i class="fas fa-download"></i>&nbsp;{{ __("admin_messages.csv_download") }}
            </a>
            <a style="display:none;" id="csv_downloader" href="#"></a>
          </div>
          <div class="col-4">
            <form action="{{route("admin.history.list_in_form")}}" method="post" id="list_in_form" class="float-right" style="max-width: 300px;">
              @csrf
              <select id="list_in_form_select" name="form_id" class="form-control" onchange="this.form.submit();">
                {{-- <option value="{{route("admin.history.list")}}">{{ __("admin_messages.history.select_form_history") }}</option> --}}
                @foreach($forms as $f)
                  <option value="{{$f->id}}" {{ $f->name == $form->name ? 'selected': '' }}>{{$f->name}}</option>
                @endforeach
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include("admin.include.message")
    <div class="table-responsive">
      @isset($append['admin_history_upper_table']){!! $append['admin_history_upper_table'] !!}@endisset
      <table id="data_table" class="table table-striped table-bordered table-hover font80 m-0" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th>{{ __("admin_messages.history.date_and_time_of_reception") }}</th>
          @foreach($data as $row)
            @if($loop->index == 0)
              @foreach($row->content as $key => $content_row)
                @if($content_row->form_type == "file")
                  @continue
                @endif
                <th>{{$content_row->title}}</th>
              @endforeach
            @endif
          @endforeach
          <th class="csv_skip">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $row)
          <tr>
            <td>{{$row->created_at}}</td>
            @foreach($row->content as $key => $content_row)
              @if($content_row->form_type == "file")
                @continue
              @endif
              <td>
                @if(@is_string($content_row->value))
                  {!! nl2br($content_row->value) !!}
                @elseif(@is_array($content_row->value))
                  @foreach($content_row->value as $content_val){{$content_val}}&nbsp;@endforeach
                @else
                  {{$content_row->value}}
                @endif
              </td>
            @endforeach

            <td class="csv_skip">
              <div class="container-fluid">
                <form action="{{ route('admin.history.destroy', $row->id) }}" method="post" id="{{$row->id}}">
                  @csrf
                </form>
                <a href="javascript:void (0);" data-id="{{$row->id}}" class="btn btn-sm btn-danger listDeleteBtn float-right" data-toggle="tooltip" title="削除">
                  <i class="fas fa-trash" style="color: #fff;"></i>
                </a>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      @isset($append['admin_history_under_table']){!! $append['admin_history_under_table'] !!}@endisset
    </div>
    <input type="hidden" id="delTarget">
  </div>

  @include('admin.modal.deleteConfModal')
  <script>
    $ ( document ).ready ( function() {
      $ ( '#data_table' ).DataTable ( {
          "stateSave": true,
          colReorder: true,
          lengthMenu: [ 10, 25, 50, 100 ],
          displayLength: 50,
          "language": {
            "emptyTable": "{{__("admin_messages.list_page.no_data_registered")}}",
            "info": "_TOTAL_ {{__("admin_messages.list_page.view_count")}} _START_ {{__("admin_messages.list_page.begin_count")}} _END_ {{__("admin_messages.list_page.end_count")}}",
            "infoEmpty": "",
            "infoFiltered": "(_MAX_ {{__("admin_messages.list_page.narrow_down_display")}})",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "{{__("admin_messages.list_page.display_count")}}: _MENU_",
            "loadingRecords": "{{__("admin_messages.list_page.loading")}}",
            "processing": "{{__("admin_messages.list_page.processing")}}",
            "search": "{{__("admin_messages.list_page.search")}}",
            "zeroRecords": "{{__("admin_messages.list_page.not_found")}}",
            "paginate": {
              "first": "{{__("admin_messages.list_page.first")}}",
              "previous": "{{__("admin_messages.list_page.forward")}}",
              "next": "{{__("admin_messages.list_page.next")}}",
              "last": "{{__("admin_messages.list_page.end")}}"
            },
            "order": [ [ 0, "desc" ] ]
          }
        }
      );
    } );
  </script>
  @isset($append['admin_history_bottom_section']){!! $append['admin_history_bottom_section'] !!}@endisset
@endsection
