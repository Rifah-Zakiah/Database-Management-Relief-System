<?php 
    include("db_dmrs.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relief</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <a href="collects.php">Collect Relief</a><br>
    <a href="involves.php">See involvement</a><br>
    <a href="search_relief.php">Search in Relief Table</a>
    <h1>Insert Relief Details</h1>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="id">Relief ID:</label><br>
        <input type="number" name="id" required><br><br>
        
        <label for="type">Relief Type:</label><br>
        <input type="text" name="type" required><br><br>
        
        <label for="quantity">Quantity:</label><br>
        <input type="text" name="quantity" required><br><br>
        
        <label for="location">Location:</label><br>
        <input type="text" name="location" required><br><br>
        
        <button type="submit">Submit</button><br>
        </form>
        <a href="show_relief.php">Relief Table</a><br>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_SPECIAL_CHARS);
        $quantity = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_SPECIAL_CHARS);
        $location = filter_input(INPUT_POST, "location", FILTER_SANITIZE_SPECIAL_CHARS);
    }
    // $sql = "INSERT INTO Relief (id, type, quantity, location)
    // VALUES ('$id', '$type', '$quantity', '$location')";

    // if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully.";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }    
        
    if (empty($id)||empty($type)||empty($quantity)||empty($location)) {
        echo"Please enter data";
    }else {
        $sql = "INSERT INTO Relief (id, type, quantity, location)
                VALUES ('$id', '$type', '$quantity', '$location')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

        // Close connection
        mysqli_close($conn);
?>