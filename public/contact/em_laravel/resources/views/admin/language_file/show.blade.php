@extends('admin.layout')
@section('title', __("admin_messages.page_title_language") ." | ". __("admin_messages.page_title"))
@section('description', __("admin_messages.page_title"))
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h4 class="page-header col-3">
                {{ __("admin_messages.language_file.lnaguage_file") }}
            </h4>
            <div id="path_viewer" class="col-7"></div>
            <div class="col-2 text-right">
                <a href="{{ route("admin.language_file") }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="{{ __("admin_messages.language_file.back_to_theme") }}">
                    <i class="fas fa-list"></i>
                </a>
                @if(!config("app.demo_mode"))
                <a href="javascript:void (0)" class="lang_save_btn btn btn-sm btn-outline-primary ml-2" title="保存" data-toggle="tooltip" style="font-size: 1rem;">
                    <i class="far fa-save"></i>
                </a>
                @endif
            </div>
        </div>
        @include("admin.include.message")
        <div class="row">
            <div class="col-3">
                <h4 class="mb-3">{{$lang->lang_name}}</h4>
                @foreach($dirs as $dir)
                    <p class="mb-1 font80">
                        <a class="lang_show_dir_text" data-toggle="collapse" href="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapse{{$loop->index}}">
                            <i class="far fa-folder"></i>&nbsp;{{$dir['dir_name']}}
                        </a>
                    </p>
                    <div id="collapse{{$loop->index}}" class="collapse hide" role="tabpanel" aria-labelledby="heading{{$loop->index}}">
                        @foreach($dir['file'] as $file)
                            <p class="mb-1 ml-4 font80 file_wrap">
                                <a href="javascript:void (0)" data-path="{{$file['path']}}" class="file_name_anc">
                                    {{$file['file_name']}}
                                </a>
                                <span class="content d-none">{{$file['content']}}</span>
                            </p>
                        @endforeach
                    </div>
                @endforeach

                @foreach($files as $file)
                    @if(session("save_file_path") == $file['path'])
                        <p class="mb-1 ml-4 font80 file_wrap forcus_file">
                    @else
                        <p class="mb-1 ml-4 font80 file_wrap">
                    @endif
                        <a href="javascript:void (0)" data-path="{{$file['path']}}" class="file_name_anc">
                            {{$file['file_name']}}
                        </a>
                        <span class="content d-none">{{$file['content']}}</span>
                    </p>
                @endforeach
            </div>
            <div class="col-9">
                <textarea id="content_viewer" class="col-12"></textarea>
                <img src="" id="image_viewer" class="img-thumbnail" style="max-width: 300px;">
            </div>
        </div>
    </div>

    <form action="{{route("admin.language_file.update")}}" method="post" id="lang_file_save_form">
        @csrf
        <input type="hidden" name="lang_name" id="lang_name" value="{{$lang->lang_name}}">
        <input type="hidden" name="save_file_path" id="save_file_path">
        <input type="hidden" name="save_file_content" id="save_file_content">
    </form>

    <script>
        $ (document).ready (function() {
            if($('.forcus_file').length){
                $('#content_viewer').html($(".forcus_file").children(".content").html());
                $ ('#content_viewer').fadeIn ('fast');
            }

            $ ('.file_name_anc').on ('click', function() {
                $ ("#image_viewer").hide ();
                $ ('#content_viewer').hide ();
                $ ('.lang_save_btn').hide ();
                $ ('#save_file_path').val ("");
                $ ('#save_file_content').val ("");

                $ ('.file_wrap').removeClass ("forcus_file");
                $ (this).parent ().addClass ("forcus_file");

                if (imageExtensionCheck (getExt ($ (this).data ("path")))) {
                    $ ("#image_viewer").attr ("src", $ (this).data ("path"));
                    $ ("#image_viewer").fadeIn ("fast");
                }
                else {
                    $ ('#content_viewer').val (htmlspecialchars_decode ($ (this).next (".content").html ()));
                    $ ('#content_viewer').fadeIn ('fast');
                    $ ('.lang_save_btn').fadeIn ('fast');
                }

                $ ('#path_viewer').html ($ (this).data ("path"));
            });

            $ ('.lang_save_btn').on ('click', function() {
                $ ('#save_file_path').val ($ ('#path_viewer').html ());
                $ ('#save_file_content').val ($ ('#content_viewer').val ());
                $ ('#lang_file_save_form').submit ();
            });
        });
    </script>

@endsection
