<?php
	class Login_model extends CI_Model{

		public function authenticate($email=NULL,$passwd=NULL)
		{
			$this->wotrdb = $this->load->database('wotrdb', TRUE);
			if(!is_null($passwd)||!is_null($email))
			{
				
				$email = $this->wotrdb->escape_str($email);
				// $this->wotrdb->where('Email', $email);  
	   //         	$this->wotrdb->where('Password', $passwd);  
	   //         	$query = $this->wotrdb->get('users');  
				$query = $this->wotrdb->get_where('WT_HRMS_UserMaster_T',array("Reg_EmialID "=>$email,"Password"=>$passwd));
				if($query->num_rows() > 0)
				{
					if($query->row()->Password === $passwd)
					{
						$logindata = array(
							'ID' => $query->row()->Employee_Code ,
							'Name' => $query->row()->Employee_Name ,
							'Email' => $query->row()->Reg_EmialID ,
							'Login_as' => $query->row()->RoleID ,
							'Logged_in' => "TRUE",
							'Locked' => "FALSE"
						);
						$this->session->set_userdata($logindata);
						// $this->session->set_session_data($logindata);
						$this->session->set_flashdata('alert', true);
						return TRUE;
					}
					else
					{
						return FALSE;
					}
				}
				else {
					return FALSE;
				}
			}
		}

	    public function check_login()
	    {
	    	//var_dump($this->session->userdata('Logged_in'));
	    	if($this->session->userdata('Logged_in') === "TRUE")
	    	{
	    		// return ($this->session->get_userdata('Locked') === "FALSE") ? TRUE : FALSE;
	    		return TRUE;
	    	}
	    	else
	    	{
	    		return FALSE;
	    	}	
	    }
	    

	    public function logout()
	    {
	    	$this->session->sess_destroy();
	    	return TRUE;
	    }


	}
?>