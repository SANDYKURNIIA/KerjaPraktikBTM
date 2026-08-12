<<<<<<< HEAD

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">
            <strong>Pemantauan Pasien ICU </strong>
          </h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <!-- Hidden Fields -->
            <div class="form-group">
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
            </div>

            <!-- No RM -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">No. RM :</label>
                <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
              </div>
            </div>

            <!-- Nama Pasien -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Nama Pasien :</label>
                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                <input type="hidden" id="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>">
              </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">
              </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Tanggal Lahir :</label>
                <?php
                  $tanggal_indonesia = date("Y/m/d", strtotime($tgl_lahir));
                ?>
                <input type="text" id="tanggal_lahir" readonly class="form-control" value="<?= $tanggal_indonesia ?>">
              </div>
            </div>
          </div> 
        </div> 
      </div>
      <div class="mt-20">FORM INPUT</div> 
      <hr>
        <div class="row">
        <!-- Sistolik -->
        <div class="form-group col-md-6">
            <label class="control-label mb-10 text-left">SISTOLIK :</label>
            <div class="has-success">
            <input  
                type="number" 
                id="sistolik"  
                class="form-control" 
                placeholder="Masukkan nilai sistolik (mmHg)"
            >
            <input 
                type="time" 
                id="waktu_sistolik" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- Diastolik -->
        <div class="form-group col-md-6">
            <label class="control-label mb-10 text-left">DIASTOLIK :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="diastolik"  
                class="form-control" 
                placeholder="Masukkan nilai diastolik (mmHg)"
            >
            <input 
                type="time" 
                id="waktu_diastolik" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- Nadi -->
        <div class="form-group col-md-6 mt-20">
            <label class="control-label mb-10 text-left">NADI :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="nadi"  
                class="form-control" 
                placeholder="Masukkan nilai nadi (X/Menit)"
            >
            <input 
                type="time" 
                id="waktu_nadi" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- Suhu -->
        <div class="form-group col-md-6 mt-20">
            <label class="control-label mb-10 text-left">SUHU :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="suhu"  
                class="form-control" 
                placeholder="Masukkan nilai suhu (°C)"
            >
            <input 
                type="time" 
                id="waktu_suhu" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- RR -->
        <div class="form-group col-md-6 mt-20">
            <label class="control-label mb-10 text-left">RR (Respiratory Rate) :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="rr"  
                class="form-control" 
                placeholder="Masukkan nilai RR (Napas/Menit)"
            >
            <input 
                type="time" 
                id="waktu_rr" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>
        </div>

        <button class="btn btn-success mt-30 mb-30" onclick="simpan()" id="tombolSimpan">Simpan</button>
        <button class="btn btn-warning mt-30 mb-30 " onclick="edit()" id="tombolEdit" style="display: none;">Ubah Data</button>

        <span style="display: block;">Grafik Per Hari MCU</span><hr>
        
        <input type="number" name="id" id="id" hidden>
        <div class="form-group col-md-12 mt-40" >
            <label for="tanggal_grafik" class="control-label mb-10 text-left ">Pilih Tanggal Data :  </label>
            <div class="has-success mb-20 rounded">
                <input type="date" name="tanggal_grafik" id="tanggal_grafik" class="form-control">
            </div>
            <button type="button" class="btn btn-success " style="border-radius: 1000px; " id="toggleGrafik">
                Tampilkan Grafik
            </button>
            <script>
                // Toggle grafik dan pesan
                document.getElementById("toggleGrafik").addEventListener("click", function() {
                    const chart = document.getElementById("lineChart");
                    const message = document.getElementById("kosong_grafik");

                    // Toggle visibility
                    if (chart.style.display === "none") {
                        chart.style.display = "block";  // Tampilkan grafik
                    } else {
                        chart.style.display = "none";  // Sembunyikan grafik
                    }
                });

                // Simulasikan klik untuk fokus ke input tanggal
                document.getElementById("btnAmbilTanggal").addEventListener("click", function () {
                    const inputTanggal = document.getElementById("tanggal_grafik");

                    // Simulasikan klik (buka date picker)
                    inputTanggal.focus();
                });
            </script>
            <h5 style="font-weight: bold; margin-top: 100px; margin-bottom: 100px; text-align: center; display: none;" id="kosong_grafik">Tidak Ada Data Grafik Untuk Ditampilkan</h5>

            <canvas id="lineChart" style="display: none;">
            </canvas>
        </div>

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                <div class="table-wrap">
                    <div class="table-responsive">
                    <table class="table table-hover display pb-60" id="tabel_catatan">
                        <thead>
                        <tr class="bg-success">
                            <th>NO</th>
                            <th>Edit</th>
                            <th>HAPUS</th>
                            <th>SISTOLIK</th>
                            <th>Waktu Ukur SISTOLIK</th>
                            <th>DIASTOLIK</th>
                            <th>Waktu ukur DIASTOLIK</th>
                            <th>NADI</th>
                            <th>Waktu Ukur NADI</th>
                            <th>SUHU</th>
                            <th>Waktu Ukur SUHU</th>
                            <th>RR</th>
                            <th>Waktu Ukur RR</th>
                            <th>Tanggal Data Input</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr class="bg-success">
                            <th>NO</th>
                            <th>Edit</th>
                            <th>HAPUS</th>
                            <th>SISTOLIK</th>
                            <th>Waktu Ukur SISTOLIK</th>
                            <th>DIASTOLIK</th>
                            <th>Waktu ukur DIASTOLIK</th>
                            <th>NADI</th>
                            <th>Waktu Ukur NADI</th>
                            <th>SUHU</th>
                            <th>Waktu Ukur SUHU</th>
                            <th>RR</th>
                            <th>Waktu Ukur RR</th>
                            <th>Tanggal Data Input</th>
                        </tr>
                        </tfoot>
                        <tbody style="color: black">
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

    </div> 
  </div>
</div>


<script src="<?= base_url("assets/vendors/chart.js/chart24_10_2025.min.js") ?>"></script>

<script>
    function simpan() {
        const id_pelayanan = $('#inPel').val();
        const id_history = $('#inHis').val();

        const sistolik = $('#sistolik').val();
        const waktu_sistolik = $('#waktu_sistolik').val();

        const diastolik = $('#diastolik').val();
        const waktu_diastolik = $('#waktu_diastolik').val();

        const nadi = $('#nadi').val();
        const waktu_nadi = $('#waktu_nadi').val();

        const suhu = $('#suhu').val();
        const waktu_suhu = $('#waktu_suhu').val();

        const rr = $('#rr').val();
        const waktu_rr = $('#waktu_rr').val();
      
      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/insert_data",
            method: "POST",
            dataType: 'json',
            data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            
            sistolik: sistolik,
            waktu_sistolik: waktu_sistolik,

            diastolik: diastolik,
            waktu_diastolik: waktu_diastolik,

            nadi: nadi,
            waktu_nadi: waktu_nadi,

            suhu: suhu,
            waktu_suhu: waktu_suhu,

            rr: rr,
            waktu_rr: waktu_rr,

            },
            success: function(response) {
            if (response.status === "success") {
                swal({
                    title: "Good job!",
                    type: "success",
                    text: "Data berhasil dihapus",
                    confirmButtonColor: "#3cb878",
                    timer: 2000, // durasi swal ditampilkan
                    showConfirmButton: false // biar swal otomatis hilang
                });

                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }

    function edit() {

        const id_pelayanan = $('#inPel').val();
        const id = $('#id').val();
        const id_history = $('#inHis').val();

        const sistolik = $('#sistolik').val();
        const waktu_sistolik = $('#waktu_sistolik').val();

        const diastolik = $('#diastolik').val();
        const waktu_diastolik = $('#waktu_diastolik').val();

        const nadi = $('#nadi').val();
        const waktu_nadi = $('#waktu_nadi').val();

        const suhu = $('#suhu').val();
        const waktu_suhu = $('#waktu_suhu').val();

        const rr = $('#rr').val();
        const waktu_rr = $('#waktu_rr').val();
      
      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/update_data",
            method: "POST",
            dataType: 'json',
            data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            id : id,
            
            sistolik: sistolik,
            waktu_sistolik: waktu_sistolik,

            diastolik: diastolik,
            waktu_diastolik: waktu_diastolik,

            nadi: nadi,
            waktu_nadi: waktu_nadi,

            suhu: suhu,
            waktu_suhu: waktu_suhu,

            rr: rr,
            waktu_rr: waktu_rr,

            },
            success: function(response) {
            if (response.status === "success") {
                swal({
                    title: "Good job!",
                    type: "success",
                    text: "Data berhasil dihapus",
                    confirmButtonColor: "#3cb878",
                    timer: 2000, // durasi swal ditampilkan
                    showConfirmButton: false // biar swal otomatis hilang
                });

                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }

    function hapus(id) {      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/hapus_data",
            method: "POST",
            dataType: 'json',
            data: {
            id: id,
            },
            success: function(response) {
            if (response.status === "success") {
                swal({
                    title: "Good job!",
                    type: "success",
                    text: "Data berhasil dihapus",
                    confirmButtonColor: "#3cb878",
                    timer: 2000, // durasi swal ditampilkan
                    showConfirmButton: false // biar swal otomatis hilang
                });

                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }

    function get_data_by_id(id) {

      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/get_data_by_id",
            method: "POST",
            dataType: 'json',
            data: {
            id: id
            },
            success: function(response) {
            if (response.status === "success") {
                $('#tombolSimpan').hide();
                $('#tombolEdit').show();
                $('#sistolik').val(response.data[0].sistolik);
                $('#waktu_sistolik').val(response.data[0].wakur_sistolik);
                $('#diastolik').val(response.data[0].diastolik);
                $('#waktu_diastolik').val(response.data[0].wakur_diastolik);
                $('#nadi').val(response.data[0].nadi);
                $('#waktu_nadi').val(response.data[0].wakur_nadi);
                $('#suhu').val(response.data[0].suhu);
                $('#waktu_suhu').val(response.data[0].wakur_suhu);
                $('#rr').val(response.data[0].rr);
                $('#waktu_rr').val(response.data[0].wakur_rr);
                $('#id').val(response.data[0].id_catatan_tekanan_darah);
                $('html, body').animate({
                    scrollTop: $('#tanggal_lahir').offset().top
                }, 800); // durasi 800ms = 0.8 detik
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }
</script>

<script>

</script>


<script>
    const id_pelayanan = $('#inPel').val();
    const id_history = $('#inHis').val();
    console.log("jalan")

    // Grafik Mulai
    $(document).ready(function() {
         $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/tampil_list_grafik",
            method: "POST",
            dataType: 'json',
            data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            },
            success: function(response) {
            if (response.status === "success") {
                const ctx = document.getElementById('lineChart').getContext('2d');

                if(response.labels.length > 0){
                    $('#kosong_grafik').hide();
                    // $('#lineChart').show();

                }else{
                    $('#kosong_grafik').show();
                    // $('#lineChart').hide();

                }

                new Chart(ctx, {
                type: 'line',
                data: {
                    labels:response.labels, 
                    datasets: [
                    {
                        label: 'Sistolik (mmHg)',
                        data: response.sistolik,
                        yAxisID: 'yTekanan',
                        borderColor: 'red',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        fill: false,
                        pointStyle: 'triangle'
                    },
                    {
                        label: 'Suhu (°C)',
                        data: response.suhu,
                        yAxisID: 'ySuhu',
                        borderColor: 'purple',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        fill: false,
                        pointStyle: 'circle'
                    },
                    {
                        label: 'Diastolik (mmHg)',
                        data: response.diastolik,
                        yAxisID: 'yTekanan',
                        borderColor: 'black',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        fill: false, // aktifkan arsiran di bawah garis
                        pointStyle: 'rectRot'
                    },
                    {
                        label: 'Nadi (x/menit)',
                        data: response.nadi,
                        yAxisID: 'yNadi',
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)', // 🟢 Warna arsiran transparan
                        borderDash: [5,5],
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 4,
                        fill: "-1", // aktifkan arsiran
                        pointStyle: 'cross'
                    },
                    {
                        label: 'RR (napas/menit)',
                        data: response.rr,
                        yAxisID: 'yRR',
                        borderColor: 'green',
                        borderWidth: 2,
                        borderDash: [2,2],
                        tension: 0.3,
                        fill: false,
                        pointRadius: 4
                    }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        title: {
                        display: true,
                        text: 'Grafik Observasi Pasien '+ response.tgl_data +' (Tekanan Darah, Nadi, RR, Suhu) ' ,
                        font: { size: 18 }
                        },
                        legend: { position: 'bottom' }
                    },
                    scales: {
                        // 🟥 Gabungan sistolik & diastolik
                        yTekanan: {
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Tekanan Darah (mmHg)',
                            color: 'red'
                        },
                        grid: { color: 'rgba(0,0,0,0.1)' }
                        },
                        ySuhu: {
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Suhu (°C)',
                            color: 'purple'
                        },
                        grid: { color: 'rgba(0,0,0,0.1)' }
                        },
                        // 🟦 Nadi
                        yNadi: {
                        position: 'right',
                        title: {
                            display: true,
                            text: 'Nadi (x/menit)',
                            color: 'blue'
                        },
                        grid: { drawOnChartArea: false }
                        },
                        // 🟩 RR
                        yRR: {
                        position: 'right',
                        offset: true,
                        title: {
                            display: true,
                            text: 'RR (napas/menit)',
                            color: 'green'
                        },
                        grid: { drawOnChartArea: false }
                        },
                        x: {
                        title: { display: true, text: 'Waktu Pemeriksaan' },
                        grid: { color: 'rgba(0,0,0,0.1)' }
                        }
                    }
                }
                });

            }else {
                $('#kosong_grafik').show();
                $('#lineChart').hide();
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
    });

    // Tabel
    let table;

    $(document).ready(function() {

        $.fn.dataTable.ext.errMode = 'none';
        table = $('#tabel_catatan').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sSearch": "Cari:",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },

            "ajax": {
                "url": "<?php echo base_url('Erm_pemantauan_pasien_icu/tampil_list_pemantauan_TD'); ?>",
                "type": "POST",
                "data": function(d) {
                    d.id_pelayanan = id_pelayanan;
                    d.id_history = id_history;
                    d.tgl_data = $('#tanggal_grafik').val(); // ambil data terbaru
                }
            },

            "processing": true,
            "deferRender": true,
            "order": [],
        });

    });

    $('#tanggal_grafik').on('change', function() {
        table.ajax.reload(); 
    });

</script>


<script>
$(document).ready(function() {
    let chartInstance = null; // simpan chart agar bisa di-destroy

    $('#tanggal_grafik').on('change', function() {
        let tanggal_grafik = $(this).val();
        if (!tanggal_grafik) return;

        $.ajax({
            url: "<?= base_url('Erm_pemantauan_pasien_icu/tampil_list_grafik') ?>",
            method: "POST",
            dataType: "json",
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                tanggal_grafik: tanggal_grafik
            },
            success: function(response) {
                if (response.status === "success") { 

                    if(response.labels.length > 0){
                        $('#kosong_grafik').hide();
                        // $('#lineChart').show();

                    }else{
                        $('#kosong_grafik').show();
                        // $('#lineChar').hide();
                    }

                    swal({
                        title: "Berhasil!! Menampilkan Data Tgl : " + tanggal_grafik,
                        type: "success",
                        text: "OK",
                        confirmButtonColor: "#3cb878",
                    });
                    const canvas = document.getElementById('lineChart');
                    const ctx = canvas.getContext('2d');

                    // 🧹 Pastikan chart lama dihancurkan benar-benar
                    if (chartInstance) {
                        chartInstance.destroy();
                    } else {
                        // Cara tambahan untuk Chart.js v4+
                        const existingChart = Chart.getChart("lineChart");
                        if (existingChart) existingChart.destroy();
                    }

                    // 🎨 Buat chart baru
                    chartInstance = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: response.labels || [],
                            datasets: [
                                {
                                    label: 'Sistolik (mmHg)',
                                    data: response.sistolik || [],
                                    yAxisID: 'yTekanan',
                                    borderColor: 'black',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    backgroundColor: 'rgba(255, 0, 0, 0.1)', // 🟢 Warna arsiran transparan
                                    pointRadius: 5,
                                    fill: '1',
                                    pointStyle: 'triangle'
                                },
                                {
                                    label: 'Diastolik (mmHg)',
                                    data: response.diastolik || [],
                                    yAxisID: 'yTekanan',
                                    borderColor: 'black',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 5,
                                    fill: false,
                                    pointStyle: 'rectRot'
                                },
                                {
                                    label: 'Nadi (x/menit)',
                                    data: response.nadi || [],
                                    yAxisID: 'yNadi',
                                    borderColor: 'red',
                                    borderDash: [5,5],
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 4,
                                    fill: false,
                                    pointStyle: 'cross'
                                },
                                {
                                    label: 'RR (napas/menit)',
                                    data: response.rr || [],
                                    yAxisID: 'yRR',
                                    borderColor: 'blue',
                                    borderDash: [2,2],
                                    borderWidth: 2,
                                    tension: 0.3,
                                    fill: false,
                                    pointRadius: 4
                                },
                                {
                                    label: 'Suhu (°C)',
                                    data: response.suhu || [],
                                    yAxisID: 'ySuhu',
                                    borderColor: 'green',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 5,
                                    fill: false,
                                    pointStyle: 'circle'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            interaction: { mode: 'index', intersect: false },
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Grafik Observasi Pasien '+ response.tgl_data +' (Tekanan Darah, Nadi, RR, Suhu) ' ,
                                    font: { size: 18 }
                                },
                                legend: { position: 'bottom' }
                            },
                            scales: {
                                yTekanan: {
                                    position: 'left',
                                    title: {
                                        display: true,
                                        text: 'Tekanan Darah (mmHg)',
                                        color: 'red'
                                    }
                                },
                                ySuhu: {
                                    position: 'left',
                                    title: {
                                        display: true,
                                        text: 'Suhu (°C)',
                                        color: 'purple'
                                    }
                                },
                                yNadi: {
                                    position: 'right',
                                    title: {
                                        display: true,
                                        text: 'Nadi (x/menit)',
                                        color: 'blue'
                                    },
                                    grid: { drawOnChartArea: false }
                                },
                                yRR: {
                                    position: 'right',
                                    offset: true,
                                    title: {
                                        display: true,
                                        text: 'RR (napas/menit)',
                                        color: 'green'
                                    },
                                    grid: { drawOnChartArea: false }
                                },
                                x: {
                                    title: { display: true, text: 'Waktu Pemeriksaan' }
                                }
                            }
                        }
                    });
                } else {
                    $('#kosong_grafik').show();
                    $('#lineChart').hide();

                    swal({
                        title: "Tidak Ada Data!! Tgl : " + tanggal_grafik,
                        type: "warning",
                        text: "Tolong Input lagi yang baru",
                        confirmButtonColor: "#3cb878",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Gagal !!!",
                    type: "warning",
                    text: "Terjadi kesalahan pada server, silakan coba lagi.",
                    confirmButtonColor: "#3cb878",
                });
            }
        });
    });
});
=======

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">
            <strong>Pemantauan Pasien ICU </strong>
          </h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <!-- Hidden Fields -->
            <div class="form-group">
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
            </div>

            <!-- No RM -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">No. RM :</label>
                <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
              </div>
            </div>

            <!-- Nama Pasien -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Nama Pasien :</label>
                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                <input type="hidden" id="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>">
              </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">
              </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Tanggal Lahir :</label>
                <?php
                  $tanggal_indonesia = date("Y/m/d", strtotime($tgl_lahir));
                ?>
                <input type="text" id="tanggal_lahir" readonly class="form-control" value="<?= $tanggal_indonesia ?>">
              </div>
            </div>
          </div> 
        </div> 
      </div>
      <div class="mt-20">FORM INPUT</div> 
      <hr>
        <div class="row">
        <!-- Sistolik -->
        <div class="form-group col-md-6">
            <label class="control-label mb-10 text-left">SISTOLIK :</label>
            <div class="has-success">
            <input  
                type="number" 
                id="sistolik"  
                class="form-control" 
                placeholder="Masukkan nilai sistolik (mmHg)"
            >
            <input 
                type="time" 
                id="waktu_sistolik" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- Diastolik -->
        <div class="form-group col-md-6">
            <label class="control-label mb-10 text-left">DIASTOLIK :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="diastolik"  
                class="form-control" 
                placeholder="Masukkan nilai diastolik (mmHg)"
            >
            <input 
                type="time" 
                id="waktu_diastolik" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- Nadi -->
        <div class="form-group col-md-6 mt-20">
            <label class="control-label mb-10 text-left">NADI :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="nadi"  
                class="form-control" 
                placeholder="Masukkan nilai nadi (X/Menit)"
            >
            <input 
                type="time" 
                id="waktu_nadi" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- Suhu -->
        <div class="form-group col-md-6 mt-20">
            <label class="control-label mb-10 text-left">SUHU :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="suhu"  
                class="form-control" 
                placeholder="Masukkan nilai suhu (°C)"
            >
            <input 
                type="time" 
                id="waktu_suhu" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>

        <!-- RR -->
        <div class="form-group col-md-6 mt-20">
            <label class="control-label mb-10 text-left">RR (Respiratory Rate) :</label>
            <div class="has-success">
            <input 
                type="number" 
                id="rr"  
                class="form-control" 
                placeholder="Masukkan nilai RR (Napas/Menit)"
            >
            <input 
                type="time" 
                id="waktu_rr" 
                class="form-control"
                style="width: 50%; margin-top: 5px; border: 1px solid #ccc; font-size: 12px;"
            >
            <small class="text-muted">Waktu pengukuran</small>
            </div>
        </div>
        </div>

        <button class="btn btn-success mt-30 mb-30" onclick="simpan()" id="tombolSimpan">Simpan</button>
        <button class="btn btn-warning mt-30 mb-30 " onclick="edit()" id="tombolEdit" style="display: none;">Ubah Data</button>

        <span style="display: block;">Grafik Per Hari MCU</span><hr>
        
        <input type="number" name="id" id="id" hidden>
        <div class="form-group col-md-12 mt-40" >
            <label for="tanggal_grafik" class="control-label mb-10 text-left ">Pilih Tanggal Data :  </label>
            <div class="has-success mb-20 rounded">
                <input type="date" name="tanggal_grafik" id="tanggal_grafik" class="form-control">
            </div>
            <button type="button" class="btn btn-success " style="border-radius: 1000px; " id="toggleGrafik">
                Tampilkan Grafik
            </button>
            <script>
                // Toggle grafik dan pesan
                document.getElementById("toggleGrafik").addEventListener("click", function() {
                    const chart = document.getElementById("lineChart");
                    const message = document.getElementById("kosong_grafik");

                    // Toggle visibility
                    if (chart.style.display === "none") {
                        chart.style.display = "block";  // Tampilkan grafik
                    } else {
                        chart.style.display = "none";  // Sembunyikan grafik
                    }
                });

                // Simulasikan klik untuk fokus ke input tanggal
                document.getElementById("btnAmbilTanggal").addEventListener("click", function () {
                    const inputTanggal = document.getElementById("tanggal_grafik");

                    // Simulasikan klik (buka date picker)
                    inputTanggal.focus();
                });
            </script>
            <h5 style="font-weight: bold; margin-top: 100px; margin-bottom: 100px; text-align: center; display: none;" id="kosong_grafik">Tidak Ada Data Grafik Untuk Ditampilkan</h5>

            <canvas id="lineChart" style="display: none;">
            </canvas>
        </div>

        <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                <div class="table-wrap">
                    <div class="table-responsive">
                    <table class="table table-hover display pb-60" id="tabel_catatan">
                        <thead>
                        <tr class="bg-success">
                            <th>NO</th>
                            <th>Edit</th>
                            <th>HAPUS</th>
                            <th>SISTOLIK</th>
                            <th>Waktu Ukur SISTOLIK</th>
                            <th>DIASTOLIK</th>
                            <th>Waktu ukur DIASTOLIK</th>
                            <th>NADI</th>
                            <th>Waktu Ukur NADI</th>
                            <th>SUHU</th>
                            <th>Waktu Ukur SUHU</th>
                            <th>RR</th>
                            <th>Waktu Ukur RR</th>
                            <th>Tanggal Data Input</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr class="bg-success">
                            <th>NO</th>
                            <th>Edit</th>
                            <th>HAPUS</th>
                            <th>SISTOLIK</th>
                            <th>Waktu Ukur SISTOLIK</th>
                            <th>DIASTOLIK</th>
                            <th>Waktu ukur DIASTOLIK</th>
                            <th>NADI</th>
                            <th>Waktu Ukur NADI</th>
                            <th>SUHU</th>
                            <th>Waktu Ukur SUHU</th>
                            <th>RR</th>
                            <th>Waktu Ukur RR</th>
                            <th>Tanggal Data Input</th>
                        </tr>
                        </tfoot>
                        <tbody style="color: black">
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

    </div> 
  </div>
</div>


<script src="<?= base_url("assets/vendors/chart.js/chart24_10_2025.min.js") ?>"></script>

<script>
    function simpan() {
        const id_pelayanan = $('#inPel').val();
        const id_history = $('#inHis').val();

        const sistolik = $('#sistolik').val();
        const waktu_sistolik = $('#waktu_sistolik').val();

        const diastolik = $('#diastolik').val();
        const waktu_diastolik = $('#waktu_diastolik').val();

        const nadi = $('#nadi').val();
        const waktu_nadi = $('#waktu_nadi').val();

        const suhu = $('#suhu').val();
        const waktu_suhu = $('#waktu_suhu').val();

        const rr = $('#rr').val();
        const waktu_rr = $('#waktu_rr').val();
      
      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/insert_data",
            method: "POST",
            dataType: 'json',
            data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            
            sistolik: sistolik,
            waktu_sistolik: waktu_sistolik,

            diastolik: diastolik,
            waktu_diastolik: waktu_diastolik,

            nadi: nadi,
            waktu_nadi: waktu_nadi,

            suhu: suhu,
            waktu_suhu: waktu_suhu,

            rr: rr,
            waktu_rr: waktu_rr,

            },
            success: function(response) {
            if (response.status === "success") {
                swal({
                    title: "Good job!",
                    type: "success",
                    text: "Data berhasil dihapus",
                    confirmButtonColor: "#3cb878",
                    timer: 2000, // durasi swal ditampilkan
                    showConfirmButton: false // biar swal otomatis hilang
                });

                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }

    function edit() {

        const id_pelayanan = $('#inPel').val();
        const id = $('#id').val();
        const id_history = $('#inHis').val();

        const sistolik = $('#sistolik').val();
        const waktu_sistolik = $('#waktu_sistolik').val();

        const diastolik = $('#diastolik').val();
        const waktu_diastolik = $('#waktu_diastolik').val();

        const nadi = $('#nadi').val();
        const waktu_nadi = $('#waktu_nadi').val();

        const suhu = $('#suhu').val();
        const waktu_suhu = $('#waktu_suhu').val();

        const rr = $('#rr').val();
        const waktu_rr = $('#waktu_rr').val();
      
      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/update_data",
            method: "POST",
            dataType: 'json',
            data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            id : id,
            
            sistolik: sistolik,
            waktu_sistolik: waktu_sistolik,

            diastolik: diastolik,
            waktu_diastolik: waktu_diastolik,

            nadi: nadi,
            waktu_nadi: waktu_nadi,

            suhu: suhu,
            waktu_suhu: waktu_suhu,

            rr: rr,
            waktu_rr: waktu_rr,

            },
            success: function(response) {
            if (response.status === "success") {
                swal({
                    title: "Good job!",
                    type: "success",
                    text: "Data berhasil dihapus",
                    confirmButtonColor: "#3cb878",
                    timer: 2000, // durasi swal ditampilkan
                    showConfirmButton: false // biar swal otomatis hilang
                });

                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }

    function hapus(id) {      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/hapus_data",
            method: "POST",
            dataType: 'json',
            data: {
            id: id,
            },
            success: function(response) {
            if (response.status === "success") {
                swal({
                    title: "Good job!",
                    type: "success",
                    text: "Data berhasil dihapus",
                    confirmButtonColor: "#3cb878",
                    timer: 2000, // durasi swal ditampilkan
                    showConfirmButton: false // biar swal otomatis hilang
                });

                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }

    function get_data_by_id(id) {

      
        $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/get_data_by_id",
            method: "POST",
            dataType: 'json',
            data: {
            id: id
            },
            success: function(response) {
            if (response.status === "success") {
                $('#tombolSimpan').hide();
                $('#tombolEdit').show();
                $('#sistolik').val(response.data[0].sistolik);
                $('#waktu_sistolik').val(response.data[0].wakur_sistolik);
                $('#diastolik').val(response.data[0].diastolik);
                $('#waktu_diastolik').val(response.data[0].wakur_diastolik);
                $('#nadi').val(response.data[0].nadi);
                $('#waktu_nadi').val(response.data[0].wakur_nadi);
                $('#suhu').val(response.data[0].suhu);
                $('#waktu_suhu').val(response.data[0].wakur_suhu);
                $('#rr').val(response.data[0].rr);
                $('#waktu_rr').val(response.data[0].wakur_rr);
                $('#id').val(response.data[0].id_catatan_tekanan_darah);
                $('html, body').animate({
                    scrollTop: $('#tanggal_lahir').offset().top
                }, 800); // durasi 800ms = 0.8 detik
            } else {
                alert('Error: ' + response.message);
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
        return false;
    }
</script>

<script>

</script>


<script>
    const id_pelayanan = $('#inPel').val();
    const id_history = $('#inHis').val();
    console.log("jalan")

    // Grafik Mulai
    $(document).ready(function() {
         $.ajax({
            url: "<?php echo base_url() ?>Erm_pemantauan_pasien_icu/tampil_list_grafik",
            method: "POST",
            dataType: 'json',
            data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            },
            success: function(response) {
            if (response.status === "success") {
                const ctx = document.getElementById('lineChart').getContext('2d');

                if(response.labels.length > 0){
                    $('#kosong_grafik').hide();
                    // $('#lineChart').show();

                }else{
                    $('#kosong_grafik').show();
                    // $('#lineChart').hide();

                }

                new Chart(ctx, {
                type: 'line',
                data: {
                    labels:response.labels, 
                    datasets: [
                    {
                        label: 'Sistolik (mmHg)',
                        data: response.sistolik,
                        yAxisID: 'yTekanan',
                        borderColor: 'red',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        fill: false,
                        pointStyle: 'triangle'
                    },
                    {
                        label: 'Suhu (°C)',
                        data: response.suhu,
                        yAxisID: 'ySuhu',
                        borderColor: 'purple',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        fill: false,
                        pointStyle: 'circle'
                    },
                    {
                        label: 'Diastolik (mmHg)',
                        data: response.diastolik,
                        yAxisID: 'yTekanan',
                        borderColor: 'black',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        fill: false, // aktifkan arsiran di bawah garis
                        pointStyle: 'rectRot'
                    },
                    {
                        label: 'Nadi (x/menit)',
                        data: response.nadi,
                        yAxisID: 'yNadi',
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)', // 🟢 Warna arsiran transparan
                        borderDash: [5,5],
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 4,
                        fill: "-1", // aktifkan arsiran
                        pointStyle: 'cross'
                    },
                    {
                        label: 'RR (napas/menit)',
                        data: response.rr,
                        yAxisID: 'yRR',
                        borderColor: 'green',
                        borderWidth: 2,
                        borderDash: [2,2],
                        tension: 0.3,
                        fill: false,
                        pointRadius: 4
                    }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        title: {
                        display: true,
                        text: 'Grafik Observasi Pasien '+ response.tgl_data +' (Tekanan Darah, Nadi, RR, Suhu) ' ,
                        font: { size: 18 }
                        },
                        legend: { position: 'bottom' }
                    },
                    scales: {
                        // 🟥 Gabungan sistolik & diastolik
                        yTekanan: {
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Tekanan Darah (mmHg)',
                            color: 'red'
                        },
                        grid: { color: 'rgba(0,0,0,0.1)' }
                        },
                        ySuhu: {
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Suhu (°C)',
                            color: 'purple'
                        },
                        grid: { color: 'rgba(0,0,0,0.1)' }
                        },
                        // 🟦 Nadi
                        yNadi: {
                        position: 'right',
                        title: {
                            display: true,
                            text: 'Nadi (x/menit)',
                            color: 'blue'
                        },
                        grid: { drawOnChartArea: false }
                        },
                        // 🟩 RR
                        yRR: {
                        position: 'right',
                        offset: true,
                        title: {
                            display: true,
                            text: 'RR (napas/menit)',
                            color: 'green'
                        },
                        grid: { drawOnChartArea: false }
                        },
                        x: {
                        title: { display: true, text: 'Waktu Pemeriksaan' },
                        grid: { color: 'rgba(0,0,0,0.1)' }
                        }
                    }
                }
                });

            }else {
                $('#kosong_grafik').show();
                $('#lineChart').hide();
            }
            },
            error: function(xhr, status, error) {
            swal({
                title: "Gagal !!!",
                type: "warning",
                text: "Terjadi kesalahan pada server, silakan coba lagi.",
                confirmButtonColor: "#3cb878",
            });
            }
        });
    });

    // Tabel
    let table;

    $(document).ready(function() {

        $.fn.dataTable.ext.errMode = 'none';
        table = $('#tabel_catatan').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sSearch": "Cari:",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },

            "ajax": {
                "url": "<?php echo base_url('Erm_pemantauan_pasien_icu/tampil_list_pemantauan_TD'); ?>",
                "type": "POST",
                "data": function(d) {
                    d.id_pelayanan = id_pelayanan;
                    d.id_history = id_history;
                    d.tgl_data = $('#tanggal_grafik').val(); // ambil data terbaru
                }
            },

            "processing": true,
            "deferRender": true,
            "order": [],
        });

    });

    $('#tanggal_grafik').on('change', function() {
        table.ajax.reload(); 
    });

</script>


<script>
$(document).ready(function() {
    let chartInstance = null; // simpan chart agar bisa di-destroy

    $('#tanggal_grafik').on('change', function() {
        let tanggal_grafik = $(this).val();
        if (!tanggal_grafik) return;

        $.ajax({
            url: "<?= base_url('Erm_pemantauan_pasien_icu/tampil_list_grafik') ?>",
            method: "POST",
            dataType: "json",
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                tanggal_grafik: tanggal_grafik
            },
            success: function(response) {
                if (response.status === "success") { 

                    if(response.labels.length > 0){
                        $('#kosong_grafik').hide();
                        // $('#lineChart').show();

                    }else{
                        $('#kosong_grafik').show();
                        // $('#lineChar').hide();
                    }

                    swal({
                        title: "Berhasil!! Menampilkan Data Tgl : " + tanggal_grafik,
                        type: "success",
                        text: "OK",
                        confirmButtonColor: "#3cb878",
                    });
                    const canvas = document.getElementById('lineChart');
                    const ctx = canvas.getContext('2d');

                    // 🧹 Pastikan chart lama dihancurkan benar-benar
                    if (chartInstance) {
                        chartInstance.destroy();
                    } else {
                        // Cara tambahan untuk Chart.js v4+
                        const existingChart = Chart.getChart("lineChart");
                        if (existingChart) existingChart.destroy();
                    }

                    // 🎨 Buat chart baru
                    chartInstance = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: response.labels || [],
                            datasets: [
                                {
                                    label: 'Sistolik (mmHg)',
                                    data: response.sistolik || [],
                                    yAxisID: 'yTekanan',
                                    borderColor: 'black',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    backgroundColor: 'rgba(255, 0, 0, 0.1)', // 🟢 Warna arsiran transparan
                                    pointRadius: 5,
                                    fill: '1',
                                    pointStyle: 'triangle'
                                },
                                {
                                    label: 'Diastolik (mmHg)',
                                    data: response.diastolik || [],
                                    yAxisID: 'yTekanan',
                                    borderColor: 'black',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 5,
                                    fill: false,
                                    pointStyle: 'rectRot'
                                },
                                {
                                    label: 'Nadi (x/menit)',
                                    data: response.nadi || [],
                                    yAxisID: 'yNadi',
                                    borderColor: 'red',
                                    borderDash: [5,5],
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 4,
                                    fill: false,
                                    pointStyle: 'cross'
                                },
                                {
                                    label: 'RR (napas/menit)',
                                    data: response.rr || [],
                                    yAxisID: 'yRR',
                                    borderColor: 'blue',
                                    borderDash: [2,2],
                                    borderWidth: 2,
                                    tension: 0.3,
                                    fill: false,
                                    pointRadius: 4
                                },
                                {
                                    label: 'Suhu (°C)',
                                    data: response.suhu || [],
                                    yAxisID: 'ySuhu',
                                    borderColor: 'green',
                                    borderWidth: 2,
                                    tension: 0.3,
                                    pointRadius: 5,
                                    fill: false,
                                    pointStyle: 'circle'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            interaction: { mode: 'index', intersect: false },
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Grafik Observasi Pasien '+ response.tgl_data +' (Tekanan Darah, Nadi, RR, Suhu) ' ,
                                    font: { size: 18 }
                                },
                                legend: { position: 'bottom' }
                            },
                            scales: {
                                yTekanan: {
                                    position: 'left',
                                    title: {
                                        display: true,
                                        text: 'Tekanan Darah (mmHg)',
                                        color: 'red'
                                    }
                                },
                                ySuhu: {
                                    position: 'left',
                                    title: {
                                        display: true,
                                        text: 'Suhu (°C)',
                                        color: 'purple'
                                    }
                                },
                                yNadi: {
                                    position: 'right',
                                    title: {
                                        display: true,
                                        text: 'Nadi (x/menit)',
                                        color: 'blue'
                                    },
                                    grid: { drawOnChartArea: false }
                                },
                                yRR: {
                                    position: 'right',
                                    offset: true,
                                    title: {
                                        display: true,
                                        text: 'RR (napas/menit)',
                                        color: 'green'
                                    },
                                    grid: { drawOnChartArea: false }
                                },
                                x: {
                                    title: { display: true, text: 'Waktu Pemeriksaan' }
                                }
                            }
                        }
                    });
                } else {
                    $('#kosong_grafik').show();
                    $('#lineChart').hide();

                    swal({
                        title: "Tidak Ada Data!! Tgl : " + tanggal_grafik,
                        type: "warning",
                        text: "Tolong Input lagi yang baru",
                        confirmButtonColor: "#3cb878",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Gagal !!!",
                    type: "warning",
                    text: "Terjadi kesalahan pada server, silakan coba lagi.",
                    confirmButtonColor: "#3cb878",
                });
            }
        });
    });
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>