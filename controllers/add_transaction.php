<?php 

declare(strict_types = 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require MODELS_PATH . 'add_transaction.model.php';
    header('Location: /');
    exit();
} else {
    require VIEWS_PATH . 'add_transaction.view.php';
}