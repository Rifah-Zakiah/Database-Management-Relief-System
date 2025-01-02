<?php
    include("db_dmrs.php");
    $sql = "SELECT * FROM Impacts";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <a href="home.php">Go back to home</a><br>
    <title>Impacts Table</title>
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
    <h1>View Impacts Table</h1>
    <table>
        <tr>
            <th>Disaster ID</th>
            <th>Victim ID</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['disaster_id']}</td>
                        <td>{$row['victim_id']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="impacts.php">Go Back</a><br>
</body>
</html>
<?php
    $conn->close();
?>
