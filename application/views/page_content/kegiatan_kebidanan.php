<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KEBIDANAN</span></h6>
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

					<table border=0 width=100% cellpadding=4 cellspacing=1 class="table table-striped table-bordered table-hover table-condensed">
						<thead align=center valign=center>
							<tr>
								<!--<td><b>KODE RS</b></td><td><b>KODE PROPINSI</b></td><td><b>KAB/KOTA</b></td><td><b>NAMA RS</b></td><td><b>TAHUN</b></td>-->
								<td width=50 rowspan=3><b>NO</b></td>
								<td rowspan=3><b>JENIS KEGIATAN</b></td>
								<td colspan=10><b>RUJUKAN</b></td>
								<td colspan=3 rowspan=2><b>NON RUJUKAN</b></td>
								<td rowspan=3><b>DIRUJUK</b></td>
							</tr>
							<tr>
								<td colspan=7><b>MEDIS</b></td>
								<td colspan=3><b>NON MEDIS</b></td>
							</tr>
							<tr>
								<td><b>RUMAH SAKIT</b></td>
								<td><b>BIDAN</b></td>
								<td><b>PUSKESMAS</b></td>
								<td><b>FASKES LAINNYA</b></td>
								<td><b>JUMLAH HIDUP</b></td>
								<td><b>JUMLAH MATI</b></td>
								<td><b>JUMLAH TOTAL</b></td>
								<td><b>JUMLAH HIDUP</b></td>
								<td><b>JUMLAH MATI</b></td>
								<td><b>JUMLAH TOTAL</b></td>
								<td><b>JUMLAH HIDUP</b></td>
								<td><b>JUMLAH MATI</b></td>
								<td><b>JUMLAH TOTAL</b></td>
							</tr>
							<tr>
								<td><b>1</b></td>
								<td><b>2</b></td>
								<td><b>3</b></td>
								<td><b>4</b></td>
								<td><b>5</b></td>
								<td><b>6</b></td>
								<td><b>7</b></td>
								<td><b>8</b></td>
								<td><b>9</b></td>
								<td><b>10</b></td>
								<td><b>11</b></td>
								<td><b>12</b></td>
								<td><b>13</b></td>
								<td><b>14</b></td>
								<td><b>15</b></td>
								<td><b>16</b></td>
							</tr>
						</thead>
						<tbody>
							<tr valign=top>
								<td align=center>1</td>
								<td>Persalinan Normal</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>2</td>
								<td>Sectio Caesaria</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>3</td>
								<td>Pers dg Komplikasi</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
							</tr>
							<tr valign=top>
								<td align=center>3.1</td>
								<td>Perd. sbl Persalinan</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>3.2</td>
								<td>Perd. sdh Persalinan</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>3.3</td>
								<td>Pre Eclampsi</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>3.4</td>
								<td>Eclampsi</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>3.5</td>
								<td>Infeksi</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>3.6</td>
								<td>Lain-lain</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>4</td>
								<td>Abortus</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>5</td>
								<td>Imunisasi</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
								<td align=center>-</td>
							</tr>
							<tr valign=top>
								<td align=center>5.1</td>
								<td>Imunisasi TT1</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top>
								<td align=center>5.2</td>
								<td>Imunisasi TT2</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
							<tr valign=top class=danger>
								<td align=center>99</td>
								<td>TOTAL</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
								<td align=center>0</td>
							</tr>
						</tbody>
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