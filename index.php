<?php

session_start();
if(isset($_SESSION["uid"])){
header("location:profile.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Avaquant Software</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
	</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar navbar-header">
			<a href="#" class="navbar-brand">Avaquant Software</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="#">Products</a></li>
				<li style="width:300px;left:10px;top:10px"><input type="text" class="form-control" id="search"></li>
				<li style="left:20px;top:10px"><button class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span>search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in ₹</div>
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" required />
									<label for="email">Password</label>
									<input type="password" class="form-control" id="password" required />
				 					<p><br/></p>
									<a href="#" style="color:white;list-style:none;">Forgot/Reset Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login" />
								</div>
							</div>
						</div>
					</ul>
				</li>
			<li><a href="signup.php">SignUp</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Educational Books</a></li>
					<li><a href="#">Fiction & Non-Fiction Books</a></li>
					<li><a href="#">Philosophy Books</a></li>
					<li><a href="#">Religion and Spirituality Books</a></li>
				</div>-->
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Sort By</h4></a></li>
					<li><a href="#">Price high to low</a></li>
					<li><a href="#">price low to high</a></li>
					<li><a href="#">Discount</a></li>
					<li><a href="#">Latest Arrivals</a></li>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!--here we get product jquery ajax request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
							<div class="panel-heading">Wings of Fire: An Autobiography 1st Edition</div>
							<div class="panel-body">
								<img src="images/wings-of-fire-an-autobiography-original.jpeg" />
							</div>
							<div class="panel-heading"> ₹500.00
							<button style="float:right;" class="btn btn-danger btn-xs">Add To Cart</button>
							</div>
							</div>
							
							<div class="panel panel-info">
							<div class="panel-heading">Wings of Fire: An Autobiography 1st Edition</div>
							<div class="panel-body">
								<img src="images/wings-of-fire-an-autobiography-original.jpeg" />
							</div>
							<div class="panel-heading"> ₹500.00
							<button style="float:right;" class="btn btn-danger btn-xs">Add To Cart</button>
							</div>
							</div>
							
							
							
						</div>-->
					</div>
					<div class="panel-footer">&copy;2017</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
