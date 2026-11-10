# GrocerEase — Multi-Branch Grocery Ordering System

GrocerEase is a PHP and MySQL grocery-ordering web application developed as a project exploring product catalog management, shopping-cart behavior, order processing, and role-specific interfaces.

## Project overview

The application includes a customer-facing storefront and separate pages for administrators and delivery couriers. The database models products, users, orders, and order line items, with product records containing fields such as EAN, category, stock quantity, location, and distributor.

## Implemented areas

- **Product catalog:** Browse grocery items with descriptions, images, prices, categories, and product details.
- **Search and filtering:** Client-side interactions and PHP endpoints support product search and filtering.
- **Shopping cart:** A PHP session-based cart stores selected product quantities.
- **Checkout flow:** A PHP endpoint calculates order totals from database product prices and creates order and order-item records.
- **Administrative pages:** Separate admin pages provide product and user record management interfaces.
- **Courier pages:** A role-specific interface displays pending orders and supports order-status updates.
- **Relational data model:** MySQL tables represent items, users, orders, and order items, with primary keys, unique constraints, and foreign-key relationships.

## Technology

- PHP
- MySQL / MariaDB
- JavaScript
- AJAX and JSON
- HTML5 and CSS3
- XAMPP for local development
- PHP MySQLi

## Database structure

The repository includes `finaldatabase.sql`, a phpMyAdmin SQL export containing the schema and sample records.

| Table | Purpose |
|---|---|
| `items` | Product catalog and inventory-related fields |
| `users` | Customer, administrator, and courier accounts |
| `orders` | Order details, delivery information, status, and courier assignment |
| `order_items` | Products, quantities, and prices associated with an order |

## Demo

[Watch the GrocerEase walkthrough](https://youtu.be/qZ1hE3aBnhg)

## Local setup

1. Install XAMPP and start Apache and MySQL.
2. Clone this repository into the XAMPP web root (commonly `C:\xampp\htdocs\grocerease`).
3. Open phpMyAdmin and create a database named `grocerease`.
4. Import `finaldatabase.sql` into that database.
5. Review `public_html/php/db_conn.php` and configure the local database connection values.
6. Open the application at:

   ```text
   http://localhost/grocerease/public_html/
   ```

## Known limitations

This repository represents a learning/project implementation and should not be treated as production-ready. In particular:

- Password handling should be updated to use PHP's `password_hash()` and `password_verify()` before real accounts are used.
- Checkout should use a database transaction and validate stock before committing an order.
- All database inputs and dynamic query components should be reviewed for prepared-statement use and authorization checks.
- The cart retrieval endpoint currently contains a table-name mismatch (`products` versus the schema's `items`) that should be corrected before relying on that flow.
- The SQL dump contains user and order records. Confirm that all personal information and passwords are synthetic or anonymized before keeping the repository public.

