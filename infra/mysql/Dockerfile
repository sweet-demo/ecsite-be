FROM mysql:8.0.39

# タイムゾーン設定
ARG TZ=Asia/Tokyo
ENV TZ=${TZ}

# 言語設定
ENV LANG=C.UTF-8
ENV LANGUAGE=C.UTF-8
ENV LC_ALL=C.UTF-8

# MySQL初期化設定
ENV MYSQL_INITDB_SKIP_TZINFO=1

# ログディレクトリの作成
RUN mkdir -p /var/log/mysql && \
    chown mysql:mysql /var/log/mysql

# カスタム設定ファイルのコピー
COPY infra/mysql/my.cnf /etc/mysql/conf.d/my.cnf

# 権限設定（WSL環境対応）
RUN chmod 644 /etc/mysql/conf.d/my.cnf && \
    chown mysql:mysql /etc/mysql/conf.d/my.cnf

# SSL証明書ディレクトリの作成と権限設定
RUN mkdir -p /var/lib/mysql-ssl && \
    chown mysql:mysql /var/lib/mysql-ssl && \
    chmod 700 /var/lib/mysql-ssl

EXPOSE 3306
