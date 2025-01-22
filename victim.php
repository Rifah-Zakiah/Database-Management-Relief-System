<?php 
    include("db_dmrs.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victim info</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="home.php">Go back to home</a>
    <!-- <a href="search_victim.php">Search victims</a>
    <a href="involves.php">See involvement</a> -->
    <h3>Please provide the following information:</h3>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <!-- <label for="id">ID:</label><br>
        <input type="number" name="id" required><br><br> -->

        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" required><br><br>

        <label for="phone_no">Phone Number:</label><br>
        <input type="text" name="phone_no" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="nid">NID:</label><br>
        <input type="text" name="nid"><br><br>

        <label for="occupation">Occupation:</label><br>
        <input type="text" name="occupation"><br><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" name="dob"><br><br>

        <label for="current_location">Current Location:</label><br>
        <input type="text" name="current_location"><br><br>

        <label for="requirement">Requirement:</label><br>
        <input type="text" name="requirement"><br><br>

        <label for="blood_group">Blood Group:</label><br>
        <input type="text" name="blood_group"><br><br>

        <label for="allergy">Allergy:</label><br>
        <input type="text" name="allergy"><br><br>

        <label for="chronic_disease">Chronic Disease:</label><br>
        <input type="text" name="chronic_disease"><br><br>

        <label for="medical_info">Medical Info:</label><br>
        <textarea name="medical_info" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Submit</button><br>
        <a href="show_victim.php">Victim Table</a>
        <a href="help.php">Back</a>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);empty($id)||
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $phone_no = filter_input(INPUT_POST, "phone_no", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $nid = filter_input(INPUT_POST, "nid", FILTER_SANITIZE_SPECIAL_CHARS);
        $occupation = filter_input(INPUT_POST, "occupation", FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_SPECIAL_CHARS);
        $current_location = filter_input(INPUT_POST, "current_location", FILTER_SANITIZE_SPECIAL_CHARS);
        $requirement = filter_input(INPUT_POST, "requirement", FILTER_SANITIZE_SPECIAL_CHARS);
        $medical_info = filter_input(INPUT_POST, "medical_info", FILTER_SANITIZE_SPECIAL_CHARS);
        $blood_group = filter_input(INPUT_POST, "blood_group", FILTER_SANITIZE_SPECIAL_CHARS);
        $allergy = filter_input(INPUT_POST, "allergy", FILTER_SANITIZE_SPECIAL_CHARS);
        $chronic_disease = filter_input(INPUT_POST, "chronic_disease", FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($name)||empty($address)||empty($phone_no)) {
        echo"Please enter data";
    }else {
        $sql = "INSERT INTO Victim (name, address, phone_no, email, nid, occupation, dob, current_location, requirement, medical_info, blood_group, allergy, chronic_disease)
            VALUES ('$name', '$address', '$phone_no', '$email', '$nid', '$occupation', '$dob', '$current_location', '$requirement', '$medical_info', '$blood_group', '$allergy', '$chronic_disease')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    

    mysqli_close($conn);
?>
