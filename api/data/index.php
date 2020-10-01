<?php

$ft=true;
require('../includes/init.php');
extract($_POST);
$data = null;

// echo json_encode($_REQUEST);
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

        case 'dashboard_live':
            extract($_POST);
            if($typ==0){

                $data=servers_dash_list(0);
            }
            else if($typ==1){
                $data=servers_dash_list(1);
            }
            else{
                err("Invalid request");
                die();
            }
        break;


    //User Manager List
        //User list
        case 'users_list':
            $data=users_list();
        break; 
        //User update
        case 'user_update':
            check('user_id', 'user_id Required');
            check('mail', 'mail Required');
            check('name', 'name Required');
            check('tid', 'tid Required');
            extract($_POST);
            $data=user_update($user_id,$mail,$name,$tid);
        break;  
         //Delete User
        case 'user_delete':
            check('user_id', 'user_id Required');
            extract($_POST);
            $data=user_delete($user_id);
        break; 


        // user_add
        case 'user_add':
            check('mail', 'mail Required');
            check('name', 'name Required');
            check('uname', 'name Required');
            check('tid', 'tid Required');
            extract($_POST);
            $data=user_add($uname,$mail,$name,$tid);
        break; 
        

    //Server Managemnet
        case 'server_list':
            $data=server_list();
        break;   
       
    //login_log
    case 'login_log':
        $data=login_log();
    break; 

    //notification_log
    case 'notification_log':
        $data=notification_log();
    break; 
    // server_details
    case 'server_details':
        check('sid', 'sid Required');
        extract($_POST);
        $data=server_details($sid);
    break; 
        // SErver Offile

    case 'server_off':
        check('sid', 'sid Required');
        extract($_POST);
        $data=server_offline($sid);
    break; 
        //Server Onnline
    case 'server_on':
        check('sid', 'sid Required');
        extract($_POST);
        $data=server_online($sid); 
     break; 
    //  latency
    case 'server_latency':
        check('sid', 'sid Required');
        extract($_POST);
        $data=server_latency($sid); 
     break; 
    //  server_report
    case 'server_report':
        check('sid', 'sid Required');
        extract($_POST);
        $data=server_report($sid); 
     break; 

    // Server Addd
    case 'server_add':
        check('server_name', 'server_name Required');
        check('url', 'url Required');
        check('type', 'type Required');
        check('telegram', 'telegram Required',true);
        check('state', 'state Required',true);
        check('email', 'state Required',true);
        extract($_POST);
        $data=server_add($server_name,$url,$type,$telegram,$state,$email); 
     break; 

     case 'server_edit':
        check('server_name', 'server_name Required');
        check('sid', 'sid Required');
        check('url', 'url Required');
        check('type', 'type Required');
        check('telegram', 'telegram Required',true);
        check('state', 'state Required',true);
        check('email', 'state Required',true);
        extract($_POST);
        $data=server_update($sid,$server_name,$url,$type,$telegram,$state,$email); 
     break; 
     case 'server_delete':
        check('sid', 'sid Required');
        extract($_POST);
        $data=server_delete($sid); 
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
