<?php

require_once __DIR__ . '/response.php';

function db(): \mysqli
{
    try {
        $db = mysqli_connect('localhost', 'root', '', 'event_admin');
        return $db;
    } catch (\Throwable $th) {
        err('Connection error');
    } catch (\Error $e) {
        err($e->getMessage());
    } catch (\Exception $e) {
        err($e->getMessage());
    }
}

function theDateTime(bool $dateOnly = false): String
{
    if ($dateOnly) {
        return date("Y-m-d");
    }
    return date("Y-m-d H:i:s");
}

function getUserIP()
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
