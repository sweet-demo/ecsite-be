FROM nginx:alpine

# envsubstをインストール（gettextパッケージに含まれる）
RUN apk add --no-cache openssl gettext

# カスタムテンプレートディレクトリを作成（Nginxの自動処理を回避）
RUN mkdir -p /etc/nginx/custom-templates

# Nginxの設定ファイルをコピー
COPY infra/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY infra/nginx/common.conf.template /etc/nginx/custom-templates/common.conf.template
COPY infra/nginx/php-fpm-common.conf /etc/nginx/php-fpm-common.conf

# カスタムエントリーポイントスクリプトをコピー
COPY infra/nginx/docker-entrypoint.sh /usr/local/bin/docker-entrypoint-custom.sh
RUN chmod +x /usr/local/bin/docker-entrypoint-custom.sh

# SSL証明書用のディレクトリを作成
RUN mkdir -p /etc/nginx/ssl

# SSL証明書ファイルをコピー
COPY infra/nginx/ssl/nginx.crt /etc/nginx/ssl/nginx.crt
COPY infra/nginx/ssl/nginx.key /etc/nginx/ssl/nginx.key

# 証明書の権限を設定
RUN chmod 644 /etc/nginx/ssl/nginx.crt && \
    chmod 600 /etc/nginx/ssl/nginx.key

# ポート80と443を公開
EXPOSE 80 443

# カスタムエントリーポイントを設定
ENTRYPOINT ["/usr/local/bin/docker-entrypoint-custom.sh"]
CMD ["nginx", "-g", "daemon off;"] 
