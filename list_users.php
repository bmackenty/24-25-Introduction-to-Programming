<!DOCTYPE html>
<html lang="en">
    <!-- This file should be named list_users.php -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of users</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <header>
            <h1>List of users</h1>
        </header>

        <?php include 'navbar.php'; ?>
        
        <main>
          <?php 
            include('database_inc.php'); 
            
            try {
                // Prepare the SQL query to fetch all users
                $stmt = $pdo->prepare('SELECT id, username, email FROM users');
                $stmt->execute();

                // Fetch the result as an associative array
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($users) > 0) {
                    echo '<h2>List of users</h2>';
                    echo '<table>';
                    echo '<tr><th>ID</th><th>Username</th><th>Email</th></tr>';

                    foreach ($users as $user) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($user['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['username']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo '<p>No users found.</p>';
                }

            } catch (PDOException $e) {
                echo '<p>Error fetching users: ' . $e->getMessage() . '</p>';
            }
          ?>

            <p>This is where your main content goes.</p>
        
        </main>

        <?php include('footer.php'); ?>
    </body>
</html>
