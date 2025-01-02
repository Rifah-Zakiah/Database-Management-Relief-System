<?php
    include("db_dmrs.php");

    // Initialize variables
    $victim_data = null;
    $error_message = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize the victim ID input
        $victim_id = mysqli_real_escape_string($conn, $_POST['victim_id']);

        // Query to fetch victim details
        $sql = "SELECT * FROM Victim WHERE id = '$victim_id'";
        $result = $conn->query($sql);

        // Check if a record is found
        if ($result->num_rows > 0) {
            $victim_data = $result->fetch_assoc();
        } else {
            $error_message = "No profile found for the provided ID.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victim Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 5px;
            width: 200px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 5px 10px;
        }
        .profile {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 50%;
        }
        .profile h3 {
            margin-top: 0;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h2>View Victim Profile</h2>

<!-- Input form for victim ID -->
<form method="POST" action="victim_profile.php">
    <label for="victim_id">Enter Your ID:</label>
    <input type="text" name="victim_id" id="victim_id" required>
    <input type="submit" value="View Profile">
</form>

<?php if (!empty($error_message)): ?>
    <p class="error"><?php echo $error_message; ?></p>
<?php endif; ?>

<?php if (!empty($victim_data)): ?>
    <!-- Display victim profile -->
    <div class="profile">
        <h3>Victim Profile</h3>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($victim_data['id']); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($victim_data['name']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($victim_data['address']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($victim_data['phone_no']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($victim_data['email']); ?></p>
        <p><strong>Occupation:</strong> <?php echo htmlspecialchars($victim_data['occupation']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($victim_data['dob']); ?></p>
        <p><strong>Current Location:</strong> <?php echo htmlspecialchars($victim_data['current_location']); ?></p>
        <p><strong>Requirement:</strong> <?php echo htmlspecialchars($victim_data['requirement']); ?></p>
        <p><strong>Medical Info:</strong> <?php echo htmlspecialchars($victim_data['medical_info']); ?></p>
        <p><strong>Blood Group:</strong> <?php echo htmlspecialchars($victim_data['blood_group']); ?></p>
        <p><strong>Allergy:</strong> <?php echo htmlspecialchars($victim_data['allergy']); ?></p>
        <p><strong>Chronic Disease:</strong> <?php echo htmlspecialchars($victim_data['chronic_disease']); ?></p>
    </div>
<?php endif; ?>
<a href="home.php">Go back to home</a><br>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
