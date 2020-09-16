# Laravel Backend API

## Setup

**Clone project from repository**

`$ git clone https://github.com/marcelfrancisnuto/laravel-users-management.git`

**Create a .env file by copying .env.example then configure the following properties**


DB_DATABASE=practical_exam
DB_USERNAME=yourdbusername
DB_PASSWORD=yourddbpassword

**Install composer dependencies**

```
$ composer install
```

**Install NPM depdencies**

```
$ npm i
```

**Generate app key**

```
$ php artisan key:generate
```

**Migrate tables and seeders**

```
$ php artisan migrate:fresh --seed
```

**Start laravel app server running `http://localhost:8000`**

```
$ php artisan serve
```

## API Routes

`GET api/users` Get list of users

`POST api/users` Create a new user

`PUT api/users` Update a single user

`DELETE api/users/{ids}` Delete one or multiple users
