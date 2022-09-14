@extends('admin.layout')
@section('title', __("admin_messages.page_title_form_list") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_description"))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <h3 class="page-header">{{__("admin_messages.form.form_list")}}</h3>
            </div>
        </div>
        @include("admin.include.message")
        <div class="table-responsive">
            <table id="data_table" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>{{__("admin_messages.form.name")}}</th>
                    <th>{{__("admin_messages.form.attr")}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>
                            {{$row->name}}<br>
                        </td>
                        <td>
                            <p class="row">
                                <span class="col">
                                    <span class="font80">URL&nbsp;&nbsp;</span>
                                    <a href="{{$url}}/{{$row->url}}" class="btn border-0 btn-outline-dark" target="_blank" data-toggle="tooltip" title="{{__("admin_messages.form.open_form")}}">
                                        {{$url}}/{{$row->url}}&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i>
                                    </a>
                                </span>
                                <span class="col text-right">
                                    @if ($row->view_flag == 1)
                                        <label class="alert alert-success form-list-view-flag">{{__("admin_messages.form.displaying")}}</label>
                                    @else
                                        <label class="alert alert-danger form-list-view-flag">{{__("admin_messages.form.hidden")}}</label>
                                    @endif
                                    <a href="{{$url}}/{{$row->url}}" class="btn btn-sm btn-outline-dark" target="_blank" data-toggle="tooltip" title="{{__("admin_messages.form.open_form")}}">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.form.copy', $row->id) }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="{{__("admin_messages.form.copy_form")}}">
                                        <i class="fas fa-copy"></i>
                                    </a>
                                    <a href="{{ route('admin.form_item.edit', $row->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="{{__("admin_messages.form.edit_item")}}">
                                        <i class="fas fa-list-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.form.edit', $row->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="{{__("admin_messages.form.edit_form")}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a data-id="{{$row->id}}" class="btn btn-sm btn-danger listDeleteBtn" data-toggle="tooltip" title="{{__("admin_messages.form.delete_form")}}">
                                        <i class="fas fa-trash" style="color: #fff;"></i>
                                    </a>
                                </span>
                            </p>
                            <p class="font80">
                                <span class="row"><span class="col">{{__("admin_messages.form.theme")}}<span class="font-weight-light">&lt;theme_name&gt;</span></span><span class="col">{{$row->theme_name}}</span></span>
                                <span class="row"><span class="col">{{__("admin_messages.form.mail_title")}}<span class="font-weight-light">&lt;mail_title&gt;</span></span><span class="col">{{$row->mail_title}}</span></span>
                                <span class="row"><span class="col">{{__("admin_messages.form.admin_email")}}<span class="font-weight-light">&lt;admin_email&gt;</span></span><span class="col">{{$row->admin_email}}</span></span>
                                @if($row->bcc_email)
                                    <span class="row"><span class="col">{{__("admin_messages.form.bcc_email")}}<span class="font-weight-light">&lt;bcc_email&gt;</span></span><span class="col">{{$row->bcc_email}}</span></span>
                                @endif
                                @if($row->cc_email)
                                    <span class="row"><span class="col">{{__("admin_messages.form.cc_email")}}<span class="font-weight-light">&lt;cc_email&gt;</span></span><span class="col">{{$row->cc_email}}</span></span>
                                @endif
                                <span class="row"><span class="col">{{__("admin_messages.form.conf_mail")}}<span class="font-weight-light">&lt;conf_mail_flag&gt;</span></span><span class="col"> {{$row->conf_mail_flag == 1 ? __("admin_messages.yes"):__("admin_messages.no")}}</span></span>
                                <span class="row"><span class="col">{{__("admin_messages.form.include_submissions")}}<span class="font-weight-light">&lt;include_submissions&gt;</span></span><span class="col">{{$row->include_submissions == 1 ? __("admin_messages.yes"):__("admin_messages.no")}}</span></span>
                                <span class="row"><span class="col">{{__("admin_messages.form.include_submissions_admin_email")}}<span class="font-weight-light">&lt;include_submissions_admin_email&gt;</span></span><span class="col">{{$row->include_submissions_admin_email == 1 ? __("admin_messages.yes"):__("admin_messages.no")}}</span></span>
                                <span class="row"><span class="col">{{__("admin_messages.form.save_data")}}<span class="font-weight-light">&lt;save_data&gt;</span></span><span class="col">{{$row->save_data == 1 ? __("admin_messages.yes"):__("admin_messages.no")}}</span></span>
                                <span class="row"><span class="col">{{__("admin_messages.form.language")}}<span class="font-weight-light">&lt;language&gt;</span></span><span class="col">{{$row->language}}</span></span>
                                @if($row->denied_ip)
                                    <span class="row"><span class="col">{{__("admin_messages.form.denied_ip")}}<span class="font-weight-light">&lt;denied_ip&gt;</span></span><span class="col">{{$row->denied_ip}}</span></span>
                                @endif
                                @if($row->denied_ip_host_error_msg)
                                    <span class="row"><span class="col">{{__("admin_messages.form.denied_ip_message")}}<span class="font-weight-light">&lt;denied_ip_host_error_msg&gt;</span></span><span class="col">{{$row->denied_ip_host_error_msg}}</span></span>
                                @endif
                            </p>
                            <form action="{{ route('admin.form.destroy', $row->id) }}" method="post" id="{{$row->id}}">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="holder"></div>
        <input type="hidden" id="delTarget">

    </div>
    @include('admin.modal.deleteConfModal')
    @include('admin.include.list_bottom')
    @isset($append['admin_form_list_bottom_section']){!! $append['admin_form_list_bottom_section'] !!}@endisset
@endsection
