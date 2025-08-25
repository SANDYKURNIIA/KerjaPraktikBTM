<?php
define('lap', "01");
function jurnal($id_pelayanan, $id_staff)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('M_Kasir');
    $CI->load->model('M_Jurnal');
    $staff = $CI->session->userdata('data_auth');

    // Call a function of the model


    $db_akun = $CI->db->get_where('akun_tindakan', ['id_pelayanan' => $id_pelayanan])->result();


    $data_pelayanan = $CI->M_Kasir->list_pelayanan_pasien($id_pelayanan);
    $data_apotik = $CI->M_Kasir->list_apotik_pasien($id_pelayanan);
    $data_operasi = $CI->M_Kasir->list_operasi_pasien($id_pelayanan);
    $data_igd = $CI->M_Kasir->list_igd_pasien($id_pelayanan);
    $data_labor = $CI->M_Kasir->list_labor_pasien($id_pelayanan);
    $data_radio = $CI->M_Kasir->list_radio_pasien($id_pelayanan);
    $data_apelkes = $CI->M_Kasir->list_apelkes_pasien($id_pelayanan);
    $data_lain = $CI->M_Kasir->list_lain_pasien($id_pelayanan);
    $data_kemo = $CI->M_Kasir->list_kemo_pasien($id_pelayanan);

    $data_ok = $CI->M_Kasir->list_ok_pasien($id_pelayanan);
    $data_fisio = $CI->M_Kasir->list_fisio_pasien($id_pelayanan);
    $data_hd = $CI->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
    $data_kia = $CI->M_Kasir->list_kia_pasien($id_pelayanan);
    $data_transportasi = $CI->M_Kasir->total_transportasi($id_pelayanan);

    $db_cara_bayar = $CI->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1]);


    $CI->db->trans_start();


    if (count($db_akun) == 0) {


        //    //////////////////////////KONSUL////////////////////////////////////////////
        $vkunjungan = $CI->db->query("SELECT v.*,p.biaya_rs,p.biaya_admin FROM v_kunjungan v, pelayanan p where v.id_pelayanan = p.id_pelayanan
        and v.id_pelayanan = '$id_pelayanan' and (nama_ruangan != 'ODC' and jenis_pelayanan not like '%ODC%') having biaya_rs+biaya_admin !=0 order by v.tgl_masuk asc")->row();
        if (isset($vkunjungan->biaya_rs)) {
            if ($vkunjungan->nama_poli == 'IGD') {
                $lap = lap;
                $kode_coa = '701.14.910';
                $desk = 'RAWAT JALAN';
            } else if ($vkunjungan->jenis_pelayanan == 'RAWAT INAP') {
                $poli = $CI->db->get_where('ruangan', ['id_ruangan' => $vkunjungan->nama_poli])->row();
                $coa_poli =  $poli->kode_coa;
                $lap = lap;
                $kode_coa = '702.' . $coa_poli . '.911';
                $desk = 'RAWAT INAP';
            } else {
                $poli = $CI->db->get_where('list_poli', ['id_list_poli' => $vkunjungan->nama_poli])->row();
                $coa_poli = $poli->kode_coa;
                if ($vkunjungan->jenis_pelayanan == 'POLI PRIORITAS') {
                    $lap = lap . 'P';
                } else {
                    $lap = lap;
                }
                if ($vkunjungan->nama_poli == 'EM4488C53') {
                    $kode_coa = '703.11.910';
                    $desk = 'KEMOTERAPI';
                } else {
                    $kode_coa = '701.' . $coa_poli . '.910';
                    $desk = 'RAWAT JALAN';
                }
            }
            $rs_igd = [
                'id_staff' => $id_staff,
                'id_pelayanan' => $id_pelayanan,
                'id_poli' => $vkunjungan->nama_poli,
                'lap' => $lap,
                'cara_bayar' => $vkunjungan->id_cara_bayar,
                'total_akun' => $vkunjungan->biaya_rs + $vkunjungan->biaya_admin,
                'harga_jasa' => 0,
                'jenis_akun' => 'ADMINISTRASI MEDIS ' . $desk,
                'kode_akun' => $kode_coa,
                'dokter' => $vkunjungan->nama_dokter,
                'poli' => $vkunjungan->poli,
            ];

            $CI->M_Kasir->insert_tindakan($rs_igd, 'akun_tindakan');
        }
        $vkunjungan1 = $CI->db->query("SELECT v.id_history,v.id_kamar nama_poli, p.cara_bayar,p.biaya_rs,p.biaya_admin,l.kode_coa, d.nama nama_dokter, l.nama_panjang poli 
        FROM history_pelayanan_ranap v, pelayanan p, dokter d, list_poli l 
        where v.id_pelayanan = p.id_pelayanan and v.dpjp = d.id_dokter and d.dokter_spes = l.kdpoli_bpjs and v.jenis_pelayanan = 'ONE DAY CARE (ODC)'
        and v.id_pelayanan = '$id_pelayanan'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan where status =1)
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ugd where status =1)
        and v.status=1 and p.status =1
        order by v.tgl_masuk asc")->row();
        if (isset($vkunjungan1->biaya_rs)) {

            $rs_odc = [
                'id_staff' => $id_staff,
                'id_pelayanan' => $id_pelayanan,
                'id_poli' => $vkunjungan1->nama_poli,
                'lap' => lap,
                'cara_bayar' => $vkunjungan1->cara_bayar,
                'total_akun' => $vkunjungan1->biaya_rs + $vkunjungan1->biaya_admin,
                'harga_jasa' => 0,
                'jenis_akun' => 'ADMINISTRASI MEDIS ONE DAY CARE',
                'kode_akun' => '701.' . $vkunjungan1->kode_coa . '.240',
                'dokter' => $vkunjungan1->nama_dokter,
                'poli' => $vkunjungan1->poli,
            ];

            $CI->M_Kasir->insert_tindakan($rs_odc, 'akun_tindakan');
        }
        if (count($data_pelayanan) > 0) {
            // $kunjungan = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1, 'nama_poli !=' => '-'])->result();
            $kunjungan = $CI->db->query("SELECT h.*,d.nama nama_dokter, l.kode_coa, l.nama_panjang poli
            from history_pelayanan h, dokter d,list_poli l
            where h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli
            and h.id_pelayanan = '$id_pelayanan' and h.status =1 and nama_poli !='-'")->result();

            if (!empty($kunjungan)) {
                for ($i = 0; $i < count($kunjungan); $i++) {
                    $id_poli = $kunjungan[$i]->nama_poli;
                    // $poli = $CI->db->get_where('list_poli', ['id_list_poli' => $kunjungan[$i]->nama_poli])->row();
                    if ($kunjungan[$i]->jenis_pelayanan == 'POLI PRIORITAS') {
                        $lap = lap . 'P';
                    } else {
                        $lap = lap;
                    }
                    if ($kunjungan[$i]->nama_poli == 'EM4488C53') {
                        $rek = '703.11.110';
                        $jenis_akun = 'Konsul Rawat Jalan Kemoterapi';
                    } else {
                        $rek = '701' . '.' . $kunjungan[$i]->kode_coa . '.' . '110';
                        $jenis_akun = 'Konsul Rawat Jalan';
                    }
                    $konsul = [
                        'id_staff' => $id_staff,
                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $kunjungan[$i]->nama_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $kunjungan[$i]->biaya_jasa,
                        'harga_jasa' => $kunjungan[$i]->biaya_jasa,
                        'jenis_akun' => $jenis_akun,
                        'kode_akun' => $rek,
                        'dokter' => $kunjungan[$i]->nama_dokter,
                        'poli' => $kunjungan[$i]->poli,
                    ];

                    if ($id_poli != 'NM3075J78' && $id_poli != '6E975PL694' && $id_poli != '15487956' && $id_poli != '146582' && $id_poli != 'EM4488C53') {
                        $count_konsul = $CI->M_Jurnal->count_konsul($kunjungan[$i]->id_history, $id_pelayanan); //hitung konsul di tindakan poli
                    } else {
                        $count_konsul = 0;
                    }
                    // print_arr($count_konsul);
                    // && ($id_poli != 'NM3075J78' && $id_poli != '6E975PL694' && $id_poli != '15487956' && $id_poli != '146582')
                    if ($kunjungan[$i]->biaya_jasa != 0 && $count_konsul == 0) { //jika di pelayanan biaya jasa != 0 dan tidak ada konsul di tindakan poli
                        $CI->M_Kasir->insert_tindakan($konsul, 'akun_tindakan');
                    }
                }
            }


            $kunjunganIgd = $CI->db->query("SELECT sum(h.biaya_jasa) biaya_jasa , d.nama nama_dokter, h.jenis_pelayanan
            from history_pelayanan_ugd h , dokter d
            where h.dpjp = d.id_dokter and h.id_pelayanan ='$id_pelayanan' and h.status = 1 group by id_pelayanan")->result();

            if (!empty($kunjunganIgd)) {
                for ($i = 0; $i < count($kunjunganIgd); $i++) {

                    $konsul_igd = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => 'IGD',
                        'lap' => '01',
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $kunjunganIgd[$i]->biaya_jasa,
                        'harga_jasa' => $kunjunganIgd[$i]->biaya_jasa,
                        'jenis_akun' => 'Konsul Rawat Jalan',
                        'kode_akun' => '701.14.110',
                        'dokter' => $kunjunganIgd[$i]->nama_dokter,
                        'poli' =>  $kunjunganIgd[$i]->jenis_pelayanan,
                    ];


                    // $count_konsul = $CI->M_Jurnal->count_konsul($kunjungan[$i]->id_history); //hitung konsul di tindakan poli
                    // print_arr($count_konsul);

                    if ($kunjunganIgd[$i]->biaya_jasa != 0) { //jika di pelayanan biaya jasa != 0 dan tidak ada konsul di tindakan poli
                        $CI->M_Kasir->insert_tindakan($konsul_igd, 'akun_tindakan');
                    }
                }
            }
        }

        // $biaya_ranap = $CI->db->get_where('history_pelayanan_ranap', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->row();
        $biaya_ranap = $CI->db->query("SELECT h.*,d.nama nama_dokter, r.kode_coa
        from history_pelayanan_ranap h, dokter d,ruangan r
        where h.dpjp = d.id_dokter and h.id_kamar = r.id_ruangan
        and h.id_pelayanan = '$id_pelayanan' and h.status =1 ")->row();
        if (isset($biaya_ranap)) {
            // $poli = $CI->db->get_where('ruangan', ['id_ruangan' => $biaya_ranap->id_kamar])->row();

            $konsul = [
                'id_staff' => $id_staff,

                'id_pelayanan' => $id_pelayanan,
                'id_poli' => $biaya_ranap->id_kamar,
                'lap' => lap,
                'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                'total_akun' => $biaya_ranap->biaya_ruangan,
                'harga_jasa' => 0,
                'jenis_akun' => 'Administrasi Medis Rawat Inap',
                'kode_akun' => '702' . '.' . $biaya_ranap->kode_coa . '.' . '911',
                'dokter' => $biaya_ranap->nama_dokter,
                'poli' =>  'RAWAT INAP',
            ];
            $CI->M_Kasir->insert_tindakan($konsul, 'akun_tindakan');
        }


        ///////////////////////////////FARMASI/////////////////////////////////////////////////////////////////////////////////////

        if (count($data_apotik) > 0) {

            $db_farmasi = $CI->M_Jurnal->akun_apotik($id_pelayanan);

            for ($i = 0; $i < count($db_farmasi); $i++) {
                if ($db_farmasi[$i]->jenis_pelayanan == "RAWAT INAP" || $db_farmasi[$i]->jenis_pelayanan == "RANAP" || $db_farmasi[$i]->jenis_pelayanan == "ONE DAY CARE (ODC)") {
                    $db_kamar = $CI->M_Jurnal->kamar_apotik($db_farmasi[$i]->poli);
                    if ($db_farmasi[$i]->coa_pendapatan == "OBAT") {
                        $kode_coa_far = '421';
                        $jenis_akun = 'OBAT FARMASI RAWAT INAP';
                    } else {
                        $kode_coa_far = '431';
                        $jenis_akun = 'MEDICAL SUPPLIES RAWAT INAP';
                    }

                    $akun_apotik = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $db_kamar->tipe,
                        'lap' => '01',
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => round($db_farmasi[$i]->total),
                        'harga_jasa' => 0,
                        'jenis_akun' => $jenis_akun,
                        'kode_akun' => '702' . '.' . $db_kamar->kode_coa . '.' . $kode_coa_far
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_apotik, 'akun_tindakan');
                } else {
                    $jenis = explode('_', $db_farmasi[$i]->poli);
                    if ($db_farmasi[$i]->jenis_pelayanan == "POLI" || $db_farmasi[$i]->jenis_pelayanan == "POLI PRIORITAS" || $jenis[0] == 'his') {
                        $db_list_poli = $CI->M_Jurnal->poli_apotik($db_farmasi[$i]->poli);
                        $kode_coa_poli = $db_list_poli->row()->kode_coa;
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }

                        if ($db_farmasi[$i]->coa_pendapatan == "OBAT") {
                            $kode_coa_far = '420';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far = '430';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                        if ($id_list_poli == 'EM4488C53') {
                            $akun = '703.11.' . $kode_coa_far;
                            $desk_poli = 'KEMOTERAPI ';
                        } else {
                            $akun = '701' . '.' . $kode_coa_poli . '.' . $kode_coa_far;
                            $desk_poli = '';
                        }
                    } else if ($db_farmasi[$i]->jenis_pelayanan == "IGD" || $db_farmasi[$i]->jenis_pelayanan == "UGD") {
                        $kode_coa_poli = '14';
                        $id_list_poli = 'IGD';
                        if ($db_farmasi[$i]->coa_pendapatan == "OBAT") {
                            $kode_coa_far = '421';
                            $jenis_akun = 'OBAT FARMASI RAWAT JALAN';
                        } else {
                            $kode_coa_far = '431';
                            $jenis_akun = 'MEDICAL SUPPLIES RAWAT JALAN';
                        }
                        $lap = lap;
                        $akun = '701' . '.' . $kode_coa_poli . '.' . $kode_coa_far;
                        $desk_poli = '';
                    }

                    $akun_apotik = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => round($db_farmasi[$i]->total),
                        'jenis_akun' => $desk_poli . $jenis_akun,
                        'harga_jasa' => 0,
                        'kode_akun' => $akun
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_apotik, 'akun_tindakan');
                }
            }

            $non_ranap = $CI->db->query("SELECT * from history_pelayanan 
            where id_pelayanan ='$id_pelayanan' 
            and id_pelayanan not in(SELECT id_pelayanan from history_pelayanan_ranap where status =1)")->result();
            if (count($non_ranap) > 0) {
                foreach ($non_ranap as $non_ranap) {
                    $apotik1 = array_sum($CI->M_Jurnal->total_apotik1($non_ranap->id_history));
                    if ($non_ranap->jenis_pelayanan == 'POLI PRIORITAS') {
                        $lap = lap . 'P';
                    } else {
                        $lap = lap;
                    }
                    $akun_apotik1 = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $non_ranap->nama_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => round(($apotik1 * 0.11)),
                        'harga_jasa' => 0,
                        'jenis_akun' => 'PPN OBAT',
                        'kode_akun' => '409.01.000'
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_apotik1, 'akun_tindakan');
                }
            }
        }

        //////////////////////////////OBAT OPERASI ///////////////////////////////////////////////////////////////////////////////////

        if (count($data_operasi) > 0) {

            $db_operasi = $CI->M_Jurnal->ok_apotik($id_pelayanan);
            if (!empty($db_operasi)) {
                $kode_coa_far = '421';
                for ($j = 0; $j < count($db_operasi); $j++) {
                    $akun_apotik = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $db_operasi[$j]->tipe,
                        'lap' => lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => round($db_operasi[$j]->total),
                        'harga_jasa' => 0,
                        'jenis_akun' => 'OBAT FARMASI RAWAT INAP',
                        'kode_akun' =>  '702.' . $db_operasi[$j]->kode_coa . '.' . $kode_coa_far
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_apotik, 'akun_tindakan');
                }
            } else {
                $db_operasi_1 = $CI->M_Jurnal->obat_ok($id_pelayanan);
                $vkunjungan = $CI->db->query("SELECT v.* FROM v_kunjungan v where v.id_pelayanan = '$id_pelayanan'")->row();
                for ($j = 0; $j < count($db_operasi_1); $j++) {
                    if ($db_operasi_1[$j]->coa_pendapatan == "OBAT") {
                        $kode_coa_far = '421';
                        $jenis_akun = 'OBAT FARMASI KAMAR BEDAH';
                    } else {
                        $kode_coa_far = '431';
                        $jenis_akun = 'MEDICAL SUPPLIES KAMAR BEDAH';
                    }
                    $akun_apotik = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $vkunjungan->nama_poli,
                        'lap' => lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => round($db_operasi_1[$j]->total),
                        'harga_jasa' => 0,
                        'jenis_akun' => $jenis_akun,
                        'kode_akun' =>  '704.08.' . $kode_coa_far
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_apotik, 'akun_tindakan');
                }
            }
        }
        ///////////////////////////////LABORATORIUM///////////////////////////////////////////////////////////////////////////////

        if (count($data_labor) > 0) {

            $db_labor = $CI->M_Jurnal->akun_labor($id_pelayanan);

            for ($i = 0; $i < count($db_labor); $i++) {
                if ($db_labor[$i]->cara_masuk == "RAWAT INAP" || $db_labor[$i]->cara_masuk == "RANAP") {
                    $db_kamar = $CI->M_Jurnal->kamar_labor($db_labor[$i]->poli);
                    for ($j = 0; $j < count($db_kamar); $j++) {
                        $akun_labor = [
                            'id_staff' => $id_staff,

                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $db_kamar[$j]->tipe,
                            'lap' => lap,
                            'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                            'total_akun' => $db_kamar[$j]->total,
                            'harga_jasa' => 0,
                            'jenis_akun' => 'Laboratorium Klinik Rawat Inap',
                            'kode_akun' =>  '702.' . $db_kamar[$j]->kode_coa . '.' . $db_labor[$i]->kode_coa
                        ];
                        $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                    }
                } else {
                    $labor1 = array_sum($CI->M_Jurnal->total_labor1($db_labor[$i]->poli));
                    if ($db_labor[$i]->cara_masuk == "POLI") {
                        $db_list_poli = $CI->M_Jurnal->poli_apotik($db_labor[$i]->poli);
                        $kode_coa_poli = $db_list_poli->row()->kode_coa;
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        $dokter = $db_list_poli->row()->nama_dokter;

                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                        $kode_coa = '701';
                    } else if ($db_labor[$i]->cara_masuk == "IGD" || $db_labor[$i]->cara_masuk == "UGD") {

                        $kode_coa_poli = '14';
                        $id_list_poli = 'IGD';
                        $nama_poli = $db_labor[$i]->cara_masuk;
                        $dokter = NULL;
                        $lap = lap;
                        $kode_coa = '701';
                    } else if ($db_labor[$i]->cara_masuk == "LABOR") {
                        $db_list_poli = $CI->M_Jurnal->poli_apotik($db_labor[$i]->poli);
                        $kode_coa_poli = '02';
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        $dokter = $db_list_poli->row()->nama_dokter;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                        $kode_coa = '703';
                    }

                    $akun_labor = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $labor1,
                        'harga_jasa' => 0,
                        'jenis_akun' => $db_labor[$i]->kode_coa == 811 ? 'Laboratorium Klinik Rawat Inap' : 'Laboratorium Klinik Rawat Jalan',
                        'kode_akun' => $kode_coa . '.' . $kode_coa_poli . '.' . $db_labor[$i]->kode_coa,
                        'dokter' => $dokter,
                        'poli' =>  $nama_poli,
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                }
            }
        }


        ///////////////////////////////RADIOLOGI/////////////////////////////////////////////////////////////////////////////////////

        if (count($data_radio) > 0) {

            $db_radiologi = $CI->M_Jurnal->akun_radio($id_pelayanan);


            for ($i = 0; $i < count($db_radiologi); $i++) {
                if ($db_radiologi[$i]->jenis_pelayanan == "RAWAT INAP" || $db_radiologi[$i]->jenis_pelayanan == "RANAP") {
                    $db_kamar = $CI->M_Jurnal->kamar_radiologi($db_radiologi[$i]->poli);
                    for ($j = 0; $j < count($db_kamar); $j++) {
                        $akun_radiologi = [
                            'id_staff' => $id_staff,

                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $db_kamar[$j]->tipe,
                            'lap' => lap,
                            'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                            'total_akun' => $db_kamar[$j]->total,
                            'harga_jasa' => 0,
                            'jenis_akun' => $db_radiologi[$i]->kode_coa == 721 ? 'Radiodiagnostik Rawat Inap' : 'Radiodiagnostik Rawat Jalan',
                            'kode_akun' =>  '702.' . $db_kamar[$j]->kode_coa . '.' . $db_radiologi[$i]->kode_coa
                        ];
                        $CI->M_Kasir->insert_tindakan($akun_radiologi, 'akun_tindakan');
                    }
                } else {
                    $radio1 = array_sum($CI->M_Jurnal->total_radio1($db_radiologi[$i]->poli));
                    if ($db_radiologi[$i]->jenis_pelayanan == "POLI") {
                        $db_list_poli = $CI->M_Jurnal->poli_apotik($db_radiologi[$i]->poli);
                        $kode_coa_poli = $db_list_poli->row()->kode_coa;
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;

                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        $dokter = $db_list_poli->row()->nama_dokter;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                        $kode_coa = '701';
                    } else if ($db_radiologi[$i]->jenis_pelayanan == "IGD" || $db_radiologi[$i]->jenis_pelayanan == "UGD") {
                        $kode_coa_poli = '14';
                        $id_list_poli = 'IGD';
                        $nama_poli = $db_radiologi[$i]->jenis_pelayanan;
                        $dokter = NULL;
                        $lap = lap;
                        $kode_coa = '701';
                    } else if ($db_radiologi[$i]->jenis_pelayanan == "RADIOLOGI") {
                        $db_list_poli = $CI->M_Jurnal->poli_apotik($db_radiologi[$i]->poli);
                        $kode_coa_poli = '11';
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        $dokter = $db_list_poli->row()->nama_dokter;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                        $kode_coa = '703';
                    }

                    $akun_radiologi = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $radio1,
                        'harga_jasa' => 0,
                        'jenis_akun' => $db_radiologi[$i]->kode_coa == 721 ? 'Radiodiagnostik Rawat Inap' : 'Radiodiagnostik Rawat Jalan',
                        'kode_akun' => $kode_coa . '.' . $kode_coa_poli . '.' . $db_radiologi[$i]->kode_coa,
                        'dokter' => $dokter,
                        'poli' =>  $nama_poli,
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_radiologi, 'akun_tindakan');
                }
            }
        }

        // ///////////////////////////////FISIO///////////////////////////////////////////////////////////////////////////////

        if (count($data_fisio) > 0) {

            $db_fisio = $CI->M_Jurnal->akun_fisio($id_pelayanan);
            $lap = lap;
            for ($i = 0; $i < count($db_fisio); $i++) {
                if ($db_fisio[$i]->jenis_pelayanan == "RAWAT INAP" || $db_fisio[$i]->jenis_pelayanan == "RANAP") {
                    $db_kamar = $CI->M_Jurnal->kamar_fisio($db_fisio[$i]->poli);
                    for ($j = 0; $j < count($db_kamar); $j++) {
                        $akun_labor = [
                            'id_staff' => $id_staff,

                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $db_kamar[$j]->tipe,
                            'lap' => lap,
                            'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                            'total_akun' => $db_kamar[$j]->total,
                            'harga_jasa' => 0,
                            'jenis_akun' => 'Fisioterapi Rawat Inap',
                            'kode_akun' =>  '702.' . $db_kamar[$j]->kode_coa . '.' . $db_fisio[$i]->kode_coa,
                        ];
                        $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                    }
                } else {
                    $kunjungan = $CI->db->get_where('history_pelayanan', ['id_history' => $db_fisio[$i]->poli])->row();
                    $fisio1 = array_sum($CI->M_Jurnal->total_fisio1($db_fisio[$i]->poli));
                    $db_list_poli = $CI->M_Jurnal->poli_apotik($db_fisio[$i]->poli);

                    if ($kunjungan->nama_poli == "6E975PL694") {
                        $kode_coa = '703';
                        $kode_coa_poli = '08';
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        $dokter = $db_list_poli->row()->nama_dokter;
                        $lap = lap;
                    } else {
                        if ($db_fisio[$i]->jenis_pelayanan == "POLI") {
                            $kode_coa = '701';
                            $kode_coa_poli = $db_list_poli->row()->kode_coa;
                            $id_list_poli = $db_list_poli->row()->id_list_poli;
                            $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                            $nama_poli = $db_list_poli->row()->nama_panjang;
                            $dokter = $db_list_poli->row()->nama_dokter;
                            if ($kunjungan->jenis_pelayanan == 'POLI PRIORITAS') {
                                $lap = lap . 'P';
                            } else {
                                $lap = lap;
                            }
                        } else if ($db_fisio[$i]->jenis_pelayanan == "IGD" || $db_fisio[$i]->jenis_pelayanan == "UGD") {
                            $kode_coa = '701';

                            $kode_coa_poli = '14';
                            $id_list_poli = 'IGD';
                            $nama_poli = $db_radiologi[$i]->jenis_pelayanan;
                            $dokter = NULL;
                            $lap = lap;
                        } else {
                            $lap = lap;
                        }
                    }

                    $akun_labor = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $fisio1,
                        'harga_jasa' => 0,
                        'jenis_akun' => 'Fisioterapi Rawat Jalan',
                        'kode_akun' =>  $kode_coa . '.' . $kode_coa_poli . '.' . $db_fisio[$i]->kode_coa,
                        'dokter' => $dokter,
                        'poli' =>  $nama_poli,
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                }
            }
        }
        // ///////////////////////////////HEMODIALISA///////////////////////////////////////////////////////////////////////////////

        if (count($data_hd) > 0) {

            $db_hd = $CI->M_Jurnal->akun_hd($id_pelayanan);

            for ($i = 0; $i < count($db_hd); $i++) {
                if ($db_hd[$i]->jenis_pelayanan == "RAWAT INAP" || $db_hd[$i]->jenis_pelayanan == "RANAP") {
                    $db_kamar = $CI->M_Jurnal->kamar_hd($db_hd[$i]->poli);
                    for ($j = 0; $j < count($db_kamar); $j++) {
                        $akun_labor = [
                            'id_staff' => $id_staff,

                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $db_kamar[$j]->tipe,
                            'lap' => lap,
                            'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                            'total_akun' => $db_kamar[$j]->total,
                            'harga_jasa' => 0,
                            'jenis_akun' => 'Hemodialisa Rawat Inap',
                            'kode_akun' =>  '702.' . $db_kamar[$j]->kode_coa . '.' . $db_hd[$i]->kode_coa
                        ];
                        $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                    }
                } else {
                    $kunjungan = $CI->db->get_where('history_pelayanan', ['id_history' => $db_hd[$i]->poli])->row();
                    $hd1 = $CI->M_Jurnal->total_hd1($db_hd[$i]->poli);
                    $db_list_poli = $CI->M_Jurnal->poli_apotik($db_hd[$i]->poli);


                    if ($kunjungan->nama_poli == "NM3075J78") {
                        $kode_coa = '703';
                        $kode_coa_poli = '01';
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        $nama_poli = $db_list_poli->row()->nama_panjang;
                        $dokter = $db_list_poli->row()->nama_dokter;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                    } else {
                        if ($db_hd[$i]->jenis_pelayanan == "POLI") {
                            $kode_coa_poli = $db_list_poli->row()->kode_coa;
                            $id_list_poli = $db_list_poli->row()->id_list_poli;
                            $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                            $nama_poli = $db_list_poli->row()->nama_panjang;
                            $dokter = $db_list_poli->row()->nama_dokter;
                            if ($jenis_poli == 'POLI PRIORITAS') {
                                $lap = lap . 'P';
                            } else {
                                $lap = lap;
                            }
                        } else if ($db_hd[$i]->jenis_pelayanan == "IGD" || $db_hd[$i]->jenis_pelayanan == "UGD") {
                            $kode_coa_poli = '14';
                            $id_list_poli = 'IGD';
                            $nama_poli = $db_radiologi[$i]->jenis_pelayanan;
                            $dokter = NULL;
                            $lap = lap;
                        }
                        $kode_coa = '701';
                    }

                    $akun_labor = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $hd1['total'],
                        'harga_jasa' => 0,
                        'jenis_akun' => 'Hemodialisa Rawat Jalan',
                        'kode_akun' => $kode_coa . '.' . $kode_coa_poli . '.' . $db_hd[$i]->kode_coa,
                        'dokter' => $dokter,
                        'poli' =>  $nama_poli,
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                }
            }
        }

        // ///////////////////////////////KIA///////////////////////////////////////////////////////////////////////////////

        if (count($data_kia) > 0) {

            $db_kia = $CI->M_Jurnal->akun_kia($id_pelayanan);


            for ($i = 0; $i < count($db_kia); $i++) {
                $split = explode('_', $db_kia[$i]->poli);
                if ($db_kia[$i]->jenis_pelayanan == "RAWAT INAP" || $db_kia[$i]->jenis_pelayanan == "RANAP" || $split[0] == "ranap") {
                    $db_kamar = $CI->M_Jurnal->kamar_kia($db_kia[$i]->poli);
                    for ($j = 0; $j < count($db_kamar); $j++) {
                        $akun_kia = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $db_kamar[$j]->tipe,
                            'lap' => lap,
                            'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                            'total_akun' => $db_kamar[$j]->total,
                            'harga_jasa' => 0,
                            'jenis_akun' => 'KIA Rawat Inap',
                            'kode_akun' =>  '702.' . $db_kamar[$j]->kode_coa . '.' . $db_kia[$i]->kode_coa
                        ];
                        $CI->M_Kasir->insert_tindakan($akun_kia, 'akun_tindakan');
                    }
                } else {

                    $db_list_poli = $CI->M_Jurnal->poli_apotik($db_kia[$i]->poli);

                    if ($db_kia[$i]->jenis_pelayanan == "POLI") {
                        $id_list_poli = $db_list_poli->row()->id_list_poli;

                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                    } else if ($db_kia[$i]->jenis_pelayanan == "IGD" || $db_kia[$i]->jenis_pelayanan == "UGD") {
                        $kode_coa_poli = '14';
                        $id_list_poli = 'IGD';
                        $lap = lap;
                    }


                    $akun_kia = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $db_kia[$i]->total,
                        'harga_jasa' => 0,
                        'jenis_akun' => 'KIA Rawat Jalan',
                        'kode_akun' =>  $db_kia[$i]->coa
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_kia, 'akun_tindakan');
                }
            }
        }



        //////////////////////////////////AMBULAN///////////////////////
        if (count($data_transportasi) > 0) {

            $db_transportasi = $CI->M_Jurnal->akun_transportasi($id_pelayanan);


            for ($i = 0; $i < count($db_transportasi); $i++) {
                if ($db_transportasi[$i]->jenis_pelayanan == "RAWAT INAP" || $db_transportasi[$i]->jenis_pelayanan == "RANAP") {
                    $db_kamar = $CI->M_Jurnal->kamar_transportasi($db_transportasi[$i]->poli);
                    for ($j = 0; $j < count($db_kamar); $j++) {
                        $akun_labor = [
                            'id_staff' => $id_staff,

                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $db_kamar[$j]->tipe,
                            'lap' => lap,
                            'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                            'total_akun' => $db_kamar[$j]->total,
                            'harga_jasa' => 0,
                            'jenis_akun' => 'Ambulance Rawat Inap',
                            'kode_akun' =>  '702.' . $db_kamar[$j]->kode_coa . '.' . $db_transportasi[$i]->kode_coa
                        ];
                        $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                    }
                } else {

                    $db_list_poli = $CI->M_Jurnal->poli_apotik($db_transportasi[$i]->poli);

                    if ($db_transportasi[$i]->jenis_pelayanan == "POLI") {
                        $kode_coa_poli = $db_list_poli->row()->kode_coa;
                        $id_list_poli = $db_list_poli->row()->id_list_poli;
                        $jenis_poli = $db_list_poli->row()->jenis_pelayanan;
                        if ($jenis_poli == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }
                    } else if ($db_transportasi[$i]->jenis_pelayanan == "IGD" || $db_transportasi[$i]->jenis_pelayanan == "UGD") {
                        $kode_coa_poli = '14';
                        $id_list_poli = 'IGD';
                        $lap = lap;
                    }


                    $akun_labor = [
                        'id_staff' => $id_staff,

                        'id_pelayanan' => $id_pelayanan,
                        'id_poli' => $id_list_poli,
                        'lap' => $lap,
                        'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                        'total_akun' => $db_transportasi[$i]->total,
                        'harga_jasa' => 0,
                        'jenis_akun' => 'Ambulance Rawat Jalan',
                        'kode_akun' =>  '701.' . $kode_coa_poli . '.' . $db_transportasi[$i]->kode_coa
                    ];
                    $CI->M_Kasir->insert_tindakan($akun_labor, 'akun_tindakan');
                }
            }
        }

        //////////////////////////////IGD ///////////////////////////////////////////////////////////////////////////////////////////////

        if (count($data_igd) > 0) {

            $db_igd = $CI->M_Jurnal->akun_igd($id_pelayanan);

            for ($i = 0; $i < count($db_igd); $i++) {
                $akun_igd = [
                    'id_staff' => $id_staff,

                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => 'IGD',
                    'lap' => lap,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_igd[$i]->total,
                    'harga_jasa' => $db_igd[$i]->jasa,
                    'jenis_akun' => $db_igd[$i]->kode_coa == 130 ? 'Tindakan Rawat Jalan' : 'Konsul Rawat Jalan',
                    'kode_akun' => '701.14' . '.' . $db_igd[$i]->kode_coa
                ];
                $CI->M_Kasir->insert_tindakan($akun_igd, 'akun_tindakan');
            }
        }

        //////////////////////////////////TINDAKAN POLI/////////////////////////////////////////////////////

        $dbpoli = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();
        $polilabor = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => '146582', 'status' => 1])->result();
        $poliradio = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => '15487956', 'status' => 1])->result();
        $polifisio = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => '6E975PL694', 'status' => 1])->result();
        $polihd = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => 'NM3075J78', 'status' => 1])->result();
        $polikia = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => 'KASE14', 'status' => 1])->result();

        // echo count($poliradio);
        if (count($dbpoli) > 0) {
            if ((count($polilabor) == 0 || count($poliradio) == 0 || count($polifisio) == 0 || count($polihd) == 0 || count($polikia) == 0)) {

                $db_tindakan = $CI->M_Jurnal->akun_poli($id_pelayanan);
                if ($db_tindakan != null) {
                    // print_arr($db_tindakan_internis);
                    foreach ($db_tindakan as $pelayanan => $key) {
                        foreach ($key as  $row) {
                            $jenis_poli = $row->jenis_pelayanan;
                            if ($jenis_poli == 'POLI PRIORITAS') {
                                $lap = lap . 'P';
                            } else {
                                $lap = lap;
                            }
                            $akun_poli = [
                                'id_staff' => $id_staff,

                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $row->id_poli,
                                'lap' => $lap,
                                'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                                'total_akun' => $row->total,
                                'harga_jasa' => $row->jasa,
                                'jenis_akun' => $row->kode_coa == 130 ? 'TINDAKAN RAWAT JALAN' : 'KONSUL RAWAT JALAN',
                                'kode_akun' => '701.' . $row->coa_poli . '.' . $row->kode_coa
                            ];
                            $CI->M_Kasir->insert_tindakan($akun_poli, 'akun_tindakan');
                        }
                    }
                }
            }
        }



        //////////////////////////////TINDAKAN APELKES //////////////////////////////////////////////////////////////////////////////////////////////////////

        if (count($data_apelkes) > 0) {

            $db_tindakan_apelkes = $CI->M_Jurnal->akun_apelkes($id_pelayanan);

            for ($i = 0; $i < count($db_tindakan_apelkes); $i++) {
                // $jenis_akun = $CI->db->get_where('list_coa_ranap', ['kode_coa' => $db_tindakan_apelkes[$i]->kode_tindakan])->row()->nama;

                $akun_apelkes = [
                    'id_staff' => $id_staff,

                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => $db_tindakan_apelkes[$i]->tipe,
                    'lap' => lap,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_tindakan_apelkes[$i]->total,
                    'harga_jasa' => $db_tindakan_apelkes[$i]->jasa,
                    'jenis_akun' => $db_tindakan_apelkes[$i]->jenis_akun,
                    'kode_akun' => '702.' . $db_tindakan_apelkes[$i]->kode_ruang . '.' . $db_tindakan_apelkes[$i]->kode_tindakan,
                    'dokter' => isset($biaya_ranap) ? $biaya_ranap->nama_dokter : NULL,
                    'poli' =>  'RAWAT INAP',
                ];
                $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_tindakan');
            }
        }
        //////////////////////////////TINDAKAN PENUNJANG LAIN //////////////////////////////////////////////////////////////////////////////////////////////////////

        if (count($data_lain) > 0) {

            $db_penunjang_lain = $CI->M_Jurnal->akun_penunjang_lain($id_pelayanan);
            for ($i = 0; $i < count($db_penunjang_lain); $i++) {
                // $jenis_akun = $CI->db->get_where('list_coa_ranap', ['kode_coa' => $db_tindakan_apelkes[$i]->kode_tindakan])->row()->nama;

                $data_lain = [
                    'id_staff' => $id_staff,

                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => $db_tindakan_apelkes[$i]->tipe,
                    'lap' => lap,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_penunjang_lain[$i]->total,
                    'harga_jasa' => $db_penunjang_lain[$i]->jasa,
                    'jenis_akun' => $db_penunjang_lain[$i]->jenis_akun,
                    'kode_akun' =>  '702.' . $db_penunjang_lain[$i]->kode_ruang . '.' . $db_penunjang_lain[$i]->kode_tindakan,
                    'dokter' => isset($biaya_ranap) ? $biaya_ranap->nama_dokter : NULL,
                    'poli' =>  'RAWAT INAP',
                ];
                $CI->M_Kasir->insert_tindakan($data_lain, 'akun_tindakan');
            }
        }

        //////////////////////////////KAMAR OPERASI //////////////////////////////////////////////////////////////////////////////////////////////////////

        if (count($data_ok) > 0) {

            $db_kamar_ok = $CI->M_Jurnal->akun_ok($id_pelayanan);
            $histpoli = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
            $histugd = $CI->db->get_where('history_pelayanan_ugd', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->row();

            for ($i = 0; $i < count($db_kamar_ok); $i++) {
                if (!empty($biaya_ranap)) {
                    $poli = $biaya_ranap->id_kamar;
                    $lap = lap;
                } else if (!empty($histugd)) {
                    $poli = 'IGD';
                    $lap = lap;
                } else if (!empty($histpoli)) {
                    $poli = $histpoli->nama_poli;
                    $jenis_poli = $histpoli->jenis_pelayanan;
                    if ($jenis_poli == 'POLI PRIORITAS') {
                        $lap = lap . 'P';
                    } else {
                        $lap = lap;
                    }
                }
                $akun_apelkes = [
                    'id_staff' => $id_staff,
                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => $poli,
                    'lap' => $lap,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_kamar_ok[$i]->total,
                    'harga_jasa' => $db_kamar_ok[$i]->jasa,
                    'jenis_akun' => 'Tindakan Kamar Operasi',
                    'kode_akun' => '703.05.131'
                ];
                $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_tindakan');
            }
        }

        //////////////////////////////KEMOTERAPI //////////////////////////////////////////////////////////////////////////////////////////////////////

        if (count($data_kemo) > 0) {

            $db_kemo = $CI->M_Jurnal->akun_kemo($id_pelayanan);

            for ($i = 0; $i < count($db_kemo); $i++) {
                if ($db_kemo[$i]->jenis_pelayanan == 'RAWAT INAP' || $db_kemo[$i]->jenis_pelayanan == 'RANAP') {
                    $poli = $db_kemo[$i]->tipe;
                    $lap = lap;
                    $coa = '703.11.711';
                    $jenis_akun = 'Radioterapi Rawat Inap';
                    $nama_poli = 'RAWAT INAP';
                    $dokter = NULL;
                } else if ($db_kemo[$i]->jenis_pelayanan == 'IGD' || $db_kemo[$i]->jenis_pelayanan == 'UGD') {
                    $poli = 'IGD';
                    $lap = lap;
                    $coa = '703.11.710';
                    $jenis_akun = 'Radioterapi Rawat Jalan';
                    $nama_poli = $db_kemo[$i]->jenis_pelayanan;
                    $dokter = NULL;
                } else {
                    // $histpoli = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
                    $histpoli = $CI->db->query("SELECT h.*,d.nama nama_dokter, l.nama_panjang poli from history_pelayanan h, dokter d, list_poli l
                    where h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and id_pelayanan = '$id_pelayanan'")->row();
                    $coa = '703.11.710';
                    $jenis_akun = 'Radioterapi Rawat Jalan';
                    $poli = $histpoli->nama_poli;
                    $jenis_poli = $histpoli->jenis_pelayanan;
                    $nama_poli = $histpoli->poli;
                    $dokter =  $histpoli->nama_dokter;
                    if ($jenis_poli == 'POLI PRIORITAS') {
                        $lap = lap . 'P';
                    } else {
                        $lap = lap;
                    }
                }
                $datakemo = [
                    'id_staff' => $id_staff,
                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => $poli,
                    'lap' => $lap,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_kemo[$i]->total,
                    'harga_jasa' => $db_kemo[$i]->jasa,
                    'jenis_akun' => $jenis_akun,
                    'kode_akun' => $coa
                ];
                $CI->M_Kasir->insert_tindakan($datakemo, 'akun_tindakan');
            }
        }

        //////////////////////////////DISKON ATAU REDUKSI //////////////////////////////////////////////////////////////////////////////////////////////////////
        diskon_pelayanan($id_pelayanan, $id_staff);
    }

    $CI->db->trans_complete();
}
function diskon_pelayanan($id_pelayanan, $id_staff)
{
    $CI = get_instance();
    $CI->load->model('M_Jurnal');
    $CI->load->model('M_Kasir');

    // $data_diskon = $CI->db->query("SELECT sum(diskon) diskon from pendapatan_kasir 
    // where id_pelayanan='$id_pelayanan' 
    // group by id_pelayanan
    // having diskon >0")->result();
    $data_diskon = $CI->db->query("SELECT p.*
        FROM detail_kasir_diskon p
        where p.id_pelayanan = '$id_pelayanan'")->result();

    if (count($data_diskon) > 0) {

        $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_reduksi');
        $check = $CI->db->get_where('akun_reduksi', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

        if (count($check) == 0) { //jika belum jurnal

            $kunjungan = $CI->db->query("SELECT p.*
                FROM detail_kasir_diskon p
                where p.id_pelayanan = '$id_pelayanan'")->result();
            $db_pel = $CI->db->query("SELECT cara_bayar FROM pelayanan where id_pelayanan ='$id_pelayanan'")->row();

            foreach ($kunjungan as $row) {
                $jenis = explode('_', $row->id_history);

                if ($jenis[0] == 'ranap') {

                    $ruangan = $CI->db->query("SELECT h.id_kamar,r.kode_coa FROM history_pelayanan_ranap h, ruangan r
                        where h.id_kamar = r.id_ruangan and h.id_history ='$row->id_history'")->row();
                    $poli = $ruangan->id_kamar;


                    if ($row->diskon_tindakan != 0) {
                        $coa = '722.' . $ruangan->kode_coa . '.131';
                        $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Inap';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_tindakan,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_konsul != 0) {
                        $coa = '722.' . $ruangan->kode_coa . '.151';
                        $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Inap';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_konsul,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_visite != 0) {
                        $coa = '722.' . $ruangan->kode_coa . '.120';
                        $jenis_akun = 'Reduksi Pendapatan Visite Rawat Inap';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_visite,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_kamar != 0) {
                        $coa = '722.' . $ruangan->kode_coa . '.210';
                        $jenis_akun = 'Reduksi Pendapatan Sewa Kamar Perawatan Rawat Inap';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_kamar,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_labor != 0) {
                        $coa = '722.' . $ruangan->kode_coa . '.811';
                        $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Inap';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_labor,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_radio != 0) {
                        $coa = '722.' . $ruangan->kode_coa . '.721';
                        $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Inap';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_radio,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                } else if ($jenis[0] == 'ugd') {

                    $poli = 'IGD';

                    if ($row->diskon_tindakan != 0) {
                        $coa = '721.14.130';
                        $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Jalan';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_tindakan,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_konsul != 0) {
                        $coa = '721.14.150';
                        $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Jalan';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_konsul,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_labor != 0) {
                        $coa = '721.14.810';
                        $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Jalan';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_labor,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                    if ($row->diskon_radio != 0) {
                        $coa = '721.14.720';
                        $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Jalan';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_radio,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    }
                } else {
                    $ruangan = $CI->db->query("SELECT h.nama_poli,h.jenis_pelayanan,r.kode_coa FROM history_pelayanan h, list_poli r
                        where h.nama_poli = r.id_list_poli and h.id_history ='$row->id_history'")->row();

                    if ($ruangan->nama_poli == '146582') {
                        $poli = $ruangan->nama_poli;
                        $jenis_akun = 'Reduksi Pendapatan Penunjang Laboratorium';
                        $coa = '723.02.810';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_labor,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    } else if ($ruangan->nama_poli == '15487956') {
                        $poli = $ruangan->nama_poli;
                        $jenis_akun = 'Reduksi Pendapatan Penunjang Radiologi';
                        $coa = '723.11.720';

                        $akun_apelkes = [
                            'id_staff' => $id_staff,
                            'id_pelayanan' => $id_pelayanan,
                            'id_poli' => $poli,
                            'lap' => lap,
                            'cara_bayar' => $db_pel->cara_bayar,
                            'total_akun' => $row->diskon_radio,
                            'jenis_akun' => $jenis_akun,
                            'kode_akun' => $coa
                        ];

                        $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                    } else {
                        if ($ruangan->jenis_pelayanan == 'POLI PRIORITAS') {
                            $lap = lap . 'P';
                        } else {
                            $lap = lap;
                        }

                        $poli = $ruangan->nama_poli;
                        if ($row->diskon_tindakan != 0) {
                            $coa = '721.' . $ruangan->kode_coa . '.130';
                            $jenis_akun = 'Reduksi Pendapatan Tindakan Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => $lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_tindakan,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                        if ($row->diskon_konsul != 0) {
                            $coa = '721.' . $ruangan->kode_coa . '.150';
                            $jenis_akun = 'Reduksi Pendapatan Konsultasi Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => $lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_konsul,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                        if ($row->diskon_labor != 0) {
                            $coa = '721.' . $ruangan->kode_coa . '.810';
                            $jenis_akun = 'Reduksi Pendapatan Laboratorium Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => $lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_labor,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                        if ($row->diskon_radio != 0) {
                            $coa = '721.' . $ruangan->kode_coa . '.720';
                            $jenis_akun = 'Reduksi Pendapatan Radiodiagnostik Rawat Jalan';

                            $akun_apelkes = [
                                'id_staff' => $id_staff,
                                'id_pelayanan' => $id_pelayanan,
                                'id_poli' => $poli,
                                'lap' => $lap,
                                'cara_bayar' => $db_pel->cara_bayar,
                                'total_akun' => $row->diskon_radio,
                                'jenis_akun' => $jenis_akun,
                                'kode_akun' => $coa
                            ];

                            $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
                        }
                    }
                }
            }
        }
    }
}
function jurnal_ijd($id_pelayanan)
{
    $CI = get_instance();
    $CI->load->model('M_Jurnal');
    $CI->load->model('M_Kasir');

    $db_akun = $CI->db->get_where('akun_jasa_dokter', ['id_pelayanan' => $id_pelayanan, 'verifikasi' => 1])->result();

    $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'verifikasi' => 0], 'akun_jasa_dokter');
    // $id_staff = $CI->db->get_where('deatail_kasir', ['id_pelayanan' => $id_pelayanan])->row()->id_staff;

    $polilabor = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => '146582'])->result();
    $poliradio = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => '15487956'])->result();
    $polifisio = $CI->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan, 'nama_poli' => '6E975PL694'])->result();
    if (count($polilabor) == 0 && count($poliradio) == 0) {
        $a = $CI->M_Jurnal->get_akun_tindakan($id_pelayanan);
        // print_arr($a);
        $db = null;

        // print_arr($a);
        foreach ($a as $pelayanan => $key) {
            foreach ($key as  $row) {

                $db_pelayanan = $CI->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
                $cara_bayar = $CI->db->get_where('cara_bayar', ['id_cara_bayar' => $db_pelayanan->cara_bayar])->row()->nama;
                $pasien = $CI->db->get_where('pasien', ['no_rm' => $db_pelayanan->id_pasien])->row();

                $harga_jasa = is_numeric($row->harga_jasa) ? $row->harga_jasa : 0;

                $arr = explode("_", $id_pelayanan);
                $no_reg = 'RS01' . $arr[1];
                $nama = $pasien->nama;
                $tgl = $db_pelayanan->tgl_keluar;
                $tindakan = $row->nama;
                $poli = $row->poli;
                $biaya =  $harga_jasa * $row->frek;
                $frek = $row->frek;
                $fee = $harga_jasa * $row->frek;
                $dpjp = $row->id_dokter;
                $dbdokter = $CI->db->get_where('dokter', ['id_dokter' => $dpjp])->row();

                if ($cara_bayar == 'TIMAH') {
                    if (preg_match('/DISKON/i', $tindakan)) {
                        $jumlah = 0; //dokter
                    } else {
                        $jumlah = ($harga_jasa * $row->frek) * (50 / 100); //dokter
                    }
                    $rsppbm = 0; //karyawan
                } else if ($cara_bayar == 'BPJS') {
                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul dan visite
                        if (preg_match('/DISKON/i', $tindakan)) {
                            $jumlah = 0; //dokter
                        } else {
                            $jumlah = $harga_jasa * $row->frek; //dokter
                        }
                        $rsppbm = 0; //karyawan
                    } else { ///tindakan
                        $jumlah = ($dbdokter->dokter_spes == 'UMU') ? (10000 * $row->frek) : (5000 * $row->frek); //dokter
                        $rsppbm = 0; //karyawan
                    }
                } else {
                    if (preg_match('/visite/i', $tindakan) || preg_match('/konsultasi/i', $tindakan)) { //konsul dan visite
                        if (preg_match('/DISKON/i', $tindakan)) {
                            $jumlah = 0; //dokter
                        } else {
                            $jumlah = ($harga_jasa * $row->frek) * (72 / 100); //dokter
                        }
                        $rsppbm = ($harga_jasa * $row->frek) * (10 / 100); //karyawan

                    } else { ///tindakan
                        $jumlah = ($harga_jasa * $row->frek) * (80 / 100); //dokter
                        $rsppbm = ($harga_jasa * $row->frek) * (15 / 100); //karyawan
                    }
                }


                $rslain = 0;

                $db[] = array(
                    'no_reg' => $id_pelayanan,
                    'nama' => $nama,
                    'tgl' => $tgl,
                    'tindakan' => $tindakan,
                    'poli' => $poli,
                    'cara_bayar' => $cara_bayar,
                    'biaya' => $biaya,
                    'frek' => $frek,
                    'rsppbm' => $rsppbm,
                    'rslain' => $rslain,
                    'jumlah' => $jumlah,
                    'jenis_rawat' => $row->jenis_rawat,
                    'dokter' => $dbdokter->id_dokter,
                    'kode_akun' => '80' . $row->jenis_rawat . '.' . $row->coa_poli . '.130',
                );
            }
        }
        if ($db == null || $db == "") {
        } else {
            for ($i = 0; $i < count($db); $i++) {

                // $data['id_akun'] = uniqid();
                $data['id_pelayanan'] = $db[$i]['no_reg'];
                $data['nama'] = $db[$i]['nama'];
                $data['tgl'] = $db[$i]['tgl'];
                $data['tindakan'] = $db[$i]['tindakan'];
                $data['poli'] = $db[$i]['poli'];
                $data['tipe_pasien'] = $db[$i]['cara_bayar'];
                $data['biaya'] = $db[$i]['biaya'];
                $data['frek'] = $db[$i]['frek'];
                $data['rsppbm'] = $db[$i]['rsppbm'];
                $data['rs_lain'] = $db[$i]['rslain'];
                $data['jumlah'] = $db[$i]['jumlah'];
                $data['jenis_rawat'] = $db[$i]['jenis_rawat'];
                $data['dokter'] = $db[$i]['dokter'];
                $data['kode_akun'] = $db[$i]['kode_akun'];
                // $data['id_staff'] = $id_staff;
                // print_arr($data);
                $CI->M_Kasir->insert_tindakan($data, 'akun_jasa_dokter');
                // }
            }
        }
    }
}

function test($data)
{
    $groups = array();
    foreach ($data as $item) {
        $key = $item->no_jurnal;
        if (!isset($groups[$key])) {
            $groups[$key] = array(
                'bank' => $item->cara_klaim,
                'pk' => $item->pk,
                'jenis_jurnal' => $item->jenis_jurnal,
                // 'deskripsi' => $item->deskripsi,
                'score' => $item->debet,
            );
        } else {
            $groups[$key]['score'] = $groups[$key]['score'] + $item->debet;
        }
    }
    return $groups;
}
function getPendapatan($id_pelayanan)
{
    $CI = get_instance();
    $data_staff = $CI->session->userdata("data_auth");

    $adm = $CI->M_Kasir->total_pelayanan_pasien($id_pelayanan);
    $apotik = $CI->M_Kasir->total_apotik($id_pelayanan);
    $obatok = $CI->M_Kasir->total_operasi($id_pelayanan);
    $igd = $CI->M_Kasir->total_igd($id_pelayanan);
    $labor = $CI->M_Kasir->total_labor($id_pelayanan);
    $radio = $CI->M_Kasir->total_radio($id_pelayanan);
    $apelkes = $CI->M_Kasir->total_apelkes($id_pelayanan);
    $ok = $CI->M_Kasir->total_ok($id_pelayanan);
    $gizi = $CI->M_Kasir->total_gizi($id_pelayanan);
    // $anak = $CI->M_Kasir->total_anak($id_pelayanan);
    // $internis = $CI->M_Kasir->total_internis($id_pelayanan);
    // $bedah = $CI->M_Kasir->total_bedah($id_pelayanan);
    // $fisio = $CI->M_Kasir->total_fisio($id_pelayanan);
    // $gigi = $CI->M_Kasir->total_gigi($id_pelayanan);
    // $jantung = $CI->M_Kasir->total_jantung($id_pelayanan);
    // $kulit = $CI->M_Kasir->total_kulit($id_pelayanan);
    // $mata = $CI->M_Kasir->total_mata($id_pelayanan);
    // $obgyne = $CI->M_Kasir->total_obgyne($id_pelayanan);
    // $tht = $CI->M_Kasir->total_tht($id_pelayanan);
    // $umum = $CI->M_Kasir->total_umum($id_pelayanan);
    // $akp = $CI->M_Kasir->total_akupuntur($id_pelayanan);
    // $bdm = $CI->M_Kasir->total_bedah_mulut($id_pelayanan);
    // $jiwa = $CI->M_Kasir->total_kesjiwa($id_pelayanan);
    // $ort = $CI->M_Kasir->total_orthopedi($id_pelayanan);
    // $paru = $CI->M_Kasir->total_paru($id_pelayanan);
    // $hd = $CI->M_Kasir->total_hemodialisa($id_pelayanan);
    // $saraf = $CI->M_Kasir->total_saraf($id_pelayanan);
    // $uro = $CI->M_Kasir->total_urologi($id_pelayanan);
    // $ginjal = $CI->M_Kasir->total_ginjal($id_pelayanan);
    // $pnm = $CI->M_Kasir->total_penyakit_mulut($id_pelayanan);
    // $rehab = $CI->M_Kasir->total_rehab($id_pelayanan);
    // $terapi = $CI->M_Kasir->total_terapi_wicara($id_pelayanan);
    // $psikologi = $CI->M_Kasir->total_psikolog($id_pelayanan);
    // $kemo = $CI->M_Kasir->total_kemoterapi($id_pelayanan);
    // $stifin = $CI->M_Kasir->total_stifin($id_pelayanan);
    // $kia = $CI->M_Kasir->total_kia($id_pelayanan);

    $poli_total = $CI->M_Kasir->total_poli($id_pelayanan);

    $trasport = $CI->M_Kasir->total_transportasi($id_pelayanan);
    $lain = $CI->M_Kasir->total_lain($id_pelayanan);

    $biaya_ranap = $CI->db->query("SELECT IFNULL(biaya_ruangan,0) biaya_ruangan from history_pelayanan_ranap 
        where id_pelayanan = '$id_pelayanan' and status = 1")->row_array();
    $biaya_ranap = (isset($biaya_ranap)) ? $biaya_ranap['biaya_ruangan'] : 0;

    $total_harga = $adm
        + $biaya_ranap
        + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
        + $apelkes['total'] + $ok['total'] + $gizi['total'] + $poli_total['total']
        + $trasport['total'] + $lain['total'];

    // $total_harga = $adm
    //     + $biaya_ranap
    //     + $apotik['total'] + $obatok['total'] + $igd['total'] + $labor['total'] + $radio['total']
    //     + $anak['total'] + $apelkes['total'] + $internis['total'] + $bedah['total'] + $fisio['total'] + $gigi['total']
    //     + $jantung['total'] + $kulit['total'] + $mata['total'] + $obgyne['total'] + $ok['total'] + $tht['total'] + $umum['total'] +
    //     $akp['total'] + $bdm['total'] + $jiwa['total'] + $ort['total'] + $paru['total'] + $hd['total'] + $saraf['total'] + $uro['total'] +
    //     $ginjal['total'] + $pnm['total'] + $rehab['total'] + $gizi['total'] + $terapi['total'] + $psikologi['total'] +
    //     $kemo['total'] + $trasport['total'] + $kia['total'] + $stifin['total'] + $lain['total'];



    // echo $total_harga . '<br>';

    $poli = $CI->db->query("SELECT * FROM history_pelayanan
         where id_pelayanan='$id_pelayanan' and status = 1 
         and nama_poli != 'EM4488C53'
         and id_pelayanan not in (SELECT id_pelayanan 
         from history_pelayanan_ranap where status = 1)
        ")->result();
    $ppnapotik = $apotik['total'] * 0.11;
    // $apotikppn = $apotik['total'] + $ppnapotik;
    $ppn = (count($poli) > 0) ? round($ppnapotik) : 0;

    $total_harga = $total_harga + $ppn;

    // echo $total_materai . '<br>';
    // echo $total_service . '<br>';
    // echo $biaya_ranap . '<br>';
    // echo $fisio['total'] . '<br>';
    // echo $total_harga;
    return $total_harga;
}

function get_list_pendapatan($id_pelayanan)
{
    $CI = get_instance();
    $data['data_pelayanan'] = $CI->M_Kasir->list_pelayanan_pasien($id_pelayanan);
    $data['jasa_history'] = $CI->M_Kasir->list_jasa_history($id_pelayanan);
    $data['data_apotik'] = $CI->M_Kasir->list_apotik_pasien($id_pelayanan);
    $data['data_operasi'] = $CI->M_Kasir->list_operasi_pasien($id_pelayanan);
    $data['data_igd'] = $CI->M_Kasir->list_igd_pasien($id_pelayanan);
    $data['data_labor'] = $CI->M_Kasir->list_labor_pasien($id_pelayanan);
    $data['data_radio'] = $CI->M_Kasir->list_radio_pasien($id_pelayanan);
    $data['data_apelkes'] = $CI->M_Kasir->list_apelkes_pasien($id_pelayanan);
    $data['data_ok'] = $CI->M_Kasir->list_ok_pasien($id_pelayanan);
    $data['data_gizi'] = $CI->M_Kasir->list_gizi($id_pelayanan);
    // $data['data_anak'] = $CI->M_Kasir->list_anak_pasien($id_pelayanan);
    // $data['data_internis'] = $CI->M_Kasir->list_internis_pasien($id_pelayanan);
    // $data['data_bedah'] = $CI->M_Kasir->list_bedah_pasien($id_pelayanan);
    // $data['data_fisio'] = $CI->M_Kasir->list_fisio_pasien($id_pelayanan);
    // $data['data_gigi'] = $CI->M_Kasir->list_gigi_pasien($id_pelayanan);
    // $data['data_jantung'] = $CI->M_Kasir->list_jantung_pasien($id_pelayanan);
    // $data['data_kulit'] = $CI->M_Kasir->list_kulit_pasien($id_pelayanan);
    // $data['data_mata'] = $CI->M_Kasir->list_mata_pasien($id_pelayanan);
    // $data['data_obgyne'] = $CI->M_Kasir->list_obgyne_pasien($id_pelayanan);
    // $data['data_tht'] = $CI->M_Kasir->list_tht_pasien($id_pelayanan);
    // $data['data_umum'] = $CI->M_Kasir->list_umum_pasien($id_pelayanan);
    // $data['data_akp'] = $CI->M_Kasir->list_akupuntur_pasien($id_pelayanan);
    // $data['data_bdm'] = $CI->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
    // $data['data_jiwa'] = $CI->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
    // $data['data_ort'] = $CI->M_Kasir->list_orthopedi_pasien($id_pelayanan);
    // $data['data_paru'] = $CI->M_Kasir->list_paru_pasien($id_pelayanan);
    // $data['data_hd'] = $CI->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
    // $data['data_saraf'] = $CI->M_Kasir->list_saraf_pasien($id_pelayanan);
    // $data['data_uro'] = $CI->M_Kasir->list_urologi_pasien($id_pelayanan);
    // $data['data_ginjal'] = $CI->M_Kasir->list_ginjal_pasien($id_pelayanan);
    // $data['data_pnm'] = $CI->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
    // $data['data_rehab'] = $CI->M_Kasir->list_rehab_pasien($id_pelayanan);
    // $data['data_psikolog'] = $CI->M_Kasir->list_psikolog($id_pelayanan);
    // $data['data_terapi_wicara'] = $CI->M_Kasir->list_terapi_bicara($id_pelayanan);
    // $data['data_kemo'] = $CI->M_Kasir->list_kemo_pasien($id_pelayanan);
    // $data['data_stifin'] = $CI->M_Kasir->list_stifin_pasien($id_pelayanan);
    // $data['data_kia'] = $CI->M_Kasir->list_kia_pasien($id_pelayanan);
    $data['data_poli'] = $CI->M_Kasir->list_tindakan_poli($id_pelayanan);
    $data['data_transportasi'] = $CI->M_Kasir->list_transportasi_pasien($id_pelayanan);
    $data['data_lain'] = $CI->M_Kasir->list_lain_pasien($id_pelayanan);
    return $data;
}
function get_list_pendapatan_ranap($id_pelayanan)
{
    $CI = get_instance();
    $data['data_pelayanan'] = $CI->M_Kasir->list_pelayanan_pasien($id_pelayanan);
    $data['jasa_history'] = $CI->M_Kasir->list_jasa_history($id_pelayanan);
    $data['data_apotik'] = $CI->M_Kasir_ranap->list_apotik_pasien($id_pelayanan);
    $data['data_apotik_ranap'] = $CI->M_Kasir_ranap->list_apotik_ranap($id_pelayanan);
    $data['data_apotik_igd'] = $CI->M_Kasir_ranap->list_apotik_igd($id_pelayanan);
    $data['data_operasi'] = $CI->M_Kasir_ranap->list_operasi_pasien($id_pelayanan);
    $data['data_igd'] = $CI->M_Kasir_ranap->list_igd_pasien($id_pelayanan);
    $data['data_labor'] = $CI->M_Kasir_ranap->list_labor_pasien($id_pelayanan);
    $data['data_radio'] = $CI->M_Kasir_ranap->list_radio_pasien($id_pelayanan);
    $data['data_apelkes'] = $CI->M_Kasir_ranap->list_apelkes_pasien($id_pelayanan);
    $data['data_ok'] = $CI->M_Kasir_ranap->list_ok_pasien($id_pelayanan);

    // $data['data_gizi'] = $CI->M_Kasir_ranap->list_gizi($id_pelayanan);
    // $data['data_anak'] = $CI->M_Kasir_ranap->list_anak_pasien($id_pelayanan);
    // $data['data_internis'] = $CI->M_Kasir_ranap->list_internis_pasien($id_pelayanan);
    // $data['data_bedah'] = $CI->M_Kasir_ranap->list_bedah_pasien($id_pelayanan);
    // $data['data_fisio'] = $CI->M_Kasir_ranap->list_fisio_pasien($id_pelayanan);
    // $data['data_gigi'] = $CI->M_Kasir_ranap->list_gigi_pasien($id_pelayanan);
    // $data['data_jantung'] = $CI->M_Kasir_ranap->list_jantung_pasien($id_pelayanan);
    // $data['data_kulit'] = $CI->M_Kasir_ranap->list_kulit_pasien($id_pelayanan);
    // $data['data_mata'] = $CI->M_Kasir_ranap->list_mata_pasien($id_pelayanan);
    // $data['data_obgyne'] = $CI->M_Kasir_ranap->list_obgyne_pasien($id_pelayanan);
    // $data['data_tht'] = $CI->M_Kasir_ranap->list_tht_pasien($id_pelayanan);
    // $data['data_umum'] = $CI->M_Kasir_ranap->list_umum_pasien($id_pelayanan);
    // $data['data_akp'] = $CI->M_Kasir_ranap->list_akupuntur_pasien($id_pelayanan);
    // $data['data_bdm'] = $CI->M_Kasir_ranap->list_bedah_mulut_pasien($id_pelayanan);
    // $data['data_jiwa'] = $CI->M_Kasir_ranap->list_kesjiwa_pasien($id_pelayanan);
    // $data['data_ort'] = $CI->M_Kasir_ranap->list_orthopedi_pasien($id_pelayanan);
    // $data['data_paru'] = $CI->M_Kasir_ranap->list_paru_pasien($id_pelayanan);
    // $data['data_hd'] = $CI->M_Kasir_ranap->list_hemodialisa_pasien($id_pelayanan);
    // $data['data_saraf'] = $CI->M_Kasir_ranap->list_saraf_pasien($id_pelayanan);
    // $data['data_uro'] = $CI->M_Kasir_ranap->list_urologi_pasien($id_pelayanan);
    // $data['data_ginjal'] = $CI->M_Kasir_ranap->list_ginjal_pasien($id_pelayanan);
    // $data['data_pnm'] = $CI->M_Kasir_ranap->list_penyakit_mulut_pasien($id_pelayanan);
    // $data['data_rehab'] = $CI->M_Kasir_ranap->list_rehab_pasien($id_pelayanan);
    // $data['data_terapi_wicara'] = $CI->M_Kasir_ranap->list_terapi_bicara($id_pelayanan);
    // $data['data_psikolog'] = $CI->M_Kasir_ranap->list_psikolog($id_pelayanan);
    // $data['data_kemo'] = $CI->M_Kasir_ranap->list_kemo_pasien($id_pelayanan);
    // $data['data_stifin'] = $CI->M_Kasir_ranap->list_stifin_pasien($id_pelayanan);
    // $data['data_kia'] = $CI->M_Kasir_ranap->list_kia_pasien($id_pelayanan);

    $data['data_poli'] = $CI->M_Kasir_ranap->list_tindakan_poli($id_pelayanan);
    $data['data_transportasi'] = $CI->M_Kasir_ranap->list_transportasi_pasien($id_pelayanan);
    $data['data_lain'] = $CI->M_Kasir_ranap->list_lain_pasien($id_pelayanan);
    $biaya_ranap = $CI->db->get_where('history_pelayanan_ranap', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->row_array();

    $data['biaya_ranap'] = $biaya_ranap['biaya_ruangan'];

    return $data;
}
function get_list_pendapatan_casemix($id_pelayanan)
{
    $CI = get_instance();
    $data['data_pelayanan'] = $CI->M_Kasir->list_pelayanan_pasien($id_pelayanan);
    $data['jasa_history'] = $CI->M_Kasir->list_jasa_history($id_pelayanan);
    $data['data_apotik'] = $CI->M_Kasir->list_apotik_pasien($id_pelayanan);
    $data['data_operasi'] = $CI->M_Kasir->list_operasi_pasien($id_pelayanan);
    $data['data_igd'] = $CI->M_Kasir->list_igd_pasien($id_pelayanan);
    $data['data_labor'] = $CI->M_Kasir->list_labor_pasien($id_pelayanan);
    $data['data_radio'] = $CI->M_Kasir->list_radio_pasien($id_pelayanan);
    $data['data_apelkes'] = $CI->M_Kasir->list_apelkes_pasien($id_pelayanan);
    $data['data_ok'] = $CI->M_Kasir->list_ok_pasien($id_pelayanan);
    $data['data_gizi'] = $CI->M_Kasir->list_gizi($id_pelayanan);
    $data['data_anak'] = $CI->M_Kasir->list_anak_pasien($id_pelayanan);
    $data['data_internis'] = $CI->M_Kasir->list_internis_pasien($id_pelayanan);
    $data['data_bedah'] = $CI->M_Kasir->list_bedah_pasien($id_pelayanan);
    $data['data_fisio'] = $CI->M_Kasir->list_fisio_pasien($id_pelayanan);
    $data['data_gigi'] = $CI->M_Kasir->list_gigi_pasien($id_pelayanan);
    $data['data_jantung'] = $CI->M_Kasir->list_jantung_pasien($id_pelayanan);
    $data['data_kulit'] = $CI->M_Kasir->list_kulit_pasien($id_pelayanan);
    $data['data_mata'] = $CI->M_Kasir->list_mata_pasien($id_pelayanan);
    $data['data_obgyne'] = $CI->M_Kasir->list_obgyne_pasien($id_pelayanan);
    $data['data_tht'] = $CI->M_Kasir->list_tht_pasien($id_pelayanan);
    $data['data_umum'] = $CI->M_Kasir->list_umum_pasien($id_pelayanan);
    $data['data_akp'] = $CI->M_Kasir->list_akupuntur_pasien($id_pelayanan);
    $data['data_bdm'] = $CI->M_Kasir->list_bedah_mulut_pasien($id_pelayanan);
    $data['data_jiwa'] = $CI->M_Kasir->list_kesjiwa_pasien($id_pelayanan);
    $data['data_ort'] = $CI->M_Kasir->list_orthopedi_pasien($id_pelayanan);
    $data['data_paru'] = $CI->M_Kasir->list_paru_pasien($id_pelayanan);
    $data['data_hd'] = $CI->M_Kasir->list_hemodialisa_pasien($id_pelayanan);
    $data['data_saraf'] = $CI->M_Kasir->list_saraf_pasien($id_pelayanan);
    $data['data_uro'] = $CI->M_Kasir->list_urologi_pasien($id_pelayanan);
    $data['data_ginjal'] = $CI->M_Kasir->list_ginjal_pasien($id_pelayanan);
    $data['data_pnm'] = $CI->M_Kasir->list_penyakit_mulut_pasien($id_pelayanan);
    $data['data_rehab'] = $CI->M_Kasir->list_rehab_pasien($id_pelayanan);
    $data['data_psikolog'] = $CI->M_Kasir->list_psikolog($id_pelayanan);
    $data['data_terapi_wicara'] = $CI->M_Kasir->list_terapi_bicara($id_pelayanan);
    $data['data_kemo'] = $CI->M_Kasir->list_kemo_pasien($id_pelayanan);
    $data['data_stifin'] = $CI->M_Kasir->list_stifin_pasien($id_pelayanan);
    $data['data_kia'] = $CI->M_Kasir->list_kia_pasien($id_pelayanan);
    // $data['data_poli'] = $CI->M_Kasir->list_tindakan_poli($id_pelayanan);
    $data['data_transportasi'] = $CI->M_Kasir->list_transportasi_pasien($id_pelayanan);
    $data['data_lain'] = $CI->M_Kasir->list_lain_pasien($id_pelayanan);
    return $data;
}
function updateTglPulang_pendapatan($id_pelayanan)
{
    $CI = get_instance();
    $max = $CI->db->query("SELECT max(dp) dp from pendapatan_kasir where id_pelayanan = '$id_pelayanan'")->row()->dp;
    $db_pelayanan = $CI->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan])->row();
    $db = [
        'tgl_pulang' => $db_pelayanan->tgl_keluar,
    ];
    $CI->M_Kasir->update_tindakan($db, ['id_pelayanan' => $id_pelayanan, 'dp' => $max], 'pendapatan_kasir');
}
function pph21($sum_pkp)
{
    $CI = get_instance();

    $range_pph = $CI->db->get("list_range_pph")->result();
    foreach ($range_pph as $row) {
        if ($sum_pkp > $row->start && $sum_pkp <= $row->finish) {
            // $persen = $row->persen;

            if ($row->persen == 5) {
                $persen = $row->persen;
                $hasil = $sum_pkp;
            } else {
                $sum_pkp = $sum_pkp - $row->start;
                $pph = pph21($sum_pkp);
            }
        }
    }
    $out = [
        'hasil' => $hasil,
        'persen' => $persen
    ];
    return $out;
}
function jurnal_material($id_pelayanan)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('M_Kasir');
    $CI->load->model('M_Jurnal');
    $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_material_obat');
    $data_apotik = $CI->M_Kasir->list_apotik_pasien($id_pelayanan);

    if (count($data_apotik) > 0) {

        $db_jenis_jurnal = $CI->db->get_where('jenis_jurnal', ['nama_jurnal' => 'Biaya']);

        $db_cara_bayar = $CI->db->get_where('pelayanan', ['id_pelayanan' => $id_pelayanan]);
        $db_farmasi = $CI->M_Jurnal->akun_material($id_pelayanan);

        for ($i = 0; $i < count($db_farmasi); $i++) {
            if ($db_farmasi[$i]->jenis_pelayanan == "RAWAT INAP" || $db_farmasi[$i]->jenis_pelayanan == "RANAP") {
                $db_kelompok_jurnal = $CI->db->get_where('kelompok_jurnal', ['nama' => 'Rawat Inap']);
                $akun_apotik = [
                    'jenis' => 'pengeluaran',
                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => $db_farmasi[$i]->ruangan,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_farmasi[$i]->total,
                    'kode_akun' => $db_jenis_jurnal->row()->kode_coa . $db_kelompok_jurnal->row()->kode_coa . '.' . $db_farmasi[$i]->kode_ruang . '.' . $db_farmasi[$i]->kode_tindakan
                ];
                $CI->M_Kasir->insert_tindakan($akun_apotik, 'akun_material_obat');
            } else {
                $db_kelompok_jurnal = $CI->db->get_where('kelompok_jurnal', ['nama' => 'Rawat Jalan']);

                $akun_apotik = [
                    'jenis' => 'pengeluaran',
                    'id_pelayanan' => $id_pelayanan,
                    'id_poli' => $db_farmasi[$i]->ruangan,
                    'cara_bayar' => $db_cara_bayar->row()->cara_bayar,
                    'total_akun' => $db_farmasi[$i]->total,
                    'kode_akun' => $db_jenis_jurnal->row()->kode_coa . $db_kelompok_jurnal->row()->kode_coa . '.' . $db_farmasi[$i]->kode_ruang . '.' . $db_farmasi[$i]->kode_tindakan

                ];
                $CI->M_Kasir->insert_tindakan($akun_apotik, 'akun_material_obat');
            }
        }
    }
}
function jurnal_obat_bebas($id_pelayanan)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('M_Apotik');
    $CI->load->model('M_Jurnal');
    $staff = $CI->session->userdata('data_auth');

    // Call a function of the model


    $db_akun = $CI->db->get_where('akun_non_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

    $CI->db->delete('akun_non_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 0]);


    $obatBebas = $CI->M_Apotik->getObatBebasById($id_pelayanan);
    if (count($db_akun) == 0) {

        //////////////////////////////OBAT OPERASI ///////////////////////////////////////////////////////////////////////////////////

        if (count($obatBebas) > 0) {
            $pasien = $CI->db->get_where('obat_bebas', ['id_obat_bebas' => $id_pelayanan])->row_array();

            $akun_obat_bebas = $CI->M_Jurnal->akun_obat_bebas($id_pelayanan);
            for ($j = 0; $j < count($akun_obat_bebas); $j++) {
                if ($akun_obat_bebas[$j]->jenis == 'Rawat Jalan') {
                    $ppn_obat_bebas = [
                        'id_pelayanan' => $id_pelayanan,
                        'nama_pasien' => $pasien['nama'],
                        'id_poli' => 'OBAT BEBAS',
                        'cara_bayar' => $pasien['cara_bayar'],
                        'total_akun' => round(($akun_obat_bebas[$j]->total * 0.11), 0),
                        'harga_jasa' => 0,
                        'jenis_akun' => 'PPN OBAT',
                        'kode_akun' => '409.01.000',
                        'id_staff' => $staff->id_staff,
                        'tgl_masuk' => $pasien['tanggal'],
                    ];
                    $CI->M_Kasir->insert_tindakan($ppn_obat_bebas, 'akun_non_pelayanan');
                }
                $data_obat_bebas = [
                    'id_pelayanan' => $id_pelayanan,
                    'nama_pasien' => $pasien['nama'],
                    'id_poli' => 'OBAT BEBAS',
                    'cara_bayar' => $pasien['cara_bayar'],
                    'total_akun' => $akun_obat_bebas[$j]->total,
                    'harga_jasa' => 0,
                    'jenis_akun' => 'Pendapatan Farmasi ' . $akun_obat_bebas[$j]->jenis,
                    'kode_akun' =>  '704.' . $akun_obat_bebas[$j]->kode_coa,
                    'id_staff' => $staff->id_staff,
                    'tgl_masuk' => $pasien['tanggal'],
                ];
                $CI->M_Apotik->insert_tindakan($data_obat_bebas, 'akun_non_pelayanan');
            }
        }
    }
    //////////////////////////////DISKON ATAU REDUKSI //////////////////////////////////////////////////////////////////////////////////////////////////////

    $data_diskon = $CI->db->query("SELECT sum(diskon) diskon from pendapatan_kasir 
    where id_pelayanan='$id_pelayanan' 
    group by id_pelayanan
    having diskon >0")->result();

    if (count($data_diskon) > 0) {

        $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_reduksi');
        $check = $CI->db->get_where('akun_reduksi', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

        if (count($check) == 0) { //jika belum jurnal

            $kunjungan = $CI->db->query("SELECT * from (
            
            SELECT 'OBAT BEBAS' as jenis_pelayanan, p.unit as nama_poli, p.cara_bayar
            FROM obat_bebas p
            where p.id_obat_bebas = '$id_pelayanan'
            
            ) as g
            ")->row();


            if ($kunjungan->nama_poli == 'APOTIK') {
                $jenis_akun = 'Reduksi Pendapatan Farmasi Rawat Jalan';
                $coa = '724.01.000';
            } else {
                $jenis_akun = 'Reduksi Pendapatan Farmasi Rawat Inap';
                $coa = '724.02.000';
            }
            $lap = lap;
            $poli = $kunjungan->jenis_pelayanan;


            $akun_apelkes = [
                'id_staff' => $staff->id_staff,
                'id_pelayanan' => $id_pelayanan,
                'id_poli' => $poli,
                'lap' => $lap,
                'cara_bayar' => $kunjungan->cara_bayar,
                'total_akun' => $data_diskon[0]->diskon,
                'jenis_akun' => $jenis_akun,
                'kode_akun' => $coa
            ];


            $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
        }
    }
}
function jurnal_mcu($id_pelayanan)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('M_Apotik');
    $CI->load->model('M_Jurnal');
    $staff = $CI->session->userdata('data_auth');

    // Call a function of the model


    $db_akun = $CI->db->get_where('akun_non_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

    $CI->db->delete('akun_non_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 0]);

    $tindakan = $CI->M_Kasir->getTindakanMcuById($id_pelayanan);
    // $obat = $CI->M_Kasir->getObatMcuById($id_pelayanan);
    $labor = $CI->M_Kasir->list_labor_mcu($id_pelayanan);
    $radio = $CI->M_Kasir->list_radio_mcu($id_pelayanan);

    if (count($db_akun) == 0) {
        $pasien = $CI->db->get_where('mcu', ['id_mcu' => $id_pelayanan])->row_array();

        //////////////////////////////OBAT OPERASI ///////////////////////////////////////////////////////////////////////////////////

        if (count($tindakan) > 0) {
            $sum = array_sum(array_column($tindakan, 'total'));
            $datatindakan = [
                'id_pelayanan' => $id_pelayanan,
                'nama_pasien' => $pasien['nama_pasien'],
                'id_poli' => 'MCU',
                'cara_bayar' => $pasien['cara_bayar'],
                'total_akun' => $sum,
                'harga_jasa' => 0,
                'jenis_akun' => 'Pendapatan Tindakan Medical Check Up',
                'kode_akun' =>  '703.03.340',
                'id_staff' => $staff->id_staff,
                'tgl_masuk' => $pasien['tanggal'],
            ];
            $CI->M_Apotik->insert_tindakan($datatindakan, 'akun_non_pelayanan');
        }
        if (count($labor) > 0) {
            $sum = array_sum(array_column($labor, 'total'));


            $datatindakan = [
                'id_pelayanan' => $id_pelayanan,
                'nama_pasien' => $pasien['nama_pasien'],
                'id_poli' => 'MCU',
                'cara_bayar' => $pasien['cara_bayar'],
                'total_akun' => $sum,
                'harga_jasa' => 0,
                'jenis_akun' => 'Pendapatan Medical Check Up Laboratorium',
                'kode_akun' =>  '703.03.810',
                'id_staff' => $staff->id_staff,
                'tgl_masuk' => $pasien['tanggal'],
            ];
            $CI->M_Apotik->insert_tindakan($datatindakan, 'akun_non_pelayanan');
        }
        if (count($radio) > 0) {
            $sum = array_sum(array_column($radio, 'total'));


            $datatindakan = [
                'id_pelayanan' => $id_pelayanan,
                'nama_pasien' => $pasien['nama_pasien'],
                'id_poli' => 'MCU',
                'cara_bayar' => $pasien['cara_bayar'],
                'total_akun' => $sum,
                'harga_jasa' => 0,
                'jenis_akun' => 'Pendapatan Medical Check Up Radiodiagnostik',
                'kode_akun' =>  '703.03.720',
                'id_staff' => $staff->id_staff,
                'tgl_masuk' => $pasien['tanggal'],
            ];
            $CI->M_Apotik->insert_tindakan($datatindakan, 'akun_non_pelayanan');
        }
    }
    //////////////////////////////DISKON ATAU REDUKSI MCU //////////////////////////////////////////////////////////////////////////////////////////////////////

    $data_diskon = $CI->db->query("SELECT sum(diskon) diskon from detail_kasir_mcu 
    where id_pasien='$id_pelayanan' 
    group by id_pasien
    having diskon >0")->result();

    if (count($data_diskon) > 0) {

        $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_pelayanan, 'status' => 0], 'akun_reduksi');
        $check = $CI->db->get_where('akun_reduksi', ['id_pelayanan' => $id_pelayanan, 'status' => 1])->result();

        if (count($check) == 0) { //jika belum jurnal

            $kunjungan = $CI->db->query("SELECT * from (
            SELECT 'MCU' as jenis_pelayanan, 'MCU' as nama_poli, p.cara_bayar
            FROM mcu p
            where p.id_mcu = '$id_pelayanan'
            ) as g
            ")->row();


            $lap = lap;
            $poli = $kunjungan->jenis_pelayanan;
            $jenis_akun = 'Reduksi Pendapatan Medical Check Up';
            $coa = '723.03.340';


            $akun_apelkes = [
                'id_staff' => $staff->id_staff,
                'id_pelayanan' => $id_pelayanan,
                'id_poli' => $poli,
                'lap' => $lap,
                'cara_bayar' => $kunjungan->cara_bayar,
                'total_akun' => $data_diskon[0]->diskon,
                'jenis_akun' => $jenis_akun,
                'kode_akun' => $coa
            ];


            $CI->M_Kasir->insert_tindakan($akun_apelkes, 'akun_reduksi');
        }
    }
}
function jurnal_homecare($id_pelayanan)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('M_Apotik');
    $CI->load->model('M_Jurnal');
    $CI->load->model('M_Kasir');
    $staff = $CI->session->userdata('data_auth');

    // Call a function of the model


    $db_akun = $CI->db->get_where('akun_non_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 1, 'id_poli' => 'HOMECARE',])->result();

    $CI->db->delete('akun_non_pelayanan', ['id_pelayanan' => $id_pelayanan, 'status' => 0, 'id_poli' => 'HOMECARE',]);

    $tindakan = $CI->M_Kasir->getTindakanHcById($id_pelayanan);
    $obat = $CI->M_Jurnal->getObatHcById($id_pelayanan);

    if (count($db_akun) == 0) {
        $pasien = $CI->db->get_where('homecare', ['id_pasien' => $id_pelayanan])->row_array();

        //////////////////////////////TINDAKAN ///////////////////////////////////////////////////////////////////////////////////

        if (count($tindakan) > 0) {
            $sum = array_sum(array_column($tindakan, 'total'));
            $datatindakan = [
                'id_pelayanan' => $id_pelayanan,
                'nama_pasien' => $pasien['nama'],
                'id_poli' => 'HOMECARE',
                'cara_bayar' => $pasien['cara_bayar'],
                'total_akun' => $sum,
                'harga_jasa' => 0,
                'jenis_akun' => 'Pendapatan Tindakan Poli Home Care',
                'kode_akun' =>  '701.41.130',
                'id_staff' => $staff->id_staff,
                'tgl_masuk' => $pasien['tanggal'],
            ];
            $CI->M_Apotik->insert_tindakan($datatindakan, 'akun_non_pelayanan');
        }
        //////////////////////////////OBAT ///////////////////////////////////////////////////////////////////////////////////

        if (count($obat) > 0) {

            $sum = array_sum(array_column($obat, 'total'));
            foreach ($obat as $rows) {
                $datatindakan = [
                    'id_pelayanan' => $id_pelayanan,
                    'nama_pasien' => $pasien['nama'],
                    'id_poli' => 'HOMECARE',
                    'cara_bayar' => $pasien['cara_bayar'],
                    'total_akun' => $rows->total,
                    'harga_jasa' => 0,
                    'jenis_akun' => 'Pendapatan Poli Home Care Farmasi',
                    'kode_akun' =>  '701.41.' . $rows->kode_coa,
                    'id_staff' => $staff->id_staff,
                    'tgl_masuk' => $pasien['tanggal'],
                ];
                $CI->M_Apotik->insert_tindakan($datatindakan, 'akun_non_pelayanan');
            }


            $ppn_obat_bebas = [
                'id_pelayanan' => $id_pelayanan,
                'nama_pasien' => $pasien['nama'],
                'id_poli' => 'HOMECARE',
                'cara_bayar' => $pasien['cara_bayar'],
                'total_akun' => round(($sum * 0.11), 0),
                'harga_jasa' => 0,
                'jenis_akun' => 'PPN OBAT',
                'kode_akun' => '409.01.000',
                'id_staff' => $staff->id_staff,
                'tgl_masuk' => $pasien['tanggal'],
            ];
            $CI->M_Kasir->insert_tindakan($ppn_obat_bebas, 'akun_non_pelayanan');
        }
    }
}
function insert_pendapatan_non_pel($id_mcu, $tipe)
{
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('M_Kasir');
    $data_staff = $CI->session->userdata('data_auth');


    $id_pendapatan = uniqid();
    $totalbayarkasir = ($CI->input->post('opsi_bayar') != 'asuransi') ? $CI->input->post('totalbayar') : $CI->input->post('totalkeseluruhan');
    $totalkeseluruhan = $CI->input->post('totalkeseluruhan');
    $pendapatan = array(
        'id_pendapatan' => $id_pendapatan,
        'id_pelayanan' => $id_mcu,
        'total_pendapatan' => $totalkeseluruhan,
        'total_bayar' => $totalbayarkasir,
        'tgl_input' => date("Y-m-d H:i:s"),
        'diskon' =>  $CI->input->post('inDiskon'),
        'dp' => 0,
        'selisih' => 0,
        'keterangan' => $CI->input->post('opsi_bayar'),
        'tgl_pulang' => date("Y-m-d H:i:s"),
        'id_staff' => $data_staff->id_staff,
        'tipe' => $tipe
    );
    $data2 = array(
        'id_pendapatan_bank' => uniqid(),
        'id_pendapatan' => $id_pendapatan,
        'id_pelayanan' => $id_mcu,
        'total_pendapatan' => $totalbayarkasir,
        'jenis_pembayaran' => $CI->input->post('opsi_bayar'),
        'cara_bayar' => $CI->input->post('jenis_bank'),
        'tgl_input' => date("Y-m-d H:i:s"),
        'diskon' => 0,
        'dp' => 0,
        'keterangan' => "non-tunai",
        'tgl_pulang' => date("Y-m-d H:i:s"),
        'id_staff' => $data_staff->id_staff,
        'status' => ""
    );


    if ($CI->input->post('opsi_bayar') != 'asuransi') {
        $kasir_nol = $CI->db->get_where('pendapatan_kasir', ['id_pelayanan' => $id_mcu])->result();
        $bank_nol = $CI->db->get_where('pendapatan_bank', ['id_pelayanan' => $id_mcu, 'total_pendapatan' => 0])->result();

        // if ($totalbayarkasir == 0) { //total bayar = 0
        //     if ($totalkeseluruhan != 0) {
        //         if (count($kasir_nol) == 0) { //belum masuk pendapatan kasir 
        //             $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_resep], 'pendapatan_kasir');

        //             $CI->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
        //             if ($CI->input->post('opsi_bayar') != 'cash') { //bukan opsi cash

        //                 $CI->M_Kasir->insert_tindakan($data2, 'pendapatan_bank');
        //             }
        //         }
        //     }
        // } else {
        if ($totalkeseluruhan > 0) { //jika total keseluruhan besar dari 0

            // $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_mcu], 'pendapatan_kasir');
            // $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_mcu], 'pendapatan_bank');

            $CI->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
            if ($CI->input->post('opsi_bayar') != 'cash') {
                if (count($bank_nol) > 0) { //sudah masuk ke pendapatan bank dengan total bayar 0
                    $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_mcu, 'total_pendapatan' => 0], 'pendapatan_bank');
                }
                $CI->M_Kasir->insert_tindakan($data2, 'pendapatan_bank');
            }
        }
        // }
    } else if ($CI->input->post('opsi_bayar') == 'asuransi') {
        // $CI->M_Kasir->delete_tindakan(['id_pelayanan' => $id_mcu], 'pendapatan_kasir');

        // $db_asuransi = $CI->db->get_where('pendapatan_kasir', ['id_pelayanan' => $id_mcu, 'keterangan' => 'asuransi'])->result();
        // if (count($db_asuransi) > 0) {
        //     $pendapatan1 = array(
        //         'total_pendapatan' => $totalkeseluruhan,
        //         'total_bayar' => $totalbayarkasir,
        //         'diskon' => $CI->input->post('diskon'),
        //         'dp' => $CI->input->post('dp'),
        //         'selisih' => $CI->input->post('selisih'),
        //         'id_staff' => $data_staff->id_staff,
        //     );
        //     $CI->M_Kasir->update_tindakan($pendapatan1, ['id_pelayanan' => $id_mcu], 'pendapatan_kasir');
        // } else {
        //     $CI->M_Kasir->insert_tindakan($pendapatan, 'pendapatan_kasir');
        // }
    }
}
