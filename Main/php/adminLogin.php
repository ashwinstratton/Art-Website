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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
  <link rel="stylesheet" href="../css/adminstyle.css">
  <link rel="stylesheet" href="../css/login.css">
</head>



<section>
  <body>
    <div class="wrapper">
      
       <div class="title-text">
       </div>

       <div class="form-container">


          <div class="form-inner">

             <form action="adminHome.html" class="login">
                <div class="field">
                   <input type="text" placeholder="Username" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Password" required>
                </div>
                <div class="field btn">
                   <div class="btn-layer"></div>
                   <input type="submit" value="Login">
                </div>
             </form>


          </div>
       </div>
    </div>


 </body>
</section>
</html>