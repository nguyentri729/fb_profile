<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HackLike extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login()){
			redirect('/Dashboard');
			exit;
		}
	}
	public function index()
	{
		$data =  array(
			'title' => 'Hack Like, Cài bot cảm xúc miễn phí|Tăng like miễn phí|cài bot cảm xúc|bot bình luận',
			'data'  => array(
			),
			'script' => 'no_login/script/index',
			'view' => 'no_login/index'
		);
		$this->load->view('layout', $data, FALSE);

	}
	public function LayToken(){
		$data =  array(
			'title' => 'Lấy Token đăng nhập',
			'data'  => array(
			),
			'script' => 'no_login/script/get_token',
			'view' => 'no_login/get_token'
		);
		$this->load->view('layout', $data, FALSE);
	}
	function LayTokenSource(){
		$data =  array(
			'title' => 'Lấy Token bằng mã nguồn Facebook',
			'data'  => array(
			),
			'script' => 'no_login/script/get_token_source',
			'view' => 'no_login/get_token_source'
		);
		$this->load->view('layout', $data, FALSE);
	}
}
