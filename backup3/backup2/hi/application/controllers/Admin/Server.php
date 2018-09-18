<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('admin') == FALSE){
			redirect('/Admin/Login');
		}
		$this->load->model('admin/m_admin', 'm_admin');

	}
	public function index()
	{
		if($this->input->post('url_server')){
			$this->form_validation->set_rules('url_server', 'Url Server', 'required|valid_url|callback_check_url');
			if ($this->form_validation->run()) {
				switch ($this->input->post('table')) {
					case 'server_bot':
						$array_insert = array(
							'bot_reactions' => 0,
							'bot_comment' => 0,
							'bot_post' => 0,
							'active' => 1,
							'url_server' => $this->input->post('url_server')
						);
						break;
					case 'server_vip':
						$array_insert = array(
							'vip_reactions' => 0,
							'vip_comment' => 0,
							'vip_share' => 0,
							'active' => 1,
							'url_server' => $this->input->post('url_server')
						);
						break;
					case 'server_buff':
						$array_insert = array(
							'buff_like' => 0,
							'buff_reactions' => 0,
							'buff_share' => 0,
							'buff_rate' => 0,
							'buff_follow' => 0,
							'buff_comment' => 0,
							'active' => 1,
							'url_server' => $this->input->post('url_server')
						);
						break;
					default:
						exit('Error');
						break;
				}
				if($this->db->insert($this->input->post('table'), $array_insert)){
					$this->m_func->noti(true, 'Thêm server thành công!');
				}else{
					$this->m_func->noti(false, 'Không thể thêm vào server do lỗi');
				}
			} else {
				$this->m_func->noti(false, validation_errors());
			}
			exit($this->m_func->noti_result());
		}
		if($this->input->get('delete_id') !=''){
			$this->db->where('id', (int)$this->input->get('delete_id'));
			if($this->db->delete($this->input->get('delete_where'))){
				$this->m_func->noti(true, 'Đã xoá thàn công');
			}else{
				$this->m_func->noti(false, 'Xoá không thàn công');
			}
		
			exit($this->m_func->noti_result());
		}

		if($this->input->get('edit') !=''){
			if($this->input->get('link_request') !=''){
				//header('Content-Type: application/json');
				$ok = $this->m_func->curl_api($this->input->get('link_request'));
				@$array = json_decode($ok, true);
				if(isset($array)){
					print_r($array);
					$this->db->where('id', (int)$this->input->get('edit'));
					if($this->db->update($this->input->get('type'), $array)){
						echo 'Cập nhật thành công';
					}else{
						echo 'Cập nhật thất bại';
					}
				}else{
					echo 'Server không trả về kết quả';
				}

				
				exit();
			}
			$this->db->where('id', (int)$this->input->get('edit'));
			$get_data = $this->db->get($this->input->get('type'));
			if($get_data->num_rows() > 0){
				$data_server = $get_data->result_array()[0];
			}else{
				exit('Ko tìm thấy package');
			}
			if($this->input->post('active') !=''){
				$this->form_validation->set_rules('url_server_update', 'Url Server', 'required|valid_url');
				$this->form_validation->set_rules('active', 'Active', 'required');
				if ($this->form_validation->run()) {

					$this->db->where('id', (int)$this->input->get('edit'));
					$array_update = array(
						'url_server' => $this->input->post('url_server_update'),
						'active' => $this->input->post('active')
					);
					if($this->db->update($this->input->get('type'), $array_update)){
						$this->m_func->noti(true, 'Cập nhật thành công!');
					}else{
						$this->m_func->noti(false, 'Cập nhật lỗi');
					}
					
				}else{
					$this->m_func->noti(false, validation_errors());
				}
				exit($this->m_func->noti_result());

			}
			$data =  array(
				'title' => 'Edit Server',
				'data'  => array(
					'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name(),
		        		'hash' => $this->security->get_csrf_hash()
					),
					'data_server' => $data_server
				),
				'script' => 'Admin/script/edit_server',
				'view' => 'Admin/html/edit_server'
			);
			$this->load->view('Admin/layout', $data, FALSE);
		}else{
			$data =  array(
				'title' => 'Quản lý server',
				'data'  => array(
					'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name(),
		        		'hash' => $this->security->get_csrf_hash()
					)
				),
				'script' => 'Admin/script/server',
				'view' => 'Admin/html/server'
			);
			$this->load->view('Admin/layout', $data, FALSE);
		}

	}
	function check_url($url){
		$this->db->where('url_server', $url);
		if($this->db->get($this->input->post('table'))->num_rows() > 0){
            $this->form_validation->set_message('check_url', '{field} đã tồn tại');
            return FALSE;
		}else{
			return true;
		}
	}
}

/* End of file Server.php */
/* Location: ./application/controllers/Admin/Server.php */