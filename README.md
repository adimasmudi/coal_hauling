<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

Admin dashboard for Coal Hauling company that can make admin can manage all resource inside the company from vehicles, delivery management, supply chain, etc.

# Feature Covered

-   Authentication and authorization
-   Dashboard
-   Manage Category of Vehicle
-   Manage Vehicles
-   Delivery Management
-   Partner / Supplier Management
-   Warehouse Management

# Future Improvement

-   Vehicle Maintenance Tracking
-   Vehicle Documents Tracking
-   Departments and Employee Management

# How to Run

1. Clone this repository, you can use `git clone https://github.com/adimasmudi/coal_hauling.git`
2. Change directory `cd coal_hauling`
3. Install all necessary dependency using `composer install` and wait until it's done.
4. Create copy of the environment file `cp .env.example .env` and fill all the necessary field with your data especially for database connection.
5. Generate Application Key `php artisan key:generate`, This key is used for encrypting user sessions and other sensitive data.
6. Do database migration along with database seeding using the following syntax `php artisan migrate:fresh --seed`.
7. Finally the application is ready to serve. Run it using this command `php artisan serve`

Note:
For admin auth you can use

email : admin@mail.com

password : admin_123

# Screenshot
