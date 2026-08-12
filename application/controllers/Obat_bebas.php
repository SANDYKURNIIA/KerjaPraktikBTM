<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Obat_bebas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Apotik');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Obat_bebas_unit';
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        } else if ($perequest == "isolasi") {
            $stok = "stok_isolasi";
        } else if ($perequest == "icu") {
            $stok = "stok_icu";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "baksos") {
            $stok = "stok_baksos";
        } else if ($perequest == "gizi") {
            $stok = "stok_gizi";
        } else if ($perequest == "igdfarmasi") {
            $stok = "stok_igdfarmasi";
        } else if ($perequest == "igdapotik") {
            $stok = "stok_igd";
        } else if ($perequest == "ipcn") {
            $stok = "stok_ipcn";
        } else if ($perequest == "kebidanan") {
            $stok = "stok_kebidanan";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "stok_kundur";
        } else if ($perequest == "labor") {
            $stok = "stok_labor";
        } else if ($perequest == "mcu") {
            $stok = "stok_mcu";
        } else if ($perequest == "monev") {
            $stok = "stok_monev";
        } else if ($perequest == "nicu") {
            $stok = "stok_nicu";
        } else if ($perequest == "ok") {
            $stok = "stok_ok";
        } else if ($perequest == "obat expire") {
            $stok = "stok_obatexpire";
        } else if ($perequest == "radiologi") {
            $stok = "stok_radiologi";
        } else if ($perequest == "rawatinap") {
            $stok = "stok_ranap";
        } else if ($perequest == "rawatjalan") {
            $stok = "stok_rajal";
        } else if ($perequest == "retur obat") {
            $stok = "stok_returobat";
        } else if ($perequest == "sungairaya") {
            $stok = "stok_sungairaya";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "bpi") {
            $stok = "stok_bpi";
        }

        $page_data['cara_bayar'] = $this->M_Pencarian_Pasien->getCaraBayar();
        $page_data['signa'] = $this->M_Apotik->getSigna();
        $page_data['cara_pemakaian_obat'] = $this->M_Apotik->getCaraPakai();
        $page_data['dokter'] = $this->db->get('dokter')->result_array();
        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit($stok);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_obat_bebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $perequest = $data_staff->tipe;
        if ($perequest == "apotik") {
            $stok = "APOTIK";
        } else if ($perequest == "bpjs") {
            $stok = "BPJS";
        } else if ($perequest == "deporanap") {
            $stok = "DEPO RANAP";
        } else if ($perequest == "isolasi") {
            $stok = "ISOLASI";
        } else if ($perequest == "icu") {
            $stok = "ICU";
        } else if ($perequest == "vip") {
            $stok = "VIP";
        } else if ($perequest == "baksos") {
            $stok = "BAKSOS";
        } else if ($perequest == "gizi") {
            $stok = "GIZI";
        } else if ($perequest == "igdfarmasi") {
            $stok = "IGD FARMASI";
        } else if ($perequest == "igdapotik") {
            $stok = "IGD APOTIK";
        } else if ($perequest == "ipcn") {
            $stok = "IPCN";
        } else if ($perequest == "kebidanan") {
            $stok = "KEBIDANAN";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "Klinik Pratama Kundur";
        } else if ($perequest == "labor") {
            $stok = "LABOR";
        } else if ($perequest == "mcu") {
            $stok = "MCU";
        } else if ($perequest == "monev") {
            $stok = "MONEV";
        } else if ($perequest == "nicu") {
            $stok = "NICU";
        } else if ($perequest == "ok") {
            $stok = "OK";
        } else if ($perequest == "obat expire") {
            $stok = "OBAT EXPIRE";
        } else if ($perequest == "radiologi") {
            $stok = "RADIOLOGI";
        } else if ($perequest == "rawatinap") {
            $stok = "RAWAT INAP";
        } else if ($perequest == "rawatjalan") {
            $stok = "RAWAT JALAN";
        } else if ($perequest == "retur obat") {
            $stok = "RETUR OBAT";
        } else if ($perequest == "sungairaya") {
            $stok = "SUNGAI RAYA";
        } else if ($perequest == "vip") {
            $stok = "VIP";
        } else if ($perequest == "bpi") {
            $stok = "BPI";
        }


        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal' => date("Y-m-d H:i:s"),
            'cara_bayar' => $this->input->post('cara_bayar'),
            'keterangan' => $this->input->post('keterangan'),
            'id_dokter' => $this->input->post('id_dokter'),
            'dpjp' => $this->input->post('dpjp'),
            'id_staff' => $data_staff->id_staff,
            'unit' => $stok
        );
        $this->M_Apotik->insert_tindakan($data, 'obat_bebas');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_tindakan_obat_bebas()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        //$depo = $this->input->post('depo');
        $id_tindakan = uniqid();

        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
            $depo = "APOTIK";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
            $depo = "BPJS";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
            $depo = "RANAP";
        } else if ($perequest == "isolasi") {
            $stok = "stok_isolasi";
            $depo = "ISOLASI";
        } else if ($perequest == "icu") {
            $stok = "stok_icu";
            $depo = "ICU";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
            $depo = "VIP";
        } else if ($perequest == "baksos") {
            $stok = "stok_baksos";
            $depo = "BAKSOS";
        } else if ($perequest == "gizi") {
            $stok = "stok_gizi";
            $depo = "GIZI";
        } else if ($perequest == "igdfarmasi") {
            $stok = "stok_igdfarmasi";
            $depo = "IGD FARMASI";
        } else if ($perequest == "igdapotik") {
            $stok = "stok_igd";
            $depo = "IGD";
        } else if ($perequest == "ipcn") {
            $stok = "stok_ipcn";
            $depo = "IPCN";
        } else if ($perequest == "kebidanan") {
            $stok = "stok_kebidanan";
            $depo = "KEBIDANAN";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "stok_kundur";
            $depo = "Klinik Pratama Kundur";
        } else if ($perequest == "labor") {
            $stok = "stok_labor";
            $depo = "LABOR";
        } else if ($perequest == "mcu") {
            $stok = "stok_mcu";
            $depo = "MCU";
        } else if ($perequest == "monev") {
            $stok = "stok_monev";
            $depo = "MONEV";
        } else if ($perequest == "nicu") {
            $stok = "stok_nicu";
            $depo = "NICU";
        } else if ($perequest == "ok") {
            $stok = "stok_ok";
            $depo = "OK";
        } else if ($perequest == "obat expire") {
            $stok = "stok_obatexpire";
            $depo = "OBAT EXPIRE";
        } else if ($perequest == "radiologi") {
            $stok = "stok_radiologi";
            $depo = "RADIOLOGI";
        } else if ($perequest == "rawatinap") {
            $stok = "stok_ranap";
            $depo = "RAWAT INAP";
        } else if ($perequest == "rawatjalan") {
            $stok = "stok_rajal";
            $depo = "RAWAT JALAN";
        } else if ($perequest == "retur obat") {
            $stok = "stok_returobat";
            $depo = "RETUR OBAT";
        } else if ($perequest == "sungairaya") {
            $stok = "stok_sungairaya";
            $depo = "SUNGAI RAYA";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
            $depo = "VIP";
        } else if ($perequest == "bpi") {
            $stok = "stok_bpi";
            $depo = "BPI";
        }
        $page_data = array(
            'id_tindakan_farmasi' =>  $id_tindakan,
            'harga' => $this->input->post('harga'),
            'frek' => $this->input->post('frek'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'id_resep' => 'obat_bebas',
            'id_list_tindakan' => $this->input->post('id_list_tindakan'),
            'total' => $this->input->post('total'),
            'tipe' => "NON",
            'jumlah_racikan' => 0,
            'kadaluarsa' => $this->input->post('expire'),
            'tanggal' => $tgl,
            'id_staff' => $data->id_staff,
            'id_signa' => $this->input->post('signa'),
            'id_cara_pakai' =>  $this->input->post('cara_pakai'),
            'depo' => $depo,
            'hna' => $this->input->post('harga'),
            'margin' => $this->input->post('margin'),
            'disc' => $this->input->post('disc'),
            'keterangan' => $this->input->post('ket'),
        );
        $this->M_Apotik->insert_tindakan($page_data, 'tindakan_farmasi');

        if ($perequest == "apotik") {
            $obat = $this->M_Apotik->getSumObatApotik($this->input->post('id_list_tindakan'));

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => $this->input->post('jumlahKurang'),
                'saldo' => $obat['stok'] + ($this->input->post('jumlahKurang')),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
        } else if ($perequest == "deporanap") {
            $obat = $this->M_Apotik->getSumObatRanap($this->input->post('id_list_tindakan'));

            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => $this->input->post('jumlahKurang'),
                'saldo' => $obat['stok'] + ($this->input->post('jumlahKurang')),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
        } else {
            $datastok = array(
                'id_stok' => uniqid(),
                'id_logistik' => $this->input->post('id_list_tindakan'),
                'tgl' => $tgl,
                'keterangan' => "KELUAR",
                'frek' => $this->input->post('jumlahKurang'),
                'kadaluarsa' => $this->input->post('expire'),
                'asal_tujuan' => "PENJUALAN",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
        }

        $this->M_Apotik->insert_tindakan($datastok, $stok);


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Tampil_obat_bebas() //farmasi
    {
        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Apotik->selectObatBebas($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Apotik->selectObatBebas('', '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            if (empty($page_data[$i]->id_pelayanan)) {
                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat_bebas . "\",\"" . $page_data[$i]->nama  . "\")' '><i class='fa fa-trash'></i></button>";
            } else {
                $hapus =   "";
            }
            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_obat_bebas .  "\",\"" . $page_data[$i]->cara_bayar . "\")' '><i class='fa fa-rocket '></i></button>";
            $retur = "<button class='btn btn-success btn-icon-anim btn-square'  onclick='edit_data_tindakan(\"" . $page_data[$i]->id_obat_bebas . "\")'><i class='icon-rocket'></i></button>";
            $edit = "<button class='btn btn-primary btn-icon-anim btn-square'  onclick='edit_data(\"" . $page_data[$i]->id_obat_bebas . "\")'><i class='icon-rocket'></i></button>";
            $no = $i + 1;
            $time = strtotime($page_data[$i]->tanggal);
            $tgl = strftime("%A, %d %B %Y", $time);
            $waktu = strftime("%H:%M WIB", $time);
            $nama = $page_data[$i]->nama;
            $carabayar = $page_data[$i]->carabayar;
            $dpjp = $page_data[$i]->dpjp;
            $keterangan = $page_data[$i]->keterangan;
            $out[$i] = array($no, $tombol,$retur,$edit, $hapus, $tgl, $waktu, $nama, $carabayar, $dpjp, $keterangan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function tampil_tindakan_obat_bebas()        
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Apotik->selectObatBebasById($id);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            $obat_bebas = $this->db->get_where('obat_bebas',['id_obat_bebas'=>$page_data[$i]->id_pelayanan])->row();
            // $tombol =   "<button class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->jenis_resep.  "\")' '><i class='fa fa-rocket '></i></button>";
            $signa =   "<button class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' onclick='cetakSigna(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='icon-printer'></i></button>";
            $edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket'></i></button>";
            
            if($obat_bebas->id_nota == NULL){
                $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";
            }else{
                $hapus ="";
            }

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = $page_data[$i]->frek;
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $edit, $hapus, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $signa);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
    public function print_obat_bebas($id_resep)
    {
        $staff = $this->session->userdata('data_auth');
        $id = uniqid();

        $nota = $this->M_Apotik->getNotaBebas($id_resep);
        $max = $this->M_Apotik->getMax()->indeks;

        $max = ($max == 0) ? 1 : $max + 1;
        $kode = ($staff->tipe == "apotik") ? "FRJ" : "FRI";
        $no_nota = "NB." . $kode . "." . date("Ydm") . "." . sprintf('%04d', $max);

        if (count($nota) > 0) {
            // do nothing
        } else {
            $data_nota = [
                'id_nota_resep' => $id,
                'indeks' => $max,
                'no_nota' => $no_nota,
                'tanggal' => date("Y-m-d H:i:s"),
                'tipe' => 'bebas',
                'staff' => $staff->id_staff
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');


            $resep = array(
                'id_nota' => $id
            );
            $where = array(
                'id_obat_bebas' => $id_resep
            );
            $this->M_Apotik->update($resep, $where, 'obat_bebas');
        }


        $data['nota'] = $this->M_Apotik->getNotaBebas($id_resep)[0]->no_nota;
        $data['resep'] = $this->M_Apotik->getObatBebasById($id_resep);
        $data['pasien'] = $this->M_Apotik->getDataObatBebas($id_resep);
        $this->load->view('print/cetak_obat_bebas', $data);
    }

    public function print_retur($id_resep)
    {
        $staff = $this->session->userdata('data_auth');


        $id = uniqid();
        $tgl = date("Y-m-d H:i:s");
        $nota = $this->M_Apotik->getNotaRetur($id_resep);
        $max = $this->M_Apotik->getMax()->indeks;

        $max = ($max == 0) ? 1 : $max + 1;
        $kode = ($staff->tipe == "apotik") ? "FRJ" : "FRI";
        $no_nota = "NR." . $kode . "." . date("Ydm") . "." . sprintf('%04d', $max);

        if (count($nota) > 0) {
            // do nothing
        } else {
            $data_nota = [
                'id_nota_resep' => $id,
                'indeks' => $max,
                'no_nota' => $no_nota,
                'tanggal' => date("Y-m-d H:i:s"),
                'tipe' => 'retur resep',
                'staff' => $staff->id_staff
            ];
            $this->M_Apotik->insert_tindakan($data_nota, 'nota_resep');


            $resep = array(
                'id_nota_retur' => $id
            );
            $where = array(
                'id_resep' => $id_resep
            );
            $this->M_Apotik->update($resep, $where, 'resep_obat');
        }

        $data['resep'] = $this->M_Apotik->getObatReturBebasById($id_resep);
        $data['nota'] = $this->M_Apotik->getNotaRetur($id_resep)[0]->no_nota;
       
        $data['pasien'] = $this->M_Apotik->getDataObatBebas($id_resep);
        $this->load->view('print/cetak_obat_bebas', $data);
    }
    public function print_signa_obat_bebas($id_tindakan)
    {
        $data['signa'] = $this->M_Apotik->getSignaObatBebasById($id_tindakan);
        $this->load->view('print/cetak_signa_obat_bebas', $data);
    }
    public function cetak_signa_bebas($id)
    {
        $data['pasien'] = $this->M_Apotik->getDataObatBebas($id);
        $data['signa'] = $this->M_Apotik->getSignaObatBebasByPasien($id);
        $this->load->view('print/cetak_signa_bebas', $data);
    }
    public function getDataObat()
    {
        $id_tindakan = $this->input->post('id_tindakan');
        $db = $this->M_Apotik->getDataObat($id_tindakan);
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function getDataPasien()
    {
        $id_tindakan = $this->input->post('pelayanan');
        $db = $this->db->get_where('obat_bebas',['id_obat_bebas'=>$id_tindakan])->result();
        if (count($db) > 0) {
            $db = $db[0];
            $db->status_dt = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function update_obat()
    {
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        } else if ($perequest == "isolasi") {
            $stok = "stok_isolasi";
        } else if ($perequest == "icu") {
            $stok = "stok_icu";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "baksos") {
            $stok = "stok_baksos";
        } else if ($perequest == "gizi") {
            $stok = "stok_gizi";
        } else if ($perequest == "igdfarmasi") {
            $stok = "stok_igdfarmasi";
        } else if ($perequest == "igdapotik") {
            $stok = "stok_igd";
        } else if ($perequest == "ipcn") {
            $stok = "stok_ipcn";
        } else if ($perequest == "kebidanan") {
            $stok = "stok_kebidanan";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "stok_kundur";
        } else if ($perequest == "labor") {
            $stok = "stok_labor";
        } else if ($perequest == "mcu") {
            $stok = "stok_mcu";
        } else if ($perequest == "monev") {
            $stok = "stok_monev";
        } else if ($perequest == "nicu") {
            $stok = "stok_nicu";
        } else if ($perequest == "ok") {
            $stok = "stok_ok";
        } else if ($perequest == "obat expire") {
            $stok = "stok_obatexpire";
        } else if ($perequest == "radiologi") {
            $stok = "stok_radiologi";
        } else if ($perequest == "rawatinap") {
            $stok = "stok_ranap";
        } else if ($perequest == "rawatjalan") {
            $stok = "stok_rajal";
        } else if ($perequest == "retur obat") {
            $stok = "stok_returobat";
        } else if ($perequest == "sungairaya") {
            $stok = "stok_sungairaya";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "bpi") {
            $stok = "stok_bpi";
        }
        $data = array(
            'frek' => $this->input->post('jumlah'),
            'total' => $this->input->post('total'),
        );
        $where = array(
            'id_tindakan_farmasi' => $this->input->post('id')
        );
        $this->M_Apotik->update($data, $where, 'tindakan_farmasi');
        $out['status'] = "success";
        $datastok = array(
            'frek' => $this->input->post('jumlah') * -1
        );
        $where_stok = array(
            'id_req' => $this->input->post('id')
        );


        $this->M_Apotik->update($datastok, $where_stok, $stok);

        $out['status'] = "success";
        echo json_encode($out);
    }
    public function update_obat_bebas()
    {
        $staff = $this->session->userdata('data_auth');
        
        $data = array(
            'nama' => $this->input->post('nama'),
            'cara_bayar' => $this->input->post('cara_bayar'),
            'keterangan' => $this->input->post('keterangan'),
            'dpjp' => $this->input->post('dpjp'),
            'id_dokter' => $this->input->post('id_dokter'),
        );
        $where = array(
            'id_obat_bebas' => $this->input->post('id_obat_bebas')
        );
        $this->M_Apotik->update($data, $where, 'obat_bebas');
        $out['status'] = "success";
        
        echo json_encode($out);
    }

    function hapus_obat()
    {
        $id_tindakan = $this->input->post('id');

        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        } else if ($perequest == "isolasi") {
            $stok = "stok_isolasi";
        } else if ($perequest == "icu") {
            $stok = "stok_icu";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "baksos") {
            $stok = "stok_baksos";
        } else if ($perequest == "gizi") {
            $stok = "stok_gizi";
        } else if ($perequest == "igdfarmasi") {
            $stok = "stok_igdfarmasi";
        } else if ($perequest == "igdapotik") {
            $stok = "stok_igd";
        } else if ($perequest == "ipcn") {
            $stok = "stok_ipcn";
        } else if ($perequest == "kebidanan") {
            $stok = "stok_kebidanan";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "stok_kundur";
        } else if ($perequest == "labor") {
            $stok = "stok_labor";
        } else if ($perequest == "mcu") {
            $stok = "stok_mcu";
        } else if ($perequest == "monev") {
            $stok = "stok_monev";
        } else if ($perequest == "nicu") {
            $stok = "stok_nicu";
        } else if ($perequest == "ok") {
            $stok = "stok_ok";
        } else if ($perequest == "obat expire") {
            $stok = "stok_obatexpire";
        } else if ($perequest == "radiologi") {
            $stok = "stok_radiologi";
        } else if ($perequest == "rawatinap") {
            $stok = "stok_ranap";
        } else if ($perequest == "rawatjalan") {
            $stok = "stok_rajal";
        } else if ($perequest == "retur obat") {
            $stok = "stok_returobat";
        } else if ($perequest == "sungairaya") {
            $stok = "stok_sungairaya";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "bpi") {
            $stok = "stok_bpi";
        }

        $this->M_Apotik->delete_obat($id_tindakan, $stok);
        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_tindakan()
    {
        $id_tindakan = $this->input->post('id');
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        if ($perequest == "apotik") {
            $stok = "stok_apotik";
        } else if ($perequest == "bpjs") {
            $stok = "stok_bpjs";
        } else if ($perequest == "deporanap") {
            $stok = "stok_depo";
        } else if ($perequest == "isolasi") {
            $stok = "stok_isolasi";
        } else if ($perequest == "icu") {
            $stok = "stok_icu";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "baksos") {
            $stok = "stok_baksos";
        } else if ($perequest == "gizi") {
            $stok = "stok_gizi";
        } else if ($perequest == "igdfarmasi") {
            $stok = "stok_igdfarmasi";
        } else if ($perequest == "igdapotik") {
            $stok = "stok_igd";
        } else if ($perequest == "ipcn") {
            $stok = "stok_ipcn";
        } else if ($perequest == "kebidanan") {
            $stok = "stok_kebidanan";
        } else if ($perequest == "Klinik Pratama Kundur") {
            $stok = "stok_kundur";
        } else if ($perequest == "labor") {
            $stok = "stok_labor";
        } else if ($perequest == "mcu") {
            $stok = "stok_mcu";
        } else if ($perequest == "monev") {
            $stok = "stok_monev";
        } else if ($perequest == "nicu") {
            $stok = "stok_nicu";
        } else if ($perequest == "ok") {
            $stok = "stok_ok";
        } else if ($perequest == "obat expire") {
            $stok = "stok_obatexpire";
        } else if ($perequest == "radiologi") {
            $stok = "stok_radiologi";
        } else if ($perequest == "rawatinap") {
            $stok = "stok_ranap";
        } else if ($perequest == "rawatjalan") {
            $stok = "stok_rajal";
        } else if ($perequest == "retur obat") {
            $stok = "stok_returobat";
        } else if ($perequest == "sungairaya") {
            $stok = "stok_sungairaya";
        } else if ($perequest == "vip") {
            $stok = "stok_vip";
        } else if ($perequest == "bpi") {
            $stok = "stok_bpi";
        }
        $obat = $this->db->get_where('tindakan_farmasi', ['id_pelayanan' => $id_tindakan])->result();
        foreach ($obat as $row) {
            $this->M_Apotik->delete_obat($row->id_tindakan_farmasi, $stok);
        }
        $this->M_Apotik->delete_tindakan($id_tindakan, 'obat_bebas', 'id_obat_bebas');




        $out['status'] = "success";
        echo json_encode($out);
    }
    public function print_resep($id_resep)
    {
        $data['resep'] = $this->M_Apotik->selectObatBebasById($id_resep);
        $db = $this->db->query("SELECT o.*, c.nama cara_bayar
        from obat_bebas o, cara_bayar c
        where o.cara_bayar = c.id_cara_bayar and o.id_obat_bebas ='$id_resep'")->row_array();
        if ($db['id_dokter'] != "" || $db['id_dokter'] != null) {
            $data['dokter'] = $this->db->get_where("dokter", ['id_dokter' => $db['id_dokter']])->row()->foto;
        } else {
            $data['dokter'] = "";
        }


        $data['pasien'] = $db;
        $this->load->view('print/cetak_resep_bebas', $data);
    }
    public function tampil_total_obat()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->db->query("SELECT SUM(total) total from tindakan_farmasi where id_pelayanan = '$id_pelayanan'")->result();
        $out = null;

        for ($i = 0; $i < count($data); $i++) {
            $id_tindakan = "Rp. " . number_format($data[$i]->total, 0, ',', '.');
            $out[$i] = array($id_tindakan);
        }

        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $data['data'] = $out;
            echo json_encode($data);
            exit;
        }
    }
    public function getNamaObatReturn()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $data = $this->M_Apotik->getNamaObatReturnBebas($id_pelayanan);

        echo json_encode($data);
    }
    public function tampil_tindakan_obat_retur()
    {
        $id = $this->input->post('id');
        $page_data = $this->M_Apotik->selectRiwayatPasienReturBebasById($id);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 
            // $tombol =   "<a class='btn btn-success btn-icon-anim btn-square' data-toggle='modal' onclick='pilih_obat(\"" . $page_data[$i]->id_resep ."\",\"" .$page_data[$i]->jenis_resep.  "\")' '><i class='fa fa-rocket '></i></button>";
            $signa =   "<a class='btn btn-primary btn-icon-anim btn-square' data-toggle='modal' href='" . base_url('Apotik_poli/print_signa_obat_bebas/') . $page_data[$i]->id_tindakan_farmasi  . "' '><i class='icon-printer'></i></a>";
            $edit =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='edit_obat(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->id_pelayanan . "\")' '><i class='fa fa-rocket'></i></a>";
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat_retur(\"" . $page_data[$i]->id_tindakan_farmasi . "\",\"" . $page_data[$i]->nama . "\",\"" . $page_data[$i]->depo . "\")' '><i class='fa fa-trash'></i></button>";

            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $time = strtotime($page_data[$i]->kadaluarsa);
            $kadaluarsa = strftime("%A, %d %B %Y ", $time);
            $harga_obat = "Rp " . number_format($page_data[$i]->total / $page_data[$i]->frek, 0, ',', '.');
            $jumlah_obat = abs($page_data[$i]->frek);
            $depo = $page_data[$i]->depo;
            $total = "Rp " . number_format($page_data[$i]->total, 0, ',', '.');
            $ket = $page_data[$i]->keterangan;
            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $nama_obat, $kadaluarsa, $harga_obat, $jumlah_obat, $depo, $total, $ket, $staff, $hapus);
        }
        if ($out == null) {
            echo '{"data":""}';
            exit;
        } else {
            $page_data['data'] = $out;
            echo json_encode($page_data);
            exit;
        }
    }
}

