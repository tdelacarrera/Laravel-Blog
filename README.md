# About this project

A simple blog web application built with Laravel.

## 📋 Prerequisites

- PHP
- Composer
- Node.js & npm
- MySQL

## 📦 Installation

Follow these steps to set up the project locally

**1. Clone the repository**

    git clone https://github.com/tdelacarrera/Laravel-Blog.git
    cd Laravel-Blog

**2. Install dependencies**

    composer install
    npm install

**3. Set up environment variables**

    cp .env.example .env

**4. Create the MySQL database**

Create a new database and update your .env

**5.  Run migrations, seed data, generate key and create storage link**

    php artisan migrate
    php artisan db:seed
    php artisan key:generate
    php artisan storage:link
    
**6. Build frontend assets**

    npm run build

**7. Start the server**

    php artisan serve

✅ Ready!

Visit localhost to view the application in your browser.
