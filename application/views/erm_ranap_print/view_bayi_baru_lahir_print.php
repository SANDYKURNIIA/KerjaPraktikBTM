<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }

        .table2 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }

        .table3 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }

        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .box {
            border-bottom: 1px solid;
            width: 1px;
            height: 1px;

        }


        .block,

        li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }

        hr {
            border: 1px solid black;
        }

        .block {
            display: block;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }


        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }

        .inline {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="content">

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/images/logo.png" style="width: 200px;">
                <td width="800">
                    <strong>
                        <center>ASSESMEN BAYI BARU LAHIR</center>
                    </strong>
                </td>
                </td>
            </tr>
        </table>


        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>No RM : <?= $data->no_rm ?></p>
                    <p>Nama Pasien : <?= $data->nama ?></p>
                    <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data->tgl_lahir)); ?></p>
                    <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>Tanggal Masuk Dirawat : <?= $data->tgl_masuk ?></p>
                    <p>Tanggal Pengkajian : <?= $ass_bayi_baru_lahir->tgl_pengkajian ?></p>
                    <p>Dokter Yang Merawat : <?= $data->nama_dokter ?></p>
                    <p>Cara Masuk : <?= $ass_bayi_baru_lahir->cara_masuk ?></p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong> STATUS GRAVIDA IBU</strong></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>G : <?= $ass_bayi_baru_lahir->g_ibu ?></p>
                    <p>P : <?= $ass_bayi_baru_lahir->p_ibu ?></p>
                    <p>A : <?= $ass_bayi_baru_lahir->a_ibu ?></p>
                    <p>Usia Kehamilan : <?= $ass_bayi_baru_lahir->usia_kehamilan_ibu ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>Presentasi Bayi : <?= $ass_bayi_baru_lahir->pres_bayi_ibu ?></p>
                    <p>Pemeriksaan Antenatal : <?= $ass_bayi_baru_lahir->pem_antenatal_ibu ?></p>
                    <p>Komplikasi Antenatal : <?= $ass_bayi_baru_lahir->komp_antenatal_ibu ?></p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong>RIWAYAT PERSALINAN</strong></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>BB/TB ibu : <?= $ass_bayi_baru_lahir->berat_ibu ?> Kg / <?= $ass_bayi_baru_lahir->tinggi_ibu ?> Cm</p>
                    <p>Keadaan Umum Ibu : <?= $ass_bayi_baru_lahir->kead_um_ibu ?></p>
                    <p>Jenis Persalinan : <?= $ass_bayi_baru_lahir->jenis_persalinan ?></p>
                    <p>Persalinan Di : <?= $ass_bayi_baru_lahir->persalinan_di ?></p>
                    <p>Proses Persalinan : <?= $ass_bayi_baru_lahir->pros_persalinan_vital ?></p>
                    <p>Fetus : <?= $ass_bayi_baru_lahir->fetus_vital ?></p>
                    <p>Kondisi Ketuban : <?= $ass_bayi_baru_lahir->kond_ketu_vital ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p><strong>Indikasi</strong></p>
                    <p>Komplikasi Persalinan : <?= $ass_bayi_baru_lahir->komp_persalinan ?></p>
                    <p>Lamanya Ketuban Pecah : <?= $ass_bayi_baru_lahir->lam_ketu_pec ?></p>
                    <p><strong>Tanda-Tanda Vital</strong></p>
                    <p>TD : <?= $ass_bayi_baru_lahir->td_vital ?></p>
                    <p>N : <?= $ass_bayi_baru_lahir->n_vital ?></p>
                    <p>RR : <?= $ass_bayi_baru_lahir->rr_vital ?></p>
                    <p>S : <?= $ass_bayi_baru_lahir->s_vital ?></p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong>RIWAYAT PENYAKIT IBU TERDAHULU</strong></center>
                </td>
            </tr>
            <td>
                <p>Kebiasaan Ibu : <?= $ass_bayi_baru_lahir->keb_ibu_terdahulu ?></p>
            </td>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong>KEADAAN BAYI SAAT LAHIR</strong></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>Lahir Tanggal : <?= $ass_bayi_baru_lahir->lahir_bayi ?></p>
                    <p>Jam : <?= $ass_bayi_baru_lahir->jam_lahir_bayi ?></p>
                    <p>Jenis Kelamin : <?= $ass_bayi_baru_lahir->jenkel_lahir_bayi ?></p>
                    <p>Kelahiran : <?= $ass_bayi_baru_lahir->kelahiran_bayi ?></p>
                    <p>Nilai APGAR : <?= $ass_bayi_baru_lahir->nilai_APGAR_bayi ?> Menit</p>
                    <p>Denyut Jantung : <?= $ass_bayi_baru_lahir->deny_jantung_bayi ?> Menit</p>
                    <p>Usaha Nafas : <?= $ass_bayi_baru_lahir->usaha_nafas_bayi ?> Menit</p>
                    <p>Tonus Otot : <?= $ass_bayi_baru_lahir->tonus_otot_bayi ?>Menit</p>
                    <p>Reflek : <?= $ass_bayi_baru_lahir->reflek_bayi ?> Menit</p>
                    <p>Warna Kulit : <?= $ass_bayi_baru_lahir->warna_kulit_bayi ?> Menit</p>

                </td>

                <td width="390" class=gariskanan>
                    <p>Total : <?= $ass_bayi_baru_lahir->total ?> Menit</p>
                    <p>Caput Succedaneum : <?= $ass_bayi_baru_lahir->cap_succedaneum ?></p>
                    <p>Cepal Haematoma : <?= $ass_bayi_baru_lahir->cap_haematoma ?></p>
                    <p><strong>Resusitasi</strong></p>
                    <p>Rangsangan : <?= $ass_bayi_baru_lahir->rangsangan ?></p>
                    <p>Penghisapan Lendir : <?= $ass_bayi_baru_lahir->peng_lendir ?></p>
                    <p>Ambu Bag : <?= $ass_bayi_baru_lahir->ambu_bag ?> liter / menit</p>
                    <p>Massase Jantung : <?= $ass_bayi_baru_lahir->mass_jantung ?> liter / menit</p>
                    <p>Intubasi Endotrakheal : <?= $ass_bayi_baru_lahir->intu_endo ?> liter / menit</p>
                    <p>O2 : <?= $ass_bayi_baru_lahir->o2 ?> liter / menit</p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong>PEMERIKSAAN FISIK</strong></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p>Umur : <?= $ass_bayi_baru_lahir->umur_pf ?></p>
                    <p>Hari : <?= $ass_bayi_baru_lahir->hari_pf ?></p>
                    <p>Jam : <?= $ass_bayi_baru_lahir->jam_pf ?></p>
                    <p>Suhu : <?= $ass_bayi_baru_lahir->suhu_pf ?>°c</p>
                    <p>Berat Badan : <?= $ass_bayi_baru_lahir->berat_pf ?>gram</p>
                    <p>Panjang Badan : <?= $ass_bayi_baru_lahir->panjang_pf ?>cm</p>
                    <p>Lingkar Kepala : <?= $ass_bayi_baru_lahir->lingkar_pf ?>cm</p>
                    <p>Kepala : <?= $ass_bayi_baru_lahir->kepala_pf ?></p>
                    <p>Ubun-Ubun : <?= $ass_bayi_baru_lahir->ubun_pf ?></p>
                    <p>Sutura : <?= $ass_bayi_baru_lahir->sutura_pf ?></p>
                    <p>Mata : <?= $ass_bayi_baru_lahir->mata_pf ?></p>
                    <p>Telinga : <?= $ass_bayi_baru_lahir->telinga_pf ?></p>
                    <p>Mulut : <?= $ass_bayi_baru_lahir->mulut_pf ?></p>
                    <p>Hidung : <?= $ass_bayi_baru_lahir->hidung_pf ?></p>
                    <p>Leher : <?= $ass_bayi_baru_lahir->leher_pf ?></p>
                    <p>Tubuh : <?= $ass_bayi_baru_lahir->tubuh_pf ?></p>
                    <p>Pengerakan : <?= $ass_bayi_baru_lahir->pengerakan_pf ?></p>
                    <p>Dada : <?= $ass_bayi_baru_lahir->dada_pf ?></p>
                    <p><strong> Jantung dan Paru </strong></p>
                    <p>Bunyi Nafas : <?= $ass_bayi_baru_lahir->bunyi_nafas_pf ?></p>
                    <p>Pernapasan : <?= $ass_bayi_baru_lahir->pernapasan_pf ?> /menit</p>
                    <p>Denyut Jantung : <?= $ass_bayi_baru_lahir->denyut_jantung_pf ?> /menit</p>
                    <p>Perut : <?= $ass_bayi_baru_lahir->perut_pf ?></p>
                    <p>Bising Usus : <?= $ass_bayi_baru_lahir->bising_usus_pf ?></p>
                    <p>Mekonium : <?= $ass_bayi_baru_lahir->mekonium_pf ?></p>
                    <p>Punggung : <?= $ass_bayi_baru_lahir->punggung_pf ?></p>
                    <p>Keadaan Punggung : <?= $ass_bayi_baru_lahir->kead_punggung_pf ?></p>
                    <p><strong>Genetalia</strong></p>
                    <p>Laki-laki : <?= $ass_bayi_baru_lahir->laki_gene_pf ?></p>


                </td>

                <td width="390" class=gariskanan>
                    <p>Testis Descensus Testikulorum : <?= $ass_bayi_baru_lahir->testis_gene_pf ?></p>
                    <p>Perempuan : <?= $ass_bayi_baru_lahir->perem_gene_pf ?></p>
                    <p>Anus : <?= $ass_bayi_baru_lahir->anus_gene_pf ?></p>
                    <p><strong>Ekstremitas</strong></p>
                    <p>Jari Tangan : <?= $ass_bayi_baru_lahir->jari_tangan_eks_pf ?></p>
                    <p>Jari Kaki : <?= $ass_bayi_baru_lahir->jari_kaki_eks_pf ?></p>
                    <p>Pengerakan : <?= $ass_bayi_baru_lahir->pergerakan_eks_pf ?></p>
                    <p><strong>Status Neurologi</strong></p>
                    <p>Tendon : <?= $ass_bayi_baru_lahir->tendon_sn_pf ?></p>
                    <p>Moro : <?= $ass_bayi_baru_lahir->moro_sn_pf ?></p>
                    <p>Rooting : <?= $ass_bayi_baru_lahir->rooting_sn_pf ?></p>
                    <p>Babinski : <?= $ass_bayi_baru_lahir->babinski_sn_pf ?></p>
                    <p>Menggenggam : <?= $ass_bayi_baru_lahir->menggenggam_sn_pf ?></p>
                    <p>Menangis : <?= $ass_bayi_baru_lahir->menangis_sn_pf ?></p>
                    <p>Berjalan : <?= $ass_bayi_baru_lahir->berjalan_sn_pf ?></p>
                    <p>Tonic / neck : <?= $ass_bayi_baru_lahir->tonic_sn_pf ?></p>
                    <p>Nutrisi : <?= $ass_bayi_baru_lahir->nutrisi_sn_pf ?></p>
                    <p><strong>Eliminasi</strong></p>
                    <p>BAB Pertama</p>
                    <p>Tanggal : <?= $ass_bayi_baru_lahir->tgl_bab_eliminasi ?></p>
                    <p>Jam : <?= $ass_bayi_baru_lahir->jam_bab_eliminasi ?></p>
                    <p>BAB Kedua</p>
                    <p>Tanggal : <?= $ass_bayi_baru_lahir->tgl_bab2_eliminasi ?></p>
                    <p>Jam : <?= $ass_bayi_baru_lahir->jam_bab_eliminasi ?></p>
                    <p>Meconium : <?= $ass_bayi_baru_lahir->meconium_eliminasi ?></p>
                    <p>Lingkar Kepala : <?= $ass_bayi_baru_lahir->lingkar_eliminasi ?> Cm</p>
                    <p>Dada : <?= $ass_bayi_baru_lahir->dada_eliminasi ?> Cm</p>
                    <p>Perut : <?= $ass_bayi_baru_lahir->perut_eliminasi ?> Cm</p>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong>RIWAYAT IMUNISASI</strong></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <p><strong>Jenis imunisasi</strong></p>
                    <p>Dasar : <?= $ass_bayi_baru_lahir->dasar_imunisasi ?></p>
                    <p>Hepatitis : <?= $ass_bayi_baru_lahir->hepatitis_imunisasi ?></p>
                </td>

                <td width="390" class=gariskanan>
                    <p>DPT : <?= $ass_bayi_baru_lahir->dpt_imunisasi ?></p>
                    <p>Polio : <?= $ass_bayi_baru_lahir->polio_imunisasi ?></p>
                    <p>Campak : <?= $ass_bayi_baru_lahir->campak_imunisasi ?></p>
                </td>
            </tr>
        </table>



        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width="390" class=gariskanan>
                    <center><strong>ASESMEN NYERI</strong></center>
                </td>
            </tr>
        </table>

        <table width=100% class="table2" cellspacing=0>
            <tr>
                <td width=25%><strong>Jenis imunisasi</strong></td>
            </tr>
            <tr>
                <td width=20%>Wajah</td>
                <td width=1%>:</td>
                <td><?= $ass_bayi_baru_lahir->wajah ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Ekstremitas</td>
                <td width=1%>:</td>
                <td><?= $ass_bayi_baru_lahir->ekstremitas ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Gerakan</td>
                <td width=1%>:</td>
                <td><?= $ass_bayi_baru_lahir->gerakan ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Menangis</td>
                <td width=1%>:</td>
                <td><?= $ass_bayi_baru_lahir->menangis ?></td>
                </td>
            </tr>

            <tr>
                <td width=20%>Kemampuan Ditenangkan</td>
                <td width=1%>:</td>
                <td><?= $ass_bayi_baru_lahir->kemampuan_ditenangkan ?></td>
                </td>
            </tr>
            <tr>
                <td width=20%>Total Skor</td>
                <td width=1%>:</td>
                <td><?= $ass_bayi_baru_lahir->skor_akhir ?></td>
                </td>
            </tr>
        </table>

</html>
</table>









<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        riw_kel = $('#inRka').val();
        pem_fisik = $('#inPF').val();
        has_pem_pen = $('#inHPP').val();
        diag_seku = $('#inDS').val();
        por_terapi = $('#inPTTYTDK').val();
        ter_obat = $('#inTOYDTOSPP').val();
        kead_pasien = $('#inKKPSP').val();
        edu_diberi = $('#inEYSD').val();
        tanggal = $('#inTgl').val();
        pukul = $('#inPkl').val();

        $.ajax({
            url: "<?php echo base_url() ?>Erm_resume_pasien_pulang/store",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                no_rm: no_rm,
                riw_kel: riw_kel,
                pem_fisik: pem_fisik,
                has_pem_pen: has_pem_pen,
                diag_seku: diag_seku,
                por_terapi: por_terapi,
                ter_obat: ter_obat,
                kead_pasien: kead_pasien,
                edu_diberi: edu_diberi,
                tanggal: tanggal,
                pukul: pukul,
            },
            success: function(data) {
                if (data.status == "success") {
                    // alert('success');
                    window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" +
                        '<?= urlencode(base64_encode($id_pelayanan)) ?>' +
                        '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status,
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        })
    }
</script>
</body>

</html>