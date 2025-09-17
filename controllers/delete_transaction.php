<?php 

declare(strict_types = 1);

$transactionId = $_GET['id'];
require MODELS_PATH . 'delete_transaction.model.php';
require VIEWS_PATH . 'success_delete.view.php';

