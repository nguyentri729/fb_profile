
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_captcha');

	}
	public function index()
	{
		if($this->m_func->check_login('ctv') == TRUE){
			redirect('/CTV/Dashboard');
			exit;
			
		}else{
			$data = array(
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
	        		'hash' => $this->security->get_csrf_hash()
				),
				'captcha' => $this->m_captcha->creat_captcha()
			);
			$this->load->view('CTV/login', $data, FALSE);	
		}




	}
	public function Logout(){
		session_destroy();
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/CTV/Login.php */