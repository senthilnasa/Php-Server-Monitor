# Php-Server-Monitor
To Monitor the Sites


<?php
$myfile = fopen("config.php", "w") or die("Unable to open file!");
$txt = "<?php
define ( 'DB_HOST', 'localhost' ); //Provide the IP/Host where Mysql server is found
define ( 'DB_USER', 'root' );//Provide the UserId of Mysql server 
define ( 'DB_PASSWORD', '' );//Provide the Password of Mysql server
define ( 'DB_NAME', 'server' );//Provide the DB Name of Mysql server
?>";
fwrite($myfile, $txt);
fclose($myfile);
?>
