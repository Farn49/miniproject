FROM php:8.0-apache

# อัปเดต apt-get และติดตั้ง dependencies ที่จำเป็น
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli

# เปิดใช้งาน mod_rewrite ของ Apache
RUN a2enmod rewrite

# คัดลอกไฟล์จากโฟลเดอร์ src/ ไปยัง /var/www/html/
COPY src/ /var/www/html/

# ตั้งค่าให้ Apache รันที่พอร์ต 80
EXPOSE 80

# รัน Apache เมื่อคอนเทนเนอร์เริ่มทำงาน
CMD ["apache2-foreground"]
