<?php
// Database connection
$servername = "localhost"; // Your database server
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "db_dmrs";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$volunteer_data = null;
$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the volunteer ID input
    $volunteer_id = mysqli_real_escape_string($conn, $_POST['volunteer_id']);

    // Query to fetch volunteer details
    $sql = "SELECT * FROM Volunteer WHERE id = '$volunteer_id'";
    $result = $conn->query($sql);

    // Check if a record is found
    if ($result->num_rows > 0) {
        $volunteer_data = $result->fetch_assoc();
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
    <title>Volunteer Profile</title>
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

<h2>View Volunteer Profile</h2>

<!-- Input form for volunteer ID -->
<form method="POST" action="volunteer_profile.php">
    <label for="volunteer_id">Enter Your ID:</label>
    <input type="text" name="volunteer_id" id="volunteer_id" required>
    <input type="submit" value="View Profile">
</form>

<?php if (!empty($error_message)): ?>
    <p class="error"><?php echo $error_message; ?></p>
<?php endif; ?>

<?php if (!empty($volunteer_data)): ?>
    <!-- Display volunteer profile -->
    <div class="profile">
        <h3>Volunteer Profile</h3>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($volunteer_data['id']); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($volunteer_data['name']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($volunteer_data['address']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($volunteer_data['phone_no']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($volunteer_data['email']); ?></p>
        <p><strong>Occupation:</strong> <?php echo htmlspecialchars($volunteer_data['occupation']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($volunteer_data['dob']); ?></p>
        <p><strong>Assigned Location:</strong> <?php echo htmlspecialchars($volunteer_data['assigned_location']); ?></p>
        <p><strong>Medical Info:</strong> <?php echo htmlspecialchars($volunteer_data['medical_info']); ?></p>
        <p><strong>Blood Group:</strong> <?php echo htmlspecialchars($volunteer_data['blood_group']); ?></p>
        <p><strong>Allergy:</strong> <?php echo htmlspecialchars($volunteer_data['allergy']); ?></p>
        <p><strong>Chronic Disease:</strong> <?php echo htmlspecialchars($volunteer_data['chronic_disease']); ?></p>
    </div>
<?php endif; ?>
<a href="home.php">Go back to home</a><br>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
