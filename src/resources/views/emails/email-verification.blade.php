<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メール認証のお願い</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>メール認証のお願い</h1>
    </div>
    
    <div class="content">
        <p>こんにちは、{{ $user->email }} 様</p>
        
        <p>ご登録いただき、ありがとうございます。</p>
        
        <p>アカウントを有効化するために、以下のボタンをクリックしてメールアドレスを認証してください。</p>
        
        <div style="text-align: center;">
            <a href="{{ $verificationUrl }}" class="button">メールアドレスを認証する</a>
        </div>
        
        <p>ボタンがクリックできない場合は、以下のURLをコピーしてブラウザのアドレスバーに貼り付けてください：</p>
        <p style="word-break: break-all; background-color: #f8f9fa; padding: 10px; border-radius: 4px;">
            {{ $verificationUrl }}
        </p>
        
        <p>このリンクは24時間後に無効になります。</p>
    </div>
    
    <div class="footer">
        <p>このメールに心当たりがない場合は、無視してください。</p>
        <p>ご不明な点がございましたら、お気軽にお問い合わせください。</p>
    </div>
</body>
</html>
