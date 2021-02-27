<?php
$title = 'BORANG TEMPAHAN SERVIS';
include 'template/header.php';
include 'config.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">BORANG TEMPAHAN SERVIS</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="crud.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">NAMA</label>
                    <input type="text" class="form-control" name="name" value="<?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>" readonly required>
                </div>
                <div class="form-group col-md-6">
                    <label for="ic">IC/PASSPORT</label>
                    <input type="text" class="form-control" name="ic" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">NO TELEFON</label>
                    <input type="text" class="form-control" name="phone" value="<?= $_SESSION['mobilenumber'] ?>" readonly required>
                </div>
                <div class="form-group col-md-6">
                    <label for="vehicle_no">NO KENDERAAN</label>
                    <input type="text" class="form-control" name="vehicle_no" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="vehicle_type">JENIS KENDERAAN</label>
                    <select name="vehicle_type" class="form-control" required>
                        <option selected disabled>Pilih Satu</option>
                        <?php
                        $sql2 = "SELECT * FROM jenis_kenderaan";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            // output data of each row
                            while ($row2 = $result2->fetch_assoc()) {
                        ?>
                                <option value="<?= $row2['id'] ?>">
                                    <?= $row2['nama_kenderaan'] ?>
                                </option>
                            <?php
                            }
                        } else {
                            ?>
                            <option selected disabled>Tiada pilihan.</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="problem">JENIS MASALAH KENDERAAN <i class="fa fa-question-circle-o" aria-hidden="true" title="Tekan CTRL dan klik jenis masalah kenderaan anda."></i></label>
                    <select name="problem" class="form-control" required>
                        <option selected disabled>Pilih Satu</option>
                        <?php
                        $sql = "SELECT * FROM masalah_kenderaan";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['jenis_masalah'] ?>
                                </option>
                            <?php
                            }
                        } else {
                            ?>
                            <option selected disabled>Tiada pilihan.</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4"><b>TARIKH DAN MASA TEMPAHAN SERVIS</b></label>
                    <input type="text" class="form-control" id="masa" name="time" required>
                </div>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Tempah!</button>
        </form>
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