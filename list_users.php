<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Layout</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Header</h1>
    </header>
    <?php include 'navbar.php'; ?>
    <main>


        <h2>List of users</h2>
        <p>This is where your main content goes.</p>


        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User email</th>
                    <th scope="col">Encypted Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php

                include('database_inc.php');

                $result = mysqli_query(
                    $connect,
                    "SELECT * FROM users;"
                );

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>Edit this user</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
