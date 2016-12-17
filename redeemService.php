<?php
$host = 'localhost';
$user = 'root';
$password = 'ywfwyfywxwyx_10';
$db = 'contoh';

$connection = mysqli_connect($host, $user, $password, $db);
$redeemId = $_GET['RedeemId'];
if(!$connection)
{
	die('connection failed.');
}
else
{
	$query = 'select * from redeem where redeemid = '.$redeemId;
	$resultset = mysqli_query($connection, $query);
	$records = array();
	while($r = mysqli_fetch_assoc($resultset))
	{
		$records = $r;
		echo json_encode($records);
	}
	
}
?>