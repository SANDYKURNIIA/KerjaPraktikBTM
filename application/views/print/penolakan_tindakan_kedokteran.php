<!DOCTYPE html>
<html>

<head>
    <title>Print out <?=$page_title?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid black;

        }

        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 80px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM :</p>
                    <p style="margin-left:-9em">Nama    :</p>
                    <p style="margin-left:-9em">Jenis Kelamin   :</p>
                    <p style="margin-left:-9em">Tanggal Lahir   :</p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>
                    
                </td>
            </tr>
        </table>
        
        
        <h3 class="center">
            <p style="margin-top:-20px"> FORMULIR PENOLAKAN TINDAKAN KEDOKTERAN</p>
        </h3>
        <table width=100% class="table1"  border="1" cellspacing=0 style="margin-top:-20px;   " >

            <tr >
                <td colspan=2 width="44px" >Dokter Pelaksana Tindakan</td>
                <td width="54px" ></td>
                <td  width="5px"></td>
            </tr>

            <tr >
                <td colspan=2 width="44px" >Pemberi Informasi</td>
                <td width="54px" ></td>
                <td  width="5px"></td>
                
            </tr>

            <tr >
                <td colspan=2 width="44px" >Penerima Informasi / Pemberi Persetujuan*</td>
                <td width="54px" ></td>
                <td  width="2px"></td>
                
            </tr>

            
            <tr >
                <td width="1px" class="center"><b>No</b></td>
                <td width="43px" class="center"><b>Jenis Informasi</b></td>
                <td width="50px" class="center"><b>Isi Informasi</b></td>
                <td width="2px" class="center"><b>Tandai (v)</b></td>
            </tr>

            <tr >
                <td width="1px" class="center">1</td>
                <td width="43px" >Diagnosis (WD & DD)</td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">2</td>
                <td width="43px" >Dasar Diagnosis</td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">3</td>
                <td width="43px" >Tindakan Kedokteran</td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">4</td>
                <td width="43px" >Indikasi Tindakan</td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">5</td>
                <td width="43px" >Tata Cara : <br>
                                    Tipe sedasi/anesthesia
                                    uraian singkat prosedur dan  
                                    tahapan yang penting.
                                </td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">6</td>
                <td width="43px" >Tujuan</td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">7</td>
                <td width="43px" >Risiko & Komplikasi</td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">8</td>
                <td width="43px" >Prognosis<br>
                                    Prognosis vital, prognosis fungsi dan
                                    prognosis kesembuhan
                                    </td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">9</td>
                <td width="43px" >Alternatif & Risiko<br>
                                    Pilihan pengobatan/penatalaksanaan
                                    </td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>

            <tr >
                <td width="1px" class="center">10</td>
                <td width="43px" >Hal lain yang akan dilakukan untuk 
                                menyelamatkan pasien<br>
                                    Perluasan tindakan 
                                    Konsultasi selama tindakan
                                    Resusitasi
                                </td>
                <td width="50px" ></td>
                <td width="2px" ></td>
            </tr>


            <tr >
                <td colspan=3 width="44px" >Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi</td>
                <td  width="2px">Tandatangan</td>
                
            </tr>

            <tr >
                <td colspan=3 width="44px" >Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana di atas kemudian yang saya beri tanda/paraf di kolom kanannya dan telah memahaminya</td>
                <td  width="2px">Tandatangan</td>
                
            </tr>


            <tr >
                <td colspan=4 width="44px" >*Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali atau keluarga terdekat.</td>
                
            </tr>
            
            <tr >
                <td colspan=4 width="44px" class="center"><b>PENOLAKAN TINDAKAN KEDOKTERAN</b></td>
                
            </tr>


            <tr >
                <td colspan=4 width="44px" >Yang bertandatangan di bawah ini, saya nama _________________________, tanggal lahir _____________
                                            laki-laki/perempuan*, alamat ____________________________________________________________, 
                                            dengan ini menyatakan penolakan untuk dilakukannya tindakan _______________________________ pada tanggal _____________terhadap saya/ _______________ saya* bernama _______________________, tanggal lahir _______________, laki- laki/perempuan*, alamat ______________________________

                                            Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya,  termasuk risiko dan komplikasi yang mungkin timbul.  
                                            Saya bertanggung jawab secara penuh atas segala akibat yang mungkin timbul sebagai akibat tidak dilakukannya tindakan kedokteran yang direncanakan oleh dokter.

                                            ________________, tanggal ______________ pukul ______ <br>
                                                        Yang menyatakan* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      Saksi1  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp       Saksi2<br><br>



                                                    (________________)           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp           (________________)       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp       (_______________)
                                            </td>
                
            </tr>
    



            

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
        });

    </script>
</body>

</html>