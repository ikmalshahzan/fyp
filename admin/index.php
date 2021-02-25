<?php include 'template/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">SENARAI SEMAK TEMPAHAN SERVIS</h2>
    </div>
    <div class="card-body">
        <table id="myTable">
            <thead>
                <th>No Tempahan</th>
                <th>Nama</th>
                <th>Jenis Kenderaan</th>
                <th>Jenis Kerosakan</th>
                <th>Tarikh/Masa Tempahan</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="#" class="btn btn-warning" title="Sunting"><i class="fas fa-edit"></i></a> | <a href="#" class="btn btn-danger" title="Padam"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
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