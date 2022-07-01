<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "./db.php";
require_once "./product-common.php";

if (isset($_POST['add_to_cart'])) {
  if (isset($_SESSION['cust_id'])) {
    $cust_id = $_SESSION['cust_id'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $sid=$_POST['sid'];
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "INSERT INTO cart(cust_id, product_id, quantity, price, s_id) VALUES('$cust_id', '$product_id', 1, '$price', '$sid')";
    $con->query($sql);
  } else {
    echo "<script>alert('Please login to access cart')</script>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Product Card/Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      font-family: 'Open Sans', sans-serif;
    }

    body {
      line-height: 1.5;
      background-image: url(https://www.digitshack.com/codepen/mentor1/pattern-background-desktop.svg);
    }

    .card-wrapper {
      max-width: 1100px;
      margin: 0 auto;
    }

    img {
      width: 100%;
      display: block;
    }

    .img-display {
      overflow: hidden;
    }

    .img-showcase {
      display: flex;
      width: 100%;
      transition: all 0.5s ease;
    }

    .img-showcase img {
      min-width: 100%;
    }

    .img-select {
      display: flex;
    }

    .img-item {
      margin: 0.3rem;
    }

    .img-item:nth-child(1),
    .img-item:nth-child(2),
    .img-item:nth-child(3) {
      margin-right: 0;
    }

    .img-item:hover {
      opacity: 0.8;
    }

    .product-content {
      padding: 2rem 1rem;
    }

    .product-title {
      font-size: 3rem;
      text-transform: capitalize;
      font-weight: 700;
      position: relative;
      color: #12263a;
      margin: 1rem 0;
    }

    .product-title::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 4px;
      width: 80px;
      background: #12263a;
    }

    .product-link {
      text-decoration: none;
      text-transform: uppercase;
      font-weight: 400;
      font-size: 0.9rem;
      display: inline-block;
      margin-bottom: 0.5rem;
      background: #256eff;
      color: #fff;
      padding: 0 0.3rem;
      transition: all 0.5s ease;
    }

    .product-link:hover {
      opacity: 0.9;
    }

    .product-rating {
      color: #ffc107;
    }

    .product-rating span {
      font-weight: 600;
      color: #252525;
    }

    .product-price {
      margin: 1rem 0;
      font-size: 1rem;
      font-weight: 700;
    }

    .product-price span {
      font-weight: 400;
    }

    .last-price span {
      color: #f64749;
      text-decoration: line-through;
    }

    .new-price span {
      color: #256eff;
    }

    .product-detail h2 {
      text-transform: capitalize;
      color: #12263a;
      padding-bottom: 0.6rem;
    }

    .product-detail p {
      font-size: 0.9rem;
      padding: 0.3rem;
      opacity: 0.8;
    }

    .product-detail ul {
      margin: 1rem 0;
      font-size: 0.9rem;
    }

    .product-detail ul li {
      margin: 0;
      list-style: none;
      background: url(shoes_images/checked.png) left center no-repeat;
      background-size: 18px;
      padding-left: 1.7rem;
      margin: 0.4rem 0;
      font-weight: 600;
      opacity: 0.9;
    }

    .product-detail ul li span {
      font-weight: 400;
    }

    .purchase-info {
      margin: 1.5rem 0;
    }

    .purchase-info input,
    .purchase-info .btn {
      border: 1.5px solid #ddd;
      border-radius: 25px;
      text-align: center;
      padding: 0.45rem 0.8rem;
      outline: 0;
      margin-right: 0.2rem;
      margin-bottom: 1rem;
    }

    .purchase-info input {
      width: 60px;
    }

    .purchase-info .btn {
      cursor: pointer;
      color: #fff;
    }

    .purchase-info .btn:first-of-type {
      background: #256eff;
    }

    .purchase-info .btn:last-of-type {
      background: #f64749;
    }

    .purchase-info .btn:hover {
      opacity: 0.9;
    }

    .social-links {
      display: flex;
      align-items: center;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      color: #000;
      border: 1px solid #000;
      margin: 0 0.2rem;
      border-radius: 50%;
      text-decoration: none;
      font-size: 0.8rem;
      transition: all 0.5s ease;
    }

    .social-links a:hover {
      background: #000;
      border-color: transparent;
      color: #fff;
    }

    @media screen and (min-width: 992px) {
      .card {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
      }

      .card-wrapper {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .product-imgs {
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .product-content {
        padding-top: 0;
      }
    }
  </style>
</head>

<body>
  <div class="card-wrapper">
    <div class="card">
      <!-- card left -->
      <div class="product-imgs">
        <div class="img-display">
          <?php
          $pid = $_GET['pid'];
          $product = fetch_product($pid);
          ?>
          <div class="img-showcase">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product[0]['p_image']); ?>">
          </div>
        </div>
        <div class="img-select">
          <div class="img-item">
            <a href="#" data-id="1">
              <img src="shoes_images/shoe_1.jpg" alt="">
            </a>
          </div>
          <div class="img-item">
            <a href="#" data-id="2">
              <img src="shoes_images/shoe_2.jpg" alt="">
            </a>
          </div>
          <div class="img-item">
            <a href="#" data-id="3">
              <img src="shoes_images/shoe_3.jpg" alt="">
            </a>
          </div>
          <div class="img-item">
            <a href="#" data-id="4">
              <img src="shoes_images/shoe_4.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
      <!-- card right -->
      <form action="" method="post">
      <div class="product-content">
        <h2 class="product-title"><?= $product[0]['p_name']; ?></h2>
        <a href="#" class="product-link">Hand made</a>
        <div class="product-rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <!-- <span>4.7(21)</span> -->
        </div>

        <div class="product-price">
          <p class="new-price">Price: <span><?= $product[0]['p_price']; ?></span></p>
          <input type="hidden" name="product_id" id="product_id" value="<?= $product[0]['product_id'] ?>">
          <input type="hidden" name="price" id="price" value="<?= $product[0]['p_price'] ?>">
          <input type="hidden" name="sid" id="sid" value="<?= $product[0]['s_id'] ?>">
        </div>

        <div class="product-detail">
          <h2>about this item: </h2>
          <p><?= $product[0]['p_desc']; ?></p>
          <ul>
            <li>Category: <span><?= $product[0]['category']; ?></span></li>
            <li>Shipping Area: <span>Within the country</span></li>
            <li>Shipping Fee: <span>Free</span></li>
          </ul>
        </div>
        
        <div class="purchase-info">
          <input type="number" min="0" value="1">
          <button id="add_to_cart" name="add_to_cart" class="btn">
            Add to Cart <i class="fas fa-shopping-cart"></i>
          </button>
          <button type="button" class="btn" onclick="window.location.href ='Cart.php'">Buy</button>
        </div>
        
        <!-- <div class = "social-links">
            <p>Share At: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div> -->
      </div>
    </div>
  </div>
  </form>


  <script src="script.js"></script>
</body>

</html>