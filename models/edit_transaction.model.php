<?php

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