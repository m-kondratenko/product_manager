# Product Manager
The project allows you to create, read, update and delete products. Also there is login and registration pages where you can create new user and log on.

The following technologies were used: HTML, PHP, MVC, bootstrap(only CSS).

# Notes.
- index.php is the front controller.
- controllers/controllers.php consists of 5 controllers for all pages (updating and deleting are performed on the same page).
- models/products.php contains base class Model and child class Products.
- models/users contains child class Users.
- models/config contains DB parameters.
- views/ contains views for all 5 pages.
- views/layout.php is a base layout for all pages.
