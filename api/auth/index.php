<?php

$ft=false;
require('../includes/init.php');
extract($_POST);
$info = null;
$db = db();
check('fun','Type Required');
switch($fun) {
    case 'verify_login':
    check('login','rollNo Required !');
    check('pass','phone Required !');
    $info = verify_login($db,$login,$pass);
    break;
   
    default:
    n403();
    mysqli_close($db);
    die();
}

if ($info == null) {
    err('Invalid');
}

complete($info);