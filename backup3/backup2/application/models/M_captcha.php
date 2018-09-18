
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_captcha extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
	}
	public function check_captcha($captcha){
		$result = array(
			'status' => false,
			'message' => 'Lỗi không xác định'
		);
		if($this->session->has_userdata('captcha_word')){

			if($captcha == $this->session->userdata('captcha_word')){
				$result = array(
					'status' => true,
					'message' => 'Captcha hợp lệ'
				);
				$this->session->unset_userdata('captcha_word');	
			}else{
				$result = array(
					'status' => false,
					'message' => 'Captcha không hợp lệ'
				);	
			}

		}else{
			$result = array(
				'status' => false,
				'message' => 'Captcha đã hết hạn'
			);
		}
		return $result;
	}
	public function creat_captcha(){
		$vals = array(
		        'img_path'      => './assets/images/captcha/',
		        'img_url'       => base_url('assets/images/captcha'),
		        'img_width'     => '150',
		        'img_height'    => 30,
		        'expiration'    => 7200,
		        'font_path' => FCPATH. 'assets/font/Verdana.ttf',
		        'word_length'   => 5,
		        'font_size'     => 15,
		        'pool'          => '0123456789',
		        'colors'        => array(
		                'background' => array(255, 255, 255),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(255, 40, 40)
		        )
		);
		$cap = create_captcha($vals);
		$array = array(
			'captcha_word' => $cap['word']
		);
		$this->session->set_userdata( $array );
		$this->session->mark_as_temp('captcha_word', 7200);
		return $cap;

	}

}

/* End of file M_captcha.php */
/* Location: ./application/models/M_captcha.php */