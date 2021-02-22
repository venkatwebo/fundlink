<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view(frontendViewFolder() . 'home');
	}

	public function cmsPages($page = NULL)
	{
		switch ($page) {
			case 'about-us':
				$data['page'] = "about-us";
				$this->load->view(frontendSubPagesViewFolder(), $data, FALSE);
				break;
			case 'contact':
				$data['page'] = "contact";
				$this->load->view(frontendSubPagesViewFolder(), $data, FALSE);
				break;

			default:
				show_404();
				break;
		}
	}
}
