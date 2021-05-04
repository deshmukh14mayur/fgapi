<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->wotrdb = $this->load->database('wotrdb', TRUE);
        $this->load->model('login_model');
        // echo "<pre>";
        // var_dump($this->session->userdata());
        // echo "</pre>";
		if($this->login_model->check_login())
		{
			
			$this->data['Login']['Login_as'] = $this->session->userdata('Login_as');
			$this->data['Login']['Name'] = $this->session->userdata('Name');
			$this->data['Login']['Emp_Code'] = $this->session->userdata('ID');
			$this->data['Login']['Role_data'] = $this->session->userdata('Role_data');

			// if (@$this->data['Login']['Role_data']['100']['2']['PermissionValue'] != TRUE) 
			// {
			// 	redirect('Login');
			// }
		
		}
		else 
		{
			// redirect('Login');
		}
 	}
	
	function index()
	{
		$this->data['breadcrumb']['heading'] = 'Dashboard';
		$this->data['menu_active'] = 'Dashboard';
		$this->load->view('includes/header',$this->data);
		$this->load->view('sessions/home_view',$this->data);
		$this->load->view('includes/footer',$this->data);
	}

	
	
	

	
}	
?>