<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "./db.php";

if (isset($_POST['add_to_cart'])) {
  $cust_id = $_SESSION['cust_id'];
  $product_id = $_POST['product_id'];
  $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
  $sql = "INSERT INTO cart(cust_id, product_id) VALUES('$cust_id', '$product_id')";
  $con->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="./homepagenew.css">
  <link rel="stylesheet" href="app.css">
  <style>
    #login_signup:hover {
      cursor: pointer;
    }
  </style>
</head>

<body>

  <?php require_once "./header.php"; ?>
  <main>

    <div class="grid-container">
      <?php
      $con = new mysqli("localhost", "root", "Eniac@123", "ovyapaar");
      $sql = "SELECT * FROM product";
      $result = $con->query($sql);
      while ($row = $result->fetch_assoc()) {
      ?>
        <form action="" method="post">
          <div class="card">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['p_image']); ?>">
            <input type="hidden" name="product_id" id="product_id" value="<?= $row['product_id'] ?>">
            <h1><?= $row['p_name'] ?></h1>
            <p class="price">Rs.<?= $row['p_price'] ?></p>
            <p><?= $row['p_desc'] ?></p>
            <p><button id="add_to_cart" name="add_to_cart">Add to Cart</button></p>
            <p><button onclick="window.location.href = 'cart.html';">Buy Now</button></p>
          </div>
        </form>
      <?php
      }
      ?>
    </div>


    <div class="modal-container" id="login_modal">
      <div class="modal-content">
        <div class="modal-header">
          Login
        </div>
        <div class="modal-body">
          <form action="customer-login.php" method="post" class="modal-form-center-1-col">
            <input type="text" id="identifier" name="identifier" placeholder="Enter mail or contact number">
            <input type="password" id="password" name="password" placeholder="Enter Password">
            <button>Login</button>
            <button type="reset">Reset</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close_login_modal">Close</button>
        </div>
      </div>

    </div>


  </main>
  <footer>
    <p>&copy; 2022 ONLITS TECHNOLOGIES LLP | All Rights Reserved</p>
  </footer>

  <script>
    let login_signup = document.getElementById("login_signup")
    let login_modal = document.getElementById("login_modal")
    let close_login_modal = document.getElementById("close_login_modal")

    login_signup.onclick = function() {
      login_modal.style.display = "block"
    }
    close_login_modal.onclick = function() {
      login_modal.style.display = "none";
    }
  </script>
</body>

</html>