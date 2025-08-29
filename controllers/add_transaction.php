<?php 

declare(strict_types = 1);

require VIEWS_PATH . 'add_transaction.view.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formattedTransaction = formatTransaction($_POST);

    $connect = mysqli_connect('localhost', 'yassine', 'test1234', 'budget_tracker_db');
    $sql = "
        INSERT INTO transactions(date,time,description,amount) 
        VALUES('{$formattedTransaction['date']}', '{$formattedTransaction['time']}', '{$formattedTransaction['description']}', '{$formattedTransaction['amount']}')
    ";
    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header("Location: /");
    exit();
}