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
- **Database:** MySQL (PHP MySQLi)
- **Frontend:** HTML, CSS, JavaScript
- **Asynchronous interactions:** JavaScript and PHP endpoints using JSON / AJAX
- **Local development environment:** XAMPP

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
```

## Local setup

1. Install and start **Apache** and **MySQL** using XAMPP.
2. Clone this repository into the XAMPP web root (normally `C:\\xampp\\htdocs\\grocerease`).
3. Create a MySQL database named `grocerease`.
4. Configure the connection settings in `public_html/php/db_conn.php` for your local MySQL installation.
5. Open the application through Apache, for example:

   `http://localhost/grocerease/public_html/`

### Database note

The repository currently does **not** include a SQL schema or database export. The application expects tables including `users`, `items`, `orders`, and `order_items`; a compatible database must be created and populated separately before the application can run fully.

## Development notes

- The application uses PHP sessions for authentication state and the customer shopping cart.
- Customer, administrator, and courier pages are organized in separate directories.
- The database connection file contains local XAMPP defaults. Replace these with environment-appropriate settings when deploying outside a local development environment.
