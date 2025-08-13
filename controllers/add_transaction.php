<?php 

declare(strict_types = 1);

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