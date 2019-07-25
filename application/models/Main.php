<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	public function contactValidate($post) {
		$nameLen = iconv_strlen($post['name']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		return true;
	}

	public function commentValidate($post) {
		$nameLen = iconv_strlen($post['name']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		return true;
	}

	public function postsCount() {
		return $this->db->column('SELECT COUNT(id) FROM posts');
	}

	public function postsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM posts ORDER BY id DESC LIMIT :start, :max', $params);
	}

    public function contactAdd($post) {
	$params = [
			'id' => '',
			'name' => $post['name'],
			'email' => $post['email'],
			'text' => $post['text'],
		];
		
		$this->db->query("INSERT INTO `contacts` (`contact_name`, `contact_email`, `contact_text`) VALUES ('$params[name]', '$params[email]', '$params[text]')");

		return $this->db->lastInsertId();
	}

	public function contactsCount() {
		return $this->db->column('SELECT COUNT(id) FROM contacts');
	}

	public function contactsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM contacts ORDER BY contact_id DESC LIMIT :start, :max', $params);
	}

	public function commentAdd($post) {
	$params = [
			'comment_id' => '',
			'name' => $post['name'],
			'text' => $post['text'],
			'post_id' => $post['post_id']
		];
		
		$this->db->query("INSERT INTO `comments` (`comment_name`, `comment_text`, `comment_post_id`) VALUES ('$params[name]', '$params[text]', '$params[post_id]')");
		// echo "INSERT INTO `comments` (`comment_name`, `comment_text`, `comment_post_id`) VALUES ('$params[name]', '$params[text]', '$id')";

		return $this->db->lastInsertId();
	}

public function CommentList($post_id) {
		// echo $post_id;
	
		return $this->db->row("SELECT * FROM comments  WHERE comment_post_id = $post_id ORDER BY comment_id DESC;");
	}

}