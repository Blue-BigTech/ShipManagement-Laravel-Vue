{{$request->name ? "こんにちわ".$request->name."さん" : ""}}さん
お問い合わせありがとうございます。

@if($form->include_submissions == 1)
    -----------------------------------
    問い合わせ内容は以下で受けしました
    -----------------------------------
    お名前： {{$request->name}}
    メールアドレス： {{$request->email}}
    動物ラジオボタン：{{$request->kirin}}
    テキストのみチェックボックス：{{$request->textcheckbox}}
    カスタムセレクト：{{$request->customselect}}
    動物チェックボックス：{{$request->dogcustomCheck}}
    お問い合せ内容：{!!  nl2br($request->contents) !!}
    住所：{{$request->zip}}{{$request->pref}}{{$request->address}}
    氏名：{{$request->last_name}}{{$request->first_name}}
    担当者名：{{$request->staff_name}}
    文字数制限テスト：{{$request->strlengthtext}}
@endif
