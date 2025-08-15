<?php 

declare(strict_types = 1);

$root = dirname(__FILE__) . DIRECTORY_SEPARATOR;
define('APP_PATH' , $root . 'src' . DIRECTORY_SEPARATOR);
define('DATA_PATH' , $root . 'ressources' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH' , $root . 'views' . DIRECTORY_SEPARATOR);

require (APP_PATH . 'functions.php');

$files = getFiles(DATA_PATH);

$transactions = [];
foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransactionFromCsvLine'));
}

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