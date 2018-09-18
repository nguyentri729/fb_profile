
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
		        'img_width'     => '130',
		        'img_height'    => 45,
		        'expiration'    => 7200,
		        'font_path' => FCPATH. 'assets/font/Verdana.ttf',
		        'word_length'   => 4,
		        'font_size'     => '45',
		        'pool'          => '0123456789',
		        'colors'        => array(
		                'background' => array(34, 34, 34),
		                'border' => array(74, 177, 220),
		                'text' => array(255, 255, 255),
		                'grid' => array(136, 114, 152)
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