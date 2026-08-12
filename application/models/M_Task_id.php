<<<<<<< HEAD
<?php

class M_Task_id extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function getScheduleData()
    {
        $sql = "
            SELECT s.kodebooking, s.norm, p.nama AS pasien, s.jenispasien, s.namapoli, s.namadokter, gabung.*
            FROM (
                SELECT a.kodebooking, a.task_3, IFNULL(b.task_4, '-') AS task_4, IFNULL(c.task_5, '-') AS task_5, IFNULL(d.task_6, '-') AS task_6, IFNULL(e.task_7, '-') AS task_7
                FROM (
                    SELECT kodebooking, tgl_input AS task_3, '' AS task_4, '' AS task_5, '' AS task_6, '' AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 3 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS a
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_4
                    FROM schedule_antrol_task
                    WHERE taskid = 4 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS b ON a.kodebooking = b.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_5
                    FROM schedule_antrol_task
                    WHERE taskid = 5 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS c ON a.kodebooking = c.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_6
                    FROM schedule_antrol_task
                    WHERE taskid = 6 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS d ON a.kodebooking = d.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 7 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS e ON a.kodebooking = e.kodebooking
            ) AS gabung
            JOIN schedule_antrol s ON s.kodebooking = gabung.kodebooking
            JOIN pasien p ON p.no_rm = s.norm
            GROUP BY s.kodebooking
            ORDER BY a.task_3 ASC
        ";
        return $this->db->query($sql)->result_array();
    }

    public function getScheduleDataByDateRange($mulai, $akhir)
    {
        $sql = "
            SELECT s.kodebooking, s.norm, p.nama AS pasien, s.jenispasien, s.namapoli, s.namadokter, gabung.*
            FROM (
                SELECT a.kodebooking, a.task_3, IFNULL(b.task_4, '-') AS task_4, IFNULL(c.task_5, '-') AS task_5, IFNULL(d.task_6, '-') AS task_6, IFNULL(e.task_7, '-') AS task_7
                FROM (
                    SELECT kodebooking, tgl_input AS task_3, '' AS task_4, '' AS task_5, '' AS task_6, '' AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 3 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS a
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_4
                    FROM schedule_antrol_task
                    WHERE taskid = 4 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS b ON a.kodebooking = b.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_5
                    FROM schedule_antrol_task
                    WHERE taskid = 5 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS c ON a.kodebooking = c.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_6
                    FROM schedule_antrol_task
                    WHERE taskid = 6 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS d ON a.kodebooking = d.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 7 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS e ON a.kodebooking = e.kodebooking
            ) AS gabung
            JOIN schedule_antrol s ON s.kodebooking = gabung.kodebooking
            JOIN pasien p ON p.no_rm = s.norm
            GROUP BY s.kodebooking
            ORDER BY a.task_3 ASC
        ";
        return $this->db->query($sql, array($mulai, $akhir, $mulai, $akhir, $mulai, $akhir, $mulai, $akhir, $mulai, $akhir))->result_array();
    }
}
=======
<?php

class M_Task_id extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID');
    }

    public function getScheduleData()
    {
        $sql = "
            SELECT s.kodebooking, s.norm, p.nama AS pasien, s.jenispasien, s.namapoli, s.namadokter, gabung.*
            FROM (
                SELECT a.kodebooking, a.task_3, IFNULL(b.task_4, '-') AS task_4, IFNULL(c.task_5, '-') AS task_5, IFNULL(d.task_6, '-') AS task_6, IFNULL(e.task_7, '-') AS task_7
                FROM (
                    SELECT kodebooking, tgl_input AS task_3, '' AS task_4, '' AS task_5, '' AS task_6, '' AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 3 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS a
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_4
                    FROM schedule_antrol_task
                    WHERE taskid = 4 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS b ON a.kodebooking = b.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_5
                    FROM schedule_antrol_task
                    WHERE taskid = 5 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS c ON a.kodebooking = c.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_6
                    FROM schedule_antrol_task
                    WHERE taskid = 6 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS d ON a.kodebooking = d.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 7 AND tgl_input LIKE '2024-05%'
                    GROUP BY kodebooking
                ) AS e ON a.kodebooking = e.kodebooking
            ) AS gabung
            JOIN schedule_antrol s ON s.kodebooking = gabung.kodebooking
            JOIN pasien p ON p.no_rm = s.norm
            GROUP BY s.kodebooking
            ORDER BY a.task_3 ASC
        ";
        return $this->db->query($sql)->result_array();
    }

    public function getScheduleDataByDateRange($mulai, $akhir)
    {
        $sql = "
            SELECT s.kodebooking, s.norm, p.nama AS pasien, s.jenispasien, s.namapoli, s.namadokter, gabung.*
            FROM (
                SELECT a.kodebooking, a.task_3, IFNULL(b.task_4, '-') AS task_4, IFNULL(c.task_5, '-') AS task_5, IFNULL(d.task_6, '-') AS task_6, IFNULL(e.task_7, '-') AS task_7
                FROM (
                    SELECT kodebooking, tgl_input AS task_3, '' AS task_4, '' AS task_5, '' AS task_6, '' AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 3 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS a
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_4
                    FROM schedule_antrol_task
                    WHERE taskid = 4 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS b ON a.kodebooking = b.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_5
                    FROM schedule_antrol_task
                    WHERE taskid = 5 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS c ON a.kodebooking = c.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_6
                    FROM schedule_antrol_task
                    WHERE taskid = 6 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS d ON a.kodebooking = d.kodebooking
                LEFT JOIN (
                    SELECT kodebooking, tgl_input AS task_7
                    FROM schedule_antrol_task
                    WHERE taskid = 7 AND tgl_input BETWEEN ? AND ?
                    GROUP BY kodebooking
                ) AS e ON a.kodebooking = e.kodebooking
            ) AS gabung
            JOIN schedule_antrol s ON s.kodebooking = gabung.kodebooking
            JOIN pasien p ON p.no_rm = s.norm
            GROUP BY s.kodebooking
            ORDER BY a.task_3 ASC
        ";
        return $this->db->query($sql, array($mulai, $akhir, $mulai, $akhir, $mulai, $akhir, $mulai, $akhir, $mulai, $akhir))->result_array();
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
