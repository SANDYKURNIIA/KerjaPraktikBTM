<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan_pemakaian_cairan_infus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_IGD');
        $this->load->model('M_Erm');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm_ranap');
        $this->load->library('form_validation');
    }

    public function formCpci($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm->selectDataPasienbyid($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        // $page_data['no_hp'] = $selectPasien->no_hp;
        // $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_catatan_pemakaian_cairan_infus';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_list_per_id()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Erm_ranap->selectPemcairaninfus($id_pelayanan);

        $out = [];
        foreach ($page_data as $index => $data) {
            $no = $index + 1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='pilih(\"{$data->id_pengobatan}\")'><i class='icon-rocket'></i></button>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"{$data->id_pengobatan}\")'><i class='icon-trash'></i></button>";
            $edit = "<a href='" . base_url("Form_soap_rehab/edit_view/{$data->id_pengobatan}") . "' class='btn btn-warning'><i class='icon-pencil'></i> Edit</a>";

            // Format tanggal dan waktu
            $tanggal = strtotime($data->tanggal);
            $date = strftime("%A, %d %B %Y", $tanggal);
            $jam = $data->jam; // Perbaikan disini
			$staff = $data->staff;

            // Menyusun data output
            $out[] = [
                $no,
                $tombol,
                $hapus,
                $date, // Menggunakan $date yang telah diformat
                $jam,  // Menggunakan jam yang telah diformat
                $data->jenis_infus ?? null,
                $data->keterangan ?? null,
                $staff,
            ];
        }

        // Mengecek apakah $out berisi data
        if (empty($out)) {
            echo json_encode(['data' => []]); // Mengembalikan array kosong
        } else {
            echo json_encode(['data' => $out]);
        }
    }



    public function insert_catatan_pemakaian_cairan_infus()
    {
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $img = $this->input->post('ttd');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = "assets/images/" . uniqid(time(), true) . ".png";
        $success = file_put_contents($file, $data);
        $jam = $this->input->post('jam');
        $this->form_validation->set_rules('jenis_infus', 'Jenis Infus', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        if ($this->form_validation->run()) {
            $dataInsert = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'jam' => $jam,
                'jenis_infus' => $this->input->post('jenis_infus'),
                'keterangan' => $this->input->post('keterangan'),
                'ttd' => $file,
                'tanggal' => $tgl,
                'staff' => $staff,
            );

            $this->M_Erm_ranap->insert($dataInsert, 'catatan_pemakaian_cairan_infus');
            $out['status'] = "success";
        } else {
            $out = [
                'error' => true,
                'jenis_infus' => form_error('jenis_infus'),
                'keterangan' => form_error('keterangan'),
                'tanggal' => form_error('tanggal'),
                'jam' => form_error('jam'),
            ];
        }
        echo json_encode($out);
    }

    public function getPerRencana()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('catatan_pemakaian_cairan_infus', ['id_pengobatan' => $id])->row_array();
        if (count($db) > 0) {
            $db = $db;
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function hapus_catatan_pemakaian_cairan_infus()
    {
        $id = $this->input->post('id');
        $where = array(
            'id_pengobatan' => $id,
        );
        $this->M_Erm_ranap->delete($where, 'catatan_pemakaian_cairan_infus');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function edit_catatan_pemakaian_cairan_infus()
    {
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $id = $this->input->post('id');
        $img = $this->input->post('ttd');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = "assets/images/" . uniqid(time(), true) . ".png";
        $success = file_put_contents($file, $data);
        $this->form_validation->set_rules('jenis_infus', 'Jenis Infus', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        // Cek validasi form
        if ($this->form_validation->run()) {
            $data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'jenis_infus' => $this->input->post('jenis_infus'),
                'keterangan' => $this->input->post('keterangan'),
                'ttd' => $file, // hanya akan berisi nama file jika gambar valid
                'staff' => $staff,
            );

            // Panggil model untuk update
            $this->M_Erm_ranap->update_Pencairaninfus($id, $data);
            $out['status'] = "success";
        } else {
            $out = array(
                'error' => true,
                'diagnosis' => form_error('diagnosis'),
                'jenis_infus' => form_error('jenis_infus'),
                'keterangan' => form_error('keterangan'),
                'tanggal' => form_error('tanggal'),
                'jam' => form_error('jam'),
            );
        }

        echo json_encode($out);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan_pemakaian_cairan_infus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_IGD');
        $this->load->model('M_Erm');
        $this->load->model('M_Assembling');
        $this->load->model('M_Poli');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm_ranap');
        $this->load->library('form_validation');
    }

    public function formCpci($id_pelayanan, $id_history)
    {
        $selectPasien = $this->M_Erm->selectDataPasienbyid($id_pelayanan, $id_history);
        $staff = $this->session->userdata('data_auth');

        $page_data['nama'] = $selectPasien->nama;
        // $page_data['no_hp'] = $selectPasien->no_hp;
        // $page_data['alamat'] = $selectPasien->alamat . ', ' . $selectPasien->kelurahan . ', ' . $selectPasien->kecamatan . ', ' . $selectPasien->provinsi;
        $page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
        $page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
        $page_data['cara_bayar'] = $selectPasien->cara_bayar;
        $page_data['tgl_masuk'] = $selectPasien->tgl_masuk;
        $page_data['staff'] = $staff->id_staff;
        $page_data['no_rm'] = $selectPasien->no_rm;
        $page_data['id_pelayanan'] = $id_pelayanan;
        $page_data['id_history'] = $id_history;
        $page_data['agama'] = $selectPasien->agama;
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();

        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/Ranap/view_catatan_pemakaian_cairan_infus';
        $this->load->view('Main', $page_data);
        $this->load->view('assets/_footer');
    }
    public function tampil_list_per_id()
    {
        $id_pelayanan = $this->input->post('id_pelayanan');
        $page_data = $this->M_Erm_ranap->selectPemcairaninfus($id_pelayanan);

        $out = [];
        foreach ($page_data as $index => $data) {
            $no = $index + 1;
            $tombol = "<button class='btn btn-success btn-icon-anim btn square' onclick='pilih(\"{$data->id_pengobatan}\")'><i class='icon-rocket'></i></button>";
            $hapus = "<button class='btn btn-danger btn-icon-anim btn square' onclick='hapus(\"{$data->id_pengobatan}\")'><i class='icon-trash'></i></button>";
            $edit = "<a href='" . base_url("Form_soap_rehab/edit_view/{$data->id_pengobatan}") . "' class='btn btn-warning'><i class='icon-pencil'></i> Edit</a>";

            // Format tanggal dan waktu
            $tanggal = strtotime($data->tanggal);
            $date = strftime("%A, %d %B %Y", $tanggal);
            $jam = $data->jam; // Perbaikan disini
			$staff = $data->staff;

            // Menyusun data output
            $out[] = [
                $no,
                $tombol,
                $hapus,
                $date, // Menggunakan $date yang telah diformat
                $jam,  // Menggunakan jam yang telah diformat
                $data->jenis_infus ?? null,
                $data->keterangan ?? null,
                $staff,
            ];
        }

        // Mengecek apakah $out berisi data
        if (empty($out)) {
            echo json_encode(['data' => []]); // Mengembalikan array kosong
        } else {
            echo json_encode(['data' => $out]);
        }
    }



    public function insert_catatan_pemakaian_cairan_infus()
    {
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $img = $this->input->post('ttd');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = "assets/images/" . uniqid(time(), true) . ".png";
        $success = file_put_contents($file, $data);
        $jam = $this->input->post('jam');
        $this->form_validation->set_rules('jenis_infus', 'Jenis Infus', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        if ($this->form_validation->run()) {
            $dataInsert = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'jam' => $jam,
                'jenis_infus' => $this->input->post('jenis_infus'),
                'keterangan' => $this->input->post('keterangan'),
                'ttd' => $file,
                'tanggal' => $tgl,
                'staff' => $staff,
            );

            $this->M_Erm_ranap->insert($dataInsert, 'catatan_pemakaian_cairan_infus');
            $out['status'] = "success";
        } else {
            $out = [
                'error' => true,
                'jenis_infus' => form_error('jenis_infus'),
                'keterangan' => form_error('keterangan'),
                'tanggal' => form_error('tanggal'),
                'jam' => form_error('jam'),
            ];
        }
        echo json_encode($out);
    }

    public function getPerRencana()
    {
        $id = $this->input->post('id');
        $db = $this->db->get_where('catatan_pemakaian_cairan_infus', ['id_pengobatan' => $id])->row_array();
        if (count($db) > 0) {
            $db = $db;
            $db['status_dt'] = 'found';
        } else {
            $db = null;
            $db['status_dt'] = 'not found';
        }
        echo json_encode($db);
        exit;
    }
    public function hapus_catatan_pemakaian_cairan_infus()
    {
        $id = $this->input->post('id');
        $where = array(
            'id_pengobatan' => $id,
        );
        $this->M_Erm_ranap->delete($where, 'catatan_pemakaian_cairan_infus');
        $out['status'] = "success";
        echo json_encode($out);
    }
    public function edit_catatan_pemakaian_cairan_infus()
    {
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d h:i:s");
        $staff = $data->id_staff;
        $id = $this->input->post('id');
        $img = $this->input->post('ttd');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = "assets/images/" . uniqid(time(), true) . ".png";
        $success = file_put_contents($file, $data);
        $this->form_validation->set_rules('jenis_infus', 'Jenis Infus', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        // Cek validasi form
        if ($this->form_validation->run()) {
            $data = array(
                'id_pelayanan' => $this->input->post('id_pelayanan'),
                'id_history' => $this->input->post('id_history'),
                'no_rm' => $this->input->post('no_rm'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'jenis_infus' => $this->input->post('jenis_infus'),
                'keterangan' => $this->input->post('keterangan'),
                'ttd' => $file, // hanya akan berisi nama file jika gambar valid
                'staff' => $staff,
            );

            // Panggil model untuk update
            $this->M_Erm_ranap->update_Pencairaninfus($id, $data);
            $out['status'] = "success";
        } else {
            $out = array(
                'error' => true,
                'diagnosis' => form_error('diagnosis'),
                'jenis_infus' => form_error('jenis_infus'),
                'keterangan' => form_error('keterangan'),
                'tanggal' => form_error('tanggal'),
                'jam' => form_error('jam'),
            );
        }

        echo json_encode($out);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
