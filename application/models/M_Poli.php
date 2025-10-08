<?php

class M_Poli extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }
    public function getDiagnosa()
    {
        $this->db->select('id_diagnosa,nama_diagnosa');
        $this->db->from('list_diagnosa');
        return $this->db->get()->result_array();
    }


    // PASIEN POLI
    public function selectCaraBayar()
    {
        $this->db->select('DISTINCT(nama) nama_bayar, id_cara_bayar');
        $this->db->order_by('nama_bayar', 'ASC');
        return $this->db->get('cara_bayar')->result();
    }
    public function selectBank()
    {
        $this->db->select('DISTINCT(nama_bank) nama_bank, id_bank');
        $this->db->order_by('nama_bank', 'ASC');
        return $this->db->get('daftar_bank')->result();
    }
    public function selectKaryawan()
    {
        $this->db->select('DISTINCT(nama) nama, id_karyawan, account');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('karyawan')->result();
    }
   

    //PASIEN POLI

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
        $this->db->where("(h.jenis_pelayanan='RAWAT INAP' )");
        $this->db->where('b.status_rawat', 'dirawat');
        $this->db->where('b.id_pelayanan', $id_pelayanan);
        $this->db->order_by('tgl_masuk desc ');
        return $this->db->get()->result();
    }

    public function selectPasienRajal1($poli)
    {
        if ($poli == 'INTERNIS') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_internis v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'OBGYNE') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_obgyne v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'THT') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_tht v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'MATA') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_mata v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'KULIT DAN KELAMIN') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kulit v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'UMUM') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_umum v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'ANAK') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_anak v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'GIGI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gigi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'JANTUNG') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_jantung v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'BEDAH') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'FISIO') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_fisio v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'AKUPUNTUR MEDIK') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_akupuntur v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
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
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kesehatan_jiwa v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'ORTHOPEDI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_orthopedi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'PARU') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_paru v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'SARAF') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_saraf v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 1
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'URO') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_urologi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'CONTROL REHABILITAS MEDIC') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_rehab_medik v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
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
        if ($poli == 'HEMODIALISA') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_hemodialisa v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'PENYAKIT MULUT') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_penyakit_mulut v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'GINJAL') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_ginjal v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'TERAPI WICARA') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_terapi_bicara v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'GIZI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gizi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'KEMOTERAPI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kemo v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'POLI STIFIN') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_stifin v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
        if ($poli == 'POLI ORHODONTI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_orthodenti v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
         if ($poli == 'POLI OKUPASI') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_okupasi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
    }


    public function selectDataPasien($tipe)
    {
        $data_staff = $this->session->userdata('data_auth');
        if ($tipe == 'poliinternis') {
            if ($data_staff->username == "4020191016") {
                $dok = $this->db->get_where('dokter', ['username' => $data_staff->username])->row()->id_dokter;
                $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_internis v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0 and v.dpjp = '$dok'
            order by v.tgl_masuk desc");
                return $query->result();
            }
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_internis v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliobgyne') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status status_kasir 
            FROM v_pasien_obgyne v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'politht') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_tht v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polimata') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_mata v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polikulit') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kulit v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliumum') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_umum v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polianak') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_anak v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poligigi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gigi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polijantung') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_jantung v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polibedah') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polifisio') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_fisio v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'rehab') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_rehab_medik v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polihemodialisa') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir, p.no_bpjs
            FROM v_pasien_hemodialisa v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            JOIN pasien p
            ON v.no_rm = p.no_rm
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliakupuntur') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_akupuntur v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polibedahmulut') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_bedah_mulut v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polikesjiwa') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kesehatan_jiwa v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliorthopedi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_orthopedi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliparu') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_paru v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polisaraf') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_saraf v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 1
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliurologi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_urologi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polipenyakitmulut') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_penyakit_mulut v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliginjal') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_ginjal v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polipsikolog') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_psikolog v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poligizi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_gizi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'terapiwicara') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_terapi_bicara v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'kemoterapi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_kemo v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'polistifin') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_stifin v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'poliorthodonti') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_orthodenti v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'konservasigigi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_konservasi_gigi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        } elseif ($tipe == 'okupasi') {
            $query = $this->db->query("SELECT v.*, r.tindakan,r.tindakan_labor, r.tindakan_radiologi, r.tindakan_farmasi,r.status  status_kasir
            FROM v_pasien_okupasi v
            LEFT JOIN req_kasir r
            ON v.id_history = r.id_history
            where v.status_erm = 0
            order by v.tgl_masuk desc");
            return $query->result();
        }
    }
    public function selectDataPasienby_id($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_kunjungan');
        return $this->db->get()->result();
    }

    //fisio
    public function getTindakanFisio()
    {
        $this->db->select('*');
        return $this->db->get('list_tindakan_poli_fisio')->result_array();
    }

    public function selectNamaTindakan($tbTindakan)
    {
        $this->db->select('nama nama_tindakan,id_list_tindakan, harga_jasa, harga_sarana, kelompok_eklaim');
        $this->db->from($tbTindakan);
        if ($tbTindakan == 'list_tindakan_poli_fisio' || $tbTindakan == 'list_tindakan_poli_hemodialisa') {
            $this->db->where('tipe_kamar', 'KELAS III');
        }
        $this->db->where('status', 'AKTIF');
        $this->db->order_by('nama_tindakan');
        return $this->db->get()->result_array();
    }
    public function selectNamaTindakan_lama($tbTindakan)
    {
        $this->db->select('nama nama_tindakan,id_list_tindakan, harga_jasa, harga_sarana, kelompok_eklaim');
        $this->db->from($tbTindakan);
        if ($tbTindakan == 'list_tindakan_poli_fisio' || $tbTindakan == 'list_tindakan_poli_hemodialisa') {
            $this->db->where('tipe_kamar', 'KELAS III');
        }
        $this->db->where('status', 'LAMA');

        $this->db->order_by('nama_tindakan');
        return $this->db->get()->result_array();
    }
    public function Total_Fisio_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_poli_fisio');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    // public function getSignaObat()
    // {
    //     $this->db->select('*');
    //     $this->db->from('signa_obat');
    //     $this->db->group_by('tindakan');
    //     return $this->db->get()->result_array();
    // }

    // public function getCaraPemakaianObat()
    // {
    //     $this->db->select('*');
    //     $this->db->from('cara_pemakaian_obat');
    //     // $this->db->group_by('cara_pemakaian');
    //     return $this->db->get()->result_array();
    // }

    public function getSignaObat($cari)
    {
        $this->db->select('*');
        $this->db->from('signa_obat');
        $this->db->like('tindakan', $cari, 'both');
        // $this->db->group_by('tindakan');
        $this->db->limit(10);

        return $this->db->get()->result_array();
    }
    public function getListMakan()
    {
        $query = $this->db->query("SELECT *  FROM `list_tindakan_apelkes` WHERE `nama` LIKE '%makan%' ORDER BY `id_list_tindakan_apelkes`  DESC");
        return $query->result();
        
        /* $this->db->select('*');
        $this->db->from($table);
        $this->db->like();
        // $this->db->group_by('tindakan');
        $this->db->limit(10);

        return $this->db->get()->result_array(); */
    }

    public function getCaraPemakaianObat($cari)
    {
        $this->db->select('*');
        $this->db->from('cara_pemakaian_obat');
        $this->db->like('cara_pemakaian', $cari, 'both');
        $this->db->limit(10);
        // $this->db->group_by('cara_pemakaian');
        return $this->db->get()->result_array();
    }

    public function selectDokter($spes)
    {
        $this->db->select('nama, id_dokter');
        $this->db->where('dokter_spes', $spes);
        $this->db->where('status', 'aktif');
        $this->db->from('dokter');
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
    public function insert_tindakan($page_data, $table)
    {
        $this->db->insert($table, $page_data);
        return $this->db->insert_id();
    }
    public function update_tindakan($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function selectDataTindakanByIdPel($id_pelayanan, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function delete_tindakan($id, $table, $where)
    {
        $this->db->delete($table, array($where => $id));
    }
    public function delete($table, $where)
    {
        $this->db->delete($table,$where);
    }
    public function harga_total($idPelayanan, $table)
    {
        $this->db->select('SUM(total) as total');
        $this->db->from($table);
        $this->db->where('id_pelayanan', $idPelayanan);
        return $this->db->get()->row()->total;
    }
    public function Total_Harga_Byid($id_pelayanan, $table)
    {
        $this->db->select_sum('total');
        $this->db->from($table);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function Total_Obat_Byid($id_pelayanan)
    {
        $db = $this->db->get_where('resep_obat', ['id_resep' => $id_pelayanan])->row();
        // if($db->jenis_resep ==5){
        //     $tabel ="tindakan_farmasi_kronis";
        // }else{
        $tabel = "tindakan_farmasi";
        // }
        $this->db->select_sum('total');
        $this->db->from($tabel);
        $this->db->where('id_resep', $id_pelayanan);
        return $this->db->get()->result();
    }

    //   Radiologi
    public function selectDataRadiologiById($id_pelayanan) //isi tabel radiologi
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    //FISIO
    public function selectDataFisioById($id_pelayanan) //isi tabel radiologi
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_poli_fisio t, list_tindakan_poli_fisio l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan=l.id_list_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataPasienFisioby_id($id_pelayanan, $id_history)
    {
        $this->db->where(array('id_pelayanan' => $id_pelayanan, 'id_history' => $id_history));
        $this->db->from('v_tindakan_poli_fisio');
        return $this->db->get()->result();
    }

    public function selectDataRadiologiPrioritasById($id_pelayanan) //isi tabel radiologi prioritas
    {
        $this->db->select('t.*, l.nama, s.nama staff');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi_prioritas l, pelayanan p, staff s');
        $this->db->where('t.id_tindakan_radiologi=l.id_daftar_tindakan');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Radiologi_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function Total_Radiologi_Prioritas_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_radiologi');
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_radiologi($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_radiologi', array('id_tindakan_radiologi' => $id_tindakan_radiologi));
    }

    // End


    //   Labor
    public function selectNamaRadiologi() // list tindakan radiologi
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaRadiologi_lama() // list tindakan radiologi
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaRadiologiPrioritas() // list tindakan radiologi prioritas
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS I');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaRadiologiPrioritas_lama() // list tindakan radiologi prioritas
    {
        $this->db->select('nama, id_daftar_tindakan, harga');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', 'KELAS I');
        $this->db->from('list_tindakan_radiologi');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectDataLaborById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff, pa.tgl_lahir, f.status');
        $this->db->from('tindakan_labor t, list_tindakan_labor l, pelayanan p, staff s, pasien pa, form_labor f');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_form_labor=f.id_form_labor');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Labor_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor');
        $this->db->where('id_form_labor', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_labor($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_labor', array('id_tindakan_labor' => $id_tindakan_radiologi));
    }

    public function insert_labor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function selectNamaLabor() //tindakan labor
    {
        $this->db->select('nama, id_daftar_tindakan, harga, kode_lis');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaLaborPrioritas() //tindakan labor prioritas
    {
        $this->db->select('nama, id_daftar_tindakan, harga,kode_lis');
        $this->db->where('status', 'AKTIF');
        $this->db->where('tipe_kamar', 'KELAS I');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    public function selectNamaLabor_lama() //tindakan labor
    {
        $this->db->select('nama, id_daftar_tindakan, harga, kode_lis');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', 'KELAS III');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }

    public function selectNamaLaborPrioritas_lama() //tindakan labor prioritas
    {
        $this->db->select('nama, id_daftar_tindakan, harga,kode_lis');
        $this->db->where('status', 'LAMA');
        $this->db->where('tipe_kamar', 'KELAS I');
        $this->db->from('list_tindakan_labor');
        $this->db->order_by('nama');
        return $this->db->get()->result_array();
    }
    // End


    //   Labor Prioritas
    public function selectDataLaborPrioritasById($id_pelayanan)
    {
        $this->db->select('t.*, l.nama, s.nama staff, pa.tgl_lahir, f.status');
        $this->db->from('tindakan_labor_pp t, list_tindakan_labor_prioritas l, pelayanan p, staff s, pasien pa, form_labor f');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('pa.no_rm=p.id_pasien');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_form_labor=f.id_form_labor');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function Total_Labor_Prioritas_Byid($id_pelayanan)
    {
        $this->db->select_sum('total');
        $this->db->from('tindakan_labor_pp t, form_labor f');
        $this->db->where('t.id_form_labor=f.id_form_labor');
        $this->db->where('t.id_form_labor', $id_pelayanan);
        return $this->db->get()->result();
    }

    public function delete_labor_prioritas($id_tindakan_radiologi)
    {
        $this->db->delete('tindakan_labor_pp', array('id_tindakan_labor' => $id_tindakan_radiologi));
    }
    // End Labor Prioritas


    //  Antrian
    //Sebelum diganti Yan a.jenis_antrian='ONLINE' 
    public function selectAntrian($poli)
    {
        $tanggal = date('Y-m-d');
        $hasil = $this->db->query("SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan 
        FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='BPJS' 
        UNION all 
        SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' and a.no_antri !=0
        order by status ,no_antri");
        return $hasil->result();
    }

    public function updateskip($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function updatenext($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insertplaySuara($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function selectCountData($poli)
    {
        $tanggal = date('Y-m-d');
        $this->db->select('poli, count(poli) as jumlah');
        $this->db->where('poli', $poli);
        $this->db->where_Not_In('status', '2');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function getAntrianPoli($poli)
    {
        $tanggal = date('Y-m-d');
        $hasil = $this->db->query("SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan 
        FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='ONLINE' 
        UNION all 
        SELECT a.*, p.nama,c.nama cara_bayar,p.no_rm,pel.id_pelayanan FROM antrian_poli a, pelayanan pel, pasien p, cara_bayar c 
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and p.no_rm=pel.id_pasien and c.id_cara_bayar=pel.cara_bayar and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' and a.no_antri !=0
        order by status ,no_antri");
        return $hasil->row_array();
    }
    public function selectResepById($id_pelayanan)
    {
        $this->db->select('r.*, p.cara_bayar');
        $this->db->from('resep_obat r, pelayanan p');
        $this->db->where('r.id_pelayanan = p.id_pelayanan');
        $this->db->where('r.id_pelayanan', $id_pelayanan);
        $this->db->order_by('r.tanggal', 'desc');
        return $this->db->get()->result();
    }
    public function request_antrian_farmasi($id_pelayananx , $inisial, $no_antri, $tipe, $id_resep)
    {
        $dateNow = date('Y-m-d H:i:s');
        $query = $this->db->query("INSERT INTO antrian_farmasi (id_resep, inisial, no_antri, jenis, id_pelayanan, tanggal_resep, status) 
        VALUES ('$id_resep', '$inisial', '$no_antri', '$tipe', '$id_pelayananx', '".$dateNow."', '0');");
    }
    public function request_resep($where, $data)
    {
        $this->db->where('id_resep', $where);
        $this->db->update('resep_obat', $data);
    }
    public function selectObatByResep($id_resep)
    {
        $this->db->select('t.*, l.nama,l.harga_cost, s.nama staff,r.jenis_resep,r.status, so.tindakan, c.cara_pemakaian');
        $this->db->from('resep_obat r, tindakan_farmasi t, list_logistik l , staff s, signa_obat so,cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = so.id_signa');
        $this->db->where('t.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatByResep_kronis($id_resep)
    {
        $this->db->select('t.*, l.nama,l.harga_cost, s.nama staff,r.jenis_resep,r.status, so.tindakan, c.cara_pemakaian');
        $this->db->from('resep_obat r, tindakan_farmasi_kronis t, list_logistik l , staff s, signa_obat so,cara_pemakaian_obat c');
        $this->db->where('t.id_list_tindakan=l.id_logistik');
        $this->db->where('t.id_resep = r.id_resep');
        $this->db->where('t.id_signa = so.id_signa');
        $this->db->where('t.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('s.id_staff=t.id_staff');
        $this->db->where('l.status','AKTIF');
        $this->db->where('r.id_resep', $id_resep);
        $this->db->order_by('t.tanggal desc');

        return $this->db->get()->result();
    }
    public function selectObatById_layout($id) //pengambilan pengganti obat resep dokter
    {
        $query = $this->db->query("SELECT l.nama obat_farmasi, l1.nama obat_dokter,t.*,so.tindakan, c.cara_pemakaian
        from tindakan_farmasi t, tindakan_farmasi_kronis k, list_logistik l, list_logistik l1,signa_obat so,cara_pemakaian_obat c
        where t.id_tindakan_farmasi = k.id_tindakan_farmasi
        and t.id_list_tindakan=l.id_logistik
        and k.id_list_tindakan=l1.id_logistik
        and t.id_signa = so.id_signa
        and t.id_cara_pakai = c.id_cara_pemakaian
        and k.id_tindakan_farmasi ='$id'");
        return $query->row();
    }

    // public function selectRacikanByResep($id_resep)
    // {
    //     $this->db->select('ra.resep, s.tindakan, c.cara_pemakaian');
    //     $this->db->from('resep_obat r, resep_racikan ra, tindakan_farmasi t, signa_obat s, cara_pemakaian_obat c');
    //     $this->db->where('r.id_resep = ra.id_resep');

    //     $this->db->where ('t.id_resep=r.id_resep');
    //     $this->db->where ('t.id_signa=s.id_signa'); 
    //     $this->db->where ('c.id_cara_pemakaian=t.id_cara_pakai');

    //     $this->db->where('r.id_resep', $id_resep);
    //     $this->db->order_by('ra.tanggal desc');

    //     return $this->db->get()->result();
    // }
    public function selectRacikanByResep($id_resep)
    {
        $this->db->select('ra.*, s.tindakan, c.cara_pemakaian,r.status');
        $this->db->from('resep_obat r, resep_racikan ra, cara_pemakaian_obat c, signa_obat s');
        $this->db->where('r.id_resep = ra.id_resep');
        $this->db->where('ra.id_signa = s.id_signa');
        $this->db->where('ra.id_cara_pakai = c.id_cara_pemakaian');
        $this->db->where('ra.id_resep', $id_resep);
        $this->db->order_by('ra.tanggal desc');

        return $this->db->get()->result();
    }
    public function getNamaObat()
    {
        // $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
        // $this->db->from('stok_apotik sl, list_logistik l');
        // $this->db->where(' sl.id_logistik=l.id_logistik');
        // $this->db->group_by('sl.id_logistik');
        // $this->db->having('stok>0');
        $this->db->order_by('nama');
        return $this->db->get('v_stok_apotik')->result_array();
    }
    // public function getNamaObatByDepo($depo)
    // {
    //     if ($depo == 'APOTIK') {
    //         $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    //         $this->db->from('stok_apotik sl, list_logistik l');
    //         $this->db->where(' sl.id_logistik=l.id_logistik');
    //         $this->db->group_by('sl.id_logistik');
    //         $this->db->having('stok>0');
    //         $this->db->order_by('nama');
    //         return $this->db->get()->result_array();
    //     } elseif ($depo == 'IGD') {
    //         $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    //         $this->db->from('stok_igd sl, list_logistik l');
    //         $this->db->where(' sl.id_logistik=l.id_logistik');
    //         $this->db->group_by('sl.id_logistik');
    //         $this->db->having('stok>0');
    //         $this->db->order_by('nama');
    //         return $this->db->get()->result_array();
    //     } else {
    //         $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
    //         $this->db->from('stok_depo sl, list_logistik l');
    //         $this->db->where(' sl.id_logistik=l.id_logistik');
    //         $this->db->group_by('sl.id_logistik');
    //         $this->db->having('stok>0');
    //         $this->db->order_by('nama');
    //         return $this->db->get()->result_array();
    //     }
    // }
    public function getNamaObatByDepo($depo, $cari)
    {
        $this->db->select('l.id_logistik,l.nama , stok_tersedia stok,l.margin,l.harga_cost,l.ppn');
        $this->db->from('list_logistik l');

        if ($depo == 'APOTIK') {
            $this->db->join('pr_apotik sl', 'sl.id_logistik=l.id_logistik', 'left');
        } else {
            $this->db->join('pr_depo sl', 'sl.id_logistik=l.id_logistik', 'left');
        }
        $this->db->where('l.status', 'AKTIF');
        $this->db->like('l.nama', $cari, 'both');
        // $this->db->where("(l.nama like '%$cari%' or l.zat_aktif like '%$cari%')");
        $this->db->group_by('l.id_logistik');
        //$this->db->having('stok>0');
        $this->db->order_by('stok desc');
        // $this->db->order_by('nama asc');
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }
    public function getNamaObatByGol($gol, $depo)
    {
        if ($depo == 'APOTIK') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_apotik sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where(' l.golongan_farmakologi', $gol);
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } elseif ($depo == 'IGD') {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_igd sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where(' l.golongan_farmakologi', $gol);
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('sl.id_logistik,l.nama , SUM(sl.frek) stok,max(sl.kadaluarsa) kadaluarsa,l.margin,l.harga_cost,l.ppn');
            $this->db->from('stok_depo sl, list_logistik l');
            $this->db->where(' sl.id_logistik=l.id_logistik');
            $this->db->where(' l.golongan_farmakologi', $gol);
            $this->db->where('l.status', 'AKTIF');
            $this->db->group_by('sl.id_logistik');
            $this->db->having('stok>0');
            $this->db->order_by('nama');
            return $this->db->get()->result_array();
        }
    }
    public function getNamaObatReturn($id_pelayanan)
    {

        $this->db->select('l.id_logistik,l.nama , SUM(t.frek) stok,SUM(t.total) total,t.depo,t.kadaluarsa,l.margin,l.harga_cost');
        $this->db->from('list_logistik l,tindakan_farmasi t');
        $this->db->where(' t.id_list_tindakan=l.id_logistik');

        $this->db->where(' t.id_pelayanan', $id_pelayanan);
        $this->db->where_not_in(' t.id_resep', 'OBAT RUANG');
        $this->db->group_by('t.id_list_tindakan,t.depo');
        $this->db->having('stok>0');
        $this->db->order_by('nama');

        return $this->db->get()->result_array();
    }
    public function delete_resep($id_resep)
    {
        $staff = $this->session->userdata('data_auth');

        $this->db->delete('resep_obat', array('id_resep' => $id_resep));
        $this->db->delete('tindakan_farmasi', array('id_resep' => $id_resep));
        // $this->db->delete('tindakan_farmasi_kronis', array('id_resep' => $id_resep));

        $this->db->delete('stok_apotik', array('id_resep' => $id_resep));
        $this->db->delete('stok_igd', array('id_resep' => $id_resep));
        $this->db->delete('stok_depo', array('id_resep' => $id_resep));

        $this->db->where(array('id_resep' => $id_resep));
        $this->db->update('tindakan_farmasi_kronis', ['staff_hapus' => $staff->id_staff, 'tgl_hapus' => date('Y-m-d H:i:s')]);
    }
    public function delete_racikan($id_racikan)
    {
        $this->db->delete('resep_racikan', array('id_racikan' => $id_racikan));
    }
    public function delete_obat($id_tindakan, $depo)
    {
        $this->db->delete('tindakan_farmasi', array('id_tindakan_farmasi' => $id_tindakan));
        $this->db->delete('tindakan_farmasi_kronis', array('id_tindakan_farmasi' => $id_tindakan));
        if ($depo == 'APOTIK') {
            $this->db->delete('stok_apotik', array('id_req' => $id_tindakan));
            $sql = "DELETE s.* from stok_apotik s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
            $this->db->query($sql, array($id_tindakan));
        } else if ($depo == 'IGD') {
            $this->db->delete('stok_igd', array('id_req' => $id_tindakan));
            $sql = "DELETE s.* from stok_igd s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
            $this->db->query($sql, array($id_tindakan));
        } else {
            $this->db->delete('stok_depo', array('id_req' => $id_tindakan));
            $sql = "DELETE s.* from stok_depo s , tindakan_farmasi f  WHERE s.id_req = f.id_tindakan_farmasi and s.id_req=?";
            $this->db->query($sql, array($id_tindakan));
        }
    }
    public function getAntrian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $this->db->select_max('no_antri');
        $this->db->from('antrian_farmasi');
        $this->db->like('tanggal', $tgl);
        return $this->db->get()->result();
    }

    public function selectDataFormById($id_pelayanan, $id_tindakan) //get untuk detail data
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi t, list_tindakan_radiologi l, pelayanan p');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataFormPrioritasById($id_pelayanan, $id_tindakan) //get untuk detail data prioritas
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_radiologi_pp t, list_tindakan_radiologi_prioritas l, pelayanan p');
        $this->db->where('t.id_tindakan=l.id_daftar_tindakan');
        $this->db->where('p.id_pelayanan=t.id_pelayanan');
        $this->db->where('t.id_pelayanan', $id_pelayanan);
        $this->db->where('t.id_tindakan_radiologi', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function selectDataFormById_Labor($id_tindakan)
    {
        $this->db->select('t.*, l.nama');
        $this->db->from('tindakan_labor t, list_tindakan_labor l');
        $this->db->where('t.id_list_tindakan=l.id_daftar_tindakan');
        $this->db->where('t.id_tindakan_labor', $id_tindakan);
        $this->db->order_by('t.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function cekJumTindakan($id_pelayanan, $tbTindakan)
    {
        $this->db->select('id_tindakan');
        $this->db->from($tbTindakan);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->result();
    }
    public function cekJumTindakanObat($id_pelayanan, $tipe)
    {
        if ($tipe == 'poliinternis') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_internis v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_obgyne v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'politht') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_tht v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polimata') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_mata v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_kulit v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_umum v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polianak') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_anak v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_gigi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_jantung v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_bedah v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_fisio v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'rehab') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_rehab_medik v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_hemodialisa v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_akupuntur v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_bedah_mulut v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_kesehatan_jiwa v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_orthopedi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_paru v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_saraf v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polipenyakitmulut') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_penyakit_mulut v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliginjal') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_ginjal v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polipsikolog') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_psikolog v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligizi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_gizi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'terapiwicara') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_terapi_bicara v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'kemoterapi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_kemo v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polistifin') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_stifin v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthodonti') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_orthodenti v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'konservasigigi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_konservasi_gigi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'okupasi') {
            $this->db->select('t.id_tindakan_farmasi');
            $this->db->from('v_pasien_okupasi v, tindakan_farmasi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
    }
    public function cekJumTindakanRad($id_pelayanan, $tipe)
    {
        if ($tipe == 'poliinternis') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_internis v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_obgyne v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'politht') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_tht v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polimata') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_mata v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_kulit v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_umum v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polianak') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_anak v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_gigi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_jantung v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_bedah v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_fisio v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'rehab') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_rehab_medik v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_hemodialisa v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_akupuntur v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_bedah_mulut v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_kesehatan_jiwa v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_orthopedi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_paru v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_saraf v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliurologi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_urologi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polipenyakitmulut') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_penyakit_mulut v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliginjal') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_ginjal v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polipsikolog') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_psikolog v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligizi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_gizi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'terapiwicara') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_terapi_bicara v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'kemoterapi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_kemo v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polistifin') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_stifin v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'okupasi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_okupasi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthodonti') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_orthodenti v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'konservasigigi') {
            $this->db->select('t.id_tindakan_radiologi');
            $this->db->from('v_pasien_konservasi_gigi v, tindakan_radiologi t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
    }
    public function cekJumTindakanLab($id_pelayanan, $tipe)
    {
        if ($tipe == 'poliinternis') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_internis v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliobgyne') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_obgyne v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'politht') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_tht v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polimata') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_mata v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikulit') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_kulit v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliumum') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_umum v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polianak') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_anak v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligigi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_gigi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polijantung') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_jantung v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedah') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_bedah v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polifisio') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_fisio v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'rehab') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_rehab_medik v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polihemodialisa') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_hemodialisa v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliakupuntur') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_akupuntur v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polibedahmulut') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_bedah_mulut v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polikesjiwa') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_kesehatan_jiwa v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthopedi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_orthopedi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliparu') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_paru v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polisaraf') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_saraf v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliurologi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_urologi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polipenyakitmulut') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_penyakit_mulut v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliginjal') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_ginjal v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polipsikolog') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_psikolog v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poligizi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_gizi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'terapiwicara') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_terapi_bicara v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'kemoterapi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_kemo v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'polistifin') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_stifin v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'poliorthodonti') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_orthodenti v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'konservasigigi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_konservasi_gigi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        } elseif ($tipe == 'okupasi') {
            $this->db->select('t.id_tindakan_labor');
            $this->db->from('v_pasien_okupasi v, tindakan_labor t');
            $this->db->where('v.id_pelayanan = t.id_pelayanan');
            $this->db->where('t.id_pelayanan', $id_pelayanan);
            return $this->db->get()->result();
        }
    }
    function req_kasir($id_pelayanan, $id_history)
    {
        $this->db->select('*');
        $this->db->from('req_kasir');
        $this->db->where('id_history', $id_history);
        $this->db->where('id_pelayanan', $id_pelayanan);
        return $this->db->get()->row_array();
    }
    function insert_req_kasir($id_pelayanan, $id_history, $data)
    {
        $this->db->where('id_history', $id_history);
        $this->db->where('id_pelayanan', $id_pelayanan);
        $q = $this->db->get('req_kasir');

        if (
            $q->num_rows() > 0
        ) {
            $this->db->where('id_history', $id_history);
            $this->db->where('id_pelayanan', $id_pelayanan);
            $this->db->update('req_kasir', $data);
        } else {
            $this->db->set('id_history', $id_history);
            $this->db->set('id_pelayanan', $id_pelayanan);
            $this->db->insert('req_kasir', $data);
        }
    }
    public function selectDataPasienIGD($poli)
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*,d.nama_diagnosa,d.kode
        FROM v_erm_poli v
        left join diagnosa_utama d on v.id_history = d.id_history
        where v.tipe_staff = '$poli' and v.status_erm=1
        and v.tgl_masuk like '$tgl%'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }

    public function selectDataPasienIGDRange($mulai, $akhir, $poli)
    {
        $query = $this->db->query("SELECT v.*,d.nama_diagnosa,d.kode 
        FROM v_erm_poli v
        left join diagnosa_utama d on v.id_history = d.id_history
        where  v.tipe_staff = '$poli' and v.status_erm=1
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectErmPoli()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $query = $this->db->query("SELECT v.*,d.nama_diagnosa,d.kode
        FROM v_erm_poli v
        left join diagnosa_utama d on v.id_history = d.id_history
        where v.status_erm=1
        and v.tgl_masuk like '$tgl%'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
    public function selectErmPoliRange($mulai, $akhir)
    {
        $query = $this->db->query("SELECT v.*,d.nama_diagnosa,d.kode
        FROM v_erm_poli v
        left join diagnosa_utama d on v.id_history = d.id_history
        where v.id_pelayanan in (Select id_pelayanan from history_pelayanan where status_erm=1) 
        and v.tgl_masuk >= '$mulai' and v.tgl_masuk <= '$akhir'
        ORDER BY v.tgl_masuk desc");
        return $query->result();
    }
}
