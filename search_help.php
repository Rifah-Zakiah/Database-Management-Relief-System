<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Help</title>
    <link rel="stylesheet" href="style.css"> 

    <style>
        /* Basic styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        input[type="text"] {
            padding: 5px;
            width: 300px;
        }
        input[type="submit"] {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1>Find Help in Your Area</h1>
    <form method="POST" action="">
        <label for="location">Enter Your Location:</label>
        <input type="text" id="location" name="location" required>
        <button type="submit">Search</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_dmrs"; // Change this to your database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the entered location
        $location = $conn->real_escape_string($_POST['location']);

        // Query to find volunteers in the location
        $volunteerQuery = "SELECT id, name, phone_no, email, assigned_location FROM Volunteer WHERE assigned_location LIKE '%$location%'";
        $volunteerResult = $conn->query($volunteerQuery);

        // Query to find shelters in the location
        $shelterQuery = "SELECT id, name, location, status FROM Shelter WHERE location LIKE '%$location%'";
        $shelterResult = $conn->query($shelterQuery);

        echo "<h2>Search Results for: " . htmlspecialchars($location) . "</h2>";

        // Display volunteers
        if ($volunteerResult->num_rows > 0) {
            echo "<h3>Available Volunteers:</h3>";
            echo "<table border='0'>";
            echo "<tr><th>ID</th><th>Name</th><th>Phone No</th><th>Email</th><th>Assigned Location</th></tr>";
            while ($row = $volunteerResult->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['phone_no']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['assigned_location']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No volunteers found in this location.</p>";
        }

        // Display shelters
        if ($shelterResult->num_rows > 0) {
            echo "<h3>Available Shelters:</h3>";
            echo "<table border='0'>";
            echo "<tr><th>ID</th><th>Name</th><th>Location</th><th>Status</th></tr>";
            while ($row = $shelterResult->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['status']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No shelters found in this location.</p>";
        }

        $conn->close();
    }
    ?>
    <a href="home.php">Go back to home</a><br>
</body>
</html>
