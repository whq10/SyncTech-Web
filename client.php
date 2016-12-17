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
	<title>Sync Tech</title>

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
				<a class="navbar-brand hidden-xs hidden-sm" href="http://www.synctech.com">Sync Tech</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
		<!--		<li class="active"><a href="index.php">Master Data</a></li>
					<li><a href="add.php">Tambah Data</a></li>                     -->
					<li><a href="customer.php">Customer</a></li>
					<li><a href="client.php">Client</a></li>
					<li><a href="email.php">Email</a></li>
					<li><a href="report.php">Report</a></li>	
					<li><a href="redeem.php">Redeem</a></li>					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Client Data</h2>
			<h1 align="center">Welcome <?php echo $login_session; ?></h1> 
			 <h2 align="right"><a href = "logout.php">Sign Out</a></h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$StoreNum = $_GET['StoreNum'];
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE StoreNum='$StoreNum'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE StoreNum='$StoreNum'");
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
						<option value="0">Filter Sync Tech</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Manitoba" <?php if($filter == 'Manitoba'){ echo 'selected'; } ?>>Manitoba</option>
						<option value="Albert" <?php if($filter == 'Albert'){ echo 'selected'; } ?>>Albert</option>                       
					</select>
					<a href="add_client.php" class="btn btn-sm btn-danger">New Client</a>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
				    <th>No</th>
                    <th>Store Num</th>
					<th>Branch Name</th>
					<th>Province</th>
					<th>City</th>
                    <th>Address</th>
					<th>Postcode</th>
                    <th>Telephone</th>
					<th>MembershipStartDate</th>
					<th>MembershipEndDate</th> 
					<th>Tools</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($koneksi, "SELECT * FROM client WHERE Province='$filter' ORDER BY Province ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM client ORDER BY StoreNum ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
						<td>'.$no.'</td>
							<td><a href="client_profile.php?StoreNum='.$row['StoreNum'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['StoreNum'].'</a></td>
                            <td>'.$row['BranchName'].'</td>
                            <td>'.$row['Province'].'</td>
							<td>'.$row['City'].'</td>
                            <td>'.$row['Address'].'</td>
							<td>'.$row['Postcode'].'</td>
                            <td>'.$row['Telephone'].'</td>
							<td>'.$row['MembershipStartDate'].'</td>
                            <td>'.$row['MembershipEndDate'].'</td>
							
							
							<td>

								<a href="edit_client.php?StoreNum='.$row['StoreNum'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

								<a href="index.php?aksi=delete&StoreNum='.$row['StoreNum'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['Province'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
