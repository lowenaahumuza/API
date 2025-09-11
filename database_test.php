<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .success {
            color: #28a745;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .error {
            color: #dc3545;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Connection Test</h1>
        
        <?php
        try {
            // Database connection
            $database_path = __DIR__ . '/test_database.db';
            $pdo = new PDO('sqlite:' . $database_path);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Display success message
            echo '<div class="success">✅ Connection Successful!</div>';
            echo '<p><strong>Database:</strong> SQLite</p>';
            echo '<p><strong>Database File:</strong> ' . $database_path . '</p>';
            
            // Test query to fetch users
            $stmt = $pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Display the data in a table
            if (count($users) > 0) {
                echo '<h2>Users in Database:</h2>';
                echo '<table>';
                echo '<tr><th>ID</th><th>Name</th><th>Email</th></tr>';
                
                foreach ($users as $user) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($user['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($user['name']) . '</td>';
                    echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                    echo '</tr>';
                }
                
                echo '</table>';
                echo '<p><strong>Total records:</strong> ' . count($users) . '</p>';
            } else {
                echo '<p>No users found in the database.</p>';
            }
            
            // Close connection
            $pdo = null;
            
        } catch (PDOException $e) {
            echo '<div class="error">❌ Connection Failed!</div>';
            echo '<p><strong>Error:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
        ?>
        
        <hr style="margin: 30px 0;">
        <p><em>This page demonstrates a successful PHP connection to a SQLite database.</em></p>
    </div>
</body>
</html>
