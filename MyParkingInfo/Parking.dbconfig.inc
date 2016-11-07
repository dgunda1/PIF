<?php
/*
** Database Config File for PHP scripts
**
*/

if (session_id() == "") {
	session_start();
}
//Database Parameters

$hostname='sql9.freemysqlhosting.net';
$username='sql9143494';
$password='N4CcQf716t';
$dbname='sql9143494';
$mysqli = new mysqli($hostname,$username, $password,$dbname);

?>
