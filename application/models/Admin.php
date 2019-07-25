<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Admin extends Model {

	public $error;

	public function loginValidate($post) {

		/*
			$params = [
			
			'login' => $post['login'],
			'password' => $post['password'],
			 
		];
		
		$this->db->query("
					SELECT *
					FROM `users`
					WHERE `user_login` = '$params[login]'
					AND `user_password` = '$params[password]' 
		");
		
		if (mysqli_num_rows() == 1) {
			$user_info = mysqli_fetch_assoc($result); 
			$user_id = $user_info['user_id']; 
			setcookie('u', $user_id);
			$token = generateToken(); 
			$token_time = time() + 900; 
			$session = $_COOKIE['PHPSESSID']; 
			$query = "
				INSERT INTO `connects`(`connect_token`, `connect_session`, `connect_token_time`, `connect_user_id`)
				VALUE ('$token', '$session', FROM_UNIXTIME($token_time), $user_id); 
			"; 
			mysqli_query($db, $query); 
			setcookie('s', $session);
			setcookie('t', $token);
		} else {
			echo '<p> Пользователя с такой связкой логин / пароль не существует! </p>'; 
		}
	*/
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function postValidate($post, $type) {
		$nameLen = iconv_strlen($post['title']);
		$descriptionLen = iconv_strlen($post['categories']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 100) {
			$this->error = 'Описание должно содержать от 3 до 100 символов';
			return false;
		} elseif ($textLen < 10 or $textLen > 5000) {
			$this->error = 'Текст должнен содержать от 10 до 5000 символов';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function postAdd($post) {
		$params = [
			'id' => '',
			'title' => $post['title'],
			'categori' => $post['categories'],
			'text' => $post['text'],
		];
		
		$this->db->query("INSERT INTO `posts` (`post_title`, `post_categori`, `post_text`) VALUES ('$params[title]', '$params[categori]', '$params[text]')");

		return $this->db->lastInsertId();
	}

	public function postEdit($post, $id) {
		$params = [
			'id' => $id,
			'title' => $post['title'],
			'categori' => $post['categories'],
			'text' => $post['text'],
		];
		$this->db->query("UPDATE `posts` SET `post_title`='$params[title]', `post_categori`='$params[categori]', `post_text` ='$params[text]' WHERE id = '$id'");
	}

	public function postUploadImage($path, $id) {
	
		move_uploaded_file($path, 'public/materials/'.$id.'.jpg');
	}

	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
	}

	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM posts WHERE id = :id', $params);
		unlink('public/materials/'.$id.'.jpg');
	}

	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}

	public function contactDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM contacts WHERE contact_id = :id', $params);
		
	}

}