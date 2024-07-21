<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Student Management System</h1>
        <nav>
            <ul>
                <li><a href="form.html">Add Student</a></li>
                <li><a href="display.php">View Students</a></li>
            </ul>
        </nav>
        <?php
        if (isset($_GET['message'])) {
            echo "<p class='message'>" . htmlspecialchars($_GET['message']) . "</p>";
        }
        ?>
    </div>
</body>
</html>
