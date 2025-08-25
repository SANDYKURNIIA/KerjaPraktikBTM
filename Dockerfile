# Gunakan base image PHP yang sesuai dengan proyek Anda (misal: 8.1 atau 7.4)
FROM php:7.4.33-apache

# Instal ekstensi PHP yang umum dibutuhkan oleh CodeIgniter
RUN docker-php-ext-install pdo_mysql mysqli

# --- BARIS PENTING YANG MEMPERBAIKI MASALAH ---
# Aktifkan modul rewrite Apache untuk mendukung .htaccess
RUN a2enmod rewrite
# ---------------------------------------------

# Tentukan direktori kerja di dalam container
WORKDIR /var/www/html

# Salin semua file proyek dari direktori lokal ke direktori kerja di container
COPY . /var/www/html/

# Ubah kepemilikan file agar Apache bisa menulis file (misalnya untuk log atau cache)
RUN chown -R www-data:www-data /var/www/html/
