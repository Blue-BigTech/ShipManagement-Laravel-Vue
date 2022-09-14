@if (isset($info))
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-info p-1 text-center message_area" role="alert">
            {{$info}}
        </div>
    </div>
@endif
@if (isset($message))
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-success p-1 text-center message_area" role="alert">
            {{$message}}
        </div>
    </div>
@endif
@if (isset($warning))
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-danger p-1 text-center message_area" role="alert">
            {{$warning}}
        </div>
    </div>
@endif
@if (session('info'))
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-info p-1 text-center message_area" role="alert">
            {{ session('info') }}
        </div>
    </div>
@endif
@if (session('message'))
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-success p-1 text-center message_area" role="alert">
            {{session('message')}}
        </div>
    </div>
@endif
@if (session('warning'))
    <div class="row mb-1 mt-1">
        <div class="col-12 col-md-5 alert alert-danger text-center message_area" role="alert">
            {{ session('warning') }}
        </div>
    </div>
@endif
<style>
    .message_area:hover{
        cursor: pointer;
    }
</style>
<script>
    $ ('.message_area').on ('click', function() {
        $(this).parent().fadeOut('fast');
    });
</script>
