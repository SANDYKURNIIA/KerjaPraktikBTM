<<<<<<< HEAD
<?php

class M_KunjunganPoli extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_id($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function selectDataKunjunganPoli($tgl)
    {
        // $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->like('tgl_masuk', $tgl);
        $this->db->from('v_kunjungan_poli');
        // $this->db->where('jenis_pelayanan','POLI');
        return $this->db->get()->result();
    }
    public function selectDataKunjunganPoliRange($mulai, $akhir)
    {
        $this->db->select('*');
        $this->db->from('v_kunjungan_poli');
        // $this->db->where('jenis_pelayanan','POLI');
        $this->db->where('tgl_masuk >=', $mulai);
        $this->db->where('tgl_masuk <=', $akhir);
        return $this->db->get()->result();
    }
    public function selectDataWaktuTunggu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT
    s.tanggalperiksa,
    s.kodebooking,
    p.no_rm,
    p.nama as pasien,
    p.no_bpjs,
    p.no_ktp,
    p.no_hp,
    l.nama_panjang AS poli,
    s.namadokter,
    DATE_FORMAT(FROM_UNIXTIME(t3.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task3,
    DATE_FORMAT(FROM_UNIXTIME(t4.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task4,
    DATE_FORMAT(FROM_UNIXTIME(t5.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task5,
    COALESCE(
        TIME_FORMAT(
            TIMEDIFF(
                FROM_UNIXTIME(t4.waktu / 1000),
                FROM_UNIXTIME(t3.waktu / 1000)
            ),
            '%H:%i:%s'
        ),
        'Tidak ada Task ID 3 atau 4'
    ) AS rentang_waktu_task3_ke_task4,
    CASE
        WHEN t3.taskid IS NULL THEN 'Tidak ada Task ID 3'
        WHEN t4.taskid IS NULL THEN 'Tidak ada Task ID 4'
        WHEN t5.taskid IS NULL THEN 'Tidak ada Task ID 5'
        ELSE 'Ada kedua Task ID'
    END AS status_task_id_3_4
FROM
    schedule_antrol s
INNER JOIN
    pasien p ON s.nomorkartu = p.no_bpjs
INNER JOIN
    list_poli l ON s.kodepoli = l.kdpoli_bpjs
LEFT JOIN
    schedule_antrol_task t3 ON s.kodebooking = t3.kodebooking AND t3.taskid = 3 AND t3.code = 200
LEFT JOIN
    schedule_antrol_task t4 ON s.kodebooking = t4.kodebooking AND t4.taskid = 4 AND t4.code = 200
LEFT JOIN
    schedule_antrol_task t5 ON s.kodebooking = t5.kodebooking AND t5.taskid = 5 AND t5.code = 200
WHERE
    s.tanggalperiksa LIKE '%$tgl%'
    AND s.jenispasien = 'JKN'
    AND s.kodepoli != 'HDL'
ORDER BY
    s.tanggalperiksa,
    s.kodebooking; ");
        return $hasil->result();
    }

    public function selectRangeWaktuTunggu($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT
    s.tanggalperiksa,
    s.kodebooking,
    p.no_rm,
    p.nama as pasien,
    p.no_bpjs,
    p.no_ktp,
    p.no_hp,
    l.nama_panjang AS poli,
    s.namadokter,
    DATE_FORMAT(FROM_UNIXTIME(t3.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task3,
    DATE_FORMAT(FROM_UNIXTIME(t4.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task4,
    DATE_FORMAT(FROM_UNIXTIME(t5.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task5,    COALESCE(
        TIME_FORMAT(
            TIMEDIFF(
                FROM_UNIXTIME(t4.waktu / 1000),
                FROM_UNIXTIME(t3.waktu / 1000)
            ),
            '%H:%i:%s'
        ),
        'Tidak ada Task ID 3 atau 4'
    ) AS rentang_waktu_task3_ke_task4,
    CASE
        WHEN t3.taskid IS NULL THEN 'Tidak ada Task ID 3'
        WHEN t4.taskid IS NULL THEN 'Tidak ada Task ID 4'
        WHEN t5.taskid IS NULL THEN 'Tidak ada Task ID 5'
        ELSE 'Ada kedua Task ID'
    END AS status_task_id_3_4
FROM
    schedule_antrol s
INNER JOIN
    pasien p ON s.nomorkartu = p.no_bpjs
INNER JOIN
    list_poli l ON s.kodepoli = l.kdpoli_bpjs
LEFT JOIN
    schedule_antrol_task t3 ON s.kodebooking = t3.kodebooking AND t3.taskid = 3 AND t3.code = 200
LEFT JOIN
    schedule_antrol_task t4 ON s.kodebooking = t4.kodebooking AND t4.taskid = 4 AND t4.code = 200
LEFT JOIN
    schedule_antrol_task t5 ON s.kodebooking = t5.kodebooking AND t5.taskid = 5 AND t5.code = 200
WHERE
    s.tanggalperiksa BETWEEN '$mulai' AND '$akhir'
    AND s.jenispasien = 'JKN'
    AND s.kodepoli != 'HDL'
ORDER BY
    s.tanggalperiksa,
    s.kodebooking; ");
        return $hasil->result();
    }
}
=======
<?php

class M_KunjunganPoli extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_id($id_pelayanan)
    {
        $this->db->select('nama_diagnosa');
        $this->db->from('diagnosa');
        $this->db->where('id_pelayanan', $id_pelayanan);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function selectDataKunjunganPoli($tgl)
    {
        // $tgl = date("Y-m-d");
        $this->db->select('*');
        $this->db->like('tgl_masuk', $tgl);
        $this->db->from('v_kunjungan_poli');
        // $this->db->where('jenis_pelayanan','POLI');
        return $this->db->get()->result();
    }
    public function selectDataKunjunganPoliRange($mulai, $akhir)
    {
        $this->db->select('*');
        $this->db->from('v_kunjungan_poli');
        // $this->db->where('jenis_pelayanan','POLI');
        $this->db->where('tgl_masuk >=', $mulai);
        $this->db->where('tgl_masuk <=', $akhir);
        return $this->db->get()->result();
    }
    public function selectDataWaktuTunggu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT
    s.tanggalperiksa,
    s.kodebooking,
    p.no_rm,
    p.nama as pasien,
    p.no_bpjs,
    p.no_ktp,
    p.no_hp,
    l.nama_panjang AS poli,
    s.namadokter,
    DATE_FORMAT(FROM_UNIXTIME(t3.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task3,
    DATE_FORMAT(FROM_UNIXTIME(t4.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task4,
    DATE_FORMAT(FROM_UNIXTIME(t5.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task5,
    COALESCE(
        TIME_FORMAT(
            TIMEDIFF(
                FROM_UNIXTIME(t4.waktu / 1000),
                FROM_UNIXTIME(t3.waktu / 1000)
            ),
            '%H:%i:%s'
        ),
        'Tidak ada Task ID 3 atau 4'
    ) AS rentang_waktu_task3_ke_task4,
    CASE
        WHEN t3.taskid IS NULL THEN 'Tidak ada Task ID 3'
        WHEN t4.taskid IS NULL THEN 'Tidak ada Task ID 4'
        WHEN t5.taskid IS NULL THEN 'Tidak ada Task ID 5'
        ELSE 'Ada kedua Task ID'
    END AS status_task_id_3_4
FROM
    schedule_antrol s
INNER JOIN
    pasien p ON s.nomorkartu = p.no_bpjs
INNER JOIN
    list_poli l ON s.kodepoli = l.kdpoli_bpjs
LEFT JOIN
    schedule_antrol_task t3 ON s.kodebooking = t3.kodebooking AND t3.taskid = 3 AND t3.code = 200
LEFT JOIN
    schedule_antrol_task t4 ON s.kodebooking = t4.kodebooking AND t4.taskid = 4 AND t4.code = 200
LEFT JOIN
    schedule_antrol_task t5 ON s.kodebooking = t5.kodebooking AND t5.taskid = 5 AND t5.code = 200
WHERE
    s.tanggalperiksa LIKE '%$tgl%'
    AND s.jenispasien = 'JKN'
    AND s.kodepoli != 'HDL'
ORDER BY
    s.tanggalperiksa,
    s.kodebooking; ");
        return $hasil->result();
    }

    public function selectRangeWaktuTunggu($mulai, $akhir)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("SELECT
    s.tanggalperiksa,
    s.kodebooking,
    p.no_rm,
    p.nama as pasien,
    p.no_bpjs,
    p.no_ktp,
    p.no_hp,
    l.nama_panjang AS poli,
    s.namadokter,
    DATE_FORMAT(FROM_UNIXTIME(t3.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task3,
    DATE_FORMAT(FROM_UNIXTIME(t4.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task4,
    DATE_FORMAT(FROM_UNIXTIME(t5.waktu / 1000), '%Y-%m-%d %H:%i:%s') AS waktu_rs_task5,    COALESCE(
        TIME_FORMAT(
            TIMEDIFF(
                FROM_UNIXTIME(t4.waktu / 1000),
                FROM_UNIXTIME(t3.waktu / 1000)
            ),
            '%H:%i:%s'
        ),
        'Tidak ada Task ID 3 atau 4'
    ) AS rentang_waktu_task3_ke_task4,
    CASE
        WHEN t3.taskid IS NULL THEN 'Tidak ada Task ID 3'
        WHEN t4.taskid IS NULL THEN 'Tidak ada Task ID 4'
        WHEN t5.taskid IS NULL THEN 'Tidak ada Task ID 5'
        ELSE 'Ada kedua Task ID'
    END AS status_task_id_3_4
FROM
    schedule_antrol s
INNER JOIN
    pasien p ON s.nomorkartu = p.no_bpjs
INNER JOIN
    list_poli l ON s.kodepoli = l.kdpoli_bpjs
LEFT JOIN
    schedule_antrol_task t3 ON s.kodebooking = t3.kodebooking AND t3.taskid = 3 AND t3.code = 200
LEFT JOIN
    schedule_antrol_task t4 ON s.kodebooking = t4.kodebooking AND t4.taskid = 4 AND t4.code = 200
LEFT JOIN
    schedule_antrol_task t5 ON s.kodebooking = t5.kodebooking AND t5.taskid = 5 AND t5.code = 200
WHERE
    s.tanggalperiksa BETWEEN '$mulai' AND '$akhir'
    AND s.jenispasien = 'JKN'
    AND s.kodepoli != 'HDL'
ORDER BY
    s.tanggalperiksa,
    s.kodebooking; ");
        return $hasil->result();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
