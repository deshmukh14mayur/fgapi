<?php
header('Access-Control-Allow-Origin: *');
        	header("Access-Control-Allow-Methods: GET, OPTIONS");
	class Login extends CI_Controller{

	    public function __construct()
	    {
	        parent::__construct();
	        
	        $this->wotrdb = $this->load->database('wotrdb', TRUE);
	        $this->load->model('login_model');
	   //      $this->load->model('system_tools');
    //     	if($this->system_tools->primary_check() === TRUE)
	   //      {
		  //       $this->load->model('login_model');
		  //       $this->skyq = $this->config->item('skyq');
				// $this->load->model('backup_model');	
	   //      }
	   //      else
	   //      {
	   //      	print_r($this->system_tools->primary_check());
	   //      }
		}

		public function index($lang="english")
		{
			
			$this->data['lang'] = $lang;
			$this->load->view('others/login_view',$this->data);
			
		}

		public function process($page="Login")
		{
			// if(file_exists(FTBF))
			// {
			// 	$files = scandir(FTBF);
			// 	foreach($files as $file)
			// 	{
					
			// 		(file_exists(FTBF.$file) && $file[0] != '.') ? unlink(FTBF.$file) : NULL;
			// 	}
			// 	rmdir(FTBF);
			// }
			define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	        if(IS_AJAX)
	        {
	        	if($page === "Login")
	        	{
	        		$u = $this->input->post('email');
	            	$p = $this->input->post('password');
	            	echo json_encode($this->login_model->authenticate($u,$p));
	        	}
	        	
            }
	        else
	        {
	        	redirect('Login');
	        	return FALSE;
	        }
		}

		public function SetSessiondata()
		{
			define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
			var_dump($_POST);
	        if(IS_AJAX)
	        {
	        	$this->session->set_userdata($_POST);
				// $this->session->set_session_data($logindata);
				$this->session->set_flashdata('alert', true);
	        }
		}

		public function logout()
		{
			if($this->login_model->logout())
			{
				redirect('Login');
			}
			else
			{
				show_404();
			}
			
		}
	}
?>