<?php 
    include("db_dmrs.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seek Shelter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="home.php">Go back to home</a>
    <a href="show_shelter.php">See Shelter Details</a>
    <h1>Enter ID to Seek Shelter</h1>
    <form method="POST" action="">
        <label for="victim_id">Victim ID:</label>
        <input type="number" id="victim_id" name="victim_id" required><br><br>
        <label for="shelter_id">Shelter ID:</label>
        <input type="number" id="shelter_id" name="shelter_id" required><br><br>
        <label for="checkin_date">Check-in date:</label><br>
        <input type="date" name="checkin_date"><br><br>
        <label for="checkout_date">Check-out date:</label><br>
        <input type="date" name="checkout_date"><br><br>
        <button type="submit">Submit</button>
    </form><br>
    <a href="help.php">Go Back</a>
    <a href="view_seeks.php">See engagement</a>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $victim_id = filter_input(INPUT_POST, "victim_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $shelter_id = filter_input(INPUT_POST, "shelter_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $checkin_date = filter_input(INPUT_POST, "checkin_date", FILTER_SANITIZE_SPECIAL_CHARS);
        $checkout_date = filter_input(INPUT_POST, "checkout_date", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (empty($victim_id)||empty($shelter_id)) {
            echo"Please enter data";
        }else {
            $sql = "INSERT INTO Seeks (victim_id, shelter_id, checkin_date, checkout_date) 
                    VALUES ('$victim_id', '$shelter_id', '$checkin_date', '$checkout_date')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $conn->close();
?>
