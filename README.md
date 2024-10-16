
# eCommerce Cart System

This project is a simple eCommerce cart system developed using PHP, MySQL, HTML, CSS, and JavaScript. It allows users to add products to a shopping cart, update quantities, and proceed to checkout with a smooth user experience.

## Prerequisites

- PHP 7.x or above
- MySQL database server
- Apache server (XAMPP or WAMP recommended)
- Composer (for dependency management)

## Setup Instructions

1. **Clone the repository**  
   Clone the project from GitHub using the following command:
   ```bash
   git clone https://github.com/J-Chords/ecommerce-cart.git
   ```

2. **Start the server**  
   - If using XAMPP or WAMP, make sure the Apache and MySQL servers are running.

3. **Create the Database**  
   - Open phpMyAdmin or any MySQL client.
   - Create a new database called `ecommerce`.
   - Import the provided `ecommerce.sql` file into the `ecommerce` database.

4. **Configure Database Connection**  
   - Open `db.php` in the project directory.
   - Update the database connection settings:
     ```php
     $host = 'localhost';
     $db = 'ecommerce';
     $user = 'root';
     $password = '';
     ```

5. **Run the Project**  
   - Place the project folder in the `htdocs` directory of XAMPP or the `www` directory of WAMP.
   - Open your browser and navigate to:
     ```
     http://localhost/ecommerce-cart/index.php
     ```

## Usage

- **View Products**: Browse through the available products on the index page.
- **Add to Cart**: Click on "Add to Cart" to add products to your cart.
- **View Cart**: Click on "View Cart" to see the items added to your cart.
- **Update Quantities**: Change the quantity of products directly in the cart.
- **Remove Products**: Click "Remove" to delete items from the cart.
- **Continue Shopping**: Use the "Continue Shopping" button to go back to the products page.
- **Checkout**: Click "Checkout" to simulate a purchase with a confirmation popup.

## Troubleshooting

- **Database Connection Issues**:  
  Make sure your `db.php` file has the correct database credentials. Verify that the MySQL server is running and the `ecommerce` database is created.

- **Page Not Found Error**:  
  Ensure that the project folder is correctly placed in the `htdocs` or `www` directory and that the URL is correct.

- **Missing Styles or Icons**:  
  Make sure that all assets like CSS, JavaScript, and images are correctly linked and exist in their respective folders.

## License

This project is licensed under the MIT License.

### © 2024 Jonathan N. Israel Victory

All rights reserved. Unauthorized copying, distribution, or use of this software is strictly prohibited without prior written permission from the author.
