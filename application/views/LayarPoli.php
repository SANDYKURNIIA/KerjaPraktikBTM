<?php

$namapolikandungan = $kondisipolikandungan['nama'];
$statuspolikandungan =  $kondisipolikandungan['status'];

$namapolibedah = $kondisipolibedah['nama'];
$statuspolibedah =  $kondisipolibedah['status'];

$namapolianak = $kondisipolianak['nama'];
$statuspolianak =  $kondisipolianak['status'];

$namapolitht = $kondisipolitht['nama'];
$statuspolitht =  $kondisipolitht['status'];

$namapolimata = $kondisipolimata['nama'];
$statuspolimata =  $kondisipolimata['status'];

$namapolimedic = $kondisipolimedic['nama'];
$statuspolimedic =  $kondisipolimedic['status'];

$namapolicontrolmedic = $kondisipolicontrolmedic['nama'];
$statuspolicontrolmedic =  $kondisipolicontrolmedic['status'];

$namapolijantung = $kondisipolijantung['nama'];
$statuspolijantung =  $kondisipolijantung['status'];

$namapoligigi = $kondisipoligigi['nama'];
$statuspoligigi =  $kondisipoligigi['status'];

$namapolikulitkelamin = $kondisipolikulitkelamin['nama'];
$statuspolikulitkelamin =  $kondisipolikulitkelamin['status'];

$namapolipenyakitdalam = $kondisipolipenyakitdalam['nama'];
$statuspolipenyakitdalam =  $kondisipolipenyakitdalam['status'];

$namapoliumum = $kondisipoliumum['nama'];
$statuspoliumum =  $kondisipoliumum['status'];

?>

<div class="row ">
	<div class="col-md-12 mt-30 mb-20 ">

		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">

						<?php if ($namapolikandungan == 'KANDUNGAN' && $statuspolikandungan == 'BUKA') { ?>

							<!-- Kondisi Buka -->
							<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5">
										<div class="col-md-6 text-center text-left">
											<div class="row">
												<h3 class="txt-dark pull-left pl-30 pt-10" style="font-weight:bold; font-size:50px; margin-bottom:-1.6em;">
													POLI KANDUNGAN </h3>
											</div>
										</div>
										<div class="col-md-6">
											<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
												O<?= strtoupper(isset($poli_kandungan['nomor'])?$poli_kandungan['nomor']:''); ?></h1>
										</div>
										</h2>
									</div>
								</div>
							</div>

							<!-- End -->

						<?php } else { ?>

							<!-- Kondisi Tutup -->
							<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center">
										<div class="col-md-12 text-center ">
											<div class="row">
												<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
													POLI KANDUNGAN <p class="pt-15" style="font-weight:bold; font-size:50px;">
														TUTUP</P>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">

						<?php if ($namapolibedah == 'BEDAH' && $statuspolibedah == 'BUKA') { ?>

							<!-- Kondisi Buka -->
							<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5">
										<div class="col-md-6 text-center text-left">
											<div class="row">
												<h3 class="txt-dark pull-left pl-30 pt-40" style="font-weight:bold; font-size:50px;">
													POLI BEDAH </h3>
											</div>
										</div>
										<div class="col-md-6">
											<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
												D<?= strtoupper(isset($poli_bedah['nomor'])?$poli_bedah['nomor']:''); ?></h1>
										</div>
										</h2>
									</div>
								</div>
							</div>

							<!-- End Buka -->

						<?php } else { ?>

							<!-- Kondisi Tutup -->
							<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center">
										<div class="col-md-12 text-center ">
											<div class="row">
												<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
													POLI BEDAH <p class="pt-15" style="font-weight:bold; font-size:50px;">
														TUTUP</P>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">

						<?php if ($namapolianak == 'ANAK' && $statuspolianak == 'BUKA') { ?>

							<!-- Kondisi Buka -->
							<div class="sm-data-box bg-success pt-25 " style="padding-bottom:75px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5">
										<div class="col-md-6 text-center text-left">
											<div class="row">
												<h3 class="txt-dark pull-left pl-30 pt-40" style="font-weight:bold; font-size:50px;">
													POLI ANAK </h3>
											</div>
										</div>
										<div class="col-md-6">
											<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
												F<?= strtoupper(isset($poli_anak['nomor'])?$poli_anak['nomor']:''); ?></h1>
										</div>
										</h2>
									</div>
								</div>
							</div>
							<!-- End Buka -->

						<?php } else { ?>

							<!-- Kondisi Tutup -->
							<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center">
										<div class="col-md-12 text-center ">
											<div class="row">
												<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
													POLI ANAK <p class="pt-15" style="font-weight:bold; font-size:50px;">
														TUTUP</P>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>


	</div>
</div>

<!-- End Top -->


<!-- Tengah 1 -->
<div class="row ">
	<div class="col-md-12 mt-10 mb-20">

		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15 mr-50">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">

								<?php if ($namapolitht == 'THT' && $statuspolitht == 'BUKA') { ?>

									<!-- Kondisi Buka -->
									<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center mb-4 mt-5">
												<div class="col-md-6 text-center text-left">
													<div class="row">
														<h3 class="txt-dark pull-left pl-30 pt-40" style="font-weight:bold; font-size:50px;">
															POLI THT </h3>
													</div>
												</div>
												<div class="col-md-6">
													<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
														L<?= strtoupper(isset($poli_tht['nomor'])?$poli_tht['nomor']:''); ?></h1>
												</div>
												</h2>
											</div>
										</div>
									</div>
									<!-- End Buka -->

								<?php } else {  ?>

									<!-- Kondisi Tutup -->
									<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center">
												<div class="col-md-12 text-center ">
													<div class="row">
														<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
															POLI THT <p class="pt-15" style="font-weight:bold; font-size:50px;">
																TUTUP</P>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End -->

								<?php } ?>

							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="row mt-30">
				<div class="col-md-12">

					<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15 mr-50">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">

								<?php if ($namapolipenyakitdalam == 'PENYAKIT DALAM' && $statuspolipenyakitdalam == 'BUKA') { ?>

									<!-- Kondisi Buka -->
									<div class="sm-data-box bg-success pt-25 " style="padding-bottom:50px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center mb-4 mt-5">
												<div class="col-md-7 text-center text-left">
													<div class="row">
														<h3 class="txt-dark pull-left pl-30 pt-0" style="font-weight:bold; font-size:50px;">
															POLI<p class="pt-10" style="font-weight:bold; font-size:50px; line-height:60px; margin-top:-0.4em; margin-bottom:-0.6em;">
																PENYAKIT DALAM</p>
														</h3>
													</div>
												</div>
												<div class="col-md-5">
													<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
														P<?= strtoupper(isset($poli_penyakit_dalam['nomor'])?$poli_penyakit_dalam['nomor']:''); ?></h1>
												</div>
												</h2>
											</div>
										</div>
									</div>
									<!-- End Buka -->

								<?php } else { ?>

									<!-- Kondisi Tutup -->
									<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center">
												<div class="col-md-12 text-center ">
													<div class="row">
														<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
															POLI PENYAKIT DALAM <p class="pt-15" style="font-weight:bold; font-size:50px;">
																TUTUP</P>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End -->

								<?php } ?>

							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="row mt-30">
				<div class="col-md-12">

					<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15 mr-50">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">

								<?php if ($namapoligigi == 'GIGI' && $statuspoligigi == 'BUKA') { ?>

									<!-- Kondisi Buka -->
									<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center mb-4 mt-5">
												<div class="col-md-6 text-center text-left">
													<div class="row">
														<h3 class="txt-dark pull-left pl-30 pt-40" style="font-weight:bold; font-size:50px;">
															POLI GIGI </h3>
													</div>
												</div>
												<div class="col-md-6">
													<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
														G<?= strtoupper(isset($poli_gigi['nomor'])?$poli_gigi['nomor']:''); ?></h1>
												</div>
												</h2>
											</div>
										</div>
									</div>
									<!-- End Buka -->

								<?php } else { ?>

									<!-- Kondisi Tutup -->
									<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center">
												<div class="col-md-12 text-center ">
													<div class="row">
														<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
															POLI GIGI<p class="pt-15" style="font-weight:bold; font-size:50px;">
																TUTUP</P>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End -->

								<?php } ?>

							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15" style="margin-left:-3.5em; margin-right:-3.5em;">
				<div class="panel-wrapper collapse in">
					<div class="panel-body" style="background-color:#f7f7f9">
						<div class="row">
							<div class="col-md-12 text-center" style="margin-bottom:75px;">
								<h3 style="font-weight:bold; font-size:70px; margin-bottom:180px;padding-top:40px;">
									NOMOR ANTRIAN
									<br>POLI <?= strtoupper($data['poli']); ?></br>
								</h3>
								<h1 class="txt-danger" style="font-size:200px; font-weight:bold;">
									<?= strtoupper($data['kode'] . $data['no']); ?></h1>
								<h3 style="font-weight:normal; font-size:50px; margin-top:180px;"> NAMA PASIEN </h3>
								<h3 class="txt-primary" style="font-weight:bold; font-size:150px; margin-top:-0.2em; ">
									<?= strtoupper($data['nama']); ?></h3>
								</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15 ml-50">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">

								<?php if ($namapolimata == 'MATA' && $statuspolimata == 'BUKA') { ?>

									<!-- Kondisi Buka -->
									<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center mb-4 mt-5">
												<div class="col-md-6 text-center text-left">
													<div class="row">
														<h3 class="txt-dark pull-left pl-30 pt-40" style="font-weight:bold; font-size:50px;">
															POLI MATA </h3>
													</div>
												</div>
												<div class="col-md-6">
													<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
														M<?= strtoupper(isset($poli_mata['nomor'])?$poli_mata['nomor']:''); ?></h1>
												</div>
												</h2>
											</div>
										</div>
									</div>
									<!-- End Buka -->

								<?php } else { ?>

									<!-- Kondisi Tutup -->
									<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center">
												<div class="col-md-12 text-center ">
													<div class="row">
														<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
															POLI MATA<p class="pt-15" style="font-weight:bold; font-size:50px;">
																TUTUP</P>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End -->

								<?php } ?>

							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="row mt-30">
				<div class="col-md-12">

					<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15 ml-50">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">

								<?php if ($namapolijantung == 'JANTUNG' && $statuspolijantung == 'BUKA') { ?>

									<!-- Kondisi Buka -->
									<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center mb-4 mt-5">
												<div class="col-md-6 text-center text-left">
													<div class="row">
														<h3 class="txt-dark pull-left pl-30 pt-20" style="font-weight:bold; font-size:50px; margin-bottom:-0.8em;">
															POLI JANTUNG </h3>
													</div>
												</div>
												<div class="col-md-6">
													<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
														J<?= strtoupper(isset($poli_jantung['nomor'])?$poli_jantung['nomor']:''); ?></h1>
												</div>
												</h2>
											</div>
										</div>
									</div>
									<!-- End Buka -->

								<?php } else { ?>

									<!-- Kondisi Tutup -->
									<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center">
												<div class="col-md-12 text-center ">
													<div class="row">
														<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
															POLI JANTUNG<p class="pt-15" style="font-weight:bold; font-size:50px;">
																TUTUP</P>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End -->

								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-30">
				<div class="col-md-12">

					<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15 ml-50">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">

								<?php if ($namapoliumum == 'UMUM' && $statuspoliumum == 'BUKA') { ?>

									<!-- Kondisi Buka -->
									<div class="sm-data-box bg-success pt-25 " style="padding-bottom:87px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center mb-8 mt-5">
												<div class="col-md-6 text-center text-left">
													<div class="row">
														<h3 class="txt-dark pull-left pl-30 pt-50" style="font-weight:bold; font-size:50px;">
															POLI UMUM </h3>
													</div>
												</div>
												<div class="col-md-6">
													<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
														U<?= strtoupper(isset($poli_umum['nomor'])?$poli_umum['nomor']:''); ?></h1>
												</div>
												</h2>
											</div>
										</div>
									</div>
									<!-- End Buka -->

								<?php } else { ?>

									<!-- Kondisi Tutup -->
									<div class="sm-data-box bg-danger" style="padding-bottom:60px;">
										<div class="row ma-0">
											<div class="col-md-12 text-center">
												<div class="col-md-12 text-center ">
													<div class="row">
														<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
															POLI UMUM<p class="pt-15" style="font-weight:bold; font-size:50px;">
																TUTUP</P>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End -->

								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>

<!-- End Middle 1 -->


<!-- Bawah  -->
<div class="row ">
	<div class="col-md-12 mt-10 mb-20 ">

		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">

						<?php if ($namapolicontrolmedic == 'KONTROL REHAB' && $statuspolicontrolmedic == 'BUKA') { ?>

							<!-- Kondisi Buka -->
							<div class="sm-data-box bg-success pt-20" style="padding-bottom:20px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center mt-4">
										<div class="col-md-6 text-center text-left">
											<div class="row">
												<h3 class="txt-dark pull-left pl-30" style="font-weight:bold; font-size:45px;">
													KONTROL REHABILITAS MEDIC </h3>
											</div>
										</div>
										<div class="col-md-6">
											<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px; ">
												I<?= strtoupper(isset($kontrol_medic['nomor'])?$kontrol_medic['nomor']:''); ?></h1>
										</div>
										</h2>
									</div>
								</div>
							</div>
							<!-- End Buka -->

						<?php } else { ?>

							<!-- Kondisi Tutup -->
							<div class="sm-data-box bg-danger" style="padding-bottom:30px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center">
										<div class="col-md-12 text-center ">
											<div class="row">
												<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
													KONTROL REHABILITAS MEDIC | TUTUP
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">

						<?php if ($namapolikulitkelamin == 'KULIT' && $statuspolikulitkelamin == 'BUKA') { ?>

							<!-- Kondisi Buka -->
							<div class="sm-data-box bg-success pt-25 " style="padding-bottom:75px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5">
										<div class="col-md-6 text-center text-left">
											<div class="row">
												<h3 class="txt-dark pull-left pl-30 pt-20" style="font-weight:bold; font-size:50px;">
													POLI KULIT & <p class="pt-10" style="font-weight:bold; font-size:50px;">
														KELAMIN</p>
												</h3>
											</div>
										</div>
										<div class="col-md-6">
											<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
												K<?= strtoupper(isset($poli_kulit_kelamin['nomor'])?$poli_kulit_kelamin['nomor']:''); ?></h1>
										</div>
										</h2>
									</div>
								</div>
							</div>
							<!-- End Buka -->

						<?php } else { ?>

							<!-- Kondisi Tutup -->
							<div class="sm-data-box bg-danger" style="padding-bottom:73px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center">
										<div class="col-md-12 text-center ">
											<div class="row">
												<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
													POLI KULIT & KELAMIN<p class="pt-15" style="font-weight:bold; font-size:50px;">
														TUTUP</P>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>


		<div class="col-md-4">
			<div class="panel panel-default card-view pa-5 mb-0 pl-15 pt-15 pr-15 pb-15">
				<div class="panel-wrapper collapse in">
					<div class="panel-body pa-0">

						<?php if ($namapolimedic == 'REHABILITAS MEDIK' && $statuspolimedic == 'BUKA') { ?>

							<!-- Kondisi Buka -->
							<div class="sm-data-box bg-success pt-30" style="padding-bottom:43px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5">
										<div class="col-md-6 text-center text-left">
											<div class="row">
												<h3 class="txt-dark pull-left pl-30 pt-20" style="font-weight:bold; font-size:45px;">
													REHABILITAS MEDIC </h3>
											</div>
										</div>
										<div class="col-md-6">
											<h1 class="txt-dark pull-right" style="font-size:165px; font-weight:bold; margin-top:50px; margin-right:20px;">
												R<?= strtoupper(isset($poli_medic['nomor'])?$poli_medic['nomor']:''); ?></h1>
										</div>
										</h2>
									</div>
								</div>
							</div>
							<!-- End Buka -->

						<?php } else { ?>

							<!-- Kondisi Tutup -->
							<div class="sm-data-box bg-danger" style="padding-bottom:70px;">
								<div class="row ma-0">
									<div class="col-md-12 text-center">
										<div class="col-md-12 text-center ">
											<div class="row">
												<h3 class="txt-dark pt-40" style="font-weight:bold; font-size:55px;">
													REHABILITAS MEDIC<p class="pt-15" style="font-weight:bold; font-size:50px;">
														TUTUP</P>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>


	</div>
</div>

<!-- End Bawah -->

<!-- IKLAN -->

<div class="col-md-12 mt-20">
	<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in" style="margin-left:-1em; margin-right:-1em; margin-top:-1em; margin-bottom:-1em">
			<div class="panel-body">
				<!-- START carousel-->
				<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-captions-1" data-slide-to="0" class="active">
						</li>
						<li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
					</ol>
					<div role="listbox" class="carousel-inner">
						<div class="item active"> <img width="100%" src="<?= base_url(); ?>assets/dist/img/footer.jpg">
						</div>
						<div class="item"> <img width="100%" src="<?= base_url(); ?>assets/dist/img/footer2.jpg">
						</div>
					</div>
				</div>
				<!-- END carousel-->
			</div>
		</div>
	</div>
</div>

<!-- END IKLAN -->


<script type="text/javascript">
	isPlay = false;

	var currentAudio = null;

	function test() {
		alert(audios.length);
		audios[0].play();
	}


	function read_digit(digit) {
		if (digit < 10) {
			return parseInt(digit) + ",";
		} else if (digit < 100) {
			return read_puluhan(digit);
		} else if (digit < 1000) {
			return read_ratusan(digit);
		} else if (digit < 10000) {
			return read_ribuan(digit);
		} else if (digit < 100000) {
			return read_puluhribuan(digit);
		} else {
			strNo = digit + "";
			tmpout = "";
			for (var i = 0; i < (strNo.length); i++) {
				tmpout += strNo.charAt(i) + ",";
			}
			return tmpout;
		}
	}

	function read_puluhribuan(digit) {
		strdigit = digit + "";
		var out1 = "";
		var out2 = "";
		if (digit == 10000) {
			out1 = "sepuluh,ribu";
		} else if (digit < 11000) {
			out1 = "sepuluh,ribu,";
			out2 = read_ratusan(strdigit.substring(2, 5));
		} else if (digit > 11000 && digit < 12000) {
			out1 = "sebelas,ribu,";
			out2 = read_ratusan(strdigit.substring(2, 5));
		} else if (digit < 20000) {
			out1 = strdigit.charAt(1) + ",belas,ribu,";
			out2 = read_ratusan(strdigit.substring(2, 5));
		} else {
			out1 = strdigit.charAt(0) + ",puluh," + strdigit.charAt(1) + ",ribu,";
			out2 = read_ratusan(strdigit.substring(2, 5));
		}
		return out1 + out2;
	}

	function read_ribuan(digit) {
		strdigit = digit + "";
		var out1 = "";
		var out2 = "";
		if (digit == 1000) {
			out1 = "seribu";
		} else if (digit > 1000 && digit < 2000) {
			out1 = "seribu,";
			out2 = read_ratusan(strdigit.substring(1, 4));
		} else {
			out1 = strdigit.charAt(0) + ",ribu,";
			out2 = read_ratusan(strdigit.substring(1, 4));
		}
		return out1 + out2;
	}

	function read_ratusan(digit) {
		strdigit = digit + "";
		var out1 = "";
		var out2 = "";
		if (digit == 100) {
			out1 = "seratus";
		} else if (digit == 200) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 300) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 400) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 500) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 600) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit < 100) {
			out1 = ",";
			out2 = read_puluhan(strdigit.substring(1, 3));
		} else if (digit > 100 && digit < 200) {
			out1 = "seratus,";
			out2 = read_puluhan(strdigit.substring(1, 3));
		} else {
			out1 = strdigit.charAt(0) + ",ratus,";
			out2 = read_puluhan(strdigit.substring(1, 3));
		}
		return out1 + out2;
	}

	function read_puluhan(digit) {
		strdigit = digit + "";
		if (digit == 10) {
			return "sepuluh";
		} else if (digit < 10) {
			return parseInt(digit);
		} else if (digit == 11) {
			return "sebelas";
		} else if (digit > 11 && digit < 20) {
			return strdigit.charAt(1) + ",belas";
		} else {
			if (strdigit.charAt(1) == "0") {
				return strdigit.charAt(0) + ",puluh,";
			} else {
				return strdigit.charAt(0) + ",puluh," + strdigit.charAt(1);
			}
		}
	}

	function playSuaraAntrian(no, kode, poli, tipe) {

		if (isPlay == false && no != '') {
			isPlay = true;

			charAntrian = kode;
			noAntrian = parseInt(no);
			strNo = noAntrian + "";

			urutan = [];
			urutan.push('IN');
			urutan.push('NO ANTRIAN');
			urutan.push(kode);
			ReadNo = read_digit(noAntrian);

			ReadNo_arr = ReadNo.split(",");
			for (var i = 0; i < (ReadNo_arr.length); i++) {
				if (ReadNo_arr[i] != "") {
					urutan.push(ReadNo_arr[i]);
				}
			}

			urutan.push('SILAHKAN MENUJU KE POLI');
			urutan.push(tipe);
			urutan.push('OUT');

			index = 0;

			audios = {};
			urutan.forEach(note => {
				var audio = new Audio();
				audio.src = `<?= base_url(); ?>assets/audio/${note}.mp3`;
				audios[note] = audio;
			});

			currentAudio = null;

			playNoteAntrian();

		} else {
			hapusAtasAntrian();
		}

	}
</script>

<script type="text/javascript">
	function playNoteAntrian() {
		if (currentAudio) {
			currentAudio.removeEventListener('ended', playNoteAntrian);
		}

		if (index >= urutan.length) {

			isPlay = false;
			hapusAtasAntrian();
			return;
		}

		currentAudio = audios[urutan[index]];
		index++;
		currentAudio.play();
		currentAudio.addEventListener('ended', playNoteAntrian);
	}

	//  Beda
	<?php
	if ($data > 0) {
	?>
		playSuaraAntrian(<?= "'" . $data['no'] . "','" . $data['kode'] . "','" . $data['tipe'] . "','" . $data['poli'] . "'"; ?>);

	<?php
	} else {
	?>
		setTimeout(location.reload.bind(location), 5000);
	<?php } ?>


	function hapusAtasAntrian() {
		$.ajax({
			url: "<?= base_url() ?>LayarPoli/deleteSuara",
			method: "POST",
			dataType: "JSON",
			data: "",
			success: function(data) {
				setTimeout(location.reload.bind(location), 3000);
			}
		});
	}
</script>