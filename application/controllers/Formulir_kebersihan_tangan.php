<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_kebersihan_tangan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Form_Kebersihan_Tangan');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Form_kebersihan_tangan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    private function getStaffName($id_staff){
        return $this->db->get_where("staff",["id_staff" => $id_staff])->row()->nama;
    }

    public function get_all_data(){
        $data = $this->M_Form_Kebersihan_Tangan->getAll();
        $out = null;

        for ($i=0; $i < count($data); $i++) { 
           $no = $i+1;
           $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
           $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_form . "\")' '><i class='icon-trash'></i></button>";

           $nama = $data[$i]->nama;
           $hasil = $data[$i]->hasil;
           $seb_kop = $data[$i]->seb_kop;
           $seb_tinAnt = $data[$i]->seb_tinAnt;
           $set_caiTu = $data[$i]->set_caiTu;
           $set_konPas = $data[$i]->set_konPas;
           $set_konLing = $data[$i]->set_konLing;
           $cuci = $data[$i]->cuci_tgn;
           $ket = $data[$i]->keterangan;
           $rec = $data[$i]->rekomendasi;

           $nmStaff = $this->getStaffName($data[$i]->id_staff);
           $tgl_input = $data[$i]->tgl_input;

           $out[$i] = array($no,$tombol,$hapus,$nama,$hasil,$seb_kop,$seb_tinAnt,$set_caiTu,$set_konPas,$set_konLing,$cuci,$ket,$rec,$tgl_input,$nmStaff);
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
        $this->M_Form_Kebersihan_Tangan->delete($id);
    }

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->db->get_where('form_kebersihan_tangan',["id_form" => $id])->row_array();
        echo json_encode($data);
    }

    public function insert(){
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'seb_kop' => $this->input->post('seb_kop'),
            'seb_tinAnt' => $this->input->post('seb_tinAnt'),
            'set_caiTu' => $this->input->post('set_caiTu'),
            'set_konPas' => $this->input->post('set_konPas'),
            'set_konLing' => $this->input->post('set_konLing'),
            'cuci_tgn' => $this->input->post('cuci_tgn'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Kebersihan_Tangan->insert($data);
    }

    public function update(){

        $id = base64_decode($this->input->post('idP'));

        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'seb_kop' => $this->input->post('seb_kop'),
            'seb_tinAnt' => $this->input->post('seb_tinAnt'),
            'set_caiTu' => $this->input->post('set_caiTu'),
            'set_konPas' => $this->input->post('set_konPas'),
            'set_konLing' => $this->input->post('set_konLing'),
            'cuci_tgn' => $this->input->post('cuci_tgn'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tgl_input' => date("Y-m-d H:i:s"),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Kebersihan_Tangan->update($id,$data);
    }

=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_kebersihan_tangan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Form_Kebersihan_Tangan');
    }

    public function index(){
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'form_form/Form_kebersihan_tangan';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }

    private function getStaffName($id_staff){
        return $this->db->get_where("staff",["id_staff" => $id_staff])->row()->nama;
    }

    public function get_all_data(){
        $data = $this->M_Form_Kebersihan_Tangan->getAll();
        $out = null;

        for ($i=0; $i < count($data); $i++) { 
           $no = $i+1;
           $tombol = "<button class='btn btn-success btn-icon-anim btn square'  onclick='pilih(\"" . $data[$i]->id_form . "\")' '><i class='icon-rocket'></i></button>";
           $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"" . $data[$i]->id_form . "\")' '><i class='icon-trash'></i></button>";

           $nama = $data[$i]->nama;
           $hasil = $data[$i]->hasil;
           $seb_kop = $data[$i]->seb_kop;
           $seb_tinAnt = $data[$i]->seb_tinAnt;
           $set_caiTu = $data[$i]->set_caiTu;
           $set_konPas = $data[$i]->set_konPas;
           $set_konLing = $data[$i]->set_konLing;
           $cuci = $data[$i]->cuci_tgn;
           $ket = $data[$i]->keterangan;
           $rec = $data[$i]->rekomendasi;

           $nmStaff = $this->getStaffName($data[$i]->id_staff);
           $tgl_input = $data[$i]->tgl_input;

           $out[$i] = array($no,$tombol,$hapus,$nama,$hasil,$seb_kop,$seb_tinAnt,$set_caiTu,$set_konPas,$set_konLing,$cuci,$ket,$rec,$tgl_input,$nmStaff);
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
        $this->M_Form_Kebersihan_Tangan->delete($id);
    }

    public function getData(){
        $id = $this->input->post('id');
        $data = $this->db->get_where('form_kebersihan_tangan',["id_form" => $id])->row_array();
        echo json_encode($data);
    }

    public function insert(){
        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'seb_kop' => $this->input->post('seb_kop'),
            'seb_tinAnt' => $this->input->post('seb_tinAnt'),
            'set_caiTu' => $this->input->post('set_caiTu'),
            'set_konPas' => $this->input->post('set_konPas'),
            'set_konLing' => $this->input->post('set_konLing'),
            'cuci_tgn' => $this->input->post('cuci_tgn'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Kebersihan_Tangan->insert($data);
    }

    public function update(){

        $id = base64_decode($this->input->post('idP'));

        $data_staff = $this->session->userdata('data_auth');
        $data  = array(
            'nama' => $this->input->post('nama'),
            'hasil' => $this->input->post('hasil'),
            'seb_kop' => $this->input->post('seb_kop'),
            'seb_tinAnt' => $this->input->post('seb_tinAnt'),
            'set_caiTu' => $this->input->post('set_caiTu'),
            'set_konPas' => $this->input->post('set_konPas'),
            'set_konLing' => $this->input->post('set_konLing'),
            'cuci_tgn' => $this->input->post('cuci_tgn'),
            'keterangan' => $this->input->post('keterangan'),
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tgl_input' => date("Y-m-d H:i:s"),
            "id_staff" =>$data_staff->id_staff
        );
        $this->M_Form_Kebersihan_Tangan->update($id,$data);
    }

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}