# Weblog API Project for Asre Dadeh Co,

## Requirements

Make sure the following are installed on your local system:

-   **PHP 8.x**: [Download PHP](https://www.php.net/downloads)
-   **Composer**: [Download Composer](https://getcomposer.org/download/)
-   **MySQL**: [Download MySQL](https://dev.mysql.com/downloads/installer/)

## Setup Instructions

Follow these steps to set up the project locally:

1. Extrct project in local.

2. Navigate to the project directory:

```bash
cd <project-directory>
```

3.Install the project dependencies using Composer:

```bash
composer install
```

4. copy `.env.example` and rename it to `.env`, and then set your database config.

5. Run the migrations with seeding:

```bash
php artisan migrate:fresh --seed
```

6. Copy the `OAuth keys` from the project root to the storage directory:

```bash
cp oauth-private.key storage/
cp oauth-public.key storage/
```

7. Run the project locally:

```bash
php artisan serve
```

The application should now be running at http://localhost:8000. If you encounter any issues, ensure that your .env file is configured correctly and that the storage folder has the correct permissions.
