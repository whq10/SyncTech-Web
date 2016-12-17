<?php
include("koneksi.php");
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
Project      : Data Karyawan CRUD MySQLi (Create, read, Update, Delete) PHP, MySQLi dan Bootstrap
Author		 : Hakko Bio Richard, A.Md
Website		 : http://www.niqoweb.com
Blog         : http://www.acchoblues.blogspot.com
Email	 	 : hakkobiorichard[at]gmail.com
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Redeemable Item</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Redeemable Item Details</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="http://www.hakkoblogs.com">Customer Data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="http://www.hakkoblogs.com">Customer Data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="customer.php">Customer</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Redeemable Item Data &raquo; Edit Redeemable Item</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />
			
			<?php
			$id = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM redeem WHERE RedeemId='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: redeem.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$id		     = $_POST['id'];
				$redeem_name		     = $_POST['redeem_name'];
				$redeem_cost	 = $_POST['redeem_cost'];
				$redeem_points	 = $_POST['redeem_points'];
				$redeem_image		 = $_POST['redeem_image'];

				
				$update = mysqli_query($koneksi, "UPDATE redeem SET RedeemName='$redeem_name', RedeemCost='$redeem_cost', RedeemPoints='$redeem_points', RedeemImage='$redeem_image' WHERE RedeemId='$id'") or die(mysqli_error());
				if($update){
					header("Location: edit_redeem.php?id=".$id."&pesan=success");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'success'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Customer data updated.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeemabel Item ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $row ['RedeemId']; ?>" class="form-control" placeholder="id" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeemabel Item Name</label>
					<div class="col-sm-4">
						<input type="text" name="redeem_name" value="<?php echo $row ['RedeemName']; ?>" class="form-control" placeholder="Name" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeemabel Item Cost</label>
					<div class="col-sm-4">
						<input type="text" name="redeem_cost" value="<?php echo $row ['RedeemCost']; ?>" class="form-control" placeholder="cost" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeemabel Item Points</label>
					<div class="col-sm-4">
						<input type="text" name="redeem_points" value="<?php echo $row ['RedeemPoints']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0" required>
					</div>
				</div>
				<!--
				<div class="form-group">
					<label class="col-sm-3 control-label">Points</label>
					<div class="col-sm-3">
						<textarea name="points" class="form-control" placeholder="points"><?php echo $row ['points']; ?></textarea>
					</div>
				</div>
				-->
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeemabel Item Image</label>
					<div class="col-sm-3">
						<input type="text" name="redeem_image" value="<?php echo $row ['RedeemImage']; ?>" class="form-control" placeholder="image" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Save">
						<a href="redeem.php" class="btn btn-sm btn-danger">Close</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>