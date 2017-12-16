<?php
include "index_template.php";
session_start();

if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			table tr td{padding:5px;}
		</style>
	</head>
<body>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h3>Customer Order details</h3>
						<hr/>
						<div class="row">
							<div class="col-md-6">
								<img style="float:right;" src="product image" class="thumbnail-img">
							</div>
							<div class="col-md-6">
								<table>
									<tr><td>Product Name</td><td><b>Sony camera</b></td></tr>
									<tr><td>Product price</td><td><b>$500</b></td></tr>
									<tr><td>Quantity</td><td><b>3</b></td></tr>
									<tr><td>Payment</td><td><b>Completed</b></td></tr>
									<tr><td>Transaction Id</td><td><b>RHJK4652146</b></td></tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>