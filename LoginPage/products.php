<?php
session_start();
include('dbblog.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($db,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <title>Seafood Shop</title>
        <link href="css/productsstyle.css" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4e93d54e94.js" crossorigin="anonymous"></script>
        
    </head>
	<body>
    <?php
        if(!isset($_SESSION['username'])||empty($_SESSION['username']))
    {?>
            <div class="topnav-centeredimg">
                <img src="css/seafoodd.png" class="avatar1"/>
              </div>
           
            <div class="topnav">
              <div class="topnav-centered">
                  <a href="index.php">
                <i class="fas fa-fish"></i>
                  </a>
              </div>

              <!-- Left-aligned links (default) -->
              <a href="products.php">Онлайн Магазин</a>
              <a href="aboutus.php">За нас</a>
              <a href="contacts.php">Контакти</a>
                <a href="cart.php">
              <i class="fas fa-shopping-cart fa-1x"></i>  
                </a>
              <!-- Right-aligned links -->
              <div class="topnav-right">
                <a href="homepage.php">Блог</a>
                <a href="login1.php">Влез</a>
                <a href="register.php">Регистрация</a>
              </div>
        </div>			
        <div class="productsdivandh6" style="width:700px; margin:50 auto;">

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<?php
}

$result = mysqli_query($db,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['image']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  </form>
		   	  </div>";
        }
mysqli_close($db);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
            
</div>
        
        
        <footer>&copy; Seafood Shop, 2019</footer>
    <?php
        }else{
    ?>
        <div class="topnav-centeredimg">
                <img src="css/seafoodd.png" class="avatar1"/>
              </div>
           
            <div class="topnav">
              <div class="topnav-centered">
                  <a href="index.php">
                <i class="fas fa-fish"></i>
                  </a>
              </div>

              <!-- Left-aligned links (default) -->
              <a href="products.php">Онлайн Магазин</a>
              <a href="aboutus.php">За нас</a>
              <a href="contacts.php">Контакти</a>
                <a href="cart.php">
              <i class="fas fa-shopping-cart fa-1x"></i>  
                </a>
              <!-- Right-aligned links -->
              <div class="topnav-right">
                <a href="homepage.php">Блог</a>
                <a href="login1.php">Влез</a>
                <a href="register.php">Регистрация</a>
              </div>
        </div>			
        <div style="width:700px; margin:50 auto;">

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<?php
}

$result = mysqli_query($db,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['image']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($db);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</div>
        
        <footer>&copy; Seafood Shop, 2019</footer>
    <?php
        }
    ?>
	</body>
</html>