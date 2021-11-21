<h1 align="center">Karirpad Backend Test</h1>

Built with PHP using the <a href="https://laravel.com/">Laravel</a> Framework.<br/>

Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things..</p>

## Contents

- [Description](#description)

- [Requirements](#requirements)

- [Installation](#installation)

- [Endpoint](#endpoint)

- [Documentation](#documentation)

- [Related Project](#related-project)

## Description

This is RESTful api design for

[`Karirpad Backend Test`](https://github.com/dhiyo7/Karirpad-BE).

Built withPHP, using Laravel framework and other libraries.

## Requirements

- [`PHP 7`](https://www.php.net/)

- [`Composer`](https://getcomposer.org/)

- [`Laravel`](https://laravel.com/)

- [`Postman`](https://www.postman.com/downloads/)

- [`MySql`](https://remotemysql.com/phpmyadmin/index.php)

## Installation

1. Open your terminal or command prompt

2. Type `git clone https://github.com/dhiyo7/Karirpad-BE.git`

3. Open the folder and type `composer update` for install dependencies

4. Register an account or create new database

5. Create file **_.env_** in root folder with the following contents :

```bash
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=namedatabase

DB_USERNAME=usernamedb

DB_PASSWORD=passwddb
```

1. Type `php artisan server` in terminal for run this backend.

## Endpoint

### BaseURL

```bash
https://karirpad-test-backend.herokuapp.com
```

### Category Router

**Used for suplyind data of category**

| No  | Method | Endpoint           | Header                    | Info                  |
|:---:|:------:|:------------------:|:-------------------------:|:---------------------:|
| 1   | POST   | /api/category      | Accept : application/json | Create new Category   |
| 2   | PUT    | /api/category/{id} | Accept : application/json | Edit Category         |
| 3   | GET    | /api/category      | Accept : application/json | Show list of category |
| 4   | DELETE | /api/category/{id} | Accept : application/json | Delete category       |

### Stuff Router

**Used for supplying data of all stuff**

| No  | Method | Endpoint        | Header                    | Info               |
|:---:|:------:|:---------------:|:-------------------------:|:------------------:|
| 1   | POST   | /api/stuff      | Accept : application/json | Create new Stuff   |
| 2   | PUT    | /api/stuff/{id} | Accept : application/json | Edit Stuff         |
| 3   | GET    | /api/stuff      | Accept : application/json | Show list of stuff |
| 4   | DELETE | /api/stuff/{id} | Accept : application/json | Delete stuff       |
