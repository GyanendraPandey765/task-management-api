# 🚀 Task Management API (Laravel)

## 📌 Project Overview

This is a RESTful API-based Task Management System built using Laravel.
Users can register, login, and manage their personal tasks securely using token-based authentication.

---

## 🛠 Tech Stack

* PHP (Laravel)
* MySQL
* Laravel Sanctum (Authentication)
* Eloquent ORM
* REST APIs (JSON)

---

## ⚙️ Setup Instructions

1. Clone the repository:

```
git clone https://github.com/YOUR_USERNAME/task-management-api.git
cd task-management-api
```

2. Install dependencies:

```
composer install
```

3. Copy environment file:

```
cp .env.example .env
```

4. Generate application key:

```
php artisan key:generate
```

5. Configure database in `.env`

6. Run migrations and seed data:

```
php artisan migrate --seed
```

7. Start server:

```
php artisan serve
```

---

## 🔐 Authentication APIs

| Method | Endpoint      | Description      |
| ------ | ------------- | ---------------- |
| POST   | /api/register | Register user    |
| POST   | /api/login    | Login user       |
| POST   | /api/logout   | Logout user      |
| GET    | /api/me       | Get user details |

---

## 📋 Task APIs

| Method | Endpoint        | Description     |
| ------ | --------------- | --------------- |
| GET    | /api/tasks      | Get all tasks   |
| POST   | /api/tasks      | Create task     |
| GET    | /api/tasks/{id} | Get single task |
| PUT    | /api/tasks/{id} | Update task     |
| DELETE | /api/tasks/{id} | Delete task     |

---

## 🔑 Authentication Flow

1. Login using `/api/login`
2. Copy `access_token` from response
3. Add header in requests:

```
Authorization: Bearer {token}
Accept: application/json
```

---

## 📊 Task Fields

* Title
* Description
* Status (pending, in-progress, completed)
* Due Date

---

## 🔒 Features Implemented

* User Authentication (Sanctum)
* CRUD Operations for Tasks
* Protected Routes
* Request Validation
* Global Exception Handling
* Database Relationships
* Seeder & Factory for demo data
* Soft Deletes

---

## 🎁 Bonus Features

* Task Filtering (status, due date)
* Clean API structure
* Reusable factory & seeder setup

---

## 📁 Project Structure

```
app/
 ├── Models/
 ├── Http/Controllers/Api/
routes/
 ├── api.php
database/
 ├── migrations/
 ├── seeders/
 ├── factories/
```

---

## 🧪 Testing

You can test APIs using:

* Postman
* curl

---

## 📌 Notes

* `.env` file is not included for security
* Make sure database is configured before running migrations

---

## 👨‍💻 Author

**Your Name**
