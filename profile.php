<?php
session_start();
$use_id=$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){
	echo "<script>alert('You are not Logged in. Please Login!')</script>";
    echo "<script>window.open('login.php', '_self')</script>";
}
	include('head.php');
	include('connect.php');

	$sql="SELECT * FROM users WHERE id='$use_id' ";
	$result=mysql_query($sql);

	$rows=mysql_fetch_assoc($result);
?>

<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="user.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h3><?php echo $rows['name'];  ?></h3>
									<p class="text-secondary mb-1"><?php echo $rows['phone'];  ?></p>
									<p class="text-muted font-size-sm"><?php echo $rows['address'];  ?></p>
								</div>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 align="center" class="mb-0"><b>Summary</b></h4>
								</li>
<?php
$sql3="SELECT * FROM reservations WHERE user_id='$use_id' AND status='Pending' ";
$result3=mysql_query($sql3);
$count3=mysql_num_rows($result3);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="mb-0">Pending <span class="badge"><?php echo $count3; ?></span></h4>
								</li>
<?php
$sql4="SELECT * FROM reservations WHERE user_id='$use_id' AND status='Approved' ";
$result4=mysql_query($sql4);
$count4=mysql_num_rows($result4);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="mb-0">Approved <span class="badge"><?php echo $count4; ?></span></h4>
								</li>
<?php
$sql5="SELECT * FROM reservations WHERE user_id='$use_id' AND status='Cancelled' ";
$result5=mysql_query($sql5);
$count5=mysql_num_rows($result5);
?>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="mb-0">Canceled <span class="badge"><?php echo $count5; ?></span></h4>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="card" style="padding: 5px;">
						<h3>Profile Information</h3>
						<div class="cad>-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $rows['name'];  ?>" disabled>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $rows['email'];  ?>" disabled>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $rows['phone'];  ?>" disabled>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $rows['address'];  ?>" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body" style="padding:5px; height: 330px; overflow-y:scroll ;">
									<fieldset>
										<legend>Reservations History  <a href="reserve.php" class="btn btn-primary btn-sm"><span class="fas fa-plus"></span> New Reservation </a></legend>
										<table class="table table-condensed table-responsive">
											<tr>
												<th>Date</th>
												<th>Type</th>
												<th>Name</th>
												<th>Invoice No.</th>
												<th>Duration<br>(Days)</th>
												<th>Price</th>
												<th>Code</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
<?php
$sql2="SELECT * FROM reservations WHERE user_id='$use_id' ORDER BY id DESC ";
$result2=mysql_query($sql2);
$count=mysql_num_rows($result2);
while($rows=mysql_fetch_assoc($result2)){
?>
											<tr>
												<td><?php echo $rows['date'];  ?></td>
												<td><?php echo $rows['reserve_type'];  ?></td>
												<td><?php echo $rows['reserve_name'];  ?></td>
												<td><?php echo $rows['invoice'];  ?></td>
												<td><?php echo $rows['duration'];  ?></td>
												<td><?php echo $rows['price'];  ?></td>
												<td><?php echo $rows['reserve_code'];  ?></td>
												<td><?php echo $rows['status'];  ?></td>
												<td>
													<?php 
														if($rows['status']=='Cancelled'){
															?><form method="">
														<input type="hidden" name="record_id" value="<?php echo $rows['id'];  ?>">
														<input type="submit" disabled name="" value="Cancelled" class="btn btn-danger btn-sm">
													</form>
													<?php
														}elseif($rows['status']=='Approved'){
															?>
														<a class="btn btn-success btn-sm">Approved</a>
													<?php
														}else{
															?><form method="post">
														<input type="hidden" name="record_id" value="<?php echo $rows['id'];  ?>">
														<input type="hidden" name="reserve_type" value="<?php echo $rows['reserve_type'];  ?>">
														<input type="submit" name="sub_cancel" value="Cancel" class="btn btn-danger btn-sm">
													</form>
													<?php
														}
													?>
												</td>
											</tr>
<?php
}

if(isset($_POST['sub_cancel'])){
	$sql6="UPDATE reservations SET status='Cancelled' WHERE id='".$_POST['record_id']."' ";
	$result6=mysql_query($sql6);

	if($result6){
		$sql8="SELECT * FROM reserve_type WHERE name='".$_POST['reserve_type']."' ";
		$result8=mysql_query($sql8);
		$rw=mysql_fetch_assoc($result8);
		$available_no=$rw['available_no'];
		$new_available_no=$available_no+1;
		//echo $sql8." Err: ".mysql_error();
		//echo $sql6." Err: ".mysql_error();
		//echo $available_no." Err: ".mysql_error();

		$sql7="UPDATE reserve_type SET available_no='$new_available_no' WHERE id='".$rw['id']."' ";
		$result7=mysql_query($sql7);
		//echo $sql7." Err: ".mysql_error();

		echo "<script>alert('Reservation Cancelled Successfully!')</script>";
        echo "<script>window.open('profile.php', '_self')</script>";
	}
}
?>
											<tr>
												<td colspan="8"><b>Total Reservations: <?php echo $count;  ?></b></td>
											</tr>
										</table>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

<?php
	include('footer.php');
?>

