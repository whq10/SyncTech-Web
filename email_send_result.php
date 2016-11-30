<?php
//include("koneksi.php");
include('session.php');
require("class.phpmailer.php");
require("class.smtp.php");



function smtp_mail( $sendto_email, $subject, $body, $extra_hdrs, $user_name){
	
$db_host = "localhost";
$db_user = "root";
$db_pass = "ywfwyfywxwyx_10";
$db_name = "contoh";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "smtp.sina.com";
	$mail->SMTPAuth = true;
	$mail->Username = "whq10";
	$mail->Password = "ywfwyfywxwyx_1o"; // SMTP password
	$mail->from = "whq10@sina.com";
	$mail->FromName="whq10";
	$mail->CharSet="GB2312";
	$mail->Encoding="base64";
	
	$mail->AddReplyTo("whq10@sina.com","whq10");
	$mail->IsHTML(false);
	$mail->Subject=$subject;
	$mail->Body=$body;
	$mail->AltBody = "text/html";
	
	
	$i = 0;
	$emails = $_SESSION["emails"];
for($i; $i < count($emails); $i++)
{
	$mail->AddAddress($emails[$i]);	
}


/*
		foreach($my_array as $value){
			$sql = mysqli_query($koneksi, "SELECT email FROM customer where id = $my_str ORDER BY id ASC");
			while($row = mysqli_fetch_assoc($sql)){
			$mail->AddAddress($row['email']);
			}
		}
	*/	
		
		if(!$mail->Send())
	{
		echo "there is error <p>";
		echo "error message:".$mail->ErrorInfo;
		exit;
		
	}
	else
	{
		echo "mail send success.<br/>";
	}
	
}




//session_start();
$i = 0;
$receipts = '';
$emails = $_SESSION["emails"];
for($i; $i < count($emails); $i++)
{
	//echo $emails[$i];
	if($receipts == '')
	{
		$receipts = $emails[$i];
	}
	else
	{
		$receipts = $receipts.','.$emails[$i];
	
	}
	
}
//echo $receipts;
smtp_mail($receipts,"welcome phppmailer",$_POST['body'],"sina.com","whq10");
session_destroy();
echo '<a href="http://localhost/synctech/index.php">Home</a>';
?>
