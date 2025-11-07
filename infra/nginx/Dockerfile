FROM nginx:alpine

# Nginxの設定ファイルをコピー
COPY infra/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY infra/nginx/common.conf /etc/nginx/common.conf
COPY infra/nginx/php-fpm-common.conf /etc/nginx/php-fpm-common.conf

RUN apk add --no-cache openssl

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

# Nginxを起動
CMD ["nginx", "-g", "daemon off;"] 
