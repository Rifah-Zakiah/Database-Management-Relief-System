<?php
    include("db_dmrs.php");
    $sql = "SELECT * FROM Relief";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Relief Table</title>
    <link rel="stylesheet" href="style.css">
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
    </style>
</head>
<body>
    <a href="home.php">Go back to home</a>
    <a href="collects.php">Collect Relief</a>
    <a href="relief.php">Add Relief Info</a>
    <h1>Relief Table</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Location</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['type']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['location']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="help.php">Go to get help</a>
    <a href="helping.php">Go to help</a>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
