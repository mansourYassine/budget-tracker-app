<aside class="col-lg-4 mb-2">
    <div class="container-fluid">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <p class="mb-0 fw-semibold fs-5">Total Income :</p>
                    <span class="text-success fw-semibold fs-5"><?= number_format($calculations['totalIncome'], 2, '.', ',') ?> DH</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <p class="mb-0 fw-semibold fs-5">Total Expenses :</p>
                    <span class="text-danger fw-semibold fs-5"><?= number_format($calculations['totalExpenses'], 2, '.', ',') ?> DH</span>    
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <p class="mb-0 fw-semibold fs-5">Balance :</p>
                    <span class="text-primary fw-semibold fs-5"><?= number_format($calculations['balance'], 2, '.', ',') ?> DH</span>
                </li>
            </ul>
        </div>
    </div>
</aside>
    