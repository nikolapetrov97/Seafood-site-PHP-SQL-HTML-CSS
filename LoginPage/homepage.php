<?php
	session_start();
	include_once("dbblog.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Seafood Shop</title>
        <link href="css/styleindex.css" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4e93d54e94.js" crossorigin="anonymous"></script>
        <script> 
        function checklink(e){ 
            return confirm('Going to: ' + e.href + ' ?'); 
        } 
        </script> 
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
    <h1>YOU MUST BE LOGGED IN</h1>
    <?php
    }else
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
                <a href="shoppingCart.php">
              <i class="fas fa-shopping-cart fa-1x"></i>  
                </a>
              <!-- Right-aligned links -->
              <div class="topnav-right">
                <a href="homepage.php">Блог</a>
                <a href="login1.php">Влез</a>
                <a href="register.php">Регистрация</a>
              </div>
                
        </div>
    <form class="myform" action="homepage.php" method="post">
                  <input name="logout" type="submit" id="logoutbtn" value="Излез"/>
                  </form>
        <?php
            if(isset($_POST['logout'])) 
            {
                session_destroy();
                unset($_SESSION['username']);
                header('location:login1.php');
            }
        ?>
    
    
            <?php
            $sql="SELECT * FROM posts ORDER BY id DESC";
            $res = mysqli_query($db,$sql) or die(mysqli_error());
            $posts = "";
            if(mysqli_num_rows($res)>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $date= $row['date'];
                        $posts .= "<div class='posts'><h2>$title</h2><h3>$date</h3><p>$content</p></div><hr>";
                    }
                    echo $posts;
                }else {echo "No posts!";}
            ?>
    
            <form class="myform" action="homepage.php" method="post">
                <a href="post.php" input type="button" id="postbtn" value="POST"></a><br>
                
            </form>

            <footer>&copy; Seafood Shop, 2019</footer>
    <?php
    }
    ?>
    

	
</body>
</html>