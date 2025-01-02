<?php
    include("db_dmrs.php");
    $sql = "SELECT * FROM Shelter";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shelter Table</title>
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
    <h1>Shelter Table</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
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
    </table>
    <a href="shelter.php">Go Back</a>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
