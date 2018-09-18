
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		foreach ($this->db->get('access_token')->result_array() as $token) {
			echo $token['access_token'].'<br>';
		};

	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */