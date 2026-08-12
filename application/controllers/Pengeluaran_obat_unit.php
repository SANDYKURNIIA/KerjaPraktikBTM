<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengeluaran_obat_unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Apotik');
        $this->load->model('M_Pengeluaran_unit');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pengeluaran_obat_unit';
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();


        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit($data_adm->stok);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_obat_bebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $perequest = $data_staff->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();


        $data = array(
            'tanggal' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'id_staff' => $data_staff->id_staff,
            'unit' => $perequest,
        );
        $this->M_Apotik->insert_tindakan($data, 'pengeluaran_obat_unit');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_tindakan_obat_bebas()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        //$depo = $this->input->post('depo');

        $perequest = $data->tipe;
        $id_tindakan = $this->input->post('id_pelayanan');
        $id_logistik = $this->input->post('id_list_tindakan');

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();

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
                'asal_tujuan' => "PENGELUARAN SENDIRI",
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
                'asal_tujuan' => "PENGELUARAN SENDIRI",
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
                'asal_tujuan' => "PENGELUARAN SENDIRI",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
        }

        $this->M_Apotik->insert_tindakan($datastok, $data_adm->stok);
        if ($perequest == 'stok_apotik') {
            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
        } else if ($perequest == 'stok_depo') {
            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Tampil_obat_bebas() //farmasi
    {
        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Pengeluaran_unit->selectObatBebas($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Pengeluaran_unit->selectObatBebas('', '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat_bebas . "\")' '><i class='fa fa-trash'></i></button>";

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_obat_bebas .   "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            // $time = strtotime($page_data[$i]->tanggal);
            // $tgl = strftime("%A, %d %B %Y", $time);
            // $waktu = strftime("%H:%M WIB", $time);
            $tanggal = indo_date2($page_data[$i]->tanggal);
            $keterangan = $page_data[$i]->keterangan;
            $out[$i] = array($no, $tombol, $hapus, $tanggal, $keterangan);
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
        $page_data = $this->M_Pengeluaran_unit->selectObatBebasById($id);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_stok . "\",\"" . $page_data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $jumlah_obat = $page_data[$i]->frek;

            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $hapus, $nama_obat, $jumlah_obat, $staff);
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
        $db = $this->db->get_where('obat_bebas', ['id_obat_bebas' => $id_tindakan])->result();
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
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;
        
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

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();

        $this->M_Pengeluaran_unit->delete_tindakan($id_tindakan, $data_adm->stok, 'id_stok');

        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_tindakan()
    {
        $id_tindakan = $this->input->post('id');
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
       
        $this->M_Pengeluaran_unit->delete_tindakan($id_tindakan, 'pengeluaran_obat_unit', 'id_obat_bebas');
        $this->db->delete($data_adm->stok, ['id_req'=>$id_tindakan,'asal_tujuan'=>'PENGELUARAN SENDIRI']);

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
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengeluaran_obat_unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Apotik');
        $this->load->model('M_Pengeluaran_unit');
    }
    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/Pengeluaran_obat_unit';
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();


        $page_data['obat'] = $this->M_Apotik->getNamaObatUnit($data_adm->stok);
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function insert_obat_bebas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data_staff = $this->session->userdata('data_auth');
        $perequest = $data_staff->tipe;
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();


        $data = array(
            'tanggal' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'id_staff' => $data_staff->id_staff,
            'unit' => $perequest,
        );
        $this->M_Apotik->insert_tindakan($data, 'pengeluaran_obat_unit');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function insert_tindakan_obat_bebas()
    {
        $data = $this->session->userdata('data_auth');
        $tgl =  date("Y-m-d H:i:s");
        //$depo = $this->input->post('depo');

        $perequest = $data->tipe;
        $id_tindakan = $this->input->post('id_pelayanan');
        $id_logistik = $this->input->post('id_list_tindakan');

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();

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
                'asal_tujuan' => "PENGELUARAN SENDIRI",
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
                'asal_tujuan' => "PENGELUARAN SENDIRI",
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
                'asal_tujuan' => "PENGELUARAN SENDIRI",
                'id_req' =>  $id_tindakan,
                'id_staff' => $data->id_staff,
            );
        }

        $this->M_Apotik->insert_tindakan($datastok, $data_adm->stok);
        if ($perequest == 'stok_apotik') {
            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_apotik', 'pr_apotik');
        } else if ($perequest == 'stok_depo') {
            $this->M_Apotik->update_perencanaan($id_logistik, 'stok_depo', 'pr_depo');
        }


        $out['status'] = "success";
        echo json_encode($out);
    }
    public function Tampil_obat_bebas() //farmasi
    {
        if ($this->input->post('mulai') != '' && $this->input->post('akhir') != '') {
            $page_data = $this->M_Pengeluaran_unit->selectObatBebas($this->input->post('mulai'), $this->input->post('akhir'));
        } else {
            $page_data = $this->M_Pengeluaran_unit->selectObatBebas('', '');
        }
        $out = null;
        for ($i = 0; $i < count($page_data); $i++) {
            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_tindakan(\"" . $page_data[$i]->id_obat_bebas . "\")' '><i class='fa fa-trash'></i></button>";

            $tombol =   "<button class='btn btn-warning btn-icon-anim btn-square' data-toggle='modal' onclick='tampilTindakanFarmasi(\"" . $page_data[$i]->id_obat_bebas .   "\")' '><i class='fa fa-rocket '></i></button>";
            $no = $i + 1;
            // $time = strtotime($page_data[$i]->tanggal);
            // $tgl = strftime("%A, %d %B %Y", $time);
            // $waktu = strftime("%H:%M WIB", $time);
            $tanggal = indo_date2($page_data[$i]->tanggal);
            $keterangan = $page_data[$i]->keterangan;
            $out[$i] = array($no, $tombol, $hapus, $tanggal, $keterangan);
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
        $page_data = $this->M_Pengeluaran_unit->selectObatBebasById($id);

        $out = null;

        for ($i = 0; $i < count($page_data); $i++) {
            // 

            $hapus =   "<button class='btn btn-danger btn-icon-anim btn-square' data-toggle='modal' onclick='hapus_obat(\"" . $page_data[$i]->id_stok . "\",\"" . $page_data[$i]->nama . "\")' '><i class='fa fa-trash'></i></button>";


            $no = $i + 1;
            $nama_obat = $page_data[$i]->nama;
            $jumlah_obat = $page_data[$i]->frek;

            $staff = $page_data[$i]->staff;


            $out[$i] = array($no, $hapus, $nama_obat, $jumlah_obat, $staff);
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
        $db = $this->db->get_where('obat_bebas', ['id_obat_bebas' => $id_tindakan])->result();
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
        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
        $stok = $data_adm->stok;
        
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

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();

        $this->M_Pengeluaran_unit->delete_tindakan($id_tindakan, $data_adm->stok, 'id_stok');

        $out['status'] = "success";
        echo json_encode($out);
    }
    function hapus_tindakan()
    {
        $id_tindakan = $this->input->post('id');
        $data = $this->session->userdata('data_auth');
        $perequest = $data->tipe;

        $data_adm = $this->db->get_where('admin_logistik_farmasi', ['unit' => $perequest])->row();
       
        $this->M_Pengeluaran_unit->delete_tindakan($id_tindakan, 'pengeluaran_obat_unit', 'id_obat_bebas');
        $this->db->delete($data_adm->stok, ['id_req'=>$id_tindakan,'asal_tujuan'=>'PENGELUARAN SENDIRI']);

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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
