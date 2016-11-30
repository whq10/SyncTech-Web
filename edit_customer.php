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
	<title>Edit Customer</title>

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
					<span class="sr-only">Customer Information</span>
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
			<h2>Customer Data &raquo; Edit Customer</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />
			
			<?php
			$id = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM customer WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: customer.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$id		     = $_POST['id'];
				$name		     = $_POST['name'];
				$postcode	 = $_POST['postcode'];
				$birthday	 = $_POST['birthday'];
				$redeem		     = $_POST['redeem'];
				$tel		 = $_POST['tel'];
				$points		 = $_POST['points'];
				$status			 = $_POST['status'];
				
				$update = mysqli_query($koneksi, "UPDATE customer SET name='$name', postcode='$postcode', birthday='$birthday', redeem='$redeem', tel='$tel', points='$points', status='$status' WHERE id='$id'") or die(mysqli_error());
				if($update){
					header("Location: edit_customer.php?id=".$id."&pesan=success");
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
					<label class="col-sm-3 control-label">Customer ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $row ['id']; ?>" class="form-control" placeholder="id" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" name="name" value="<?php echo $row ['name']; ?>" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Postcode</label>
					<div class="col-sm-4">
						<input type="text" name="postcode" value="<?php echo $row ['postcode']; ?>" class="form-control" placeholder="postcode" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Birthday</label>
					<div class="col-sm-4">
						<input type="text" name="birthday" value="<?php echo $row ['birthday']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Points</label>
					<div class="col-sm-3">
						<textarea name="points" class="form-control" placeholder="points"><?php echo $row ['points']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telephone</label>
					<div class="col-sm-3">
						<input type="text" name="tel" value="<?php echo $row ['tel']; ?>" class="form-control" placeholder="telephone" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeem</label>
					<div class="col-sm-2">
						<select name="redeem" class="form-control" required>
							<option value=""> - Redeemble Items - </option>
							<option value="tv">TV</option>
							<option value="iphone">IPhone</option>
                            <option value="watch">Watch</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Redeem :</b> <span class="label label-success"><?php echo $row['redeem']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value="">- Membership Status -</option>
                            <option value="Active">Active</option>
							<option value="Suspend">Suspend</option>
							<option value="Expired">Expired</option>
						</select> 
					</div>
                    <div class="col-sm-3">
                    <b>Status :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
				    </div>
                </div>
				<!--<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php //echo $row['username']; ?>" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" value="<?php //echo $row['password']; ?>" class="form-control" placeholder="Password">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Save">
						<a href="customer.php" class="btn btn-sm btn-danger">Close</a>
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