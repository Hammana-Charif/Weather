# Weather

This project is a scalable weather application, in the form of a website. The first step is to implement the "pollution"
part. In the future, why not weather data and this by city.

## Project setup

* Initialize new project symfony


````bash
symfony new 'project-name'

symfony check:requirements

symfony server:start

php bin/console about

composer require logger

Symfony check:security

npm install --save-dev file-loader
````

* Project structure


````bash
Weather/
|
├─ angular-front-app/
|
├─ assets/
|
├─ bin/
|
├─ node_modules/
|
├─ config/
│
├─ public/
│   ├─ build/
│   └─ index.php
|
├─ src/
│   ├─ Command/
│   ├─ Controller/
│   ├─ Entity/
│   ├─ Form/
│   ├─ Repository/
│   ├─ Security/
│   ├─ Service/
│   ├─ Entity/
│   └─ Service/
|
├─ templates/
|
├─ test/
|
├─ translations/
|
├─ var/
|   └─ cache/
|
└─ vendor/
````

* Install webpack encore


````bash
composer require symfony/webpack-encore-bundle

npm install @symfony/webpack-encore --save-dev
````

* Install angular


````bash
npm install -g @angular/cli

ng new my-app

cd my-app

ng serve --open

ng add @angular/material
````

[Angular](https://angular.io/)

* Install Materialize CSS(optional)


````bash
npm install materialize-css@next(optional)
````

[Materialize](https://materializecss.com/)

* Install SASS SCSS(optional)


````bash
npm install sass-loader@^8.0.0 node-sass(optional)
````

[SASS](https://sass-lang.com/)

## PHPStorm setup
````bash
PHP version: 7.4
CLI interpreter: 7.4.11
symfony version: 5.1
server configuration: MariaDB: 10.4.14
````

### SQL Commands for database
```sql
create table city
(
    id             int auto_increment
        primary key,
    name           varchar(255) null,
    air_quality    varchar(255) null,
    fine_particle  varchar(255) null,
    heavy_particle varchar(255) null,
    ozone          varchar(255) null,
    datetime       varchar(255) null
)
    collate = utf8mb4_unicode_ci;

create table doctrine_migration_versions
(
    version        varchar(191) not null
        primary key,
    executed_at    datetime     null,
    execution_time int          null
)
    collate = utf8_unicode_ci;

create table user
(
    id       int auto_increment
        primary key,
    email    varchar(180) not null,
    roles    longtext     not null comment '(DC2Type:json)',
    password varchar(255) not null,
    constraint UNIQ_8D93D649E7927C74
        unique (email)
)
    collate = utf8mb4_unicode_ci;
```
