# Filament Version v3

[![Tests](https://github.com/alphaolomi/mnada/actions/workflows/run-tests.yml/badge.svg)](https://github.com/alphaolomi/mnada/actions/workflows/run-tests.yml)

## Mnada/Auction Project

A web application that allows users to create auctions and bid on them.

Its implements `Forward Auction` model. A type of auction is where many buyers bid for single sellers’ products and services.

## Features

### Admin Portal Features

-   [x] Admin can login
-   [x] Admin can view all auctions + auction items
-   [ ] Admin can view all bids
-   [ ] Admin can view all payments
-   [ ] Admin can view all users(both buyers and sellers)

### Seller Website Features

-   [ ] Seller can register
-   [ ] Seller can login
-   [ ] Seller can create auction + add auction items
-   [ ] Seller can view auction details
-   [ ] Seller can edit un-published auction details
-   [ ] Seller can pay for auction listing fee

### Buyer Website Features

-   [ ] Buyer can register
-   [ ] Buyer can login
-   [x] Buyer can see list of published auctions
-   [x] Buyer can view auction details
-   [ ] Buyer can bid on auction
-   [ ] Buyer can pay for auction item

## API Documentation

### Authentication

-   [ ] Login
-   [ ] Register
-   [ ] Logout

### Auctions

-   [ ] List Auctions
-   [ ] Show Auction
-   [ ] Create Auction
-   [ ] Update Auction
-   [ ] Delete Auction

### Auction Items

-   [ ] Create Auction Items
-   [ ] Update Auction Items
-   [ ] Delete Auction Items
-   [ ] Show Auction Items

### Bids

-   [ ] Create Bid
-   [ ] Delete Bid (If 5min has not passed)
-   [ ] Show Bid

### Payments

-   [ ] List User Payments
-   [ ] Create Payment
-   [ ] Show Payment


## Getting started

### Prerequisites

- [PHP 8.0](https://www.php.net/downloads)
    - [ext-intl](https://www.php.net/manual/en/intl.installation.php)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://www.mysql.com/downloads/)
- [Node.js](https://nodejs.org/en/download/)
- [NPM](https://www.npmjs.com/get-npm) Or [Yarn](https://classic.yarnpkg.com/en/docs/install/)


### Clone the repository

```bash
git clone git@github.com:alphaolomi/mnada.git
```
### Install dependencies

```bash
composer install
```

### Setup the environment

```bash
cp .env.example .env
```

### Generate an app encryption key

```bash
php artisan key:generate
```

### Create an empty database

Create a new database using your preferred database tooling.

#### For MySQL Database via XAMPP

Edit the `.env` file and set the following values:

```ini
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mnada
DB_USERNAME=root
DB_PASSWORD=
``` 

#### For SQLite Database

Create a new file in the `database` directory called `database.sqlite`.

```bash
touch database/database.sqlite
```

Edit the `.env` file and set the following values:
```ini
DB_CONNECTION=sqlite
```


### Migrate the database

```bash
php artisan migrate
```

### Seed the database

```bash
php artisan db:seed
```

### Install NPM dependencies (Optional)

```bash
npm install
```

### Compile assets (Optional)

```bash
npm run dev
```


### Run the application

```bash
php artisan serve --host=localhost --port=8000
```

Open [http://localhost:8000](http://localhost:8000) in your browser.
