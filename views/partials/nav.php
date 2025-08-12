<nav>
    <ul>
        <li>
            <a href="/">All Transactions</a>
        </li>
        <li>
            <a href="/add_transaction.php">Add Transaction</a>
        </li>
    </ul>
</nav>

<style>
    nav {
        grid-area: nav;
        background-color: #bfc1bfff;
        height: 40px;
    }

    nav > ul {
        list-style-type: none;
        padding-left: 0;
        display: flex;
        align-items: center;
        height: 40px;
    }

    nav > ul > li {
        margin-left: 20px;
    }

    nav > ul > li > a {
        text-decoration: none;
        color: white;
        font-size: large;
        background-color: #17a0eaff;
        padding: 5px;
        border-radius: 5px;
    }
</style>