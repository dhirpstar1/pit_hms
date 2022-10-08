<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	function __construct()
	  {
		parent::__construct();
		error_reporting(0);
		$this->load->library('ion_auth');
		$this->load->model('Master_model');

		if (!$this->ion_auth->logged_in())
		{
		  //redirect them to the login page
		  redirect('auth/login', 'refresh');
		}
		

		$this->data['page_title'] = 'HMS - Dashboard';
	  }
  protected function render($the_view = NULL, $template = 'admin_master')
	  {
		parent::render($the_view, $template);
	  }
  public function index()
	{
		$data['all_ipd_patients'] = $this->Master_model->get_all_patient_ipd('all');
		$data['all_opd_patients'] = $this->Master_model->get_all_patient_opd('all');
		$data['all_beds'] = $this->Master_model->get_all_beds();
		$this->config_data = $data['config_data'] = $this->Master_model->get_cofig_data();
		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
}
