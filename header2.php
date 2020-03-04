<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="sidebar.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
  </head>
  <body>
      <div class="sidebar">
        <a href="home.php"><header> <?php echo $_SESSION['name'] ."  ".$_SESSION["lastname"]; ?>  </header> </a>
        <ul>
        <li class="nav-item dropdown">
            <a href="account.php" class="dropdown-toggle" data-toggle="dropdown">บัญชีผู้ใช้</a>
            <div class="dropdown-menu">
        <a class="dropdown-item" href="useraccount.php">บัญชีธนาคาร</a>
        <a class="dropdown-item" href="account.php">บัญชีผู้ใช้</a>
        <a class="dropdown-item" href="addaccount.php">เพิ่มบัญชี</a>
      </div> 
            
      </li>


     

        <!-- <li>
              <a href="addaccount.php">บัญชีธนาคาร</a>
            </li>
           -->
        

      
          <li>
            <a href="withdraw.php">ฝาก-ถอน</a>
          </li>
          
          <li>
            <a href="#">เงินกู้  </a>
          </li>
            <a href="config/checklogin.php">ออกจากระบบ</a>
          </li>
        </ul>
      </div>

  <section>
  
  </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>