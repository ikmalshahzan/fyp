<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "ebcs");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $masalah = array(
//     'Enjin rosak',
//     'Brek pad haus/habis',
//     'Starter tak berfungsi',
//     'Temperature kereta tinggi',
//     'Balancing kereta lari',
//     'Servis air cond',
//     'Clutch lining habis',
//     'Kerosakan pada gearbox',
//     'Tukar minyak hitam',
//     'Lampu sisi ( signal ) depan belakang tidak berfungsi',
//     'Timing belt enjin habis / putus',
//     'Timing belt air cond habis / putus',
//     'Power stereng keras',
//     'Drive shaft berbunyi',
//     'Masalah ignition coil',
//     'Timing belt putus',
//     'Masalah alternor',
//     'Masalah bateri',
//     'Masalah aircond'
// );

// foreach ($masalah as $mas) {
//     $sql = "INSERT INTO masalah_kenderaan (jenis_masalah) VALUES ('" . $mas . "')";
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// $nama_kenderaan = array(
//     'Proton Saga 1985-1992',
//     'Proton Saga Iswara 1992-2003',
//     'Proton Saga LMST 2003-2008',
//     'Proton Saga 2008-2010',
//     'Proton Saga FL 2010-2011',
//     'Proton Saga FLX 2011',
//     'Proton Wira 1993-2000',
//     'Proton Wira 2000-2007',
//     'Proton Perdana 1994-1997',
//     'Proton Perdana V6 1997-2000',
//     'Proton Perdana V6 2000-2010',
//     'Proton Perdana PRM 2010-2015',
//     'Proton Satria 1994-1997',
//     'Proton Satria GTi 1997-2000',
//     'Proton Satria GTi 2000-2006',
//     'Proton Satria Neo 2006-2011',
//     'Proton Satria Neo CPS 2011-2013',
//     'Proton Satria Neo R3 2013-kini',
//     'Proton Tiara',
//     'Proton Putra',
//     'Proton Juara',
//     'Proton Waja',
//     'Proton Gen-2',
//     'Proton Savvy',
//     'Perodua Kancil 1994–2009',
//     'Perodua Rusa 1996–2003',
//     'Perodua Kembara 1998–2008',
//     'Perodua Kenari 2000–2008',
//     'Perodua Kelisa 2001–2007',
//     'Perodua MyVi 2005',
//     'Perodua Viva 2007–2014',
//     'Perodua Nautica 2008–2010',
//     'Perodua Alza 2009–kini',
//     'Perodua Axia 2014–kini',
//     'Perodua Bezza 2016–kini',
//     'Perodua Aruz 2019–kini'
// );

// foreach ($nama_kenderaan as $ken) {
//     $sql = "INSERT INTO jenis_kenderaan (nama_kenderaan) VALUES ('" . $ken . "')";
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }
date_default_timezone_set('Asia/Kuala_Lumpur');
echo date("dmyHis");
