<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <title>Add transaction</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php require(VIEWS_PATH . 'partials/header.php') ?>
    <section class="container-fluid mt-4">
        <div class="row">
            <section class="col-lg-8 d-flex flex-column align-items-center rounded-2" style="background-color: #f6f6f6ff;" id="form">
                <h1 class="display-5">Transaction Informations :</h1>
                <form class="w-50" action="add" method="post">
                    <div>
                        <span class="form-label fs-5">Transaction type :</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transaction-type" id="income" value="income" checked>
                            <label class="form-check-label" for="income">Income</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transaction-type" id="expense" value="expense">
                            <label class="form-check-label" for="expense">Expense</label>
                        </div>
                    </div>
    
                    <div class="amount">
                        <label class="form-label fs-5" for="amount">Amount :</label>
                        <input class="form-control" type="number" min="0" step="any" value="0" name="amount" id="amount" required>
                    </div>
        
                    <div class="description">
                        <label class="form-label fs-5" for="description">Description :</label>
                        <input class="form-control" type="text" name="description" id="description">
                    </div>
        
                    <div class="date-time">
                        <label class="form-label fs-5" for="date-time">Date and time :</label>
                        <input class="form-control" type="datetime-local" name="date-time" id="date-time" required>
                    </div>
                    <div class="my-4 d-flex justify-content-between mx-4" id="submit-reset">
                        <input class="btn btn-success" type="submit" value="Add Transaction">
                        <input class="btn btn-warning" type="reset" value="Empty the form">
                    </div>
                </form>
            </section>
            <?php require(VIEWS_PATH . 'partials/sidebar.php') ?>
        </div>
    </section>
    <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>