<?php
error_reporting(0);
@ini_set('display_errors', 0);

if($_POST['fun']=='verify_login'){

    $servername = $_POST['d1'];
    $username = $_POST['d2'];
    $password = $_POST['d3'];
    $db = $_POST['d4'];
    $res=array();
    $conn = new mysqli($servername, $username, $password,$db);
    $res['data'] = "<?php
    define ( 'DB_HOST', '".$servername."' ); //Provide the IP/Host where Mysql server is found
    define ( 'DB_USER', '".$username."' );//Provide the UserId of Mysql server 
    define ( 'DB_PASSWORD', '".$password."' );//Provide the Password of Mysql server
    define ( 'DB_NAME', '".$db."' );//Provide the DB Name of Mysql server
    ?>";
    $res['ok'] = true;
    if ($conn->connect_error) {
      $res['ok'] = false;
    }
    header('Content-type: application/json');
    echo json_encode($res);
    die();
}
else{
  require'../includes/nono.html';
}