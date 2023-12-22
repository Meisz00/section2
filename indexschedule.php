<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 2</title>
</head>
<body>
    <h2>Schedule</h2>
    <table border = "1">
        <tr>
            <th>Id Schedule</th>
            <th>Id Repair Shop</th>
            <th>Id Pegawai</th>
            <th>Id Posisi</th>
            <th>Tanggal Schedule</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Plan</th>
            <th>Actual</th>
            <th>Insert Rentang Waktu</th>
            <th>Action</th>
        </tr>
        <?php
        //include database connection
        include('config.php');

        //fetch data from the database
        $result = mysqli_query($conn, "SELECT * FROM schedule");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_schedule'] . "</td>";
            echo "<td>" . $row['repair_shop_id'] . "</td>";
            echo "<td>" . $row['employee_id'] . "</td>";
            echo "<td>" . $row['position_id'] . "</td>";
            echo "<td>" . $row['schedule_date'] . "</td>";
            echo "<td>" . $row['time_from'] . "</td>";
            echo "<td>" . $row['time_to'] . "</td>";
            echo "<td>" . $row['plan'] . "</td>";
            echo "<td>" . $row['actual'] . "</td>";
            echo "<td>" . $row['insert_ts'] . "</td>";
            echo "<td>
                <a href = 'editschedule.php?id_schedule=" . $row['id_schedule'] . "'>Edit</a>
                <a href = 'deleteschedule.php?id_schedule=" . $row['id_schedule'] . "'>Delete</a>
            </td>";
            echo "</tr>"; 
        }
        ?>
    </table>
    <br>
    <a href="addschedule.php">Add New Schedule</a>
    <br>
    <a href="index.html">Back to Main Menu</a>
</body>
</html>