<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Erm_surveilans_hais_rs extends CI_Controller{
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_TandaHais');
        $this->load->model('M_Pencarian_Pasien');
        $this->load->model('M_Erm');
        $this->load->model('M_Erm_ranap');
        $this->load->model('M_Staff');
    }
    public function form($id_pelayanan,$id_history){
		$selectPasien = $this->M_Erm->selectDataPasienIGDbyid($id_pelayanan, $id_history);
		$selectPasienRanap = $this->M_Erm_ranap->selectDataPasienRanapby_id($id_pelayanan, $id_history);
		$staff = $this->session->userdata('data_auth');
		if($staff->tipe == "igd"){
			$page_data['nama'] = $selectPasien->nama;
			$page_data['tgl_lahir'] = $selectPasien->tgl_lahir;
			$page_data['jenis_kelamin'] = $selectPasien->jenis_kelamin;
			$page_data['no_rm'] = $selectPasien->no_rm;
			$page_data['id_pelayanan'] = $selectPasien->id_pelayanan;
			$page_data['id_history'] = $selectPasien->id_history;
			$page_data['pasien'] = $selectPasien;
            $page_data['tgl_masuk'] = date('Y-m-d',strtotime($selectPasien->tgl_masuk));
            $page_data['waktu_masuk'] = date('H:i:s',strtotime($selectPasien->tgl_masuk));
		}elseif ($staff->tipe == "rawatinap") {
			$page_data['nama'] = $selectPasienRanap->nama;
			$page_data['tgl_lahir'] = $selectPasienRanap->tgl_lahir;
			$page_data['jenis_kelamin'] = $selectPasienRanap->jenis_kelamin;
			$page_data['no_rm'] = $selectPasienRanap->no_rm;
			$page_data['id_pelayanan'] = $selectPasienRanap->id_pelayanan;
			$page_data['id_history'] = $selectPasienRanap->id_history;
			$page_data['pasien'] = $selectPasienRanap;
            $page_data['tgl_masuk'] = date('Y-m-d',strtotime($selectPasien->tgl_masuk));
            $page_data['waktu_masuk'] = date('H:i:s',strtotime($selectPasien->tgl_masuk));
		}
        $page_data['diagnosa'] = $this->M_Pencarian_Pasien->getDiagnosa();
        $this->load->view('assets/_header');
        $page_data['page_content'] = 'erm_form/view_erm_surveilans_infeksi_hair_rs';
        $this->load->view('Main', $page_data);
		$this->load->view('assets/_footer');
    }
    
    //Untuk menampilkan List di datatable
    private function __getRow($id_pelayanan,$type){
       if($type=="num"){
        $sql =  $this->db->get_where('form_survei_inveksi_hais',['id_pelayanan' => $id_pelayanan])->num_rows();
       }else{
        $sql =  $this->db->get_where('form_survei_inveksi_hais',['id_pelayanan' => $id_pelayanan])->row();
       }
       return $sql;
    }

    private function _DetailList($type,$key,$mode){
        if($type == "dth"){
            $sql =  $this->db->get_where("detail_tanda_hais",["id_form_hais" => $key]);
        }else if($type == "dcb"){
            $sql = $this->db->get_where("tbl_dcb",["id_form_hais" => $key]);
        }else if($type == "ido"){
            $sql = $this->db->get_where("tbl_ido",["id_form_hais" => $key]);
        }else{
            $sql =  $this->db->get_where("detail_tanda_hais",["id_form_hais" => $key,"tipe"=>$type]);
        }
        if($mode == "num"){
            return $sql->num_rows();
        }else{
            return $sql->row();
        }
    }

    private function whatDTH($key){
        $this->db->select("tipe");
        $this->db->from("detail_tanda_hais");
        $this->db->where("id_form_hais",$key);
        return $this->db->get()->result();
    }

    public function tampilListHasil(){
        $id = $this->input->post('id_pelayanan');
        $staff = $this->session->userdata('data_auth');
        $row = $this->__getRow($id,"row");
        $rowTotal = 0;
        if($this->__getRow($id,"num") != 0){
            $whatdth = $this->whatDTH($row->id_form_hais);
            if($this->_DetailList("dth",$row->id_form_hais,"num") != 0){
                $rowTotal += $this->_DetailList("dth",$row->id_form_hais,"num");
            }else{
                $rowTotal += 0;
            }
            if($this->_DetailList("ido",$row->id_form_hais,"num") != 0){
                $rowTotal += $this->_DetailList("ido",$row->id_form_hais,"num");
                $ido = True;
            }else{
                $rowTotal += 0;
                $ido = False;
            }
            if($this->_DetailList("dcb",$row->id_form_hais,"num") != 0){
                $rowTotal += $this->_DetailList("dcb",$row->id_form_hais,"num");
                $dcb = True;
            }else{
                $dcb = False;
                $rowTotal += 0;
            }
        }
        $out = null;
        $data = $this->__getRow($id,"row");
        for($i=0;$i<$rowTotal;$i++){
                $no = $i+1;
                $tglMasuk = strtotime($data->tgl_masuk);
                $date = strftime("%A, %d %B %Y ", $tglMasuk);
                $waktuMasuk = $data->waktu_masuk;
                $dokterPenanggung = $data->dokterPenanggung;
                if($no == $rowTotal-1 && $ido === True){
                    $tipe = "IDO";
                    $checkExist = "<script>$('#btn$tipe').removeClass;$('#btn$tipe').addClass('btn btn-danger exist-$tipe')</script>".strtoupper($tipe);
                    $tombol = "<button class='btn btn-success btn-icon-anim btn square' data-target='#modal$tipe' data-toggle='modal' onclick='getUpdate(\"" . $this->_DetailList(strtolower($tipe),$row->id_form_hais,"row")->id_ido . "\",\"" . $tipe . "\")'><i class='icon-rocket'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $this->_DetailList(strtolower($tipe),$row->id_form_hais,"row")->id_ido . "\",\"" . $tipe . "\")'><i class='icon-trash'></i></button>";
                    $ido = False;
                    $out[$i] = array($no,$tombol,$hapus,$checkExist,$date,$waktuMasuk,$dokterPenanggung);
                }else if($no == $rowTotal && $dcb === True){
                    $tipe = "DCB";
                    $checkExist = "<script>$('#btn$tipe').removeClass;$('#btn$tipe').addClass('btn btn-danger exist-$tipe')</script>".strtoupper($tipe);
                    $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' data-target='#modal$tipe' data-toggle='modal'><i class='icon-rocket' onclick='getUpdate(\"" . $this->_DetailList(strtolower($tipe),$row->id_form_hais,"row")->id_dcb . "\",\"" . $tipe . "\")'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $this->_DetailList(strtolower($tipe),$row->id_form_hais,"row")->id_dcb . "\",\"" . $tipe . "\")'><i class='icon-trash'></i></button>";
                    $dcb = False;
                    $out[$i] = array($no,$tombol,$hapus,$checkExist,$date,$waktuMasuk,$dokterPenanggung);
                }else{
                    $tipe = $whatdth[$i]->tipe;
                    $checkExist = "<script>$('#btn$tipe').removeClass;$('#btn$tipe').addClass('btn btn-danger exist-$tipe')</script>".strtoupper($tipe);
                    $tombol = "<button class='btn btn-success btn-icon-anim btn square' id='myButton' data-target='#modal$tipe' onclick='getUpdate(\"" . $this->_DetailList(strtolower($tipe),$row->id_form_hais,"row")->id_tanda_hais . "\",\"" . $tipe . "\")' data-toggle='modal'><i class='icon-rocket'></i></button>";
                    $hapus = "<button class='btn btn-danger btn-icon-anim btn square' id='myButton' onclick='hapus(\"" . $this->_DetailList(strtolower($tipe),$row->id_form_hais,"row")->id_tanda_hais . "\",\"" . $tipe . "\")'><i class='icon-trash'></i></button>";
                    $out[$i] = array($no,$tombol,$hapus,$checkExist,$date,$waktuMasuk,$dokterPenanggung);
                }
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
    //akhir show datatable

    public function dataExist(){
        $id = $this->input->post('idpelayanan');
        $data = $this->__getRow($id,"num");
        if($data < 1){
            $out['status'] = 0;
            echo json_encode($out);
            exit;
        }else{
            $out["status"] = $this->__getRow($id,"row");
            echo json_encode($out);
            exit;
        }
    }

    public function getExistDetail($id,$where){
        //$id = $this->input->post("id");
        //$where = $this->input->post('where');
        if($where == "IDO"){
            $data = $this->M_TandaHais->getExistData("tbl_ido",$where,$this->__getRow($id,"row")->id_form_hais);
        }else if($where == "DCB"){
            $data = $this->M_TandaHais->getExistData("tbl_dcb",$where,$this->__getRow($id,"row")->id_form_hais);
        }else{
            $data = $this->M_TandaHais->getExistData("detail_tanda_hais",$where,$this->__getRow($id,"row")->id_form_hais);
        }
        echo json_encode($data);
    }

    public function getUpdateById(){
        $id = $this->input->post('id');
        $tipe = $this->input->post('tipe');
        $data = $this->M_TandaHais->getDataUpdate($id,$tipe);
        echo json_encode($data);
    }

    public function insertIVL(){
            $tipe = "IVL";
            $id = $this->input->post('idpelayanan');
            $SETid = $this->__getRow($id,"row")->id_form_hais;
            $tmp_pms = $this->input->post('tmpInsersi');
            $tglDari = $this->input->post('tglIVLDari');
            $tglHingga = $this->input->post('tglIVLHingga');
            $unit = $this->input->post('IVLunit');
            $nmDokPer = $this->input->post('IVLnamaPerDok');
            $kttUrin = null;
            $kttjenis = null;
            $tanda_hais = $this->input->post('tanda_hais1');
            $tanda_hais2 = $this->input->post('tanda_hais2');
            $tanda_hais3 = $this->input->post('tanda_hais3');
            $tanda_hais4 = $this->input->post('tanda_hais4');
            $tanda_hais5 = $this->input->post('tanda_hais5');
            $tanda_hais6 = $this->input->post('tanda_hais6');


            $dataIVL = array(
                'tipe' => $tipe,
                'tmp_pms' => $tmp_pms,
                'tglDari' => $tglDari,
                'tglHingga' => $tglHingga,
                'unit' => $unit,
                'nmDokPer' => $nmDokPer,
                'kttUrin' => $kttUrin,
                'kttJenis' => $kttjenis,
                'tanda_hais' => $tanda_hais,
                'tanda_hais2' => $tanda_hais2,
                'tanda_hais3' => $tanda_hais3,
                'tanda_hais4' => $tanda_hais4,
                'tanda_hais5' => $tanda_hais5,
                'tglTandaHais' => $tanda_hais6,
                'id_form_hais' => $SETid
            );
            $this->M_TandaHais->insert($dataIVL, 'detail_tanda_hais');
    }
    public function insertISK(){
            $tipe = "ISK";
            $id = $this->input->post('idpelayanan');
            $SETid = $this->__getRow($id,"row")->id_form_hais;
            $tmp_pmsa = $this->input->post('pmsKateter');
            $tglDaria = $this->input->post('tglISKDari');
            $tglHinggaa = $this->input->post('tglISKHingga');
            $unita = $this->input->post('ISKunit');
            $nmDokPera = $this->input->post('ISKnamaPerDok');
            $kttUrina = $this->input->post('kateterUrin');
            $kttjenisa = $this->input->post('jenisKateter');
            $tanda_haisa = $this->input->post('tanda_hais1a');
            $tanda_hais2a = $this->input->post('tanda_hais2a');
            $tanda_hais3a = $this->input->post('tanda_hais3a');
            $tanda_hais4a = $this->input->post('tanda_hais4a');
            $tanda_hais5a = $this->input->post('tanda_hais5a');
            $tanda_hais6a = $this->input->post('tanda_hais6a');
            $dataISK = array(
                'tipe' => $tipe,
                'tmp_pms' => $tmp_pmsa,
                'tglDari' => $tglDaria,
                'tglHingga' => $tglHinggaa,
                'unit' => $unita,
                'nmDokPer' => $nmDokPera,
                'kttUrin' => $kttUrina,
                'kttJenis' => $kttjenisa,
                'tanda_hais' => $tanda_haisa,
                'tanda_hais2' => $tanda_hais2a,
                'tanda_hais3' => $tanda_hais3a,
                'tanda_hais4' => $tanda_hais4a,
                'tanda_hais5' => $tanda_hais5a,
                'tglTandaHais' => $tanda_hais6a,
                'id_form_hais' => $SETid
            );
            $this->M_TandaHais->insert($dataISK, 'detail_tanda_hais');
    }
    public function insertCVL(){
        $tipe = "CVL";
        $id = $this->input->post('idpelayanan');
        $SETid = $this->__getRow($id,"row")->id_form_hais;
        $tmpInsersiCVL = $this->input->post('tmpInsersiCVL');
        $tglDariCVL = $this->input->post('tglDariCVL');
        $tglHinggaCVL = $this->input->post('tglHinggaCVL');
        $unitCVL = $this->input->post('unitCVL');

        $nmDokPerCVL = $this->input->post('nmDokPerCVL');
        $tanda_cvl1 = $this->input->post('tanda_cvl1');
        $tanda_cvl2 = $this->input->post('tanda_cvl2');
        $tanda_cvl3 = $this->input->post('tanda_cvl3');
        $tanda_cvl4 = $this->input->post('tanda_cvl4');
        $tanda_cvl5 = $this->input->post('tanda_cvl5');
        $tanda_cvl6 = $this->input->post('tanda_cvl6');

        $dataCVL = array(
            'tipe' => $tipe,
            'tmp_pms' => $tmpInsersiCVL,
            'tglDari' => $tglDariCVL,
            'tglHingga' => $tglHinggaCVL,
            'unit' => $unitCVL,
            'nmDokPer' => $nmDokPerCVL,
            'kttUrin' => $kttUrin,
            'kttJenis' => $kttjenis,
            'tanda_hais' => $tanda_cvl1 ,
            'tanda_hais2' => $tanda_cvl2,
            'tanda_hais3' => $tanda_cvl3,
            'tanda_hais4' => $tanda_cvl4,
            'tanda_hais5' => $tanda_cvl5,
            'tglTandaHais' => $tanda_cvl6,
            'id_form_hais' => $SETid
        );
        $this->M_TandaHais->insert($dataCVL, 'detail_tanda_hais');
    }
    public function insertVAP(){
        $tipe = "VAP";
        $id = $this->input->post('idpelayanan');
        $SETid = $this->__getRow($id,"row")->id_form_hais;
        $tmpInsersiVAP = $this->input->post('tmpInsersiVAP');
        $tglDariVAP = $this->input->post('tglDariVAP');
        $tglHinggaVAP = $this->input->post('tglHinggaVAP');
        $unitVAP = $this->input->post('unitVAP');

        $nmDokPerVAP = $this->input->post('nmDokPerVAP');
        $tanda_vap1 = $this->input->post('tanda_vap1');
        $tanda_vap2 = $this->input->post('tanda_vap2');
        $tanda_vap3 = $this->input->post('tanda_vap3');
        $tanda_vap4 = $this->input->post('tanda_vap4');
        $tanda_vap5 = $this->input->post('tanda_vap5');
        $tanda_vap6 = $this->input->post('tanda_vap6');

        $datavap = array(
            'tipe' => $tipe,
            'tmp_pms' => $tmpInsersiVAP,
            'tglDari' => $tglDariVAP,
            'tglHingga' => $tglHinggaVAP,
            'unit' => $unitVAP,
            'nmDokPer' => $nmDokPerVAP,
            'kttUrin' => $kttUrin,
            'kttJenis' => $kttjenis,
            'tanda_hais' => $tanda_vap1 ,
            'tanda_hais2' => $tanda_vap2,
            'tanda_hais3' => $tanda_vap3,
            'tanda_hais4' => $tanda_vap4,
            'tanda_hais5' => $tanda_vap5,
            'tglTandaHais' => $tanda_vap6,
            'id_form_hais' => $SETid
        );
        $this->M_TandaHais->insert($datavap, 'detail_tanda_hais');
    }
    public function insertDCB(){
        $tipe = "DCB";
        $id = $this->input->post('idpelayanan');
        $SETid = $this->__getRow($id,"row")->id_form_hais;
        $tiba = $this->input->post('tiba');
        $tglDCBMulai = $this->input->post('tglDCBMulai');
        $tglDCBHingga =$this->input->post('tglDCBHingga');
        $DCBAwal = $this->input->post('DCBAwal');
        $DCBGejala = $this->input->post('DCBGejala');
        $DCBNyeri = $this->input->post('DCBNyeri');
        $DCBGatal = $this->input->post('DCBGatal');
        $DCBKemerahan = $this->input->post('DCBKemerahan');
        $DCBJaringan = $this->input->post('DCBJaringan');
        $DCBDangkal = $this->input->post('DCBDangkal');
        $DCBKulit = $this->input->post('DCBKulit');
        $DCBDalam = $this->input->post('DCBDalam');
        $DCBNekrosis = $this->input->post('DCBNekrosis');
        $DCBDekubitus = $this->input->post('DCBDekubitus');

        $dataDCB = [
            'tirah_baring' => $tiba,
            'tipe' => $tipe,
            'tgl_mulai' => $tglDCBMulai,
            'tgl_hingga' => $tglDCBHingga,
            'drAwal' => $DCBAwal,
            'gejala' => $DCBGejala,
            'nyeri' => $DCBNyeri,
            'gatal' => $DCBGatal,
            'kemerahan' =>$DCBKemerahan,
            'jaringan_keras' =>$DCBJaringan,
            'suhu_kulit'  => $DCBKulit,
            'dangkal' => $DCBDangkal,
            'dalam'=>$DCBDalam,
            'nekrosis'=>$DCBNekrosis,
            'dekubitus'=>$DCBDekubitus,
            'id_form_hais'=>$SETid
        ];

        $this->M_TandaHais->insert($dataDCB, 'tbl_dcb');
    }
    public function insertIDO(){
        $tipe = "IDO";
        $id = $this->input->post('idpelayanan');
        $SETid = $this->__getRow($id,"row")->id_form_hais;
        $diagnosaIDO=$this->input->post('diagnosaIDO');
        $tglIDO=$this->input->post('tglIDO');
        $durasiIDO=$this->input->post('durasiIDO');
        $nmTindakanIDO=$this->input->post('nmTindakanIDO');
        $nmOperatorIDO=$this->input->post('nmOperatorIDO');
        $jenisIDO=$this->input->post('jenisIDO');
        $asaIDO=$this->input->post('asaIDO');
        $tindakanIDO = $this->input->post('tindakanIDO');
        $tglTemuanIDO=$this->input->post('tglTemuanIDO');
        $tandaIDO=$this->input->post('tandaIDO');
        $dosisProfilaksis=$this->input->post('dosisProfilaksis');
        $tglProfilaksis=$this->input->post('tglProfilaksis');
        $dosisPascaIDO=$this->input->post('dosisPascaIDO');
        $tglPascaIDO=$this->input->post('tglPascaIDO');

        $dataIDO = [
            'diagnosaIDO' => $diagnosaIDO,
            'tipe' => $tipe,
            'tglIDO' => $tglIDO,
            'durasiIDO' => $durasiIDO,
            'nmTindakanIDO' => $nmTindakanIDO,
            'nmOperatorIDO' => $nmOperatorIDO,
            'jenisIDO' => $jenisIDO,
            'tindakanIDO' => $tindakanIDO,
            'asaIDO' => $asaIDO,
            'tglTemuanIDO' => $tglTemuanIDO,
            'tandaIDO' => $tandaIDO,
            'dosisProfilaksis' => $dosisProfilaksis,
            'tglProfilaksis' => $tglProfilaksis,
            'dosisPascaIDO' => $dosisPascaIDO,
            'tglPascaIDO' => $tglPascaIDO,
            'id_form_hais' => $SETid
        ];
        $this->M_TandaHais->insert($dataIDO,'tbl_ido');
    }
    public function insertData(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $maxID = $this->M_TandaHais->getMaxID();
        if($maxID == "kosong"){
            $newID = 1;
        }else{
            $newID = $maxID + 1;
        }
        $no_rm = $this->input->post('inNoRM');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');
        $tglMasuk = $this->input->post('tgl_masuk');
        $waktuMasuk = $this->input->post('waktu_masuk');
        $diagnosaMasuk = $this->input->post('diagnosaMasuk');
        $dokterPenanggung = $this->input->post('dokterPenanggung');
        $spPenyakit = $this->input->post('spesialis');
        $pemeriksaanKultur = $this->input->post('pemeriksaanKultur');
        if($dokterPenanggung == "-"){
            $dokterPenanggung = null;
        }

        if($pemeriksaanKultur == "Tidak" || $pemeriksaanKultur == null){
            $tglPeriksa = null;
            $hasilPeriksa = null;
        }else if($pemeriksaanKultur == "Ya"){
            $tglPeriksa = $this->input->post('tglPeriksa');
            $hasilPeriksa = $this->input->post('hasilPeriksa');
        }

        $dataMain = array(
            'id_form_hais'=> $newID,
            'no_rm' => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'id_history' => $id_history,
            'tgl_masuk' => $tglMasuk,
            'waktu_masuk' => $waktuMasuk,
            'diagnosaMasuk' => $diagnosaMasuk,
            'dokterPenanggung' => $dokterPenanggung,
            'sp_penyakit' => $spPenyakit,
            'pemeriksaanKultur' => $pemeriksaanKultur,
            'tgl_periksa' => $tglPeriksa,
            'hasilPeriksa' => $hasilPeriksa,
            'id_staff' => $staff,
        );
        $this->M_TandaHais->insert($dataMain, 'form_survei_inveksi_hais');
        echo json_encode(array('status' => $newID));
    }

    public function deleteData(){
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id');
        $what = $this->input->post('what');
        if(strtoupper($what) == "IDO"){
            $this->M_TandaHais->deleteDetail(array("id_ido" => $id),"tbl_ido");
        }else if(strtoupper($what) == "DCB"){
            $this->M_TandaHais->deleteDetail(array("id_dcb" => $id),"tbl_dcb");
        }else{
            $this->M_TandaHais->deleteDetail(array("id_tanda_hais" => $id),"detail_tanda_hais");
        }
    }

    public function deleteAll(){
        $staff = $this->session->userdata('data_auth');
        $id = $this->input->post('id');
        $this->M_TandaHais->delete($id);
    }

    public function updateData(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('idMain');
        
        
        $no_rm = $this->input->post('inNoRM');
        $id_pelayanan = $this->input->post('inPel');
        $id_history = $this->input->post('inHis');

        $tglMasuk = $this->input->post('tgl_masuk');
        $waktuMasuk = $this->input->post('waktu_masuk');
        $diagnosaMasuk = $this->input->post('diagnosaMasuk');
        $dokterPenanggung = $this->input->post('dokterPenanggung');
        $spPenyakit = $this->input->post('spesialis');
        $pemeriksaanKultur = $this->input->post('pemeriksaanKultur');


        if($pemeriksaanKultur == "Tidak" || $pemeriksaanKultur == null){
            $tglPeriksa = null;
            $hasilPeriksa = null;
        }else if($pemeriksaanKultur == "Ya"){
            $tglPeriksa = $this->input->post('tglPeriksa');
            $hasilPeriksa = $this->input->post('hasilPeriksa');
        }

        $dataMain = array(
            'no_rm' => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'id_history' => $id_history,
            'tgl_masuk' => $tglMasuk,
            'waktu_masuk' => $waktuMasuk,
            'diagnosaMasuk' => $diagnosaMasuk,
            'dokterPenanggung' => $dokterPenanggung,
            'sp_penyakit' => $spPenyakit,
            'pemeriksaanKultur' => $pemeriksaanKultur,
            'tgl_periksa' => $tglPeriksa,
            'hasilPeriksa' => $hasilPeriksa,
            'id_staff' => $staff    
        );

        $where = array('id_form_hais' => base64_decode($id));
        $this->M_TandaHais->update($dataMain,$where, 'form_survei_inveksi_hais');
    }

    public function updateIDO(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('id');

                    //UPDATE IDO
                    $diagnosaIDO=$this->input->post('diagnosaIDO');
                    $tglIDO=$this->input->post('tglIDO');
                    $durasiIDO=$this->input->post('durasiIDO');
                    $nmTindakanIDO=$this->input->post('nmTindakanIDO');
                    $nmOperatorIDO=$this->input->post('nmOperatorIDO');
                    $jenisIDO=$this->input->post('jenisIDO');
                    $asaIDO=$this->input->post('asaIDO');
                    $tindakanIDO = $this->input->post('tindakanIDO');
                    $tglTemuanIDO=$this->input->post('tglTemuanIDO');
                    $tandaIDO=$this->input->post('tandaIDO');
                    $dosisProfilaksis=$this->input->post('dosisProfilaksis');
                    $tglProfilaksis=$this->input->post('tglProfilaksis');
                    $dosisPascaIDO=$this->input->post('dosisPascaIDO');
                    $tglPascaIDO=$this->input->post('tglPascaIDO');
            
                    $dataIDO = [
                        'diagnosaIDO' => $diagnosaIDO,
                        'tglIDO' => $tglIDO,
                        'durasiIDO' => $durasiIDO,
                        'nmTindakanIDO' => $nmTindakanIDO,
                        'nmOperatorIDO' => $nmOperatorIDO,
                        'jenisIDO' => $jenisIDO,
                        'tindakanIDO' => $tindakanIDO,
                        'asaIDO' => $asaIDO,
                        'tglTemuanIDO' => $tglTemuanIDO,
                        'tandaIDO' => $tandaIDO,
                        'dosisProfilaksis' => $dosisProfilaksis,
                        'tglProfilaksis' => $tglProfilaksis,
                        'dosisPascaIDO' => $dosisPascaIDO,
                        'tglPascaIDO' => $tglPascaIDO,
                    ];
                    $this->M_TandaHais->update($dataIDO,array('id_form_hais'=>base64_decode($id)),'tbl_ido');
    }

    public function updateIVL(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('id');
        
        $tmp_pms = $this->input->post('tmpInsersi');
        $tglDari = $this->input->post('tglIVLDari');
        $tglHingga = $this->input->post('tglIVLHingga');
        $unit = $this->input->post('IVLunit');
        $nmDokPer = $this->input->post('IVLnamaPerDok');
        $kttUrin = null;
        $kttjenis = null;
        $tanda_hais = $this->input->post('tanda_hais1');
        $tanda_hais2 = $this->input->post('tanda_hais2');
        $tanda_hais3 = $this->input->post('tanda_hais3');
        $tanda_hais4 = $this->input->post('tanda_hais4');
        $tanda_hais5 = $this->input->post('tanda_hais5');
        $tanda_hais6 = $this->input->post('tanda_hais6');

        $dataIVL = array(
            'tmp_pms' => $tmp_pms,
            'tglDari' => $tglDari,
            'tglHingga' => $tglHingga,
            'unit' => $unit,
            'nmDokPer' => $nmDokPer,
            'kttUrin' => $kttUrin,
            'kttJenis' => $kttjenis,
            'tanda_hais' => $tanda_hais,
            'tanda_hais2' => $tanda_hais2,
            'tanda_hais3' => $tanda_hais3,
            'tanda_hais4' => $tanda_hais4,
            'tanda_hais5' => $tanda_hais5,
            'tglTandaHais' => $tanda_hais6
        );
        $whereIVL = array('id_form_hais'=> base64_decode($id), 'tipe' => 'IVL');
        $this->M_TandaHais->update($dataIVL,$whereIVL, 'detail_tanda_hais');
    }
    public function updateISK(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('id');

        $tmp_pmsa = $this->input->post('pmsKateter');
        $tglDaria = $this->input->post('tglISKDari');
        $tglHinggaa = $this->input->post('tglISKHingga');
        $unita = $this->input->post('ISKunit');
        $nmDokPera = $this->input->post('ISKnamaPerDok');
        $kttUrina = $this->input->post('kateterUrin');
        $kttjenisa = $this->input->post('jenisKateter');
        $tanda_haisa = $this->input->post('tanda_hais1a');
        $tanda_hais2a = $this->input->post('tanda_hais2a');
        $tanda_hais3a = $this->input->post('tanda_hais3a');
        $tanda_hais4a = $this->input->post('tanda_hais4a');
        $tanda_hais5a = $this->input->post('tanda_hais5a');
        $tanda_hais6a = $this->input->post('tanda_hais6a');
        $dataISK = array(
            'tmp_pms' => $tmp_pmsa,
            'tglDari' => $tglDaria,
            'tglHingga' => $tglHinggaa,
            'unit' => $unita,
            'nmDokPer' => $nmDokPera,
            'kttUrin' => $kttUrina,
            'kttJenis' => $kttjenisa,
            'tanda_hais' => $tanda_haisa,
            'tanda_hais2' => $tanda_hais2a,
            'tanda_hais3' => $tanda_hais3a,
            'tanda_hais4' => $tanda_hais4a,
            'tanda_hais5' => $tanda_hais5a,
            'tglTandaHais' => $tanda_hais6a
        );
        $whereISK = array('id_form_hais'=>base64_decode($id), 'tipe' => 'ISK');
        $this->M_TandaHais->update($dataISK,$whereISK, 'detail_tanda_hais');
    }
    public function updateDCB(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('id');

        $tiba = $this->input->post('tiba');
        $tglDCBMulai = $this->input->post('tglDCBMulai');
        $tglDCBHingga =$this->input->post('tglDCBHingga');
        $DCBAwal = $this->input->post('DCBAwal');
        $DCBGejala = $this->input->post('DCBGejala');
        $DCBNyeri = $this->input->post('DCBNyeri');
        $DCBGatal = $this->input->post('DCBGatal');
        $DCBKemerahan = $this->input->post('DCBKemerahan');
        $DCBJaringan = $this->input->post('DCBJaringan');
        $DCBDangkal = $this->input->post('DCBDangkal');
        $DCBKulit = $this->input->post('DCBKulit');
        $DCBDalam = $this->input->post('DCBDalam');
        $DCBNekrosis = $this->input->post('DCBNekrosis');
        $DCBDekubitus = $this->input->post('DCBDekubitus');

        $dataDCB = [
            'tirah_baring' => $tiba,
            'tgl_mulai' => $tglDCBMulai,
            'tgl_hingga' => $tglDCBHingga,
            'drAwal' => $DCBAwal,
            'gejala' => $DCBGejala,
            'nyeri' => $DCBNyeri,
            'gatal' => $DCBGatal,
            'kemerahan' =>$DCBKemerahan,
            'jaringan_keras' =>$DCBJaringan,
            'suhu_kulit'  => $DCBKulit,
            'dangkal' => $DCBDangkal,
            'dalam'=>$DCBDalam,
            'nekrosis'=>$DCBNekrosis,
            'dekubitus'=>$DCBDekubitus,
        ];

        $whereDCB = array('id_form_hais'=> base64_decode($id));
        $dcbRes = $this->M_TandaHais->update($dataDCB,$whereDCB, 'tbl_dcb');

    }
    public function updateCVL(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('id');
            $tmpInsersiCVL = $this->input->post('tmpInsersiCVL');
            $tglDariCVL = $this->input->post('tglDariCVL');
            $tglHinggaCVL = $this->input->post('tglHinggaCVL');
            $unitCVL = $this->input->post('unitCVL');

            $nmDokPerCVL = $this->input->post('nmDokPerCVL');
            $tanda_cvl1 = $this->input->post('tanda_cvl1');
            $tanda_cvl2 = $this->input->post('tanda_cvl2');
            $tanda_cvl3 = $this->input->post('tanda_cvl3');
            $tanda_cvl4 = $this->input->post('tanda_cvl4');
            $tanda_cvl5 = $this->input->post('tanda_cvl5');
            $tanda_cvl6 = $this->input->post('tanda_cvl6');


            $dataCVL = array(
                'tmp_pms' => $tmpInsersiCVL,
                'tglDari' => $tglDariCVL,
                'tglHingga' => $tglHinggaCVL,
                'unit' => $unitCVL,
                'nmDokPer' => $nmDokPerCVL,
                'kttUrin' => $kttUrin,
                'kttJenis' => $kttjenis,
                'tanda_hais' => $tanda_cvl1 ,
                'tanda_hais2' => $tanda_cvl2,
                'tanda_hais3' => $tanda_cvl3,
                'tanda_hais4' => $tanda_cvl4,
                'tanda_hais5' => $tanda_cvl5,
                'tglTandaHais' => $tanda_cvl6
            );
            $whereCVL = array('id_form_hais'=> base64_decode($id), 'tipe' => 'CVL');
            $this->M_TandaHais->update($dataCVL,$whereCVL, 'detail_tanda_hais');
    }
    public function updateVAP(){
        $data = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $data->id_staff;

        $id = $this->input->post('id');
            $tmpInsersiVAP = $this->input->post('tmpInsersiVAP');
            $tglDariVAP = $this->input->post('tglDariVAP');
            $tglHinggaVAP = $this->input->post('tglHinggaVAP');
            $unitVAP = $this->input->post('unitVAP');

            $nmDokPerVAP = $this->input->post('nmDokPerVAP');
            $tanda_vap1 = $this->input->post('tanda_vap1');
            $tanda_vap2 = $this->input->post('tanda_vap2');
            $tanda_vap3 = $this->input->post('tanda_vap3');
            $tanda_vap4 = $this->input->post('tanda_vap4');
            $tanda_vap5 = $this->input->post('tanda_vap5');
            $tanda_vap6 = $this->input->post('tanda_vap6');


            $datavap = array(
                'tmp_pms' => $tmpInsersiVAP,
                'tglDari' => $tglDariVAP,
                'tglHingga' => $tglHinggaVAP,
                'unit' => $unitVAP,
                'nmDokPer' => $nmDokPerVAP,
                'kttUrin' => $kttUrin,
                'kttJenis' => $kttjenis,
                'tanda_hais' => $tanda_vap1 ,
                'tanda_hais2' => $tanda_vap2,
                'tanda_hais3' => $tanda_vap3,
                'tanda_hais4' => $tanda_vap4,
                'tanda_hais5' => $tanda_vap5,
                'tglTandaHais' => $tanda_vap6
            );
            $wherevap = array('id_form_hais'=> base64_decode($id), 'tipe' => 'VAP');
            $this->M_TandaHais->update($datavap,$wherevap, 'detail_tanda_hais');
    }



    public function getDokter(){
        $sess = $this->session->userdata('data_auth');
        $tgl = date("Y-m-d H:i:s");
		$staff = $sess->id_staff;
        $data = $this->M_TandaHais->getDokter();
        echo json_encode($data);
    }
}