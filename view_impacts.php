<?php
    include("db_dmrs.php");

    // Modified SQL query to join Disaster and Victim tables
    $sql = "SELECT 
                i.disaster_id, 
                d.name AS disaster_name, 
                i.victim_id, 
                v.name AS victim_name, 
                v.phone_no, 
                v.current_location 
            FROM Impacts i
            JOIN Disaster d ON i.disaster_id = d.id
            JOIN Victim v ON i.victim_id = v.id";

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Impacts Table</title>
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
    <a href="impacts.php">Add Disaster impacting</a><br>
    
    <h1>Disaster Impacting Victims</h1>
    <table>
        <tr>
            <th>Disaster ID</th>
            <th>Disaster Name</th>
            <th>Victim ID</th>
            <th>Victim Name</th>
            <th>Phone Number</th>
            <th>Current Location</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['disaster_id']}</td>
                        <td>{$row['disaster_name']}</td>
                        <td>{$row['victim_id']}</td>
                        <td>{$row['victim_name']}</td>
                        <td>{$row['phone_no']}</td>
                        <td>{$row['current_location']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="home.php">Go back to home</a><br>
    <a href="help.php">Go to get help</a>
    <a href="helping.php">Go to help</a>
</body>
</html>
<?php
    $conn->close();
?>
