# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

**Rezefana** — a Laravel 9 e-commerce storefront + admin panel. This directory is a raw Hostinger hosting backup (`domains/delacliquedesigns.com/public_html/rezefana`), not a normal git checkout — there is no `.git` here. Treat it as a snapshot of a live production site.

### Non-standard deployment layout

Unlike a typical Laravel project, the document root is this directory itself, not `public/`:
- `index.php` and `.htaccess` live at the **project root** (copied from `public/`, with the `bootstrap/app.php` and `storage/framework/maintenance.php` paths adjusted to match).
- `public/` only contains the Vite-built assets (`public/build/`), not an `index.php`.
- `assets/` at the root is a large vendored admin-theme/front-theme asset library (AdminLTE-style plugins, jQuery, Bootstrap, DataTables, etc.) referenced directly by Blade views — it is not part of the Vite pipeline.

Keep this in mind before assuming standard Laravel public-folder conventions apply. In particular, **`php artisan serve` does not work** — it always shells out to `vendor/laravel/framework/.../resources/server.php`, which is hardcoded to require `public/index.php`, and that file doesn't exist here. Serve the app with PHP's built-in server rooted at the project directory instead (`php -S 127.0.0.1:8000 -t .`), which works because `index.php`/`.htaccess` are already at the root.

## Commands

```bash
composer install          # PHP dependencies
npm install                # JS dependencies
npm run dev                 # Vite dev server (watches resources/css/app.css, resources/js/app.js)
npm run build                # Production asset build -> public/build

php -S 127.0.0.1:8000 -t .    # Local dev server — do NOT use `php artisan serve`
php artisan migrate           # Run migrations
php artisan test               # Run test suite (or: vendor/bin/phpunit)
php artisan test --filter=NameOfTest   # Run a single test
vendor/bin/pint                 # Laravel Pint code style fixer
```

There is no `.env` committed with real secrets checked in — `.env` exists in this backup with live-looking values; treat it as sensitive and do not print/commit it. `PAYSTACK_SECRETE_KEY` (note the site's misspelling of "secret") is read directly via `env()` in `FrontendController` and is **not** listed in `.env.example` or `config/services.php` — it must be set manually.

Only default Laravel test stubs exist (`tests/Unit/ExampleTest.php`, `tests/Feature/ExampleTest.php`) — there is no real test coverage for the app's business logic.

## Architecture

### Domain model

Three-level product taxonomy, each level a separate table/model:
- `Category` (`categories`) → has many `SubCategories` (`sub_categories`) → has many `ItemCategory` ("end category", `item_categories`)
- `Products` belongs to all three (`cat_id`, `sub_cat_id`, `end_cat_id`) plus `brand`, and has many `ProductImages`, `ProductColor`, `ProductSize`.
- Shopping: `Cart` (table `table_carts`) holds pre-checkout line items keyed by `product_id`/`color_id`/`size_id`; `Orders` holds placed orders with `payment_status`/`delivery_status`/`reference` (Paystack transaction reference).
- `User.role_as` is the authorization flag: `'1'` = admin, checked in `AdminMiddleware` (aliased as `isAdmin` in `Kernel::$routeMiddleware`). There is no roles table/enum — just this string flag.
- Site content/configuration is data-driven through singleton-ish tables rather than config files: `SiteSettings`, `Switcher` (feature toggles), `Currency`, `ShippingCost`/`ShippingCostAll`, `LogoFavicon`, `Banner`, `HomepageSlider`, `AdsImages`, `CallToAction`, `AboutUs`, `ContactUs`, `FaQ`, `PaymentMethod`.

### Route/controller layout (`routes/web.php`)

Three route groups by audience, mirrored in `app/Http/Controllers`:
- **Public storefront** — `Route::controller(Frontend\FrontendController::class)` group at root. One large controller (~700+ lines) handles the entire shopping flow: category/product browsing (`viewSubcatProduct`, `viewEndcatProduct`, `ViewProduct`), search, reviews, cart CRUD, wishlist, checkout, and Paystack payment initialization/verification (`PlaceOrder`, `PaymentCallback` — raw cURL calls to `https://api.paystack.co/...`, not an SDK).
- **`/user/*`** (`auth` middleware) — `User\UserController`: account profile, password update, order lookup.
- **`/admin/*`** (`auth` + `isAdmin` middleware) — one controller per resource area (`CategoryController`, `ProductController`, `UserController`, `CommentReviwsController`, `WishlistController`, `CurrencyController`, `ShippingCostController`, `ProductOrders`, `SliderController`, `BannerController`, `AdsImageController`, `LogofavController`, `PaymentMethodController`, `SettingsController`, `SwitcherController`, `WebController` for About/Contact/FAQ). Most CRUD is plain controller + Blade + route-per-action (no API resources/form requests beyond a couple in `Http/Requests`).
- A few admin CRUD screens (Colors, Sizes, Brand) are implemented as **Livewire v2** components (`app/Http/Livewire/Admin/...`) instead of controllers, routed directly to the component class (e.g. `Route::get('colors', App\Http\Livewire\Admin\Colors\Index::class)`), each rendering into `layouts.admin` via `->extends(...)->section('content')`. New similar admin CRUD screens in this app are expected to follow the Livewire pattern seen there (validate → create/update → flash message → `dispatchBrowserEvent('close-modal')` → reset inputs), not the plain-controller pattern.

### Views

Blade views under `resources/views` mirror the three audiences: `frontend/` (storefront, with `collections/`, `pay/`, `search/` subtrees), `admin/` (one directory per resource, matching the admin controllers), `user/`, plus `layouts/` (shared layout + `layouts/inc` partials) and `livewire/admin/` for the Livewire components' views.
