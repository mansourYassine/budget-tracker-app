<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../views/styles/edit_style.css">
    <title>Edit transaction</title>
</head>

<body>
    <div class="container">
        <?php require(VIEWS_PATH . 'partials/header.php') ?>
    
        <main>
            <h1>Edit Page :</h1>
            <form action="edit" method="post">
                <input type="hidden" name="id" value="<?=$transactionToEdit['id']?>">
                <div class="transaction-type">
                    <span>Transaction type :</span>
                    <div>
                        <?php if ($transactionToEdit['amount'] >= 0) :?>
                            <input type="radio" name="transaction-type" id="income" value="income" checked>
                            <label for="income">Income</label>
                            <input type="radio" name="transaction-type" id="expense" value="expense">
                            <label for="expense">Expense</label>
                        <?php else :?>
                            <input type="radio" name="transaction-type" id="income" value="income">
                            <label for="income">Income</label>
                            <input type="radio" name="transaction-type" id="expense" value="expense" checked>
                            <label for="expense">Expense</label>
                        <?php endif?>
                    </div>
                </div>
    
                <div class="amount">
                    <label for="amount">Amount :</label>
                    <input type="number" min="0" step="any" value="<?=abs($transactionToEdit['amount'])?>" name="amount" id="amount" required>
                </div>
    
                <div class="description">
                    <label for="description">Description :</label>
                    <input type="text" name="description" value="<?=$transactionToEdit['description']?>" id="description">
                </div>
    
                <div class="date-time">
                    <label for="date-time">Date and time :</label>
                    <input type="datetime-local" name="date-time" value="<?=str_replace('/', '-', $transactionToEdit['date']) . 'T' . $transactionToEdit['time'];?>" id="date-time" required>
                </div>
                
                <div class="submit-reset">
                    <input type="submit" value="Save">
                </div>
            </form>
        </main>
        <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    </div>
</body>
</html>