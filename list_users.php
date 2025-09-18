<?php
require_once 'conf.php'; 

try {
    // Create PDO connection 
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch users in ascending order by id
    $stmt = $pdo->query("SELECT name, email FROM usersli ORDER BY id ASC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Users - Task App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        ol {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Registered Users</h2>

<?php if ($users): ?>
    <ol>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user['name']); ?> (<?php echo htmlspecialchars($user['email']); ?>)</li>
        <?php endforeach; ?>
    </ol>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>

</body>
</html>
