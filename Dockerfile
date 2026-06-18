# 호환성을 고려해 가장 널리 쓰이는 PHP 7.4 Apache 기반 이미지 사용
FROM php:7.4-apache

# 시스템 필수 패키지 설치
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# PHP 확장 기능 (이미지 처리, DB 통신을 위한 mysqli/pdo) 설치
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql zip

# 라우팅 에러(404) 방지를 위한 Apache URL 재작성 기능 활성화
RUN a2enmod rewrite

# 보안 및 파일 업로드 권한 설정
RUN chown -R www-data:www-data /var/www/html
