<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BangGia extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('admin') == FALSE){
			redirect('/Admin/Login');
		}
		$this->load->model('admin/m_admin', 'm_admin');

	}
	public function index()
	{	

			if($this->input->post('name_package') !=''){

				$insert = array(
					'name_package' => $this->input->post('name_package'),
					'mieu_ta' => $this->input->post('mieu_ta'),
					'so_luong' => $this->input->post('so_luong'),
					'max_post' => $this->input->post('max_post'),
					'type_package' => $this->input->post('type_package'),
					'gia_clone' => $this->input->post('gia_clone'),
					'gia_nguoithat' => $this->input->post('gia_nguoithat'),
					'doi_tuong_dung' => $this->input->post('doi_tuong_dung'),
					'time_creat' => time(),
					'user_creat' =>$this->session->userdata('admin_id') ,
					'active' => 1,	
				);
				if($this->db->insert('package_vip', $insert)){
					$this->m_func->noti(true, 'Thêm package thành công');
				}else{
					$this->m_func->noti(false, 'Không thể thêm vào server do lỗi');
				}
				exit($this->m_func->noti_result());
			}
			if($this->input->get('delete_id') !=''){
				$this->db->where('id', (int)$this->input->get('delete_id'));
				if($this->db->delete('package_vip')){
					$this->m_func->noti(true, 'Đã xoá thành công');
				}else{
					$this->m_func->noti(false, 'Xoá không thành công');
				}
			
				exit($this->m_func->noti_result());
			}

			if($this->input->get('chinh_sua') !=''){
				$id_edit = (int)$this->input->get('chinh_sua');
				$this->db->where('id', (int)$this->input->get('chinh_sua'));
				$get = $this->db->get('package_vip');
				if($get->num_rows() > 0){
					if($this->input->post('name_package_update') !=''){

						$update = array(
							'name_package' => $this->input->post('name_package_update'),
							'mieu_ta' => $this->input->post('mieu_ta'),
							'so_luong' => $this->input->post('so_luong'),
							'max_post' => $this->input->post('max_post'),
							'type_package' => $this->input->post('type_package'),
							'gia_clone' => $this->input->post('gia_clone'),
							'gia_nguoithat' => $this->input->post('gia_nguoithat'),
							'doi_tuong_dung' => $this->input->post('doi_tuong_dung'),
							'time_creat' => time(),
							'user_creat' =>$this->session->userdata('admin_id') ,
							'active' => $this->input->post('active')
						);
						$this->db->where('id', $id_edit);
						if($this->db->update('package_vip', $update)){
							$this->m_func->noti(true, 'Cập nhật package thành công');
						}else{
							$this->m_func->noti(false, 'Không thể cập nhật vào server do lỗi');
						}
						exit($this->m_func->noti_result());
					}
					$data_package = $get->result_array()[0];
					$data =  array(
						'title' => 'Edit bảng giá',
						'data'  => array(
							'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
							'csrf' => array(
								'name' => $this->security->get_csrf_token_name(),
				        		'hash' => $this->security->get_csrf_hash()
							),
							'data_package' => $data_package
						),
						'assets' => array(
							'css' => array('/assets/plugins/DataTables/datatables.min.css'),
							'script' => array('/assets/plugins/DataTables/datatables.min.js')
						), 
						'script' => 'Admin/script/package',
						'view' => 'Admin/html/edit_package'
					);
					$this->load->view('Admin/layout', $data, FALSE);
				}
			}else{
				$data =  array(
					'title' => 'Bảng giá VIP',
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_package' => $this->db->get('package_vip')->result_array()
					),
					'assets' => array(
						'css' => array('/assets/plugins/DataTables/datatables.min.css'),
						'script' => array('/assets/plugins/DataTables/datatables.min.js')
					), 
					'script' => 'Admin/script/package',
					'view' => 'Admin/html/package'
				);
				$this->load->view('Admin/layout', $data, FALSE);
			}
	}

	public function Buff()
	{	
			if($this->input->post('type_acc') !=''){
				$update = array(
					'gia_clone_dl' => $this->input->post('gia_clone_dl'), 
					'gia_clone_ctv' => $this->input->post('gia_clone_dl'), 
					'gia_that_ctv' => $this->input->post('gia_that_ctv'), 
					'gia_that_dl' => $this->input->post('gia_that_dl'), 
					'time_creat' => time(),
					'user_creat' => $this->session->userdata('admin_id')
				);
				$this->db->where('dich_vu', $this->input->post('type_acc'));
				if($this->db->update('bang_gia_buff', $update)){
					$this->m_func->noti(true, 'Thành công');
				}else{
					$this->m_func->noti(false, 'Không thành công');
				}
				exit($this->m_func->noti_result());
			}

				$data =  array(
					'title' => 'Bảng giá Buff',
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_package' => $this->db->get('bang_gia_buff')->result_array()
					),
					'script' => 'Admin/script/package',
					'view' => 'Admin/html/bang_gia_buff'
				);
				$this->load->view('Admin/layout', $data, FALSE);
			
	}

	public function Bot()
	{	
			if($this->input->post('type_acc') !=''){
				$update = array(
					'gia_ctv' => $this->input->post('gia_ctv'), 
					'gia_dl' => $this->input->post('gia_dl'), 
					'time_creat' => time(),
					'user_creat' => $this->session->userdata('admin_id')
				);
				$this->db->where('dich_vu', $this->input->post('type_acc'));
				if($this->db->update('bang_gia', $update)){
					$this->m_func->noti(true, 'Thành công');
				}else{
					$this->m_func->noti(false, 'Không thành công');
				}
				exit($this->m_func->noti_result());
			}

				$data =  array(
					'title' => 'Bảng giá Bot',
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_package' => $this->db->get('bang_gia')->result_array()
					),
					'script' => 'Admin/script/package',
					'view' => 'Admin/html/bang_gia_bot'
				);
				$this->load->view('Admin/layout', $data, FALSE);
			
	}
}

/* End of file BangGia.php */
/* Location: ./application/controllers/Admin/BangGia.php */