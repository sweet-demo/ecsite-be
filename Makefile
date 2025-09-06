# ECサイト Makefile

# 環境変数を.envファイルから読み込み
ifneq (,$(wildcard .env))
    include .env
    export
endif

# デフォルトターゲット
.PHONY: help
help:
	@echo "ECサイト Makefile - 利用可能なコマンド"
	@echo "======================================"
	@echo ""
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)
	@echo ""
	@echo "詳細な使用方法: make <コマンド名>"
	@echo "例: make init"

# ------------------------------
# 初回セットアップ
# ------------------------------
.PHONY: init
init: ## 初回セットアップ
	docker compose up -d --build
	docker compose exec php-fpm cp .env.local .env
	docker compose exec php-fpm composer install
	docker compose exec php-fpm php artisan key:generate
	docker compose exec php-fpm php artisan migrate

# ------------------------------
# コンテナ起動・停止・再起動・削除
# ------------------------------
.PHONY: up
up: ## コンテナを起動
	docker compose up -d

.PHONY: down
down: ## コンテナを停止・削除
	docker compose down

.PHONY: restart
restart: down up ## コンテナを再起動

.PHONY: clean
clean: ## 完全クリーンアップ（確認プロンプト付き）
	@echo "⚠️  完全クリーンアップを実行します。"
	@echo "   このコマンドは以下の処理を実行します："
	@echo "   - すべてのコンテナを停止・削除"
	@echo "   - すべてのDockerイメージを削除"
	@echo "   - すべてのボリュームを削除"
	@echo "   - 孤立したリソースを削除"
	@echo "   ⚠️  この操作は取り消しできません！"
	@echo ""
	@read -p "本当に続行しますか？ (y/N): " confirm && [ "$$confirm" = "y" ] || exit 1
	docker compose down --rmi all --volumes --remove-orphans 
