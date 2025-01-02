<?php 
    include("db_dmrs.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disaster info</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <a href="search_disaster.php"> Search in Disaster Table </a><br>
    <a href="impacts.php">See disaster impacting victims</a><br>
    <h1>Insert Disaster Details</h1>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label for="id">Disaster ID:</label><br>
            <input type="number" name="id" required><br><br>
            
            <label for="name">Disaster Name:</label><br>
            <input type="text" name="name" required><br><br>
            
            <label for="region">Region:</label><br>
            <input type="text" name="region" required><br><br>
            
            <label for="severity">Severity (1-10):</label><br>
            <input type="number" name="severity" min="1" max="10" required><br><br>
            
            <button type="submit">Submit</button>
        </form>
        <a href="show_disaster.php">Disaster Table</a><br>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $region = filter_input(INPUT_POST, "region", FILTER_SANITIZE_SPECIAL_CHARS);
        $severity = filter_input(INPUT_POST, "severity", FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($id)||empty($name)||empty($region)||empty($severity)) {
        echo"Please enter data";
    }else {
        $sql = "INSERT INTO Disaster (id, name, region, severity)
            VALUES ('$id', '$name', '$region', '$severity')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
  
    mysqli_close($conn);
?>