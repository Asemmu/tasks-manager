# Laravel Task Manager

A Laravel 11 application for managing tasks with user authentication, filtering, pagination, and task status tracking.

##  Features

-  User authentication (login/register)
-  Task CRUD (Create, Read, Update, Delete)
-  Filter by task status, priority, or name
-  Paginated results with per-page control
-  Status icons (Font Awesome)
-  Clean and modular Blade components
-  Bootstrap-based UI

---

##  Requirements

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL or PostgreSQL
- Laravel 12

---

## 📦 Installation

### 1. Clone the repository

- git clone https://github.com/Asemmu/tasks-manager
- cd tasks-manager

### 2. Install backend dependencies
- composer install


### 3. Install frontend dependencies
- npm install && npm run build


### 4. Configure environment
- cp .env.example .env
- php artisan key:generate


### 5. Migrate the database
- php artisan migrate

### 6.Serve the application
- php artisan serve
