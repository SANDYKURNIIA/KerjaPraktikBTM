<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Formulir Rawat Jalan – Kedokteran Fisik & Rehabilitasi Medik</h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <!-- BARIS IDENTITAS: format seperti contoh -->
       <div class="form-group">
  <div class="col-md-3">
    <label class="control-label mb-10 text-left">No.RM</label>
    <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
  </div>
  <div class="col-md-3">
    <label class="control-label mb-10 text-left">Nama</label>
    <input type="text" class="form-control" value="<?= $nama ?? '' ?>" disabled>
  </div>
  <div class="col-md-3">
    <label class="control-label mb-10 text-left">No. Telepon</label>
    <input type="text" class="form-control" value="<?= $no_hp ?? '' ?>" disabled>
  </div>
  <div class="col-md-3">
    <label class="control-label mb-10 text-left">Tanggal Masuk</label>
    <input type="text" class="form-control" value="<?= isset($tgl_masuk)&&$tgl_masuk ? strftime(' %d %B %Y ', strtotime($tgl_masuk)) : '' ?>" disabled>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <label class="control-label mb-10 text-left">Tgl Lahir / Umur</label>
    <input type="text" class="form-control" value="<?php
      if (!empty($tgl_lahir)) {
        setlocale(LC_ALL, 'id_ID'); date_default_timezone_set('Asia/Jakarta');
        $time = strtotime($tgl_lahir); $date = strftime(' %d %B %Y ', $time);
        if (!function_exists('getAge')) {
          function getAge($dob){ $from=new DateTime($dob); $to=new DateTime('today'); return $from->diff($to)->y.' th'; }
        }
        echo $date . '(' . getAge($tgl_lahir) . ')';
      } ?>" disabled>
  </div>
  <div class="col-md-6">
    <label class="control-label mb-10 text-left">Alamat</label>
    <input type="text" class="form-control" value="<?= $alamat ?? '' ?>" disabled>
  </div>
</div>


            <!-- Hidden ids (RAW & B64) -->
            <input type="hidden" id="inPelRaw" value="<?= $id_pelayanan ?>">
            <input type="hidden" id="inHisRaw" value="<?= $id_history ?>">
            <input type="hidden" id="inPelB64" value="<?= $id_pel_b64 ?>">
            <input type="hidden" id="inHisB64" value="<?= $id_his_b64 ?>">
            <input type="hidden" id="inStaff"  value="<?= $id_staff ?>">

            <!-- Pengisian form klinis (rapi seperti contoh) -->
         <div class="form-group row">
  <div class="col-md-4">
    <label class="control-label mb-10 text-left">Hubungan dengan tertanggung</label>
    <?php $hub = isset($form->hubungan_tertanggung) ? $form->hubungan_tertanggung : ''; ?>
    <select id="hubungan" class="form-control">
      <option value="">-- Pilih --</option>
      <option value="SUAMI/ISTERI" <?= $hub=='SUAMI/ISTERI'?'selected':''; ?>>Suami/Isteri</option>
      <option value="ANAK" <?= $hub=='ANAK'?'selected':''; ?>>Anak</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <div class="col-md-6">
    <label class="control-label mb-10 text-left"><b>Anamnesa</b></label>
    <textarea id="anamnesa" class="form-control" rows="3"><?= isset($form->anamnesa)?$form->anamnesa:'' ?></textarea>
  </div>
  <div class="col-md-6">
    <label class="control-label mb-10 text-left"><b>Pemeriksaan fisik & uji fungsi</b></label>
    <textarea id="pf_uf" class="form-control" rows="3"><?= isset($form->pemeriksaan_fisik_uji_fungsi)?$form->pemeriksaan_fisik_uji_fungsi:'' ?></textarea>
  </div>
</div>

<div class="form-group row">
  <div class="col-md-6">
    <label class="control-label mb-10 text-left"><b>Pemeriksaan penunjang</b></label>
    <textarea id="penunjang" class="form-control" rows="3"><?= isset($form->pemeriksaan_penunjang)?$form->pemeriksaan_penunjang:'' ?></textarea>
  </div>
  <div class="col-md-6">
    <label class="control-label mb-10 text-left"><b>Anjuran</b></label>
    <textarea id="anjuran" class="form-control" rows="3"><?= isset($form->anjuran)?$form->anjuran:'' ?></textarea>
  </div>
</div>

<div class="form-group row">
  <div class="col-md-6">
    <label class="control-label mb-10 text-left"><b>Evaluasi</b></label>
    <textarea id="evaluasi" class="form-control" rows="3"><?= isset($form->evaluasi)?$form->evaluasi:'' ?></textarea>
  </div>
  <div class="col-md-6">
    <label class="control-label mb-10 text-left">Tata Laksana KFR (ICD-9-CM)</label>
    <input id="icd9_kfr" type="text" class="form-control" value="<?= isset($form->laksana_kfr_icd9cm)?$form->laksana_kfr_icd9cm:'' ?>">
  </div>
</div>

<div class="form-group row">
  <div class="col-md-6">
    <?php $sPAK = isset($form->suspek_pak)?(int)$form->suspek_pak:0; ?>
    <label class="control-label mb-10 text-left">Suspek penyakit akibat kerja (PAK)</label>
    <div class="radio-button">
      <input id="pak_ya" type="radio" name="suspek_pak" value="YA" <?= $sPAK===1?'checked':''; ?>>
      <label for="pak_ya">Ya</label>
    </div>
    <div class="radio-button">
      <input id="pak_tidak" type="radio" name="suspek_pak" value="TIDAK" <?= $sPAK!==1?'checked':''; ?>>
      <label for="pak_tidak">Tidak</label>
    </div>
    <input id="suspek_pak_ket" type="text" class="form-control" placeholder="Jelaskan jika Ya"
           style="margin-top:8px; <?= $sPAK===1?'':'display:none;' ?>"
           value="<?= isset($form->suspek_pak_ket)?$form->suspek_pak_ket:'' ?>">
  </div>
</div>


            <!-- MASTER DIAGNOSA -->
            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>Diagnosa</strong></h5>
                <div class="table-responsive">
                  <table class="table table-hover display" id="tblMasterDiagnosa" style="width:100%">
                    <thead>
                      <tr class="bg-success">
                        <th>KODE</th>
                        <th>NAMA DIAGNOSA</th>
                        <th>TAMBAH (Medis)</th>
                        <th>TAMBAH (Fungsi)</th>
                      </tr>
                    </thead>
                    <tbody style="color:black;"></tbody>
                    <tfoot>
                      <tr class="bg-success">
                        <th>KODE</th>
                        <th>NAMA DIAGNOSA</th>
                        <th>TAMBAH (Medis)</th>
                        <th>TAMBAH (Fungsi)</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

            <!-- DIAGNOSA MEDIS -->
            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 20px;"><strong>Diagnosa Medis</strong></h5>
                <div class="table-responsive">
                  <table class="table table-hover display" id="tblDiagnosaMedis" style="width:100%">
                    <thead>
                      <tr class="bg-success">
                        <th>ID DIAGNOSA</th>
                        <th>KODE</th>
                        <th>NAMA</th>
                        <th>TANGGAL</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody style="color:black;"></tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- DIAGNOSA FUNGSI -->
            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 20px;"><strong>Diagnosa Fungsi</strong></h5>
                <div class="table-responsive">
                  <table class="table table-hover display" id="tblDiagnosaFungsi" style="width:100%">
                    <thead>
                      <tr class="bg-success">
                        <th>ID DIAGNOSA</th>
                        <th>KODE</th>
                        <th>NAMA</th>
                        <th>TANGGAL</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody style="color:black;"></tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- TOMBOL -->
            <div class="form-group text-center" style="margin-top: 25px;">
              <div class="col-md-12"><label>&nbsp;</label></div>
              <div class="col-md-6">
                <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right:20px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                <button type="button" class="btn btn-success mb-4" onclick="simpanForm()">Simpan</button>
              </div>
            </div>

          </div><!-- /.form-wrap -->
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .dataTables_wrapper .dataTables_filter input { width: 220px; }
</style>

<script type="text/javascript">
  // flag untuk kontrol tombol "Tambah (Medis)" di master
  var canAddMedis = true; // akan di-evaluate setelah table Diagnosa Medis load

  function currentPel(){ return $('#inPelRaw').val() || $('#inPelB64').val(); }
  function currentHis(){ return $('#inHisRaw').val() || $('#inHisB64').val(); }

  $(function(){
    // Toggle Suspek PAK textbox
    $('input[name="suspek_pak"]').on('change', function(){
      if ($(this).val()==='YA') { $('#suspek_pak_ket').show(); } else { $('#suspek_pak_ket').hide().val(''); }
    });

    // MASTER DIAGNOSA
    initMasterDiagnosa();

    // LOAD tabel diagnosa kunjungan
    reloadDiagnosaTables();
  });

  function initMasterDiagnosa(){
    if ($.fn.DataTable.isDataTable('#tblMasterDiagnosa')) $('#tblMasterDiagnosa').DataTable().destroy();
    $('#tblMasterDiagnosa').DataTable({
      ajax: { url: '<?= base_url('Form_fisikrehab/tampil_list_diagnosa_master') ?>', type: 'POST' },
      pageLength: 10,
      columns: [
        { data: 'id_diagnosa' },
        { data: 'nama_diagnosa' },
        { data: null, orderable:false, render: function(r){
            // tampilkan tombol "Tambah (Medis)" hanya jika belum ada diagnosa medis
            if (!canAddMedis) return '<span class="text-muted">Sudah ada</span>';
            return '<button class="btn btn-xs btn-primary btn-add-medis"'
                 + ' data-kode="'+ (r.id_diagnosa||'') +'"'
                 + ' data-nama="'+ (r.nama_diagnosa||'') +'">Tambah</button>';
        }},
        { data: null, orderable:false, render: function(r){
            return '<button class="btn btn-xs btn-info btn-add-fungsi"'
                 + ' data-kode="'+ (r.id_diagnosa||'') +'"'
                 + ' data-nama="'+ (r.nama_diagnosa||'') +'">Tambah</button>';
        }}
      ],
      language: { search: "Cari Diagnosa:" }
    });

    // Delegated handlers
    $(document).off('click', '.btn-add-medis').on('click', '.btn-add-medis', function(){
      tambahMedis($(this).data('kode'), $(this).data('nama'));
    });
    $(document).off('click', '.btn-add-fungsi').on('click', '.btn-add-fungsi', function(){
      tambahFungsi($(this).data('kode'), $(this).data('nama'));
    });
  }

  function reloadDiagnosaTables(){
    // DIAGNOSA MEDIS
    if ($.fn.DataTable.isDataTable('#tblDiagnosaMedis')) { $('#tblDiagnosaMedis').DataTable().destroy(); }
    var dtMedis = $('#tblDiagnosaMedis').DataTable({
      ajax: {
        url: '<?= base_url('Form_fisikrehab/tampil_list_diagnosa_medis') ?>',
        type: 'POST',
        data: { id_pelayanan: currentPel(), id_history: currentHis() }
      },
      columns: [
        { data: 'no_diagnosa' },
        { data: 'kode' },
        { data: 'nama_diagnosa' },
        { data: 'tanggal' },
        { data: null, orderable:false, render: function(r){
            return '<button class="btn btn-xs btn-danger" onclick="hapusMedis('+ r.no_diagnosa +')">Hapus</button>';
        }}
      ]
    });

    // evaluasi jumlah baris untuk kontrol tombol "Tambah (Medis)"
    dtMedis.on('xhr.dt', function(e, settings, json, xhr){
      try {
        var rows = (json && json.data) ? json.data.length : 0;
        canAddMedis = (rows === 0);
      } catch(err){ canAddMedis = true; }
      // refresh tampilan master agar tombol menyesuaikan
      $('#tblMasterDiagnosa').DataTable().ajax.reload(null, false);
    });

    // DIAGNOSA FUNGSI
    if ($.fn.DataTable.isDataTable('#tblDiagnosaFungsi')) { $('#tblDiagnosaFungsi').DataTable().destroy(); }
    $('#tblDiagnosaFungsi').DataTable({
      ajax: {
        url: '<?= base_url('Form_fisikrehab/tampil_list_diagnosa_fungsi') ?>',
        type: 'POST',
        data: { id_pelayanan: currentPel(), id_history: currentHis() }
      },
      columns: [
        { data: 'no_diagnosa' },
        { data: 'kode' },
        { data: 'nama_diagnosa' },
        { data: 'tanggal' },
        { data: null, orderable:false, render: function(r){
            return '<button class="btn btn-xs btn-danger" onclick="hapusFungsi('+ r.no_diagnosa +')">Hapus</button>';
        }}
      ]
    });
  }

  // === ACTIONS ===
  function tambahMedis(kode, nama){
    $.post('<?= base_url('Form_fisikrehab/tambah_diagnosa_medis') ?>', {
      kode: kode, nama: nama,
      no_rm: $('#inNoRM').val(),
      id_pelayanan: currentPel(),
      id_history: currentHis()
    }, function(res){
      if (res.status==='success'){
        // sukses: kunci tombol tambah medis
        canAddMedis = false;
        $('#tblDiagnosaMedis').DataTable().ajax.reload(null,false);
        $('#tblMasterDiagnosa').DataTable().ajax.reload(null,false);
        swal({ title: "Good job!", type: "success", text: "Diagnosa medis berhasil ditambahkan", confirmButtonColor: "#3cb878" });
      } else {
        swal({ title: "Gagal!", type: "warning", text: "Gagal menambah diagnosa medis", confirmButtonColor: "#3cb878" });
      }
    }, 'json').fail(function(){
      swal({ title: "Gagal!", type: "warning", text: "Terjadi kesalahan koneksi", confirmButtonColor: "#3cb878" });
    });
  }

  function tambahFungsi(kode, nama){
    $.post('<?= base_url('Form_fisikrehab/tambah_diagnosa_fungsi') ?>', {
      kode: kode, nama: nama,
      no_rm: $('#inNoRM').val(),
      id_pelayanan: currentPel(),
      id_history: currentHis()
    }, function(res){
      if (res.status==='success'){
        $('#tblDiagnosaFungsi').DataTable().ajax.reload(null,false);
        swal({ title: "Good job!", type: "success", text: "Diagnosa fungsi berhasil ditambahkan", confirmButtonColor: "#3cb878" });
      } else {
        swal({ title: "Gagal!", type: "warning", text: "Gagal menambah diagnosa fungsi", confirmButtonColor: "#3cb878" });
      }
    }, 'json').fail(function(){
      swal({ title: "Gagal!", type: "warning", text: "Terjadi kesalahan koneksi", confirmButtonColor: "#3cb878" });
    });
  }

  function hapusMedis(no_diagnosa){
    swal({
      title: "Hapus?",
      text: "Yakin hapus diagnosa medis ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3cb878",
      confirmButtonText: "Yakin",
      cancelButtonText: "Batal",
      closeOnConfirm: true
    }, function(){
      $.post('<?= base_url('Form_fisikrehab/hapus_diagnosa_medis') ?>', { no_diagnosa: no_diagnosa }, function(res){
        if (res.status==='success'){
          $('#tblDiagnosaMedis').DataTable().ajax.reload(null,false);
          // evaluasi lagi (kalau sudah kosong, tombol tambah medis muncul)
          setTimeout(function(){ $('#tblDiagnosaMedis').DataTable().ajax.reload(); }, 100);
          swal({ title: "Berhasil", type: "success", text: "Data berhasil dihapus", buttons: false, timer: 800 });
        } else {
          swal({ title: "Gagal!", type: "warning", text: "Gagal menghapus data", confirmButtonColor: "#3cb878" });
        }
      }, 'json').fail(function(){
        swal({ title: "Gagal!", type: "warning", text: "Terjadi kesalahan koneksi", confirmButtonColor: "#3cb878" });
      });
    });
  }

  function hapusFungsi(no_diagnosa){
    swal({
      title: "Hapus?",
      text: "Yakin hapus diagnosa fungsi ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3cb878",
      confirmButtonText: "Yakin",
      cancelButtonText: "Batal",
      closeOnConfirm: true
    }, function(){
      $.post('<?= base_url('Form_fisikrehab/hapus_diagnosa_fungsi') ?>', { no_diagnosa: no_diagnosa }, function(res){
        if (res.status==='success'){
          $('#tblDiagnosaFungsi').DataTable().ajax.reload(null,false);
          swal({ title: "Berhasil", type: "success", text: "Data berhasil dihapus", buttons: false, timer: 800 });
        } else {
          swal({ title: "Gagal!", type: "warning", text: "Gagal menghapus data", confirmButtonColor: "#3cb878" });
        }
      }, 'json').fail(function(){
        swal({ title: "Gagal!", type: "warning", text: "Terjadi kesalahan koneksi", confirmButtonColor: "#3cb878" });
      });
    });
  }

  function simpanForm(){
    $.post('<?= base_url('Form_fisikrehab/save') ?>', {
      no_rm: $('#inNoRM').val(),
      id_pelayanan: currentPel(),
      id_history: currentHis(),
      hubungan: $('#hubungan').val(),
      anamnesa: $('#anamnesa').val(),
      pf_uf: $('#pf_uf').val(),
      penunjang: $('#penunjang').val(),
   
      anjuran: $('#anjuran').val(),
      evaluasi: $('#evaluasi').val(),
      icd9_kfr: $('#icd9_kfr').val(),
      suspek_pak: $('input[name="suspek_pak"]:checked').val(),
      suspek_pak_ket: $('#suspek_pak_ket').val()
    }, function(res){
      if (res.status==='success'){
        swal({ title: "Good job!", type: "success", text: "Data berhasil disimpan", confirmButtonColor: "#3cb878" });
      } else {
        swal({ title: "Gagal!", type: "warning", text: (res.msg||'Gagal menyimpan data'), confirmButtonColor: "#3cb878" });
      }
    }, 'json').fail(function(){
      swal({ title: "Gagal!", type: "warning", text: "Terjadi kesalahan koneksi", confirmButtonColor: "#3cb878" });
    });
  }
</script>