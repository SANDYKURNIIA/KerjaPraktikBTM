<?php

class M_Kasir extends CI_Model
{
    public function selectStaff()
    {
        $this->db->select('id_staff, nama');
        $this->db->where('tipe', 'kasir');
        $this->db->where('nama !=', 'kasir');
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('staff')->result();
    }
    public function selectPasienRanap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.alamat,p.no_ktp,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok');
        $this->db->where('p.no_rm=b.id_pasien');
        $this->db->where('h.id_pelayanan=b.id_pelayanan');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('r.id_ruangan=h.id_kamar');
        $this->db->where('h.dpjp=dok.id_dokter');
        // $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where("h.status=1 and b.status =1");
        $this->db->where("(b.status_rawat='dirawat' or b.status_rawat = 'dikembalikan')");
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }
    public function selectPasienRanapById($id_pelayanan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select(' b.id_pelayanan,h.id_history,c.id_cara_bayar,h.id_kamar,h.dpjp, b.tgl_masuk, p.no_rm, p.nama,p.jenis_kelamin,p.tgl_lahir,h.jenis_pelayanan, dok.nama nama_dokter ,b.no_sep,b.diagnosa,c.nama cara_bayar,r.tipe poli');
        $this->db->from('pasien p, pelayanan b, history_pelayanan_ranap h, cara_bayar c,  ruangan r, dokter dok');
        $this->db->where('p.no_rm=b.id_pasien');
        $this->db->where('h.id_pelayanan=b.id_pelayanan');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('r.id_ruangan=h.id_kamar');
        $this->db->where('h.dpjp=dok.id_dokter');
        // $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where('h.status', '1');
        $this->db->where('h.tgl_keluar', NULL);
        $this->db->where('b.id_pelayanan', $id_pelayanan);
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }

    public function selectPasienRajal()
    {
        $query = $this->db->query("SELECT v.*
        FROM v_pasien_rajal_kasir v
        where  v.jenis_pelayanan != 'UGD' 
        and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
        return $query->result();
    }
    public function selectPasienRajal1($poli)
    {
        if ($poli == 'INTERNIS') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='INTERN' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'OBGYNE') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='OBGYN' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'THT') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='THT-KL' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'MATA') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='MATA' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'KULIT DAN KELAMIN') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='KULIT' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'UMUM') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='UMUM' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'ANAK') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='ANAK' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)
            UNION ALL
            SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='KESEHATAN IBU ANAK (KIA)' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'GIGI') {
            $query = $this->db->query(
                "SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='GIGI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)
            UNION ALL
            SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='POLI ORTHODONTI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)"
            );
            return $query->result();
        }
        if ($poli == 'JANTUNG') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='JANTUNG' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'BEDAH') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='BEDAH' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'FISIO') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='FISIO' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'AKUPUNTUR MEDIK') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='AKUPUNTUR MEDIK' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'GIGI BEDAH MULUT') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='GIGI BEDAH MULUT' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'JIWA') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='JIWA' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'ORTHOPEDI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='ORTHOPEDI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'PARU') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='PARU' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'SARAF') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='SARAF' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'UROLOGI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='UROLOGI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'CONTROL REHABILITAS MEDIC') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='REHABILITAS MEDIC' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'LABOR') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='LABOR' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'RADIOLOGI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='RADIOLOGI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'ANASTESI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='ANASTESI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'GINJAL') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='GINJAL' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'PENYAKIT MULUT') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='PENYAKIT MULUT' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'HEMODIALISA') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='HEMODIALISA' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'TERAPI WICARA') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='TERAPI WICARA' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'POLI PSIKOLOG') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='PSIKOLOG' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'POLI KEMOTERAPI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='KEMOTERAPI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'POLI STIFIN') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='STIFIN' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'POLI GIZI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='GIZI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'POLI KONSERVASI GIGI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='POLI KONSERVASI GIGI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
        if ($poli == 'OKUPASI') {
            $query = $this->db->query("SELECT v.*
            FROM v_pasien_rajal_kasir v
            where  (v.jenis_pelayanan = 'POLI' OR v.jenis_pelayanan = 'POLI PRIORITAS')
            and v.poli='OKUPASI' and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
            return $query->result();
        }
    }
    public function selectPasienRajalUgd()
    {
        $query = $this->db->query("SELECT v.*
        FROM v_pasien_rajal_kasir v
        where  v.jenis_pelayanan like '%UGD%'
         and v.id_pelayanan not in (select id_pelayanan from history_pelayanan_ranap where status = 1)");
        return $query->result();
    }

    public function selectPasienPulang()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->like('tgl_keluar', $tgl);
        $this->db->limit(6000);
        return $this->db->get('v_pasien_pulang_rawat_inap')->result();
    }

    public function selectRangePasienPulang($mulai, $akhir)
    {
        $this->db->where('tgl_keluar >=', $mulai);
        $this->db->where('tgl_keluar <=', $akhir);
        $this->db->limit(6000);
        return $this->db->get('v_pasien_pulang_rawat_inap')->result();
    }

    public function selectPasienPulangPoli()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->like('tgl_keluar', $tgl);
        $this->db->limit(6000);
        return $this->db->get('v_pasien_pulang_poli')->result();
    }

    public function selectRangePasienPulangPoli($mulai, $akhir)
    {
        $this->db->where('tgl_keluar >=', $mulai);
        $this->db->where('tgl_keluar <=', $akhir);
        $this->db->limit(12000);
        return $this->db->get('v_pasien_pulang_poli')->result();
    }

    public function selectPasienPulangUGD()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->like('tgl_keluar', $tgl);
        $this->db->limit(6000);
        return $this->db->get('v_pasien_pulang_ugd')->result();
    }

    public function selectRangePasienPulangUGD($mulai, $akhir)
    {
        $this->db->where('tgl_keluar >=', $mulai);
        $this->db->where('tgl_keluar <=', $akhir);
        $this->db->limit(6000);
        return $this->db->get('v_pasien_pulang_ugd')->result();
    }

    public function selectPelayananTambahan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('pelayanan_tambahan p');
        $this->db->like('p.tgl', $tgl);
        $this->db->order_by('p.tgl desc');
        return $this->db->get()->result();
    }

    public function selectRangePelayananTambahan($mulai, $akhir)
    {
        $this->db->select('*');
        $this->db->from('pelayanan_tambahan p');
        $this->db->where('tgl >=', $mulai);
        $this->db->where('tgl <=', $akhir);
        $this->db->order_by('p.tgl desc');
        return $this->db->get()->result();
    }
    public function selectListPelayanan($id)
    {
        $this->db->select('l.nama, t.*');
        $this->db->from('pelayanan_tambahan p, tindakan_umum t, list_tindakan_umum l');
        $this->db->where(' p.id_pelayanan_umum=t.id_pelayanan');
        $this->db->where(' l.id_list_tindakan=t.id_list_tindakan');
        $this->db->where(' p.id_pelayanan_umum', $id);
        return $this->db->get()->result();
    }
    public function getDataPasienPulang($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_pasien_pulang_rawat_inap')->row_array();
    }
    public function getDataPasienPulangPoli($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_pasien_pulang_poli')->row_array();
    }
    public function getDataPasienPulangIGD($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_pasien_pulang_ugd')->row_array();
    }
    public function getDataPasienRajal($id_pelayanan, $id_history)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        $this->db->where('id_history', $id_history);
        return $this->db->get('v_pasien_rajal_kasir')->row_array();
    }
    public function getDataPasienRanap($id_pelayanan, $id_history)
    {
        $this->db->select('pa.nama nama,pa.no_rm,c.nama  cara_bayar,a.nama asal,d.nama nama_dokter, p.tgl_masuk, p.tgl_keluar,h.dpjp,h.id_kamar,h.tgl_masuk masuk_ranap,c.id_cara_bayar');
        $this->db->from('pasien pa, pelayanan p, dokter d,cara_bayar c,   asal_pasien  a, history_pelayanan_ranap h');
        $this->db->where('p.id_pasien=pa.no_rm');
        $this->db->where('p.asal_pasien=a.id_asal_pasien');
        $this->db->where('p.cara_bayar=c.id_cara_bayar');
        $this->db->where('h.id_pelayanan=p.id_pelayanan');
        $this->db->where('h.dpjp=d.id_dokter');
        $this->db->where('p.id_pelayanan', $id_pelayanan);
        $this->db->where('h.id_history', $id_history);
        // $this->db->order_by('h.tgl_masuk desc');
        return $this->db->get()->row_array();
    }
    public function getDataPasienRanapIGD($id_pelayanan)
    {
        $this->db->select('d.nama nama_dokter');
        $this->db->from('history_pelayanan_ugd h, dokter d');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.id_pelayanan', $id_pelayanan);
        // $this->db->where('id_history', $id_history);
        return $this->db->get();
        // $this->db->where('id_pelayanan', $id_pelayanan);
        // // $this->db->where('id_history', $id_history);
        // return $this->db->get('v_pasien_rajal_kasir');
    }
    public function getDataPasienRanapPoli($id_pelayanan)
    {
        $this->db->select('d.nama dokter');
        $this->db->from('history_pelayanan h, dokter d');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.id_pelayanan', $id_pelayanan);
        // $this->db->where('id_history', $id_history);
        return $this->db->get();
    }

    //////MCU\\\\\\
    ///////////////
    public function selectPasienMcu()
    {
        $query = $this->db->query("SELECT m.*, r.status
        FROM mcu m, req_kasir_mcu r
        WHERE m.id_mcu = r.id_mcu
        AND r.status = 1
        AND m.status_bayar = 0
        AND m.status_rawat = 0
        ORDER BY m.tanggal DESC");
        return $query->result();
    }
    public function getMcuById($id_mcu)
    {
        $this->db->select('*');
        $this->db->from('mcu');
        $this->db->where('id_mcu', $id_mcu);
        return $this->db->get()->row_array();
    }
    public function selectPasienPulangMcu()
    {
        $tgl = date("Y-m-d");
        // $query =$this->db->query("SELECT m.*, r.status
        // FROM mcu m, req_kasir_mcu r
        // WHERE m.id_mcu = r.id_mcu
        // AND r.status = 1
        // AND m.status_bayar = 1
        // AND m.status_rawat = 1
        // ORDER BY m.tanggal DESC
        // AND tgl_keluar LIKE '$tgl'");
        // return $query->result();
        $this->db->select('m.*,r.status,d.tgl_keluar');
        $this->db->from('mcu m, req_kasir_mcu r,detail_kasir_mcu d');
        $this->db->where('m.id_mcu = r.id_mcu');
        $this->db->where('d.id_pasien = r.id_mcu');
        $this->db->where('m.id_mcu = d.id_pasien');
        $this->db->where('r.status=', 1);
        $this->db->where('m.status_bayar', 1);
        $this->db->like('m.tgl_keluar', $tgl);
        $this->db->order_by('m.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectRangePasienPulangMcu($mulai, $akhir)
    {
        $query = $this->db->query("SELECT m.*,r.status,d.tgl_keluar
        FROM mcu m, req_kasir_mcu r, detail_kasir_mcu d
        WHERE m.status_bayar=1
        AND r.status =1
        AND m.id_mcu=r.id_mcu
        AND d.id_pasien=r.id_mcu
        AND m.id_mcu=d.id_pasien
        AND (DATE(m.tgl_keluar) BETWEEN '$mulai' and '$akhir')
        ORDER BY m.tanggal DESC");
        return $query->result();
    }
    public function getDpDiscMcu($id_pelayanan)
    {
        $this->db->select('diskon, total_harga, status');
        $this->db->where('id_pasien', $id_pelayanan);
        return $this->db->get('detail_kasir_mcu')->result();
    }
    public function getTindakanMcuById($id_mcu)
    {
        $query = $this->db->query("SELECT l.nama, t.total, t.frek , t.harga
        FROM tindakan_mcu t, list_tindakan_mcu l
        WHERE t.id_list_tindakan=l.id_list_tindakan_mcu 
        AND t.id_mcu='$id_mcu'");
        return $query->result_array();
    }
    public function getObatMcuById($id_mcu)
    {
        $query = $this->db->query("SELECT l.nama, t.total, t.frek , t.harga
        FROM tindakan_farmasi t, list_logistik l
        WHERE t.id_list_tindakan=l.id_logistik
        AND t.id_pelayanan='$id_mcu'");
        return $query->result_array();
    }
    public function list_labor_mcu($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_labor_mcu t, list_tindakan_labor l, mcu p 
        WHERE t.id_daftar_tindakan=l.id_daftar_tindakan and p.id_mcu=t.id_mcu  and t.id_mcu='$idPelayanan'
        group by t.id_daftar_tindakan ");
        return $query->result_array();
    }
    public function list_radio_mcu($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama 
        from tindakan_radiologi_mcu t, list_tindakan_radiologi l, mcu p 
        WHERE t.id_daftar_tindakan=l.id_daftar_tindakan and p.id_mcu=t.id_mcu  and t.id_mcu='$idPelayanan' 
        group by t.id_daftar_tindakan");
        return $query->result_array();
    }
    //////////////////
    /////HOMECARE//////////////

    public function getKamarJenazah($id_mcu)
    {
        $this->db->select('*');
        $this->db->from('kamar_jenazah');
        $this->db->where('id_pasien', $id_mcu);
        $this->db->order_by('nama_pasien');
        return $this->db->get()->row_array();
    }

    public function selectKamarJenazah()
    {
        $query = $this->db->query("SELECT m.*
        FROM kamar_jenazah m
        where m.status = 0
        ORDER BY m.tanggal DESC");
        return $query->result();
    }

    public function getTindakanKjById($id_mcu)
    {
        $query = $this->db->query("SELECT l.nama_tindakan, t.total, t.frek , t.harga
        FROM tindakan_kamar_jenazah t, list_tindakan_jenazah l
        WHERE t.id_list_tindakan=l.id_list_tindakan
        AND t.id_pasien='$id_mcu'");
        return $query->result_array();
    }
    public function getObatKjById($id_mcu)
    {
        $query = $this->db->query("SELECT l.nama, t.total, t.frek , t.harga
        FROM tindakan_farmasi t, list_logistik l
        WHERE t.id_list_tindakan=l.id_logistik and t.frek != 0
        AND t.id_pelayanan='$id_mcu'");
        return $query->result_array();
    }

    public function selectPasienHc()
    {
        $query = $this->db->query("SELECT m.*, r.status, c.nama carabayar
        FROM homecare m, req_kasir_homecare r, cara_bayar c
        WHERE m.id_pasien = r.id_pasien and c.id_cara_bayar=m.cara_bayar
        AND r.status = 1
        AND m.status_bayar = 0
        AND m.status_rawat = 0
        ORDER BY m.tanggal DESC");
        return $query->result();
    }
    public function getHcById($id_mcu)
    {
        $this->db->select('t.*,c.nama cara_bayar');
        $this->db->from('homecare t');
        $this->db->join('cara_bayar c','c.id_cara_bayar=t.cara_bayar');
        $this->db->where('id_pasien', $id_mcu);
        return $this->db->get()->row_array();
    }
    public function getDpDiscHc($id_pelayanan)
    {
        $this->db->select('diskon, total_harga, status');
        $this->db->where('id_pasien', $id_pelayanan);
        return $this->db->get('detail_kasir_homecare')->result();
    }
    public function getTindakanHcById($id_mcu)
    {
        $query = $this->db->query("SELECT l.nama_tindakan, t.total, t.frek , t.harga
        FROM tindakan_homecare t, list_tindakan_homecare l
        WHERE t.id_list_tindakan=l.id_list_tindakan
        AND t.id_pasien='$id_mcu'");
        return $query->result_array();
    }
    public function getObatHcById($id_mcu)
    {
        $query = $this->db->query("SELECT l.nama, t.total, t.frek , t.harga
        FROM tindakan_farmasi t, list_logistik l
        WHERE t.id_list_tindakan=l.id_logistik and t.frek != 0
        AND t.id_pelayanan='$id_mcu'");
        return $query->result_array();
    }
    public function selectPasienPulangHc($mulai, $akhir)
    {
       
        $this->db->select('m.*,r.status,d.tgl_keluar, c.nama cara_bayar');
        $this->db->from('homecare m');
        $this->db->join('req_kasir_homecare r','m.id_pasien = r.id_pasien');
        $this->db->join('detail_kasir_homecare d','m.id_pasien = d.id_pasien');
        $this->db->join('cara_bayar c','m.cara_bayar = c.id_cara_bayar');
        $this->db->where('r.status=', 1);
        $this->db->where('m.status_bayar', 1);
        $this->db->where('m.status_rawat', 1);
        $this->db->where("(date(d.tgl_keluar) between '$mulai' and '$akhir')");
        $this->db->group_by('m.id_pasien');
        $this->db->order_by('m.tanggal desc');
        return $this->db->get()->result();
    }
    public function selectRangePasienPulangHc($mulai, $akhir)
    {
        $query = $this->db->query("SELECT m.*,r.status,d.tgl_keluar
        FROM mcu m, req_kasir_mcu r, detail_kasir_mcu d
        WHERE m.status_bayar=1
        AND m.status_rawat = 1
        AND r.status =1
        AND m.id_mcu=r.id_mcu
        AND d.id_mcu=r.id_mcu
        AND m.id_mcu=d.id_mcu
        AND d.tgl_keluar >= '$mulai'
        AND d.tgl_keluar <= '$akhir'
        ORDER BY m.tanggal DESC");
        return $query->result();
    }
    //////////////////////////////////////////////

    public function list_pelayanan_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (biaya_rs) total, biaya_admin, tipe nama
        from pelayanan p  
        WHERE id_pelayanan='$id_pelayanan'");
        return $query->row_array();
    }
    public function list_jasa_history($id_pelayanan)
    {
        // $num = $this->db->query("SELECT count(id_history) num from history_pelayanan where status=1 and id_pelayanan='$id_pelayanan'")->row()->num;
        // if ($num > 0) {
        //     $num = $num - 1;
        // } else {
        //     $num = 0;
        // }
        $data = $this->db->query("SELECT h.biaya_jasa,l.nama_panjang poli,h.tgl_masuk,d.nama
                from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
                WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and h.id_pelayanan='$id_pelayanan' and h.status = 1
                union all
                SELECT h.biaya_jasa,'IGD' poli,h.tgl_masuk,d.nama
                from pelayanan p, history_pelayanan_ugd h,dokter d 
                WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.id_pelayanan='$id_pelayanan' and h.status = 1
                
                order by tgl_masuk desc
                -- limit $/num
           ")->result_array();
        return $data;
    }
    public function list_apotik_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total, sum(frek) frek, nama, jenis_resep, id_logistik,depo from(
            SELECT t.total total, t.frek frek, l.nama , r.jenis_resep, l.id_logistik,r. depo
            from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r 
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.jenis_resep!=3 and t.id_pelayanan='$id_pelayanan' 
            and frek != 0
            UNION ALL
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik ,'' as depo
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG' or t.id_resep ='obat farmasi' or t.id_resep = 'obat retur') and  t.id_pelayanan='$id_pelayanan' 
            and frek != 0
        ) as gabung 
        group by id_logistik having frek != 0;");
        return $query->result_array();
    }
    public function list_apotik_ruangan($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (total) total, (frek) frek, nama, jenis_resep, id_logistik,DATE(tanggal) tanggal from(
            SELECT t.total total, t.frek frek, l.nama , t.id_resep jenis_resep, l.id_logistik,t.tanggal 
            from tindakan_farmasi t, list_logistik l, pelayanan p
            WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and ( t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG') and  t.id_pelayanan='$id_pelayanan' 
            and (t.jenis_pelayanan = 'POLI')
        ) as gabung 
        where frek != 0");
        return $query->result_array();
    }
    public function list_operasi_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_igd_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_labor_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and t.id_form_labor = f.id_form_labor and p.id_pelayanan = f.id_pelayanan and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) and f.status != 99
        group by t.id_list_tindakan 
        
        ");
        return $query->result_array();
    }
    public function list_radio_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama 
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        group by t.id_tindakan");
        return $query->result_array();
    }
    public function list_anak_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_apelkes_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_internis_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_bedah_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_fisio_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_gigi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_konservasi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_konservasi_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_jantung_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_kulit_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_mata_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_obgyne_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_ok_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' 
        group by t.id_tindakan
       
         ");
        return $query->result_array();
    }
    public function list_tht_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_umum_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_akupuntur_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_bedah_mulut_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_kesjiwa_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_orthopedi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_paru_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_hemodialisa_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_saraf_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_urologi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_ginjal_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_penyakit_mulut_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_rehab_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_terapi_bicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_psikolog($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_kemo_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_transportasi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama 
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        group by t.id_list_tindakan");
        return $query->result_array();
    }
    public function list_kia_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama 
        from tindakan_poli t, list_tindakan_poli_kia l, pelayanan p 
        WHERE t.id_poli ='KASE14' and l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan");
        return $query->result_array();
    }
    public function list_stifin_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_okupasi_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama, if((d.nama!='-'),d.nama,'') dokter 
        from tindakan_okupasi t, list_tindakan_okupasi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        group by t.id_list_tindakan ");
        return $query->result_array();
    }
    public function list_lain_pasien($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(t.total) total, sum(t.frek) frek, l.nama 
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        group by t.id_list_tindakan");
        return $query->result_array();
    }
    public function list_tindakan_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total, sum(frek) frek, nama_tindakan nama, if((nama_dokter!='-'),nama_dokter,'') dokter , nama_poli
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan' and status_pembayaran !='tidak'
        group by id_list_tindakan,id_poli
        order by nama_poli");
        return $query->result_array();
    }
    public function total_apotik($id_pelayanan)
    {
        // $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        // from tindakan_farmasi t, list_logistik l, pelayanan p
        // WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$id_pelayanan' 
        // and frek != 0
        // ");
        // return $query->row_array();

        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total FROM (
        SELECT t.total total 
        from tindakan_farmasi t, list_logistik l, pelayanan p, resep_obat r  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and r.id_resep = t.id_resep and r.id_pelayanan='$id_pelayanan' and r.jenis_resep!=3 and t.frek !=0
        UNION ALL
        SELECT t.total total 
        from tindakan_farmasi t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan  and (t.id_resep ='OBAT RUANGAN' or t.id_resep ='OBAT RUANG' or t.id_resep ='obat farmasi' or t.id_resep = 'obat retur')
        and t.frek !=0
         and t.id_pelayanan='$id_pelayanan'
        ) AS gabung");
        return $query->row_array();
    }

    public function total_operasi($id_pelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$id_pelayanan'");
        return $query->row_array();
    }
    public function total_igd($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_labor($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_labor t, list_tindakan_labor l, pelayanan p , form_labor f 
        WHERE t.id_list_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and t.id_form_labor = f.id_form_labor and (f.status_pembayaran !='tidak' or f.status_pembayaran is null) and f.status != 99
        ");
        return $query->row_array();
    }
    public function total_radio($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p 
        WHERE t.id_tindakan=l.id_daftar_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        ");
        return $query->row_array();
    }

    public function total_apelkes($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ok($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total from (
        SELECT t.total 
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' 
        union all
        SELECT  t.total
        from tindakan_ok t, pelayanan p  
        WHERE p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and t.tipe_tindakan is not null
        ) as gabung 
       

       ");
        return $query->row_array();
    }
    public function total_anak($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_poli_anak t, list_tindakan_poli_anak l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_internis($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_internis t, list_tindakan_poli_internis l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_bedah t, list_tindakan_poli_bedah_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_fisio($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gigi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_gigi t, list_tindakan_poli_gigi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_jantung($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_jantung t, list_tindakan_poli_jantung l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kulit($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kulit t, list_tindakan_poli_kulit l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_mata($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_mata t, list_tindakan_poli_mata l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_obgyne($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_obgyne t, list_tindakan_poli_obgyne l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }

    public function total_tht($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_tht t, list_tindakan_poli_tht l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_umum($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_umum t, list_tindakan_poli_umum l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_akupuntur($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_akupuntur t, list_tindakan_poli_akupuntur l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_bedah_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_bedah_mulut t, list_tindakan_poli_bedah_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kesjiwa($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kes_jiwa t, list_tindakan_poli_kes_jiwa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_orthopedi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_orthopedi t, list_tindakan_poli_orthopedi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_paru($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_paru t, list_tindakan_poli_paru l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_hemodialisa($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_hemodialisa t, list_tindakan_poli_hemodialisa l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_saraf($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_saraf t, list_tindakan_poli_saraf l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_urologi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_urologi t, list_tindakan_poli_urologi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_ginjal($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_ginjal t, list_tindakan_poli_ginjal l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_penyakit_mulut($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_penyakit_mulut t, list_tindakan_poli_penyakit_mulut l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_rehab($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_rehab t, list_tindakan_poli_rehab l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_gizi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_gizi t, list_tindakan_poli_gizi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_terapi_wicara($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_terapi_bicara t, list_tindakan_poli_terapi_bicara l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_psikolog($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_psikolog t, list_tindakan_poli_psikolog l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kemoterapi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kemoterapi t, list_tindakan_poli_kemoterapi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_stifin($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_stifin t, list_tindakan_poli_stifin l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_okupasi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_okupasi t, list_tindakan_okupasi l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_list_tindakan and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_kia($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli_kia t, list_tindakan_poli_kia l, pelayanan p 
        WHERE l.id_list_tindakan = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_transportasi($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_pelayanan_tambahan t, list_tindakan_apelkes l, pelayanan p 
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        ");
        return $query->row_array();
    }

    public function total_poli($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        ");
        return $query->row_array();
    }
    public function total_pelayanan($idPelayanan)
    {
        $query =  $this->db->query("SELECT sum(total) total from(
        SELECT IFNULL(sum(total) ,0) total
        from tindakan_poli
        WHERE id_pelayanan='$idPelayanan'
        UNION ALL
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_obat_ok t, list_logistik l, pelayanan p  
        WHERE t.id_list_tindakan=l.id_logistik and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        UNION ALL
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_igd t, list_tindakan_igd l, pelayanan p , dokter d
        WHERE t.id_list_tindakan=l.id_tindakan_igd and t.id_dokter=d.id_dokter and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' 
        UNION ALL
        SELECT IFNULL(sum(t.total) ,0) total
        from tindakan_apelkes t, list_tindakan_apelkes l, pelayanan p
        WHERE  t.id_list_tindakan=l.id_list_tindakan_apelkes and p.id_pelayanan=t.id_pelayanan and t.id_pelayanan='$idPelayanan'
        UNION ALL
        SELECT IFNULL(sum(total) ,0) total
        from tindakan_ok t, list_kamar_ok l, pelayanan p  
        WHERE t.id_tindakan=l.id_list_kamar_ok  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan' 
       ) as grup
        ");
        return $query->row_array();
    }
    public function total_lain($idPelayanan)
    {
        $query =  $this->db->query("SELECT IFNULL(sum(total) ,0) total
        from tindakan_penunjang_lain t, list_tindakan_apelkes l, pelayanan p
        WHERE l.id_list_tindakan_apelkes = t.id_list_tindakan  and p.id_pelayanan=t.id_pelayanan  and t.id_pelayanan='$idPelayanan'
        and (t.status_pembayaran !='tidak' or t.status_pembayaran is null)
        ");
        return $query->row_array();
    }
    public function getDetailKasir($id_pelayanan)
    {
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get('deatail_kasir')->row();
    }
    public function getDetailKasirMCU($id_pelayanan)
    {
        $this->db->where('id_pasien', $id_pelayanan);
        return $this->db->get('detail_kasir_mcu')->row();
    }
    public function getKamarById($idPelayanan)
    {
        $query =  $this->db->query("SELECT h.id_kamar FROM pelayanan p, history_pelayanan_ranap h  WHERE p.id_pelayanan=h.id_pelayanan and h.tgl_keluar is null and p.id_pelayanan='$idPelayanan'");
        return $query->result();
    }
    public function getPelayananUmum()
    {
        $query =  $this->db->query("SELECT * FROM list_tindakan_umum  where status='aktif' order by nama asc");
        return $query->result_array();
    }
    public function getPelayananUmumById($idPelayanan)
    {
        $query =  $this->db->query("SELECT l.nama tindakan, t.*, p.tgl,p.nama 
        FROM pelayanan_tambahan p, tindakan_umum t, list_tindakan_umum l 
        WHERE p.id_pelayanan_umum=t.id_pelayanan and l.id_list_tindakan=t.id_list_tindakan and p.id_pelayanan_umum='$idPelayanan'");
        return $query->result_array();
    }
    public function update_tindakan($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
        return $this->db->insert_id();
    }
    public function delete_tindakan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getDpDisc($id_pelayanan)
    {
        $this->db->select('*');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get('deatail_kasir')->result();
    }
    public function getDpDiskon($id_history)
    {
        $this->db->select('diskon_konsul,diskon_tindakan,diskon_visite,diskon_kamar,diskon_radio,diskon_labor');
        $this->db->where('id_history', $id_history);
        return $this->db->get('detail_kasir_diskon')->result();
    }
    public function getKasir($table)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        setlocale(LC_TIME, 'IND');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->like('tgl_input', $tgl);
        return $this->db->get()->result();
    }

    public function getCaraBayar($id)
    {
        $this->db->select('b.id_pelayanan,c.id_cara_bayar,c.nama, b.cara_bayar');
        $this->db->from('pelayanan b, cara_bayar c');
        $this->db->where('c.id_cara_bayar=b.cara_bayar');
        $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where('b.id_pelayanan', $id);
        return $this->db->get()->result();
    }

    public function getRangeKasir($mulai, $akhir, $table)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        setlocale(LC_TIME, 'IND');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tgl_input >=', $mulai);
        $this->db->where('tgl_input <=', $akhir);
        return $this->db->get()->result();
    }

    public function total_pelayanan_pasien($id_pelayanan)
    {
        $query =  $this->db->query("SELECT (biaya_rs + biaya_admin) total
        from pelayanan   
        WHERE id_pelayanan='$id_pelayanan'")->row_array();

        $data = $this->db->query("SELECT sum(biaya_jasa) biaya_jasa from (SELECT h.biaya_jasa,l.nama_panjang poli,h.tgl_masuk,d.nama
                from pelayanan p, history_pelayanan h, list_poli l ,dokter d 
                WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.nama_poli = l.id_list_poli and h.id_pelayanan='$id_pelayanan' and h.status = 1
                union all
                SELECT h.biaya_jasa,'IGD' poli,h.tgl_masuk,d.nama
                from pelayanan p, history_pelayanan_ugd h,dokter d 
                WHERE p.id_pelayanan = h.id_pelayanan and h.dpjp = d.id_dokter and h.id_pelayanan='$id_pelayanan' and h.status = 1
                ) as b")->row();
        return $query['total'] + $data->biaya_jasa;
    }
    public function total_pelayanan_pasien1($id_pelayanan, $id_history)
    {
        $query =  $this->db->query("SELECT (p.biaya_rs + h.biaya_jasa + p.biaya_admin) total
        from pelayanan p , history_pelayanan h 
        WHERE p.id_pelayanan = h.id_pelayanan and p.id_pelayanan='$id_pelayanan' and h.id_history ='$id_history' ");
        return $query->row_array();
    }

    public function getPendapatan()
    {
        $this->db->select('p.*, s.nama staff');
        $this->db->from('pendapatan p, staff s');
        $this->db->where('s.id_staff = p.id_staff');
        $this->db->where('p.ket !=', 1);
        $this->db->where('p.status !=', 2);

        return $this->db->get()->result();
    }

    public function cekStatusPendapatan($id_pendapatan)
    {
        $this->db->select('status');
        $this->db->from('pendapatan');
        $this->db->where('id_pendapatan', $id_pendapatan);
        $this->db->where('status !=', 0);

        return $this->db->get()->result();
    }

    public function getLaporanPendapatan($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        $this->db->select('sum(d.total_bayar + (if(d.selisih!=0 and d.total_bayar =0,d.selisih,0))) total,s.nama staff,d.id_staff,d.tgl_verifikasi tgl_input');
        $this->db->from('staff s,pendapatan_kasir d');
        $this->db->where('s.id_staff=d.id_staff');
        // $this->db->where("p.cara_bayar = '42'");
        // $this->db->where('p.status', 1);
        $this->db->where('d.status', 1);
        // $this->db->where_not_in('d.total_bayar', 0);
        if ($mulai != '' && $akhir != '') {
            $this->db->where("(DATE(d.tgl_verifikasi) BETWEEN '$mulai' and '$akhir')");
        } else {
            $this->db->like('d.tgl_verifikasi', $tgl);
        }
        $this->db->group_by('DATE(d.tgl_verifikasi),d.id_staff');
        $this->db->order_by('DATE(d.tgl_verifikasi),s.nama');
        return $this->db->get()->result();
    }

    public function getPendapatanByStaffTgl($staff, $tgl)
    {
        $hasil = $this->db->query("SELECT g.*,b.nama_bank from (
            SELECT * FROM(
            SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
            and DATE(d.tgl_verifikasi) = '$tgl'  and p.status=1 and h.status=1 and d.id_staff = '$staff'
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=1
        group by d.id_pendapatan
        ) as a

            UNION ALL
            SELECT tgl_input, pasien, no_rm, 'UGD' poli, total, staff,keterangan,id_pendapatan FROM(
            SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
            and DATE(d.tgl_verifikasi) = '$tgl'  and p.status=1 and h.status=1 and d.id_staff = '$staff'and p.status=1 and h.status=1 
            and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
            and p.id_pelayanan not in(select id_pelayanan from history_pelayanan where status =1)
            and d.total_bayar != 0 and d.status=1
            group by d.id_pendapatan

            ) as b
            UNION all
            SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
            WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
            and p.cara_bayar = '42' and DATE(d.tgl_verifikasi) = '$tgl'  and p.status=1 and h.status=1 and d.id_staff = '$staff' and p.status=1 and h.status=1 and d.total_bayar != 0 and d.status=1
            UNION all
            SELECT d.tgl_verifikasi tgl_input, p.nama pasien, '' as no_rm, 'OBAT BEBAS' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
            FROM obat_bebas p, staff s,pendapatan_kasir d
            WHERE p.id_obat_bebas=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe='OBAT BEBAS'
            and p.cara_bayar = '42' and DATE(d.tgl_verifikasi) = '$tgl' and d.id_staff = '$staff' and d.total_bayar != 0 and d.status=1
            
            UNION all
        SELECT d.tgl_verifikasi tgl_input, p.nama_pasien pasien, p.no_rm, 'MCU' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM mcu p, staff s,pendapatan_kasir d
        WHERE p.id_mcu=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='MCU'
        and DATE(d.tgl_verifikasi) = '$tgl' and d.id_staff = '$staff' and d.total_bayar != 0 and d.status=1
        UNION all
        SELECT d.tgl_verifikasi tgl_input, p.nama pasien, '' as no_rm, 'HOMECARE' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM homecare p, staff s,pendapatan_kasir d
        WHERE p.id_pasien =d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='HOMECARE' and p.jenis_layanan='HOMECARE'
        and  DATE(d.tgl_verifikasi) = '$tgl' and d.id_staff = '$staff' and d.total_bayar != 0 and d.status=1
       
        UNION ALL
        SELECT * FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  and p.status=1 and h.status=1 and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        group by d.id_pendapatan
        ) AS c
        UNION ALL
        SELECT tgl_input, pasien, no_rm, 'UGD' poli, total, staff,keterangan,id_pendapatan FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
        and DATE(d.tgl_verifikasi) = '$tgl'  and p.status=1 and h.status=1 and d.id_staff = '$staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        group by d.id_pendapatan
        ) AS d
        UNION all
        SELECT * FROM(
        SELECT d.tgl_verifikasi tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=1 and d.tipe='SELISIH' 
        and DATE(d.tgl_verifikasi) = '$tgl' and p.status=1 and h.status=1 and d.id_staff = '$staff' 
        group by d.id_pendapatan
        ) AS e

            ) as g
                left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
                as b on g.id_pendapatan = b.id_pendapatan
            ORDER by pasien asc
            ")->result();

        return $hasil;
    }

    public function getPendapatan1()
    {
        $this->db->select('p.*, s.nama staff');
        $this->db->from('pendapatan p, staff s');
        $this->db->where('s.id_staff = p.id_staff');
        $this->db->where('p.ket', 0);

        return $this->db->get()->num_rows();
    }

    public function getPasienTunai()
    {
        $this->db->select('pl.tgl_keluar, ps.no_rm, ps.nama pasien, ps.jenis_kelamin, ps.tgl_lahir, c.nama bayar, pl.diagnosa, pl.id_pelayanan, p.id_pendapatan_tunai_kasir');
        $this->db->from('pelayanan pl, pendapatan_tunai_kasir p, pasien ps, cara_bayar c');
        $this->db->where('pl.id_pelayanan = p.id_pelayanan');
        $this->db->where('pl.id_pasien = ps.no_rm');
        $this->db->where('pl.cara_bayar = c.id_cara_bayar');
        $this->db->where('p.status', "");

        return $this->db->get()->result();
    }

    public function getIsiPasienTunai($id_pendapatan)
    {
        $this->db->select('pl.tgl_keluar, ps.no_rm, ps.nama pasien, ps.jenis_kelamin, ps.tgl_lahir, c.nama bayar, pl.diagnosa, pl.id_pelayanan, p.id_pendapatan_tunai_kasir');
        $this->db->from('pelayanan pl, pendapatan_tunai_kasir p, pasien ps, cara_bayar c');
        $this->db->where('pl.id_pelayanan = p.id_pelayanan');
        $this->db->where('pl.id_pasien = ps.no_rm');
        $this->db->where('pl.cara_bayar = c.id_cara_bayar');
        $this->db->where('p.status', $id_pendapatan);

        return $this->db->get()->result();
    }

    public function cekIDPelayanan($id_pelayanan)
    {
        $this->db->select('d.nama, h.jenis_pelayanan');
        $this->db->from('history_pelayanan h, dokter d');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result();
    }

    public function cekIDPelayananUGD($id_pelayanan)
    {
        $this->db->select('d.nama, h.jenis_pelayanan');
        $this->db->from('history_pelayanan_ugd h, dokter d');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result();
    }

    public function cekIDPelayananRanap($id_pelayanan)
    {
        $this->db->select('d.nama, h.jenis_pelayanan');
        $this->db->from('history_pelayanan_ranap h, dokter d');
        $this->db->where('h.dpjp = d.id_dokter');
        $this->db->where('h.id_pelayanan', $id_pelayanan);

        return $this->db->get()->result();
    }

    public function HitungTotal($id_pendapatan)
    {
        $this->db->select('SUM(total_bayar) total');
        $this->db->from('pendapatan_tunai_kasir');
        $this->db->where('status', $id_pendapatan);

        return $this->db->get()->result();
    }

    public function GetTotal($id_pendapatan)
    {
        $query = $this->db->query("SELECT sum(p.total_bayar) total FROM pendapatan_tunai_kasir p WHERE p.status = '$id_pendapatan'");
        return $query->row_array();
    }
    public function getCetakDp($id_pelayanan, $id_history)
    {
        $query = $this->db->query("SELECT * FROM (
        SELECT b.biaya_rs, b.biaya_admin, h.biaya_jasa, p.nama, p.no_rm, c.nama cara_bayar, a.nama asal, d.nama dokter 
        from pelayanan b, history_pelayanan h, pasien p, cara_bayar c, asal_pasien a, dokter d 
        where b.id_pelayanan = h.id_pelayanan 
        and b.id_pasien = p.no_rm
        and b.cara_bayar = c.id_cara_bayar
        and b.asal_pasien = a.id_asal_pasien
        and h.dpjp = d.id_dokter
        and h.id_pelayanan = '$id_pelayanan' and h.id_history ='$id_history'
        UNION ALL
        SELECT b.biaya_rs, b.biaya_admin, h.biaya_jasa, p.nama, p.no_rm, c.nama cara_bayar, a.nama asal, d.nama dokter 
        from pelayanan b, history_pelayanan_ugd h , pasien p, cara_bayar c, asal_pasien a, dokter d 
        where b.id_pelayanan = h.id_pelayanan 
        and b.id_pasien = p.no_rm
        and b.cara_bayar = c.id_cara_bayar
        and b.asal_pasien = a.id_asal_pasien
        and h.dpjp = d.id_dokter
        and h.id_pelayanan = '$id_pelayanan' and h.id_history ='$id_history'
        UNION ALL
        SELECT b.biaya_rs, b.biaya_admin, h.biaya_jasa, p.nama, p.no_rm, c.nama cara_bayar, a.nama asal, d.nama dokter 
        from pelayanan b, history_pelayanan_ranap h , pasien p, cara_bayar c, asal_pasien a, dokter d 
        where b.id_pelayanan = h.id_pelayanan 
        and b.id_pasien = p.no_rm
        and b.cara_bayar = c.id_cara_bayar
        and b.asal_pasien = a.id_asal_pasien
        and h.dpjp = d.id_dokter
        and h.id_pelayanan = '$id_pelayanan' and h.id_history ='$id_history')
        as gabung");
        return $query->row_array();
    }

    public function getSewakamar($id_history)
    {
        return $this->db->query("SELECT l.*
        from history_pelayanan_ranap h, ruangan r, list_tindakan_apelkes l
        where h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar and l.nama like '%biaya ruang%' and  h.id_history='$id_history' ")->row();
    }
    public function getSewakamar1($id_pelayanan)
    {
        $riwayat =  $this->db->query("SELECT l.*, r.*,h.tanggal_masuk,h.tanggal_keluar,h.status status_riwayat
        from riwayat_kamar h, ruangan r, list_tindakan_apelkes l,history_pelayanan_ranap s,pelayanan p 
        where p.id_pelayanan = s.id_pelayanan and p.id_pelayanan = h.id_pelayanan and h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar 
        and h.status != 'BATAL' and h.ket = 0
        and l.nama like '%biaya ruang%' and l.status='AKTIF'
        and s.status = 1
        and   h.id_pelayanan='$id_pelayanan' 
        group by h.id_riwayat
        order by h.tanggal_masuk desc")->result();
        return $riwayat;
    }
    public function getSewakamar1_lama($id_pelayanan)
    {
        $riwayat =  $this->db->query("SELECT l.*, r.*,h.tanggal_masuk,h.tanggal_keluar,h.status status_riwayat
        from riwayat_kamar h, ruangan r, list_tindakan_apelkes l,history_pelayanan_ranap s,pelayanan p 
        where p.id_pelayanan = s.id_pelayanan and p.id_pelayanan = h.id_pelayanan and h.id_kamar=r.id_ruangan and r.kelas=l.tipe_kamar 
        and h.status != 'BATAL' and h.ket = 0
        and l.nama like '%biaya ruang%' and l.status='LAMA'
        and s.status = 1
        and   h.id_pelayanan='$id_pelayanan' 
        group by h.id_riwayat
        order by h.tanggal_masuk desc")->result();
        return $riwayat;
    }
    public function cekSewaKamar($id_pelayanan)
    {
        return $this->db->query("SELECT *
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%biaya ruang%' and t.id_pelayanan='$id_pelayanan' ")->result();
    }
    public function TotalSewaKamar($id_pelayanan)
    {
        return $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%biaya ruang%' and t.id_pelayanan='$id_pelayanan' ")->row();
    }
    public function TotalSewaKamarAtas($id_pelayanan)
    {
        return $this->db->query("SELECT sum(t.total) total
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%biaya ruang%' 
        and (l.tipe_kamar = 'KELAS I' or l.tipe_kamar = 'SUITE' or l.tipe_kamar = 'VIP' or l.tipe_kamar = 'VVIP' or l.tipe_kamar = 'ICU' or l.tipe_kamar = 'HCU') and t.id_pelayanan='$id_pelayanan' ")->row();
    }
    public function get_riwayat_pembayaran($id_pelayanan)
    {
        return $this->db->query("SELECT g.*,ifnull(b.nama_bank,'') bank,b.cara_bayar id_bank FROM(
        SELECT p.*,p.total_bayar nilai,s.nama staff
        from pendapatan_kasir p, staff s
        where p.id_staff = s.id_staff
        and p.total_bayar >0 and p.total_pendapatan >0 and p.id_pelayanan='$id_pelayanan'

        UNION ALL
        SELECT p.*,p.selisih nilai,s.nama staff
        from pendapatan_kasir p, staff s
        where p.id_staff = s.id_staff
        and selisih >0 and keterangan !='asuransi' and  p.id_pelayanan='$id_pelayanan'
        ) AS g
        left join 
        (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
        as b on g.id_pendapatan = b.id_pendapatan
        group by g.id_pendapatan  
        ")->result();
    }
    public function hapusSewaKamar($id_pelayanan)
    {
        return $this->db->query("DELETE t
        from tindakan_apelkes t, list_tindakan_apelkes l
        where t.id_list_tindakan=l.id_list_tindakan_apelkes and l.nama like '%biaya ruang%' and t.id_pelayanan='$id_pelayanan' ");
    }
    public function selectRangeLaporanTotalKasir($mulai, $akhir, $id_staff)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        $hasil = $this->db->query("SELECT g.*,b.nama_bank from (
        SELECT * FROM (
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
        and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=0
        group by d.id_pendapatan
        ) AS a
        UNION ALL
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
        and p.cara_bayar = '42' and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) and d.total_bayar != 0 and d.status=0
        group by d.id_pendapatan
        UNION all
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
        and p.cara_bayar = '42' and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=0
        UNION all
        SELECT d.tgl_input tgl_input, p.nama pasien, '' as no_rm, 'OBAT BEBAS' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.tgl_input tgl_keluar, p.tanggal tgl_masuk
        FROM obat_bebas p, staff s,pendapatan_kasir d
        WHERE p.id_obat_bebas=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe='OBAT BEBAS'
        and p.cara_bayar = '42' and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=0
        UNION all
        SELECT d.tgl_input tgl_input, p.nama_pasien pasien, p.no_rm, 'MCU' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan,d.tgl_input tgl_keluar, p.tanggal tgl_masuk
        FROM mcu p, staff s,pendapatan_kasir d
        WHERE p.id_mcu=d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='MCU'
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=0
        UNION all
        SELECT d.tgl_input tgl_input, p.nama pasien, '' as no_rm, 'HOMECARE' as poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, d.tgl_input tgl_keluar, p.tanggal tgl_masuk
        FROM homecare p, staff s,pendapatan_kasir d
        WHERE p.id_pasien =d.id_pelayanan  and s.id_staff=d.id_staff and d.tipe ='HOMECARE'
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and d.id_staff = '$id_staff' and d.total_bayar != 0 and d.status=0
        UNION ALL
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=0 and d.tipe='SELISIH'
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        group by d.id_pendapatan
        UNION ALL
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=0 and d.tipe='SELISIH' 
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        
        UNION all
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.selisih) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
        and p.cara_bayar != '42' and d.selisih != 0 and d.status=0 and d.tipe='SELISIH' 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 and d.id_staff = '$id_staff' 
        
        -- 
        UNION ALL
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, l.nama_panjang poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan h, pasien ps, list_poli l, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and h.nama_poli=l.id_list_poli and d.id_pelayanan=p.id_pelayanan 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
        and p.cara_bayar != '42' and d.status=0 and d.keterangan !='asuransi' and d.total_bayar != 0 and d.selisih =0
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        group by d.id_pendapatan
        UNION ALL
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, 'UGD' poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ugd h, pasien ps, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm and s.id_staff=d.id_staff and d.id_pelayanan=p.id_pelayanan 
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir')  and p.status=1 and h.status=1 and d.id_staff = '$id_staff'
        and p.cara_bayar != '42' and d.status=0 and d.keterangan !='asuransi'  and d.total_bayar != 0 and d.selisih =0
        and p.id_pelayanan not in(select id_pelayanan from history_pelayanan_ranap where status =1) 
        
        UNION all
        SELECT d.tgl_input tgl_input, ps.nama pasien, ps.no_rm, r.kelas_ruangan poli, (d.total_bayar) total, s.nama staff,d.keterangan,d.id_pendapatan, p.tgl_keluar, p.tgl_masuk
        FROM pelayanan p, history_pelayanan_ranap h, pasien ps, ruangan r, staff s,pendapatan_kasir d
        WHERE p.id_pelayanan=h.id_pelayanan and p.id_pasien=ps.no_rm  and s.id_staff=d.id_staff and h.id_kamar=r.id_ruangan and d.id_pelayanan=p.id_pelayanan 
        and p.cara_bayar != '42' and d.status=0 and d.keterangan !='asuransi' and d.total_bayar != 0 and d.selisih =0
        and (DATE(d.tgl_input) BETWEEN '$mulai' and '$akhir') and p.status=1 and h.status=1 and d.id_staff = '$id_staff' 
        
        group by id_pendapatan
        
        ) as g
            left join (SELECT * from pendapatan_bank p, daftar_bank d where p.cara_bayar = d.id_bank)
            as b on g.id_pendapatan = b.id_pendapatan
        ORDER by pasien asc
        
        ")->result();

        return $hasil;
    }
    public function getPasienById($id)
    {
        return $this->db->query("SELECT ps.* from pelayanan p, pasien ps
        where p.id_pasien = ps.no_rm and p.id_pelayanan = '$id'")->row_array();
    }
}
