<?php
if (!isset($_SESSION)) {
	session_name('bestbuddy');
	session_start();
}
// echo json_encode($_SESSION);
// echo $_SERVER['SERVER_NAME'];
