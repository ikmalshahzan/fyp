<?php
$title = 'TEMPAHAN SERVIS';
include 'template/header.php';
include 'config.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">BORANG TEMPAHAN SERVIS</h2>
    </div>
    <div class="card-body">
        <?php

        $jenis_kenderaan = [];
        $masalah = [];

        $sql2 = "SELECT * FROM jenis_kenderaan";
        $result2 = $conn->query($sql2);

        $sql3 = "SELECT * FROM masalah_kenderaan";
        $result3 = $conn->query($sql3);



        $sql = "SELECT t.id, t.no_kenderaan, t.ic, t.no_telefon, t.tarikh_masa_tempahan, t.status, j.nama_kenderaan, m.jenis_masalah
                FROM tempahan_servis as t
                JOIN jenis_kenderaan as j
                ON t.jenis_kenderaan = j.id
                JOIN masalah_kenderaan as m
                ON t.jenis_masalah = m.id
                WHERE t.id = " . $_GET['id'] . "";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
        ?>
            <form method="POST" action="crud.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">NAMA</label>
                        <input type="text" class="form-control" name="name" value="<?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ic">IC/PASSPORT</label>
                        <input type="text" class="form-control" name="ic" value="<?= $row['ic'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">NO TELEFON</label>
                    <input type="text" class="form-control" name="phone" value="<?= $row['no_telefon'] ?>">
                </div>
                <div class="form-group">
                    <label for="vehicle_no">NO KENDERAAN</label>
                    <input type="text" class="form-control" name="vehicle_no" value="<?= $row['no_kenderaan'] ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="vehicle_type">JENIS KENDERAAN</label>
                        <select name="vehicle_type" class="form-control">
                            <option selected disabled>Pilih Satu</option>
                            <?php
                            while ($row2 = $result2->fetch_assoc()) {
                                if ($row['nama_kenderaan'] ==  $row2['nama_kenderaan']) {
                            ?>
                                    <option value="<?= $row2['id'] ?>" style="color:red" selected><?= $row2['nama_kenderaan'] ?></option>

                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row2['id'] ?>"><?= $row2['nama_kenderaan'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="problem">JENIS MASALAH KENDERAAN <i class="fa fa-question-circle-o" aria-hidden="true" title="Tekan CTRL dan klik jenis masalah kenderaan anda."></i></label>
                        <select name="problem" class="form-control">
                            <option selected disabled>Pilih Satu</option>
                            <?php
                            while ($row3 = $result3->fetch_assoc()) {
                                if ($row['jenis_masalah'] ==  $row3['jenis_masalah']) {
                            ?>
                                    <option value="<?= $row3['id'] ?>" style="color:red" selected><?= $row3['jenis_masalah'] ?></option>

                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row3['id'] ?>"><?= $row3['jenis_masalah'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><b>TARIKH DAN MASA TEMPAHAN SERVIS</b></label>
                        <input type="text" class="form-control" id="masa" name="time" value="<?= $row['tarikh_masa_tempahan'] ?>">
                    </div>
                </div>
                <button type=" submit" name="create" class="btn btn-primary">Kemaskini</button>
            </form>
        <?php
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#masa").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    });
</script>

<?php include 'template/footer.php'; ?>