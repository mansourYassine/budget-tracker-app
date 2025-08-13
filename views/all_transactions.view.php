<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../views/styles/all_style.css">
    <title>All transactions</title>
</head>

<body>
    <div class="container">

        <?php require(VIEWS_PATH . 'partials/header.php') ?>
        <?php require(VIEWS_PATH . 'partials/nav.php') ?>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Income</th>
                        <th>Expenses</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                            <td>
                                <div class="edit-button">
                                    <form action="/edit">
                                        <input type="hidden" name="id" value="<?=$transaction['id']?>">
                                        <input type="submit" value="Edit">
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="delete-button">
                                    <form action="/delete">
                                        <input type="hidden" name="id" value="<?=$transaction['id']?>">
                                        <input type="submit" value="delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </main>
        <?php require(VIEWS_PATH . 'partials/sidebar.php') ?>
        <?php require(VIEWS_PATH . 'partials/footer.php') ?>
    </div>
</body>
</html>