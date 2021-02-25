<?php
$title = "Butiran Tempahan";

include 'template/header.php';
include 'config/db.php';
?>

<?php

$id = $_GET['id'];

$sql = "SELECT t.id, t.nama, t.no_kenderaan, t.ic, t.no_telefon, t.tarikh_masa_tempahan, j.nama_kenderaan, m.jenis_masalah, s.status
FROM tempahan_servis as t
JOIN jenis_kenderaan as j
ON t.jenis_kenderaan = j.id
JOIN masalah_kenderaan as m
ON t.jenis_masalah = m.id
JOIN tbl_status as s
ON t.status = s.id
WHERE t.id = $id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Booking Number:
                <div class="float-right">
                    Status: <b><?= $row['status'] ?></b>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-header">
                            Butiran Pelanggan
                        </div>
                        <div class="card-body">
                            <p class="card-text"><b>Nama: </b><?= $row['nama'] ?></p>
                            <p class="card-text"><b>IC/Passport: </b><?= $row['ic'] ?></p>
                            <p class="card-text"><b>No Telefon: </b><?= $row['no_telefon'] ?></p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-header">
                            Butiran Kereta
                        </div>
                        <div class="card-body">
                            <p class="card-text"><b>No Kenderaan: </b><?= $row['no_kenderaan'] ?></p>
                            <p class="card-text"><b>Jenis Kenderaan: </b><?= $row['nama_kenderaan'] ?></p>
                            <p class="card-text"><b>Masalah: </b><?= $row['jenis_masalah'] ?></p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>

<?php
}

?>


<?php include 'template/footer.php'; ?>