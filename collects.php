<?php 
    include("db_dmrs.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enter IDs to Collect Relief</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <h1>Insert into Collects Table</h1>
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label for="volunteer_id">Volunteer ID:</label>
        <input type="number" id="volunteer_id" name="volunteer_id" required>
        <label for="relief_id">Relief ID:</label>
        <input type="number" id="relief_id" name="relief_id" required>
        <button type="submit">Add Record</button>
    </form><br>
    <a href="view_collects.php">See Table</a><br>
    <br>
    <a href="volunteer.php">Go Back to Register as Volunter</a><br>
    <a href="relief.php">Go Back to see Relief Details</a><br>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $volunteer_id = filter_input(INPUT_POST, "volunteer_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $relief_id = filter_input(INPUT_POST, "relief_id", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (empty($volunteer_id)||empty($relief_id)) {
            echo"Please enter data";
        }else {
            $sql = "INSERT INTO Collects (volunteer_id, relief_id) 
                    VALUES ('$volunteer_id', '$relief_id')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $conn->close();
?>