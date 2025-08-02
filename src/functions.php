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
    [$date, $time, $description, $amount] = $transaction;

    return [
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
        $calculations['balance'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $calculations['totalIncome'] += $transaction['amount'];
        } else {
            $calculations['totalExpenses'] += $transaction['amount'];
        }
    }

    return $calculations;
}