 <div class="form_rehab">

     <div class="col-md-12">
         <div class="form-group ">
             <label class="control-label col-md-3">TANGGAL PERIKSA</label>
             <label class="control-label col-md-1">:</label>
             <div class="col-md-6 has-success">
                 <input type="date" class="form-control" id="tgl_periksad" name="tgl_periksad" value="<?= date('Y-m-d'); ?>">
                 <span class="help-block"></span>
             </div>
         </div>
     </div>

     <center><label class="control-label" style="margin-top:30px;"><strong>
                 <h5>PEMERIKSAAN BAGIAN REHAB</h5>
             </strong></label></center>

     <div class="clearfix">&nbsp;</div>
     <div class="col-md-12 " style="margin-top:30px;">
         <div class="form-group ">
             <label class="control-label col-md-3">1. ANAMNESIS</label>
             <label class="control-label col-md-1">:</label>
             <div class="col-md-6 has-succes">
                 <textarea solid=#00ff00 class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="anamnesis_jan" name="anamnesis_jan"><?php echo empty($data_bprehab['anamnesis']) ? '' : $data_bprehab['anamnesis']; ?></textarea>
                 <span class="help-block"></span>
             </div>
         </div>
     </div>



     <div class="col-md-12" style="margin-top:20px">

         <div class="form-group ">
             <label class="control-label col-md-3">2. PEMERIKSAAN FISIK</label>
             <label class="control-label col-md-1">:</label>
             <div class="col-md-6 has-succes">
                 <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="pemeriksaan_fisik" name="pemeriksaan_fisik"><?php echo empty($data_bprehab['pemeriksaan_fisik']) ? '' : $data_bprehab['pemeriksaan_fisik']; ?></textarea>
                 <span class="help-block"></span>
             </div>
         </div>
     </div>

     <div class="col-md-12" style="margin-top:20px">
         <div class="form-group ">
             <table class="table display product-overview mb-30" id="support_table" style="float: left; margin-left:" cellpading="5">
                 <thead>
                     <tr>
                         <th width="10px"></th>
                         <th width="100px">
                             <center>Pertanyaan</center>
                         </th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td></td>
                     <tr>
                         <td></td>
                         <td>Status Lokalis
                         <td>
                             :
                         </td>
                         <td></td>
                         </td>
                         <td>
                             <div class="col-md-6">
                                 <div class="form-group ">
                                     <div class="col-md-12 has-success">
                                         <input type="text" class="form-control" id="status_lokasi" name="status_lokasi">
                                         <!-- placeholder="S1 S2 Normal, Reguler, Mur - Mur" -->
                                         <span class="help-block"></span>
                                     </div>
                                 </div>
                             </div>
                         </td>
                     </tr>

                     <td></td>
                     <td>Inspeksi
                     <td>
                         :
                     </td>
                     <td></td>
                     </td>
                     <td>
                         <div class="col-md-6">
                             <div class="form-group ">
                                 <div class="col-md-12 has-success">
                                     <input type="text" class="form-control" id="inspeksi3" name="inspeksi3">
                                     <!-- placeholder="Ictus Cordis tak tampak" -->
                                     <span class="help-block"></span>
                                 </div>
                             </div>
                         </div>
                     </td>
                     </tr>

                     <tr>
                         <td></td>
                         <td>Palapasi
                         <td>
                             :
                         </td>
                         <td></td>
                         </td>
                         <td>
                             <div class="col-md-6">
                                 <div class="form-group ">
                                     <div class="col-md-12 has-success">
                                         <input type="text" class="form-control" id="palapasi3" name="palapasi3">
                                         <!-- placeholder="Ictus Cordis teraba di SIC 3-4 , LMCS" -->
                                         <span class="help-block"></span>
                                     </div>
                                 </div>
                             </div>
                         </td>
                     </tr>

                     <tr>
                         <td></td>
                         <td>Movement
                         <td>
                             :
                         </td>
                         <td></td>
                         </td>
                         <td>
                             <div class="col-md-6">
                                 <div class="form-group ">
                                     <div class="col-md-12 has-success">
                                         <input type="text" class="form-control" id="movement" name="movement">
                                         <!-- placeholder="Batas Jantung tidak melebar" -->
                                         <span class="help-block"></span>
                                     </div>
                                 </div>
                             </div>
                         </td>
                     </tr>

                     <tr>
                         <td></td>
                         <td>Tes Provokasi
                         <td>
                             :
                         </td>
                         <td></td>
                         </td>
                         <td>
                             <div class="col-md-6">
                                 <div class="form-group ">
                                     <div class="col-md-12 has-success">
                                         <input type="text" class="form-control" id="tes_provokasi" name="tes_provokasi">
                                         <!-- placeholder="S1 S2 Normal, Reguler, Mur - Mur" -->
                                         <span class="help-block"></span>
                                     </div>
                                 </div>
                             </div>
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <div class="col-md-12" style="margin-top:20px">
         <div class="form-group ">
             <label class="control-label col-md-3">3. PENUNJANG</label>
             <label class="control-label col-md-1">:</label>
             <div class="col-md-6 has-succes">
                 <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="penunjang_jan" name="penunjang_jan"><?php echo empty($data_bprehab['penunjang']) ? '' : $data_bprehab['penunjang']; ?></textarea>
                 <span class="help-block"></span>
             </div>
         </div>
     </div>
     <div class="col-md-12" style="margin-top:20px">
         <div class="form-group ">
             <label class="control-label col-md-3"><strong>KESAN</strong></label>
             <label class="control-label col-md-1">:</label>
             <div class="col-md-6 has-succes">
                 <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="kesan_jan" name="kesan_jan"><?php echo empty($data_bprehab['kesan']) ? '' : $data_bprehab['kesan']; ?></textarea>
                 <span class="help-block"></span>
             </div>
         </div>
     </div>
     <div class="col-md-12" style="margin-top:20px">
         <div class="form-group ">
             <label class="control-label col-md-3"><strong>SARAN</strong></label>
             <label class="control-label col-md-1">:</label>
             <div class="col-md-6 has-succes">
                 <textarea class="form-control" style="text-align: justify; padding: 5px; border: 3px solid #999999" rows="5" cols="90" id="saran_jan" name="saran_jan"><?php echo empty($data_bprehab['saran']) ? '' : $data_bprehab['saran']; ?></textarea>
                 <span class="help-block"></span>
             </div>
         </div>
     </div>
     <div class="col-md-8">
         <div class="form-group pull-right">
             <button onclick="insertDataBagianRehab()" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">Cetak</span>
             </button>
         </div>
     </div>
 </div>
 <script>
     function insertDataBagianRehab() {
         id_mcu = $('#id_mcu_form').val();
         anamnesis = $('#anamnesis_jan').val();
         pemeriksaan_fisik = $('#pemeriksaan_fisik').val();
         status_lokasi = $("#status_lokasi").val();
         inspeksi = $("#inspeksi3").val();
         palapasi = $("#palapasi3").val();
         movement = $("#movement").val();
         tes_provokasi = $("#tes_provokasi").val();
         penunjang = $('#penunjang_jan').val();
         kesan = $('#kesan_jan').val();
         saran = $('#saran_jan').val();
         tgl_periksad = $('#tgl_periksad').val();

         $().ready(function() {
             $.ajax({
                 url: "<?php echo base_url() ?>Surat_mcu/cetak_bagian_rehab",
                 method: "POST",
                 dataType: 'html',
                 data: {
                     id_mcu: id_mcu,
                     anamnesis: anamnesis,
                     pemeriksaan_fisik: pemeriksaan_fisik,
                     status_lokasi: status_lokasi,
                     inspeksi: inspeksi,
                     palapasi: palapasi,
                     movement: movement,
                     tes_provokasi: tes_provokasi,
                     penunjang: penunjang,
                     kesan: kesan,
                     saran: saran,
                     tgl_periksad: tgl_periksad,
                 },
                 success: function(data) {
                     // if (data.status == "success") {
                     //     swal({
                     //         title: "good job!",
                     //         type: "success",
                     //         text: "Data Medical Check Up Pasien ini telah disimpan",
                     //         confirmButtonColor: "#3cb878",

                     //     });

                     //     $('#datable').DataTable().ajax.reload();
                     //     window.location.href = 'javascript:history.go(-1)';
                     $("#div_result").html(data);
                     var divContents = document.getElementById("div_result").innerHTML;
                     // var a = window.open('', '', 'height=500, width=500');
                     var a = window.open();
                     a.document.write('<html>');
                     // a.document.write('<head><style type="text/css"> @page {size: A5;margin: 0;} body { margin: 0; } </style> </head>');
                     a.document.write('<body >');
                     a.document.write(divContents);
                     a.document.write('</body>');
                     a.document.write('</html>');
                     setTimeout(function() { // wait until all resources loaded 
                         a.document.close(); // necessary for IE >= 10
                         a.focus(); // necessary for IE >= 10
                         a.print(); // change window to winPrint
                         a.close(); // change window to winPrint
                     }, 500);
                     // } else {
                     //     swal({
                     //         title: "Gagal!",
                     //         type: "warning",
                     //         text: data.status,
                     //         confirmButtonColor: "#3cb878",
                     //     });
                     // }
                 }
             });
         });
         return false;
     }
 </script>