 Invoice Generator App (Laravel)

This is a simple Invoice Generator web application built with Laravel and MySQL. It allows users to create, edit, delete, email, and export invoices in PDF format. Perfect for freelancers and small businesses to manage client invoices.

🚀 Features

User authentication

Create, edit, delete invoices

Export invoices as PDF

Send invoices via email

Invoice status (paid/unpaid)

Simple and user-friendly dashboard

📅 How to Download & Run the Project

🛠️ Requirements

PHP >= 8.0

Composer

MySQL

Git

📦 Clone the Project

git clone https://github.com/Punyaja-git/invoice-app.git
cd invoice-app

🔧 Installation Steps

Install Composer Dependencies

composer install

Copy .env File

cp .env.example .env

Generate Application Key

php artisan key:generate

Configure Database

Open the .env file and update the following lines:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=invoice_app
DB_USERNAME=root
DB_PASSWORD=

Replace invoice_app, root, and password with your actual DB credentials.

Run Migrations

php artisan migrate

Serve the Application

php artisan serve

The app will run at http://127.0.0.1:8000

