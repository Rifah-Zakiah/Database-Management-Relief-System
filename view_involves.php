<?php
    include("db_dmrs.php");
    $sql = "SELECT * FROM Involves";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Involves Table</title>
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
    <h1>Overall Involvement</h1>
    <table>
        <tr>
            <th>Volunteer ID</th>
            <th>Relief ID</th>
            <th>Victim ID</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['volunteer_id']}</td>
                        <td>{$row['relief_id']}</td>
                        <td>{$row['victim_id']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="involves.php">Go Back</a>
</body>
</html>
<?php
$conn->close();
?>
