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

if ($uri['path'] === '/') {
    require 'controllers/all_transactions.php';

} elseif ($uri['path'] === '/add') {
    require 'controllers/add_transaction.php';

} elseif ($uri['path'] === '/edit') {
    require 'controllers/edit_transaction.php';

} elseif ($uri['path'] === '/delete') {
    require 'controllers/delete_transaction.php';
}