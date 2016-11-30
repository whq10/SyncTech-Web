<?php
$host = 'localhost';
$user = 'root';
$password = 'ywfwyfywxwyx_10';
$db = 'contoh';

$connection = mysqli_connect($host, $user, $password, $db);
$id = $_GET['id'];
if(!$connection)
{
	die('connection failed.');
}
else
{
	$query = 'select * from customer where id = '.$id;
	$resultset = mysqli_query($connection, $query);
	$records = array();
	while($r = mysqli_fetch_assoc($resultset))
	{
		$records = $r;
		echo json_encode($records);
	}
	
}
?>