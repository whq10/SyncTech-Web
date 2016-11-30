<?php
include("koneksi.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer</title>

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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Sync Tech</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Sync Tech</a>
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
			<h2>Customer Data</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM customer WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM customer WHERE id='$id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>

			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data customer</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>						
						<option value="Active" <?php if($filter == 'Active'){ echo 'selected'; } ?>>Active</option>
                        <option value="Suspend" <?php if($filter == 'Suspend'){ echo 'selected'; } ?>>Suspend</option>
						<option value="Expired" <?php if($filter == 'Expired'){ echo 'selected'; } ?>>Expired</option>
					</select>
					<a href="add_customer.php" class="btn btn-sm btn-danger">New Customer</a>
				</div>
				<div class="form-group" align="right">
					<input type = "text" name="searchtxt" class="form-control"/>
					<a href="search_customer.php" class="btn btn-sm btn-danger">Search</a>
				</div>

			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Customer ID</th>
					<th>Name</th>
                    <th>Postcode</th>
                    <th>Birthday</th>
					<th>Telephone</th>
					<th>Points</th>
					<th>Status</th>
                    <th>Tools</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($koneksi, "SELECT * FROM customer WHERE status='$filter' ORDER BY id ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM customer ORDER BY id ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id'].'</td>
							<td><a href="profile.php?id='.$row['id'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['name'].'</a></td>
                            <td>'.$row['postcode'].'</td>
                            <td>'.$row['birthday'].'</td>
							<td>'.$row['tel'].'</td>
                            <td>'.$row['points'].'</td>
							<td>';
							if($row['status'] == 'Active'){
								echo '<span class="label label-success">Active</span>';
							}
                            else if ($row['status'] == 'Suspend' ){
								echo '<span class="label label-info">Suspend</span>';
							}
                            else if ($row['status'] == 'Expired' ){
								echo '<span class="label label-warning">Expired</span>';
							}
						echo '
							</td>
							<td>

								<a href="edit_customer.php?id='.$row['id'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="password.php?id='.$row['id'].'" title="Ganti Password" data-placement="bottom" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
								<a href="customer.php?aksi=delete&id='.$row['id'].'" title="Delete Customer" onclick="return confirm(\'Are you want to delete the customer'.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
	</div><center>
	<p>&copy; Sync Tech 2016</p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
