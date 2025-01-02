<?php
    include("db_dmrs.php");
    $sql = "SELECT * FROM Seeks";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Table</title>
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
    <h1>Table</h1>
    <table>
        <tr>
            <th>Victim ID</th>
            <th>Shelter ID</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['victim_id']}</td>
                        <td>{$row['shelter_id']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="seeks.php">Go Back to seek Shelter</a><br>
    <a href="shelter.php">Go Back to add Shelter Details</a>
</body>
</html>
<?php
$conn->close();
?>
