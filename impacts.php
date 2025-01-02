<?php
    include("db_dmrs.php");

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $disaster_id = filter_input(INPUT_POST, "disaster_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $victim_id = filter_input(INPUT_POST, "victim_id", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (empty($disaster_id)||empty($victim_id)) {
            echo"Please enter data";
        }else {
            $sql = "INSERT INTO Impacts (disaster_id, victim_id) VALUES ('$disaster_id', '$victim_id')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Disaster Impacting Victims</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <h1>Enter Disaster Impacting Victims</h1>
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label for="disaster_id">Disaster ID:</label>
        <input type="number" id="disaster_id" name="disaster_id" required>
        <label for="victim_id">Victim ID:</label>
        <input type="number" id="victim_id" name="victim_id" required>
        <button type="submit">Add Record</button>
    </form>
    <a href="view_impacts.php">See Table</a><br>
    <a href="disaster.php">Go to add or see Disaster Details</a><br>
    <a href="victim.php">Go to add or see Victim Details</a><br>
</body>
</html>
