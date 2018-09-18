<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThongBao extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('admin') == FALSE){
			redirect('/Admin/Login');
		}
		$this->load->model('admin/m_admin', 'm_admin');

	}
	public function index()
	{	

			if($this->input->post('message') !=''){

				$insert = array(
					'message' => $this->input->post('message'),
					'time_creat' => time()
				);
				if($this->db->insert('thong_bao', $insert)){
					$this->m_func->noti(true, 'Thêm thông báo thành công');
				}else{
					$this->m_func->noti(false, 'Không thể thêm vào server do lỗi');
				}
				exit($this->m_func->noti_result());
			}


			if($this->input->get('delete_id') !=''){
				$this->db->where('id', (int)$this->input->get('delete_id'));
				if($this->db->delete('thong_bao')){
					$this->m_func->noti(true, 'Đã xoá thành công');
				}else{
					$this->m_func->noti(false, 'Xoá không thành công');
				}
			
				exit($this->m_func->noti_result());
			}


			
				$data =  array(
					'title' => 'Quản lý thông báo',
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_noti' => $this->db->get('thong_bao')->result_array()
					),
					'script' => 'Admin/script/package',
					'view' => 'Admin/html/thongbao'
				);
				$this->load->view('Admin/layout', $data, FALSE);
			
	}

}

/* End of file ThongBao.php */
/* Location: ./application/controllers/Admin/ThongBao.php */