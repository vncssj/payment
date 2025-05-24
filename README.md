# PaymentApp an CakePHP Application

This app was made by myself, using CakePHP Framework version ~5.0.

## Installation

Clone the repository and navigate to the project folder

1. Inside the project directory run on terminal to start the containers:
```bash
docker-compose up -d
```
2. because of the volumes, all framework dependences will be removed, so you have to install it again using: 
```bash
docker exec payment-web-1 composer install
```
3. Then, run the migrations for build the database strucure, running:
```bash
docker exec payment-web-1 php /var/www/html/bin/cake.php migrations migrate
```
4. It's needed create at least 2 users for make transfers, do it.

## Archtecture

This app follows:

- Service Pattern – Isolates business logic

- DTOs (Data Transfer Objects) – Clear and immutable data contracts

- SOLID Principles – Clean, maintainable and testable code

- CakePHP ORM & Migrations – For elegant data handling
