<?php
header('X-Frame-Options: SAMEORIGIN');
extract($_POST);



$res = array();

function err($err, $display = true)
{
	$res['ok'] = false;
	$res['err'] = $err;
	if ($display) {
	header('Content-type: application/json');
	echo json_encode($res);
	} else {
		require 'nono.html';
	}
	die();
}

//403 page
function n403()
{
	http_response_code(403);
	require 'nono.html';
}

//Db Connection
require '../../config.php';

//Db Connection
function db()
{

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbName = "server";

    $db = mysqli_connect($server, $username, $password, $dbName) or die("Connection Failed");
    return $db;
}

//Session Start
if (!isset($_SESSION)) {
	session_name('senthilnasa');
	session_start();
}

// Validate Request
if ($_SERVER['REQUEST_METHOD'] <> 'POST') {	
	err('Invalid Header', false);
}

//Set time Zone
date_default_timezone_set("Asia/Kolkata");


//Require  Function
if($ft==true){
	require 'function.php';
}
else{
	require 'login_function.php';

}

//Check Test Input
function test_input($db, $data, $html = true)
{
	$data = trim($data);
	$data = stripslashes($data);
	if ($html) {
		$data = htmlspecialchars($data);
	}
	$data = mysqli_real_escape_string($db, $data);
	return $data;
}

// Check the valid Input
function check($query, $err, $emt = false, $html = true)
{
	$db = db();
	if (!isset($_POST[$query])) {
		err($err, false);
	}
	if (!$emt && empty($_POST[$query])) {
		err($err . ' (Empty field !)', false);
	}
	$_POST[$query] = test_input($db, $_POST[$query], $html);
	$db->close();
}

$cTime = date("Y-m-d H:i:s");

//End Result
function complete($data = [])
{
	header('Content-type: application/json');
	$res['ok'] = true;
	$res['data'] = $data;
	echo json_encode($res);
	die();
}



function get_client_ip()
{
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];

	if (filter_var($client, FILTER_VALIDATE_IP)) {
		$ip = $client;
	} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
		$ip = $forward;
	} else {
		$ip = $remote;
	}

	return $ip;
}


	function timeAgo($time_ago)
	{
		// $time_ago = strtotime($time_ago);
		$cur_time   = time();
		$time_elapsed   = $cur_time - $time_ago;
		$seconds    = $time_elapsed ;
		$minutes    = round($time_elapsed / 60 );
		$hours      = round($time_elapsed / 3600);
		$days       = round($time_elapsed / 86400 );
		$weeks      = round($time_elapsed / 604800);
		$months     = round($time_elapsed / 2600640 );
		$years      = round($time_elapsed / 31207680 );
		// Seconds
		if($seconds <= 60){
			return "just now";
		}
		//Minutes
		else if($minutes <=60){
			if($minutes==1){
				return "one minute ago";
			}
			else{
				return "$minutes minutes ago";
			}
		}
		//Hours
		else if($hours <=24){
			if($hours==1){
				return "an hour ago";
			}else{
				return "$hours hrs ago";
			}
		}
		//Days
		else if($days <= 7){
			if($days==1){
				return "yesterday";
			}else{
				return "$days days ago";
			}
		}
		//Weeks
		else if($weeks <= 4.3){
			if($weeks==1){
				return "a week ago";
			}else{
				return "$weeks weeks ago";
			}
		}
		//Months
		else if($months <=12){
			if($months==1){
				return "a month ago";
			}else{
				return "$months months ago";
			}
		}
		//Years
		else{
			if($years==1){
				return "one year ago";
			}else{
				return "$years years ago";
			}
		}
	}
