<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student List</h1>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            $conn->query("DELETE FROM students WHERE id=$delete_id");
            $conn->query("SET @num := 0");
            $conn->query("UPDATE students SET id = @num := (@num+1)");
            $conn->query("ALTER TABLE students AUTO_INCREMENT = 1");
        }

        $sql = "SELECT id, name, age, grade FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Grade</th><th>Actions</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["grade"]."</td>";
                echo "<td><a href='display.php?delete_id=".$row["id"]."' class='button delete'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }

        $conn->close();
        ?>
        <a href="index.php" class="button back">Back</a>
    </div>
</body>
</html>
