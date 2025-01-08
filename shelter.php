<?php 
    include("db_dmrs.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Details</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <a href="search_shelter.php">Search in Shelter Table</a><br>
    <a href="view_seeks.php">See victims in shelter</a><br>
    <h1>Insert Shelter Details</h1>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <!-- <label for="id">Shelter ID:</label><br>
            <input type="number" name="id" required><br><br> -->
            
            <label for="name">Shelter Name:</label><br>
            <input type="text" name="name" required><br><br>
            
            <label for="location">Location:</label><br>
            <input type="text" name="location" required><br><br>
            
            <label for="status">Status:</label><br>
            <input type="text" name="status" required><br><br>
            
            <button type="submit">Submit</button><br>
        </form>
        <a href="show_shelter.php">Shelter Table</a><br>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS); empty($id)||
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $location = filter_input(INPUT_POST, "location", FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_SPECIAL_CHARS);
    }

        
    if (empty($name)||empty($location)||empty($status)) {
        echo"Please enter data";
    }else {
        $sql = "INSERT INTO Shelter (name, location, status)
                VALUES ('$name', '$location', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }

        // Close connection
        mysqli_close($conn);
?>
