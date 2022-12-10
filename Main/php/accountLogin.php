<?php
    // START SESSION

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

    // CONFIRMATION PAGE CODE

    $currentForm = "";

    try
    {
        if (isset($_SESSION["formID"]))
        {
            $currentForm = $_SESSION["formID"];
        }
    }
    catch(Exception $e)
    {
        echo ("ERROR: " . $e . "<br />");
    }
?>

<!DOCTYPE html>
<html>

  <meta charset="utf-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
  <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
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


<section>
  <body>
    <div class="wrapper">
      
       <div class="title-text">
       </div>

       <div class="form-container">

          <div class="slide-controls">
             <input type="radio" name="slide" id="login" checked>
             <input type="radio" name="slide" id="signup">
             <label for="login" class="slide login">Login</label>
             <label for="signup" class="slide signup">Sign Up</label>
             <div class="slider-tab"></div>
          </div>

          <div class="form-inner">

             <form action="#" class="login">
                <div class="field">
                   <input type="text" placeholder="Email Address" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Password" required>
                </div>
                <div class="field btn">
                   <div class="btn-layer"></div>
                   <input type="submit" value="Login">
                </div>
                <div class="signup-link">
                   Dont have an account? <a href="">Sign Up</a>
                </div>
             </form>

             <form action="#" class="signup">

                <div class="field">
                   <input type="text" placeholder="Email Address" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Password" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Confirm Password" required>
                </div>
                <div class="field btn">
                   <div class="btn-layer"></div>
                   <input type="submit" value="Sign Up">
                </div>
             </form>


          </div>
       </div>
    </div>


 </body>
</section>

<script src = "../js/login.js">
</script>

  </body>
</html>

