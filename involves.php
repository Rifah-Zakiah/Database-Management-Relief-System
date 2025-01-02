<?php
    include("db_dmrs.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $volunteer_id = filter_input(INPUT_POST, "volunteer_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $relief_id = filter_input(INPUT_POST, "relief_id", FILTER_SANITIZE_SPECIAL_CHARS); 
        $victim_id = filter_input(INPUT_POST, "victim_id", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (empty($volunteer_id)||empty($victim_id)||empty($relief_id)) {
            echo"Please enter data";
        }else {
            $sql = "INSERT INTO Involves (volunteer_id, relief_id, victim_id) VALUES ('$volunteer_id', '$relief_id', '$volunteer_id')";
            
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
    <title>Involves</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <h1>Enter Involvement:</h1>
    <form method="POST" action="">
        <label for="volunteer_id">Volunteer ID:</label>
        <input type="number" id="volunteer_id" name="volunteer_id" required><br><br>
        <label for="relief_id">Relief ID:</label>
        <input type="number" id="relief_id" name="relief_id" required><br><br>
        <label for="victim_id">Victim ID:</label>
        <input type="number" id="victim_id" name="victim_id" required><br><br>
        <button type="submit">Add Record</button>
    </form><br>
    <a href="view_involves.php">See table</a><br>
    <a href="volunteer.php">Register as Volunteer</a><br>
    <a href="victim.php">Need assistance?</a><br>
    <a href="relief.php">Add info on Relief</a><br>
</body>
</html>
