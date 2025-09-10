<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/includes/auth.php';

$tot_customers = $pdo->query("SELECT COUNT(*) c FROM customers")->fetch()['c'] ?? 0;
$tot_accounts = $pdo->query("SELECT COUNT(*) c FROM accounts")->fetch()['c'] ?? 0;
$tot_loans = $pdo->query("SELECT COUNT(*) c FROM loans")->fetch()['c'] ?? 0;
$tot_txn = $pdo->query("SELECT COUNT(*) c FROM transactions")->fetch()['c'] ?? 0;
?>
<?php include __DIR__ . '/includes/header.php'; ?>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #000; /* Solid black background */
    color: #fff;
}
.dashboard-container {
    padding: 30px;
    text-align: center;
}
h2 {
    font-size: 36px;
    margin-bottom: 40px;
    color: #00eaff;
    text-shadow: 0 0 15px #00eaff, 0 0 30px #0077aa;
}
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}
.card {
    background: rgba(0, 0, 40, 0.75);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 0 15px rgba(0, 234, 255, 0.6);
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 0 25px #00eaff, 0 0 40px #0088cc;
}
.card h3 {
    font-size: 22px;
    margin-bottom: 15px;
    color: #00eaff;
    text-shadow: 0 0 8px #00eaff;
}
.stat {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #a8faff;
    text-shadow: 0 0 10px #00eaff;
}
.btn-small {
    display: inline-block;
    padding: 10px 20px;
    background: linear-gradient(135deg, #00eaff, #0088cc);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.3s, box-shadow 0.3s;
    text-shadow: 0 0 5px #00eaff;
    box-shadow: 0 0 10px #00eaff;
}
.btn-small:hover {
    background: linear-gradient(135deg, #0088cc, #00eaff);
    box-shadow: 0 0 20px #00eaff, 0 0 40px #0088cc;
}
.small {
    font-size: 14px;
    color: #ccefff;
}
</style>

<div class="dashboard-container">
    <h2>🏦 Bank Management Dashboard</h2>
    <div class="grid">
        <div class="card">
            <h3>Customers</h3>
            <div class="stat"><?php echo $tot_customers; ?></div>
            <a class="btn-small" href="customers/list.php">Manage</a>
        </div>
        <div class="card">
            <h3>Accounts</h3>
            <div class="stat"><?php echo $tot_accounts; ?></div>
            <a class="btn-small" href="accounts/list.php">Manage</a>
        </div>
        <div class="card">
            <h3>Loans</h3>
            <div class="stat"><?php echo $tot_loans; ?></div>
            <a class="btn-small" href="loans/list.php">Manage</a>
        </div>
        <div class="card">
            <h3>Transactions</h3>
            <div class="stat"><?php echo $tot_txn; ?></div>
            <a class="btn-small" href="transactions/list.php">View</a>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p class="small">Quick exports & summaries.</p>
            <a class="btn-small" href="admin/reports.php">Open</a>
        </div>
        <div class="card">
            <h3>Users</h3>
            <p class="small">Admin & staff management.</p>
            <a class="btn-small" href="admin/users.php">Open</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
