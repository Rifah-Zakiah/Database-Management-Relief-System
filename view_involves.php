<?php
    include("db_dmrs.php");

    // Modified SQL query to join Volunteer, Relief, and Victim tables
    $sql = "SELECT 
                i.volunteer_id, 
                v.name AS volunteer_name, 
                v.phone_no AS volunteer_phone,
                i.relief_id, 
                r.type,
                i.victim_id, 
                vt.name AS victim_name, 
                vt.phone_no AS victim_phone, 
                vt.current_location
            FROM Involves i
            JOIN Volunteer v ON i.volunteer_id = v.id
            JOIN Relief r ON i.relief_id = r.id
            JOIN Victim vt ON i.victim_id = vt.id";

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Involves Table</title>
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
    <a href="involves.php">Add involvement in disaster</a><br>
    <h1>Overall Involvement</h1>
    <table>
        <tr>
            <th>Volunteer ID</th>
            <th>Volunteer Name</th>
            <th>Volunteer Phone</th>
            <th>Relief ID</th>
            <th>Relief Type</th>
            <th>Victim ID</th>
            <th>Victim Name</th>
            <th>Victim Phone</th>
            <th>Victim Location</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['volunteer_id']}</td>
                        <td>{$row['volunteer_name']}</td>
                        <td>{$row['volunteer_phone']}</td>
                        <td>{$row['relief_id']}</td>
                        <td>{$row['type']}</td>
                        <td>{$row['victim_id']}</td>
                        <td>{$row['victim_name']}</td>
                        <td>{$row['victim_phone']}</td>
                        <td>{$row['current_location']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="home.php">Go Back to Home</a>
    <a href="help.php">Go to get help</a>
    <a href="helping.php">Go to help</a>
</body>
</html>
<?php
$conn->close();
?>
