<?php
session_start();
$use_id=$_SESSION['admin_id'];

if(!isset($_SESSION['admin_id'])){
	echo "<script>alert('You are not Logged in. Please Login!')</script>";
    echo "<script>window.open('../login.php', '_self')</script>";
}else if(isset($_SESSION['user_id'])){
	echo "<script>alert('You are not allowed to Access this Page!')</script>";
    echo "<script>window.open('../login.php', '_self')</script>";
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
				<?php include('sidebar.php'); ?>
				<div class="col-lg-9">
					<div class="card" style="padding: 5px;">
						<h4><span class="fas fa-plus"></span> Add New Reservation Plan Type</h4>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-12 text-primary">
									<table class="table table-condensed">
										<tr>
											<form method="post">
											<th>Reservation Type Name</th>
											<td><input type="text" name="name" class="form-control"></td>
										</tr>
										<tr>
											<th>Amount</th>
											<td><input type="text" name="amount" class="form-control"></td>
										</tr>
										<tr>
											<th>Total Number</th>
											<td><input type="number" name="total_no" class="form-control"></td>
										</tr>
										<tr>
											<th>Description</th>
											<td><textarea class="form-control" name="description"></textarea></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit" name="sub_plan" class="form-control btn btn-primary" value="Add Plan"></td>
										</tr>
									</table>

								</div>
                				</div>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body" style="padding:5px; height: 470px; overflow-y:scroll ;">
									<fieldset>
										<legend>Reservation Plans </legend>
										<table class="table table-condensed table-responsive">
											<tr>
												<th>Name</th>
												<th>Price Per Day</th>
												<th>Available No.</th>
												<th>Total No.</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
<?php
$sql2="SELECT * FROM reserve_type ORDER BY id DESC ";
$result2=mysql_query($sql2);
$count=mysql_num_rows($result2);
while($rows=mysql_fetch_assoc($result2)){
?>
											<tr>
												<td><?php echo $rows['name'];  ?></td>
												<td>₦<?php echo number_format($rows['amount']);  ?></td>
												<td><?php echo $rows['available_no'];  ?></td>
												<td><?php echo $rows['total_no'];  ?></td>
												<td><?php echo $rows['description'];  ?></td>
												<td><form method="post">
														<input type="hidden" name="plan_id" value="<?php echo $rows['id'];  ?>">
														<input type="hidden" name="reserve_type_name" value="<?php echo $rows['name'];  ?>">
														<input type="submit" name="sub_del" value="Delete" class="btn btn-danger btn-sm">
													</form>
											</tr>
<?php
}

if(isset($_POST['sub_del'])){
	$plan_id=$_POST['plan_id'];
	$reserve_type_name=$_POST['reserve_type_name'];

	$sql3="DELETE FROM reserve_type WHERE id='$plan_id' ";
	$result3=mysql_query($sql3);

	if($result3){
		echo "<script>alert('".$reserve_type_name." Deleted Successfully!')</script>";
        echo "<script>window.open('reserve_plans.php', '_self')</script>";
	}else{
		echo "<script>alert('Error: Reservation Plan Unable to Delete!')</script>";
        echo "<script>window.open('reserve_plans.php', '_self')</script>";
	}
}

if(isset($_POST['sub_plan'])){
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	$total_no=$_POST['total_no'];
	$description=$_POST['description'];

	$sql="INSERT INTO reserve_type(name, description, amount, available_no, total_no)VALUES('$name', '$description', '$amount', '$total_no', '$total_no') ";
	$result=mysql_query($sql);

	if($result){
		echo "<script>alert('Reservation Plan Added Successfully!')</script>";
        echo "<script>window.open('reserve_plans.php', '_self')</script>";
	}else{
		echo "<script>alert('Erroro! Plan Not Added!')</script>";
        echo "<script>window.open('reserve_plans.php', '_self')</script>";
	}
}
?>
											<tr>
												<td colspan="8"><b>Total Reservation Plans: <?php echo $count;  ?></b></td>
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

