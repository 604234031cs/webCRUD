<?php require 'db.php';
    session_start();
    if(isset($_GET['user']) && isset($_GET['pass'])){
        $user = $_GET['user'];
        $pass = $_GET['pass'];

        $sql = "SELECT * FROM customer WHERE username = :user and password = :pass";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', $pass);
        $statement->execute();

        $people = $statement->fetch(PDO::FETCH_ASSOC);
       
        if($people ===false){
           echo "<script>";
           echo "alert('รหัสผิด')";
            echo "</script>";
           header("refresh:1;index.php"); 

        }else{
            $_SESSION["id"] = $people['c_id'];
            $_SESSION["name"] = $people['c_name'];
            $_SESSION["lasname"] = $people['c_lastname'];
            $_SESSION["adress"] = $people['c_adress'];
            $_SESSION["sex"] = $people['sex'];

           header('Location:home.php');
        }
       
    }else{
        session_destroy();
        header('Location:index.php');
    }
   
    ?>




 
 

 