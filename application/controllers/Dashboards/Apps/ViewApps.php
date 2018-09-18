
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewApps extends CI_Controller {
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
			'title' => 'Tất cả ứng dụng',
			'view'  => array(
				'view' => 'dashboard/apps/view_apps',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/apps/view_apps',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}
	public function ajax(){

		if($this->input->post('active_dich_vu')){
			$result = array(
				'status' => false,
				'msg'    => 'error code 1'
			);
			$gia = $this->m_func->get_gia($this->input->post('active_dich_vu'));
			if($gia != false){

				if($this->m_func->check_money($gia * 30)){

					//check da ton tai trong bang
					$this->db->where('id_fb', $this->session->userdata('id_fb'));
					$check = $this->db->get('auto_post');
					if($check->num_rows() == 0){


						$ins = array(
							'id_fb' => $this->session->userdata('id_fb'), 
							'time_use' => time() + 30*86400,
							'time_creat' => time(),
							'active_by' => 0,
							'active' => 1
						);
						if($this->db->insert('auto_post', $ins)){
							if($this->m_func->tru_tien($gia * 30)){
								$result = array(
									'status' => true,
									'msg'    => 'Đã kích hoạt thành công ! Xem lịch sử giao dịch để biết thêm thông tin chi tiết !'
								);
							}else{
								$result = array(
									'status' => false,
									'msg'    => 'Chúng tôi gặp sự cố khi kích hoạt dịch vụ ! Vui lòng thử lại sau nhé !'
								);
							}
							
							


						}else{
							$result = array(
								'status' => false,
								'msg'    => 'Chúng tôi gặp sự cố khi kích hoạt dịch vụ ! Vui lòng thử lại sau nhé !'
							);
						}

					}else{
						$result = array(
							'status' => false,
							'msg'    => 'Bạn đã mua dịch vụ này rồi !'
						);
					}

				}else{
					$result = array(
						'status' => false,
						'msg'    => 'Số tiền trong tài khoản không đủ để thực hiện !'
					);
				}

			}else{
				$result = array(
					'status' => false,
					'msg'    => 'Đã xảy ra lỗi !'
				);
			}
			$this->m_func->return_json($result);
		}else{
			$result = array(
				'error' => true,
				'msg' => 'Error !'
			);
			$this->m_func->return_json($result);
		}
	}


}

/* End of file ViewApps.php */
/* Location: ./application/controllers/Dashboard/Apps/ViewApps.php */