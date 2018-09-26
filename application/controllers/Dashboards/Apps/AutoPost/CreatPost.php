
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreatPost extends CI_Controller {
	private $s_post = 0;
	public function __construct()
	{
		parent::__construct();
		if($this->m_func->check_login()==false){
			redirect('/Login');
		}
	}
	public function index()
	{
		$data = array(
			'title' => 'Tạo bài đăng mới',
			'view'  => array(
				'view' => 'dashboard/apps/auto_post/creat_post',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/apps/auto_post/creat_post',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}
	public function ajax(){
		/*$date = new DateTime($this->input->post('time_post'));
		echo $date->getTimestamp();*/
		$this->form_validation->set_rules('message', 'Nội dung', 'xss_clean|callback_noidung');
		$this->form_validation->set_rules('img[]', 'Hình ảnh', 'valid_url');
		$this->form_validation->set_rules('post_where', 'Nơi post', 'required|callback_wherepost');
		$this->form_validation->set_rules('privacy', 'privacy', 'required|callback_privacy');
		$this->form_validation->set_rules('ab_gr', 'ab_gr', 'required|callback_ab_gr');
		
		$this->form_validation->set_rules('time_post', 'Thời gian đăng bài', 'required|callback_time_post');
		$this->form_validation->set_rules('repeat', 'Thời gian lặp', 'required|integer|greater_than_equal_to[0]');
		if ($this->form_validation->run()) {
			echo 'ok';
		} else {
			echo validation_errors();
		}
	}
	public function wherepost($where){
		if($where != 'profile' && $where != 'group' && $where != 'albums'){
			 $this->form_validation->set_message('wherepost', '{field} không hợp lệ !');
             return FALSE;
		}else{
			return TRUE;
		}
	}
	public function privacy($privacy){
		if($privacy != 'everyone' && $privacy != 'friend' && $privacy != 'onlyme'){
			 $this->form_validation->set_message('privacy', '{field} không hợp lệ !');
             return FALSE;
		}else{
			return TRUE;
		}
	}
	public function time_post($time){
		$date = new DateTime($time);
		$this->s_post = $date->getTimestamp();
		if(time() <= $this->s_post){
			$this->form_validation->set_message('time_post', '{field} phải lớn hơn thời gian hiện tại !');
             return FALSE;
		}else{
			return TRUE;
		}
	}
	public function noidung($nd){
		if($nd == '' && $this->input->post('img') == ''){
			$this->form_validation->set_message('noidung', '{field} không được bỏ trống');
             return FALSE;
		}else{
			return true;
		}
	}
	public function ab_gr($ab_gr){
		if($this->input->post('wherepost') == 'group' || $this->input->post('wherepost') == 'albums'){
			$list_id = json_decode($ab_gr, false, 512, JSON_BIGINT_AS_STRING);
			if(count($list_id) <= 0){
				$this->form_validation->set_message('ab_gr', '{field} không được bỏ trống');
				  return FALSE;
			}else{
				for ($i=0; $i < count($list_id); $i++) { 
					if(is_numeric($list_id[$i]) == false){
						$this->form_validation->set_message('ab_gr', '{field} phải là số');
				  		return FALSE;
					}
				}
				return TRUE;
			}
		}else{
			return true;
		}
		
	}



}

/* End of file CreatPost.php */
/* Location: ./application/controllers/Dashboard/Apps/AutoPost/CreatPost.php */