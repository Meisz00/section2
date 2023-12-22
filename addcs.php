<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_customer= $_POST['id_customer'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company_name = $_POST['company_name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $details = $_POST['details'];
    $insert_ts = $_POST['insert_ts'];

    $sql = "INSERT INTO customer (id_customer, first_name, last_name, company_name, address, mobile, email, details, insert_ts) VALUES ('$id_customer', '$first_name', '$last_name', '$company_name', '$address', '$mobile', '$email', '$details', '$insert_ts')";

    if (mysqli_query($conn, $sql)) {
        header("Location: indexcs.php");
        exit();
    }   else{
        echo "Error:" .$sql. "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id Tipe Kontak </title>
</head>
<body>
    <h2>Add Id Customer</h2>
    <form action="" method="post">
        <label for="first_name">Nama Depan:</label>
        <input type="text" name="first_name" required>
        <br>
        <label for="last_name">Nama Belakang:</label>
        <input type="text" name="last_name" required>
        <br>
        <label for="company_name">Nama Perusahaan:</label>
        <input type="text" name="company_name" required>
        <br>
        <label for="address">Alamat:</label>
        <input type="text" name="address" required>
        <br>
        <label for="mobile">No Teleon:</label>
        <input type="text" name="mobile" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <br>
        <label for="details">Rician:</label>
        <input type="text" name="details" required>
        <br>
        <label for="insert_ts">Insert Rentan Waktu:</label>
        <input type="timestamp" name="insert_ts" required>
        <br>
        <input type="submit" value="Add Customer">
    </form>
    <br>
    <a href="indexcs.php">Back to Contact Type</a>
</body>
</html