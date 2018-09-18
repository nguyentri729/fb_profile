
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->config('imgur');
 		$this->client_id = $this->config->item('client_id');
		header('Content-Type: application/json');
	}
	public function Image($site = '')
	{
		switch ($site) {
			case 'Imgur':
							
						$result = array(
							'status' => true,
							'data' => array()
						);
						$img = $_FILES['image'];

						for($i=0; $i<count($_FILES['image']['name']); $i++){
					        @$filename    = $img['tmp_name'][$i];
					        @$handle      = fopen($filename, "r");
					        @$data        = fread($handle, filesize($filename));
					        $pvars       = array(
					           'image' => base64_encode($data)
					        );

							$curl = curl_init(); 
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
							curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
							curl_setopt($curl, CURLOPT_TIMEOUT, 60); 
							curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $this->client_id)); 
							curl_setopt($curl, CURLOPT_POST, 1); 
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
							curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars); 
							$out = curl_exec($curl); 
							curl_close ($curl); 
							$pms = json_decode($out,true); 
							if(isset($pms['data']['link'])){
								array_push($result['data'], $pms['data']['link']);
								
							 
							}else{
								//var_dump($pms);
								$result = array(
									'status' => false,
									
								);
							}
					      //echo json_encode($result);
						}
						echo json_encode($result);





				break;
			
			default:
				# code...
				break;
		}
	}

}

/* End of file Upload.php */
/* Location: ./application/controllers/Upload.php */