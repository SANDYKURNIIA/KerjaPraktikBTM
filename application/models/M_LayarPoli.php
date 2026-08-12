<<<<<<< HEAD
<?php 
defined('BASEPATH') OR exit('No driect script access allowed');

class M_LayarPoli extends CI_Model{

    public function getAntrianPoli($poli)
    {
        $tanggal = date('Y-m-d');
        $hasil = $this->db->query("SELECT a.no_antri nomor, a.status, a.waktu_play
        FROM antrian_poli a, pelayanan pel
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='ONLINE' 
        UNION all 
        SELECT a.no_antri nomor, a.status, a.waktu_play
        FROM antrian_poli a, pelayanan pel
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' and a.no_antri !=0
        order by waktu_play");
        return $hasil->row_array();
    }
	public function POLI_KANDUNGAN(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'HLGI4176K8');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_BEDAH(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'MWK205D30K');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_ANAK(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'E00RX703');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_THT(){
    	//kode L
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'O782EGU4PR');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_MATA(){
    	//kode M
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'UQ81K76373');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_REHABILITAS_MEDIC(){
    	//kode R
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '6E975PL694');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function KONTROL_REHABILITAS_MEDIC(){
    	//kode I
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '6E975PL694');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function POLI_JANTUNG(){
    	//kode J
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'I9NXY5VNQG');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_GIGI(){
    	//kode G
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'ODI8643C27');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_KULIT_KELAMIN(){
    	//kode K
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '2JZ09X4K22');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_PENYAKIT_DALAM(){
    	//kode P
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '24QRNLX29R');
        $this->db->where('status', '0');
         $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_UMUM(){
    	//kode U
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'RZE28J1098');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function selectPlay(){
        return $this->db->get('temp_panggil_antrian')->row_array();
    }

    public function deleteplaySuara(){
        $this->db->limit(1);
        $this->db->empty_Table('temp_panggil_antrian');
    }


    public function selectAntrianPoli(){
            return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliKandungan(){
        $this->db->select('*');
        $this->db->where('nama', 'KANDUNGAN');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliBedah(){
        $this->db->select('*');
        $this->db->where('nama', 'BEDAH');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliAnak(){
        $this->db->select('*');
        $this->db->where('nama', 'ANAK');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliTht(){
        $this->db->select('*');
        $this->db->where('nama', 'THT');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliMata(){
        $this->db->select('*');
        $this->db->where('nama', 'MATA');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliMedic(){
        $this->db->select('*');
        $this->db->where('nama', 'REHABILITAS MEDIK');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliControlMedic(){
        $this->db->select('*');
        $this->db->where('nama', 'KONTROL REHAB');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliJantung(){
        $this->db->select('*');
        $this->db->where('nama', 'JANTUNG');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliGigi(){
        $this->db->select('*');
        $this->db->where('nama', 'GIGI');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliKulitKelamin(){
        $this->db->select('*');
        $this->db->where('nama', 'KULIT');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliPenyakitDalam(){
        $this->db->select('*');
        $this->db->where('nama', 'PENYAKIT DALAM');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliUmum(){
        $this->db->select('*');
        $this->db->where('nama', 'UMUM');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliPsikolog(){
        $this->db->select('*');
        $this->db->where('nama', 'PSIKOLOG');
        return $this->db->get('admin_poli')->row_array();
    }



    

}
=======
<?php 
defined('BASEPATH') OR exit('No driect script access allowed');

class M_LayarPoli extends CI_Model{

    public function getAntrianPoli($poli)
    {
        $tanggal = date('Y-m-d');
        $hasil = $this->db->query("SELECT a.no_antri nomor, a.status, a.waktu_play
        FROM antrian_poli a, pelayanan pel
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='ONLINE' 
        UNION all 
        SELECT a.no_antri nomor, a.status, a.waktu_play
        FROM antrian_poli a, pelayanan pel
        WHERE a.poli='$poli' and a.tanggal='$tanggal' and a.status!=2 and a.id_pelayanan=pel.id_pelayanan and a.jenis_antrian='LANGSUNG' and a.no_antri !=0
        order by waktu_play");
        return $hasil->row_array();
    }
	public function POLI_KANDUNGAN(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'HLGI4176K8');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_BEDAH(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'MWK205D30K');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_ANAK(){
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'E00RX703');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_THT(){
    	//kode L
        $tanggal=date('Y-m-d');
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'O782EGU4PR');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_MATA(){
    	//kode M
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'UQ81K76373');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_REHABILITAS_MEDIC(){
    	//kode R
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '6E975PL694');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function KONTROL_REHABILITAS_MEDIC(){
    	//kode I
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '6E975PL694');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function POLI_JANTUNG(){
    	//kode J
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'I9NXY5VNQG');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_GIGI(){
    	//kode G
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'ODI8643C27');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_KULIT_KELAMIN(){
    	//kode K
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '2JZ09X4K22');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_PENYAKIT_DALAM(){
    	//kode P
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', '24QRNLX29R');
        $this->db->where('status', '0');
         $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }
    public function POLI_UMUM(){
    	//kode U
        $tanggal=date('Y-m-d'); 
        $this->db->select('MIN(no_antri) nomor');
        $this->db->where('poli', 'RZE28J1098');
        $this->db->where('status', '0');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get('antrian_poli')->row_array();
    }

    public function selectPlay(){
        return $this->db->get('temp_panggil_antrian')->row_array();
    }

    public function deleteplaySuara(){
        $this->db->limit(1);
        $this->db->empty_Table('temp_panggil_antrian');
    }


    public function selectAntrianPoli(){
            return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliKandungan(){
        $this->db->select('*');
        $this->db->where('nama', 'KANDUNGAN');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliBedah(){
        $this->db->select('*');
        $this->db->where('nama', 'BEDAH');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliAnak(){
        $this->db->select('*');
        $this->db->where('nama', 'ANAK');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliTht(){
        $this->db->select('*');
        $this->db->where('nama', 'THT');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliMata(){
        $this->db->select('*');
        $this->db->where('nama', 'MATA');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliMedic(){
        $this->db->select('*');
        $this->db->where('nama', 'REHABILITAS MEDIK');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliControlMedic(){
        $this->db->select('*');
        $this->db->where('nama', 'KONTROL REHAB');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliJantung(){
        $this->db->select('*');
        $this->db->where('nama', 'JANTUNG');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliGigi(){
        $this->db->select('*');
        $this->db->where('nama', 'GIGI');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliKulitKelamin(){
        $this->db->select('*');
        $this->db->where('nama', 'KULIT');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliPenyakitDalam(){
        $this->db->select('*');
        $this->db->where('nama', 'PENYAKIT DALAM');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliUmum(){
        $this->db->select('*');
        $this->db->where('nama', 'UMUM');
        return $this->db->get('admin_poli')->row_array();
    }

    public function selectAntrianPoliPsikolog(){
        $this->db->select('*');
        $this->db->where('nama', 'PSIKOLOG');
        return $this->db->get('admin_poli')->row_array();
    }



    

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
