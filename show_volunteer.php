<?php 
    include("db_dmrs.php");
    $sql = "SELECT * FROM Volunteer";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Table</title>
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
    <h1>Volunteer Table</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>NID</th>
            <th>Occupation</th>
            <th>Date of Birth</th>
            <th>Assigned Location</th>
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
                        <td>{$row['nid']}</td>
                        <td>{$row['occupation']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['assigned_location']}</td>
                        <td>{$row['medical_info']}</td>
                        <td>{$row['blood_group']}</td>
                        <td>{$row['allergy']}</td>
                        <td>{$row['chronic_disease']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='12'>No records found</td></tr>";
        }
        ?>
    </table><br>
    <a href="helping.php">Go Back</a><br>
</body>
</html>
<?php
$conn->close();
?>
