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
  <title>Product - DeepArt</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter|Josefin+Sans">
  <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/header.css">
  <link rel="stylesheet" type="text/css" href="../css/productcard.css">
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
</header>

  <head>
    <title>Harvest vase</title>
  </head>
  
  <body>
    <div class="wrapper">
      <div class="product-img">
        <img src="../productPhotos/product1.jpg" height="400" width="375">
      </div>
      <div class="product-info">
        <div class="product-text">
          <h1>"Moira"</h1>
          <h2>by <i>Midjourney</i></h2>
          <p>Moira is a piece created to blend
            <br> the of a queen, with a decaying
            <br> bride. These styles are combined to
            <br> form this beautiful piece. </p>
        </div>
        <div class="product-price-btn">
          <p><span>$46.00</span></p>
          <button type="button">Buy Now</button>
        </div>
      </div>
    </div>
  
  </body>
  
  </html>