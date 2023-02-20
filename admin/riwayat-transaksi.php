<?php
include 'config.php';
?>
<?php if (isset($_GET['success-riwayat-transaksi'])) { ?>
    <div id="toastSuccess" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Pembaruan Riwayat Berhasil</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Pembaruan riwayat transaksi berhasil dilakukan.</div>
    </div>
<?php unset($_GET['success-riwayat-transaksi']);
} ?>
<?php if (isset($_GET['failed-riwayat-transaksi'])) { ?>
    <div id="toastFailed" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Pembaruan Riwayat Gagal</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Pembaruan riwayat transaksi gagal dilakukan.</div>
    </div>
<?php } ?>
<div class="card">
    <h5 class="card-header">Data Riwayat Transaksi</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="data-kendaraan" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>No Faktur</th>
                        <th>No KTP</th>
                        <th>Nama Penyewa</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Durasi Sewa</th>
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
                            'select * from tb_transaksi'
                        );
                        $no = 1;
                        while (
                            $row = mysqli_fetch_array(
                                $sql
                            )
                        ) { ?>
                            <td><?php echo $no++ ?></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['id_transaksi'] ?></strong></td>
                            <td><?php echo $row['id_faktur'] ?></td>
                            <td><?php echo $row['no_ktp'] ?></td>
                            <td><?php echo $row['nama_penyewa'] ?></td>
                            <td><?php echo $row['email_penyewa'] ?></td>
                            <td><?php echo $row['no_hp'] ?></td>
                            <td><?php echo $row['tanggal_mulai'] ?></td>
                            <td><?php echo $row['tanggal_selesai'] ?></td>
                            <td><?php echo $row['durasi_sewa'] ?> Hari</td>
                            <td><?php echo number_format($row['total_harga']) ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="index.php?module=invoice&id_transaksi=<?php echo $row['id_transaksi']?>"><i class="bx bx-printer me-1"></i> Faktur</a>
                                        <a class="dropdown-item" href="index.php?module=hapus-riwayat-transaksi&id_transaksi=<?php echo $row['id_transaksi']?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>