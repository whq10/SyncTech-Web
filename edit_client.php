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
	<title>Edit Client</title>

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
					<span class="sr-only">Client Information</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="http://www.hakkoblogs.com">Client Data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="http://www.hakkoblogs.com">Client Data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="client.php">Client</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Client Data &raquo; Edit Client</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />
			
			<?php
			$storeNum = $_GET['StoreNum'];
			$sql = mysqli_query($koneksi, "SELECT * FROM client WHERE StoreNum='$storeNum'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: client.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$storeNum		     = $_POST['StoreNum'];
				$branchName		     = $_POST['BranchName'];
				$province		     = $_POST['Province'];
				$city		     = $_POST['City'];
				$address		     = $_POST['Address'];
				$postcode	 = $_POST['Postcode'];
				$telephone		 = $_POST['Telephone'];
				$membershipStartDate		 = $_POST['MembershipStartDate'];
				$membershipEndDate			 = $_POST['MembershipEndDate'];
				
				$update = mysqli_query($koneksi, "UPDATE client SET BranchName='$branchName', Province='$province', City='$city', Address='$address', Postcode='$postcode', Telephone='$telephone', MembershipStartDate='$membershipStartDate', MembershipEndDate='$membershipEndDate' WHERE StoreNum='$storeNum'") or die(mysqli_error());
				if($update){
					header("Location: edit_client.php?storeNum=".$storeNum."&pesan=success");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'success'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Client data updated.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Store Number</label>
					<div class="col-sm-2">
						<input type="text" name="StoreNum" value="<?php echo $row ['StoreNum']; ?>" class="form-control" placeholder="Store Num" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Branch Name</label>
					<div class="col-sm-4">
						<input type="text" name="BranchName" value="<?php echo $row ['BranchName']; ?>" class="form-control" placeholder="Branch Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Province</label>
					<div class="col-sm-4">
						<input type="text" name="Province" value="<?php echo $row ['Province']; ?>" class="form-control" placeholder="Province" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">City</label>
					<div class="col-sm-4">
						<input type="text" name="City" value="<?php echo $row ['City']; ?>" class="form-control" placeholder="City" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-4">
						<input type="text" name="Address" value="<?php echo $row ['Address']; ?>" class="form-control" placeholder="Address" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Postcode</label>
					<div class="col-sm-4">
						<input type="text" name="Postcode" value="<?php echo $row ['Postcode']; ?>" class="form-control" placeholder="Postcode" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telephone</label>
					<div class="col-sm-3">
						<input type="text" name="Telephone" value="<?php echo $row ['Telephone']; ?>" class="form-control" placeholder="Telephone" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Membership Start Date</label>
					<div class="col-sm-4">
						<input type="text" name="MembershipStartDate" value="<?php echo $row ['MembershipStartDate']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Membership End Date</label>
					<div class="col-sm-4">
						<input type="text" name="MembershipEndDate" value="<?php echo $row ['MembershipEndDate']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Save">
						<a href="client.php" class="btn btn-sm btn-danger">Close</a>
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