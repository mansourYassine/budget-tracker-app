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

$transactionId = $_GET['id'];

deleteTransaction($transactions, $transactionId);

storeAllTransactions($transactions, DATA_PATH . 'transactions.csv');

require VIEWS_PATH . 'success_delete.view.php';

