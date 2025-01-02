<?php
    include("db_dmrs.php");
    $search = "";
    $result = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $query = "SELECT * FROM Disaster WHERE id LIKE ? OR name LIKE ? OR region LIKE ?";
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
    <title>Search Disaster Table</title>
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
    <h1>Search Disaster Table</h1>
    <form method="POST" action="">
        <label for="search">Search by ID, Name, or Region:</label>
        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search); ?>" required>
        <button type="submit">Search</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Region</th>
                <th>Severity</th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['region']}</td>
                            <td>{$row['severity']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </table><br>
        
    <?php endif; ?>
    <a href="disaster.php">Go back</a>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
