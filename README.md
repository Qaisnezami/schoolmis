# School Management Information System (schoolMIS)

Welcome to the School Management Information System (schoolMIS)! This project is a simple web application designed to manage school operations using Laravel and the Filament admin panel for an efficient backend interface.

## Table of Contents

1. [Project Overview](#project-overview)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Usage](#usage)

## Project Overview

The schoolMIS application is designed to facilitate the management of school-related activities such as student records, teacher management, and class schedules. It provides an intuitive admin interface through Filament, allowing easy access and management of school data.

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm (for managing frontend assets)
- MySQL or another supported database

## Installation

To set up the schoolMIS application, follow these steps:

1. Clone the repository: `git clone https://github.com/qaisnezami/schoolmis.git`
2. Configure environment variables: Run `cd schoolmis && cp .env.example .env` ,
3. Install composer: `composer install`
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate` (This command sets up the database tables based on defined migrations)
6. (Optional) Seed the database: `php artisan db:seed` (This command populates the database with sample data, if available)
7. Run Application `php artisan serve`,
8. Link Storage `php artisan storage:link`


## Usage
The application should be available at `http://127.0.0.1:8000/admin/login`,
You can login with these credentials
Email : `admin@me.com`
Password : `password`





