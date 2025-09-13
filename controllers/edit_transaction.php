<?php 

declare(strict_types = 1);

if (isset($uri['query'])) {// before edit
    $transactionId = $_GET['id'];
    $transactionToEdit = getTransactionToEdit($transactions, $transactionId);
    require VIEWS_PATH . 'edit_transaction.view.php';
} elseif (!isset($uri['query'])) {// after edit
    $editedTransaction = formatTransaction($_POST);

    $connect = mysqli_connect('localhost', 'yassine', 'test1234', 'budget_tracker_db');
    $sql = "
        UPDATE transactions
        SET date = '{$editedTransaction['date']}',
            time = '{$editedTransaction['time']}',
            description = '{$editedTransaction['description']}',
            amount = '{$editedTransaction['amount']}'
        WHERE id = '{$editedTransaction['id']}';
    ";

    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header('Location: /');
    // require VIEWS_PATH . 'success_edit.view.php';
}
