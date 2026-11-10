# GrocerEase

GrocerEase is a PHP and MySQL grocery ordering web application. It provides a customer-facing storefront and separate interfaces for administrators and delivery couriers.

## Features

### Customer storefront
- Browse grocery products with product details, images, categories, and prices.
- Search products by name, category, or tags.
- Filter and sort product listings by category, location, and distributor.
- Add products to a session-based shopping cart, update quantities, and remove items.
- Review cart contents and submit an order using saved or entered delivery details.
- View and edit account profile information.

### Administration
- Dashboard with store metrics, including order, user, product, and sales totals.
- View and manage product and user records.
- Review submitted orders and inspect their line items.
- Maintain catalog information such as product descriptions, prices, images, EAN values, categories, tags, and stock quantities.

### Courier workflow
- View pending orders and accept deliveries.
- Review the items and delivery details for assigned orders.
- Mark accepted deliveries as completed.
- View completed delivery history.

## Technology

- **Backend:** PHP
- **Database:** MySQL / MariaDB (PHP MySQLi)
- **Frontend:** HTML, CSS, JavaScript
- **Asynchronous interactions:** JavaScript and PHP endpoints using JSON / AJAX
- **Local development environment:** XAMPP

## Database schema

The repository includes `finaldatabase.sql`, a phpMyAdmin SQL export containing the schema and sample records for these tables:

| Table | Purpose |
|---|---|
| `items` | Product catalog, including EAN, category, stock, location, and distributor |
| `users` | Customer, administrator, and courier accounts |
| `orders` | Order details, customer delivery information, status, and courier assignment |
| `order_items` | Products, quantities, and prices associated with each order |

The dump defines primary keys, a unique EAN constraint on `items`, a unique username constraint on `users`, and foreign keys from orders to users and order items to orders and items.

## Project structure

```text
public_html/
├── index.html                 # Public landing page
├── css/                       # Stylesheets
├── js/                        # Frontend scripts
├── images/                    # Store, carousel, and product images
└── php/
    ├── db_conn.php             # MySQL connection configuration
    ├── header.php              # Shared customer navigation
    ├── login/                  # Authentication and role-specific pages
    │   ├── admin/              # Admin dashboard, catalog, users, and orders
    │   ├── courier/            # Courier delivery workflow
    │   └── user/               # Storefront, product, cart, and checkout
    └── signup/                 # Account registration

finaldatabase.sql               # Database schema and sample data
```

## Demo

[Watch the GrocerEase Demo](https://youtu.be/qZ1hE3aBnhg)

## Local setup

1. Install and start **Apache** and **MySQL** using XAMPP.
2. Clone this repository into the XAMPP web root (normally `C:\xampp\htdocs\grocerease`).
3. Open **phpMyAdmin** at `http://localhost/phpmyadmin`.
4. Create a database named `grocerease`.
5. Select the new database, choose **Import**, and import `finaldatabase.sql`.
6. Check `public_html/php/db_conn.php` and set the connection values for your local MySQL installation. The database name should be `grocerease`.
7. Open the application through Apache:

   `http://localhost/grocerease/public_html/`

## Development notes

- The application uses PHP sessions for authentication state and the customer shopping cart.
- Customer, administrator, and courier pages are organized in separate directories.
- The database connection file contains local XAMPP defaults. Replace these with environment-appropriate settings when deploying outside a local development environment.
- The SQL export includes account and order records. Before sharing or deploying the repository, ensure its sample data does not contain real users' personal information or reusable passwords.
