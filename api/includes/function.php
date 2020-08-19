<?php
function dashboard_data()
{
	$db = db();
	$stmt = $db->prepare("
	SELECT(SELECT COUNT(*) FROM server_master)AS d1,
	(SELECT COUNT(*) FROM (SELECT MAX(created_at) FROM server_ping_log WHERE state=1 GROUP BY server_id)AS dat)AS d2,
	(SELECT d1-d2)AS d3,
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
	$stmt = $db->prepare("SELECT  ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x ,COUNT(*)AS y,FLOOR(UNIX_TIMESTAMP(created_at)/(15 * 60)) AS timekey FROM server_ping_log WHERE state=1 GROUP BY timekey");
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
	$stmt = $db->prepare("SELECT  ROUND(UNIX_TIMESTAMP(created_at) * 1000)AS x ,COUNT(*)AS y,FLOOR(UNIX_TIMESTAMP(created_at)/(15 * 60)) AS timekey FROM server_ping_log WHERE state=0 GROUP BY timekey");
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
	$stmt = $db->prepare("SELECT  `url`,`server_id`,`server_name`,`type`,`last_offline`,`last_online`,`state`,`active`,`latency` FROM server_master");
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