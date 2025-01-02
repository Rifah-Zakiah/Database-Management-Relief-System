<?php 
    include("db_dmrs.php");
    $sql = "SELECT * FROM Victim";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Victim Table</title>
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
    <h1>Victim Table</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Occupation</th>
            <th>Date of Birth</th>
            <th>Current Location</th>
            <th>Requirement</th>
            <th>Medical Info</th>
            <th>Blood Group</th>
            <th>Allergy</th>
            <th>Chronic Disease</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['phone_no']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['occupation']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['current_location']}</td>
                        <td>{$row['requirement']}</td>
                        <td>{$row['medical_info']}</td>
                        <td>{$row['blood_group']}</td>
                        <td>{$row['allergy']}</td>
                        <td>{$row['chronic_disease']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="victim.php">Go Back</a><br>
</body>
</html>
<?php
$conn->close();
?>