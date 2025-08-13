<?php 

declare(strict_types = 1);

$transactionId = $_GET['id'];

deleteTransaction($transactions, $transactionId);

storeAllTransactions($transactions, DATA_PATH . 'transactions.csv');

require VIEWS_PATH . 'success_delete.view.php';

