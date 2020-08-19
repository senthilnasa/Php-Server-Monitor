<?php

$ft=true;
require('../includes/init.php');
extract($_POST);
$data = null;

if(($_SESSION['islogin']) && (!$_SESSION['islogin'])){
    err('Login Required');
}

check('fun', 'Type Required');

switch ($fun) {

    // Dashboards
    case 'dashboard_data':
        $data=dashboard_data();
    break;

    case 'dashboard_chart_online':
        $data=dashboard_chart_online();
    break; 

    case 'dashboard_chart_offline':
        $data=dashboard_chart_offline();
    break;    

    //Server Managemnet
    case 'server_list':
        $data=server_list();
    break;   

    //Default
    default:
        waste();
}

// if ($data == null) {
//     err('No Details Found');
// }

complete($data);

function waste()
{
    n403();
    die();
}
