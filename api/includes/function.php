<?php
function dashboard_data()
{
	$db = db();
	$stmt = $db->prepare("
	SELECT(SELECT COUNT(*) FROM server_master WHERE state=1)AS d1,
	(SELECT  COUNT(*) FROM server_master WHERE live=1 AND state=1)AS d2,
	(SELECT  COUNT(*) FROM server_master WHERE live=0 AND state=1)AS d3,
	(SELECT created_at FROM server_ping_log ORDER BY created_at DESC LIMIT 1)AS d4
	");
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$row = mysqli_fetch_assoc($res);
	$row['d4']=timeAgo(strtotime($row['d4']));
	$row['d3']=floatval($row['d3']);
	$row['d3']=intval($row['d3']);
	return $row;
}


function dashboard_chart_online()
{
	$db = db();
	$stmt = $db->prepare("SELECT  ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x ,COUNT(DISTINCT  server_id)AS y,FLOOR(UNIX_TIMESTAMP(created_at)/(15 * 60)) AS timekey FROM server_ping_log WHERE state=1 GROUP BY timekey");
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		unset($row['timekey']);
		$ress[]=$row;
	}
	return $ress;
}

function dashboard_chart_offline()
{
	$db = db();
	$stmt = $db->prepare("SELECT  ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x ,COUNT(DISTINCT  server_id)AS y,FLOOR(UNIX_TIMESTAMP(created_at)/(15 * 60)) AS timekey FROM server_ping_log WHERE state=0 GROUP BY timekey");
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		unset($row['timekey']);
		$ress[]=$row;
	}
	return $ress;
}

function servers_dash_list($a){
	$db = db();
	$stmt = $db->prepare("SELECT server_name,server_id ,ROUND(UNIX_TIMESTAMP(updated_at) * 1000)AS tim  FROM server_master WHERE live=? AND state=1");
	$stmt->bind_param('i', $a);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		unset($row['timekey']);
		$ress[]=$row;
	}
	return $ress;
}

function server_list()
{
	$db = db();
	$stmt = $db->prepare("SELECT  `url`,`server_id`,`server_name`,`type`,`last_offline`,`last_online`,`state`,`latency` FROM server_master");
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		unset($row['timekey']);
		$ress[]=$row;
	}
	return $ress;
}

function users_list()
{
	$db = db();
	$stmt = $db->prepare("SELECT user_id,user_name,name,telegram_id,email,role,created_at FROM user_master");
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		$ress[]=$row;
	}
	return $ress;
}

function user_update($user_id,$mail,$name,$tid)
{
	$db = db();
	$stmt = $db->prepare("UPDATE user_master SET name=?, telegram_id=?,email=? WHERE user_id=?");
	$stmt->bind_param('ssss', $name,$tid,$mail,$user_id);
	$stmt->execute();
	$db->close();
	$stmt->close();
	return true;
}
function user_delete($user_id)
{
	$db = db();
	$stmt = $db->prepare("DELETE FROM  user_master WHERE user_id=? and role=1");
	$stmt->bind_param('s',$user_id);
	$stmt->execute();
	$db->close();
	$stmt->close();
	return true;
}
function user_add($uname,$mail,$name,$tid)
{
	$db = db();
	$stmt = $db->prepare("insert into user_master(user_name,`name`,`email`,`telegram_id`) value(?,?,?,?)");
	$stmt->bind_param('ssss', $uname,$name,$mail,$tid);
	$stmt->execute();
	$db->close();
	if($stmt->affected_rows){
		$stmt->close();
		return true;
	}
	$stmt->close();
	return false;
}

function login_log()
{
	$db = db();
	$stmt = $db->prepare("SELECT ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x,`state`,ip FROM `user_login_log` WHERE user_id=? order by created_at desc ");
	$stmt->bind_param('s',$_SESSION['user_id']);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		$ress[]=$row;
	}
	return $ress;
}

function notification_log()
{
	$db = db();
	$stmt = $db->prepare("SELECT m.*,ROUND(UNIX_TIMESTAMP(m.created_at) * 1000)AS x,s.`server_name` FROM notification_log m INNER JOIN server_master s ON s.server_id=m.server_id");
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		$ress[]=$row;
	}
	return $ress;
}


function server_details($sid)
{
	$db = db();
	$stmt = $db->prepare("SELECT * FROM server_master WHERE server_id=?");
	$stmt->bind_param('s',$sid);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	return mysqli_fetch_assoc($res);
}


function server_offline($sid)
{
	$db = db();
	$stmt = $db->prepare("SELECT  ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x ,latency AS y,FLOOR(UNIX_TIMESTAMP(created_at)/(15 * 60)) AS timekey FROM server_ping_log WHERE state=0 and server_id=? GROUP BY timekey");
	$stmt->bind_param('s',$sid);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		unset($row['timekey']);
		$ress[]=$row;
	}
	return $ress; 
}

function server_online($sid)
{
	$db = db();
	$stmt = $db->prepare("SELECT  ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x ,latency AS y,FLOOR(UNIX_TIMESTAMP(created_at)/(15 * 60)) AS timekey FROM server_ping_log WHERE state=1 and server_id=? GROUP BY timekey");
	$stmt->bind_param('s',$sid);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress=array();
	while($row = mysqli_fetch_assoc($res)){
		unset($row['timekey']);
		$ress[]=$row;
	}
	return $ress;
}



function server_latency($sid)
{
	$db = db();
	$stmt = $db->prepare("SELECT MIN(latency)AS x,MAX(latency)AS y, AVG(latency)AS z,DATE(`created_at`)AS d FROM `server_ping_log` WHERE server_id=? GROUP BY DATE(created_at)");
	$stmt->bind_param('s',$sid);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	$ress1=array();
	$ress2=array();
	$ress3=array();
	$ress=array();
	$a=0;
	while($row = mysqli_fetch_assoc($res)){
		$ress1[$a]['x']=$row['d'];
		$ress1[$a]['y']=$row['x'];
		$ress2[$a]['x']=$row['d'];
		$ress2[$a]['y']=$row['y'];
		$ress3[$a]['x']=$row['d'];
		$ress3[$a]['y']=$row['z'];
		$a++;
	}
	$ress['x']=$ress1;
	$ress['y']=$ress2;
	$ress['z']=$ress3;
	return $ress;
}

function server_report($sid)
{
	$db = db();
	$stmt = $db->prepare("SELECT(
	SELECT COUNT(*)/(SELECT COUNT(*) FROM `server_ping_log` WHERE `server_id`=?)*100 FROM `server_ping_log` WHERE `server_id`=? AND state=1) AS x,
	(SELECT COUNT(*)/(SELECT COUNT(*) FROM `server_ping_log` WHERE `server_id`=?)*100 FROM `server_ping_log` WHERE `server_id`=? AND state=0)AS y
	");
	$stmt->bind_param('ssss',$sid,$sid,$sid,$sid);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	$db->close();
	return mysqli_fetch_assoc($res);
}


function server_add($server_name,$url,$type,$telegram,$state,$email){


	$db = db();
	$stmt = $db->prepare("INSERT INTO server_master(server_name,url,type,telegram,state,email) VALUES(?,?,?,?,?,?)");
	$stmt->bind_param('ssssss', $server_name,$url,$type,$telegram,$state,$email);
	$stmt->execute();
	$db->close();
	if($stmt->affected_rows){
		$stmt->close();
		return true;
	}
	$stmt->close();
	return false;

}


function server_update($sid,$server_name,$url,$type,$telegram,$state,$email){
	$db = db();
	$stmt = $db->prepare("UPDATE `server_master` SET server_name=?,url=?,type=?,telegram=?,state=?,email=? WHERE `server_id`=?");
	$stmt->bind_param('sssssss', $server_name,$url,$type,$telegram,$state,$email,$sid);
	$stmt->execute();
	$db->close();
	$stmt->close();
	return true;
}


function server_delete($sid){
	$db = db();
	$stmt = $db->prepare("DELETE FROM server_ping_log WHERE server_id=?");
	$stmt->bind_param('s',  $sid);
	$stmt->execute();
	$stmt = $db->prepare("DELETE FROM server_master WHERE server_id=?");
	$stmt->bind_param('s',  $sid);
	$stmt->execute();
	$db->close();
	$stmt->close();
	return true;
}