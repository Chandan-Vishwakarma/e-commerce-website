<?php
session_start();

if(!isset($_SESSION["uid"])){
	header("location:index.php");
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
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge"></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-2">Sl. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-5">Product Name</div>
									<div class="col-md-2">Price in ₹</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--div class="row">
									<div class="col-md-3">Sl. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in ₹</div>
								</div-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hii,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
						<li><a href="#" style="text-decoration:none; color:blue;">Change password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
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
				<div class="row">
					<div class="col-md-12" id="product_msg"></div>
				</div>
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
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
					<!--li><a href="#">1</a></li-->
					</ul>
				</center>
			</div>
		</div>
	</div>
</body>
</html>
