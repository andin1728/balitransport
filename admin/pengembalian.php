<?php
include 'config.php';
?>
<?php if (isset($_GET['success-Pengembalian'])) { ?>
    <div id="toastSuccess" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Pengembalian Unit Berhasil</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Pengembalian Unit berhasil dilakukan.</div>
    </div>
<?php unset($_GET['success-Pengembalian']);
} ?>
<?php if (isset($_GET['failed-Pengembalian'])) { ?>
    <div id="toastFailed" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Pengembalian Unit Gagal</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Pengembalian Unit gagal dilakukan.</div>
    </div>
<?php } ?>
<div class="card">
    <h5 class="card-header">Data Pengembalian Unit</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="data-pengembalian" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama Penyewa</th>
                        <th>Unit Kendaraan</th>
                        <th>Tgl Pengembalian</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <?php
                        include 'config.php';
                        $sql = mysqli_query(
                            $con,
                            'SELECT tb_transaksi.id_transaksi, tb_transaksi.nama_penyewa, tb_transaksi.tanggal_selesai, tb_transaksi.status, tb_transaksi.total_harga, tb_kendaraan.id_kendaraan, tb_kendaraan.nama
                                FROM tb_transaksi
                                JOIN tb_kendaraan
                                ON tb_transaksi.id_kendaraan = tb_kendaraan.id_kendaraan order by id_transaksi DESC'
                        );
                        $no = 1;
                        while (
                            $row = mysqli_fetch_array($sql)
                        ) {
                            // Check if the status is "confirmed"
                            if ($row['status'] == "Ready") {
                                // If the status is "confirmed", set the color to green
                                $class = "badge bg-success";
                            } else {
                                // If the status is not "confirmed", set the class to red
                                $class = "badge bg-danger";
                            }
                        ?>
                            <td><?php echo $no++ ?></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['id_transaksi'] ?></strong></td>
                            <td><?php echo $row['nama_penyewa'] ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['tanggal_selesai'] ?></td>
                            <td><span class="<?php echo $class; ?>"><?php echo $row['status'] ?></span></td>
                            <td><?php echo number_format($row['total_harga']) ?></td>
                            <td><a class="btn btn-success btn-sm" href="index.php?module=update_status&id_transaksi=<?php echo $row['id_transaksi']?>"><i class='bx bx-check'></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>