<?php 

declare(strict_types = 1);

$transactionId = $_GET['id'];

$connect = mysqli_connect('localhost', 'yassine', 'test1234', 'budget_tracker_db');
$sql = "
    DELETE FROM transactions
    WHERE id = $transactionId;
";

mysqli_query($connect, $sql);
mysqli_close($connect);

require VIEWS_PATH . 'success_delete.view.php';

