<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KUNJUNGAN RAWAT DARURAT</span></h6>
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

<table  border=0 width=100% cellpadding=4 cellspacing=1  class="table table-striped table-bordered table-hover table-condensed">
	<thead align=center valign=center>
		<tr>
			<!--<td><b>KODE RS</b></td><td><b>KODE PROPINSI</b></td><td><b>KAB/KOTA</b></td><td><b>NAMA RS</b></td><td><b>TAHUN</b></td>-->
			<td rowspan=2><b>NO</b></td><td rowspan=2><b>JENIS PELAYANAN</b></td><td colspan=2><b>TOTAL PASIEN</b></td><td colspan=3><b>TINDAK LANJUT PELAYANAN</b></td><td rowspan=2><b>MATI DI IGD</b></td><td rowspan=2><b>DOA</b></td>
		</tr>
		<tr>
			<!--<td><b>KODE RS</b></td><td><b>KODE PROPINSI</b></td><td><b>KAB/KOTA</b></td><td><b>NAMA RS</b></td><td><b>TAHUN</b></td>-->
			<!--<td><b>NO</b></td><td><b>JENIS PELAYANAN</b></td><td><b>PASIEN AWAL TAHUN</b></td><td><b>PASIEN MASUK</b></td><td><b>PASIEN KELUAR HIDUP</b></td>-->
			<td><b>RUJUKAN</b></td><td><b>NON RUJUKAN</b></td><td><b>DIRAWAT</b></td><td><b>DIRUJUK</b></td><td><b>PULANG</b></td>
		</tr>
		<tr>
			<td><b>1</b></td><td><b>2</b></td><td><b>3</b></td><td><b>4</b></td><td><b>5</b></td><td><b>6</b></td><td><b>7</b></td><td><b>8</b></td><td><b>9</b></td>		</tr>
	</thead>
	<tbody>
		<tr valign=top><td align=center>1</td><td>Bedah</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td></tr><tr valign=top><td align=center>2</td><td>Non Bedah</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td></tr><tr valign=top><td align=center>3</td><td>Kebidanan</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td></tr><tr valign=top><td align=center>4</td><td>Psikiatrik</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td></tr><tr valign=top><td align=center>5</td><td>Anak</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td></tr><tr valign=top class=danger><td align=center>99</td><td>TOTAL</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td><td align=center>0</td></tr>	</tbody>
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
</script>