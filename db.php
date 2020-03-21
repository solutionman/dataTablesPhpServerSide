<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "12lom97"; /* Password */
$dbname = "datatablestest"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

