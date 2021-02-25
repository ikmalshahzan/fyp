<?php
$title = 'Laman Utama';
include 'template/header.php';
include 'config.php';
?>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tempahan Akan Datang</h4>
    </div>
    <div class="card-body">
        <div class="container mt-5 mb-5">
            <ul class="timeline">
                <?php
                $sql = "SELECT t.id, t.no_kenderaan, t.tarikh_masa_tempahan, t.status, j.nama_kenderaan, m.jenis_masalah
                FROM tempahan_servis as t
                JOIN jenis_kenderaan as j
                ON t.jenis_kenderaan = j.id
                JOIN masalah_kenderaan as m
                ON t.jenis_masalah = m.id
                WHERE id_user = " . $_SESSION['id'] . "";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <li>
                            <a target="_blank" href="#">
                                <h4><?= $row['tarikh_masa_tempahan'] ?></h4>
                            </a>
                            <div class="float-right"><?= $row['status'] ?></div>
                            <p>
                                Nama Kenderaan : <?= $row['nama_kenderaan'] ?>
                            </p>
                            <p>
                                Jenis Kerosakan: <?= $row['jenis_masalah'] ?>
                            </p>
                            <p>
                                No Kenderaan: <?= $row['no_kenderaan'] ?>
                            </p>
                        </li>
                    <?php
                    }
                } else {
                    ?>
                    <h4 class="text-center">Tiada tempahan.</h4>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>