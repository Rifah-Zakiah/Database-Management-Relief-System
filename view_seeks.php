<?php
    include("db_dmrs.php");
    
    // Updated SQL query with JOINs to get victim and shelter details
    $sql = "SELECT 
                Seeks.victim_id, 
                Victim.name AS victim_name, 
                Victim.phone_no AS victim_phone,
                Seeks.shelter_id, 
                Shelter.name AS shelter_name, 
                Shelter.location AS shelter_location, 
                Seeks.checkin_date, 
                Seeks.checkout_date 
            FROM Seeks
            JOIN Victim ON Seeks.victim_id = Victim.id
            JOIN Shelter ON Seeks.shelter_id = Shelter.id";

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seeks Table</title>
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
    <h1>Seeks Table</h1>
    <table>
        <tr>
            <th>Victim ID</th>
            <th>Victim Name</th>
            <th>Victim Phone</th>
            <th>Shelter ID</th>
            <th>Shelter Name</th>
            <th>Shelter Location</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['victim_id']}</td>
                        <td>{$row['victim_name']}</td>
                        <td>{$row['victim_phone']}</td>
                        <td>{$row['shelter_id']}</td>
                        <td>{$row['shelter_name']}</td>
                        <td>{$row['shelter_location']}</td>
                        <td>{$row['checkin_date']}</td>
                        <td>{$row['checkout_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="seeks.php">Go Back to Seek Shelter</a><br>
    <a href="shelter.php">Go Back to Add Shelter Details</a>
</body>
</html>
<?php
$conn->close();
?>
