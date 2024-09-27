
# Van Rental Application

This is a Laravel application that integrates with Stripe, Google services, and mail configuration. Follow the steps below to get the application up and running.

## Prerequisites

Before you begin, ensure you have the following installed:
- **PHP >= 8.0**
- **Composer**
- **Node**
- **MySQL** or any other database supported by Laravel
- **Stripe account** for payment integration
- **Google API credentials** for any Google services
- **Mail service provider** (e.g., SMTP, Mailtrap, Mailgun)

## Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/your-username/your-laravel-app.git
```

### 2. Change into the project directory

```bash
cd your-laravel-app
```

### 3. Copy `.env.example` to `.env`

```bash
cp .env.example .env
```

### 4. Set up environment configuration

Open the `.env` file and update the necessary configuration details:

#### Database Configuration:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

#### Stripe Configuration:
```env
STRIPE_API_KEY=your_stripe_api_key
STRIPE_SECRET_KEY=your_stripe_secret_key
STRIPE_DIRECT_PAY_LINK=your_stripe_payment_link
```

#### Google Configuration:
```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://your-app-url.com/auth/google/callback
```

#### Mail Configuration:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Install dependencies

Run the following command to install all the necessary dependencies:

```bash
composer update
```

### 6. Generate the application key

To set the application key in the `.env` file, run:

```bash
php artisan key:generate
```

### 7. Run migrations and seed the database

Run the following Artisan commands to set up the database tables and seed them with data:

```bash
php artisan migrate --seed
```

### 7. Run Node Modules

Run the following commands to compile your assets

```bash
npm install
npm run dev (Compile for development)
npm run build (Complile for production - Comment public/build from gitignore file if you are moving in production)
```

### 8. Serve the application

Now, you can serve the application using:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

---

## Deployment Instructions

Follow these instructions to deploy the Laravel application to a production server.

### 1. Set up a production environment

- Ensure you have **PHP**, **MySQL**, and a web server like **Nginx** or **Apache** set up on your server.
- Install **Composer** on the server.

### 2. Clone the repository

On your production server, run:

```bash
git clone https://github.com/your-username/your-laravel-app.git
```

Change into the project directory:

```bash
cd your-laravel-app
```

### 3. Set up environment variables

- Copy the `.env.example` to `.env`:

```bash
cp .env.example .env
```

- Update the `.env` file with production values, including the database and third-party configurations (Stripe, Google, Mail).

### 4. Install dependencies

Run the following command to install Composer dependencies:

```bash
composer install --optimize-autoloader --no-dev
```

### 5. Generate the application key

Run the following command to generate the application key for production:

```bash
php artisan key:generate
```

### 6. Migrate and seed the database

Run the following command to migrate the database and seed any required data:

```bash
php artisan migrate --force --seed
```

### 7. Set file permissions

Ensure that the `storage` and `bootstrap/cache` directories are writable by the web server:

```bash
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
```

### 8. Set up a queue worker

If you are using queues, make sure to start a queue worker using:

```bash
php artisan queue:work --daemon
```

You can also use a process supervisor like **Supervisor** to ensure that the queue worker stays running.

### 9. Optimize the application for production

Run the following commands to optimize the application:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 10. Serve the application

Configure your web server (Nginx or Apache) to serve the application. You may also use **Laravel Forge** or **Envoyer** for simplified deployment and server management.

---

## Environment Variables (`.env`)

Here's the sample `.env.example` file:

```plaintext
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=

STRIPE_API_KEY=
STRIPE_SECRET_KEY=
STRIPE_DIRECT_PAY_LINK=
```

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
