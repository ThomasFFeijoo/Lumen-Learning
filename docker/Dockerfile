FROM alpine

RUN apk --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community add git \
    php7 \
    php7-fpm \
    php7-mysqli \
    php7-json \
    php7-openssl \
    php7-curl \
    php7-pdo_mysql \
    php7-pdo_sqlite \
    php7-zlib \
    php7-xml \
    php7-xmlwriter \
    php7-xmlreader \
    php7-tokenizer \
    php7-phar \
    php7-intl \
    php8-ctype \
    php7-session \
    php7-mbstring \
    php7-fileinfo \
    php7-simplexml \
    php7-gd \
    php7-xdebug \
    curl composer

VOLUME /src

WORKDIR /src

EXPOSE 8000

CMD ["sh", "-c", "php -S 0.0.0.0:8000 -t public/"]

HEALTHCHECK --interval=30s --timeout=30s CMD curl --silent --fail http://127.0.0.1:8000