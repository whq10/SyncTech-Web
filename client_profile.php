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
	<title>Client Data</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="http://www.synctech.com">Sync Tech</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="http://www.synctech.com">Sync Tech</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="customer.php">Customer</a></li>
					<li><a href="client.php">Client</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Client Data &raquo; Details</h2>
			 <h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr/>
			
			<?php
			$id = $_GET['StoreNum'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM client WHERE StoreNum='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM client WHERE id='$id'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Deleted Successfully.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Deleted Failed.</div>';
				}
			}
			?>
			
			<table border="1" height="300">
			<tr>
			<td>
			<table class="table table-striped table-condensed">
				<tr>
					<th width="500">Store Number</th>
					<td><?php echo $row['StoreNum']; ?></td>
				</tr>
				<tr>
					<th>Branch Name</th>
					<td><?php echo $row['BranchName']; ?></td>
				</tr>
				<tr>
					<th>Province</th>
					<td><?php echo $row['Province']; ?></td>

				</tr>
				<tr>
					<th>City</th>
					<td><?php echo $row['City']; ?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?php echo $row['Address']; ?></td>
				</tr>
				<tr>
					<th>Postcode</th>
					<td><?php echo $row['Postcode']; ?></td>
					<?php
					$postcode = $row['Postcode'];				
					?>
				</tr>
				<tr>
					<th>Telephone</th>
					<td><?php echo $row['Telephone']; ?></td>
				</tr>
				<tr>
					<th>Membership Start Date</th>
					<td><?php echo $row['MembershipStartDate']; ?></td>
				</tr>
				<tr>
					<th>Membership End Date</th>
					<td><?php echo $row['MembershipEndDate']; ?></td>
				</tr>				
			</table>
			</td>
			
			<td>
			
			<?php
			$postcode = substr($postcode,0, 3);
			
			$big_postcode = substr($postcode,0, 3);
					$sql_1 = mysqli_query($koneksi, "SELECT count(*) FROM customer WHERE postcode like '%$big_postcode%'");
					//$sql_1 = mysqli_query($koneksi, "SELECT count(*) FROM customer");					
					$row_1 = mysqli_fetch_array($sql_1);
					//$count = $row_1;
			echo '<iframe frameborder=0 width=500 height=500 src="map/'.$postcode.'.html?count='.$row_1[0].'" scrolling="no"></iframe>'		
			?>
			
			</td>
			</tr>
			</table>
			
			
			
			
			<!--a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</a-->
			<a href="edit_client.php?StoreNum=<?php echo $row['StoreNum']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="client.php?aksi=delete&StoreNum=<?php echo $row['StoreNum']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete data of client <?php echo $row['BranchName']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>