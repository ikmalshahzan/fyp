<?php
session_start();
include 'config.php';

//CRUD FUNCTION FOR TEMPAHAN SERVIS

//Buat TEMPAHAN
if (isset($_POST['create'])) {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $no_tempahan = 'EBCS' . date("dmyHis");
    $name = $_POST['name'];
    $user_id = $_SESSION['id'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $vehicle_no = $_POST['vehicle_no'];
    $vehicle_type = $_POST['vehicle_type'];
    $problem = $_POST['problem'];
    $time = $_POST['time'];

    $sql = "INSERT INTO tempahan_servis(no_tempahan, id_user, nama, ic, no_telefon, no_kenderaan, jenis_kenderaan, jenis_masalah, tarikh_masa_tempahan, status) VALUES ('" . $no_tempahan . "','" . $_SESSION['id'] . "','" . $name . "','" . $ic . "','" . $phone . "','" . $vehicle_no . "','" . $vehicle_type . "','" . $problem . "','" . $time . "', 1)";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "New record created successfully";
        header("Location: create.php");
    } else {
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: create.php");
    }
}


//KEMASKINI TEMPAHAN
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $vehicle_no = $_POST['vehicle_no'];
    $vehicle_type = $_POST['vehicle_type'];
    $problem = $_POST['problem'];
    $time = $_POST['time'];

    $sql = "UPDATE tempahan_servis SET no_kenderaan='" . $vehicle_no . "', jenis_kenderaan='" . $vehicle_type . "', jenis_masalah='" . $problem . "', tarikh_masa_tempahan='" . $time . "', status=1 WHERE id=2";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Record updated successfully";
        header("Location: show.php?id=$id");
    } else {
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: show.php?id=$id");
    }
}

//BATALKAN TEMPAHAN
if (isset($_GET['id'])) {

    $sql = "UPDATE tempahan_servis SET status=4 WHERE id='" . $_GET['id'] . "'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Tempahan anda dibatalkan";
        header("Location: show_all.php");
    } else {
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: create.php");
    }
}
