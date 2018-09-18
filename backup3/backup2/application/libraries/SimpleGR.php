<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Simple Graph Facebook Class
 *
 * Use Graph API
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Philip Sturgeon
 * @license         http://philsturgeon.co.uk/code/dbad-license
 * @link			http://philsturgeon.co.uk/code/codeigniter-curl
 */
class SimpleGR {
	protected $_ci; 
	protected $_graph = 'https://graph.facebook.com/';
	protected $_token = '';
	function __construct(){
		$this->_ci = & get_instance();
	}
	function set_token($token){
		$this->$_token = $token;
		return true;
	}
	function get_info(){
		echo $this->curl_graph('me','GET');
	}
	function curl_graph($url, $method, $data = array(), $token){
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_HEADER, true);
	    curl_setopt($ch, CURLOPT_NOBODY, false);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	    array_push($data, array('access_token' => $token));
	    $query = http_build_query($data);

	    curl_setopt($ch, CURLOPT_URL, $this->$_graph.$url.'?'.$query);
	  
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

	    $html = curl_exec($ch);
	    curl_close($ch);
	    return $html;
	}
}
