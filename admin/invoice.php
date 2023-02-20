<?php
include 'config.php';
$id = $_GET['id_transaksi'];
$sql = mysqli_query($con, "SELECT tb_transaksi.*, tb_kendaraan.*
                                FROM tb_transaksi
                                JOIN tb_kendaraan
                                ON tb_transaksi.id_kendaraan = tb_kendaraan.id_kendaraan where id_transaksi='$id'");
$data = mysqli_fetch_array($sql);
?>

<!-- Save PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/invoice.css" />
<div class="card">
    <div class="card-body">
        <div id="invoice" class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
                <span class="pull-right hidden-print">
                    <button id="export-pdf" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</button>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                </span>
                PT. Bali Transport
            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        <strong class="text-inverse">PT. Bali Transport</strong><br>
                        JL. Mandala Sari, Dangin Puri Klod, Denpasar Timur<br>
                        Denpasar, 80239<br>
                        Phone: (036) 254-7890<br>
                        Fax: (036) 456-7890
                    </address>
                </div>
                <div class="invoice-date">
                    <small>Invoice</small>
                    <div class="date text-inverse m-t-5"><?php echo $data['tanggal_mulai'] ?></div>
                    <div class="invoice-detail">
                        #<?php echo $data['id_faktur'] ?><br>
                        <?php echo $data['nama_penyewa'] ?>
                    </div>
                </div>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                            <tr>
                                <th>UNIT KENDARAAN</th>
                                <th class="text-center" width="15%">TGL SELESAI</th>
                                <th class="text-center" width="10%">HARGA</th>
                                <th class="text-center" width="15%">DURASI SEWA</th>
                                <th class="text-right" width="20%">TOTAL HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="text-inverse"><?php echo $data['nama'] ?></span><br>
                                    <small><?php echo $data['transmisi'] ?> | <?php echo $data['service'] ?> | <?php echo $data['asuransi'] ?></small>
                                </td>
                                <td class="text-center"><?php echo $data['tanggal_selesai'] ?></td>
                                <td class="text-center">Rp.<?php echo number_format($data['harga']) ?></td>
                                <td class="text-center"><?php echo $data['durasi_sewa'] ?> Hari</td>
                                <td class="text-right">Rp.<?php echo number_format($data['total_harga']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
                <!-- begin invoice-price -->
                <div class="invoice-price">
                    <div class="invoice-price-left">
                        <div class="invoice-price-row">
                            <div class="sub-price">
                                <small>HARGA /DAY</small>
                                <span class="text-inverse">Rp.<?php echo number_format($data['harga']) ?></span>
                            </div>
                            <div class="sub-price">
                                <i class="fa fa-times text-muted"></i>
                            </div>
                            <div class="sub-price">
                                <small>DURASI SEWA</small>
                                <span class="text-inverse"><?php echo $data['durasi_sewa'] ?> Hari</span>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-price-right">
                        <small>TOTAL</small> <span class="f-w-600">Rp.<?php echo number_format($data['total_harga']) ?></span>
                    </div>
                </div>
                <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
            <div class="invoice-note">
                * Make sure to read the rental requirements.
                Car rental time must be start 6 hours before pick up time.<br>
                * The Rental provider will refund your payment if the car unavailable.
                The rental provider will inform to you about car availbility<br>
                * Bring your ID card, driver1s license, and other documents as required by the rental provider.
                When you meet with the rental staff, check the car`s condition together with the staff.
                After that, read and sign the rental agreement.
            </div>
            <!-- end invoice-note -->
            <!-- begin invoice-footer -->
            <div class="invoice-footer">
                <p class="text-center m-b-5 f-w-600">
                    THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center">
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> balitransport.com</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:0362-18192302</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> balitransport@gmail.com</span>
                </p>
            </div>
            <!-- end invoice-footer -->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#export-pdf').click(function() {
            var pdf = new jsPDF('p', 'pt', 'letter');

            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#invoice')[0];

            // we support special element handlers. Register them with jQuery-style 
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors 
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },

                function(dispose) {
                    // dispose: object with X, Y of the last line add to the PDF 
                    //          this allow the insertion of new lines after html
                    pdf.save('Invoice.pdf');
                }, margins
            );
        });
    });
</script>