# Vanta MVP

## Project Purpose
Vanta MVP is a **Laravel monolith** that uses:

- **Filament** for internal/admin workflows
- **Blade + Tailwind CSS** for public-facing pages

The goal is to deliver a fast MVP that covers core VIP profile and sharing flows without introducing premature complexity.

---

## Prerequisites
Install the following locally before setup:

- **PHP** 8.2+
- **Composer** 2.x
- **Node.js** 20+
- **npm** 10+
- Database:
  - **SQLite** (recommended for MVP local development), or
  - **PostgreSQL** 14+

Optional but recommended:
- Git
- A local process manager / terminal multiplexer

---

## Local Setup (Exact Command Sequence)
Run these commands from the project root:

```bash
git clone <your-repo-url> vanta-platform
cd vanta-platform

composer install
npm install

cp .env.example .env
php artisan key:generate

touch database/database.sqlite

php artisan migrate
php artisan make:filament-user

npm run build
php artisan serve
```

If you prefer running frontend and backend in parallel during development, use:

```bash
npm run dev
php artisan serve
```

---

## `.env` Configuration

### SQLite MVP (Recommended)
Use this for the fastest local setup:

```env
APP_NAME=Vanta
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/vanta-platform/database/database.sqlite

CACHE_STORE=file
QUEUE_CONNECTION=database
SESSION_DRIVER=database
```

> Tip: keep the SQLite path absolute to avoid path resolution issues.

### Optional PostgreSQL Configuration
If your team prefers PostgreSQL locally, update `.env` as follows:

```env
APP_NAME=Vanta
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=vanta
DB_USERNAME=postgres
DB_PASSWORD=your_local_database_password

CACHE_STORE=file
QUEUE_CONNECTION=database
SESSION_DRIVER=database
```

Then create the database manually (example):

```bash
createdb vanta
php artisan migrate
```

---

## Core Development Commands

### Run Migrations
```bash
php artisan migrate
```

### Create Filament Admin User
```bash
php artisan make:filament-user
```

### Run Development Server
```bash
php artisan serve
```

### Build Frontend Assets (Production Build)
```bash
npm run build
```

### Watch/Hot Reload Frontend Assets (Development)
```bash
npm run dev
```

---

## MVP Scope
The MVP covers this core flow:

1. **Brand** is created and managed.
2. **VIP Client** is created under a Brand.
3. A **Public VIP Page** is generated/rendered.
4. A **QR Link** points users to the VIP page.
5. A **Premium Demo** experience is shown from that flow.

This scope is intentionally narrow to validate user value quickly.

---

## Out of Scope for MVP
The following are explicitly **not** part of MVP delivery:

- Subscription systems
- Billing and invoicing
- Payment gateway integrations
- Microservices/service decomposition
- React SPA frontend architecture
- Native mobile apps
- Full analytics/data warehouse integrations
- Advanced role/permission matrices beyond MVP admin needs
- Complex workflow automation/orchestration
- Multi-region/high-availability infrastructure work

These can be considered in post-MVP phases after core validation.
