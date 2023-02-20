<?php
include 'config.php';
?>
<?php if (isset($_GET['success-kendaraan'])) { ?>
    <div id="toastSuccess" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Tambah Unit Berhasil</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Tambah data unit kendaraan baru berhasil dilakukan.</div>
    </div>
<?php unset($_GET['success-kendaraan']);
} ?>
<?php if (isset($_GET['failed-kendaraan'])) { ?>
    <div id="toastFailed" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" data-autohide="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Tambah Unit Gagal</div>
            <small>1 second ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Tambah data unit kendaraan baru gagal dilakukan.</div>
    </div>
<?php } ?>
<div class="card">
    <h5 class="card-header">Data Kendaraan</h5>
    <div class="card-body">
        <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalKendaraan">Tambah Kendaraan</button>
        <!-- Modal -->
        <div class="modal fade" id="modalKendaraan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Unit Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="submit-kendaraan.php" method="POST">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nama Unit (Kendaraan)</label>
                                    <input type="text" name="nama" id="nameBasic" class="form-control" placeholder="Masukan Nama Kendaraan" />
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Merek</label>
                                    <input type="text" name="merek" id="emailBasic" class="form-control" placeholder="Masukan Merek Kendaraan" />
                                </div>
                                <div class="col mb-3">
                                    <label for="dobBasic" class="form-label">Fuel (BBM)</label>
                                    <input type="text" name="fuel" id="dobBasic" class="form-control" placeholder="Masukan Jenis BBM" />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Passenger</label>
                                    <input type="text" name="passenger" id="nameBasic" class="form-control" placeholder="Masukan Jml. Penumpang" />
                                </div>
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Harga /Day</label>
                                    <input type="text" name="harga" id="nameBasic" class="form-control" placeholder="Harga IDR" />
                                </div>
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Transmisi</label>
                                    <select name="transmisi" id="" class="form-control">
                                        <option value="...">Pilih...</option>
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Asuransi</label>
                                    <input type="text" name="asuransi" id="nameBasic" class="form-control" placeholder="Masukan Jml. Penumpang" />
                                </div>
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Service</label>
                                    <select name="service" id="" class="form-control">
                                        <option value="...">Pilih...</option>
                                        <option value="With Driver">With Driver</option>
                                        <option value="Without Driver">Without Driver</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-mb-1 text-end">
                                    <button type="submit" class="btn btn-success mx-1">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <div class="table-responsive text-nowrap">
            <table id="data-kendaraan" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama Kendaraan</th>
                        <th>Merek</th>
                        <th>Fuel</th>
                        <th>Passenger</th>
                        <th>Harga</th>
                        <th>Transmisi</th>
                        <th>Asuransi</th>
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
                            <td><?php echo $no++ ?></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['id_kendaraan'] ?></strong></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['merek'] ?></td>
                            <td><?php echo $row['fuel'] ?></td>
                            <td><?php echo $row['passenger'] ?></td>
                            <td><?php echo number_format($row['harga']) ?></td>
                            <td><?php echo $row['transmisi'] ?></td>
                            <td><?php echo $row['asuransi'] ?></td>
                            <td><?php echo $row['service'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="index.php?module=edit-kendaraan&id_kendaraan=<?php echo $row['id_kendaraan']?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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