# Re-Zefana

Re-Zefana is a Laravel 9 e-commerce application for an online fashion/clothing store, with a customer-facing storefront and a full admin panel for managing the shop.

## Features

**Storefront**
- Browse products through a three-level category structure (category → sub-category → end category), plus brands
- Product search, reviews/ratings, wishlist
- Cart and checkout, with online payments via [Paystack](https://paystack.com)
- Customer account area (profile, password, order history)

**Admin panel**
- Category/sub-category/end-category, brand, color and size management
- Product management (images, colors, sizes, pricing)
- Orders, carts, customers (block/unblock), reviews and wishlists
- Site content: homepage sliders, banners, ads, logo/favicon, about us, contact us, FAQ, call-to-action
- Store configuration: currencies, shipping costs, payment methods, feature switches

## Tech stack

- PHP 8.0+, Laravel 9
- Livewire 2 (used for a few admin CRUD screens — Brands, Colors, Sizes)
- Blade views, jQuery/Bootstrap-based admin and storefront themes (vendored under `assets/`)
- Vite for the storefront's own CSS/JS (`resources/`)
- MySQL (or any Laravel-supported database)

## Requirements

- PHP >= 8.0.2, with the extensions Laravel 9 requires
- Composer
- Node.js + npm
- A MySQL (or compatible) database

## Setup

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate
```

Edit `.env` and configure:
- `DB_*` — your database connection
- `APP_URL` — the URL you'll access the app at
- `PAYSTACK_SECRETE_KEY` — your Paystack secret key (note the project's spelling). This variable isn't listed in `.env.example` but is read directly via `env('PAYSTACK_SECRETE_KEY')` in `FrontendController` for initiating/verifying payments.

```bash
php artisan migrate
npm run build     # or `npm run dev` while developing
```

There are no database seeders, so create your first admin user manually, then flip it to admin (`role_as` = `'1'`):

```bash
php artisan tinker
>>> $u = \App\Models\User::factory()->create(['email' => 'admin@example.com', 'password' => bcrypt('password')]);
>>> $u->update(['role_as' => '1']);
```

(Or register a normal account through the app, then update its `role_as` column to `'1'` directly in the database.)

Make sure the `uploads/` directory (and its subfolders: `products`, `category`, `slider`, `banner`, `ads`, `logofav`, `about`, `contact`, `orders`) is writable — admin image uploads are written there directly via relative paths, not through Laravel's storage disk, so no `php artisan storage:link` is required.

## Running locally

This project's `index.php` and `.htaccess` live at the **project root** (mirroring its Hostinger production deployment), not in `public/` — `public/` only holds the Vite build output. Because of this, `php artisan serve` will not work here (it hardcodes a path to `public/index.php`, which doesn't exist in this layout).

Serve the app with PHP's built-in server rooted at the project directory instead:

```bash
php -S 127.0.0.1:8000 -t .
```

Then visit `http://127.0.0.1:8000`.

## Tests

```bash
php artisan test
# or
vendor/bin/phpunit
```

Only the default Laravel example tests are present — there is no test coverage for the app's business logic yet.

## Project structure

See [CLAUDE.md](CLAUDE.md) for a deeper architecture walkthrough (route/controller layout, domain model, and the admin Livewire components).
