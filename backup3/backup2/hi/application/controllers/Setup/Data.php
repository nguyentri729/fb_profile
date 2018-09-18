<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	private $bot_cx = "CREATE TABLE `bot_reactions` ( `id` INT NOT NULL AUTO_INCREMENT , `access_token` VARCHAR(255) NOT NULL , `name` VARCHAR(100) NOT NULL , `id_fb` VARCHAR(50) NOT NULL , `time_use` INT NOT NULL , `time_start` INT NOT NULL , `time_end` INT NOT NULL , `post_mot_lan` INT NOT NULL , `khoang_cach_lan` INT NOT NULL , `max_post_ngay` INT NOT NULL , `group_tt` INT NOT NULL , `page_tt` INT NOT NULL , `profile_tt` INT NOT NULL , `list_tt` INT NOT NULL , `age_start` INT NOT NULL , `age_end` INT NOT NULL , `gender` INT NOT NULL , `ds_list` INT NOT NULL , `cum_tu_ko_tt` TEXT NOT NULL , `nguoi_ko_tt` VARCHAR(255) NOT NULL , `cam_xuc_su_dung` INT NOT NULL , `ghi_chu` VARCHAR(255) NOT NULL , `server_luu_tru` INT NOT NULL , `token_die` INT NOT NULL , `cookie_die` INT NOT NULL , `time_creat` INT NOT NULL , `user_creat` INT NOT NULL , `active` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
	   ALTER TABLE `bot_reactions` ADD `type_reactions` INT NOT NULL COMMENT 'Loại sử dụng : 1 là token, 0 là cookie' AFTER `cookie_die`;
	   ALTER TABLE `bot_reactions` CHANGE `cam_xuc_su_dung` `cam_xuc_su_dung` VARCHAR(255) NOT NULL;
	    ";
	private $ctv_acc = "CREATE TABLE `ctv_acc` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `money` INT NOT NULL , `phone_number` VARCHAR(20) NOT NULL , `uid_fb` VARCHAR(50) NOT NULL , `time_creat` INT NOT NULL , `user_creat` INT NOT NULL , `active` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	private $ci_session = "CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);";
	public function index()
	{
		$this->db->query($this->bot_cx);
		$this->db->query($this->ctv_acc);
		$this->db->query($this->ci_session);
//CREATE TABLE `hethongbotnew`.`server_bot` ( `id` INT NOT NULL AUTO_INCREMENT , `url_server` VARCHAR(250) NOT NULL , `bot_reactions` INT NOT NULL , `bot_comment` INT NOT NULL , `bot_post` INT NOT NULL , `active` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


		
		/*id
		access_token
		name
		id_fb
		time_use
		time_start
		time_end
		post_mot_lan
		khoang_cach_lan
		max_post_ngay
		group_tt
		page_tt
		profile_tt
		list_tt
		age_start
		age_end
		gender
		ds_list
		cum_tu_ko_tt
		nguoi_ko_tt
		cam_xuc_su_dung
		ghi_chu
		server_luu_tru
		token_die
		cookie_die
		time_creat
		user_creat
		active


		*/

	}

}

/* End of file Data.php */
/* Location: ./application/controllers/Setup/Data.php */