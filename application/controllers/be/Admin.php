<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page_title'] = "Dashboard";
        $data['page_heading'] = "Dashboard";
        $data['js'] = "";
        $this->load->view(backendViewFolder() . 'starter', $data, FALSE);
    }
}
/* End of file admin.php */