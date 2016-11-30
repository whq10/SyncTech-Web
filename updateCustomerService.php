<?php
$host = 'localhost';
$user = 'root';
$password = 'ywfwyfywxwyx_10';
$db = 'contoh';

$connection = mysqli_connect($host, $user, $password, $db);
$customer_id = $_GET['customer_id'];
$postcode = $_GET['postcode'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$points = $_GET['points'];
$name = 'Ignored';//$_GET['name'];
$birthday = $_GET['birthday'];
if(!$connection)
{
	die('connection failed.');
}
else
{
	

	$query = "update customer set name = 'Ignored', postcode = '".$postcode."', birthday = '".$birthday."', points = '".$points."', tel = '".$telephone."', email = '".$email."' where id ='".$customer_id."'";

	
	//$query = "insert into customer (id, name, postcode, birthday, points, tel, redeem, email, status) //VALUES(1,'ttt','bbb','ccc','ddd','eee','fff','ggg','hhh')";
	
	$resultset = mysqli_query($connection, $query);
	if($resultset)
	{
		echo 'success';
		
	}
	else 
	{
		echo mysqli_error($connection);
		echo 'fail';
	}
	//$records = array();
	/*
	while($r = mysqli_fetch_assoc($resultset))
	{
		$records = $r;
		echo json_encode($records);
	}
	*/
}
?>