<?php 
    include("db_dmrs.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Info</title>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <a href="search_volunteer.php">Search Volunteers</a><br>
    <a href="collects.php">Already registered? Collect Relief</a><br>
    <a href="involves.php">See involvement</a><br>
    <h3>Volunteer Registration</h3><br>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="number" name="id" required><br><br>

        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" required><br><br>

        <label for="phone_no">Phone Number:</label><br>
        <input type="text" name="phone_no" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="occupation">Occupation:</label><br>
        <input type="text" name="occupation"><br><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" name="dob"><br><br>

        <label for="assigned_location">Assigned Location:</label><br>
        <input type="text" name="assigned_location"><br><br>

        <label for="blood_group">Blood Group:</label><br>
        <input type="text" name="blood_group"><br><br>

        <label for="allergy">Allergy:</label><br>
        <input type="text" name="allergy"><br><br>

        <label for="chronic_disease">Chronic Disease:</label><br>
        <input type="text" name="chronic_disease"><br><br>

        <label for="medical_info">Medical Info:</label><br>
        <textarea name="medical_info" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit"><br>
        <a href="show_volunteer.php">Volunteer Table</a><br>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $phone_no = filter_input(INPUT_POST, "phone_no", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $occupation = filter_input(INPUT_POST, "occupation", FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_SPECIAL_CHARS);
        $assigned_location = filter_input(INPUT_POST, "assigned_location", FILTER_SANITIZE_SPECIAL_CHARS);
        $medical_info = filter_input(INPUT_POST, "medical_info", FILTER_SANITIZE_SPECIAL_CHARS);
        $blood_group = filter_input(INPUT_POST, "blood_group", FILTER_SANITIZE_SPECIAL_CHARS);
        $allergy = filter_input(INPUT_POST, "allergy", FILTER_SANITIZE_SPECIAL_CHARS);
        $chronic_disease = filter_input(INPUT_POST, "chronic_disease", FILTER_SANITIZE_SPECIAL_CHARS);
    }

    
    if (empty($id)||empty($name)||empty($address)||empty($phone_no)) {
        echo"Please enter data";
    }else {
        $sql = "INSERT INTO Volunteer (id, name, address, phone_no, email, occupation, dob, assigned_location, medical_info, blood_group, allergy, chronic_disease)
            VALUES ('$id', '$name', '$address', '$phone_no', '$email', '$occupation', '$dob', '$assigned_location', '$medical_info', '$blood_group', '$allergy', '$chronic_disease')";
    
    if ($conn->query($sql) === TRUE) {
        echo "You are now registered!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully.";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    // try {
    //     mysqli_query($conn, $sql);
    //     echo"You are now registered!";
    // } catch (mysqli_sql_exception) {
    //     echo"That username is taken";
    // }

    mysqli_close($conn);
?>