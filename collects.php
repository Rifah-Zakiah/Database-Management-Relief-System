<?php 
    include("db_dmrs.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enter IDs to Collect Relief</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="home.php">Go back to home</a>
    <a href="show_relief.php">Relief Details</a>
    <h1>Insert into Collects Table</h1>
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label for="volunteer_id">Volunteer ID:</label>
        <input type="number" id="volunteer_id" name="volunteer_id" required><br><br>
        <label for="relief_id">Relief ID:</label>
        <input type="number" id="relief_id" name="relief_id" required><br><br>
        <label for="checkout_date">Collection date:</label>
        <input type="date" name="collection_date"><br><br>
        <label for="relief_destination">Relief Destination:</label>
        <input type="text" name="relief_destination" required><br><br>
        <button type="submit">Add Record</button>
    </form><br>
    <a href="view_collects.php">See Overall Collection</a>
    <a href="helping.php">Back</a>
    <!-- <a href="volunteer.php">Go Back to Register as Volunter</a><br>
    <a href="relief.php">Go Back to see Relief Details</a><br> -->
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $volunteer_id = filter_input(INPUT_POST, "volunteer_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $relief_id = filter_input(INPUT_POST, "relief_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $collection_date = filter_input(INPUT_POST, "collection_date", FILTER_SANITIZE_SPECIAL_CHARS);
        $relief_destination = filter_input(INPUT_POST, "relief_destination", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (empty($volunteer_id)||empty($relief_id)) {
            echo"Please enter data";
        }else {
            $sql = "INSERT INTO Collects (volunteer_id, relief_id, collection_date, relief_destination) 
                    VALUES ('$volunteer_id', '$relief_id', '$collection_date', 'relief_destination')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $conn->close();
?>
