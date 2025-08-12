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

$openEditURI = '/php_projects/budget-tracker-app/edit_transaction.php?id=';
$postForm = '/php_projects/budget-tracker-app/edit_transaction.php';

$uri = parse_url($_SERVER['REQUEST_URI']);

if ($uri['path'] === '/edit_transaction.php' && isset($uri['query'])) {
    $transactionId = $_GET['id'];
    $transactionToEdit = getTransactionToEdit($transactions, $transactionId);
    require VIEWS_PATH . 'edit_transaction.view.php';
}

if ($uri['path'] === '/edit_transaction.php' && !isset($uri['query'])) {
    $editedTransaction = formatTransaction($_POST);
    updateTransactions($transactions, $editedTransaction);
    storeAllTransactions($transactions, DATA_PATH . 'transactions.csv');
    require VIEWS_PATH . 'success_edit.view.php';
}
