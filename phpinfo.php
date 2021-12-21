<?php
//**********CHECK CONNECT TO SQL SERVER **********/
// $serverName = "localhost";
// $connectionInfo = array( "Database"=>"testdb", "UID"=>"sa", "PWD"=>"Giale1308");
// $conn = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conn ) {
//      echo "Connection established.<br />";
// }else{
//      echo "Connection could not be established.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }

//**********CHECK CONNECT TO ORACLE **********/
$conn = oci_connect("mc_haugiang", "Giale1308", "localhost/DBSTNMT3110");
if (!$conn) {
     $m = oci_error();
     echo $m['message'], "\n";
     exit;
}
else {
     print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);

//**********CHECK CONNECT TO MYSQL **********/
// $conn = mysqli_connect("localhost", "root", "");
// if( $conn ) {
//      echo "Connection established.<br />";
// }else{
//      echo "Connection could not be established.<br />";
// }

phpinfo();
