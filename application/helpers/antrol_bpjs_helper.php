<?php

function tambah_antrian($data)
{
    $CI = get_instance();
    $CI->load->model('List_poli_model', 'lp');
    $db_poli = $CI->lp->get_list_poli_bpjs($data['kodepoli']);
    $db_poli = $db_poli[0];
    $kode_dokter = $data['kodedokter'];
    $dokter = $CI->db->query("SELECT * from dokter where kode_dokter ='$kode_dokter'")->row();
    $request['kodebooking'] = $data['kodebooking'];
    $request['jenispasien'] = $data['jenispasien'];
    $request['nomorkartu'] = $data['nomorkartu'];
    $request['nik'] = $data['nik'];
    $request['nohp'] = $data['nohp'];
    $request['kodepoli'] = $data['kodepoli'];
    $request['namapoli'] = $db_poli->nmpoli_bpjs;
    $request['pasienbaru'] = 0;
    $request['norm'] = $data['norm'];
    $request['tanggalperiksa'] = $data['tanggalperiksa'];
    $request['kodedokter'] = $data['kodedokter'];
    $request['namadokter'] = $dokter->nama;
    $request['jampraktek'] = $data['jampraktek'];
    $request['jeniskunjungan'] = $data['jeniskunjungan'];
    $request['nomorreferensi'] = $data['nomorreferensi'];
    $request['nomorantrean'] = $data['inisial'] . $data['angkaantrean'];
    $request['angkaantrean'] = $data['angkaantrean'];
    $request['estimasidilayani'] = $data['estimasidilayani'];
    $request['sisakuotajkn'] = $data['kuota'] - $data['totaljkn'];
    $request['kuotajkn'] = $data['kuota'];
    $request['sisakuotanonjkn'] = $data['kuota'] - $data['totalnonjkn'];
    $request['kuotanonjkn'] = $data['kuota'];
    $request['keterangan'] = "Peserta harap 60 menit lebih awal guna pencatatan administrasi";

    $id = $CI->lp->insert($request, 'schedule_antrol');

    ////// print_r($request);

    $json = json_encode($request);
    ///////// echo $json;
    //////insert////////////////////
    $headers = generate_headers_antrean_json();
    $key = generate_key();
    $url = base_antrean() . "antrean/add";
    $response = post($url, $headers, $json);

    $data_update = [
        'code' => $response['metadata']['code'],
        'message_respon' => $response['metadata']['message'],
        'id_pelayanan' => $data['id_pelayanan'],
    ];
    $CI->lp->update($data_update, ['id' => $id], 'schedule_antrol');
    //////end///////////////////////////

    //////// echo json_encode($response);



    //////////////////////////////////////////////////////////
    $hasil['message'] = $response['metadata']['message'];
    $hasil['code_bpjs'] = $response['metadata']['code'];

    return $hasil;
}

function update_antrian($data)
{
    date_default_timezone_set('Asia/Jakarta');
    $CI = get_instance();
    $CI->load->model('List_poli_model', 'lp');
    $staff = $CI->session->userdata('data_auth');

    $request['kodebooking'] = $data['kodebooking'];
    $request['taskid'] = $data['taskid'];
    $request['waktu'] = $data['waktu'];
    // print_r($request);
    $data_task = $CI->db->get_where('schedule_antrol_task', ['taskid' => $data['taskid'], 'kodebooking' => $data['kodebooking']])->result();
    if (empty($data_task)) {
        $id = $CI->lp->insert($request, 'schedule_antrol_task');
        $CI->lp->update(['id_staff' => $staff->id_staff], ['id' => $id], 'schedule_antrol_task');
    } else {
        $id = "";
    }


    $json = json_encode($request);
    // echo $json;
    //////////////////insert//////////////////////////
    $headers = generate_headers_antrean_json();
    $key = generate_key();
    $url = base_antrean() . "antrean/updatewaktu";
    $response = post($url, $headers, $json);
    if (!empty($response)) {
        if (isset($response['status']) && $response['status'] == 'error') {
        } else {
            $data_update = [
                'code' => $response['metadata']['code'],
                'message_respon' => $response['metadata']['message'],
            ];

            if ($id != "") {
                $CI->lp->update($data_update, ['id' => $id], 'schedule_antrol_task');
            }
        }
    }

    // ////// echo json_encode($response);
    // return $response['metadata']['code'];
}
function update_antrian1($data)
{
    date_default_timezone_set('Asia/Jakarta');
    $request['kodebooking'] = $data['kodebooking'];
    $request['taskid'] = $data['taskid'];
    $request['waktu'] = $data['waktu'];
    // print_r($request);

    $json = json_encode($request);
    // echo $json;
    $headers = generate_headers_antrean_json();
    $key = generate_key();
    $url = base_antrean() . "antrean/updatewaktu";
    $response = post($url, $headers, $json);
    // echo json_encode($response);
}
function batal_antrian($data)
{
    $request['kodebooking'] = $data['kodebooking'];
    $request['keterangan'] = $data['keterangan'];
    // print_r($request);

    $json = json_encode($request);
    // echo $json;
    $headers = generate_headers_antrean_json();
    $key = generate_key();
    $url = base_antrean() . "antrean/batal";
    $response = post($url, $headers, $json);
    // print_arr($response);

}

function list_jadwal($kodepoli, $tanggal)
{
    $headers = generate_headers_antrean();
    //print_arr($headers);
    $key = generate_key();
    // $tanggal = date('Y-m-d');
    // echo $kodepoli;
    // echo $tanggal;
    $url = base_antrean() . "jadwaldokter/kodepoli/$kodepoli/tanggal/$tanggal";
    $response = get($url, $headers);
    // print_arr($response);
    if ($response['metadata']['code'] == 200) {
        $decript = stringDecrypt($key, $response['response']);
        return json_decode(decompress($decript));
    } else {
        return "no_data";
    }
}
function list_jadwal_1($kodepoli, $tanggal, $kodedokter)
{
    $headers = generate_headers_antrean();
    //print_arr($headers);
    $key = generate_key();
    // $tanggal = date('Y-m-d');
    // echo $kodepoli;
    // echo $tanggal;
    $url = base_antrean() . "jadwaldokter/kodepoli/$kodepoli/tanggal/$tanggal";
    $response = get($url, $headers);
    // print_arr($response);
    if (!empty($response)) {
        if ($response['metadata']['code'] == 200) {
            $decript = stringDecrypt($key, $response['response']);
            $jadwal = json_decode(decompress($decript));
            $filtered_list = array_filter($jadwal, function ($jadwal_hfis) use ($kodedokter) {
                return $jadwal_hfis->kodedokter == $kodedokter;
            });
            $filtered_data = reset($filtered_list);
            if (!empty($filtered_data)) {
                return  $filtered_data;
            } else {
                return "no_data";
            }
        } else {
            return "no_data";
        }
    } else {
        return "no_data";
    }
}
function cari_rujukan_by_kartu($kartu)
{
    $headers = generate_headers();
    $key = generate_key();

    $url = base_vclaim() . "Rujukan/List/Peserta/" . $kartu;


    $data = get($url, $headers);

    // print_arr($data['metaData']);
    $decript = stringDecrypt($key, $data['response']);

    $response = json_decode(decompress($decript), true);
    $out = [
        'metaData' => $data['metaData'],
        'response' => $response,
    ];

    return $out;
}
function cek_peserta_by_kartu($kartu)
{
    $headers = generate_headers();
    $key = generate_key();

    $tgl_sep = date("Y-m-d");
    $url = base_vclaim() . "Peserta/nokartu/$kartu/tglSEP/$tgl_sep";


    $data = get($url, $headers);
    // $decript = stringDecrypt($key, $data['response']);
    // $response = json_decode(decompress($decript), true);
    // // print_arr($response);
    // $response = [
    //   'metaData' => $data['metaData'],
    //   'data' => $response,
    // ];
    // return $response;
    if (isset($data)) {
        if ($data['metaData']['code'] == 200) {
            $decript = stringDecrypt($key, $data['response']);
            //print_arr($decript);

            $response = json_decode(decompress($decript), true);
            if ($response['peserta']['statusPeserta']['kode'] == 0) {
                $out['status'] = 'success';
                $out['data'] = $response;
            } else {
                $out['status'] = $response['peserta']['statusPeserta']['keterangan'];
            }
            // $out['status'] = 'success';
            // $out['code'] = $data['metaData']['code'];
            // $out['data'] = $response;
        } else {
            $out['status'] = $data['metaData']['message'];
            $out['code'] = $data['metaData']['code'];
        }
    } else {
        $out['status'] = "Bridging Error";
        $out['code'] = 201;
    }

    return $out;
}
function hari($hari)
{
    switch ($hari) {
        case "SENIN":
            return "1";
            break;
        case "SELASA":
            return "2";
            break;
        case "RABU":
            return "3";
            break;
        case "KAMIS":
            return "4";
            break;
        case "JUMAT":
            return "5";
            break;
        case "SABTU":
            return "6";
            break;
        case "MINGGU":
            return "7";
            break;
    }
}
