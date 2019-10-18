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
    
    <footer>&copy; Seafood Shop, 2019</footer>


 
</body>
</html>