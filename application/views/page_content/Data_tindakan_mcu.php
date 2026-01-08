<style>
	* {
		box-sizing: border-box
	}

	/* Slideshow container */
	.slideshow-container {
		max-width: 1000px;
		position: relative;
		margin: auto;
	}

	/* Hide the images by default */
	.mySlides {
		animation-name: fade;
		animation-duration: 1.5s;
	}

	/* Next & previous buttons */
	.prev,
	.next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		margin-top: -22px;
		padding: 16px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
		opacity: 0
	}

	/* Position the "next button" to the right */
	.next {
		right: 0;
		border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
		background-color: black;
		color: white;
		opacity: 1
	}


	@-webkit-keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}

	@keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}
</style>
<?php if ($this->session->flashdata('swal')): ?>
<script>
Swal.fire({
    icon: '<?= $this->session->flashdata('swal')['type']; ?>',
    title: '<?= $this->session->flashdata('swal')['title']; ?>',
    html: '<?= $this->session->flashdata('swal')['text']; ?>',
    confirmButtonText: 'OK'
});
</script>
<?php endif; ?>
<div class="row" onload="checkData()">
	<div class="col-lg-3 col-md-12">
		<div class="panel panel-success card-view  pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body  pa-0">
					<div class="profile-box">
						<div class="profile-info-wrap text-center">
							<div class="profile-info pt-40">
								<h4 class="txt-light block  mb-5 capitalize-font"><?php echo $pasien['nama_pasien'] ?></h4>
								<h6 class="txt-light block uppercase-font pb-40"><?php echo indo_date2($pasien['tgl_lahir']) ?></h6>
							</div>
							<div class="profile-image-overlay"></div>
						</div>
						<input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
						<input type="hidden" class="form-control" value="<?= $pasien['no_rm'] ?>" id="noRM">
					</div>
				</div>
			</div>
		</div>

		<div class="panel card-view">
			<div class="panel-wrapper">
				<div class="panel-heading">
					<!-- <div class="pull-left">
                        <h6 class="panel-title txt-dark">RIWAYAT MEDIS</h6>
                    </div> -->
					<button class="btn btn-success col-md-12" style="margin: 3px" onclick="riwayat()">RIWAYAT MEDIS</button>
					<div class="clearfix"></div>
				</div>

				<div class="panel-body task-panel">

					<div class="list-group mb-0" id="slide"></div>


				</div>

			</div>
		</div>

	</div>
	<div class="col-lg-9 col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-light">FORM TINDAKAN MCU</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row lds-dual-ring overlay">
								<div class="col-lg-12">
									<div class="button-list mt-25">
										<div id="penunjang" style="margin-bottom: 50px;">


											<h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>PENUNJANG</h5>
											<hr width="100%">
											<?php echo
											"<button class='btn btn-success col-md-5' onclick='edit_mcu(\"" . $id_pelayanan . "\")'>
                                            Tindakan MCU
                                        </button>";
											?>
											<?php echo
											"<button class='btn btn-success col-md-5' onclick='edit_paket(\"" . $id_pelayanan . "\")'>
                                            Paket MCU
                                        </button>";
											?>
											<?php echo
											"<button class='btn btn-success col-md-5' onclick='edit_radiologi(\"" . $id_pelayanan .  "\")'>
                                            Radiologi
                                        </button>";
											?>
											<?php echo
											"<button class='btn btn-success col-md-5' onclick='edit_labor(\"" . $id_pelayanan . "\")'>
                                            Labor
                                        </button>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Mcu/edit_detail/') . $id_pelayanan . "'>
                                            MCU
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Mcu/cetak_sertif/') . $id_pelayanan . "'>
                                            Cetak Sertifikat
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Kasir/print_kasirmcu/') . $id_pelayanan . "'>
                                            Billing Kasir
                                        </a>";
											?>
											<a class="btn btn-success col-md-5 asses_per_igd" href="<?php echo base_url('Resume_okupasi/form_perawat/post/') . $id_pelayanan; ?>">
												Assesmen Rawat Jalan / Assesmen Awal
											</a>

											<!-- <a class="btn btn-success col-md-5 asses_per_igd" onclick="cek_skrining_tbc()">
                                        Assesmen Rawat Jalan / Assesmen Awal
                                    </a> -->

											<a class="btn btn-success col-md-5 asses_dokter_igd" href="<?php echo base_url('Resume_okupasi/form_dokter/post/') . $id_pelayanan; ?>">
												Assesmen Dokter
											</a>


											<a class="btn btn-success col-md-5 resume" href="<?= base_url('Resume_okupasi/resume/') . $id_pelayanan; ?>">
												Resume Medis Rajal
											</a>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Surat_mcu/Pemeriksaan_Fisik/') . $id_pelayanan . "'>
                                            Antropometri
                                        </a>";
											?>

											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Surat_mcu/form_pemeriksa/') . $id_pelayanan . "'>
                                            Form Pemeriksaan
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/audiometri/') . $id_pelayanan . "'>
                                            Audiometri
                                        </a>";
											?>

											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/bedah/') . $id_pelayanan . "'>
                                            Bedah
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/gigi/') . $id_pelayanan . "'>
                                            Gigi Geligi
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/kardiologi/') . $id_pelayanan . "'>
                                            Kardiologi
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/kebidanan/') . $id_pelayanan . "'>
                                            Kebidanan
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/mata/') . $id_pelayanan . "'>
                                            Mata
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/neurologi/') . $id_pelayanan . "'>
                                            Neurologi
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/paru/') . $id_pelayanan . "'>
                                            Paru
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/spirometri/') . $id_pelayanan . "'>
                                            Spirometri
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Pemeriksaan_fisik_mcu/form_periksa_tambahan/tht/') . $id_pelayanan . "'>
                                            THT
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Kesimpulan_mcu/form/kesimpulan_klinis/') . $id_pelayanan . "'>
                                            Kesimpulan Klinis
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Kesimpulan_mcu/form/kesimpulan_okupasi/') . $id_pelayanan . "'>
                                            Kesimpulan Okupasi
                                        </a>";
											?>

											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Quitioners/tampil/') . $id_pelayanan . "'>
                                            Form Quitioners
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('Kesimpulan_mcu/buku_mcu/') . $id_pelayanan . "'>
                                            BUKU MCU
                                        </a>";
											?>
											<?php echo
											"<a class='btn btn-success col-md-5' href='" . base_url('ResikoLingkungan/tampil/') . $id_pelayanan . "'>
                                            Resiko Lingkungan Pekerjaan
                                        </a>";
											?>
											<a class='btn btn-success col-md-5' onclick='toggleSuratKeteranganSakit()'>
												Surat Keterangan Sakit
											</a>

											
											<div class="clearfix"></div>

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
</div>
<style>
	p {
		color: black;
	}
</style>
<?php $this->load->view('modal_mcu/view_penunjang') ?>
<script type="text/javascript">
	function riwayat() {
		no_rm = $('#noRM').val();
		$.ajax({
			url: "<?php echo base_url() ?>Erm_igd/getRiwayat",
			method: "POST",
			dataType: 'json',
			data: {
				id: no_rm
			},
			success: function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html +=
						'<a href = "javascript:void(0)"class = "list-group-item" >' +
						'<strong> ' + data[i].jenis_pelayanan + '</strong> <br>' +
						'<span class = "inline-block font-12  mb-5" >' + data[i].tgl_masuk + ' s/d ' + data[i].tgl_keluar + ' </span>' +
						'<div class = "clearfix" > </div> ' +
						'<p> Diagnosa: ' + data[i].diagnosa + ' </p>' +
						'<p> DPJP: ' + data[i].dokter + ' </p> </a>';
				}
				$('#slide').html(html)


			}

		});
		return false;

	}

	function erm() {
		no_rm = $('#noRM').val();
		$.ajax({
			url: "<?php echo base_url() ?>Erm_igd/getErm",
			method: "POST",
			dataType: 'json',
			data: {
				id: no_rm
			},
			success: function(data) {
				if (data.status == 'found') {
					var html = '';
					var i;
					for (i = 0; i < data.erm.length; i++) {
						html +=
							'<a href = "<?= base_url('Erm_igd/form_riwayat/') ?>' + data.erm[i].id_pelayanan + '/' + data.erm[i].id_history + '" class="list-group-item" >' +
							'<strong> ERM ' + (i + 1) + '</strong><br>' +
							'<span class = "inline-block font-12  mb-5" >' + data.erm[i].tgl_masuk + ' s/d ' + data.erm[i].tgl_keluar + ' </span>' +
							'<div class = "clearfix" > </div> ' +
							'<p> Diagnosa: ' + data.erm[i].diagnosa + ' </p>' +
							'<p> DPJP: ' + data.erm[i].dpjp + ' </p></a>  ';
					}
					$('#slide1').html(html)
				} else {
					html = '<p> Tidak Ada Data </p>';
					$('#slide1').html(html)
				}


			}

		});
		return false;

	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
			url: "<?php echo base_url() ?>Erm_poli/checkData",
			method: "POST",
			dataType: 'json',
			data: {
				id: '<?= $id_pelayanan ?>'
			},
			success: function(data) {

				if (data.asses_per_igd == "found") {
					$('.asses_per_igd').removeClass('btn-success').addClass('btn-danger ');
					$('.asses_per_igd').attr('href', '<?php echo base_url('Resume_okupasi/form_perawat/put/') . $id_pelayanan; ?>');
				}
				if (data.asses_dokter_igd == "found") {
					$('.asses_dokter_igd').removeClass('btn-success').addClass('btn-danger ');
					$('.asses_dokter_igd').attr('href', '<?php echo base_url('Resume_okupasi/form_dokter/put/') . $id_pelayanan; ?>');
				}

			}
		});
		return false;
	});
</script>
<script>
	// $(document).ready(function() {
	//     // var slideIndex = 0;
	//     showSlides(0);

	// });

	// Next/previous controls
	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		// var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = slides.length
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		// for (i = 0; i < dots.length; i++) {
		//     dots[i].className = dots[i].className.replace(" active", "");
		// }
		slides[slideIndex - 1].style.display = "block";
		// dots[slideIndex - 1].className += " active";
	}

	function toggleSuratKeteranganSakit() {
	    const no_rm = $('#noRM').val();
    	$('#no_rm').val(no_rm); 
		$('#modal_medic_sertif').modal('toggle');
	}

</script>