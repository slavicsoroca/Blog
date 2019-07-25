<?php

namespace application\lib;

class functions {

    public function connect() {
		$db = mysqli_connect('localhost', 'root', '', 'server'); 
		mysqli_set_charset($db, 'utf8'); 
		return $db; 
	}

	function view($html, $data = []) {
		extract($data); 
		include_once($html); 
	
	}
	
	function checkUserIsAuthorized() {
		$authorized = false; 
		if (isset($_COOKIE['u']) && isset($_COOKIE['t']) && isset($_COOKIE['s'])) {
			$token = $_COOKIE['t']; 
			$session = $_COOKIE['s'];
			$user_id = $_COOKIE['u']; 
			$db = connect(); 
			$query = "
				SELECT `connect_id`, UNIX_TIMESTAMP(`connect_token_time`) AS `time`
				FROM `connects`
				WHERE `connect_user_id` = $user_id
				AND `connect_token` = '$token'
				AND `connect_session` = '$session'; 
			"; 
			$result = mysqli_query($db, $query); 
			if (mysqli_num_rows($result)) {
				$connect_info = mysqli_fetch_assoc($result); 
				if (time() > $connect_info['time']) {
					$token = generateToken(); 
					$token_time = time() + 900;
					$connect_id = $connect_info['connect_id']; 					
					$query = "
						UPDATE `connects`
						SET `connect_token` = '$token',
							`connect_token_time` = FROM_UNIXTIME($token_time)
						WHERE `connect_id` = $connect_id;
					";
					mysqli_query($db, $query); 
					setcookie('t', $token); 
				}
				$authorized = true; 
			}
			//return true; 
		} 
		return $authorized; 
	}
	
	function generateToken($size = 32) {
		$symbols = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9]; 
		$length = count($symbols) - 1; 
		$token = ""; 
		for ($i = 0; $i < $size; $i++) {
			$token .= $symbols[rand(0, $length)]; 
		}
		return $token; 
	}
	
	}

?>