<!DOCTYPE html>
<html>

<head>
	<title>Cetak Persetujuan Umum</title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
	<style>
		/* == SEMUA STYLE DIGABUNG DI SINI == */
		body {
			font-family: Arial, sans-serif;
			font-size: 11pt;
			line-height: 1.5;
			color: #000;
		}

		.container {
			max-width: 800px;
			margin: auto;
			background-color: #fff;
			padding: 20px;
		}

		.header {
			text-align: center;
			font-weight: bold;
			margin-bottom: 2em;
		}

		h1 {
			font-size: 14pt;
			margin: 0;
		}

		h2 {
			font-size: 12pt;
			margin: 1.5em 0 1em 0;
			border-bottom: 1px solid #ccc;
			padding-bottom: 5px;
			font-weight: bold;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 1.5em;
		}

		td {
			padding: 3px 5px;
			vertical-align: top;
		}

		.label {
			width: 180px;
			color: #333;
		}

		.colon {
			width: 10px;
		}

		.value {
			border-bottom: 1px dotted #000;
		}

		ol,
		ul {
			padding-left: 25px;
			margin: 0;
		}

		li {
			margin-bottom: 0.7em;
			text-align: justify;
		}

		/* Style untuk tabel keluarga tanpa frame */
		.invisible-table {
			margin-top: 10px;
		}

		.invisible-table td {
			border: none;
			padding: 4px;
		}

		/* PERBAIKAN: Lebar kolom diperbaiki agar realistis */
		.col-num {
			width: 30px;
		}

		.col-nama {
			width: 35%;
			font-weight: bold;
		}

		.col-hubungan {
			width: 30%;
		}

		.col-telp {
			width: auto;
		}

		/* Style untuk radio button custom */
		.radio-custom input[type="radio"] {
			opacity: 0;
			position: fixed;
			width: 0;
		}

		.radio-custom label {
			position: relative;
		}

		.radio-custom label::before {
			content: '';
			display: inline-block;
			width: 16px;
			height: 16px;
			border: 2px solid #ccc;
			border-radius: 50%;
			margin-right: 8px;
			vertical-align: middle;
			background-color: #f0f0f0;
		}

		.radio-custom label::after {
			content: '';
			display: inline-block;
			position: absolute;
			left: 5px;
			top: 5px;
			width: 10px;
			height: 10px;
			border-radius: 50%;
			background-color: black;
			transform: scale(0);
		}

		/* PERBAIKAN: Warna diubah menjadi hitam pekat */
		.radio-custom input[type="radio"]:checked+label::before {
			border-color: red;
			background-color: white;
		}

		.radio-custom input[type="radio"]:checked+label::after {
			transform: scale(1);
		}

		/* Style untuk radio button berbaris ke samping */
		.radio-list {
			display: flex;
			align-items: center;
		}

		.radio-inline {
			margin-right: 20px;
		}
	</style>

</head>

<body>
	<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6; color: #000; background-color: #f4f4f4; margin: 0; padding: 0px;">
		<div style="max-width: 1000px; margin: auto; background-color: #fff; padding: 25px; border-radius: 5px;">
			<table style="width: 100%;">
				<tr>
					<td style="width: 20%;">
						<img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RS" style="width: 180px;">
					</td>
					<td style="width: 80%; text-align: left;">
						<p><b>RS. Bakti Timah</b></p>
						<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
						<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
						<p>Telp. 0717 9100844, Fax. 0715 32165</p>
					</td>
				</tr>
			</table>
			<hr style="border:1px solid #000">
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
									<table>
										<tr>
											<td class="label">Nama Lengkap</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['nama_penanggung_jawab'] ?? '-') ?></td>
										</tr>
										<tr>
											<td class="label">Tanggal Lahir</td>
											<td class="colon">:</td>
											<td class="value"><?= isset($data['tgl_lahir_penanggung_jawab']) ? date('d F Y', strtotime($data['tgl_lahir_penanggung_jawab'])) : '-' ?></td>
										</tr>
										<tr>
											<td class="label">NIK</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['nik_penanggung_jawab'] ?? '-') ?></td>
										</tr>
										<tr>
											<td class="label">Alamat</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['alamat_penanggung_jawab'] ?? '-') ?></td>
										</tr>
										<tr>
											<td class="label">Nomor Telepon</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['hp'] ?? '-') ?></td>
										</tr>
									</table>

									<p>Dengan ini sesungguhnya menyatakan persetujuan terhadap diri saya/istri/suami/anak/ayah/ibu saya (*), yaitu:</p>
									<br>

									<table>
										<tr>
											<td class="label">Nama Lengkap</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['nama_pasien'] ?? '-') . " (" . htmlspecialchars($data['jenis_kelamin'] ?? '-') . ")" ?></td>
										</tr>
										<tr>
											<td class="label">Tanggal Lahir</td>
											<td class="colon">:</td>
											<td class="value"><?= isset($data['tgl_lahir_pasien']) ? date('d F Y', strtotime($data['tgl_lahir_penanggung_jawab'])) : '-' ?></td>
										</tr>
										<tr>
											<td class="label">NIK</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['no_ktp'] ?? '-') ?></td>
										</tr>
										<tr>
											<td class="label">Alamat</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['alamat_pasien'] ?? '-') ?></td>
										</tr>
										<tr>
											<td class="label">Nomor Telepon</td>
											<td class="colon">:</td>
											<td class="value"><?= htmlspecialchars($data['no_hp_pasien'] ?? '-') ?></td>
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
													<li>
														Perusahaan Pengguna: PT
														<span style="display: inline-block; width: 250px; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit;">
															<?= htmlspecialchars($data['perusahaan_pengguna'] ?? '') ?>
														</span>
													</li>
													<li>
														Perusahaan Penjamin Biaya: PT
														<span style="display: inline-block; width: 250px; border-bottom: 1px dotted #000; padding: 2px 0; font-family: inherit; font-size: inherit;">
															<?= htmlspecialchars($data['perusahaan_penjamin'] ?? '') ?>
														</span>
													</li>
												</ul>
											</li>
											<li style="margin-bottom: 0.5em; text-align: justify;">Saya memberi kepercayaan kepada pihak manajemen yang ditetapkan oleh perusahaan dalam poin 3 untuk menjaga kerahasiaan hasil pemeriksaan kesehatan saya yang sesungguhnya bersifat sangat pribadi dan untuk tidak mendiskusikannya secara tertulis tanpa ijin tertulis sebelumnya dari pimpinan perusahaan.</li>
											<li style="margin-bottom: 0.5em; text-align: justify;">Apabila di waktu yang akan datang, ada permintaan tertulis tentang informasi medis saya dari perusahaan tempat saya bekerja, saya mengijinkan informasi medis dari pemeriksaan kesehatan saat ini untuk dibuka oleh perusahaan tersebut.</li>
											<li style="margin-bottom: 0.5em; text-align: justify;">
												Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya, yaitu kepada:
												<br>(Nama, Hubungan Keluarga, No telephone)

												<?php
												if (!empty($data['pihak_keluarga'])) {
													$keluarga_list = json_decode($data['pihak_keluarga'], true);

													if (is_array($keluarga_list) && !empty($keluarga_list)) {
														// Kita gunakan struktur <table> dengan class 'invisible-table'
														echo '<table class="invisible-table">';
														echo '<tbody>';

														$counter = 1;
														foreach ($keluarga_list as $anggota) {
															$nama     = htmlspecialchars($anggota['nama'] ?? '-');
															$hubungan = htmlspecialchars($anggota['hubungan'] ?? '-');
															$telp     = htmlspecialchars($anggota['no_telp'] ?? '-');

															echo '<tr>';
															// Setiap data dimasukkan ke dalam sel tabel (td)
															echo "<td class='col-num'>" . $counter++ . ".</td>";
															echo "<td class='col-nama'>{$nama}  ,</td>";
															echo "<td class='col-hubungan'>{$hubungan}  ,</td>";
															echo "<td class='col-telp'>{$telp}</td>";
															echo '</tr>';
														}

														echo '</tbody>';
														echo '</table>';
													} else {
														echo '<p style="margin-left: 25px;">(Format data keluarga tidak valid)</p>';
													}
												} else {
													echo '<p style="margin-left: 25px;">(Tidak ada data keluarga yang diinput)</p>';
												}
												?>
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
											<li style="margin-bottom: 0.5em; text-align: justify;">
												Saya memahami bila pengobatan/tindakan medis/pemeriksaan diagnostik per item dengan biaya lebih dari:
												<span style="font-weight: bold; margin: 5px 0;">
													<?php
													// Cek jika data batas biaya ada
													if (!empty($data['batas_biaya'])) {
														$batas_biaya = $data['batas_biaya'];

														// Jika nilainya angka, format sebagai Rupiah
														if (is_numeric($batas_biaya)) {
															echo "Rp " . number_format($batas_biaya, 0, ',', '.');
														} else {
															// Jika bukan angka (misal: "Tidak Terbatas"), tampilkan apa adanya
															echo htmlspecialchars($batas_biaya);
														}
													} else {
														// Tampilkan strip jika tidak ada data
														echo "-";
													}
													?>
												</span>
												<br>
												<p>
													Akan dilaksanakan setelah saya menyetujui pengobatan/tindakan medis/pemeriksaan diagnostik tersebut.
												</p>
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
									<table style="width: 100%; margin-top: 5px; text-align: center; border:none;">
										<tr>
											<td style="width: 40%;">
												Petugas,
												<br><br><br><br>
												( <?= htmlspecialchars($data['nama_petugas'] ?? '....................') ?> )
											</td>
											<td style="width: 50%;">
												Penanggung Jawab / Pasien,
												<br>
												<?php if (!empty($data['file_path']) && file_exists($data['file_path'])) : ?>
													<img src="<?= base_url($data['file_path']) ?>" alt="Tanda Tangan" style="height: 80px;">
												<?php else : ?>
													<br><br><br>
												<?php endif; ?>
												<br>
												( <?= htmlspecialchars($data['nama_penanggung_jawab'] ?? '....................') ?> )
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
	<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>
</body>

</html>