<?php 
    include("db_dmrs.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disaster info</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <a href="search_disaster.php"> Search Disaster Info </a>
    <h1>Insert Disaster Details</h1>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <!-- <label for="id">Disaster ID:</label><br>
            <input type="number" name="id" required><br><br> -->
            
            <label for="name">Disaster Name:</label><br>
            <input type="text" name="name" required><br><br>
            
            <label for="region">Region:</label><br>
            <input type="text" name="region" required><br><br>
            
            <label for="severity">Severity (1-10):</label><br>
            <input type="number" name="severity" min="1" max="10" required><br><br>

            <label for="start_date">Start date:</label><br>
            <input type="date" name="start_date"><br><br>

            <label for="end_date">End date:</label><br>
            <input type="date" name="end_date"><br><br>
            
            <button type="submit">Submit</button>
        </form>
        <a href="home.php">Go back to home</a>
        <a href="show_disaster.php">Disaster Info</a>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);empty($id)||
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $region = filter_input(INPUT_POST, "region", FILTER_SANITIZE_SPECIAL_CHARS);
        $severity = filter_input(INPUT_POST, "severity", FILTER_SANITIZE_SPECIAL_CHARS);
        $start_date = filter_input(INPUT_POST, "start_date", FILTER_SANITIZE_SPECIAL_CHARS);
        $end_date = filter_input(INPUT_POST, "end_date", FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($name)||empty($region)||empty($severity)) {
        echo"Please enter data";
    }else {
        $sql = "INSERT INTO Disaster (name, region, severity, start_date, end_date)
            VALUES ('$name', '$region', '$severity', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
  
    mysqli_close($conn);
?>
