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
	<title>Add Client</title>

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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Client</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Client</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="client.php">Client</a></li>
					<li class="active"><a href="add_client.php">New Client</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Client &raquo; New Client</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$storenum		            = $_POST['storenum'];
				$branchname		            = $_POST['branchname'];
				$province	                = $_POST['province'];
				$city	                    = $_POST['city'];
				$address		            = $_POST['address'];
				$postcode		            = $_POST['postcode'];
				$telephone		            = $_POST['telephone'];
				$membershipstartdate	    = $_POST['membershipstartdate'];
			    $membershipenddate		    = $_POST['membershipenddate'];

				$cek = mysqli_query($koneksi, "SELECT * FROM client WHERE storenum='$storenum'");
				if(mysqli_num_rows($cek) == 0)
				{
					$insert = mysqli_query($koneksi, "INSERT INTO client(storenum, branchname, province, city, address, postcode,
					                                                       telephone, membershipstartdate,membershipenddate)
										  VALUES('$storenum','$branchname', '$province', '$city', '$address', '$postcode', '$telephone', 
										          '$membershipstartdate', '$membershipenddate')") or die(mysqli_error($koneksi));
					if($insert){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>New client added successfully.</div>';
						}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Woops, new client added failed !</div>';
					}
					
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Store Num Exist..!</div>';
				}

			}
				
				
			
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Store Num</label>
					<div class="col-sm-4">
						<input type="text" name="storenum" class="form-control" placeholder="storenum" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Branch Name</label>
					<div class="col-sm-4">
						<input type="text" name="branchname" class="form-control" placeholder="branchname" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Province</label>
					<div class="col-sm-2">
						<select name="province" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Manitoba">Manitoba</option>
							<option value="Albert">Albert</option>							
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">City</label>
					<div class="col-sm-2">
						<select name="city" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Winnipeg">Winnipeg</option>
							<option value="Calgary">Calgary</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-3">
						<textarea name="address" class="form-control" placeholder="address"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Postcode</label>
					<div class="col-sm-3">
						<input type="text" name="postcode" class="form-control" placeholder="postcode" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telephone</label>
					<div class="col-sm-3">
						<input type="text" name="telephone" class="form-control" placeholder="telephone" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">MembershipStartDate</label>
					<div class="col-sm-3">
						<input type="text" name="membershipstartdate" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">MembershipEndDate</label>
					<div class="col-sm-2">
						<input type="text" name="membershipenddate" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
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
