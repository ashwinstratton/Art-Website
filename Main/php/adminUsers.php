<?php
    session_start();

    // SET UP DATABASE CONNECTION

    $UserID = array();
    $UserName = array();
    $UserPassword = array();
    $UserType = array();

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

    try
    {
      $lastID = 0;
      $result = NULL;
      $numRows = 0;

      $sql = $conn->prepare("select * from user");

      $sql->execute();

      $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
      $result = $sql->fetchAll();
      
      for($i = 0; $i < sizeof($result); $i++)
      {
        $row = $result[$i];
        $UserID[$i] = $row["UserID"];
        $UserName[$i] = $row["UserName"];
        $UserPassword[$i] = $row["Password"];
        $UserType[$i] = $row["UserType"];
      }
    }
    catch(PDOException $e)
    {
      echo "Select Error: " . $e->getMessage();
    }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>


<body>
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Admin Portal</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="adminHome.html">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="adminUsers.html">
         <i class='bx bx-user' ></i>
         <span class="links_name">Users</span>
       </a>
       <span class="tooltip">Users</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Products</span>
       </a>
       <span class="tooltip">Products</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt'></i>
         <span class="links_name">Orders</span>
       </a>
       <span class="tooltip">Orders</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Settings</span>
       </a>
       <span class="tooltip">Settings</span>
     </li>


     <li class="profile">
         <div class="profile-details">
           <div class="name_job">
             <div class="name">'Admin Username'</div>
             <div class="job">Website Manager</div>
           </div>
          </div>
          <a href="homePage.html"><i class="bx bx-log-out" id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">Users</div>

      
      <div class="container">
        <table>
          <thead>
            <tr>
              <th>UserID</th>
              <th>Username</th>
              <th>Password</th>
              <th>User Type</th>
            </tr>
          </thead>
          <tbody>
          <?php
            for($j = 0; $j < sizeof($UserID); $j++)
            {
              echo "
            <tr>
              <td>".$UserID[$j]."</td>
              <td>".$UserName[$j]."</td>
              <td>".$UserPassword[$j]."</td>
              <td>".$UserType[$j]."</td>
            </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
  </section>






  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>
