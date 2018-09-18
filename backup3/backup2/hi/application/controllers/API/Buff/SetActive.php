
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SetActive extends CI_Controller {

	public function index()
	{
		if($this->input->get('set_active') !=''){
			$this->db->where('id', $this->input->get('set_active'));
			if($this->db->update($this->input->get('where'), array('active' => 2))){
				echo 'success';
			}else{
				echo 'fail';
			}

		}
	}


}

/* End of file SetActive.php */
/* Location: ./application/controllers/API/Buff/SetActive.php */