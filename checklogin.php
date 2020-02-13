<?php require 'db.php';
    session_start();
    if(isset($_GET['user']) && isset($_GET['pass'])){
        $user = $_GET['user'];
        $pass = $_GET['pass'];

        $sql = "SELECT * FROM people WHERE email = :user and password = :pass";
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
            $_SESSION["name"] = $people['name'];
           header('Location:home.php');
        }
       
    }else{
        echo "ERROR";
    }
   

    ?>




 
 

 