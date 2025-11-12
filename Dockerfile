# Gunakan base image PHP yang sesuai dengan proyek Anda (misal: 8.1 atau 7.4)
FROM php:7.4.33-apache

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libwebp-dev \
    libgif-dev \
    && rm -rf /var/lib/apt/lists/*

# Konfigurasi GD agar ter-compile dengan support library yang kita install
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp

# Install pdo_mysql, mysqli, dan gd
# -j$(nproc) menggunakan semua core CPU agar kompilasi lebih cepat
RUN docker-php-ext-install -j$(nproc) pdo_mysql mysqli gd

# --- BARIS PENTING YANG MEMPERBAIKI MASALAH ---
# Aktifkan modul rewrite Apache untuk mendukung .htaccess
RUN a2enmod rewrite
# ---------------------------------------------

# Mengunduh installer, menjalankannya, dan memindahkannya ke /usr/local/bin
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Tentukan direktori kerja di dalam container
WORKDIR /var/www/html

# Salin semua file proyek dari direktori lokal ke direktori kerja di container
COPY . /var/www/html/

# Ubah kepemilikan file agar Apache bisa menulis file (misalnya untuk log atau cache)
RUN chown -R www-data:www-data /var/www/html/
