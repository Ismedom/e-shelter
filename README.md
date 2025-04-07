



```markdown
# UC E-Shelter

A Laravel-based web application for managing and supporting electronic shelter systems.

## 🚀 Getting Started

Follow these steps to set up the project locally.

---

### 📦 Clone the Repository

```bash
git clone <-repo-url>
cd <project-folder>
```

---

---

### 🧰 Install Dependencies

Install PHP and JS dependencies:

```bash
composer install
# or
composer update

npm install
# or
npm i
```

---


### ⚙️ Environment Setup

1. Create a `.env` file by copying the example or using command for unix:

```bash
cp .env.example .env
```

2. Generate the application key:

```bash
php artisan key:generate
```


### 🛢️ Database Configuration

Update your `.env` with the following database credentials:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=uc_e_shelter
DB_USERNAME=postgres
DB_PASSWORD=123
```

Then run the migrations:

```bash
php artisan migrate
```

---

### 📧 Mail Configuration

Update your mail settings in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_email_app_password
MAIL_FROM_ADDRESS="your_email"
MAIL_FROM_NAME="${APP_NAME}"
```

---

### 🧵 Queue Configuration

Set queue settings in `.env`:

```env
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
```

Then set up the queue system:

```bash
php artisan queue:table
php artisan migrate
```

Start the queue worker:

```bash
php artisan queue:work
```

---

### 💻 Run the App

Start the development server:

```bash
npm run dev
php artisan serve
```

---

### ✅ You're All Set!

Your Laravel app should now be running at `http://127.0.0.1:8000`.

---