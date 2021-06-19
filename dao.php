<?php

require 'flight/Flight.php';

if (getenv('HEROKU')) {
    $username =  getenv('USERNAME');
    $password = getenv('PASSWORD');
    $dbname = getenv('DBNAME');

    $host="sql11.freemysqlhosting.net";
} else {
    $username =  "root";
    $password = "rootroot";
    $dbname = "shopping_cart";

    $host="localhost";
}



Flight::register("db", "PDO", array("mysql:host=$host;dbname=$dbname", $username, $password), function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});




// list all the products in the products table
Flight::route('GET /list-products', function () {
    $db =	Flight::db();
    $g = $db->query("SELECT * FROM products");


    while ($row = $g->fetch(PDO::FETCH_ASSOC)) {
        $ar[] = $row;
    }

    Flight::json($ar);
});


// add item to cart
Flight::route("POST /order", function () {
    $db = Flight::db();
    $request = Flight::request();
    //get post data
    $name = $request->data->name;
    $price = $request->data->price;
    $quantity = $request->data->quantity;

    $d = $db->prepare("INSERT INTO cart(name,price,quantity) VALUES (?,?,?)");
    $ch = $d->execute([$name, $price, $quantity]);

    if ($ch) {
        echo "yes";
    }
});


//return number of items in user cart
Flight::route("GET /my-cart", function () {
    $db = Flight::db();

    $d = $db->query("SELECT * FROM cart");

    while ($r = $d->fetch()) {
        $num[] = $r;
    }

    $n = "0";
    if (! empty($num)) {
        $n = count($num);
    } //get numbers of item
    unset($num); //free memory
    echo $n;
});


// list all the items in user's cart
Flight::route('GET /my-cart-items', function () {
    $db =	Flight::db();
    $g = $db->query("SELECT * FROM cart");


    while ($row = $g->fetch(PDO::FETCH_ASSOC)) {
        $ar[] = $row;
    }

    Flight::json($ar);
});


//delete Item from cart
Flight::route("GET /delete-item/@id", function ($id) {
    $db = Flight::db();
    $s = $db->prepare("DELETE FROM cart where id = ?");
    $s->execute([$id]);
});


// checkout
Flight::route("POST /checkout", function () {
    $db = Flight::db();
    $request = Flight::request();
    //get post data
    $name = $request->data->name;
    $mail = $request->data->mail;
    $add = $request->data->address;
    $goods = $request->data->goods;
    $price = $request->data->price;

    $d = $db->prepare("INSERT INTO orders(name,mail,address,goods,price) VALUES (?,?,?,?,?)");
    $ch = $d->execute([$name, $mail, $add, $goods, $price]);

    $db->query("DELETE FROM cart ");
});


//get total price
Flight::route("GET /total-price", function () {
    $db = Flight::db();
    $s = $db->query("SELECT * from cart");
    $p = 0;
    while ($d = $s->fetch(PDO::FETCH_ASSOC)) {
        $p += $d["price"] * $d["quantity"];
    }
    echo $p;
});


//checkout receipt
Flight::route("GET /receipt", function () {
    $db = Flight::db();
    $s = $db->query("SELECT *  from orders ORDER BY ID DESC LIMIT 1");
    $d = $s->fetch(PDO::FETCH_ASSOC);
    Flight::json($d);
});




//admin login
Flight::route("POST /admin-login", function () {
    $re = Flight::request();

    $uname = $re->data->username;
    $pass = $re->data->password;


    if ($uname == "ajla" & $pass == "ajla123") {
        $n = 1;
    } else {
        $n = 0;
    }


    echo $n;
});


//admin
Flight::route("GET /admin", function () {
    $db = Flight::db();
    $q = $db->query("SELECT * FROM orders");

    $orders = [];
    while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
        $orders[] = $row;
    }

    if (count($orders) == 0) {
        echo "no";
    } else {
        echo json_encode($orders);
    }
});


//delete order by admin
Flight::route("POST /delete-order/@id", function ($id) {
    $db = Flight::db();
    $s = $db->prepare("DELETE FROM orders where id = ?");
    $s->execute([$id]);
});



Flight::start();
