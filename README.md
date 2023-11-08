# Web Push Notifications in Laravel Application

This repository is a PHP Laravel application designed to send web push notifications to web apps. The project allows you to configure and send push notifications to users based on their login status.

## Table of Contents
1. [Project Overview](#project-overview)
2. [Database Setup](#database-setup)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Sending Push Notifications](#sending-push-notifications)
6. [Screenshots](#screenshots)

## Project Overview
1. Building a PHP Laravel application capable of sending web push notifications to web apps.
2. A database table 'users' exists with the following fields: 
   - id
   - name
   - email
   - is_logged_in
   - decive_token
   - created_at
   - updated_at

## Database Setup
3. Initialize a new Laravel project using Composer.
4. Set up a local database (preferably MySQL) and configure it within your .env file.

## Installation
To get started, follow these steps:

```bash
# Clone the repository
https://github.com/Anubhav-Raj/Web-Notification.git

# Change directory to the project
cd laravel-web-push-notifications

# Install Composer dependencies
composer install

# Copy the .env.example file and configure your database
cp .env.example .env

# Generate an application key
php artisan key:generate

# Migrate the database
php artisan migrate

# Run the development server
php artisan serve

# note  please Make sure  xammp is  rumning.
```

## Usage
5. If a user is marked as logged in (is_logged_in is true), they should be able to receive push notifications in the form of browser notifications.
6. If a user is marked as logged out (is_logged_in is false), they should not receive push notifications.



## Screenshots
8. Screenshots of the application can be found in the `screenshots` directory within this repository.

Home Page
![1](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/5a71a24d-d050-49d0-b700-d3dcb2a324ec)

Login Page
![image](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/ffd22656-4991-415b-b445-157163711b41)

 Register page
![image](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/c5257d87-0c75-4a33-9a4e-5e30180ce0da)

Notication page
![image](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/fae811a4-f713-4948-bcc0-7dbe3bae02f4)

Sucess Response
![image](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/545b8d5e-b37b-458c-bcd0-eb0e5ad9151e)

Failer  Response
![image](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/f16baaa5-79fa-4faf-a767-8c5609a4523b)

User Table
![image](https://github.com/Anubhav-Raj/Web-Notification/assets/72142278/12d69b4a-0b65-4887-95a3-9104edf5f33d)



For any questions or issues, please contact [Anubhav Raj](mailto:rajputanubhav65@gmail.com).

Enjoy using this Laravel application for web push notifications!
