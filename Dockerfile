# Use the PHP 8.1 FPM Alpine image as the base image
FROM php:8.1-fpm-alpine

# Install the PDO, PDO_MYSQL, and SOCKETS PHP extensions
RUN docker-php-ext-install pdo pdo_mysql sockets

# Install Node.js and npm
RUN apk add --update nodejs npm

# Install Composer using curl
RUN curl -sS  | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Composer binary from the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory to /app
WORKDIR /app

# Copy the contents of the current directory on the host machine into the /app directory inside the container
COPY . .

# Run composer install to install the Laravel project's dependencies
RUN composer install

# Run npm install to install the Laravel project's Node.js dependencies
RUN npm install

# Run php artisan db:seed to seed the database with test data
# RUN php artisan db:seed
