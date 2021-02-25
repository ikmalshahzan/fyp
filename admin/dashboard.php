<?php
$title = "Laman Utama";

include 'template/header.php';
include 'config/db.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">SENARAI SEMAK TEMPAHAN SERVIS</h2>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tempahan Akan Datang</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tempahan Selesai/Dibatalkan</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container-fluid mt-2">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <th>No Tempahan</th>
                            <th>Jenis Kenderaan</th>
                            <th>Nombor Kenderaan</th>
                            <th>Jenis Kerosakan</th>
                            <th>Tarikh/Masa Tempahan</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT t.id, t.no_kenderaan, t.status as status_t, t.tarikh_masa_tempahan, j.nama_kenderaan, m.jenis_masalah, s.status
                                FROM tempahan_servis as t
                                JOIN jenis_kenderaan as j
                                ON t.jenis_kenderaan = j.id
                                JOIN masalah_kenderaan as m
                                ON t.jenis_masalah = m.id
                                JOIN tbl_status as s
                                ON t.status = s.id
                                WHERE t.status = 1 OR t.status = 2";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['nama_kenderaan'] ?></td>
                                        <td><?= $row['no_kenderaan'] ?></td>
                                        <td><?= $row['jenis_masalah'] ?></td>
                                        <td><?= $row['tarikh_masa_tempahan'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td>
                                            <?php
                                            if ($row['status_t'] == 1) {
                                            ?>
                                                <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-warning" title="Sunting"><i class="fas fa-edit"></i></a>
                                                <a href="crud.php?id=<?= $row['id'] ?>" class="btn btn-danger" title=Batal><i class="fas fa-window-close"></i></a>
                                            <?php
                                            } elseif ($row['status_t'] == 2) {
                                            ?>
                                                <a href="crud.php?id=<?= $row['id'] ?>" class="btn btn-danger" title=Batal><i class="fas fa-window-close"></i></a>
                                            <?php
                                            }
                                            ?>


                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center">Tiada tempahan.</h4>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container-fluid mt-2">
                    <table id="myTable2" class="table table-striped">
                        <thead>
                            <th>No Tempahan</th>
                            <th>Jenis Kenderaan</th>
                            <th>Nombor Kenderaan</th>
                            <th>Jenis Kerosakan</th>
                            <th>Tarikh/Masa Tempahan</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql2 = "SELECT t.id, t.no_kenderaan, t.status as status_t, t.tarikh_masa_tempahan, j.nama_kenderaan, m.jenis_masalah, s.status
                                FROM tempahan_servis as t
                                JOIN jenis_kenderaan as j
                                ON t.jenis_kenderaan = j.id
                                JOIN masalah_kenderaan as m
                                ON t.jenis_masalah = m.id
                                JOIN tbl_status as s
                                ON t.status = s.id
                                WHERE t.status = 3 OR t.status = 4";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                                // output data of each row
                                while ($row2 = $result2->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row2['id'] ?></td>
                                        <td><?= $row2['nama_kenderaan'] ?></td>
                                        <td><?= $row2['no_kenderaan'] ?></td>
                                        <td><?= $row2['jenis_masalah'] ?></td>
                                        <td><?= $row2['tarikh_masa_tempahan'] ?></td>
                                        <td><?= $row2['status'] ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center">Tiada tempahan.</h4>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
    });
</script>
<?php include 'template/footer.php'; ?>