Deskripsi :

Dalam mengelola sebuah restoran, penting untuk memiliki sistem yang dapat membantu setiap orang di dalamnya. Aplikasi pengelolaan restoran ini dirancang untuk memfasilitasi tugas-tugas sehari-hari dari manajer, kasir, dan admin tanpa formalitas yang rumit.
Aplikasi ini berfungsi sebagai alat bantu dalam mengelola aktivitas restoran, mengintegrasikan peran-peran yang berbeda dalam lingkungan yang santai dan mudah digunakan.

Teknologi yang digunakan:

- Laravel 10
- mySQL
- Bootstrap 5.2.x
- Bootstrap Icons 1.10.0
- Bootstrap template mazer https://zuramai.github.io/mazer/

Prasyarat:

- Git https://git-scm.com/
- PHP ^8.1, Mysql
- Composer https://getcomposer.org/
- Node JS 20.5.0 https://nodejs.org/en/download/current

Cara Install Project:

- Download atau clone project => $git clone https://github.com/maulanayusup701/Laravel-CoffeeShop.git
- Buka folder project dan buka gitbash
- Install dependency => $composer install & $npm install
- Setup environt variabel dengan mengcopy file .env => $cp .env.example .env
- Buka file .env kemudian isi DB_DATABASE dengan nama db_coffeeShop
- Buat DB db_cofeeShop di mysql
- Generate APP_KEY => $php artisan key:generate
- Lakukan migrate dan seed => $php artisan migrate --seed

Akun Admin :

1. Position Manager

- Username = manager
- Password = password

1. Position Admin

- Username = admin
- Password = password

3. Position Cashier

- Username = cashier
- Password = password