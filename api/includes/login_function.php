<?php

function verify_login($db,$login,$pass)
{
	
		$stmt = $db->prepare("SELECT name,password,user_id FROM user_master WHERE user_name=?");
		$stmt->bind_param('s', $login);
		$stmt->execute();
		$res = $stmt->get_result();
		$stmt->close();
		if (mysqli_num_rows($res)) {
			$row = mysqli_fetch_assoc($res);
			if(password_verify($pass,$row['password'])){

				$_SESSION['name']=$row ['name'];
				$_SESSION['user_id']=$row ['user_id'];
				$_SESSION['islogin']=true;
				log_user($db,$login,'1');
				return true;
			}
			else{
				log_user($db,$login,'0');
				return 'false';
			}
		} else {
			return 'false';
		}
	
}

function log_user($db,$id,$state){
	$ip=get_client_ip();
	$stmt = $db->prepare("INSERT INTO user_login_log(user_id,state,ip) VALUES((SELECT `user_id` FROM user_master WHERE user_name=?),?,?)");
	$stmt->bind_param('sss', $id,$state,$ip);
	$stmt->execute();
	$stmt->close();
	return true;
}