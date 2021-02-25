<?php
session_start();
include 'config.php';

//CRUD FUNCTION FOR TEMPAHAN SERVIS

//Buat TEMPAHAN
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $user_id = $_SESSION['id'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $vehicle_no = $_POST['vehicle_no'];
    $vehicle_type = $_POST['vehicle_type'];
    $problem = $_POST['problem'];
    $time = $_POST['time'];

    $sql = "INSERT INTO tempahan_servis(id_user, nama, ic, no_telefon, no_kenderaan, jenis_kenderaan, jenis_masalah, tarikh_masa_tempahan, status) VALUES ('" . $_SESSION['id'] . "','" . $name . "','" . $ic . "','" . $phone . "','" . $vehicle_no . "','" . $vehicle_type . "','" . $problem . "','" . $time . "', 'Menunggu semakan')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "New record created successfully";
        header("Location: create.php");
    } else {
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: create.php");
    }
}

//BATALKAN TEMPAHAN
if (isset($_GET['id'])) {
    $sql = "DELETE FROM tempahan_servis WHERE id='" . $_GET['id'] . "'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Tempahan anda dibatalkan";
        header("Location: index.php");
    } else {
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: create.php");
    }
}
