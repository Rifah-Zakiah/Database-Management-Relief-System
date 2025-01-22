<?php
    include("db_dmrs.php");

    // Modified SQL query to join Volunteer and Relief tables
    $sql = "SELECT 
                c.volunteer_id, 
                v.name AS volunteer_name, 
                v.assigned_location, 
                c.relief_id, 
                r.type AS relief_type, 
                r.quantity,
                c.collection_date, 
                c.relief_destination 
            FROM Collects c
            JOIN Volunteer v ON c.volunteer_id = v.id
            JOIN Relief r ON c.relief_id = r.id";

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Collects Table</title>
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
    <a href="home.php">Go back to home</a><br>
    <h1>View Collects Table</h1>
    <table>
        <tr>
            <th>Volunteer ID</th>
            <th>Volunteer Name</th>
            <th>Assigned Location</th>
            <th>Relief ID</th>
            <th>Relief Type</th>
            <th>Quantity</th>
            <th>Collection Date</th>
            <th>Relief Destination</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['volunteer_id']}</td>
                        <td>{$row['volunteer_name']}</td>
                        <td>{$row['assigned_location']}</td>
                        <td>{$row['relief_id']}</td>
                        <td>{$row['relief_type']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['collection_date']}</td>
                        <td>{$row['relief_destination']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="collects.php">Go Back</a><br>
</body>
</html>
<?php
$conn->close();
?>
