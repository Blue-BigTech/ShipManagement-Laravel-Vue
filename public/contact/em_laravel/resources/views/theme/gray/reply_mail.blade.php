{{ $reply_mail_header_message ? $reply_mail_header_message : "" }}
@if($include_submissions == 1)

@foreach($form_req as $row)
@if(!empty($row['title'])){{$row['title']}}:@endif{!! $row['value'] !!}
@endforeach
@endif

{{ $reply_mail_footer_message ? $reply_mail_footer_message : "" }}
