<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Transactions</title>
</head>

<body>
    <header>

    </header>
    <main>
        <section>
            <table border="1">
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
                                <td style="color: green"><?= number_format($transaction['amount'], 2, '.', ',') ?></td>
                                <td></td>
                            <?php else : ?>
                                <td></td>
                                <td style="color: red"><?= number_format($transaction['amount'], 2, '.', ',') ?></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </section>
        <aside>
            <div class="balance">
                <h2>Balance : <span><?= number_format($calculations['balance'], 2, '.', ',') ?> DH</span></h2>
            </div>
            <div class="total-income">
                <h2>Total Income : <span><?= number_format($calculations['totalIncome'], 2, '.', ',') ?> DH</span></h2>
            </div>
            <div class="total-expenses">
                <h2>Total Expenses : <span><?= number_format($calculations['totalExpenses'], 2, '.', ',') ?> DH</span></h2>
            </div>
            <div class="add-transaction-button">
                <a href="./add_transaction.php">
                    Add Transaction
                </a>
            </div>
        </aside>
    </main>
    <footer>

    </footer>
</body>

</html>