FROM php:8.1-apache

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zlib1g-dev \
    libzip-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip mysqli \
    && docker-php-ext-enable mysqli

# INSTALL AND UPDATE COMPOSER
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY ./vhost.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

COPY . .
EXPOSE 80

USER $user

# show that both Composer and PHP run as expected
RUN composer --version && php -v
