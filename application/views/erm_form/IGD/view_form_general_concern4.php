<<<<<<< HEAD
<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6; color: #000; background-color: #f4f4f4; margin: 0; padding: 20px;">
    <div style="max-width: 1000px; margin: auto; background-color: #fff; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <div style="text-align: center; font-weight: bold; margin-bottom: 2em;">
            <h1 style="font-size: 14pt; margin: 0; padding: 0;">PERSETUJUAN UMUM (GENERAL CONSENT)</h1>
            <h1 style="font-size: 14pt; margin: 0; padding: 0;">PEMERIKSAAN KESEHATAN DAN PEMROSESAN DATA PRIBADI</h1>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">

                                <input type="hidden" name="id_pelayanan">
                                <input type="hidden" name="id" id="id">
                                <p>Saya yang bertanda tangan di bawah ini:</p>
                                <br>

                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5em;">
                                    <input type="hidden" disabled class="form-control" value="<?= $data['no_rm'] ?>" id="gNo_rm">
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nama Lengkap</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="gNama" name="nama" placeholder="Isi nama penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="nama_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Tanggal Lahir</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="date" id="tgl_lahir" name="tgl_lahir" style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="tgl_lahir_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">NIK</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="nik" name="nik" placeholder="Isi NIK penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="nik_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Alamat</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="gAlamat" name="alamat" placeholder="Isi alamat penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="alamat_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nomor Telepon</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="gHP" name="hp" placeholder="Isi nomor telepon penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="hp_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                </table>

                                <p>Dengan ini sesungguhnya menyatakan persetujuan terhadap diri saya/istri/suami/anak/ayah/ibu saya (*), yaitu:</p>
                                <br>

                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5em;">
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nama Lengkap</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['nama'] . " (" . $data['jenis_kelamin'] . ")" ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Tanggal Lahir</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['tgl_lahir'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">NIK</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['no_ktp'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Alamat</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['alamat'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nomor Telepon</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['no_hp'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                </table>

                                <div>
                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">I. PERSETUJUAN UNTUK PEMERIKSAAN KESEHATAN</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya mengetahui bahwa saya akan melakukan pemeriksaan kesehatan, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik seperti yang diperlukan dalam penilaian profesional mereka.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Prosedur diagnostik dan perawatan medis tersebut termasuk pemeriksaan area sensitive (payudara, alat kelamin), elektrokardiogram, X-ray, laboratorium, pasang infus, pemberian vaksinasi, pasang NGT, pasang urine catheter, pemberian oksigen, suctioning, lavement/huknah/klisma gliserin, CTG (pasien inpartu), dll serta pemberian obat (minum/suntik/rektal/vagina).</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya sadar bahwa praktik kedokteran dan ilmu bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap prosedur atau pemeriksaan apapun yang dilakukan kepada saya.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya mengerti dan memahami bahwa:
                                            <ol style="padding-left: 30px; list-style-type: lower-alpha;">
                                                <li>Saya memiliki hak untuk mengajukan pertanyaan tentang pemeriksaan yang akan dilaksanakan (termasuk identitas setiap orang yang melaksanakan) setiap saat;</li>
                                                <li>Saya memiliki hak untuk persetujuan, atau menolak persetujuan, untuk setiap prosedur.</li>
                                            </ol>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">II. BARANG-BARANG MILIK PASIEN</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya telah memahami bahwa rumah sakit tidak bertanggung jawab atas semua kehilangan barang-barang milik saya, dan saya secara pribadi bertanggung jawab terhadap barang-barang berharga yang saya miliki, termasuk uang, perhiasan, buku cek, handphone, kartu kredit, serta barang lainnya. Dan apabila saya membutuhkan maka saya dapat menitipkan barang-barang saya kepada rumah sakit.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya juga mengerti bahwa saya harus memberitahu/menitipkan pada rumah sakit jika saya memiliki gigi palsu, kacamata, lensa kontak, prosthetics atau barang lainnya yang saya butuhkan untuk diamankan.</li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">III. PERSETUJUAN PELEPASAN INFORMASI MEDIS</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami informasi yang ada dalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, RS Bakti Timah akan menjamin kerahasiaannya.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim asuransi/JaminanKesehatan/perusahaan dan atau lembaga pemerintah.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Berdasarkan Undang Undang No. 17 tahun 2023 tentang Kesehatan dan Permenkes No. 24 tahun 2022 tentang Rekam Medis, saya mengijinkan manajemen yang ditunjuk oleh perusahaan untuk membuka dokumen rekam medis atas pemeriksaan kesehatan yang telah dilakukan oleh: (dapat dipilih lebih dari satu)
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Perusahaan Pengguna: PT <input type="text" id="perusahaan_pengguna" style="width: 250px; display: inline-block; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;"> <span id="perusahaan_pengguna_error" class="text-danger"></span></li>
                                                <li>Perusahaan Penjamin Biaya: PT <input type="text" id="perusahaan_penjamin" style="width: 250px; display: inline-block; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;"> <span id="perusahaan_penjamin_error" class="text-danger"></span></li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi kepercayaan kepada pihak manajemen yang ditetapkan oleh perusahaan dalam poin 3 untuk menjaga kerahasiaan hasil pemeriksaan kesehatan saya yang sesungguhnya bersifat sangat pribadi dan untuk tidak mendiskusikannya secara tertulis tanpa ijin tertulis sebelumnya dari pimpinan perusahaan.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Apabila di waktu yang akan datang, ada permintaan tertulis tentang informasi medis saya dari perusahaan tempat saya bekerja, saya mengijinkan informasi medis dari pemeriksaan kesehatan saat ini untuk dibuka oleh perusahaan tersebut.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya, yaitu kepada:<br>(Nama, Hubungan Keluarga, No telephone)
                                            <ol style="padding-left: 20px;">
                                                <div class="col-md-12">
                                                    <div class="row form-group" style="margin-bottom: 15px;">
                                                        <label class="control-label col-md-1 col-xs-1">1.</label>
                                                        <div class="col-md-4 col-xs-11"><input type="text" class="form-control" id="pihak_nama_1" placeholder="Nama" required></div>
                                                        <div class="col-md-3 col-xs-12"><input type="text" class="form-control" id="pihak_hubungan_1" placeholder="Hubungan" required></div>
                                                        <div class="col-md-4 col-xs-12"><input type="text" class="form-control" id="pihak_telp_1" placeholder="No. Telepon" required></div>
                                                    </div>

                                                    <div class="row form-group" style="margin-bottom: 15px;">
                                                        <label class="control-label col-md-1 col-xs-1">2.</label>
                                                        <div class="col-md-4 col-xs-11"><input type="text" class="form-control" id="pihak_nama_2" placeholder="Nama"></div>
                                                        <div class="col-md-3 col-xs-12"><input type="text" class="form-control" id="pihak_hubungan_2" placeholder="Hubungan"></div>
                                                        <div class="col-md-4 col-xs-12"><input type="text" class="form-control" id="pihak_telp_2" placeholder="No. Telepon"></div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label class="control-label col-md-1 col-xs-1">3.</label>
                                                        <div class="col-md-4 col-xs-11"><input type="text" class="form-control" id="pihak_nama_3" placeholder="Nama"></div>
                                                        <div class="col-md-3 col-xs-12"><input type="text" class="form-control" id="pihak_hubungan_3" placeholder="Hubungan"></div>
                                                        <div class="col-md-4 col-xs-12"><input type="text" class="form-control" id="pihak_telp_3" placeholder="No. Telepon"></div>
                                                    </div>
                                                </div>
                                            </ol>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">IV. HAK DAN TANGGUNG JAWAB SERTA TATA TERTIB</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memiliki hak untuk mengambil bagian dalam keputusan mengenai penyakit saya dan dalam hal perawatan medis dan rencana pengobatan.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya telah mendapat informasi tentang Hak dan Tanggung Jawab Pasien melalui leaflet dan banner yang disediakan oleh petugas.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya mengerti bahwa saya tidak diperbolehkan mendokumentasikan (mengambil foto atau merekam dll) dalam bentuk apapun semua proses pelayanan kesehatan tanpa seizin rumah sakit. Jika saya membutuhkan informasi medis mengenai pasien, maka saya akan menggunakan hak bertanya saya kepada dokter yang merawat.</li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">V. INFORMASI BIAYA</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami tentang informasi biaya pengobatan atau biaya tindakan yang dijelaskan oleh petugas rumah sakit dan bersedia membayar seluruh biaya perawatan.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami adanya tagihan yang bersifat sementara dan akan pro aktif menanyakan tagihan sementara.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">RS Bakti Timah tidak pernah meminta Pasien / Keluarga Pasien untuk melakukan transfer sejumlah dana untuk tindakan medis melalui telepon.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">RS Bakti Timah tidak melayani proses REIMBURSEMENT klaim pada pasien dengan jaminan BPJS kesehatan dan Pensiunan Pertamina.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami bila pengobatan/tindakan medis/pemeriksaan diagnostik per item dengan biaya lebih dari:<br>
                                            <div class="col-md-12">
                                                <label class="control-label mb-10 text-left">Saya memahami bila pengobatan/tindakan medis/pemeriksaan
                                                    diagnostik per item dengan biaya lebih dari:<span id="batas_biaya_error" class="text-danger"></span></label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="500000" name="batas_biaya" id="opsi1">
                                                            <label for="opsi1">Rp 500.000,-</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="1000000" name="batas_biaya" id="opsi2">
                                                            <label for="opsi2">Rp 1.000.000,-</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Terbatas" name="batas_biaya" id="opsi3">
                                                            <label for="opsi3">Tidak Terbatas</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Sesuai Ketentuan Penjamin" name="batas_biaya" id="opsi4">
                                                            <label for="opsi4">Sesuai Ketentuan Penjamin</label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <br>
                                                <p>Akan dilaksanakan setelah saya menyetujui pengobatan/tindakan medis/pemeriksaan
                                                    diagnostik tersebut.</p>
                                                <br>
                                            </div>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">VI. PERSETUJUAN PEMROSESAN DATA PRIBADI</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya menyatakan telah membaca dan memahami bahwa data pribadi saya akan diproses untuk tujuan:
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Memberikan layanan medis kepada saya.</li>
                                                <li>Memenuhi kewajiban hukum yang berlaku.</li>
                                                <li>Mendukung penelitian (dengan data anonim bila memungkinkan).</li>
                                                <li>Mengelola administrasi seperti klaim asuransi dan pelaporan kesehatan.</li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Data pribadi yang akan diproses mencakup:
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Data Identitas: nama, tanggal lahir, nomor identitas.</li>
                                                <li>Data Medis: diagnosis, hasil laboratorium, hasil pemeriksaan lainnya, dan resume medis.</li>
                                                <li>Data Kontak: alamat, nomor telepon, email.</li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memiliki hak untuk:
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Mengakses, memperbarui, atau menghapus data pribadi saya.</li>
                                                <li>Menarik persetujuan ini kapan saja dengan menghubungi pihak rumah sakit.</li>
                                            </ul>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">VII. PERNYATAAN DAN TANDA TANGAN</h2>
                                    <p>Dengan ini saya menyatakan bahwa:</p>
                                    <ul style="padding-left: 30px; list-style-type: disc;">
                                        <li>Saya telah membaca dan memahami isi persetujuan umum/general consent ini.</li>
                                        <li>Saya memberikan persetujuan untuk pemeriksaan kesehatan dan pemrosesan data pribadi sesuai dengan yang telah dijelaskan di atas.</li>
                                        <li>Saya menandatangani formulir ini dengan penuh kesadaran dan tanpa paksaan dari pihak manapun.</li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <label class="control-label">Pasien:</label>
                                    <br />
                                    <div class="row">
                                        <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                        <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                        <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                        <div class="form-group">
                                            <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group row" style="margin-left: 30px;">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <canvas id="ttd" width="300" height="300">
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                        <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center" style="margin-top: 30px;">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                        <button style="display: none;" type="button" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                        <button style="display: none;" id="edit" type="button" id="edit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                        <button type="submit" id="cetak" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->load->view('assets/signature2') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }

    .text-danger {
        color: #a94442;
    }
</style>
<script type="text/javascript">
    // --- BAGIAN GET DATA SAAT HALAMAN DIBUKA ---
    $(document).ready(function() {
        var no_rm = $('#gNo_rm').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
            method: "POST",
            dataType: 'json',
            data: {
                id: no_rm
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Mengisi data lama
                    $('#gNama').val(data.nama);
                    $('#gAlamat').val(data.alamat);
                    $('#gHP').val(data.hp);
                    $('#id').val(data.id_general_concent);

                    // Mengisi data-data baru
                    $('#nik').val(data.nik);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#perusahaan_pengguna').val(data.perusahaan_pengguna);
                    $('#perusahaan_penjamin').val(data.perusahaan_penjamin);
                    $('input[name="batas_biaya"][value="' + data.batas_biaya + '"]').prop("checked", true);

                    // Mengisi data pihak keluarga dari JSON
                    if (data.pihak_keluarga) {
                        try {
                            var keluarga = JSON.parse(data.pihak_keluarga);
                            keluarga.forEach(function(item, index) {
                                var i = index + 1;
                                $('#pihak_nama_' + i).val(item.nama);
                                $('#pihak_hubungan_' + i).val(item.hubungan);
                                $('#pihak_telp_' + i).val(item.no_telp);
                            });
                        } catch (e) {
                            console.error("Gagal parse data keluarga:", e);
                        }
                    }

                    // Menampilkan TTD lama
                    if (data.file_path) {
                        var canvas = document.getElementById('can');
                        var ctx = canvas.getContext("2d");
                        var img = new Image();
                        img.onload = function() {
                            ctx.drawImage(img, 0, 0, 300, 300);
                        }
                        img.src = "<?php echo base_url(); ?>" + data.file_path;
                        $('#can').show();
                    }

                    // Mengatur tampilan tombol
                    $('#simpan').hide();
                    $('#edit').show();
                } else {
                    $('#simpan').show();
                }
            }
        });
    });

    // --- FUNGSI SIMPAN ---
    function simpan() {
        // Mengambil data pihak keluarga
        var pihakKeluarga = [];
        for (var i = 1; i <= 3; i++) {
            var nama = $('#pihak_nama_' + i).val().trim();
            if (nama !== '') {
                pihakKeluarga.push({
                    nama: nama,
                    hubungan: $('#pihak_hubungan_' + i).val(),
                    no_telp: $('#pihak_telp_' + i).val()
                });
            }
        }

        var no_rm = $('#gNo_rm').val();
        var formData = {
            no_rm: no_rm,
            nama: $('#gNama').val(),
            alamat: $('#gAlamat').val(),
            HP: $('#gHP').val(), // PERUBAHAN DI SINI: 'hp' menjadi 'HP'
            gambar: ($('#can').is(':visible')) ? document.getElementById('can').toDataURL("image/png") : '',
            nik: $('#nik').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            perusahaan_pengguna: $('#perusahaan_pengguna').val(),
            perusahaan_penjamin: $('#perusahaan_penjamin').val(),
            batas_biaya: $('input[name="batas_biaya"]:checked').val() || '',
            pihak_keluarga: JSON.stringify(pihakKeluarga)
        };

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/insert_gencon",
            method: "POST",
            dataType: 'json',
            data: formData,
            success: function(data) {
                if (data.status === "success") {
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil ditambah"
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                } else if (data.error) {
                    // Ganti 'hp' ke 'HP' di array fields agar error message bisa tampil
                    var fields = ['nama', 'alamat', 'hp', 'nik', 'tgl_lahir', 'perusahaan_pengguna', 'perusahaan_penjamin', 'batas_biaya'];
                    fields.forEach(function(field) {
                        // Cek jika ada error dengan key uppercase (khusus untuk HP)
                        var errorKey = field === 'hp' ? 'HP' : field;
                        $('#' + field + '_error').html(data[errorKey] || '');
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status || "Terjadi kesalahan."
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: "Error!",
                    type: "error",
                    text: "Gagal menghubungi server: " + textStatus
                });
            }
        });
        return false;
    }

    // --- FUNGSI EDIT ---
    function edit() {
        // Mengambil data pihak keluarga
        var pihakKeluarga = [];
        for (var i = 1; i <= 3; i++) {
            var nama = $('#pihak_nama_' + i).val().trim();
            if (nama !== '') {
                pihakKeluarga.push({
                    nama: nama,
                    hubungan: $('#pihak_hubungan_' + i).val(),
                    no_telp: $('#pihak_telp_' + i).val()
                });
            }
        }

        var no_rm = $('#gNo_rm').val();
        var formData = {
            id: $('#id').val(),
            no_rm: no_rm,
            nama: $('#gNama').val(),
            alamat: $('#gAlamat').val(),
            HP: $('#gHP').val(), // PERUBAHAN DI SINI: 'hp' menjadi 'HP'
            gambar: document.getElementById('can').toDataURL("image/png"),
            nik: $('#nik').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            perusahaan_pengguna: $('#perusahaan_pengguna').val(),
            perusahaan_penjamin: $('#perusahaan_penjamin').val(),
            batas_biaya: $('input[name="batas_biaya"]:checked').val() || '',
            pihak_keluarga: JSON.stringify(pihakKeluarga)
        };

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/update_gencon",
            method: "POST",
            dataType: 'json',
            data: formData,
            success: function(data) {
                if (data.status === "success") {
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diperbarui"
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                } else if (data.error) {
                    var fields = ['nama', 'alamat', 'hp', 'nik', 'tgl_lahir', 'perusahaan_pengguna', 'perusahaan_penjamin', 'batas_biaya'];
                    fields.forEach(function(field) {
                        // Cek jika ada error dengan key uppercase (khusus untuk HP)
                        var errorKey = field === 'hp' ? 'HP' : field;
                        $('#' + field + '_error').html(data[errorKey] || '');
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status || "Terjadi kesalahan."
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: "Error!",
                    type: "error",
                    text: "Gagal menghubungi server: " + textStatus
                });
            }
        });
        return false;
    }
</script>

<script>
    function cetak() {
        let id = $("#id").val();

        if (!id) {
            swal({
                title: "Peringatan!",
                text: "Silakan pilih data terlebih dahulu sebelum mencetak.",
                type: "warning",
                confirmButtonColor: "#3cb878",
            });
            return;
        }

        // pastikan ada slash sebelum ID
        window.open("<?= base_url('Erm_general_concern/print_general_concern/') ?>" + "/" + id, "_blank");
    }
=======
<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6; color: #000; background-color: #f4f4f4; margin: 0; padding: 20px;">
    <div style="max-width: 1000px; margin: auto; background-color: #fff; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <div style="text-align: center; font-weight: bold; margin-bottom: 2em;">
            <h1 style="font-size: 14pt; margin: 0; padding: 0;">PERSETUJUAN UMUM (GENERAL CONSENT)</h1>
            <h1 style="font-size: 14pt; margin: 0; padding: 0;">PEMERIKSAAN KESEHATAN DAN PEMROSESAN DATA PRIBADI</h1>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">

                                <input type="hidden" name="id_pelayanan">
                                <input type="hidden" name="id" id="id">
                                <p>Saya yang bertanda tangan di bawah ini:</p>
                                <br>

                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5em;">
                                    <input type="hidden" disabled class="form-control" value="<?= $data['no_rm'] ?>" id="gNo_rm">
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nama Lengkap</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="gNama" name="nama" placeholder="Isi nama penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="nama_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Tanggal Lahir</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="date" id="tgl_lahir" name="tgl_lahir" style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="tgl_lahir_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">NIK</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="nik" name="nik" placeholder="Isi NIK penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="nik_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Alamat</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="gAlamat" name="alamat" placeholder="Isi alamat penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="alamat_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nomor Telepon</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" id="gHP" name="hp" placeholder="Isi nomor telepon penanggung jawab..." style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;" required>
                                            <span id="hp_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                </table>

                                <p>Dengan ini sesungguhnya menyatakan persetujuan terhadap diri saya/istri/suami/anak/ayah/ibu saya (*), yaitu:</p>
                                <br>

                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5em;">
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nama Lengkap</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['nama'] . " (" . $data['jenis_kelamin'] . ")" ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Tanggal Lahir</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['tgl_lahir'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">NIK</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['no_ktp'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Alamat</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['alamat'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 150px; color: #555 !important;">Nomor Telepon</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit; width: 10px;">:</td>
                                        <td style="padding: 2px 5px; vertical-align: top; font-size: inherit;">
                                            <input type="text" value="<?= $data['no_hp'] ?>" readonly style="width: 100%; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;">
                                        </td>
                                    </tr>
                                </table>

                                <div>
                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">I. PERSETUJUAN UNTUK PEMERIKSAAN KESEHATAN</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya mengetahui bahwa saya akan melakukan pemeriksaan kesehatan, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik seperti yang diperlukan dalam penilaian profesional mereka.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Prosedur diagnostik dan perawatan medis tersebut termasuk pemeriksaan area sensitive (payudara, alat kelamin), elektrokardiogram, X-ray, laboratorium, pasang infus, pemberian vaksinasi, pasang NGT, pasang urine catheter, pemberian oksigen, suctioning, lavement/huknah/klisma gliserin, CTG (pasien inpartu), dll serta pemberian obat (minum/suntik/rektal/vagina).</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya sadar bahwa praktik kedokteran dan ilmu bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap prosedur atau pemeriksaan apapun yang dilakukan kepada saya.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya mengerti dan memahami bahwa:
                                            <ol style="padding-left: 30px; list-style-type: lower-alpha;">
                                                <li>Saya memiliki hak untuk mengajukan pertanyaan tentang pemeriksaan yang akan dilaksanakan (termasuk identitas setiap orang yang melaksanakan) setiap saat;</li>
                                                <li>Saya memiliki hak untuk persetujuan, atau menolak persetujuan, untuk setiap prosedur.</li>
                                            </ol>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">II. BARANG-BARANG MILIK PASIEN</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya telah memahami bahwa rumah sakit tidak bertanggung jawab atas semua kehilangan barang-barang milik saya, dan saya secara pribadi bertanggung jawab terhadap barang-barang berharga yang saya miliki, termasuk uang, perhiasan, buku cek, handphone, kartu kredit, serta barang lainnya. Dan apabila saya membutuhkan maka saya dapat menitipkan barang-barang saya kepada rumah sakit.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya juga mengerti bahwa saya harus memberitahu/menitipkan pada rumah sakit jika saya memiliki gigi palsu, kacamata, lensa kontak, prosthetics atau barang lainnya yang saya butuhkan untuk diamankan.</li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">III. PERSETUJUAN PELEPASAN INFORMASI MEDIS</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami informasi yang ada dalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, RS Bakti Timah akan menjamin kerahasiaannya.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim asuransi/JaminanKesehatan/perusahaan dan atau lembaga pemerintah.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Berdasarkan Undang Undang No. 17 tahun 2023 tentang Kesehatan dan Permenkes No. 24 tahun 2022 tentang Rekam Medis, saya mengijinkan manajemen yang ditunjuk oleh perusahaan untuk membuka dokumen rekam medis atas pemeriksaan kesehatan yang telah dilakukan oleh: (dapat dipilih lebih dari satu)
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Perusahaan Pengguna: PT <input type="text" id="perusahaan_pengguna" style="width: 250px; display: inline-block; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;"> <span id="perusahaan_pengguna_error" class="text-danger"></span></li>
                                                <li>Perusahaan Penjamin Biaya: PT <input type="text" id="perusahaan_penjamin" style="width: 250px; display: inline-block; border: none; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit; background-color: transparent;"> <span id="perusahaan_penjamin_error" class="text-danger"></span></li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi kepercayaan kepada pihak manajemen yang ditetapkan oleh perusahaan dalam poin 3 untuk menjaga kerahasiaan hasil pemeriksaan kesehatan saya yang sesungguhnya bersifat sangat pribadi dan untuk tidak mendiskusikannya secara tertulis tanpa ijin tertulis sebelumnya dari pimpinan perusahaan.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Apabila di waktu yang akan datang, ada permintaan tertulis tentang informasi medis saya dari perusahaan tempat saya bekerja, saya mengijinkan informasi medis dari pemeriksaan kesehatan saat ini untuk dibuka oleh perusahaan tersebut.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya, yaitu kepada:<br>(Nama, Hubungan Keluarga, No telephone)
                                            <ol style="padding-left: 20px;">
                                                <div class="col-md-12">
                                                    <div class="row form-group" style="margin-bottom: 15px;">
                                                        <label class="control-label col-md-1 col-xs-1">1.</label>
                                                        <div class="col-md-4 col-xs-11"><input type="text" class="form-control" id="pihak_nama_1" placeholder="Nama" required></div>
                                                        <div class="col-md-3 col-xs-12"><input type="text" class="form-control" id="pihak_hubungan_1" placeholder="Hubungan" required></div>
                                                        <div class="col-md-4 col-xs-12"><input type="text" class="form-control" id="pihak_telp_1" placeholder="No. Telepon" required></div>
                                                    </div>

                                                    <div class="row form-group" style="margin-bottom: 15px;">
                                                        <label class="control-label col-md-1 col-xs-1">2.</label>
                                                        <div class="col-md-4 col-xs-11"><input type="text" class="form-control" id="pihak_nama_2" placeholder="Nama"></div>
                                                        <div class="col-md-3 col-xs-12"><input type="text" class="form-control" id="pihak_hubungan_2" placeholder="Hubungan"></div>
                                                        <div class="col-md-4 col-xs-12"><input type="text" class="form-control" id="pihak_telp_2" placeholder="No. Telepon"></div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label class="control-label col-md-1 col-xs-1">3.</label>
                                                        <div class="col-md-4 col-xs-11"><input type="text" class="form-control" id="pihak_nama_3" placeholder="Nama"></div>
                                                        <div class="col-md-3 col-xs-12"><input type="text" class="form-control" id="pihak_hubungan_3" placeholder="Hubungan"></div>
                                                        <div class="col-md-4 col-xs-12"><input type="text" class="form-control" id="pihak_telp_3" placeholder="No. Telepon"></div>
                                                    </div>
                                                </div>
                                            </ol>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">IV. HAK DAN TANGGUNG JAWAB SERTA TATA TERTIB</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memiliki hak untuk mengambil bagian dalam keputusan mengenai penyakit saya dan dalam hal perawatan medis dan rencana pengobatan.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya telah mendapat informasi tentang Hak dan Tanggung Jawab Pasien melalui leaflet dan banner yang disediakan oleh petugas.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya mengerti bahwa saya tidak diperbolehkan mendokumentasikan (mengambil foto atau merekam dll) dalam bentuk apapun semua proses pelayanan kesehatan tanpa seizin rumah sakit. Jika saya membutuhkan informasi medis mengenai pasien, maka saya akan menggunakan hak bertanya saya kepada dokter yang merawat.</li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">V. INFORMASI BIAYA</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami tentang informasi biaya pengobatan atau biaya tindakan yang dijelaskan oleh petugas rumah sakit dan bersedia membayar seluruh biaya perawatan.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami adanya tagihan yang bersifat sementara dan akan pro aktif menanyakan tagihan sementara.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">RS Bakti Timah tidak pernah meminta Pasien / Keluarga Pasien untuk melakukan transfer sejumlah dana untuk tindakan medis melalui telepon.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">RS Bakti Timah tidak melayani proses REIMBURSEMENT klaim pada pasien dengan jaminan BPJS kesehatan dan Pensiunan Pertamina.</li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memahami bila pengobatan/tindakan medis/pemeriksaan diagnostik per item dengan biaya lebih dari:<br>
                                            <div class="col-md-12">
                                                <label class="control-label mb-10 text-left">Saya memahami bila pengobatan/tindakan medis/pemeriksaan
                                                    diagnostik per item dengan biaya lebih dari:<span id="batas_biaya_error" class="text-danger"></span></label>
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="500000" name="batas_biaya" id="opsi1">
                                                            <label for="opsi1">Rp 500.000,-</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="1000000" name="batas_biaya" id="opsi2">
                                                            <label for="opsi2">Rp 1.000.000,-</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Terbatas" name="batas_biaya" id="opsi3">
                                                            <label for="opsi3">Tidak Terbatas</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Sesuai Ketentuan Penjamin" name="batas_biaya" id="opsi4">
                                                            <label for="opsi4">Sesuai Ketentuan Penjamin</label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <br>
                                                <p>Akan dilaksanakan setelah saya menyetujui pengobatan/tindakan medis/pemeriksaan
                                                    diagnostik tersebut.</p>
                                                <br>
                                            </div>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">VI. PERSETUJUAN PEMROSESAN DATA PRIBADI</h2>
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya menyatakan telah membaca dan memahami bahwa data pribadi saya akan diproses untuk tujuan:
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Memberikan layanan medis kepada saya.</li>
                                                <li>Memenuhi kewajiban hukum yang berlaku.</li>
                                                <li>Mendukung penelitian (dengan data anonim bila memungkinkan).</li>
                                                <li>Mengelola administrasi seperti klaim asuransi dan pelaporan kesehatan.</li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Data pribadi yang akan diproses mencakup:
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Data Identitas: nama, tanggal lahir, nomor identitas.</li>
                                                <li>Data Medis: diagnosis, hasil laboratorium, hasil pemeriksaan lainnya, dan resume medis.</li>
                                                <li>Data Kontak: alamat, nomor telepon, email.</li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom: 0.5em; text-align: justify;">Saya memiliki hak untuk:
                                            <ul style="padding-left: 30px; list-style-type: disc;">
                                                <li>Mengakses, memperbarui, atau menghapus data pribadi saya.</li>
                                                <li>Menarik persetujuan ini kapan saja dengan menghubungi pihak rumah sakit.</li>
                                            </ul>
                                        </li>
                                    </ol>

                                    <h2 style="font-size: 12pt; margin: 1.5em 0 1em 0; border-bottom: 1px solid #eee; padding-bottom: 5px; font-weight: bold;">VII. PERNYATAAN DAN TANDA TANGAN</h2>
                                    <p>Dengan ini saya menyatakan bahwa:</p>
                                    <ul style="padding-left: 30px; list-style-type: disc;">
                                        <li>Saya telah membaca dan memahami isi persetujuan umum/general consent ini.</li>
                                        <li>Saya memberikan persetujuan untuk pemeriksaan kesehatan dan pemrosesan data pribadi sesuai dengan yang telah dijelaskan di atas.</li>
                                        <li>Saya menandatangani formulir ini dengan penuh kesadaran dan tanpa paksaan dari pihak manapun.</li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <label class="control-label">Pasien:</label>
                                    <br />
                                    <div class="row">
                                        <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                        <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                        <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                        <div class="form-group">
                                            <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group row" style="margin-left: 30px;">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <canvas id="ttd" width="300" height="300">
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                        <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center" style="margin-top: 30px;">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                        <button style="display: none;" type="button" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                        <button style="display: none;" id="edit" type="button" id="edit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                        <button type="submit" id="cetak" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->load->view('assets/signature2') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }

    .text-danger {
        color: #a94442;
    }
</style>
<script type="text/javascript">
    // --- BAGIAN GET DATA SAAT HALAMAN DIBUKA ---
    $(document).ready(function() {
        var no_rm = $('#gNo_rm').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
            method: "POST",
            dataType: 'json',
            data: {
                id: no_rm
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // Mengisi data lama
                    $('#gNama').val(data.nama);
                    $('#gAlamat').val(data.alamat);
                    $('#gHP').val(data.hp);
                    $('#id').val(data.id_general_concent);

                    // Mengisi data-data baru
                    $('#nik').val(data.nik);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#perusahaan_pengguna').val(data.perusahaan_pengguna);
                    $('#perusahaan_penjamin').val(data.perusahaan_penjamin);
                    $('input[name="batas_biaya"][value="' + data.batas_biaya + '"]').prop("checked", true);

                    // Mengisi data pihak keluarga dari JSON
                    if (data.pihak_keluarga) {
                        try {
                            var keluarga = JSON.parse(data.pihak_keluarga);
                            keluarga.forEach(function(item, index) {
                                var i = index + 1;
                                $('#pihak_nama_' + i).val(item.nama);
                                $('#pihak_hubungan_' + i).val(item.hubungan);
                                $('#pihak_telp_' + i).val(item.no_telp);
                            });
                        } catch (e) {
                            console.error("Gagal parse data keluarga:", e);
                        }
                    }

                    // Menampilkan TTD lama
                    if (data.file_path) {
                        var canvas = document.getElementById('can');
                        var ctx = canvas.getContext("2d");
                        var img = new Image();
                        img.onload = function() {
                            ctx.drawImage(img, 0, 0, 300, 300);
                        }
                        img.src = "<?php echo base_url(); ?>" + data.file_path;
                        $('#can').show();
                    }

                    // Mengatur tampilan tombol
                    $('#simpan').hide();
                    $('#edit').show();
                } else {
                    $('#simpan').show();
                }
            }
        });
    });

    // --- FUNGSI SIMPAN ---
    function simpan() {
        // Mengambil data pihak keluarga
        var pihakKeluarga = [];
        for (var i = 1; i <= 3; i++) {
            var nama = $('#pihak_nama_' + i).val().trim();
            if (nama !== '') {
                pihakKeluarga.push({
                    nama: nama,
                    hubungan: $('#pihak_hubungan_' + i).val(),
                    no_telp: $('#pihak_telp_' + i).val()
                });
            }
        }

        var no_rm = $('#gNo_rm').val();
        var formData = {
            no_rm: no_rm,
            nama: $('#gNama').val(),
            alamat: $('#gAlamat').val(),
            HP: $('#gHP').val(), // PERUBAHAN DI SINI: 'hp' menjadi 'HP'
            gambar: ($('#can').is(':visible')) ? document.getElementById('can').toDataURL("image/png") : '',
            nik: $('#nik').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            perusahaan_pengguna: $('#perusahaan_pengguna').val(),
            perusahaan_penjamin: $('#perusahaan_penjamin').val(),
            batas_biaya: $('input[name="batas_biaya"]:checked').val() || '',
            pihak_keluarga: JSON.stringify(pihakKeluarga)
        };

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/insert_gencon",
            method: "POST",
            dataType: 'json',
            data: formData,
            success: function(data) {
                if (data.status === "success") {
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil ditambah"
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                } else if (data.error) {
                    // Ganti 'hp' ke 'HP' di array fields agar error message bisa tampil
                    var fields = ['nama', 'alamat', 'hp', 'nik', 'tgl_lahir', 'perusahaan_pengguna', 'perusahaan_penjamin', 'batas_biaya'];
                    fields.forEach(function(field) {
                        // Cek jika ada error dengan key uppercase (khusus untuk HP)
                        var errorKey = field === 'hp' ? 'HP' : field;
                        $('#' + field + '_error').html(data[errorKey] || '');
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status || "Terjadi kesalahan."
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: "Error!",
                    type: "error",
                    text: "Gagal menghubungi server: " + textStatus
                });
            }
        });
        return false;
    }

    // --- FUNGSI EDIT ---
    function edit() {
        // Mengambil data pihak keluarga
        var pihakKeluarga = [];
        for (var i = 1; i <= 3; i++) {
            var nama = $('#pihak_nama_' + i).val().trim();
            if (nama !== '') {
                pihakKeluarga.push({
                    nama: nama,
                    hubungan: $('#pihak_hubungan_' + i).val(),
                    no_telp: $('#pihak_telp_' + i).val()
                });
            }
        }

        var no_rm = $('#gNo_rm').val();
        var formData = {
            id: $('#id').val(),
            no_rm: no_rm,
            nama: $('#gNama').val(),
            alamat: $('#gAlamat').val(),
            HP: $('#gHP').val(), // PERUBAHAN DI SINI: 'hp' menjadi 'HP'
            gambar: document.getElementById('can').toDataURL("image/png"),
            nik: $('#nik').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            perusahaan_pengguna: $('#perusahaan_pengguna').val(),
            perusahaan_penjamin: $('#perusahaan_penjamin').val(),
            batas_biaya: $('input[name="batas_biaya"]:checked').val() || '',
            pihak_keluarga: JSON.stringify(pihakKeluarga)
        };

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/update_gencon",
            method: "POST",
            dataType: 'json',
            data: formData,
            success: function(data) {
                if (data.status === "success") {
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diperbarui"
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                } else if (data.error) {
                    var fields = ['nama', 'alamat', 'hp', 'nik', 'tgl_lahir', 'perusahaan_pengguna', 'perusahaan_penjamin', 'batas_biaya'];
                    fields.forEach(function(field) {
                        // Cek jika ada error dengan key uppercase (khusus untuk HP)
                        var errorKey = field === 'hp' ? 'HP' : field;
                        $('#' + field + '_error').html(data[errorKey] || '');
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status || "Terjadi kesalahan."
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: "Error!",
                    type: "error",
                    text: "Gagal menghubungi server: " + textStatus
                });
            }
        });
        return false;
    }
</script>

<script>
    function cetak() {
        let id = $("#id").val();

        if (!id) {
            swal({
                title: "Peringatan!",
                text: "Silakan pilih data terlebih dahulu sebelum mencetak.",
                type: "warning",
                confirmButtonColor: "#3cb878",
            });
            return;
        }

        // pastikan ada slash sebelum ID
        window.open("<?= base_url('Erm_general_concern/print_general_concern/') ?>" + "/" + id, "_blank");
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>