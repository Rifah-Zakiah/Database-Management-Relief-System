<?php
    include("db_dmrs.php");
    $sql = "SELECT * FROM Disaster";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Disaster Table</title>
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
    <a href="home.php">Go back to home</a><br>
    <h1>Disaster Table</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Region</th>
            <th>Severity</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
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
    </table>
    <a href="disaster.php">Go Back</a><br>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
