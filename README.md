<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Cài đặt

1. **Tải Code.**
2. **Chạy lệnh sau để cài đặt các dependency:**
    ```bash
    composer install
    ```
3. **Tạo tệp .env bằng cách sao chép .env.example hoặc chạy lệnh:**
    ```bash
    cp .env.example .env
    ```

4. **Cập nhật tên cơ sở dữ liệu và thông tin xác thực trong tệp .env:**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE='tên database'
    DB_USERNAME=root
    DB_PASSWORD=
    ```
5. **Chạy lệnh sau để thực hiện migration và seeding:**
    ```bash
    php artisan migrate --seed
    ```

6. **Chạy ứng dụng qua XAMPP hoặc chạy lệnh sau:**
    ```bash
    php artisan serve
    ```

