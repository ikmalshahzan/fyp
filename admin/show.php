<?php
$title = "Butiran Tempahan";

include 'template/header.php';

include 'config/db.php';

if (isset($_POST['update'])) {
    $status = $_POST['status'];
    $id =  $_POST['id'];

    $sql = "UPDATE tempahan_servis SET  status= '" . $status . "' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Record updated successfully";
    } else {
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<?php

$id = $_GET['id'];

$sql = "SELECT t.id, t.no_tempahan, t.nama, t.no_kenderaan, t.ic, t.no_telefon, t.tarikh_masa_tempahan, j.nama_kenderaan, m.jenis_masalah, s.status
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
                Booking Number: <b><?= $row['no_tempahan'] ?></b>
                <div class="float-right">
                    Tarikh Tempahan: <b><?= $row['tarikh_masa_tempahan'] ?></b> | Status: <b><?= $row['status'] ?></b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" title="sunting" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-edit    "></i>
                    </button>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tukar status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="modal-body">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option selected disabled>Pilih Satu</option>
                            <?php
                            $sql3 = "SELECT * FROM tbl_status";
                            $result3 = $conn->query($sql3);
                            while ($row3 = $result3->fetch_assoc()) {
                                if ($row['status'] ==  $row3['status']) {
                            ?>
                                    <option value="<?= $row3['id'] ?>" style="color:red" selected><?= $row3['status'] ?></option>

                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row3['id'] ?>"><?= $row3['status'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" name="update" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

<?php include 'template/footer.php'; ?>