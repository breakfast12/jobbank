# Job Portal Application

A full-featured job portal built with Laravel 11, Spatie Permission, Breeze auth scaffolding, and MySQL. This application allows users to register, create companies, post jobs, search and apply for positions, and much more.

## Table of Contents

-   [Features](#features)
-   [Tech Stack](#tech-stack)
-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Configuration](#configuration)
-   [Usage](#usage)
-   [Running Tests](#running-tests)
-   [Contributing](#contributing)
-   [License](#license)

## Features

-   User authentication (login & registration) powered by Laravel Breeze
-   Role and permission management using Spatie Laravel-Permission
-   Create and manage companies
-   Post and manage job vacancies
-   Advanced job search and filtering
-   Apply to jobs with resume upload
-   Dashboard for applicants and employers
-   Responsive UI built with Blade and Tailwind CSS
-   And many more exciting features!

## Tech Stack

-   **Framework**: Laravel 11
-   **Authentication**: Laravel Breeze
-   **Authorization**: Spatie Laravel-Permission
-   **Database**: MySQL
-   **Frontend**: Blade templates & Tailwind CSS

## Requirements

-   PHP >= 8.1
-   Composer
-   MySQL
-   Node.js & NPM
-   Git

## Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/breakfast12/jobbank.git
    cd jobbank
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install JavaScript dependencies**

    ```bash
    npm install
    ```

4. **Copy `.env` file and generate application key**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Configure database settings** in `.env`:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=job_portal
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run migrations and seed database**

    ```bash
    php artisan migrate --seed
    ```

7. **Compile assets**

    ```bash
    npm run dev
    ```

8. **Start the development server**
    ```bash
    php artisan serve
    ```
