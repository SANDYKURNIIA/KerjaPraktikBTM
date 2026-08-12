<<<<<<< HEAD
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100"><?= $judul ?></span></h6>
		</div>
		<div class="clearfix"></div>
		<div class="row mt-30">
			<div class="col-md-12">
				<div class="col-md-3 mt-20">
					<button class="btn btn-primary btn-anim btn-sm" onclick="cetak();"><i class="icon-printer"></i><span class="btn-text">CETAK </span>
				</div>


			</div>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive" id="div_result">
					<table border=1 width=100% cellpadding=4 cellspacing=1 class="table table-hover display pb-30" width="100%" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
						<thead  align=center valign=center>
							<tr >
								<td rowspan=3><b>NO</b></td>
								<td colspan=2 rowspan=3><b>JENIS PENYAKIT</b></td>
								<td colspan=18><b>JUMLAH PASIEN HIDUP & MATI MENURUT GOL. UMUR & JENIS KELAMIN</b></td>
								<td colspan=2 rowspan=2><b>PASIEN KELUAR (HIDUP & MATI)</b></td>
								<td rowspan=3><b>JUMLAH PASIEN KELUAR HIDUP</b></td>
								<td rowspan=3><b>JUMLAH PASIEN KELUAR MATI</b></td>
							</tr>
							<tr>
								<td colspan=2><b>0-6 hr</b></td>
								<td colspan=2><b>7-28 hr</b></td>
								<td colspan=2><b>28hr - <1th< /b>
								</td>
								<td colspan=2><b>1-4 th</b></td>
								<td colspan=2><b>5-14 th</b></td>
								<td colspan=2><b>15-24 th</b></td>
								<td colspan=2><b>25-44 th</b></td>
								<td colspan=2><b>45-64 th</b></td>
								<td colspan=2><b>>65 th</b></td>
							</tr>
							<tr>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
							</tr>
							
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr align=center class="danger">
								<td colspan=3><b>JUMLAH</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	td {
		color: black;
	}
</style>
<script type="text/javascript">
	function cetak() {


		var divContents = document.getElementById("div_result").innerHTML;
		// var a = window.open('', '', 'height=500, width=500');
		var a = window.open();
		a.document.write('<html>');
		// a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
		a.document.write('<body >');
		a.document.write(divContents);
		a.document.write('</body>');
		a.document.write('</html>');
		a.document.close();
		a.print();

	}
=======
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100"><?= $judul ?></span></h6>
		</div>
		<div class="clearfix"></div>
		<div class="row mt-30">
			<div class="col-md-12">
				<div class="col-md-3 mt-20">
					<button class="btn btn-primary btn-anim btn-sm" onclick="cetak();"><i class="icon-printer"></i><span class="btn-text">CETAK </span>
				</div>


			</div>
		</div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive" id="div_result">
					<table border=1 width=100% cellpadding=4 cellspacing=1 class="table table-hover display pb-30" width="100%" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
						<thead  align=center valign=center>
							<tr >
								<td rowspan=3><b>NO</b></td>
								<td colspan=2 rowspan=3><b>JENIS PENYAKIT</b></td>
								<td colspan=18><b>JUMLAH PASIEN HIDUP & MATI MENURUT GOL. UMUR & JENIS KELAMIN</b></td>
								<td colspan=2 rowspan=2><b>PASIEN KELUAR (HIDUP & MATI)</b></td>
								<td rowspan=3><b>JUMLAH PASIEN KELUAR HIDUP</b></td>
								<td rowspan=3><b>JUMLAH PASIEN KELUAR MATI</b></td>
							</tr>
							<tr>
								<td colspan=2><b>0-6 hr</b></td>
								<td colspan=2><b>7-28 hr</b></td>
								<td colspan=2><b>28hr - <1th< /b>
								</td>
								<td colspan=2><b>1-4 th</b></td>
								<td colspan=2><b>5-14 th</b></td>
								<td colspan=2><b>15-24 th</b></td>
								<td colspan=2><b>25-44 th</b></td>
								<td colspan=2><b>45-64 th</b></td>
								<td colspan=2><b>>65 th</b></td>
							</tr>
							<tr>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
								<td><b>L</b></td>
								<td><b>P</b></td>
							</tr>
							
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr align=center class="danger">
								<td colspan=3><b>JUMLAH</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
								<td><b>0</b></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	td {
		color: black;
	}
</style>
<script type="text/javascript">
	function cetak() {


		var divContents = document.getElementById("div_result").innerHTML;
		// var a = window.open('', '', 'height=500, width=500');
		var a = window.open();
		a.document.write('<html>');
		// a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
		a.document.write('<body >');
		a.document.write(divContents);
		a.document.write('</body>');
		a.document.write('</html>');
		a.document.close();
		a.print();

	}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>