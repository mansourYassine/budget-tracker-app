<?php 

declare(strict_types = 1);

$root = dirname(__FILE__) . DIRECTORY_SEPARATOR;
define('APP_PATH' , $root . 'src' . DIRECTORY_SEPARATOR);
define('DATA_PATH' , $root . 'ressources' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH' , $root . 'views' . DIRECTORY_SEPARATOR);

require (APP_PATH . 'functions.php');

// getting transactions from the database
$connect = mysqli_connect('localhost', 'yassine', 'test1234', 'budget_tracker_db');
$sql = "SELECT * FROM transactions";
$result = mysqli_query($connect, $sql);
$transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($connect);

$calculations = calculateTotalsAndBalance($transactions);

$uri = parse_url($_SERVER['REQUEST_URI']);

$routes = [
    '/' => 'controllers/all_transactions.php',
    '/add' => 'controllers/add_transaction.php',
    '/edit' => 'controllers/edit_transaction.php',
    '/delete' => 'controllers/delete_transaction.php',
];

if (array_key_exists($uri['path'], $routes)) {
    require $routes[$uri['path']];
} else {
    abort();
}