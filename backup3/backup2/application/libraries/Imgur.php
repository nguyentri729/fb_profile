<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Imgur Class
 *
 * Upload image to Imgur
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	nguyentri729
 */
class Imgur {

	protected $CI;
	protected $img = '';
	function __construct($url = '')
	{
		$this->CI = & get_instance();


        $this->CI->load->config('imgur');
        $this->client_id = $this->CI->config->item('client_id');

	}
	function set_file($file){
		$this->img = $file;
	}
	function upload_file($file){
		$this->img = $file;
        $filename    = $this->img['tmp_name'];
        $handle      = fopen($filename, "r");
        $data        = fread($handle, filesize($filename));
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
		  return $pms['data']['link'];
		}else{
		  return false;
		}
      
	}
}