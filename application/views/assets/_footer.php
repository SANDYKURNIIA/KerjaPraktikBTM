<<<<<<< HEAD
</footer>
<!-- /Footer -->

</div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<script>
    $(document).ready(() => {
        setInterval(function() {
            var xd = $("#datable_filter > label");
            let isTextNode = (_, el) => el.nodeType === Node.TEXT_NODE;
            xd.each(function() {
                $(this).addClass('panel panel-title xd-text');
                $(this).contents().filter(isTextNode).remove();
            });
        }, 2000)
    });

    function convertCurenncy(angka) {
        var result = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(angka);

        return result;
    }
</script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Data table JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/dataTables-data.js"></script>

<!-- Sweet alert -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

<link href="<?= base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- Moment JavaScript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>

<!-- Bootstrap Colorpicker JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- Switchery JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>

<!-- Select2 JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Bootstrap Select JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- Bootstrap Tagsinput JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Bootstrap Touchspin JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<!-- Multiselect JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>

<!-- Bootstrap Switch JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>


<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Form Advance Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/form-advance-data.js"></script>

<!-- Slimscroll JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="<?= base_url(); ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>
<!-- Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/init.js"></script>


<!-- Bootstrap Daterangepicker JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>

<!-- Form Flie Upload Data JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/form-file-upload-data.js"></script>
<!-- <script src="<?= base_url(); ?>assets/dist/js/init.js"></script> -->
<script src="<?= base_url(); ?>assets/dist/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>

<!-- JS SUMMERNOTE -->

<!-- Summernote Plugin JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/summernote/dist/summernote.min.js"></script>

<!-- Summernote Wysuhtml5 Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/summernote-data.js"></script>
<script>
    const currentDateTime = () => {
        var tzoffset = new Date().getTimezoneOffset() * 60000; //offset in milliseconds
        var localISOString = new Date(Date.now() - tzoffset)
            .toISOString()
            .slice(0, -1);

        // convert to YYYY-MM-DDTHH:MM
        const datetimeInputString = localISOString.substring(
            0,
            ((localISOString.indexOf("T") | 0) + 6) | 0
        );
        console.log(datetimeInputString);
        return datetimeInputString;
    };

    function indo_date_js(date) {

        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        var jam = date.getHours();
        var menit = date.getMinutes();
        var detik = date.getSeconds();
        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }
        switch (bulan) {
            case 0:
                bulan = "Januari";
                break;
            case 1:
                bulan = "Februari";
                break;
            case 2:
                bulan = "Maret";
                break;
            case 3:
                bulan = "April";
                break;
            case 4:
                bulan = "Mei";
                break;
            case 5:
                bulan = "Juni";
                break;
            case 6:
                bulan = "Juli";
                break;
            case 7:
                bulan = "Agustus";
                break;
            case 8:
                bulan = "September";
                break;
            case 9:
                bulan = "Oktober";
                break;
            case 10:
                bulan = "November";
                break;
            case 11:
                bulan = "Desember";
                break;
        }
        var tampilTanggal = tanggal + " " + bulan + " " + tahun;
        var tampilWaktu = "Jam: " + jam + ":" + menit + ":" + detik;
        return tampilTanggal;
    }

    function bulan_date_js(date) {

        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        var jam = date.getHours();
        var menit = date.getMinutes();
        var detik = date.getSeconds();
        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }
        switch (bulan) {
            case 0:
                bulan = "Januari";
                break;
            case 1:
                bulan = "Februari";
                break;
            case 2:
                bulan = "Maret";
                break;
            case 3:
                bulan = "April";
                break;
            case 4:
                bulan = "Mei";
                break;
            case 5:
                bulan = "Juni";
                break;
            case 6:
                bulan = "Juli";
                break;
            case 7:
                bulan = "Agustus";
                break;
            case 8:
                bulan = "September";
                break;
            case 9:
                bulan = "Oktober";
                break;
            case 10:
                bulan = "November";
                break;
            case 11:
                bulan = "Desember";
                break;
        }
        var tampilTanggal =  bulan + " " + tahun;
        return tampilTanggal;
    }
</script>
<script>
	$(document).ready(function() {
		$.fn.modal.Constructor.prototype.enforceFocus = function () {};
	});
</script>
</body>

=======
</footer>
<!-- /Footer -->

</div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<script>
    $(document).ready(() => {
        setInterval(function() {
            var xd = $("#datable_filter > label");
            let isTextNode = (_, el) => el.nodeType === Node.TEXT_NODE;
            xd.each(function() {
                $(this).addClass('panel panel-title xd-text');
                $(this).contents().filter(isTextNode).remove();
            });
        }, 2000)
    });

    function convertCurenncy(angka) {
        var result = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(angka);

        return result;
    }
</script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Data table JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/dataTables-data.js"></script>

<!-- Sweet alert -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

<link href="<?= base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- Moment JavaScript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/bower_components/moment/min/moment-with-locales.min.js"></script>

<!-- Bootstrap Colorpicker JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- Switchery JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>

<!-- Select2 JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Bootstrap Select JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- Bootstrap Tagsinput JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Bootstrap Touchspin JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<!-- Multiselect JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>

<!-- Bootstrap Switch JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>


<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Form Advance Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/form-advance-data.js"></script>

<!-- Slimscroll JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="<?= base_url(); ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>
<!-- Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/init.js"></script>


<!-- Bootstrap Daterangepicker JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>

<!-- Form Flie Upload Data JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/form-file-upload-data.js"></script>
<!-- <script src="<?= base_url(); ?>assets/dist/js/init.js"></script> -->
<script src="<?= base_url(); ?>assets/dist/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>

<!-- JS SUMMERNOTE -->

<!-- Summernote Plugin JavaScript -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/summernote/dist/summernote.min.js"></script>

<!-- Summernote Wysuhtml5 Init JavaScript -->
<script src="<?= base_url(); ?>assets/dist/js/summernote-data.js"></script>
<script>
    const currentDateTime = () => {
        var tzoffset = new Date().getTimezoneOffset() * 60000; //offset in milliseconds
        var localISOString = new Date(Date.now() - tzoffset)
            .toISOString()
            .slice(0, -1);

        // convert to YYYY-MM-DDTHH:MM
        const datetimeInputString = localISOString.substring(
            0,
            ((localISOString.indexOf("T") | 0) + 6) | 0
        );
        console.log(datetimeInputString);
        return datetimeInputString;
    };

    function indo_date_js(date) {

        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        var jam = date.getHours();
        var menit = date.getMinutes();
        var detik = date.getSeconds();
        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }
        switch (bulan) {
            case 0:
                bulan = "Januari";
                break;
            case 1:
                bulan = "Februari";
                break;
            case 2:
                bulan = "Maret";
                break;
            case 3:
                bulan = "April";
                break;
            case 4:
                bulan = "Mei";
                break;
            case 5:
                bulan = "Juni";
                break;
            case 6:
                bulan = "Juli";
                break;
            case 7:
                bulan = "Agustus";
                break;
            case 8:
                bulan = "September";
                break;
            case 9:
                bulan = "Oktober";
                break;
            case 10:
                bulan = "November";
                break;
            case 11:
                bulan = "Desember";
                break;
        }
        var tampilTanggal = tanggal + " " + bulan + " " + tahun;
        var tampilWaktu = "Jam: " + jam + ":" + menit + ":" + detik;
        return tampilTanggal;
    }

    function bulan_date_js(date) {

        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        var jam = date.getHours();
        var menit = date.getMinutes();
        var detik = date.getSeconds();
        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }
        switch (bulan) {
            case 0:
                bulan = "Januari";
                break;
            case 1:
                bulan = "Februari";
                break;
            case 2:
                bulan = "Maret";
                break;
            case 3:
                bulan = "April";
                break;
            case 4:
                bulan = "Mei";
                break;
            case 5:
                bulan = "Juni";
                break;
            case 6:
                bulan = "Juli";
                break;
            case 7:
                bulan = "Agustus";
                break;
            case 8:
                bulan = "September";
                break;
            case 9:
                bulan = "Oktober";
                break;
            case 10:
                bulan = "November";
                break;
            case 11:
                bulan = "Desember";
                break;
        }
        var tampilTanggal =  bulan + " " + tahun;
        return tampilTanggal;
    }
</script>
<script>
	$(document).ready(function() {
		$.fn.modal.Constructor.prototype.enforceFocus = function () {};
	});
</script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>