<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Assembling');
        $this->load->model('M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    

    public function get_all_data(){   
        $data = $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->getAll();
        $out = null;

        for($i=0;$i<count($data);$i++){
            $no = $i+1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_pelaksanaan_ppi . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_pelaksanaan_ppi . "\")' '><i class='icon-trash'></i></button>";
            $nmstaff = $data[$i]->nama_staff;
            $tanggal = $data[$i]->Tanggal;

            $lantai = $data[$i]->Lantai_bersih_dan_tidak_licin;
            $permukaan = $data[$i]->Permukaan_tidak_berdebu;
            $lawa = $data[$i]->Tidak_ada_awa_lawa;
            $unit = $data[$i]->unit;
            $tmpsampah = $data[$i]->Tempat_sampah_tertutup;
            $wastafel = $data[$i]->Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan;
            $keranda = $data[$i]->Keranda_selalu_bersih_dan_tidak_berkarat;
            $penutup = $data[$i]->Penutup_keranda_bersih;
            $mbersih = $data[$i]->Mobil_jenazah_bersih;
            $mbersih2 = $data[$i]->Mobil_jenazah_dibersihkan_setiap_habis_pakai;
            $apd = $data[$i]->Tersedia_APD_lengkap;
            $acuci = $data[$i]->Alat_cuci_tangan_lengkap_diruangan;
            $handrup = $data[$i]->Tersedia_handrub_dimobil_jenazah;
            $spilkit = $data[$i]->Tersedia_spilkit_dimobil_jenazah;
            $tmpsampah2 = $data[$i]->Tempat_sampah_infeksius_dan_non_infeksius;
            $tmplinen = $data[$i]->Tempat_linen_kotor;

            $out[$i] = array($no,$tombol,$hapus,$nmstaff,$tanggal,$unit,$lantai,$permukaan,$lawa,$tmpsampah,$wastafel,$keranda,$penutup,$mbersih,$mbersih2,$apd,$acuci,$handrup,$spilkit,$tmpsampah2,$tmplinen);
        }
        if($out == null){
            echo '{"data":""}';
            exit;
        }else{
            $page_data['data'] = $out;
			echo json_encode($page_data);
			exit;
        }
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->delete(array('id_pelaksanaan_ppi' => $id));
    }
    /*
     public function laporan() 
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Laporan_mutu_keselamatan_kerja/Laporan_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah';
        $page_data['data'] = $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->getAll();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->getData($id);
        $out = null;
        if($data->num_rows =! 1){
            $out = 0;
        }else{
            $out = $data->row_array();
        }
        echo json_encode($out);
    }


     public function insert() 
    {
        $data_staff = $this->session->userdata('data_auth');
        
        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Lantai_bersih_dan_tidak_licin' =>$this->input->post('Lantai_bersih_dan_tidak_licin'),
            'Permukaan_tidak_berdebu' =>$this->input->post('Permukaan_tidak_berdebu'),
            'Tidak_ada_awa_lawa' =>$this->input->post('Tidak_ada_awa_lawa'),
            'Tempat_sampah_tertutup' =>$this->input->post('Tempat_sampah_tertutup'),
            'Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan' =>$this->input->post('Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan'),
            'Keranda_selalu_bersih_dan_tidak_berkarat' =>$this->input->post('Keranda_selalu_bersih_dan_tidak_berkarat'),
            'Penutup_keranda_bersih' => $this->input->post('Penutup_keranda_bersih'),
            'Mobil_jenazah_bersih' =>$this->input->post('Mobil_jenazah_bersih'),
            'Mobil_jenazah_dibersihkan_setiap_habis_pakai' =>$this->input->post('Mobil_jenazah_dibersihkan_setiap_habis_pakai'),
            'Tersedia_APD_lengkap' =>$this->input->post('Tersedia_APD_lengkap'),
            'Alat_cuci_tangan_lengkap_diruangan' =>$this->input->post('Alat_cuci_tangan_lengkap_diruangan'),
            'Tersedia_handrub_dimobil_jenazah' =>$this->input->post('Tersedia_handrub_dimobil_jenazah'),
            'Tersedia_spilkit_dimobil_jenazah' => $this->input->post('Tersedia_spilkit_dimobil_jenazah'),
            'Tempat_sampah_infeksius_dan_non_infeksius' =>$this->input->post('Tempat_sampah_infeksius_dan_non_infeksius'),
            'Tempat_linen_kotor' =>$this->input->post('Tempat_linen_kotor')
        );
        $this->db->insert('formulir_monitoring_pelaksaan_ppi_dikamar_jenazah', $data);
    }

    public function update() 
    {
        $data_staff = $this->session->userdata('data_auth');
        $where = base64_decode($this->input->post('idP'));
        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Lantai_bersih_dan_tidak_licin' =>$this->input->post('Lantai_bersih_dan_tidak_licin'),
            'Permukaan_tidak_berdebu' =>$this->input->post('Permukaan_tidak_berdebu'),
            'Tidak_ada_awa_lawa' =>$this->input->post('Tidak_ada_awa_lawa'),
            'Tempat_sampah_tertutup' =>$this->input->post('Tempat_sampah_tertutup'),
            'Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan' =>$this->input->post('Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan'),
            'Keranda_selalu_bersih_dan_tidak_berkarat' =>$this->input->post('Keranda_selalu_bersih_dan_tidak_berkarat'),
            'Penutup_keranda_bersih' => $this->input->post('Penutup_keranda_bersih'),
            'Mobil_jenazah_bersih' =>$this->input->post('Mobil_jenazah_bersih'),
            'Mobil_jenazah_dibersihkan_setiap_habis_pakai' =>$this->input->post('Mobil_jenazah_dibersihkan_setiap_habis_pakai'),
            'Tersedia_APD_lengkap' =>$this->input->post('Tersedia_APD_lengkap'),
            'Alat_cuci_tangan_lengkap_diruangan' =>$this->input->post('Alat_cuci_tangan_lengkap_diruangan'),
            'Tersedia_handrub_dimobil_jenazah' =>$this->input->post('Tersedia_handrub_dimobil_jenazah'),
            'Tersedia_spilkit_dimobil_jenazah' => $this->input->post('Tersedia_spilkit_dimobil_jenazah'),
            'Tempat_sampah_infeksius_dan_non_infeksius' =>$this->input->post('Tempat_sampah_infeksius_dan_non_infeksius'),
            'Tempat_linen_kotor' =>$this->input->post('Tempat_linen_kotor')
        );
        $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->update(array('id_pelaksanaan_ppi' => $where),$data);
    }
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Assembling');
        $this->load->model('M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah');
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    

    public function get_all_data(){   
        $data = $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->getAll();
        $out = null;

        for($i=0;$i<count($data);$i++){
            $no = $i+1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_pelaksanaan_ppi . "\")' '><i class='icon-rocket'></i></button>";
			$hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_pelaksanaan_ppi . "\")' '><i class='icon-trash'></i></button>";
            $nmstaff = $data[$i]->nama_staff;
            $tanggal = $data[$i]->Tanggal;

            $lantai = $data[$i]->Lantai_bersih_dan_tidak_licin;
            $permukaan = $data[$i]->Permukaan_tidak_berdebu;
            $lawa = $data[$i]->Tidak_ada_awa_lawa;
            $unit = $data[$i]->unit;
            $tmpsampah = $data[$i]->Tempat_sampah_tertutup;
            $wastafel = $data[$i]->Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan;
            $keranda = $data[$i]->Keranda_selalu_bersih_dan_tidak_berkarat;
            $penutup = $data[$i]->Penutup_keranda_bersih;
            $mbersih = $data[$i]->Mobil_jenazah_bersih;
            $mbersih2 = $data[$i]->Mobil_jenazah_dibersihkan_setiap_habis_pakai;
            $apd = $data[$i]->Tersedia_APD_lengkap;
            $acuci = $data[$i]->Alat_cuci_tangan_lengkap_diruangan;
            $handrup = $data[$i]->Tersedia_handrub_dimobil_jenazah;
            $spilkit = $data[$i]->Tersedia_spilkit_dimobil_jenazah;
            $tmpsampah2 = $data[$i]->Tempat_sampah_infeksius_dan_non_infeksius;
            $tmplinen = $data[$i]->Tempat_linen_kotor;

            $out[$i] = array($no,$tombol,$hapus,$nmstaff,$tanggal,$unit,$lantai,$permukaan,$lawa,$tmpsampah,$wastafel,$keranda,$penutup,$mbersih,$mbersih2,$apd,$acuci,$handrup,$spilkit,$tmpsampah2,$tmplinen);
        }
        if($out == null){
            echo '{"data":""}';
            exit;
        }else{
            $page_data['data'] = $out;
			echo json_encode($page_data);
			exit;
        }
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->delete(array('id_pelaksanaan_ppi' => $id));
    }
    /*
     public function laporan() 
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'Laporan_mutu_keselamatan_kerja/Laporan_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah';
        $page_data['data'] = $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->getAll();
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }*/

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->getData($id);
        $out = null;
        if($data->num_rows =! 1){
            $out = 0;
        }else{
            $out = $data->row_array();
        }
        echo json_encode($out);
    }


     public function insert() 
    {
        $data_staff = $this->session->userdata('data_auth');
        
        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Lantai_bersih_dan_tidak_licin' =>$this->input->post('Lantai_bersih_dan_tidak_licin'),
            'Permukaan_tidak_berdebu' =>$this->input->post('Permukaan_tidak_berdebu'),
            'Tidak_ada_awa_lawa' =>$this->input->post('Tidak_ada_awa_lawa'),
            'Tempat_sampah_tertutup' =>$this->input->post('Tempat_sampah_tertutup'),
            'Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan' =>$this->input->post('Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan'),
            'Keranda_selalu_bersih_dan_tidak_berkarat' =>$this->input->post('Keranda_selalu_bersih_dan_tidak_berkarat'),
            'Penutup_keranda_bersih' => $this->input->post('Penutup_keranda_bersih'),
            'Mobil_jenazah_bersih' =>$this->input->post('Mobil_jenazah_bersih'),
            'Mobil_jenazah_dibersihkan_setiap_habis_pakai' =>$this->input->post('Mobil_jenazah_dibersihkan_setiap_habis_pakai'),
            'Tersedia_APD_lengkap' =>$this->input->post('Tersedia_APD_lengkap'),
            'Alat_cuci_tangan_lengkap_diruangan' =>$this->input->post('Alat_cuci_tangan_lengkap_diruangan'),
            'Tersedia_handrub_dimobil_jenazah' =>$this->input->post('Tersedia_handrub_dimobil_jenazah'),
            'Tersedia_spilkit_dimobil_jenazah' => $this->input->post('Tersedia_spilkit_dimobil_jenazah'),
            'Tempat_sampah_infeksius_dan_non_infeksius' =>$this->input->post('Tempat_sampah_infeksius_dan_non_infeksius'),
            'Tempat_linen_kotor' =>$this->input->post('Tempat_linen_kotor')
        );
        $this->db->insert('formulir_monitoring_pelaksaan_ppi_dikamar_jenazah', $data);
    }

    public function update() 
    {
        $data_staff = $this->session->userdata('data_auth');
        $where = base64_decode($this->input->post('idP'));
        $data = array(
            'id_staff'=>$data_staff->id_staff,
            'nama_staff'=>$data_staff->nama,
            'tgl_input'=>date("Y-m-d H:i:s"),
            'Tanggal' =>$this->input->post('tglForm'),
            'unit' => $this->input->post('unit'),
            'Lantai_bersih_dan_tidak_licin' =>$this->input->post('Lantai_bersih_dan_tidak_licin'),
            'Permukaan_tidak_berdebu' =>$this->input->post('Permukaan_tidak_berdebu'),
            'Tidak_ada_awa_lawa' =>$this->input->post('Tidak_ada_awa_lawa'),
            'Tempat_sampah_tertutup' =>$this->input->post('Tempat_sampah_tertutup'),
            'Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan' =>$this->input->post('Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan'),
            'Keranda_selalu_bersih_dan_tidak_berkarat' =>$this->input->post('Keranda_selalu_bersih_dan_tidak_berkarat'),
            'Penutup_keranda_bersih' => $this->input->post('Penutup_keranda_bersih'),
            'Mobil_jenazah_bersih' =>$this->input->post('Mobil_jenazah_bersih'),
            'Mobil_jenazah_dibersihkan_setiap_habis_pakai' =>$this->input->post('Mobil_jenazah_dibersihkan_setiap_habis_pakai'),
            'Tersedia_APD_lengkap' =>$this->input->post('Tersedia_APD_lengkap'),
            'Alat_cuci_tangan_lengkap_diruangan' =>$this->input->post('Alat_cuci_tangan_lengkap_diruangan'),
            'Tersedia_handrub_dimobil_jenazah' =>$this->input->post('Tersedia_handrub_dimobil_jenazah'),
            'Tersedia_spilkit_dimobil_jenazah' => $this->input->post('Tersedia_spilkit_dimobil_jenazah'),
            'Tempat_sampah_infeksius_dan_non_infeksius' =>$this->input->post('Tempat_sampah_infeksius_dan_non_infeksius'),
            'Tempat_linen_kotor' =>$this->input->post('Tempat_linen_kotor')
        );
        $this->M_Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah->update(array('id_pelaksanaan_ppi' => $where),$data);
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}