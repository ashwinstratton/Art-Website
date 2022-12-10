<?php
    session_start();

    // SET UP DATABASE CONNECTION

    function DisplayError($err)
    {
        echo "<div class=\"errorMessage\">ERROR: " . $err . "</div>" . PHP_EOL;
    }

    include '../config/config.php';

    $conn               = $config['connection'];
    $hostName           = $config['hostName'];
    $databaseName       = $config['databaseName'];
    $username           = $config['username'];
    $password           = $config['password'];
    $connection_type    = $config['connection_type'];

    // INITIALIZE OUTPUT

    $CurrentID      = 0;
    $result         = NULL;
    $numRows        = 0;

    try
    {
        $conn = new PDO($connection_type 
                        . ':host=' . $hostName . ';'
                        . 'dbname=' . $databaseName
                        , $username
                        , $password);
    }
    catch (PDOException $e)
    {
        DisplayError('Database Connection --- ' . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html>

  <meta charset="utf-8">
  <title>Shop - DeepArt</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter|Josefin+Sans">
  <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
  
  <header>

      <body>
        <a href="homePage.html" class="logo"> DeepArt </a>

        <ul class="navbar">
          <li><a href="../html/featuredPage.html"> Featured </a></li>
          <li><a href="../php/productPage.php"> Shop </a></li>
          <li><a href="../html/ourStory.html"> Our Story </a></li>
        </ul>

      <div class = "icons">
        <a href="../php/accountLogin.php"><i class='bx bx-user'></i></a>
        <a href="../html/checkoutCart.html"><i class='bx bx-cart-alt'></i></a>
      </div>

  <section>
    <div class="product-container">

      <div class="box">
        <a href="productCard.html"><img src="../productPhotos/product1.jpg"></a>
        <h4>Moira</h4>
        <h5>$46.00</h5>
      <div class="button">
        <h6><a href="">Add To Cart</a></h6>
        <div class = "cart">
        </div>
        </div>
      </div>

      <div class="box">
        <a href="productCard.html"><img src="../productPhotos/product2.jpg"></a>
        <h4>Handsome David</h4>
        <h5>$80.00</h5>

        <div class="button">
          <h6><a href="productCard.html">Add To Cart</a></h6>
          <div class = "cart">
          </div>
          </div>
      </div>

      <div class="box">
        <a href="productCard.html"><img src="../productPhotos/product3.jpg"></a>
        <h4>Art Artist</h4>
        <h5>$50.00</h5>

        <div class="button">
          <h6><a href="">Add To Cart</a></h6>
          <div class = "cart">
          </div>
          </div>
      </div>

      <div class="box">
        <a href="productCard.html"><img src="../productPhotos/product4.jpg"></a>
        <h4>Rainforest Tree-House</h4>
        <h5>$20.00</h5>

        <div class="button">
          <h6><a href="">Add To Cart</a></h6>
          <div class = "cart">
          </div>
          </div>
      </div>

    </div>
  </section>

  <section class="footer" id="footer">
    <div class="main-footer">
      <div class="footer-content">
        <li><a href="contactPage.html">Contact</a></li>
        <li><a href="shippingQuestions.html">Shipping & Returns</a></li>
        <li><a href="FAQ.html">FAQ</a></li>
        <li><a href="adminLogin.html">Admin Portal<d/a></li>
      </div>
    </div>
  </section>

  
  </body>
</html>

