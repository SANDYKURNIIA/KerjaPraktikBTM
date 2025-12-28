
<?php /* View: Form Edukasi UGD */ ?>

<style>
  html, body { color:#000; }
  .panel-title, .txt-dark, .control-label, .form-check-label, 
  .btn-text, strong, label { color:#000 !important; }
  .subtle { color:#000 !important; }

  .panel.card-view { border-radius:12px }
  .section { border:1px solid #e5e7eb; border-radius:10px; padding:14px; margin:14px 0; background:#fff }

  /* 🔹 Readonly tetap abu */
  .readonly {
    background:#f3f4f6 !important;
    color:#000 !important;
    border:1px solid #ccc !important;
  }

  /* 🔹 Default input style */
  .form-control {
    border: 1px solid #ccc;
    transition: all 0.3s ease;
    border-radius: 6px;
    color:#000;
  }

  /* 🔹 Semua input aktif (kecuali .readonly) hijau */
  .form-control:not(.readonly),
  select.form-control:not(.readonly),
  textarea.form-control:not(.readonly) {
    border: 1px solid #a5d6a7 !important;
    box-shadow: none !important;
    color:#000;
  }
  .form-control:not(.readonly):focus,
  select.form-control:not(.readonly):focus,
  textarea.form-control:not(.readonly):focus {
    border-color: #81c784 !important;
    box-shadow: 0 0 4px rgba(129,199,132,0.6) !important;
  }

  /* 🔹 Checkbox & Radio warna hijau */
  .form-check-input[type="checkbox"],
  .form-check-input[type="radio"] {
    accent-color: #16a34a;
    cursor: pointer;
  }

  /* 🔹 Tombol */
  .btn-ghost {
    background:#d1d5db !important;
    border:1px solid #9ca3af !important;
    color:#000 !important;
  }
  .btn-ghost:hover {
    background:#9ca3af !important;
    color:#000 !important;
  }

  .btn-success {
    background:#3cb878;
    border-color:#3cb878;
    color:#000;
  }
  .btn-success:hover {
    background:#34a46a;
    border-color:#34a46a;
    color:#000;
  }

  /* 🔹 Efek animasi ikon di tombol */
  .btn-anim {
    position: relative;
    overflow: hidden;
  }
  .btn-anim .icon {
    opacity: 0;
    margin-left: 0;
    transition: all 0.3s ease;
    display: inline-block;
  }
  .btn-anim:hover .icon {
    opacity: 1;
    margin-left: 6px;
  }
</style>


<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">FORM EDUKASI FARMASI</h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <form id="form-edukasi" autocomplete="off">
            <input type="hidden" name="no_rm" value="<?= $pasien['no_rm']; ?>">
<input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
<input type="hidden" name="id_history" value="<?= $id_history ?>">
            <!-- =================== HEADER =================== -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">NO RM:</label>
                  <input class="form-control readonly" type="text" value="<?= $pasien['no_rm']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">NAMA PASIEN:</label>
                  <input class="form-control readonly" type="text" value="<?= $pasien['nama']; ?>" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">TANGGAL LAHIR:</label>
                  <input class="form-control readonly" type="text" value="<?= $pasien['tgl_lahir']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">ALAMAT:</label>
                  <input class="form-control readonly" type="text" value="<?= $pasien['alamat']; ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row"><div class="col-md-12"><label class="control-label">TOPIK EDUKASI</label></div></div>

            <?php 
            $topik_list = [
              1 => 'Manfaat obat-obat yang diberikan',
              2 => 'Efek samping obat-obat yang diberikan',
              3 => 'Interaksi obat dan makan',
              4 => 'Program diet dan nutrisi'
            ];
            foreach ($topik_list as $i => $topik): 
            ?>
            <!-- =================== SECTION PER TOPIK =================== -->
            <div class="section card shadow-sm">
              <input type="hidden" name="topik<?= $i; ?>" value="<?= $topik; ?>">
              <div class="row">
                <!-- KIRI -->
                <div class="col-md-8">
                  <div class="form-group" style="margin-bottom:6px"><strong><?= $i.'. '.$topik; ?></strong></div>
                  <div class="subtle" style="margin-bottom:6px">Materi Edukasi Dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materi_penyampaian<?= $i; ?>[]" value="Leaflet" id="leaflet<?= $i; ?>">
                        <label class="form-check-label" for="leaflet<?= $i; ?>">Leaflet</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materi_penyampaian<?= $i; ?>[]" value="Booklet" id="booklet<?= $i; ?>">
                        <label class="form-check-label" for="booklet<?= $i; ?>">Booklet</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materi_penyampaian<?= $i; ?>[]" value="Lembar Balik" id="lembar<?= $i; ?>">
                        <label class="form-check-label" for="lembar<?= $i; ?>">Lembar Balik</label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materi_penyampaian<?= $i; ?>[]" value="Audiovisual" id="av<?= $i; ?>">
                        <label class="form-check-label" for="av<?= $i; ?>">Audiovisual</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materi_penyampaian<?= $i; ?>[]" value="Lisan" id="lisan<?= $i; ?>">
                        <label class="form-check-label" for="lisan<?= $i; ?>">Lisan</label>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label">Pasien/Keluarga</label>
                      <input type="text" name="pasien_keluarga<?= $i; ?>" class="form-control" placeholder="Pasien/Keluarga">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Edukator</label>
                      <input type="text" name="edukator<?= $i; ?>" class="form-control" placeholder="Edukator">
                    </div>
                  </div>
                </div>

                <!-- KANAN -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Durasi (menit)</label>
                    <input type="number" name="durasi<?= $i; ?>" class="form-control" placeholder="Durasi" min="1" step="1">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="evaluasi<?= $i; ?>" value="Sudah Mengerti" id="sm<?= $i; ?>">
                      <label class="form-check-label" for="sm<?= $i; ?>">Sudah Mengerti</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="evaluasi<?= $i; ?>" value="Re-edukasi" id="re<?= $i; ?>">
                      <label class="form-check-label" for="re<?= $i; ?>">Re-edukasi</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <!-- =================== ACTIONS =================== -->
            <div class="row" style="margin-top:12px">
              <div class="col-md-12 text-center">
          <a class="btn btn-ghost btn-sm btn-anim" href="javascript:history.back()" style="margin-right:12px">
    <span class="btn-text">KEMBALI</span>
    <span class="icon"><i class="fa fa-arrow-left"></i></span>
</a>

                <button type="submit" class="btn btn-success btn-sm btn-anim">
                  <span class="btn-text">SIMPAN</span><span class="icon"><i class="fa fa-save"></i></span>
                </button>
               <a class="btn btn-primary btn-sm btn-anim" target="_blank"
   href="<?= base_url('Apotik/print_edukasi_ugd/'.$pasien['no_rm'].'/'.$id_history); ?>">
    <span class="btn-text">PRINT</span>
    <span class="icon"><i class="fa fa-print"></i></span>
</a>

                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- 🔹 AJAX Script -->
<script>
$(document).ready(function(){

    let no_rm = $("input[name=no_rm]").val();
    let id_history = $("input[name=id_history]").val();

    // === LOAD DATA EDUKASI (PAKAI no_rm + id_history) ===
    $.getJSON(
        "<?= base_url('Apotik/get_riwayat_edukasi/'); ?>" + no_rm + "/" + id_history,
        function(e){
            if(e){
                for(let i=1;i<=4;i++){
                    if(e["materi_penyampaian"+i]){
                        let materiArr = e["materi_penyampaian"+i].split(", ");
                        materiArr.forEach(m => {
                            $("input[name='materi_penyampaian"+i+"[]'][value='"+m+"']")
                              .prop("checked", true);
                        });
                    }
                    $("input[name=durasi"+i+"]").val(e["durasi"+i]);
                    $("input[name=pasien_keluarga"+i+"]").val(e["pasien_keluarga"+i]);
                    $("input[name=edukator"+i+"]").val(e["edukator"+i]);
                    $("input[name='evaluasi"+i+"'][value='"+e["evaluasi"+i]+"']")
                      .prop("checked", true);
                }
            }
        }
    );

    // Validasi angka
    $("input[name^='durasi']").on("input", function(){
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Submit via AJAX
    $("#form-edukasi").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('Apotik/simpan_edukasi_ugd'); ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res){
                if(res.status === "success"){
                    swal({
                        title: "Good Job!",
                        text: res.message,
                        type: "success",
                        confirmButtonColor: "#3cb878"
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        text: res.message,
                        type: "warning",
                        confirmButtonColor: "#e74c3c"
                    });
                }
            },
            error: function(){
                swal({
                    title: "Error!",
                    text: "Gagal menyimpan data.",
                    type: "error",
                    confirmButtonColor: "#e74c3c"
                });
            }
        });
    });

});
</script>

