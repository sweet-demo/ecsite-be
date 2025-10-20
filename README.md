
# ECサイト

## 初回セットアップ
```bash
$ git clone git@github.com:sweet-demo/ecsite.git
$ cd ecsite
$ docker compose up -d --build
$ docker compose exec php-fpm cp .env.local .env
$ docker compose exec php-fpm composer install
$ docker compose exec php-fpm php artisan key:generate
$ docker compose exec php-fpm php artisan migrate
$ docker compose exec php-fpm php artisan db:seed
```

## フォーマッター
```
$ docker compose exec php-fpm composer format
```

## アクセスURL
| サービス       | URL                     |
|---------------|-------------------------|
| メールサーバー   | http://localhost:8025   |
| API           | https://api.localhost   |
| API定義書      | https://api.localhost/docs/api |

## コミット
初回コミット前に以下を実行
```
git config --local commit.template .gitmessage
```

コミットする際は以下を打ち込むことにより、テンプレートが表示されます。
```
git commit
```

### MySQL接続情報
| 項目            | 値        |
|----------------|-----------|
| MYSQL_DATABASE | ecsite_db |
| PORT           | 3306      |
| MYSQL_ROOT_PASSWORD | root |
| MYSQL_USER | ecsite |
| MYSQL_PASSWORD | ecsite |

## プロジェクト構成

```
ecsite/
├── src/                 # Laravel 12 バックエンド
├── infra/
│   ├── php/            # php Dockerファイル
│   ├── mysql/          # mysql Dockerファイル
│   ├── next/           # node Dockerファイル
│   └── nginx/          # nginx Dockerファイル
├── docker-compose.yml  # Docker Compose
└── README.md
```

| 言語・フレームワーク | バージョン |
|------------------|----------|
| PHP              | 8.2      |
| Laravel          | 12       |
| MySQL            | 8.0      |
| Nginx            | 1.29     |
