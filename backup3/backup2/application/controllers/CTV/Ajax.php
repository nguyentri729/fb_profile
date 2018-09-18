<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->config('imgur');
 		$this->client_id = $this->config->item('client_id');

		$this->load->model('m_captcha');
		$this->load->library('form_validation');
		$this->load->model('ctv/m_login', 'ctv_login');
		$this->load->model('quanli/m_login', 'quanli_login');
		header('Content-Type: application/json');
	}
	public function no_login($type = ''){
		switch ($type) {
			case 'login':
				if($this->m_func->check_login('ctv') == FALSE){
					$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
					$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[8]|max_length[50]');
					$this->form_validation->set_rules('captcha', 'Mật khẩu', 'required');

					if ($this->form_validation->run() == TRUE) {
						
						$check_captcha = $this->m_captcha->check_captcha($this->input->post('captcha'));

						if($check_captcha['status']){
							
							//Mã hóa pass
							$email = $this->input->post('email');
							$password = $this->ctv_login->creat_pass($this->input->post('password'));
							//Đăng nhập
							if($this->input->post('remember') == 'nho_dang_nhap'){
								$remember = true;
							}else{
								$remember = false;
							}
							$this->ctv_login->login($email, $password, $remember);

						}else{
							$this->m_func->noti(false, $check_captcha['message']);
						}


					} else {
						$this->m_func->noti(false, validation_errors());
					}
				}else{
					$this->m_func->noti(false, 'Bạn đã đăng nhập rồi !');
				}


				break;
			case 'quanli_login':
				if($this->m_func->check_login('quanli') == FALSE){
					$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
					$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[8]|max_length[50]');
					$this->form_validation->set_rules('captcha', 'Mật khẩu', 'required');

					if ($this->form_validation->run() == TRUE) {
						
						$check_captcha = $this->m_captcha->check_captcha($this->input->post('captcha'));

						if($check_captcha['status']){
							
							//Mã hóa pass
							$email = $this->input->post('email');
							$password = $this->quanli_login->creat_pass($this->input->post('password'));
							//Đăng nhập
							if($this->input->post('remember') == 'nho_dang_nhap'){
								$remember = true;
							}else{
								$remember = false;
							}
							$this->quanli_login->login($email, $password, $remember);

						}else{
							$this->m_func->noti(false, $check_captcha['message']);
						}


					} else {
						$this->m_func->noti(false, validation_errors());
					}
				}else{
					$this->m_func->noti(false, 'Bạn đã đăng nhập rồi !');
				}


				break;
			default:
				# code...
				break;
		}

		echo $this->m_func->noti_result('json');
	}
	public function upload_image(){
		$result = array(
			'status' => false,
			'data' => ''
		);
		$img = $_FILES['image'];
		
        @$filename    = $img['tmp_name'];
        @$handle      = fopen($filename, "r");
        @$data        = fread($handle, filesize($filename));
        $pvars       = array(
           'image' => base64_encode($data)
        );

		$curl = curl_init(); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
		curl_setopt($curl, CURLOPT_TIMEOUT, 60); 
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $this->client_id)); 
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars); 
		$out = curl_exec($curl); 
		curl_close ($curl); 
		$pms = json_decode($out,true); 
		if(isset($pms['data']['link'])){
			$result = array(
				'status' => true,
				'data' => $pms['data']['link']
			);
		 
		}else{
			$result = array(
				'status' => false,
				'data' => ''
			);
		}
      echo json_encode($result);
	}
	public function get_id(){
        if ($this->input->get('get_id') != '') {
            $result = array(
            	'status' => false,
            );
            $idfb = $this->input->get('get_id');
            $expl = explode('_', $idfb);
            if (count($expl) > 1) {
	            $result = array(
	            	'status' => true,
	            	'data' => $idfb
	            );
                 exit(json_encode($result));
            }
            $this->load->model('m_token');
            $get_random_token = $this->m_token->get_random_token();
            $ok = json_decode($this->m_func->curl_api('https://graph.facebook.com/'.$idfb .'/?fields=from,id,reactions.summary(true)&limit=1&access_token=' . $get_random_token . '', 'GET'), true);
            
            if (isset($ok['from']['id'])) {
	            $result = array(
	            	'status' => true,
	            	'data' => $ok['from']['id'] . '_' . $ok['id']
	            );
               
            }
            exit(json_encode($result));
        }
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/CTV/Ajax.php */