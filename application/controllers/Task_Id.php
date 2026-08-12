<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_Id extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Task_id'); // Pastikan tidak ada spasi tambahan di sini
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/TaskId';
        $data['schedule_antrol'] = $this->M_Task_id->getScheduleData();
        $data['pasien'] = $this->M_Task_id->getScheduleData();
        $data['schedule_antrol_task'] = $this->M_Task_id->getScheduleData();
        $this->load->view('Main', $page_data, $data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_TaskId()
    {
        $page_data = $this->M_Task_id->getScheduleData();
        $out = $page_data;
        $data['data'] = $out;
        echo json_encode($data);
        exit;
    }

    public function Tampil_Range_Task_Id()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Task_id->getScheduleDataByDateRange($mulai, $akhir);

        $output = array(
            "data" => $data
        );

        echo json_encode($output);
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_Id extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
        $this->load->model('M_Task_id'); // Pastikan tidak ada spasi tambahan di sini
    }

    public function index()
    {
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'page_content/TaskId';
        $data['schedule_antrol'] = $this->M_Task_id->getScheduleData();
        $data['pasien'] = $this->M_Task_id->getScheduleData();
        $data['schedule_antrol_task'] = $this->M_Task_id->getScheduleData();
        $this->load->view('Main', $page_data, $data);
        $this->load->view('assets/_footer');
    }

    public function Tampil_TaskId()
    {
        $page_data = $this->M_Task_id->getScheduleData();
        $out = $page_data;
        $data['data'] = $out;
        echo json_encode($data);
        exit;
    }

    public function Tampil_Range_Task_Id()
    {
        $mulai = $this->input->post('mulai');
        $akhir = $this->input->post('akhir');

        $data = $this->M_Task_id->getScheduleDataByDateRange($mulai, $akhir);

        $output = array(
            "data" => $data
        );

        echo json_encode($output);
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
