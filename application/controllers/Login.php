<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
    }
    public function index()
    {
        $this->load->view('Login');
    }

}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
    }
    public function index()
    {
        $this->load->view('Login');
    }

}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
