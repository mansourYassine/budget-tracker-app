<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
</head>
<body>
    <main>
        <form action="add_transaction.php" method="post">
            <div class="transaction-type">
                <span>Transaction type :</span>
                <input type="radio" name="transaction-type" id="income" value="income" checked>
                <label for="income">Income</label>
                <input type="radio" name="transaction-type" id="expense" value="expense">
                <label for="expense">Expense</label>
            </div>

            <div class="amount">
                <label for="amount">Amount :</label>
                <input type="number" min="0" step="any" value="0" name="amount" id="amount" required>
            </div>

            <div class="description">
                <label for="description">Description :</label>
                <input type="text" name="description" id="description">
            </div>

            <div class="date-time">
                <label for="date-time">Date and time :</label>
                <input type="datetime-local" name="date-time" id="date-time" required>
            </div>
            <div class="submit-reset">
                <input type="submit" value="Add Transaction">
                <input type="reset" value="Empty the form">
            </div>
        </form>
    </main>

    <aside>
        <div class="balance">
            <h2>Balance : <span><?= number_format($calculations['balance'], 2, ',', '.') ?> DH</span></h2>
        </div>
        <div class="total-income">
            <h2>Total Income : <span><?= number_format($calculations['totalIncome'], 2, ',', '.') ?> DH</span></h2>
        </div>
        <div class="total-expenses">
            <h2>Total Expenses : <span><?= number_format($calculations['totalExpenses'], 2, ',', '.') ?> DH</span></h2>
        </div>
        <div class="all-transactions-button">
            <a href="./all_transactions.php">
                All Transactions
            </a>
        </div>
    </aside>
</body>
</html>