# Laravel API Project for Managing Submissions

This project provides an API for creating `Submission` records, including storing a name, email, and message.

## Setup Instructions

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/your-username/your-repository.git
cd your-repository
```

Install Dependencies
```bash
composer install
```

Copy the .env.example file to .env:
```bash
cp .env.example .env
```

Configure the environment variables, especially the database connection settings, in the .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Generate Application Key
```bash
php artisan key:generate
```

Run Migrations
```bash
php artisan migrate
```

Start the Development Server
```bash
php artisan serve
```

You can test the API using tools like Postman or cURL.

```bash
POST /api/v1/submit HTTP/1.1
Host: 127.0.0.1:8000
Content-Type: application/json

{
    "name": "John Doe",
    "email": "johndoe@example.com",
    "message": "Hello, this is a test message."
}
```

Example Response:
```bash
{
    "success": "ok"
}
```
