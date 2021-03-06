<?php
include("koneksi.php");
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Redeemable Items</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">Sync Tech</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Sync Tech</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="customer.php">Customer</a></li>
					<?php
					$role = $_SESSION['role'];
					if($role == 1)
					{
						echo '<li><a href="client.php">Client</a></li>';
						
					}
					?>
					<li><a href="email.php">Email</a></li>
					<li><a href="report.php">Report</a></li>
					<li><a href="redeem.php">Redeem</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Redeemable Items</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />


			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$redeem_id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM redeem WHERE redeemid='$redeem_id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data not found.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM redeem WHERE redeemid='$redeem_id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Deleted Successfully.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Deleted Failed.</div>';
					}
				}
			}
			
			?>
			
			

			<form class="form-inline" method="get">
				
				
				<!--	<a href="add_customer.php" class="btn btn-sm btn-danger">New Customer</a>-->
				<div style="text-align: right">
				<!--
				  <a href="search.php" class="btn btn-sm btn-danger">Search Customer</a>
				  -->
                  <a href="add_redeem.php" class="btn btn-sm btn-danger">New Redeemable Item</a>
                </div>     	
				 	
			</form> 
			<br />
			
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Redeem ID</th>
					<th>Redeem Name</th>
                    <th>Redeem Cost</th>
                    <th>Redeem Points</th>
					<th>Redeem Image</th>
                    <th>Tools</th>
				</tr>
				
				
				<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM redeem ORDER BY redeemid ASC");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data not found.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){						
						echo '
						<tr>
							<td>'.$no.'</td>
							<td><a href="redeem_profile.php?redeemid='.$row['RedeemId'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['RedeemId'].'</a></td>
                            <td>'.$row['RedeemName'].'</td>
                            <td>'.$row['RedeemCost'].'</td>
							<td>'.$row['RedeemPoints'].'</td>
							<td>'.$row['RedeemImage'].'</td>
							<td>

								<a href="edit_redeem.php?id='.$row['RedeemId'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="redeem.php?aksi=delete&id='.$row['RedeemId'].'" title="Delete Redeemable Item" onclick="return confirm(\'Are you want to delete the redeemable item'.$row['RedeemName'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
				
				
			</table>
			</div>
		</div>
	</div>
	   <center>
	      <p>CopyRight &copy; Sync Tech 2016</p>
	   </center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
