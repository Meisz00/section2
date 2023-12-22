<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_schedule= $_POST['id_schedule'];
    $repair_shop_id= $_POST['repair_shop_id'];
    $employee_id= $_POST['employee_id'];
    $position_id= $_POST['position_id'];
    $schedule_date= $_POST['schedule_date'];
    $time_from= $_POST['time_from'];
    $time_to= $_POST['time_to'];
    $plan= $_POST['plan'];
    $actual= $_POST['actual'];
    $insert_ts = $_POST['insert_ts'];

    $sql = "UPDATE schedule SET repair_shop_id='$repair_shop_id', employee_id='$employee_id', position_id='$position_id', schedule_date='$schedule_date', time_from='$time_from', time_to='$time_to', plan='$plan', actual='$actual', insert_ts='$insert_ts' WHERE id_schedule=$id_schedule";

    if (mysqli_query($conn, $sql)) {
        header("Location: indexschedule.php");
        exit();
    } else {
        echo "Error: " .$sql. "<br>" .mysqli_error($conn);
    }
}

//fetch data based on the ID from the URL
$id_schedule = $_GET['id_schedule'];
$result = mysqli_query($conn, "SELECT * FROM schedule WHERE id_schedule=$id_schedule");
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
</head>
<body>
    <h2>Edit Schedule</h2>
    <form action="" method="post">
        <input type="hidden" name="id_schedule" value="<?php echo $row['id_schedule']; ?>">
        <label for="repair_shop_id">Id Repair Shop:</label>
        <input type="number" name="repair_shop_id" value="<?php echo $row['repair_shop_id']; ?>" required>
        <br>
        <label for="employee_id">Id Pegawai:</label>
        <input type="number" name="employee_id" value="<?php echo $row['employee_id']; ?>" required>
        <br>
        <label for="position_id">Id Posisi:</label>
        <input type="number" name="position_id" value="<?php echo $row['position_id']; ?>" required>
        <br>
        <label for="schedule_date">Tanggal Schedule:</label>
        <input type="date" name="schedule_date" value="<?php echo $row['schedule_date']; ?>" required>
        <br>
        <label for="time_from">Waktu Mulai:</label>
        <input type="text" name="time_from" value="<?php echo $row['time_from']; ?>" required>
        <br>
        <label for="time_to">Waktu Selesai:</label>
        <input type="text" name="time_to" value="<?php echo $row['time_to']; ?>" required>
        <br>
        <label for="plan">Plan:</label>
        <input type="text" name="plan" value="<?php echo $row['plan']; ?>" required>
        <br>
        <label for="actual">Actual:</label>
        <input type="text" name="actual" value="<?php echo $row['actual']; ?>" required>
        <br>
        <label for="insert_ts">Insert Rentang Waktu:</label>
        <input ttype="timestamp" name="insert_ts" value="<?php echo $row['insert_ts']; ?>" required>
        <br>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <br>
    <a href="indexschedule.php">Back to Schedule</a>
</body>
</html>










