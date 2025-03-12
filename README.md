
[//]: # (logo of the project)

![alt text](/public/logo/secondaryLogo.png "Logo Title Text 1" )

[//]: # (title of the project)



# Laravel 12 Starter Kit

A template includes multiple essential features that provide a solid foundation for starting our project. It comes equipped with pre-built components, optimized layouts, and ready-to-use functionalities, saving time and effort in the development process. By using a well-structured template, we can streamline our workflow, maintain consistency, and focus on customization rather than building everything from scratch. This not only accelerates project development but also ensures a professional and polished final product.
## Features

- Admin can login
- Admin can change the basic setting like app name and logo etc
- Admin can Settings Forgot password Link
- Admin can Settings Forgot password Otp
- Reset password functionality for users who have forgotten their password
- User can update their profile info
- Forgot password: Users can reset their password by entering their email and following a link sent to their username.
- User can update their password
- Telescope Installed
- Laravel Pulse Installed
- Api Documentation and version management routes are available

## Technologies Used
- Laravel 12.x
- MySQL for database management
- TailwindCss: A popular CSS framework used for the frontend design of the project.
- Css and Html: Used for the frontend design of the project.
- Javascript: Used for the frontend design of the project.

## Installation

[:arrow_up: Back to top](#index)

#### Installing dependencies

- PHP >= 8.3

#### Download and setup

- Clone the repo

  **For Windows run below commands before cloning the Repo.**

  ```
  $ git clone https://github.com/FaaizanAli/laravel-12-starter-kit.git
  ```

- change directory
  ```
  $ cd laravel-12-starter-kit.git
  ```
- Copy sample `env` file and change configuration according to your need in ".env" file and create Database
  ```
  $ cp .env.example .env
  ```
- Copy sample `env` file and change configuration according to your need in ".env" file and create Database
  ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
  ```
- Copy sample `env` file and change configuration according to your need in ".env" file and smtp configuration
  ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=465
   MAIL_USERNAME=your_username
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email
   MAIL_FROM_NAME="${APP_NAME}"
  ```
- Install php libraries
  ```
  $ composer install
  ```
- Database migration
  ```
  $ php artisan migration
  $ php artisan db:seed
  ```
- Start development server
  ```
  $ php artisan serve
  ```
