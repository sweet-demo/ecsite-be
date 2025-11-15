#!/bin/sh
set -e

# 環境変数のデフォルト値を設定
export CSP_CONNECT_SRC="${CSP_CONNECT_SRC:-'self'}"

# テンプレートファイルを環境変数で置換
# common.confは/etc/nginx/に配置（serverブロック内でincludeされるため）
envsubst '${CSP_CONNECT_SRC}' < /etc/nginx/custom-templates/common.conf.template > /etc/nginx/common.conf

# 元のNginxエントリーポイントを実行（引数をそのまま渡す）
# 元のエントリーポイントが自動的にnginx -tを実行する
if [ -f /docker-entrypoint.sh ]; then
    exec /docker-entrypoint.sh "$@"
else
    # フォールバック: 直接nginxを起動
    exec nginx -g "daemon off;"
fi

