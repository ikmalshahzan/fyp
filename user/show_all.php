<?php
$title = 'Tempahan saya';
include 'template/header.php';
include 'config.php';
?>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tempahan Akan Datang</h4>
    </div>
    <div class="card-body">
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
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_kenderaan'] ?></td>
                            <td><?= $row['no_kenderaan'] ?></td>
                            <td><?= $row['jenis_masalah'] ?></td>
                            <td><?= $row['tarikh_masa_tempahan'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-warning" title="Sunting"><i class="fas fa-edit"></i></a>
                                <a href="crud.php?id=<?= $row['id'] ?>" class="btn btn-danger" title=Padam><i class="fas fa-trash"></i></a>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<?php include 'template/footer.php'; ?>