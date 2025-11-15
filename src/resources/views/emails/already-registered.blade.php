@extends('emails.layouts.base')

@section('title', 'すでに本登録が完了しています')

@section('header-title', 'すでに本登録が完了しています')

@section('content')
    <p>{{ $user->email }} 様</p>

    <p>
        すでに本登録が完了しています。<br>
        このメールアドレスでは既に会員登録のお手続きが完了していますので、<br>
        再度のご登録は不要です。
    </p>

    <p>
        ログインなどでお困りの場合は、パスワード再設定機能などをご利用ください。
    </p>
@endsection
