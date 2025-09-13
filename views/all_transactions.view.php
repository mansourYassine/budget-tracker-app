<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
        <title>All transactions</title>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <?php require(VIEWS_PATH . 'partials/header.php') ?>
        <section class="container-fluid mt-4">
            <div class="row">
                <section class="col-lg-8" id="table">
                    <div class="container-fluid">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="fw-semibold">Date</th>
                                    <th class="fw-semibold">Description</th>
                                    <th class="fw-semibold">Income</th>
                                    <th class="fw-semibold">Expenses</th>
                                    <th class="fw-semibold">Edit</th>
                                    <th class="fw-semibold">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transactions as $transaction) :?>
                                    <tr>
                                        <td><?= $transaction['date'] . ' ' . $transaction['time']?></td>
                                        <td><?= $transaction['description'] ?></td>
                                        <?php if ((float)$transaction['amount'] >= 0) :?>
                                            <td>
                                                <div class="text-success">
                                                    <?= number_format((float)$transaction['amount'], 2, '.', ',') ?> DH
                                                </div>
                                            </td>
                                            <td></td>
                                        <?php else : ?>
                                            <td></td>
                                            <td>
                                                <div class="text-danger">
                                                    <?= number_format((float)$transaction['amount'], 2, '.', ',') ?> DH
                                                </div>
                                            </td>
                                        <?php endif ?>
                                        <td>
                                            <div>
                                                <a class="btn btn-outline-success" href="/edit?id=<?=$transaction['id']?>">Edit</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <a class="btn btn-outline-danger" href="/delete?id=<?=$transaction['id']?>">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <?php require(VIEWS_PATH . 'partials/sidebar.php') ?>
            </div>
        </section>
        <?php require(VIEWS_PATH . 'partials/footer.php') ?>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>