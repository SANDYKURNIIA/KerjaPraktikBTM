<!DOCTYPE html>
<html>

<head>
    <title>RESUME PASIEN PULANG</title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }

        .table2 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .table3 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }

        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .box {
            border-bottom: 1px solid;
            width: 1px;
            height: 1px;

        }


        .block,

        li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }

        hr {
            border: 1px solid black;
        }

        .block {
            display: block;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }


        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }

        .inline {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="content" style="display: block;">

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                <td width="800">
                    <strong>
                        <center style="font-size: 18px;">RINGKASAN PASIEN PULANG (DISCHARGE SUMMARY)</center>
                    </strong>
                </td>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0 height="100">
            <tr>
                <td width="390" class=gariskanan>
                    <p>Ruang : <?= $pasien->nama_ruangan ?> </p>
                    <p>Kelas : <?= $pasien->kelas ?></p>
                    <p>Jenis Kelamin : <?= $pasien->jenis_kelamin ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>No.RM : <?= $pasien->no_rm ?></p>
                    <p>Nama Pasien : <?= $pasien->nama ?></p>
                    <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($pasien->tgl_lahir)); ?></p>
                </td>
            </tr>
        </table>

        <?php
        // helper kecil biar aman & rapi
        function e($v)
        {
            return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
        }
        function fmtDate($v, $fmt = 'Y-m-d H:i:s')
        {
            if (empty($v)) return '';
            $ts = strtotime($v);
            return $ts ? date($fmt, $ts) : e($v);
        }

        // ambil nilai tanggal secara aman (kalau tidak ada, jadikan string kosong)
        // sesuaikan fallback kalau kamu punya variabel lain (mis. $resume)
        $tglMasuk  = $pasien->tgl_masuk  ?? '';
        $tglKeluar = $pasien->tgl_keluar ?? '';  // <- tidak semua data punya ini, hence guarded
        ?>
        <table width="100%" class="table2" cellspacing="0" height="100">
            <!-- BIODATA (kiri–kanan) -->
                 <td width="20%">Agama</td>
                <td width="1%">:</td>
                <td><?= e($pasien->agama ?? '') ?></td>

                <td width="20%">Tanggal Masuk</td>
                <td width="1%">:</td>
                <td><?= fmtDate($tglMasuk) ?></td>
            </tr>

            <tr>
                <td width="20%">Status Perkawinan</td>
                <td width="1%">:</td>
                <td><?= e($pasien->perkawinan ?? '') ?></td>

                <td width="20%">Tanggal Keluar</td>
                <td width="1%">:</td>
                <td><?= fmtDate($tglKeluar) ?></td>
            </tr>

            <tr>
                <td width="20%">Alamat Pasien</td>
                <td width="1%">:</td>
                <td><?= nl2br(e($pasien->alamat ?? '')) ?></td>

                <td colspan="3"></td>
            </tr>

            <tr>
                <td width="20%">Dokter</td>
                <td width="1%">:</td>
                <td><strong><?= e($pasien->nama_dokter ?? '') ?></strong></td>

                <td colspan="3"></td>
            </tr>

            <!-- PEMISAH: satu sel full-width berisi sub-table agar tetap ada batas/garis sendiri -->
            <tr>
                <td colspan="6" style="padding:0;">
                    <table width="100%" class="table2" cellspacing="0" height="100">
                        <tr>
                            <td colspan="3">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                                    <div>
                                        Alasan/Indikasi Masuk RS :
                                        <span id="keluhan_utama" style="border:none; outline:none; box-shadow:none; background:transparent; padding:0;">
                                            <?= !empty($pasien->keluhan_utama) ? e($pasien->keluhan_utama) : '-' ?>
                                        </span>
                                    </div>
                                    <div>
                                        Edukasi Yang Sudah Diberikan :
                                        <span id="edukasi" style="border:none; outline:none; box-shadow:none; background:transparent; padding:0;">
                                            <?= !empty($pasien->edukasi) ? e($pasien->edukasi) : '-' ?>
                                        </span>
                                    </div>
                                    <div>
                                        Alasan Pasien Saat Pulang :
                                        <span id="alasan_pulang" style="border:none; outline:none; box-shadow:none; background:transparent; padding:0;">
                                            <?= !empty($pasien->alasan) ? e($pasien->alasan) : '-' ?>
                                        </span>
                                    </div>
                                    <div>
                                        Keadaan Pasien Saat Pulang :
                                        <span id="keadaan_pulang" style="border:none; outline: none; box-shadow:none; background:transparent; padding:0;">
                                            <?= isset($pasien->keadaan_pulang) ? e($pasien->keadaan_pulang) : '' ?>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>


                </td>
            </tr>
        </table>

        <table width="100%" class="table2" cellspacing=0>
            <tr>
                <td>
                    <b>
                        <font style="font-size: 18px; ">RINGKASAN RIWAYAT PENYAKIT DAN PENEMUAN FISIK PENTING</font>
                    </b>
                </td>
            </tr>

            <tr>
                <td>Riwayat : <font id="riwayat"></font>
                </td>

            </tr>
            <tr>
                <td>Pemeriksaan Fisik :</td>

            </tr>
            <tr>
                <td>
                    <div id="p_fisik"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="p_fisik_2"></div>
                </td>
            </tr>
            <tr>
                <td>Hasil Pemeriksaan Penunjang : </td>

            </tr>
            <tr>
                <td style="vertical-align: top;">
                    Penunjang Diagnostik : <br>
                    <p style="font-weight: bold; margin: 0;">
                        Terlampir :
                        <span id="penunjang_diagnostik" style="border:none; outline:none; box-shadow:none; background:transparent; padding:0;">
                            <?= !empty($penunjang_diagnostik) ? e($penunjang_diagnostik) : '-' ?>
                        </span>
                    </p>
                </td>
            </tr>

            <tr>
                <td>Diagnosa Saat Masuk : <font id="diagnosa"></font>
                </td>

            </tr>
            <tr>
                <td>Diagnosa Utama Yang Ditegakkan : <font id="diagnosa_utama"></font>
                </td>


            </tr>
            <tr>
                <td>Diagnosa Sekunder :</td>
            </tr>
            <tr>
                <td>
                    <table width=100% class="table1" id="diagnosa_ranap" cellspacing=0>


                    </table>
                </td>
            </tr>
            <tr height='30px'>
                <td></td>
            </tr>
            <!-- Tambahan Hari/Tanggal Kontrol & Poliklinik -->
            <tr>
                <td colspan="6">
                    <div class="form-group row">
                        <!-- Kolom 1: Hari/Tanggal Kontrol -->
                        <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Hari/Tanggal Kontrol ke RS:</label>
                            <span id="tgl_kontrol_text" style="font-weight:bold; border:none; outline:none; box-shadow:none; background:transparent; padding:0;">
                                <?= !empty($pasien->tgl_kontrol) ? e($pasien->tgl_kontrol) : '-' ?>
                            </span>
                        </div>

                        <!-- Kolom 2: Poliklinik -->
                        <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Poliklinik:</label>
                            <span id="poliklinik" style="font-weight:bold; border:none; outline:none; box-shadow:none; background:transparent; padding:0;"></span>
                        </div>
                    </div>
                </td>
            </tr>



            <!-- Lanjut baris existing -->
            <tr>
                <td>Prosedur Terapi & Tindakan Yang Telah Dikerjakan : <font id="prosedure_terapi"></font>
                </td>
            </tr>
            <tr>
                <td>Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang :</td>
            </tr>



            <script>
                $(function() {
                    var $sel = $('#id_list_poli');
                    var placeholder = "-- Pilih poliklinik --";

                    // option kosong
                    $sel.html('<option value="" selected></option>');

                    $.getJSON("<?= base_url('Erm_resume_pulang/get_list_poli'); ?>", function(res) {
                        var frag = document.createDocumentFragment();
                        (res || []).forEach(function(row) {
                            frag.appendChild(new Option(row.nama_panjang, row.id_list_poli, false, false));
                        });
                        $sel.append(frag);

                        if ($.fn.select2) {
                            $sel.select2({
                                placeholder: placeholder,
                                allowClear: true,
                                width: '100%'
                            });
                            $sel.val('').trigger('change');
                            $sel.prop('selectedIndex', 0);
                            $sel.find('option').prop('selected', false);
                        } else {
                            $sel.find('option[value=""]').text(placeholder);
                            $sel.prop('selectedIndex', 0);
                        }

                        setTimeout(function() {
                            if ($sel.val()) {
                                $sel.val('').trigger('change');
                                $sel.prop('selectedIndex', 0);
                            }
                        }, 0);
                    });
                });
            </script>

            <tr>
                <td>
                    <table width=100% class="table1" cellspacing=0>
                        <tr class="garisbawah" height="60">
                            <td class=gariskanan>
                                <center>Nama Obat</center>
                            </td>
                            <td class=gariskanan>
                                <center>Dosis</center>
                            </td>
                            <td class=gariskanan>
                                <center>Frekuensi</center>
                            </td>
                            <td width="90" class=gariskanan>
                                <center>Cara Pemberian</center>
                            </td>

                        </tr>
                        <?php if (count($terapi) > 0) {
                            foreach ($terapi as $row) { ?>
                                <tr width="90">
                                    <td class=gariskanan>
                                        <center><?= $row->nama ?></center>
                                    </td>
                                    <td class=gariskanan>
                                        <center><?= $row->frek ?></center>
                                    </td>
                                    <td class=gariskanan>
                                        <center><?= $row->tindakan ?></center>
                                    </td>
                                    <td width="90" class=gariskanan>
                                        <center><?= $row->cara_pemakaian ?></center>
                                    </td>
                                </tr>



                            <?php }
                        } else { ?>

                            <tr width="90">
                                <td colspan="4" class=gariskanan>
                                    <center>Tidak ada data</center>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </td>
            </tr>


        </table>

        <table width="100%" class="table2" cellspacing=0>

            <tr width="30%">
                <td></td>
                <td style="text-align: right;">Dokter Yang Merawat,</td>
            </tr>
            <tr height=60px></tr>
            <tr width="30%">
                <td></td>
                <td style="text-align: right;"><strong><?= $pasien->nama_dokter ?></td>
            </tr>
            <!-- <tr width="30%">
                        <td></td>
                        <td></td>
                        <td style="text-align: right; font-size: smaller;">Tanda Tangan & Nama Jelas</td>
                    </tr> -->
        </table>

        <td width="100">
            <strong>
                <right style="font-size: smaller; font-style: italic;"> *Resume Dibuat Apabila Pasien Keluar Rumah Sakit, Dilampirkan Surat Pengantar</right>
            </strong>
        </td>


        </table>

    </div>

</body>
<!-- <script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="<?= base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url() ?>Erm_resume_pulang/get_data_resume",
            method: "POST",
            dataType: 'json',
            data: {
                id: '<?= $id_pelayanan ?>',
                id_history: '<?= $id_history ?>',
            },
            success: function(data) {
                // Alasan/Indikasi Masuk RS (bukan alasan pulang)
                $('#keluhan_utama').text((data.alasan ?? '').toString().trim() || '-');

                // Diagnosa masuk & terapi
                $('#diagnosa').text((data.diagnosa ?? '').toString().trim());
                const r = data.resume || {};
                $('#riwayat').text((r.riwayat_sekarang ?? '').toString().trim());
                $('#prosedure_terapi').text((r.terapi ?? r.prosedur_terapi ?? '').toString().trim());

                // EDUKASI
                const edukasiVal = (
                    data.edukasi ?? data.konsul ?? r.edukasi ?? r.konsul ?? ''
                ).toString().trim();
                $('#edukasi').text(edukasiVal || '-');

                // ALASAN PASIEN SAAT PULANG
                const alasanPulangVal = (data.alasan_pulang ?? '').toString().trim();
                $('#alasan_pulang').text(alasanPulangVal || '-');


                const penunjangDiagnostikVal = (
                    data.terlampir ?? r.diagnostik ?? ''
                ).toString().trim();
                $('#penunjang_diagnostik').text(penunjangDiagnostikVal || '-');

                // $('#keluhan_utama').text((data.alasan_masuk ?? '').toString().trim() || '-');



                // formatter: "Senin, 08 September 2025"
                function formatTanggalID(isoDate) {
                    if (!isoDate) return '';
                    // paksa jam 00:00 lokal agar stabil
                    const d = new Date(isoDate + 'T00:00:00');
                    if (isNaN(d)) return isoDate; // fallback tampilkan apa adanya
                    return new Intl.DateTimeFormat('id-ID', {
                        weekday: 'long',
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric'
                    }).format(d);
                }

                // ... di dalam success:
                // const r = data.resume || {};  // kalau belum ada, tambahkan ini di awal success
                const rawTglKontrol = (data.tgl_kontrol ?? (data.resume && data.resume.tgl_kontrol) ?? '').toString().trim();
                $('#tgl_kontrol_text').text(rawTglKontrol ? formatTanggalID(rawTglKontrol) : '-');

                $('#poliklinik').text(data.nama_panjang || '-');


                console.log('alasan debug =>', {
                    top_alasan: data.alasan,
                    top_alasan_pulang: data.alasan_pulang,
                    resume_alasan: data.resume && data.resume.alasan,
                    resume_alasan_pulang: data.resume && data.resume.alasan_pulang
                });

                // KEADAAN PASIEN SAAT PULANG
                const keadaanPulangVal = (
                    data.keadaan_pulang ?? r.keadaan_pulang ?? ''
                ).toString().trim();
                $('#keadaan_pulang').text(keadaanPulangVal || '-');

                // Tanggal kontrol
                const tglKontrolVal = (
                    data.tgl_kontrol ??
                    (data.resume && data.resume.tgl_kontrol) ??
                    ''
                ).toString().trim();
                $('#tgl_kontrol_text').text(tglKontrolVal || '-');


                // Tabel fisik
                const html = "<table id='t_fisik'>" +
                    "<tr><td>a. Tanda Vital: </td></tr>" +
                    "<tr>" +
                    "<td>GCS : " + (r.gcs ?? '-') + " </td>" +
                    "<td>E : " + (r.e ?? '-') + " </td>" +
                    "<td>M : " + (r.m ?? '-') + " </td>" +
                    "<td>V : " + (r.v ?? '-') + " </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>Tekanan darah : " + (r.tekanan_darah ?? '-') + " MmHg</td>" +
                    "<td>Suhu : " + (r.suhu ?? '-') + " &deg;C</td>" +
                    "<td>Nadi : " + (r.frequensi_nadi ?? '-') + " x/menit</td>" +
                    "<td>Pernafasan : " + (r.frequensi_nafas ?? '-') + " x/menit</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>SPO2 : " + (r.spo2 ?? '-') + " </td>" +
                    "<td>Berat Badan : " + (r.berat_badan ?? '-') + " kg</td>" +
                    "<td>Tinggi Badan : " + (r.tinggi_badan ?? '-') + " cm</td>" +
                    "<td></td>" +
                    "</tr>" +
                    "</table>";
                $('#p_fisik').html(html).css("color", "black");

                $('#p_fisik_2').html(generatePemeriksaanFisikTable(r)).css("color", "black");

                // Diagnosa utama & sekunder
                const dataPrimer = (data.diagnosa_ranap || []).filter(it => it.ket === "Primer");
                $('#diagnosa_utama').text(dataPrimer.length ? dataPrimer[0].diagnosa : '-');

                const dataSekunder = (data.diagnosa_ranap || []).filter(it => it.ket === "Sekunder");
                $('#diagnosa_ranap').html(generateDiagnosa(dataSekunder)).css("color", "black");

                $('.content').show();
            }




        });
    });

    function generatePemeriksaanFisikTable(data) {
        let html = `
                <table>
                <tr>
                    <td>b. Pemeriksaan Fisik:</td>
            `;

        const allNormal = (
            data.kepala === "Dalam Batas Normal" &&
            data.hidung === "Dalam Batas Normal" &&
            data.mulut === "Dalam Batas Normal" &&
            data.leher === "Dalam Batas Normal" &&
            data.thorax === "Dalam Batas Normal" &&
            data.jantung === "Dalam Batas Normal" &&
            data.paru === "Dalam Batas Normal" &&
            data.andomen === "Dalam Batas Normal" &&
            data.punggung === "Dalam Batas Normal" &&
            data.ekstremitas === "Dalam Batas Normal"
        );

        if (allNormal) {
            html += `
          <td>Dalam Batas Normal</td>
        </tr>
    `;
        } else {
            html += `
        <td></td>
      </tr>
    `;

            if (data.kepala !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Kepala :</td>
          <td>${data.kepala}</td>
        </tr>
      `;
            }
            if (data.hidung !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Hidung :</td>
          <td>${data.hidung}</td>
        </tr>
      `;
            }
            if (data.mulut !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Mulut :</td>
          <td>${data.mulut}</td>
        </tr>
      `;
            }
            if (data.leher !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Leher :</td>
          <td>${data.leher}</td>
        </tr>
      `;
            }
            if (data.thorax !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Thorax :</td>
          <td>${data.thorax}</td>
        </tr>
      `;
            }
            if (data.jantung !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Jantung :</td>
          <td>${data.jantung}</td>
        </tr>
      `;
            }
            if (data.paru !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Paru :</td>
          <td>${data.paru}</td>
        </tr>
      `;
            }
            if (data.andomen !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Andomen :</td>
          <td>${data.andomen}</td>
        </tr>
      `;
            }
            if (data.punggung !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Punggung :</td>
          <td>${data.punggung}</td>
        </tr>
      `;
            }
            if (data.ekstremitas !== "Dalam Batas Normal") {
                html += `
        <tr>
          <td>Ekstremitas :</td>
          <td>${data.ekstremitas}</td>
        </tr>
      `;
            }
        }

        html += `
    </table>
  `;
        return html;
    }

    function generateDiagnosa(data) {
        let html = `<tr class="garisbawah" height="60">
        <td class = gariskanan width ="30" ><center> Kode </center></td> 
        <td class = gariskanan width ="70"><center> Nama </center></td> 
        </tr>`;
        data.forEach((item, index) => {
            const parts = item.diagnosa.split(" - ");
            const kode = parts[0];
            const namaDiagnosa = parts[1];

            html += `
            <tr width="90">
                <td class="gariskanan">
                <center>${kode}</center>
                </td>
                <td class="gariskanan">
                <center>${namaDiagnosa}</center>
                </td>
            </tr>
            `;

        });
        return html;
    }
</script>



</html>