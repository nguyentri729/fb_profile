<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91386361-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-91386361-1');
</script>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login() == FALSE){
			redirect('/HackLike');
			exit;
		}
	}
	public function index()
	{
		$data =  array(
			'title' => 'Auto Like - Hack Sub Facebook',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id'))
			),
			'view' => 'login/main'
		);
		$this->load->view('layout', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
