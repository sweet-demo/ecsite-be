@extends('emails.layouts.base')

@section('title', 'メール認証のお願い')

@section('header-title', 'メール認証のお願い')

@section('content')
    <p>こんにちは、{{ $user->email }} 様</p>

    <p>ご登録いただき、ありがとうございます。</p>

    <p>アカウントを有効化するために、以下のボタンをクリックしてメールアドレスを認証してください。</p>

    <div class="button-container">
        <a href="{{ $verificationUrl }}" class="button">メールアドレスを認証する</a>
    </div>

    <p>ボタンがクリックできない場合は、以下のURLをコピーしてブラウザのアドレスバーに貼り付けてください：</p>
    <div class="url-box">
        {{ $verificationUrl }}
    </div>

    @if (config('app.env') === 'local')
        <p style="font-size: 12px; color: #999999;">トークン（開発用）：{{ $verificationToken }}</p>
    @endif

    <p>このリンクは24時間後に無効になります。</p>
@endsection

@section('footer')
    <p>このメールに心当たりがない場合は、無視してください。</p>
@endsection
