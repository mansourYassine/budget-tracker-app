<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="views/styles/add_style.css">
    <title>Add transaction</title>
</head>

<body>
    <div class="container">

        <?php require(VIEWS_PATH . 'partials/header.php') ?>
    
        <main>
            <h1>Transaction Informations :</h1>
            <form action="add_transaction.php" method="post">
                <div class="transaction-type">
                    <span>Transaction type :</span>
                    <div>
                        <input type="radio" name="transaction-type" id="income" value="income" checked>
                        <label for="income">Income</label>
                        <input type="radio" name="transaction-type" id="expense" value="expense">
                        <label for="expense">Expense</label>
                    </div>
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
                <a href="./all_transactions.php">
                    All transactions
                </a>
            </div>
        </aside>
    
        <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    </div>
</body>
</html>