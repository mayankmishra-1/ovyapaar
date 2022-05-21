<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./homepagenew.css">
</head>
<body>
    <header class="site-header">
        <div class="site-identity">
          <a href="#homepagenew.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
          <input type="text" placeholder="Search..">
        </div>  
        <nav class="site-navigation">
          <ul class="nav">
            <li><a href="about.html">About</a></li> 
            <li><a href="#">Category</a></li> 
            <li><a href="#">Contact</a></li>  
            <li><a href="#">Welcome Mayank</a></li>
          </ul>
        </nav>
      </header>
      <!div id='show_bg_2'></div>
    <main>
        <div class="grid-container">
    <?php
            $con = new mysqli("localhost", "root", "Eniac@123", "ovyapaar");
            $sql = "SELECT * FROM product";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) { 
        ?>
        <div class="card">
           <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['p_image']);?>">
            <h1><?= $row['p_name']?></h1>
            <p class="price">Rs.<?=$row['p_price']?></p>
            <p><?= $row['p_desc']?></p>
            <p><button onclick="window.location.href = 'cart.html';">Add to Cart</button></p>
            <p><button onclick="window.location.href = 'cart.html';">Buy Now</button></p>
          </div>
          <?php
            }
          ?>
          </div>
    </main>
    <footer>
        <p>&copy; 2022 ONLITS TECHNOLOGIES LLP | All Rights Reserved</p>
    </footer>
</body>
</html>