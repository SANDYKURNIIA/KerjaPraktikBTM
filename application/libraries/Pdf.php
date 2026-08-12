<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    public function __construct()
    {
        require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';
        $pdf = new Dompdf\Dompdf();
        $CI = get_instance();
        $CI->dompdf = $pdf;
    }
    function createPDF($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'P')
    {
        $dompdf = new Dompdf\Dompdf();
        //$dompdf->setChroot(FCPATH); //Set root nya ke /var/www/html/nama-project
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download)
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}

/* End of file Mypdf.php */
/* Location: ./application/libraries/Mypdf.php */
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    public function __construct()
    {
        require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';
        $pdf = new Dompdf\Dompdf();
        $CI = get_instance();
        $CI->dompdf = $pdf;
    }
    function createPDF($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'P')
    {
        $dompdf = new Dompdf\Dompdf();
        //$dompdf->setChroot(FCPATH); //Set root nya ke /var/www/html/nama-project
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download)
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}

/* End of file Mypdf.php */
/* Location: ./application/libraries/Mypdf.php */
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
