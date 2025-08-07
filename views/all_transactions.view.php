<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="views/styles/all_style.css">
    <title>All transactions</title>
</head>

<body>
    <div class="container">

        <?php require(VIEWS_PATH . 'partials/header.php') ?>
    
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Date</td>
                        <th>Description</td>
                        <th>Income</td>
                        <th>Expenses</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction) :?>
                        <tr>
                            <td><?= $transaction['date'] . ' ' . $transaction['time']?></td>
                            <td><?= $transaction['description'] ?></td>
                            <?php if ($transaction['amount'] >= 0) :?>
                                <td>
                                    <div style="color: green">
                                        <?= number_format($transaction['amount'], 2, '.', ',') ?> DH
                                    </div>
                                </td>
                                <td></td>
                            <?php else : ?>
                                <td></td>
                                <td>
                                    <div style="color: red">
                                        <?= number_format($transaction['amount'], 2, '.', ',') ?> DH
                                    </div>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </main>
    
        <aside>
            <div class="total-income">
                <p>Total Income :</p>
                <span><?= number_format($calculations['totalIncome'], 2, '.', ',') ?> DH</span>
            </div>
            
            <div class="total-expenses">
                <p>Total Expenses :</p>
                <span><?= number_format($calculations['totalExpenses'], 2, '.', ',') ?> DH</span>
            </div>
            
            <div class="balance">
                <p>Balance :</p>
                <span><?= number_format($calculations['balance'], 2, '.', ',') ?> DH</span>
            </div>
            
            <div class="sidebar-button">
                <a href="./add_transaction.php">
                    Add transaction
                </a>
            </div>
        </aside>
    
        <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    </div>
</body>
</html>