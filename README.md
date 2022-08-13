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

