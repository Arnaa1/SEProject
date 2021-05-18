# SEProject
Heroku URL: https://seproject-ajla-kenan.herokuapp.com/

You need to download database from github and start sql and apache server to run configuration.

Every flight route is working properly:
Flight::route 'GET /list-products' - lists all products from the database.
Flight::route "POST /order" - you can successfuly add orders with initialized atributes: name, price, quantity.
Flight::route "GET /my-cart" - fetches specific cart that has been made by user.
Flight::route 'GET /my-cart-items' - fetches and lists all items from specific cart.
Flight::route "GET /delete-item/@id" - selects specific item and removes it.
Flight::route "POST /checkout" - creates checkout page with atributes: name, mail, address, goods, price.
Flight::route "GET /total-price" - lists total price of a specific order.
Flight::route "GET /receipt" - lists receipt of a specific order from cart.
Flight::route "POST /admin-login" - lets you login with administrator credentials: username : ajla, password: ajla123.
Flight::route "GET /admin" - lists all administrator accounts.
Flight::route "POST /delete-order/@id" - this route lets only administrator deletes specific order by id.


Besides all functional routes, frontend is working properly as well. 
Pages that are functional are written in simple html code:
about.html
admin.html
cart.html
checkout.html
home.html
receipt.html
All pages are are included in file index.html

For this project we implemented bootstrap and used jquery library as well as single page app.

Project is supported by mobile version as well.
