<?php 
declare(strict_types = 1);

function getFiles(string $filesPath) : array {
    $files = [];
    foreach (scandir($filesPath) as $file) {
        $files[] = $filesPath . $file;
    }
    array_splice($files, 0, 2);
    
    return $files;
}

function getTransactions($fileName, ?callable $transactionsHandler = null) : array {
    $file = fopen($fileName, 'r');
    $transactions = [];
    fgetcsv($file);
    while (($transaction = fgetcsv($file)) !== FALSE) {
        $transactions[] = $transactionsHandler($transaction);
    }

    return $transactions;
}

function extractTransactionFromCsvLine(array $transaction) : array {
    [$id, $date, $time, $description, $amount] = $transaction;

    return [
        'id' => $id,
        'date' => $date,
        'time' => $time,
        'description' => $description,
        'amount' => (float) $amount
    ];
}

function calculateTotalsAndBalance($transactions) : array{
    $calculations = [
        'balance'=> 0,
        'totalIncome' => 0,
        'totalExpenses' => 0
    ];

    foreach ($transactions as $transaction) {
        $calculations['balance'] += round($transaction['amount'], 2);

        if ($transaction['amount'] >= 0) {
            $calculations['totalIncome'] += round($transaction['amount'], 2);
        } else {
            $calculations['totalExpenses'] += round($transaction['amount'], 2);
        }
    }

    return $calculations;
}

function formatTransaction(array $postTransaction) : array {
    $formattedTransaction = [];
    // format id
    if (array_key_exists('id', $postTransaction)) {
        $formattedTransaction['id'] = $postTransaction['id'];
    }

    /// format date and time
    $formattedTransaction['date'] = str_replace('-', '/', substr($postTransaction['date-time'], 0, 10));
    $formattedTransaction['time'] = substr($postTransaction['date-time'], -5);
    
    // format description
    $formattedTransaction['description'] = $postTransaction['description'];

    // format amount
    if (strcmp($postTransaction['transaction-type'], 'expense')) {
        $formattedTransaction['amount'] =  floatval($postTransaction['amount']);
    } elseif (strcmp($postTransaction['transaction-type'], 'income')) {
        $formattedTransaction['amount'] = -floatval($postTransaction['amount']);
    }

    return $formattedTransaction;
}

function storeTransaction(array $transaction, string $db_file) {
    $file = fopen($db_file, 'a');
    fputcsv($file, $transaction);
    fclose($file);
}

function getTransactionToEdit(array $transactions, string $transactionId) : array|null {
    foreach ($transactions as $transaction) {
        if (strcmp($transaction['id'], $transactionId) === 0) {
            $transactionToEdit = $transaction;
            break;
        }
    }

    if (isset($transactionToEdit)) {
        return $transactionToEdit;
    } else {
        return null;
    }
}

function updateTransactions(array &$transactions, array $editedTransaction){
    foreach ($transactions as $key => $transaction) {
        if (strcmp($transaction['id'], $editedTransaction['id']) === 0) {
            $transactions[$key] = $editedTransaction;
            break;
        }
    }
}
unset($transaction);

function deleteTransaction(array &$transactions, string $transactionId){
    foreach ($transactions as $key => $transaction) {
        if (strcmp($transaction['id'], $transactionId) === 0) {
            unset($transactions[$key]);
            break;
        }
    }
}
unset($transaction);

function storeAllTransactions(array $transactions, string $db_file) {
    $file = fopen($db_file, 'w');
    fputcsv($file, ['date', 'time', 'description', 'amount']);
    foreach ($transactions as $transaction) {
        fputcsv($file, $transaction);
    }
    fclose($file);
}