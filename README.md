# Simple Task Management API

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## About the Project

This is a Laravel-based REST API designed to manage tasks efficiently. It includes functionality for CRUD operations, authentication, and more. The project leverages Laravel's elegant syntax and robust features to provide a seamless development and user experience.

---

## Features
- **Task Management**: Create, read, update, and delete tasks.
  
---

## Requirements
Ensure you have the following installed on your system:
- PHP >= 8.0
- Composer
- MySQL 
- Node.js & npm
- Laravel CLI

---

## Setup Instructions

### 1. Clone the Repository
```bash
git clone https://github.com/ariefsyazry2001/simple-task-api.git
cd simple-task-api
```

### 2. Install Dependencies

#### Install PHP and Composer dependencies:
```bash
composer install
```

#### Install Node.js dependencies:
```bash
npm install
```

### 3. Configure Environment

1. Copy the `.env.example` file to `.env`:
```bash
copy .env.example .env
```

2. Open the `.env` file and update the database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Migrations
Run the database migrations to set up the tables:
```bash
php artisan migrate
```

### 6. Start the Development Server
Start the Laravel development server:
```bash
php artisan serve
```

The API will be available at `http://127.0.0.1:8000`.

### 7. (Optional) Compile Frontend Assets
If the project includes frontend assets, compile them using:
```bash
npm run dev
```

---

## API Endpoints
Here are some example endpoints:

### Tasks
- **GET /tasks**: List all tasks.
- **POST /tasks**: Create a new task.
- **GET /tasks/{id}**: Retrieve a specific task.
- **PUT /tasks/{id}**: Update a task.
- **DELETE /tasks/{id}**: Delete a task.


---

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

