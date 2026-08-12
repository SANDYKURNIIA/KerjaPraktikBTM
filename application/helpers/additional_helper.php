<?php
function get_token($username)
{
    $date = date('dmY');
    $p_token = $date . '--' . $username;
    $c_token = hash("ripemd320", $p_token);
    $c_token = hash("sha512", $c_token);
    $c_token = md5($c_token);
    return $c_token;
}
function counting_age1($birthDate)
{
    $date = new DateTime($birthDate);
    $now = new DateTime();
    $umur = $now->diff($date);
    $usia2 = $umur->y . " Tahun, " . $umur->m . " Bulan";
    return $usia2;
}

function counting_age2($birthDate)
{
    $date = new DateTime($birthDate);
    $now = new DateTime();
    $umur = $now->diff($date);
    $bulan = $umur->m;
    $hari = $umur->d;
    $tahun = $umur->y;
    $hasil = "";
    if ($bulan == 0 && $tahun == 0) {
        if ($hari <= 6) {
            $hasil =  "0-6 HARI";
        } else if ($hari <= 28 && $hari > 6) {
            $hasil = "7-28 HARI";
        }
    } else if ($tahun == 0 && $bulan > 0) {

        $hasil =  "28 HARI - < 1 Tahun";
    } else if ($tahun > 0 && $tahun < 5) {

        $hasil = "1-4 Tahun";
    } else if ($tahun > 4 && $tahun < 15) {

        $hasil =  "5-14 Tahun";
    } else if ($tahun > 14 && $tahun < 25) {

        $hasil = "15-24 Tahun";
    } else if ($tahun > 24 && $tahun < 45) {

        $hasil = "25-45 Tahun";
    } else if ($tahun > 44 && $tahun < 65) {

        $hasil =  "45-64 Tahun";
    } else if ($tahun >= 65) {

        $hasil = ">65 Tahun";
    } else {
        $hasil = "";
    }
    return $hasil;
}
function numtor($number)
{
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
function bulan($bln)
{

    if ($bln == 1) {
        $hasil =  "JANUARI";
    } else if ($bln == 2) {
        $hasil =  "FEBRUARI";
    } else if ($bln == 3) {
        $hasil =  "MARET";
    } else if ($bln == 4) {
        $hasil =  "APRIL";
    } else if ($bln == 5) {
        $hasil =  "MEI";
    } else if ($bln == 6) {
        $hasil =  "JUNI";
    } else if ($bln == 7) {
        $hasil =  "JULI";
    } else if ($bln == 8) {
        $hasil =  "AGUSTUS";
    } else if ($bln == 9) {
        $hasil =  "SEPTEMBER";
    } else if ($bln == 10) {
        $hasil =  "OKTOBER";
    } else if ($bln == 11) {
        $hasil =  "NOVEMBER";
    } else if ($bln == 12) {
        $hasil =  "DESEMBER";
    }
    return $hasil;
}
function bulan_kecil($bln)
{

    if ($bln == 1) {
        $hasil =  "Januari";
    } else if ($bln == 2) {
        $hasil =  "Februari";
    } else if ($bln == 3) {
        $hasil =  "Maret";
    } else if ($bln == 4) {
        $hasil =  "April";
    } else if ($bln == 5) {
        $hasil =  "Mei";
    } else if ($bln == 6) {
        $hasil =  "Juni";
    } else if ($bln == 7) {
        $hasil =  "Juli";
    } else if ($bln == 8) {
        $hasil =  "Agustus";
    } else if ($bln == 9) {
        $hasil =  "September";
    } else if ($bln == 10) {
        $hasil =  "Oktober";
    } else if ($bln == 11) {
        $hasil =  "November";
    } else if ($bln == 12) {
        $hasil =  "Desember";
    }
    return $hasil;
}
function Terbilang($nilai)
{
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai == 0) {
        return "";
    } elseif ($nilai < 0) {
        return Terbilang($nilai * -1);
    } elseif ($nilai < 12 & $nilai != 0) {
        return "" . $huruf[$nilai];
    } elseif ($nilai < 20) {
        return Terbilang($nilai - 10) . " Belas ";
    } elseif ($nilai < 100) {
        return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
    } elseif ($nilai < 200) {
        return " Seratus " . Terbilang($nilai - 100);
    } elseif ($nilai < 1000) {
        return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
    } elseif ($nilai < 2000) {
        return " Seribu " . Terbilang($nilai - 1000);
    } elseif ($nilai < 1000000) {
        return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
    } elseif ($nilai < 1000000000) {
        return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
    } elseif ($nilai < 1000000000000) {
        return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
    } elseif ($nilai < 100000000000000) {
        return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
    } elseif ($nilai <= 100000000000000) {
        return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
    }
}
function getAge($date)
{
    $bday = new Datetime($date);
    $today = new Datetime();
    return $today->diff($bday)->format('%y') . " Tahun";
}

function hari_ini($tgl)
{
    $hari = date("D", strtotime($tgl));

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return  $hari_ini;
}

function update_biaya($no_rm, $cara_bayar, $dpjp, $tipe_masuk, $poli)
{
    $CI = get_instance();
    $CI->load->model('M_Pasien');
    $pasien1 = $CI->M_Pasien->get_pasien_baru($no_rm)->result();
    $dokter = $CI->db->get_where('dokter', ['id_dokter' => $dpjp])->row();
    $db_cara_bayar = $CI->db->get_where('cara_bayar', ['id_cara_bayar' => $cara_bayar])->row();

    if (count($pasien1) > 0) {
        $status = 'baru';
    } else {
        $status = 'lama';
    }
    if ($cara_bayar == '30') { //bpjs
        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }
        if ($poli == '6E975PL694') {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else {
            $biaya_jasa = $dokter->jasmed_pp_pagi;
            $biaya_rs = $dokter->rs_pp_pagi;
        }
    } else if ($cara_bayar == '31' || $cara_bayar == '31A' || $cara_bayar == '31B' || $cara_bayar == 'b5' || $cara_bayar == 'a722' || $cara_bayar == 'a723' || $cara_bayar == 'a724') { // inhealth, bpjs-inhealth
        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }
        if ($poli == '6E975PL694') {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else if ($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG') {
            $biaya_jasa = 90000;
            $biaya_rs = 32000;
        } else {
            $biaya_jasa = 170000;
            $biaya_rs = 32000;
        }
    } else if ($cara_bayar == '42') { //pp
        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }

        if ($tipe_masuk == '4') {
            if ($dokter->dokter_spes == 'GIG' || $dokter->dokter_spes == 'UMU') {
                $biaya_jasa = 90000;
                $biaya_rs = $dokter->rs_pp_pagi;
            } else {
                if ($poli == '6E975PL694') {
                    $biaya_jasa = 0;
                } else {
                    $biaya_jasa = 200000;
                    // $biaya_jasa = 170000;
                }
                if (($poli == '6E975PL694')) {
                    $biaya_rs = 0;
                } else {
                    $biaya_rs = 32000;
                    // $biaya_rs = 0;
                }
            }
            // $biaya_jasa = $dokter->jasmed_pp_pagi;
            // $biaya_rs = $dokter->rs_pp_pagi;
        } else {
            $biaya_jasa = $dokter->jasmed_pp_pagi;
            $biaya_rs = $dokter->rs_pp_pagi;
        }
    } else if ($cara_bayar == 'YKKBI' || $cara_bayar == '166') { //YKKBI, bank indonesia
        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }

        if (($poli == '146582' || $poli == '15487956' || $poli == '6E975PL694')) {
            $biaya_jasa = 0;
        } else if ($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG') {
            $biaya_jasa = 90000;
        } else {
            if ($tipe_masuk == '4') {
                $biaya_jasa = 200000;
            } else {
                $biaya_jasa = $dokter->jasmed_asuransi_pagi;
            }
        }
        if (($poli == '6E975PL694')) {
            $biaya_rs = 0;
        } else {
            $biaya_rs = 32000;
        }
    } else if ($cara_bayar == '3331') { //timah prioritas

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 10000;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '146582' || $poli == '15487956' || $poli == '6E975PL694')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else if (($dokter->dokter_spes == 'GIG' || $dokter->dokter_spes == 'UMU')) {
            $biaya_jasa = 90000;
            $biaya_rs = $dokter->rs_timah_pagi;
        } else {
            $biaya_jasa = $dokter->jasmed_timah_pagi;
            $biaya_rs = $dokter->rs_timah_pagi;
        }
    } else if ($cara_bayar == '6' || $cara_bayar == '99' || $cara_bayar == '674A' || $cara_bayar == '4' || $cara_bayar == 'ASABRI') { //yakes telkom, bpjstk, btm

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '146582' || $poli == '15487956' || $poli == '6E975PL694')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else if (($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG')) {
            $biaya_jasa = 90000;
            $biaya_rs = 32000;
        } else {
            $biaya_jasa = 120000;
            $biaya_rs = $dokter->rs_timah_pagi;
        }
    } else if ($cara_bayar == '333') { //timah reguler

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 10000;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '146582' || $poli == '15487956' || $poli == '6E975PL694')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else if (($dokter->dokter_spes == 'GIG' || $dokter->dokter_spes == 'UMU')) {
            $biaya_jasa = 90000;
            $biaya_rs = $dokter->rs_timah_pagi;
        } else {
            $biaya_jasa = 120000;
            $biaya_rs = $dokter->rs_timah_pagi;
        }
    } else if (($cara_bayar == '15' || $cara_bayar == 'b1') && $tipe_masuk == '4') { //bri life prioritas

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '6E975PL694')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else if (($dokter->dokter_spes == 'GIG')) {
            $biaya_jasa = 90000;
            $biaya_rs = $dokter->rs_timah_pagi;
        } else {
            if ($dokter->dokter_spes == 'UMU') {
                $biaya_jasa = 50000;
            } else {
                $biaya_jasa = 150000;
            }
            $biaya_rs = $dokter->rs_timah_pagi;
        }
    } else if (($cara_bayar == 'PTDAK') && $tipe_masuk == '4') { //ptdak prio

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 16000;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '6E975PL694' || $poli == '146582')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else {
            if ($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG') {
                $biaya_jasa = 90000;
            } else {
                $biaya_jasa = 200000;
                $biaya_rs = 32000;
            }
        }
    } else if (($cara_bayar == 'b1' || $cara_bayar == '8' || $cara_bayar == 'P43' || $cara_bayar == 'a720') && $tipe_masuk != '4') { //bpjs - timah 

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 10000;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '6E975PL694' || $poli == '146582')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else {
            if ($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG') {
                $biaya_jasa = 90000;
            } else {
                $biaya_jasa = 120000;
            }
            $biaya_rs = $dokter->rs_timah_pagi;
        }
    } else if (preg_match('/PLN/i', $db_cara_bayar->nama) && $tipe_masuk == '4') { //PLN prioritas
        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            $biaya_admin = 0;
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '6E975PL694')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else {
            if (($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG') && $tipe_masuk == '4') {
                $biaya_jasa = 90000;
            } else {
                $biaya_jasa = 170000;
            }
            $biaya_rs = 0;
        }
    } else {

        if ($status == 'baru' && ($poli != '146582' && $poli != '15487956')) {
            if (preg_match('/PLN/i', $db_cara_bayar->nama)) {
                $biaya_admin = 0;
            } else {
                $biaya_admin = 16000;
            }
        } else {
            $biaya_admin = 0;
        }
        if (($poli == '6E975PL694')) {
            $biaya_jasa = 0;
            $biaya_rs = 0;
        } else {
            if ($tipe_masuk == '4') {
                if ((($dokter->dokter_spes == 'UMU' || $dokter->dokter_spes == 'GIG'))) {
                    $biaya_rs = 32000;
                    $biaya_jasa = $dokter->jasmed_asuransi_pagi;
                } else {
                    $biaya_rs = 32000;
                    $biaya_jasa = 200000;
                }
            } else {
                if (preg_match('/PLN/i', $db_cara_bayar->nama)) {
                    $biaya_rs = 0;
                } else {
                    $biaya_rs = $dokter->rs_asuransi_pagi;
                }

                $biaya_jasa = $dokter->jasmed_asuransi_pagi;
            }
        }
    }

    $out = [
        'biaya_admin' => $biaya_admin,
        'biaya_jasa' => $biaya_jasa,
        'biaya_rs' => $biaya_rs,
    ];
    return $out;
}
