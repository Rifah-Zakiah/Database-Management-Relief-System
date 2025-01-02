<?php 
    include("db_dmrs.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seek Shelter</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <h1>Enter ID to Seek Shelter</h1>
    <form method="POST" action="">
        <label for="victim_id">Victim ID:</label>
        <input type="number" id="victim_id" name="victim_id" required>
        <label for="shelter_id">Shelter ID:</label>
        <input type="number" id="shelter_id" name="shelter_id" required>
        <button type="submit">Add Record</button>
    </form><br>
    <a href="victim.php">Go Back</a><br>
    <a href="view_seeks.php">See Table</a>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $victim_id = filter_input(INPUT_POST, "victim_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $shelter_id = filter_input(INPUT_POST, "shelter_id", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (empty($victim_id)||empty($shelter_id)) {
            echo"Please enter data";
        }else {
            $sql = "INSERT INTO Seeks (victim_id, shelter_id) 
                    VALUES ('$victim_id', '$shelter_id')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $conn->close();
?>