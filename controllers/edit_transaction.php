<?php 

declare(strict_types = 1);


if (isset($uri['query'])) {// before edit
    $transactionId = $_GET['id'];
    $transactionToEdit = getTransactionToEdit($transactions, $transactionId);
    require VIEWS_PATH . 'edit_transaction.view.php';
} elseif (!isset($uri['query'])) {// after edit
    $editedTransaction = formatTransaction($_POST);
    updateTransactions($transactions, $editedTransaction);
    storeAllTransactions($transactions, DATA_PATH . 'transactions.csv');
    require VIEWS_PATH . 'success_edit.view.php';
}
