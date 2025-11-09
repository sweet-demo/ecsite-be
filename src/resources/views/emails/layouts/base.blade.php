<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'お知らせ')</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Hiragino Kaku Gothic ProN', 'Hiragino Sans', Meiryo, sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
            color: #333333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        .email-header {
            background: linear-gradient(135deg, #D8E4EA 0%, #E5EDF2 100%);
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            color: #4A5568;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 0.05em;
        }
        .email-body {
            padding: 40px 30px;
            background-color: #ffffff;
        }
        .email-content {
            color: #333333;
            font-size: 14px;
        }
        .email-content p {
            margin: 0 0 16px 0;
        }
        .email-content p:last-child {
            margin-bottom: 0;
        }
        .button {
            display: inline-block;
            padding: 12px 32px;
            background-color: #4A5568;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            margin: 20px 0;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #374151;
        }
        .button-container {
            text-align: center;
            margin: 24px 0;
        }
        .url-box {
            background-color: #f8f9fa;
            padding: 12px;
            border-radius: 4px;
            border-left: 3px solid #4A5568;
            word-break: break-all;
            font-size: 12px;
            color: #666666;
            margin: 16px 0;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }
        .email-footer p {
            margin: 8px 0;
            font-size: 12px;
            color: #666666;
        }
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 24px 0;
            border: none;
        }
        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 30px 20px;
            }
            .email-header {
                padding: 24px 16px;
            }
            .email-header h1 {
                font-size: 20px;
            }
            .button {
                padding: 10px 24px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- ヘッダー -->
        <div class="email-header">
            <h1>@yield('header-title', 'お知らせ')</h1>
        </div>

        <!-- 本文 -->
        <div class="email-body">
            <div class="email-content">
                @yield('content')
            </div>
        </div>

        <!-- フッター -->
        <div class="email-footer">
            @yield('footer')
            <p>このメールは送信専用です。返信はできません。</p>
            <p>ご不明な点がございましたら、お気軽にお問い合わせください。</p>
        </div>
    </div>
</body>
</html>

