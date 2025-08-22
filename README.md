
# ECサイト

## 初回セットアップ
```bash
$ git clone git@github.com:sweet-demo/ecsite.git
$ cd ecsite

# 初回セットアップ（環境変数作成、ビルド、環境設定、マイグレーション）
$ make init
```

## アクセスURL

- **フロントエンド**: https://localhost
- **バックエンドAPI**: https://api.localhost

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
├── be/                 # Laravel 12 バックエンド
├── fe/                 # Next.js 15 フロントエンド
├── infra/
│   ├── php/            # php Dockerファイル
│   ├── mysql/          # mysql Dockerファイル
│   ├── next/           # node Dockerファイル
│   └── nginx/          # nginx Dockerファイル
├── docker-compose.yml  # Docker Compose
├── Makefile            # 開発用コマンド
└── README.md
```

| 言語・フレームワーク | バージョン |
|------------------|----------|
| PHP              | 8.2      |
| Laravel          | 12       |
| MySQL            | 8.0      |
| Next.js          | 15.4     |
| TypeScript       | 5        |
| Nginx            | 1.29     |
