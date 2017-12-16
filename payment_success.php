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
						<h3>Thank You</h3>
						<hr/>
						<p>Hello <?php echo $_SESSION["name"]; ?>
							Your payment process is successfully completed and your transaction id is xxxxxxx.</br>
							You can continue your shoping</br>
						</p>
						<a href="index.php" class="btn btn-success btn-lg">Continue shoping</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>