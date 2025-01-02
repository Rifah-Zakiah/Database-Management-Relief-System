<?php
    include("db_dmrs.php");
    $search_results = [];

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize the search input
        $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);

        // SQL query to search in name, id, or assigned_location
        $sql = "SELECT * FROM Volunteer WHERE name LIKE '%$search_query%' OR id LIKE '%$search_query%' OR assigned_location LIKE '%$search_query%'";

        // Execute query and store results
        $result = $conn->query($sql);

        // Fetch results if any
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $search_results[] = $row;
            }
        } else {
            echo "No results found.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Search</title>
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

<h2>Search Volunteers</h2>

<!-- Search form -->
<form method="POST" action="search_volunteer.php">
    <input type="text" name="search_query" placeholder="Enter name, id, or assigned_location" required>
    <input type="submit" value="Search">
</form>

<?php if (!empty($search_results)): ?>
    <!-- Display search results in a table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Occupation</th>
                <th>DOB</th>
                <th>Assigned Location</th>
                <th>Medical Info</th>
                <th>Blood Group</th>
                <th>Allergy</th>
                <th>Chronic Disease</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($search_results as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['occupation']); ?></td>
                    <td><?php echo htmlspecialchars($row['dob']); ?></td>
                    <td><?php echo htmlspecialchars($row['assigned_location']); ?></td>
                    <td><?php echo htmlspecialchars($row['medical_info']); ?></td>
                    <td><?php echo htmlspecialchars($row['blood_group']); ?></td>
                    <td><?php echo htmlspecialchars($row['allergy']); ?></td>
                    <td><?php echo htmlspecialchars($row['chronic_disease']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br>
    
<?php endif; ?>
<a href="volunteer.php">Go Back</a>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
