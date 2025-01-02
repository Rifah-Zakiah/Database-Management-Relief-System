<?php
    include("db_dmrs.php");
    $search = "";
    $result = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $query = "SELECT * FROM Shelter WHERE id LIKE ? OR name LIKE ? OR location LIKE ?";
        $stmt = $conn->prepare($query);
        $likeSearch = "%" . $search . "%";
        $stmt->bind_param("sss", $likeSearch, $likeSearch, $likeSearch);
        $stmt->execute();
        $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Shelter Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <a href="home.php">Go back to home</a><br>
    <h1>Search Shelter Table</h1>
    <form method="POST" action="">
        <label for="search">Search by ID, Name, or Location:</label>
        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search); ?>" required>
        <button type="submit">Search</button>
        <!-- <input type="text" name="search_query" placeholder="Enter name, id, or location" required>
        <input type="submit" value="Search"> -->
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['location']}</td>
                            <td>{$row['status']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </table><br>
        
    <?php endif; ?>
    <a href="shelter.php">Go Back</a>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
