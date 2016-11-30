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
	<title>Add Customer</title>

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
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Customer</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Client</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="customer.php">Client</a></li>
					<li class="active"><a href="add_customer.php">New Customer</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Customer &raquo; New Customer</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$id		     = $_POST['id'];
				$name		 = $_POST['name'];
				$postcode	 = $_POST['postcode'];
				$birthday	 = $_POST['birthday'];
				$points		 = $_POST['points'];
				$tel		 = $_POST['tel'];
				$redeem		 = $_POST['redeem'];
				$status		 = $_POST['status'];
			

				$cek = mysqli_query($koneksi, "SELECT * FROM customer WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0)
				{
					 
					$insert = mysqli_query($koneksi, "INSERT INTO customer(id, name, postcode, birthday, points, tel, email, redeem, status)
															VALUES('$id','$name', '$postcode', '$birthday', '$points', '$tel', 'whq10@sina.com', '$redeem', '$status')") or die(mysqli_error());
				

					
					
					if($insert){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>New customer added successfully.</div>';
						}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Woops, new coustomer added failed !</div>';
					}
					
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Customer ID Exist..!</div>';
				}

			}
				
				
			
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Customer ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" class="form-control" placeholder="id" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" name="name" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Postcode</label>
					<div class="col-sm-4">
						<input type="text" name="postcode" class="form-control" placeholder="postcode" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Birthday</label>
					<div class="col-sm-4">
						<input type="text" name="birthday" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Points</label>
					<div class="col-sm-3">
						<textarea name="points" class="form-control" placeholder="points"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telephone</label>
					<div class="col-sm-3">
						<input type="text" name="tel" class="form-control" placeholder="tel" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Redeem</label>
					<div class="col-sm-2">
						<select name="redeem" class="form-control" required>
							<option value=""> ----- </option>
							<option value="TV">TV</option>
							<option value="IPhone">IPhone</option>
                            <option value="Watch">Watch</option>
							<option value="Car">Car</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value=""> ----- </option>
                            <option value="Active">Active</option>
							<option value="Suspend">Suspend</option>
							<option value="Expired">Expired</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Save">
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
