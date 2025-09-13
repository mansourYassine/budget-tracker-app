<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <title>Edit transaction</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php require(VIEWS_PATH . 'partials/header.php') ?>
    <section class="container-fluid mt-4">
        <div class="row">
            <section class="col-lg-8 d-flex flex-column align-items-center rounded-2" style="background-color: #f6f6f6ff;" id="form">
                <h1 class="display-5">Edit Transaction :</h1>

                <form class="w-50" action="edit" method="post">
                    <input type="hidden" name="id" value="<?=$transactionToEdit['id']?>">

                    <div>
                        <span class="form-label fs-5">Transaction Type :</span>
                        <?php if ($transactionToEdit['amount'] >= 0) :?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transaction-type" id="income" value="income" checked>
                                <label class="form-check-label" for="income">Income</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transaction-type" id="expense" value="expense">
                                <label class="form-check-label" for="expense">Expense</label>
                            </div>
                        <?php else :?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transaction-type" id="income" value="income">
                                <label class="form-check-label" for="income">Income</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transaction-type" id="expense" value="expense" checked>
                                <label class="form-check-label" for="expense">Expense</label>
                            </div>
                        <?php endif?>
                    </div>
                    
                    <div>
                        <label class="form-label fs-5" for="amount">Amount :</label>
                        <input class="form-control" type="number" min="0" step="any" value="<?=abs($transactionToEdit['amount'])?>" name="amount" id="amount" required>
                    </div>
        
                    <div>
                        <label class="form-label fs-5" for="description">Description :</label>
                        <input class="form-control" type="text" name="description" value="<?=$transactionToEdit['description']?>" id="description">
                    </div>
        
                    <div>
                        <label class="form-label fs-5" for="date-time">Date and time :</label>
                        <input class="form-control" type="datetime-local" name="date-time" value="<?=str_replace('/', '-', $transactionToEdit['date']) . 'T' . $transactionToEdit['time'];?>" id="date-time" required>
                    </div>
                    
                    <div class="my-4 d-flex justify-content-center">
                        <input class="btn btn-success px-5 fw-semibold fs-5" type="submit" value="Save">
                    </div>
                </form>
            </section>
        </div>
    </section>
    <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>