
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

https://localhost で "Hello, World!" が表示されればOK

## フォーマッター
```
$ docker compose exec php-fpm composer format
```

## アクセスURL
| サービス       | URL                     |
|---------------|-------------------------|
| メールサーバー   | http://localhost:8025   |
| API           | https://api.localhost   |
| API定義書（ローカル） | https://api.localhost/docs/api |
| API定義書（GitHub Pages） | https://[ユーザー名].github.io/[リポジトリ名]/api/ |

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

## APIドキュメント

### ローカルでの生成

APIドキュメントのJSONを生成するには、以下のコマンドを実行します：

```bash
$ docker compose exec php-fpm php artisan scramble:export
```

デフォルトでは `docs/api/openapi.json` に出力されます。

### GitHub Pagesでの公開

APIドキュメントはGitHub Actionsワークフローによって自動的に生成され、GitHub Pagesで公開されます。

1. **GitHub Pagesの有効化**
   - リポジトリの「Settings」→「Pages」に移動
   - 「Source」を「GitHub Actions」に設定

2. **自動生成とデプロイ**
   - `develop`ブランチへのプッシュ時に自動実行
   - 以下のファイルが変更された場合に自動実行：
     - `src/routes/api.php`
     - `src/app/Http/Controllers/**`
     - `src/app/Http/Requests/**`
     - `src/app/Http/Resources/**`
   - 手動実行も可能（「Actions」タブから「Generate and Deploy API Documentation」を選択）

3. **生成されるファイル**
   - `docs/api/openapi.json` - OpenAPI仕様（JSON形式）
   - `docs/api/index.html` - Redocで生成されたHTMLドキュメント

生成されたドキュメントは `https://[ユーザー名].github.io/[リポジトリ名]/api/` でアクセスできます。
