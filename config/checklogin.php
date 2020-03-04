<?php require 'db.php';
    session_start();
    if(isset($_GET['user']) && isset($_GET['pass'])){
        $user = $_GET['user'];
        $pass = $_GET['pass'];

        $sql = "SELECT * FROM customer WHERE c_email = :user and c_password = :pass";
        $statement = $connection->prepare($sql);

        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', $pass);
        $statement->execute();

        $people = $statement->fetch(PDO::FETCH_ASSOC);
       
        if($people ===false){
           echo "<script>";
           echo "alert('รหัสผิด')";
            echo "</script>";
           header("refresh:1;../index.php"); 

        }else{
            $_SESSION["id"] = $people['c_id'];
            $_SESSION["name"] = $people['c_name'];
            $_SESSION["lastname"] = $people['c_lastname'];
            $_SESSION["email"] = $people['c_email'];
            $_SESSION["sex"] = $people['c_sex'];
           header('Location:../home.php');
        }
       
    }else{
        session_destroy();
        header('Location:../index.php');
    }
   
    ?>




 
 

 