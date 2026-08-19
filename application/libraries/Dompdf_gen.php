<?php
use Dompdf\Dompdf;

if (!defined('BASEPATH')) exit('No direct script access allowed');

// include autoloader dari Dompdf
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

class Dompdf_gen extends Dompdf
{
    public function __construct()
    {
        parent::__construct();
    }
}