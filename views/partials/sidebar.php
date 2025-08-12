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
</aside>
    