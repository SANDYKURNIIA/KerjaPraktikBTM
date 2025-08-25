<div class="row">
     <div class="col-sm-12">
         <div class="panel panel-default card-view">
             <div class="panel-heading">
                 <div class="pull-left">
                     <h6 class="panel-title txt-dark">Formulir Persetujuan Tindakan Kedokteran</h6>
                 </div>
                 <div class="clearfix"></div>
             </div>
             <div class="panel-wrapper collapse in">

                 <div class="panel-body">
                     <div class="form-wrap">

                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                 <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                             </div>
                         </div>
                         <input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_pelayanan)) ?>" id="inPel">
                         <input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_history)) ?>" id="inHis">
                         <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel2">
                         <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis2">
                         <input type="hidden" class="form-control" value="<?= $data['id_form_tindakan_operasi'] ?>" id ="id">

                         <!-- <input type="hidden" class="form-control" value="<?= $jenis_pelayanan ?>" id="inJenPel"> -->

                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                 <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                             </div>
                         </div>


                         <div class="form-group ">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                 <input type="text" class="form-control" id=nama value="<?= $jenis_kelamin ?>" disabled>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
                                 <input type="text" class="form-control" value="<?php
                                                                                setlocale(LC_ALL, 'id_ID');

                                                                                date_default_timezone_set('Asia/Jakarta');
                                                                                $time = strtotime($tgl_lahir);
                                                                                $date = strftime(" %d %B %Y ", $time);
                                                                                echo $date ?>" disabled>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Ruang<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="text" class="form-control" value="<?= $data['ruang'] ?>" id="Ruang">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Kelas<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="text" class="form-control" value="<?= $data['kelas'] ?>" id="Kelas">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-3">
                                 <label class="control-label mb-10 text-left">Nama Ahli Bedah<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['ahlibedah'] ?>" id=ahlibedah>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-3">
                                 <label class="control-label mb-10 text-left">Nama Perawat<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['perawat'] ?>" id=perawat>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-3">
                                 <label class="control-label mb-10 text-left">Nama Asisten I<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['asisten1'] ?>" id=asisten1>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-3">
                                 <label class="control-label mb-10 text-left">Nama Asisten II<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['asisten2'] ?>" id=asisten2>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>

                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">Diagnosa Prae Operasi<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['diag_pra_opr'] ?>" id=diag_pra_opr>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">Tindakan Operasi<span class="help"></span></label>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input  id="t_operasi1" type="radio" name="t_operasi" <?php if($data['t_operasi']=='Laser, Capsulotomy'){ echo "checked=checked";}  ?> value="Laser, Capsulotomy">
                                     <label class="control-label" for="t_operasi1">
                                         Laser, Capsulotomy
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="t_operasi2" type="radio"  name="t_operasi" <?php if($data['t_operasi']!='Laser, Capsulotomy'){ echo "checked=checked";}  ?>  value="lainnya" >
                                     <label class="control-label" for="t_operasi2">
                                         Operasi Lain
                                     </label>
                                 </div>
                                 <div class="has-success">
                                     <input type="text" class="form-control" id=operasi_lain value="<?= ($data['t_operasi'] == 'Laser, Capsulotomy' ) ? '' : $data['t_operasi'] ?>" <?= ($data['t_operasi'] != 'Laser, Capsulotomy') ? 'style="display:;"' : 'style="display: none;"' ?> >
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">Diagnosa Post Operasi<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['diag_post_opr'] ?>" id=diag_post_opr>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">Indikasi Operasi<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= $data['indikasi_opr'] ?>" id=indikasi_opr>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <strong>
                                     <label class="control-label mb-10 text-left">
                                         <p><br>Jenis Operasi</p>
                                     </label>
                                 </strong>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="jenis_opr1" type="radio" name="jenis_opr" value="Ringan" <?= ($data['jenis_opr'] == 'Ringan') ? 'checked' : '' ?>>
                                     <label class="control-label" for="jenis_opr1">
                                         Ringan
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="jenis_opr2" type="radio" name="jenis_opr" value="Sedang" <?= ($data['jenis_opr'] == 'Sedang') ? 'checked' : '' ?>>
                                     <label class="control-label" for="jenis_opr2">
                                         Sedang
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="jenis_opr3" type="radio" name="jenis_opr" value="Berat" <?= ($data['jenis_opr'] == 'Berat') ? 'checked' : '' ?>>
                                     <label class="control-label" for="jenis_opr3">
                                         Berat
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="jenis_opr4" type="radio" name="jenis_opr" value="Khusus" <?= ($data['jenis_opr'] == 'Khusus') ? 'checked' : '' ?>>
                                     <label class="control-label" for="jenis_opr4">
                                         Khusus
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-4">
                                 <label class="control-label mb-10 text-left">Tanggal Operasi<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="date" class="form-control" value="<?= ($data['tgl_operasi']) ?>" id=tgl_operasi>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-4">
                                 <label class="control-label mb-10 text-left">Operasi Mulai<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="time" class="form-control" id=opr_mulai value="<?= ($data['opr_mulai']) ?>" >
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-4">
                                 <label class="control-label mb-10 text-left">Operasi Selesai<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="time" class="form-control" value="<?= ($data['opr_selesai']) ?>" id=opr_selesai>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Jaringan Yang Di Eksisi/Insisi<span class="help"></span></label>
                                 <div class="has-success">
                                     <textarea class="form-control" name="" cols="30" rows="5" id=jaringan><?= ($data['jaringan']) ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-2">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-4">
                                 <label class="control-label mb-10 text-left">Dikirim Untuk Pemeriksaan Phatologis<span class="help"></span></label>
                             </div>
                             <div class="form-group">
                                 <div class="col-md-2">
                                     <label class="control-label mb-10 text-left"><span class="help"></span></label>
                                 </div>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="p_phatologis1" type="radio" name="p_phatologis" value="Ya" <?= ($data['p_phatologis'] == 'Ya') ? 'checked' : '' ?>>
                                     <label class="control-label" for="p_phatologis1">
                                         Ya
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                             <div class="col-md-2">
                                 <div class="radio-button radio-button-primary">
                                     <input id="p_phatologis2" type="radio" name="p_phatologis" value="Tidak" <?= ($data['p_phatologis'] == 'Tidak') ? 'checked' : '' ?>>
                                     <label class="control-label" for="p_phatologis2">
                                         Tidak
                                     </label>
                                 </div>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left"><span class="help"></span></label>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Jenis Bahan Yang Dikirim Ke Laboratorium<span class="help"></span></label>
                                 <div class="has-success">
                                     <textarea class="form-control" name="" cols="30" rows="5" id=b_labor><?= ($data['b_labor']) ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Uraian Pemeriksaan<span class="help"></span></label>
                                 <div class="has-success">
                                     <textarea class="form-control" name="" cols="30" rows="5" id=uraian><?= ($data['uraian']) ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Cara Approach (Bila Perlu) Dengan Gambar<span class="help"></span></label>
                                 <div class="has-success">
                                     <textarea class="form-control" name="" cols="30" rows="5"  id=c_approach><?= ($data['c_approach']) ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Posisi Penderita (Bila Perlu) Dengan Gambar<span class="help"></span></label>
                                 <div class="has-success">
                                     <textarea class="form-control" name="" cols="30" rows="5" id=p_penderita><?= ($data['p_penderita']) ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-6">
                                 <label class="control-label mb-10 text-left">Singkatan Kelainan Yang Ditemukan Dengan Gambar<span class="help"></span></label>
                                 <div class="has-success">
                                     <textarea class="form-control" name="" cols="30" rows="5" id=s_kelainan><?=($data['s_kelainan']) ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-12">
                                 <strong>
                                     <label class="control-label mb-10 text-left">
                                         <p><br>Antiseptik dilakukan di operasi dengan : Bethadine / alkohol</p>
                                     </label>
                                 </strong>
                             </div>
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">
                                     1. Penderita dalam posisi duduk menghadap Slit Lamp
                                 </label></br>
                                 <label class="control-label mb-10 text-left">
                                     2. Dilakukan penetesan Panctocain 2% pada mata kanan / kiri
                                 </label></br>
                                 <label id="lensa-label" class="control-label mb-10 text-left">
                                 <?= ($data['t_operasi'] == 'Laser, Capsulotomy') ? '3. Dilakukan pemasangan lensa Capsulotomy pada mata kanan / kiri' : '3. Dilakukan pemasangan lensa PRP pada mata kanan / kiri' ?>
                                     
                                 </label></br>
                                 <label class="control-label mb-10 text-left">
                                     4. Dilakukan penempatan poisisi mata pasien
                                 </label></br>
                                 <label id="laser-label" class="control-label mb-10 text-left">
                                 <?= ($data['t_operasi'] == 'Laser, Capsulotomy') ? '5. Dilakukan Laser Nd Yag pada mata kanan / kiri' : '5. Dilakukan Laser PRP pada mata kanan / kiri' ?>
                                     
                                 </label></br>
                                 <label class="control-label mb-10 text-left">
                                     6. Operasi selesai
                                 </label>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="col-md-3">
                                 <label id="jenis" class="control-label mb-10 text-left"><?= ($data['t_operasi'] == 'Laser, Capsulotomy') ? 'Jenis laser' : 'Jenis Pasien' ?><span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" id=jenis_laser value="<?= ($data['jenis_laser']) ?>" <?= ($data['t_operasi'] == 'Laser, Capsulotomy') ? 'style="display:;"' : 'style="display: none;"' ?>>
                                     <input type="text" class="form-control" id=jenis_pasien value="<?= ($data['jenis_pasien']) ?>" <?= ($data['t_operasi'] != 'Laser, Capsulotomy') ? 'style="display:;"' : 'style="display: none;"' ?>>
                                 </div>
                             </div>

                             <div class="col-md-3">
                                 <label class="control-label mb-10 text-left">Jumlah Spot<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= ($data['j_spot']) ?>" id=jumlah_spot>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <label class="control-label mb-10 text-left">Besar Spot<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= ($data['b_spot']) ?>" id=besar_spot>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <label id="durasi" class="control-label mb-10 text-left">Durasi<span class="help"></span></label>
                                 <div class="has-success">
                                     <input type="Text" class="form-control" value="<?= ($data['power']) ?>" id=power <?= ($data['t_operasi'] == 'Laser, Capsulotomy') ? 'style="display:;"' : 'style="display: none;"' ?>>
                                     <input type="text" class="form-control" id=durasi_val value="<?= ($data['durasi_val']) ?>" <?= ($data['t_operasi'] != 'Laser, Capsulotomy') ? 'style="display:;"' : 'style="display: none;"' ?>>
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="col-md-12">
                                 <strong>
                                     <label class="control-label mb-10 text-left">
                                         <p><br>INTRUKSI PASCA BEDAH</p>
                                     </label>
                                 </strong>
                             </div>
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">
                                     1. Kontrol Nadi/Tensi/Nafas/Suhu
                                 </label></br>
                                 <label class="control-label mb-10 text-left">
                                     2. Puasa
                                 </label></br>
                                 <label class="control-label mb-10 text-left">
                                     3. Infus
                                 </label></br>
                                 <label class="control-label mb-10 text-left">
                                     4. Antibiotika
                                 </label></br>
                             </div>
                         </div>
                         <!-- <div class="form-group text-center">
                            <div class="col-md-6">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>laporan dibuat oleh,</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="col-md-6">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Tanggal.... jam..... WIB,</p>
                                    </label>
                                </strong>
                            </div>
                        </div> -->



                         <div class="form-group text-center" style="margin-top: 30px;">
                             <div class="col-md-12">
                                 <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                             </div>
                             <div class="col-md-6">
                                 <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                 <button type="submit" onclick="simpan()" class="btn btn-success mb-4" id="simpan_tin_operasi">Simpan</button>
                                 <button type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                             </div>
                             <div class="col-md-3">
                                 
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
<!--  <script type="text/javascript">
  $(document).ready(function() {
    id_history = $('#inHis').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_poli_edit/get_tindakan_opr",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_history
      },
      success: function(data) {
        if (data.riwayat_alergi == "tidak ada") {
          $('input[name="riwayat_alergi"][value="' + data.riwayat_alergi + '"]').prop("checked", true);
        } else {
          $('input[name="riwayat_alergi"][value="ada"]').prop("checked", true);
          $('#riwayat_alergi').val(data.riwayat_alergi);
          $('#riwayat_alergi').show();
        }
    }
        
        $('#Ruang').val("123");
        $('#Ruang').val(data.Ruang);
        $('#kelas').val(data.kelas);
        $('#ahlibedah').val(data.ahlibedah);
        $('#perawat').val(data.perawat);
        $('#asisten1').val(data.asisten1);
        $('#asisten2').val(data.asisten2);
        $('#diag_pra_opr').val(data.diag_pra_opr);
        $('#diag_post_opr').val(data.diag_post_opr);
        $('#indikasi_opr').val(data.indikasi_opr);
        $('#tgl_operasi').val(data.tgl_operasi);
        $('#opr_mulai').val(data.opr_mulai);
        $('#opr_selesai').val(data.opr_selesai);
        $('#jaringan').val(data.jaringan);
        $('#b_labor').val(data.b_labor);
        $('#uraian').val(data.uraian);
        $('#c_approach').val(data.c_approach);
        $('#p_penderita').val(data.p_penderita);
        $('#s_kelainan').val(data.s_kelainan);
        $('#jenis_laser').val(data.jenis_laser);
        $('#jenis_pasien').val(data.jenis_pasien);
        $('#jumlah_spot').val(data.jumlah_spot);
        $('#besar_spot').val(data.besar_spot);
        $('#power').val(data.power);
        $('#durasi_val').val(data.durasi_val);
    });
  });
  </script>
 -->
 <script type="text/javascript">
     $(document).ready(function() {

        $("#t_operasi2").click(function() {
             if ($(this).is(":checked")) {
                 $("#operasi_lain").show();
             } else {
                 $("#operasi_lain").hide();
             }
         });
         $("#t_operasi2").click(function() {
             if ($(this).is(":checked")) {
                 $("#durasi_val").show();
                 $("#jenis_pasien").show();
                 $('#jenis_opr4').prop("checked", true);
                 $("#power").hide();
                 $("#jenis_laser").hide();
             }
         });
         $("#t_operasi1").click(function() {
             if ($(this).is(":checked")) {
                 $("#durasi_val").hide();
                 $("#jenis_pasien").hide();
                 $("#power").show();
                 $("#jenis_laser").show();
             }
         });
         $("#t_operasi1").click(function() {
             if ($(this).is(":checked")) {
                 $("#operasi_lain").hide();
             }
         });
         
         $('input[type="radio"][name="t_operasi"]').change(function() {
             if ($(this).val() == 'Laser, Capsulotomy') {
                 $('#lensa-label').text('3. Dilakukan pemasangan lensa Capsulotomy pada mata kanan / kiri');
             } else {
                 $('#lensa-label').text('3. Dilakukan pemesangan lensa PRP pada mata kanan / kiri');
             }
         });
         $('input[type="radio"][name="t_operasi"]').change(function() {
             if ($(this).val() == 'Laser, Capsulotomy') {
                 $('#laser-label').text('5. Dilakukan laser Nd Yag pada mata kanan / kiri');
             } else {
                 $('#laser-label').text('5. Dilakukan laser PRP pada mata kanan / kiri');
             }
         });
         $('input[type="radio"][name="t_operasi"]').change(function() {
             if ($(this).val() == 'Laser, Capsulotomy') {
                 $('#jenis').text('Jenis Laser');
             } else {
                 $('#jenis').text('Jenis Pasien');
             }
         });
         $('input[type="radio"][name="t_operasi"]').change(function() {
             if ($(this).val() == 'Laser, Capsulotomy') {
                 $('#durasi').text('Power');
             } else {
                 $('#durasi').text('Durasi');
             }
         });
     });
 </script>
 <script>
     function simpan() {
         id_pelayanan = $('#inPel').val();
         id_history = $('#inHis').val();
         inJenPel = $('#inJenPel').val();
         id = $('#id').val();
         no_rm = $('#inNoRM').val();
         nama = $('#nama').val();
         Ruang = $('#Ruang').val();
         Kelas = $('#Kelas').val();
         ahlibedah = $('#ahlibedah').val();
         perawat = $('#perawat').val();
         asisten1 = $('#asisten1').val();
         asisten2 = $('#asisten2').val();
         diag_pra_opr = $('#diag_pra_opr').val();
         asisten1 = $('#asisten1').val();
         t_operasi = $('input[name="t_operasi"]:checked').val();
         if (t_operasi == "lainnya") {
             t_operasi = $('#operasi_lain').val();
         } else {
            t_operasi = $('#operasi_lain').val('');
         }
         diag_post_opr = $('#diag_post_opr').val();
         indikasi_opr = $('#indikasi_opr').val();
         jenis_opr = $('input[name="jenis_opr"]:checked').val();
         if (jenis_opr == "") {
            jenis_opr = $('#operasi_lain').val('');
         }
         tgl_operasi = $('#tgl_operasi').val();
         opr_mulai = $('#opr_mulai').val();
         opr_selesai = $('#opr_selesai').val();
         jaringan = $('#jaringan').val();
         p_phatologis = $('input[name="p_phatologis"]:checked').val();
         b_labor = $('#b_labor').val();
         uraian = $('#uraian').val();
         c_approach = $('#c_approach').val();
         p_penderita = $('#p_penderita').val();
         s_kelainan = $('#s_kelainan').val();
         jenis_laser = $('#jenis_laser').val();
         jenis_pasien = $('#jenis_pasien').val();
         jumlah_spot = $('#jumlah_spot').val();
         besar_spot = $('#besar_spot').val();
         power = $('#power').val();
         durasi_val = $('#durasi_val').val();

         dataString = 'id=' + id + '&no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&nama=' + nama + '&Ruang=' + Ruang +
             '&Kelas=' + Kelas + '&ahlibedah=' + ahlibedah + '&perawat=' + perawat +
             '&asisten1=' + asisten1 + '&asisten2=' + asisten2 + '&t_operasi=' + t_operasi +
             '&diag_post_opr=' + diag_post_opr + '&diag_pra_opr=' + diag_pra_opr + '&indikasi_opr=' + indikasi_opr +
             '&jenis_opr=' + jenis_opr + '&tgl_operasi=' + tgl_operasi + '&opr_mulai=' + opr_mulai + '&opr_selesai=' + opr_selesai +
             '&jaringan=' + jaringan + '&p_phatologis=' + p_phatologis + '&b_labor=' + b_labor + '&uraian=' + uraian + '&c_approach=' + c_approach +
             '&p_penderita=' + p_penderita + '&s_kelainan=' + s_kelainan + '&jenis_laser=' + jenis_laser + '&jenis_pasien=' + jenis_pasien +
             '&jumlah_spot=' + jumlah_spot + '&besar_spot=' + besar_spot + '&power=' + power + '&durasi_val=' + durasi_val;

         $.ajax({
             url: "<?php echo base_url() ?>Erm_laporan_tin_operasi/update_tind_opr",
             method: "POST",
             dataType: 'json',
             data: dataString,
             success: function(data) {
                 if (data.status == "success") {
                     window.location.href = "<?php echo base_url('Erm_poli/form/') ?>" + id_pelayanan + '/' + id_history + '/POLI';
                     swal({
                         title: "good job!",
                         type: "success",
                         text: "Data Berhasil disimpan",
                         confirmButtonColor: "#3cb878",
                     });
                 }
                 /* else if (data.error) {
                                    if (data.sebab_a != '') {
                                        $('#sebab_a_error').html(data.sebab_a);
                                    } else {
                                        $('#sebab_a_error').html('');
                                    }
                                    if (data.lama_a != '') {
                                        $('#lama_a_error').html(data.lama_a);
                                    } else {
                                        $('#lama_a_error').html('');
                                    }
                                    if (data.sebab_b != '') {
                                        $('#sebab_b_error').html(data.sebab_b);
                                    } else {
                                        $('#sebab_b_error').html('');
                                    }
                                    if (data.lama_b != '') {
                                        $('#lama_b_error').html(data.lama_b);
                                    } else {
                                        $('#lama_b_error').html('');
                                    }
                                    if (data.sebab_2 != '') {
                                        $('#sebab_2_error').html(data.sebab_2);
                                    } else {
                                        $('#sebab_2_error').html('');
                                    }
                                    if (data.lama_2 != '') {
                                        $('#lama_2_error').html(data.lama_2);
                                    } else {
                                        $('#lama_2_error').html('');
                                    }
                                    if (ruda_paksa == "" || ruda_paksa == null) {
                                        $('#ruda_paksa_error').html("*wajib diisi");
                                    }
                                    if (data.cara_rudapaksa != '') {
                                        $('#cara_rudapaksa_error').html(data.cara_rudapaksa);
                                    } else {
                                        $('#cara_rudapaksa_error').html('');
                                    }
                                    if (data.sifat_jejas != '') {
                                        $('#sifat_jejas_error').html(data.sifat_jejas);
                                    } else {
                                        $('#sifat_jejas_error').html('');
                                    }
                                    if (janin_mati == "" || janin_mati == null) {
                                        $('#janin_mati_error').html("*wajib diisi");
                                    }
                                    if (data.sebab_lahir_mati != '') {
                                        $('#sebab_lahir_mati_error').html(data.sebab_lahir_mati);
                                    } else {
                                        $('#sebab_lahir_mati_error').html('');
                                    }
                                    if (persalinan == "" || persalinan == null) {
                                        $('#01').html("*wajib diisi");
                                    }
                                    if (hamil == "" || hamil == null) {
                                        $('#hamil_error').html("*wajib diisi");
                                    }
                                    if (operasi == "" || operasi == null) {
                                        $('#operasi_error').html("*wajib diisi");
                                    }
                                    if (data.jenis_operasi != '') {
                                        $('#jenis_operasi_error').html(data.jenis_operasi);
                                    } else {
                                        $('#jenis_operasi_error').html('');
                                    }
                                    if (data.nama_terang != '') {
                                        $('#nama_terang_error').html(data.nama_terang);
                                    } else {
                                        $('#nama_terang_error').html('');
                                    }

                                } */
                 else {
                     swal({
                         title: "Gagal!",
                         type: "warning",
                         text: data.status,
                         confirmButtonColor: "#3cb878",
                     });
                 }
             }

         });
         // return false;
     }
     function cetak() {
        id_history = $('#inHis2').val();
        id_pelayanan = $('#inPel2').val();
        
        window.location.href = "<?php echo base_url('Erm_poli/print_tin_opr/') ?>" + id_pelayanan + '/' + id_history;
    }
 </script>