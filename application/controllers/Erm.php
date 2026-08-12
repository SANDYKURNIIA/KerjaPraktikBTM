<<<<<<< HEAD
<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Erm extends CI_Controller {
    function __construct()
 {
        parent::__construct();
        date_default_timezone_set( 'Asia/Jakarta' );
    }

    public function index()
 {
        $this->load->view( 'assets/_header' );
        $page_data['page_content'] = 'page_content/Erm';
        $this->load->view( 'Main', $page_data );
        $this->load->view( 'assets/_footer' );
    }

    public function form()
 {
        $this->load->view( 'assets/_header' );
        $page_data['page_content'] = 'page_content/Form';
        $this->load->view( 'Main', $page_data );
        $this->load->view( 'assets/_footer' );
    }
}
=======
<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Erm extends CI_Controller {
    function __construct()
 {
        parent::__construct();
        date_default_timezone_set( 'Asia/Jakarta' );
    }

    public function index()
 {
        $this->load->view( 'assets/_header' );
        $page_data['page_content'] = 'page_content/Erm';
        $this->load->view( 'Main', $page_data );
        $this->load->view( 'assets/_footer' );
    }

    public function form()
 {
        $this->load->view( 'assets/_header' );
        $page_data['page_content'] = 'page_content/Form';
        $this->load->view( 'Main', $page_data );
        $this->load->view( 'assets/_footer' );
    }
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
