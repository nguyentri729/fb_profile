<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('admin') == FALSE){
			redirect('/Admin/Login');
		}
		$this->load->model('admin/m_admin', 'm_admin');

	}
	public function index()
	{
			if($this->input->post('email') !=''){
				$this->db->where('email', $this->input->post('email'));
				if($this->db->get('ctv_acc')->num_rows() > 0){
					$this->m_func->noti(false, 'Email này đã tồn tại');
					exit($this->m_func->noti_result());
				}
				$data_insert = array(
					'email'=> $this->input->post('email'),
					'password'=> $this->m_func->creat_pass($this->input->post('password')),
					'name'=> $this->input->post('name'),
					'money'=> $this->input->post('money'),
					'phone_number'=> $this->input->post('phone_number'),
					'uid_fb'=> $this->input->post('uid_fb'),
					'type_acc'=> $this->input->post('type_acc'),
					'chi_tieu_thang'=> 0,
					'time_creat'=> time(),
					'user_creat'=> $this->session->userdata('admin_id'),
					'active'=> 1,
				);
				if($this->db->insert('ctv_acc', $data_insert)){
					
					$this->m_func->noti(true, '<div class="alert alert-success"><p>Chào mừng bạn tham gia hệ thống ! Đây là thông tin đăng nhập của bạn.</p><p>------------------------</p><strong>Email: </strong> <i>'.$this->input->post('email').'</i><br><strong>Password: </strong> <i>'.$this->input->post('password').'</i><br><strong>Login Page: </strong> <a href="'.base_url('/CTV/Login').'" target="_blank">'.base_url('/CTV/Login').'</a><br></div>');
				}else{
					$this->m_func->noti(false, 'Không thể thêm vào server do lỗi');
				}
				exit($this->m_func->noti_result());
			}
			$data =  array(
				'title' => 'Quản lý thành viên',
				'data'  => array(
					'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name(),
		        		'hash' => $this->security->get_csrf_hash()
					)
				),
				'script' => 'Admin/script/add_members',
				'view' => 'Admin/html/add_member'
			);
			$this->load->view('Admin/layout', $data, FALSE);
	}
	public function ThanhVien()
	{
		if($this->input->get('delete_id') !=''){
			$this->db->where('id', (int)$this->input->get('delete_id'));
			if($this->db->delete('ctv_acc')){
				$this->m_func->noti(true, 'Đã xoá thành công');
			}else{
				$this->m_func->noti(false, 'Xoá không thành công');
			}
		
			exit($this->m_func->noti_result());
		}

		if($this->input->get('plus_id') !=''){
			
			$id = (int)$this->input->get('plus_id');
			$tien = (int)$this->input->get('plus_money');
			$query = $this->db->query("UPDATE ctv_acc SET money = money + $tien WHERE id = $id");
			if($query){
				$this->m_func->noti(true, 'Thành công !');
			}else{
				$this->m_func->noti(false, 'Lỗi ko cập nhật được');
			}
		
			exit($this->m_func->noti_result());
		}

		if($this->input->get('chinh_sua') !=''){
			$id_edit = (int)$this->input->get('chinh_sua');
			$this->db->where('id', (int)$this->input->get('chinh_sua'));
			$get = $this->db->get('ctv_acc');
			if($get->num_rows() > 0){

				$data_thanhvien = $get->result_array()[0];
				if($this->input->post('email') !=''){
					$this->db->where('id !=', $id_edit);
					$this->db->where('email', $this->input->post('email'));
					if($this->db->get('ctv_acc')->num_rows() > 0){
						$this->m_func->noti(false, 'Email này đã có người sử dụng');
						exit($this->m_func->noti_result());
					}
					$data_update = array(
						'email'=> $this->input->post('email'),
						'name'=> $this->input->post('name'),
						'money'=> $this->input->post('money'),
						'phone_number'=> $this->input->post('phone_number'),
						'uid_fb'=> $this->input->post('uid_fb'),
						'type_acc'=> $this->input->post('type_acc'),
						'active'=> $this->input->post('active')
					);
					$this->db->where('id', $id_edit);
					if($this->db->update('ctv_acc', $data_update)){
						$this->m_func->noti(true, 'Cập nhật thành công !');
					}else{
						$this->m_func->noti(false, 'Khong the cap nhat');
					}
					exit($this->m_func->noti_result());

				}
				$data =  array(
					'title' => 'Chỉnh sửa '.$data_thanhvien['name'],
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_thanhvien' => $data_thanhvien
					),
					'script' => 'Admin/script/edit_member',
					'view' => 'Admin/html/edit_member'
				);
				$this->load->view('Admin/layout', $data, FALSE);
			}
		}else{
			$data =  array(
				'title' => 'Quản lý thành viên',
				'data'  => array(
					'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin'),
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name(),
		        		'hash' => $this->security->get_csrf_hash()
					),
					'data_thanhvien' => $this->db->get('ctv_acc')->result_array()
				),
				'assets' => array(
					'css' => array('/assets/plugins/DataTables/datatables.min.css'),
					'script' => array('/assets/plugins/DataTables/datatables.min.js')
				), 
				'script' => 'Admin/script/member',
				'view' => 'Admin/html/member'
			);
			$this->load->view('Admin/layout', $data, FALSE);
		}

	}
}

/* End of file Member.php */
/* Location: ./application/controllers/Admin/Member.php */