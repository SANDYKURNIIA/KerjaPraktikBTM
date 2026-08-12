<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class LayarPoli extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_LayarPoli');

    }
    
    public function index()
    {
        $this->load->view('assets/_header');
        // $data['poli_kandungan'] = $this->M_LayarPoli->POLI_KANDUNGAN();
        // $data['poli_bedah'] = $this->M_LayarPoli->POLI_BEDAH();
        // $data['poli_anak'] = $this->M_LayarPoli->POLI_ANAK();
        // $data['poli_tht'] = $this->M_LayarPoli->POLI_THT();
        // $data['poli_mata'] = $this->M_LayarPoli->POLI_MATA();
        // $data['poli_medic'] = $this->M_LayarPoli->POLI_REHABILITAS_MEDIC();
        // $data['kontrol_medic'] = $this->M_LayarPoli->KONTROL_REHABILITAS_MEDIC();
        // $data['poli_jantung'] = $this->M_LayarPoli->POLI_JANTUNG();
        // $data['poli_gigi'] = $this->M_LayarPoli->POLI_GIGI();
        // $data['poli_kulit_kelamin'] = $this->M_LayarPoli->POLI_KULIT_KELAMIN();
        // $data['poli_penyakit_dalam'] = $this->M_LayarPoli->POLI_PENYAKIT_DALAM();
        // $data['poli_umum'] = $this->M_LayarPoli->POLI_UMUM();

        $data['poli_kandungan'] = $this->M_LayarPoli->getAntrianPoli('HLGI4176K8');
        $data['poli_bedah'] = $this->M_LayarPoli->getAntrianPoli('MWK205D30K');
        $data['poli_anak'] = $this->M_LayarPoli->getAntrianPoli('E00RX703');
        $data['poli_tht'] = $this->M_LayarPoli->getAntrianPoli('O782EGU4PR');
        $data['poli_mata'] = $this->M_LayarPoli->getAntrianPoli('UQ81K76373');
        $data['poli_medic'] = $this->M_LayarPoli->getAntrianPoli('6E975PL694');
        $data['kontrol_medic'] = $this->M_LayarPoli->getAntrianPoli('6E975PL694');
        $data['poli_jantung'] = $this->M_LayarPoli->getAntrianPoli('I9NXY5VNQG');
        $data['poli_gigi'] = $this->M_LayarPoli->getAntrianPoli('ODI8643C27');
        $data['poli_kulit_kelamin'] = $this->M_LayarPoli->getAntrianPoli('2JZ09X4K22');
        $data['poli_penyakit_dalam'] = $this->M_LayarPoli->getAntrianPoli('24QRNLX29R');
        $data['poli_umum'] = $this->M_LayarPoli->getAntrianPoli('RZE28J1098');
        $data['poli_saraf'] = $this->M_LayarPoli->getAntrianPoli('XN5395D61');

        $play = $this->db->get('temp_panggil_antrian')->result();
        if(count($play)>0){
            $data['data'] = $this->M_LayarPoli->selectPlay();
        }else{
            $data['data'] = [
                'no'=>'',
                'kode'=>'',
                'poli'=>'',
                'nama'=>'',
                'tipe'=>'',
            ];
        }

        $data['kondisipoli'] = $this->M_LayarPoli->selectAntrianPoli();
        $data['kondisipolikandungan'] = $this->M_LayarPoli->selectAntrianPoliKandungan();
        $data['kondisipolibedah'] = $this->M_LayarPoli->selectAntrianPoliBedah();
        $data['kondisipolianak'] = $this->M_LayarPoli->selectAntrianPoliAnak();
        $data['kondisipolitht'] = $this->M_LayarPoli->selectAntrianPoliTht();
        $data['kondisipolimata'] = $this->M_LayarPoli->selectAntrianPoliMata();
        $data['kondisipolimedic'] = $this->M_LayarPoli->selectAntrianPoliMedic();
        $data['kondisipolicontrolmedic'] = $this->M_LayarPoli->selectAntrianPoliControlMedic();
        $data['kondisipolijantung'] = $this->M_LayarPoli->selectAntrianPoliJantung();
        $data['kondisipoligigi'] = $this->M_LayarPoli->selectAntrianPoliGigi();
        $data['kondisipolikulitkelamin'] = $this->M_LayarPoli->selectAntrianPoliKulitKelamin();
        $data['kondisipolipenyakitdalam'] = $this->M_LayarPoli->selectAntrianPoliPenyakitDalam();
        $data['kondisipoliumum'] = $this->M_LayarPoli->selectAntrianPoliUmum();
        $data['kondisipolipsikolog'] = $this->M_LayarPoli->selectAntrianPoliPsikolog();
      
        $this->load->view('LayarPoli',$data);
        $this->load->view('assets/_footer');
    }

    public function deleteSuara(){
        $this->M_LayarPoli->deleteplaySuara('temp_panggil_antrian');
        $out['status']="ok";
        echo json_encode($out);
    }

}
=======
<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class LayarPoli extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_LayarPoli');

    }
    
    public function index()
    {
        $this->load->view('assets/_header');
        // $data['poli_kandungan'] = $this->M_LayarPoli->POLI_KANDUNGAN();
        // $data['poli_bedah'] = $this->M_LayarPoli->POLI_BEDAH();
        // $data['poli_anak'] = $this->M_LayarPoli->POLI_ANAK();
        // $data['poli_tht'] = $this->M_LayarPoli->POLI_THT();
        // $data['poli_mata'] = $this->M_LayarPoli->POLI_MATA();
        // $data['poli_medic'] = $this->M_LayarPoli->POLI_REHABILITAS_MEDIC();
        // $data['kontrol_medic'] = $this->M_LayarPoli->KONTROL_REHABILITAS_MEDIC();
        // $data['poli_jantung'] = $this->M_LayarPoli->POLI_JANTUNG();
        // $data['poli_gigi'] = $this->M_LayarPoli->POLI_GIGI();
        // $data['poli_kulit_kelamin'] = $this->M_LayarPoli->POLI_KULIT_KELAMIN();
        // $data['poli_penyakit_dalam'] = $this->M_LayarPoli->POLI_PENYAKIT_DALAM();
        // $data['poli_umum'] = $this->M_LayarPoli->POLI_UMUM();

        $data['poli_kandungan'] = $this->M_LayarPoli->getAntrianPoli('HLGI4176K8');
        $data['poli_bedah'] = $this->M_LayarPoli->getAntrianPoli('MWK205D30K');
        $data['poli_anak'] = $this->M_LayarPoli->getAntrianPoli('E00RX703');
        $data['poli_tht'] = $this->M_LayarPoli->getAntrianPoli('O782EGU4PR');
        $data['poli_mata'] = $this->M_LayarPoli->getAntrianPoli('UQ81K76373');
        $data['poli_medic'] = $this->M_LayarPoli->getAntrianPoli('6E975PL694');
        $data['kontrol_medic'] = $this->M_LayarPoli->getAntrianPoli('6E975PL694');
        $data['poli_jantung'] = $this->M_LayarPoli->getAntrianPoli('I9NXY5VNQG');
        $data['poli_gigi'] = $this->M_LayarPoli->getAntrianPoli('ODI8643C27');
        $data['poli_kulit_kelamin'] = $this->M_LayarPoli->getAntrianPoli('2JZ09X4K22');
        $data['poli_penyakit_dalam'] = $this->M_LayarPoli->getAntrianPoli('24QRNLX29R');
        $data['poli_umum'] = $this->M_LayarPoli->getAntrianPoli('RZE28J1098');
        $data['poli_saraf'] = $this->M_LayarPoli->getAntrianPoli('XN5395D61');

        $play = $this->db->get('temp_panggil_antrian')->result();
        if(count($play)>0){
            $data['data'] = $this->M_LayarPoli->selectPlay();
        }else{
            $data['data'] = [
                'no'=>'',
                'kode'=>'',
                'poli'=>'',
                'nama'=>'',
                'tipe'=>'',
            ];
        }

        $data['kondisipoli'] = $this->M_LayarPoli->selectAntrianPoli();
        $data['kondisipolikandungan'] = $this->M_LayarPoli->selectAntrianPoliKandungan();
        $data['kondisipolibedah'] = $this->M_LayarPoli->selectAntrianPoliBedah();
        $data['kondisipolianak'] = $this->M_LayarPoli->selectAntrianPoliAnak();
        $data['kondisipolitht'] = $this->M_LayarPoli->selectAntrianPoliTht();
        $data['kondisipolimata'] = $this->M_LayarPoli->selectAntrianPoliMata();
        $data['kondisipolimedic'] = $this->M_LayarPoli->selectAntrianPoliMedic();
        $data['kondisipolicontrolmedic'] = $this->M_LayarPoli->selectAntrianPoliControlMedic();
        $data['kondisipolijantung'] = $this->M_LayarPoli->selectAntrianPoliJantung();
        $data['kondisipoligigi'] = $this->M_LayarPoli->selectAntrianPoliGigi();
        $data['kondisipolikulitkelamin'] = $this->M_LayarPoli->selectAntrianPoliKulitKelamin();
        $data['kondisipolipenyakitdalam'] = $this->M_LayarPoli->selectAntrianPoliPenyakitDalam();
        $data['kondisipoliumum'] = $this->M_LayarPoli->selectAntrianPoliUmum();
        $data['kondisipolipsikolog'] = $this->M_LayarPoli->selectAntrianPoliPsikolog();
      
        $this->load->view('LayarPoli',$data);
        $this->load->view('assets/_footer');
    }

    public function deleteSuara(){
        $this->M_LayarPoli->deleteplaySuara('temp_panggil_antrian');
        $out['status']="ok";
        echo json_encode($out);
    }

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
