# Web Development

[Laravel](https://laravel.com/)

## 1. require tools

* [composer](https://getcomposer.org)
* [node](https://nodejs.org)
* [mysql](https://www.mysql.com)
* [docker desktop](https://www.docker.com/products/docker-desktop/)

Reccommendation: 

* [scoop](https://scoop.sh)

```sh
scoop bucket add main
scoop install composer
scoop install nodejs
```

## 1. create `facultyweb` project

```
composer create-project laravel/laravel facultyweb
```

## 2. connecting database

ref: https://laravel.com/docs/9.x/database

### 2.1 [sqlite](https://www.sqlite.org)

1. create file `database.sqlite`.

2. configuration: [.env](./.env)

```
### sqlite
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
DB_FOREIGN_KEYS=true
```

### 2.2 [mysql](https://www.mysql.com)

1. start `mysql-8.0` server with docker

ref: https://hub.docker.com/_/mysql 

```
docker pull mysql:8.0
docker network create laravelnetwork
docker run --network laravelnetwork --name laravelmysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=DSSIatUBU -e MYSQL_DATABASE=laravel -v mysqldata:/var/lib/mysql -d mysql:8.0
```

mysqlclient cli:

```
docker exec -it laravelmysql mysql -uroot -p
```

2. configuration: [.env](./.env)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=DSSIatUBU
```

NOTE: alternation start `mysql-8.0` with docker-compose

file: [docker-compose.yml](./docker-compose.yml)

```
docker-compose up
```

### 2.3 start `migrate`

```
php artisan migrate
```

### 2.4 start `serve`

```
php artisan serve
```

### 2.5 open website [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 3. add tailwindcss

ref: https://tailwindcss.com/docs/guides/laravel

### 3.1 install tailwindcss

```
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

### 3.2 configure `tailwind.config.js`

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

### 3.3 update `app.css`

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

### 3.4 update `app.blade.php`

```html
<head>

    @vite('resources/css/app.css)
</head>
```

### 3.5 start building

```
npm run dev
```

### 3.6 start php artisan serve

```
php artisan serve
```

### 3.7 faculty webpage

* understanding page layout https://www.sci.ubu.ac.th/ 
* separate views/components

  * welcome.blade.php 
  * components/navbar.blade.php 
  * components/carousel.blade.php

## 4. view hierachy

* add nested componnts
  * components/header.blade.php
  * components/numbers.blade.php
* passing data to Route::get()
* rendering associative array with foreach

## 5. Register Login

### 5.1 install breeze for composer

```
composer require laravel/breeze --dev
```

### 5.2 install breeze for the project

```
php artisan breeze:install
php artisan migrate
npm install
```

### 5.3 start server

```
php artisan serve
```

and 

```
npm run dev
```

### 5.4 update `routes/web.php`

### 5.5 update `dashboard.blade.php`

### 5.6 condition the login register buttons 

### 5.7 add components

* components/usernavbar.blade.php
* components/userheader.blade.php
* components/user.blade.php

## 6 CRUD 

### 6.1 create `dashboard` layouts

* create [views/layouts/dashboard.blade.php](./resources/views/layouts/dashboaard.blade.php)

* update [views/dashboard.blade.php](./resources/views/dashboard.blade.php)


### 6.2 setup create table `post`

``` 
php artisan migrate
php artisan make:migration create_posts_table --create=posts
```

### 6.3 update the migration file

```php
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('detail');
            $table->string('image');
            $table->timestamps();
        });
    }
```

### 6.3 migrate

```
php artisan migrate
```

### 6.4 add resource route to `routes/web.php`

```php
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

### 6.5 add controller and model 

```
php artisan make:controller PostController --resource --model=Post
```

check route list with:

```
php artisan route:list
```

update model `app/Models/Post.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'detail', 'image' ];
}
```

### 6.6 edit `app/Http/Controllers/PostController.php`

[app/Http/Controllers/PostController.php)](./app/Http/Controllers/PostController.php)


### 6.7 create and edit files

* [resources/views/posts/index.blade.php](./resources/views/posts/index.blade.php)
* [resources/views/posts/create.blade.php](./resources/views/posts/create.blade.php)

## Exercise

* modify page 'http://localhost:8000/posts'
* modify create page

~ that's it ~
