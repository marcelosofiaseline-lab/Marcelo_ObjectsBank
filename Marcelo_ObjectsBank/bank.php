<?php
include 'classes/Account.php';
include 'classes/Customer.php';
include 'includes/header.php';

$accounts = [
    new Account("09131999", "Savings Account", 12500.75),
    new Account("05132010", "Checking Account", -2300.50),
    new Account("02052002", "Payroll Account", 8420.00),
    new Account("08142002", "Time Deposit", 50000.00)
];

$customer = new Customer("Sofia", "Marcelo", $accounts);
?>

<link rel="stylesheet" href="css/styles.css">

<section>
    <h2>NAME: <?php echo $customer->getFullName(); ?></h2>

    <table>
        <tr>
            <th>Account Number</th>
            <th>Type</th>
            <th>Balance</th>
        </tr>

        <?php foreach ($customer->accounts as $account): ?>
        <tr>
            <td><?php echo $account->accountNumber; ?></td>
            <td><?php echo $account->type; ?></td>

            <?php if ($account->balance >= 0): ?>
                <td class="credit">₱<?php echo number_format($account->balance, 2); ?></td>
            <?php else: ?>
                <td class="overdrawn">₱<?php echo number_format($account->balance, 2); ?></td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php include 'includes/footer.php'; ?>
