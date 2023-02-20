<?php
include 'config.php';
?>
<?php if (isset($_GET['success-Transaksi'])) { ?>
    <div id="toastSuccess" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Transaksi Berhasil</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Transaksi baru berhasil dilakukan.</div>
    </div>
<?php unset($_GET['success-Transaksi']);
} ?>
<?php if (isset($_GET['failed-Transaksi'])) { ?>
    <div id="toastFailed" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Transaksi Gagal</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Transaksi baru gagal dilakukan.</div>
    </div>
<?php } ?>
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Pilih Kendaraan</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div id="" class="card-body">
                <table id="data-kendaraan" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Kendaraan</th>
                            <th>Harga</th>
                            <th>Transmisi</th>
                            <th>Service</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <?php
                            include 'config.php';
                            $sql = mysqli_query(
                                $con,
                                'select * from tb_kendaraan'
                            );
                            $no = 1;
                            while (
                                $row = mysqli_fetch_array(
                                    $sql
                                )
                            ) { ?>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['id_kendaraan'] ?></strong></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo number_format($row['harga']) ?></td>
                                <td><?php echo $row['transmisi'] ?></td>
                                <td><?php echo $row['service'] ?></td>
                                <td><button type="button" class="btn-select btn-dark btn-sm btn" data-id="<?php echo $row['id_kendaraan']; ?>" data-nama="<?php echo $row['nama']; ?>" data-harga="<?php echo $row['harga']; ?>" data-transmisi="<?php echo $row['transmisi'] ?>" data-service="<?php echo $row['service'] ?>">Pilih</button></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Basic with Icons -->
    <div class=" col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Transaksi</h5>
                <small class="text-muted float-end">Transaksi unit</small>
            </div>
            <div class="card-body">
                <form action="submit-transaksi.php" method="POST">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Unit</label>
                        <div class="col-sm-10">
                            <input type="text" id="id_kendaraan" class="form-control" readonly name="id_kendaraan" hidden>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="nama_kendaraan" readonly name="nama" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Harga</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" id="harga" class="form-control" readonly name="harga" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Transmisi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" id="transmisi" class="form-control" readonly name="transmisi" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Service</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" id="service" class="form-control" readonly name="service" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">No KTP</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="no_ktp" class="form-control" placeholder="Ex : 17100928376127" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Nama Penyewa</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="nama_penyewa" class="form-control" placeholder="Ex : Hendra Guritno" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email Penyewa</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="email_penyewa" class="form-control" placeholder="Ex : hendra@gmail.com" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">No Hp</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="no_hp" class="form-control" placeholder="Diwajibkan No Whatsapp" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tgl Mulai</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" placeholder="Ex : 1" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tgl Selesai</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" placeholder="Ex : 1" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Durasi Sewa / Hari</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="number" name="durasi_sewa" id="jumlah" class="form-control" placeholder="Ex : 1" oninput="hitungTotalHarga()" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Total Harga</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="total_harga" id="total_harga" class="form-control" readonly />
                                <input type="text" name="status" value="Jalan" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10 text-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-select').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');
            var transmisi = $(this).data('transmisi');
            var service = $(this).data('service')
            $('#id_kendaraan').val(id);
            $('#nama_kendaraan').val(nama);
            $('#harga').val(harga);
            $('#transmisi').val(transmisi);
            $('#service').val(service);
        });
    });
</script>
<script type="text/javascript">
    function hitungTotalHarga() {
        var harga = document.getElementById("harga").value;
        var jumlah = document.getElementById("jumlah").value;
        var totalHarga = harga * jumlah;
        document.getElementById("total_harga").value = totalHarga;
    }
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#tanggal_selesai').change(function() {
            var tanggalMulai = new Date($('#tanggal_mulai').val());
            var tanggalSelesai = new Date($('#tanggal_selesai').val());
            var durasiSewa = (tanggalSelesai - tanggalMulai) / (1000 * 60 * 60 * 24) + 1;
            var harga = $('#harga').val();
            var totalHarga = durasiSewa * harga;
            $('#total_harga').val(totalHarga);
        });
    });
</script> -->