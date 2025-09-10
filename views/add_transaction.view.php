<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <title>Add transaction</title>
</head>

<body>
    <div class="container">

        <?php require(VIEWS_PATH . 'partials/header.php') ?>
        <?php require(VIEWS_PATH . 'partials/nav.php') ?>    
        <main>
            <h1>Transaction Informations :</h1>
            <form action="add" method="post">
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
        <?php require(VIEWS_PATH . 'partials/sidebar.php') ?>
        <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    </div>
</body>
</html>