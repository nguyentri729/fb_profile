
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function Image($type = '')
	{
		switch ($type) {
			case 'Imgur':
								$result = array(
									'status' => false,
									'msg'    => 'Có lỗi xảy ra ! Vui lòng thử lại'
								);

								if ($_FILES['image']['name'][0] != '') {
                                  
                                    $img        = $_FILES['image'];
                                    $image      = '';
                                    
                                   
                                    for ($i = 0; $i < count($img['type']); $i++) {
                                        
                                        $filename    = $img['tmp_name'][$i];
                                        $client_id   = "3f9a53bd5ebb2fa";
                                        $handle      = fopen($filename, "r");
                                        $data        = fread($handle, filesize($filename));
                                        $pvars       = array(
                                            'image' => base64_encode($data)
                                        );
                                        $upload_done = $this->m_func->upload_imgur($client_id, $pvars);
                                        if ($upload_done == false) {
                                           
                                        } else {
                                       
                                            $image = $image . $upload_done . ';'; 
                                        }
                                    }
                                    $image = rtrim($image, ";");
                                    if($image != ''){
                                    	$result = array(
											'status' => true,
											'data'    => explode(';', $image),
										);
                                    }else{
                                    	$result = array(
											'status' => false,
											'msg'    => 'Tải ảnh lên thất bại !'
										);
                                    }
                                }else{
                                	$result = array(
										'status' => false,
										'msg'    => 'Không có ảnh tải lên!'
									);
                                }
                                $this->m_func->return_json($result);

				break;
			
			default:
				# code...
				break;
		}
	}

}

/* End of file Upload.php */
/* Location: ./application/controllers/Upload.php */