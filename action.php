<?php
session_start();
include "db.php";

// fetching categories
if(isset($_POST["category"])){
	$category_query="select * from categories";
	$run_query=mysqli_query($conn,$category_query);
	
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	
	
	if(mysqli_num_rows($run_query)>0){
		while($row=mysqli_fetch_array($run_query)){
			$cid=$row["catid"];
			$cat_name=$row["catname"];
			echo "
				<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
				";
		}
		echo "</div>";
	}
}

//fetching product
if(isset($_POST["page"])){
	$sql="select * from product";
	$run_query=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($run_query);
	$pageno=ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'><b>$i</b></a></li>
		";
	}
}

if(isset($_POST["getProduct"])){
	$limit=9;
	if(isset($_POST["setPage"])){
		$pageno=$_POST["pageNumber"];
		$start=($pageno * $limit)-$limit;
	}
	else{
		$start=0;
	}
	$product_query="select * from product limit $start,$limit";
	$run_query=mysqli_query($conn,$product_query);
	if(mysqli_num_rows($run_query)>0){
		while($rows=mysqli_fetch_array($run_query)){
			$pro_id=$rows['productid'];
			$pro_cat=$rows['productcat'];
			$pro_title=$rows['producttitle'];
			$pro_price=$rows['productprice'];
			$pro_image=$rows['productimage'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
								<img src='images/$pro_image' style='width:175px; height:200px;' />	
								</div>
								<div class='panel-heading'>₹$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div></div>
			";
		}
	}
}			

// fetching product category wise		
if(isset($_POST["get_selected_category"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_category"]))
		{
		$cid=$_POST["cat_id"];
		$sql="select * from product where productcat='$cid'";
		}
	else 
		{
		$keyword=$_POST["keyword"];
		$sql="select * from product where productkeywords like '%$keyword%'";
		}
	
	$run_query=mysqli_query($conn,$sql);
	while($rows=mysqli_fetch_array($run_query)){
			$pro_id=$rows['productid'];
			$pro_cat=$rows['productcat'];
			$pro_title=$rows['producttitle'];
			$pro_price=$rows['productprice'];
			$pro_image=$rows['productimage'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
								<img src='images/$pro_image' style='width:175px; height:200px;' />	
								</div>
								<div class='panel-heading'>₹$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>
			";
		}
}

if(isset($_POST["addToProduct"]))
	{
		if(isset($_SESSION["uid"])){
		$p_id=$_POST["proId"];
		$user_id=$_SESSION["uid"];
		$sql="select * from cart where productid='$p_id' and userid='$user_id'";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		if($count>0){
			echo "
				<div class='alert alert-info'>
						<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added continue shoping.........!</b>
				</div>
				";
			}else{
			$sql="select * from product where productid='$p_id'";
			$run_query=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($run_query);
			$id=$row["productid"];
			$pro_name=$row["producttitle"];
			$pro_image=$row["productimage"];
			$pro_price=$row["productprice"];
			$sql="INSERT INTO `cart` (`id`, `productid`, `ipaddress`, `userid`, `producttitle`, `productimage`, `qty`, `price`, `totalamount`)
			VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price');";
			if(mysqli_query($conn,$sql)){
			echo "
				<div class='alert alert-success'>
						<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is added.........!</b>
				</div>
				";
			}
		}
		}else{
			echo "
				<div class='alert alert-success'>
						<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Sorry...!go and do signup first then add product</b>
				</div>
				";
		}
		
	}
	
if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
	$uid=$_SESSION["uid"];
	$sql="select * from cart where userid='$uid'";
	$run_query=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($run_query);
	if($count>0){
		$no=1;
		$total_amt=0;
		while($row=mysqli_fetch_array($run_query)){
			$pro_id=$row["productid"];
			$pro_name=$row["producttitle"];
			$pro_image=$row["productimage"];
			$qty=$row["qty"];
			$pro_price=$row["price"];
			$total=$row["totalamount"];
			$price_array=array($total);
			$total_sum=array_sum($price_array);
			$total_amt=$total_amt+$total_sum;
			if(isset($_POST["get_cart_product"])){
			echo "
				<div class='row'></br>
					<div class='col-md-2'>$no</div>
					<div class='col-md-3'><img src='images/$pro_image' width='60px' height='50px'></div>
					<div class='col-md-5'>$pro_name</div>
					<div class='col-md-2'>₹$pro_price</div>
					
				</div>
			";
			$no=$no+1;
			}else{
				echo "<br/>
					<div class='row'>
							<div class='col-md-2'>
								<div class='btn-group'>
									<a href='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
									<a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-circle'></span></a>
								</div>
							</div>
							<div class='col-md-2'><img src='images/$pro_image' width='60px' height='50px'></div>
							<div class='col-md-2'>$pro_name</div>
							<div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
							<div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
							<div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
						</div>
				";
			}
			
			
		}
		if(isset($_POST["cart_checkout"])){
		echo "
			<div class='row'>
				<div class='col-md-8'></div>
				<div class='col-md-4'>
					<h3><b>Total: $total_amt</b></h3>
				</div>
			</div>";
		}
		echo '
		
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
		  <input type="hidden" name="cmd" value="_cart">
		  <input type="hidden" name="business" value="shoppingcart@avaquant.com">
		  <input type="hidden" name="upload" value="1">';
		  
		  $x=0;
		  $uid=$_SESSION["uid"];
		  $sql="select * from cart where userid='$uid'";
		  $run_query=mysqli_query($conn,$sql);
		  while($row=mysqli_fetch_array($run_query)){
		  $x++;
			echo '<input type="hidden" name="item_name_'.$x.'" value="'.$row["producttitle"].'">
		  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
		  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
		  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
		  }
		  
		  
		  echo '
			<input style="float:right;margin-right:80px;" type="image" name="submit"
			src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/silver-rect-paypalcheckout-44px.png" alt="PayPal Checkout"
			alt="PayPal - The safer, easier way to pay online">
		</form>';
		
	}
}

if(isset($_POST["cart_count"])&& isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$sql="select * from cart where userid='$uid'";
	$run_query=mysqli_query($conn,$sql);
	echo mysqli_num_rows($run_query);
}

if(isset($_POST["removeFromCart"]))
{
	$pid=$_POST["removeId"];
	$uid=$_SESSION["uid"];
	$sql="delete from cart where userid='$uid' and productid='$pid'";
	$run_query=mysqli_query($conn,$sql);
	if($run_query){
		echo "
			<div class='alert alert-success'>
					<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is removed from cart.........!</b>
			</div>
			";
	}
}

if(isset($_POST["updateProduct"])){
	$uid=$_SESSION["uid"];
	$pid=$_POST["updateId"];
	$qty=$_POST["qty"];
	$price=$_POST["price"];
	$total=$_POST["total"];
	$sql="update cart set qty='$qty',price='$price',totalamount='$total'
	where userid='$uid' and productid='$pid'";
	$run_query=mysqli_query($conn,$sql);
	if($run_query)
	{
		echo "
			<div class='alert alert-success'>
					<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product quantity is updated.........!</b>
			</div>
			";
	}
}
	
?>