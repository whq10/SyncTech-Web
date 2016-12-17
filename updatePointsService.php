<?php
$host = 'localhost';
$user = 'root';
$password = 'ywfwyfywxwyx_10';
$db = 'contoh';

$connection = mysqli_connect($host, $user, $password, $db);
$customer_id = $_GET['customer_id'];
$points = $_GET['points'];

$redeem_ids = "";

if(!$connection)
{
	die('connection failed.');
}
else
{
	$query_update_redeem = "select RedeemId from redeem where RedeemPoints <= ".$points;
	$resultset_update_redeem = mysqli_query($connection, $query_update_redeem);
	if($resultset_update_redeem)
	{
		$count = 0;
		while($row = mysqli_fetch_assoc($resultset_update_redeem))
		{
			$count = $count + 1;
			if($count != 1)
			{
				$redeem_ids = $redeem_ids."_".$row['RedeemId'];
				
			}
			else
			{
				$redeem_ids = $row['RedeemId'];				
			}
			
		}	
		
		echo $redeem_ids;
	}
	else 
	{
		echo mysqli_error($connection);
		echo 'fail';
	}
	
	
	

	$query = "update customer set points = '".$points."' ,redeem = '".$redeem_ids."' where id ='".$customer_id."'";
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