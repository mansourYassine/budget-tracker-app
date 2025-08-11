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

$titleName = 'Add Transaction';
$sideBarButtonPageName = [
    'class' => 'all-transactions',
    'path' => 'all_transactions',
    'title' => 'All Transactions'
];

require VIEWS_PATH . 'add_transaction.view.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formattedTransaction = formatTransaction($_POST);

    // add id of the transaction
    if (count($transactions) === 0) {
        $formattedTransaction = ['id' => 1] + $formattedTransaction;
    } else {
        $lastElementId = intval($transactions[array_key_last($transactions)]['id']);
        $formattedTransaction = ['id' => $lastElementId + 1] + $formattedTransaction;
    }

    array_push($transactions, $formattedTransaction);

    storeAllTransactions($transactions, DATA_PATH . 'transactions.csv');
    
    header("Location: add_transaction.php");
    exit();
}