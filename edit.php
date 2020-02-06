<?php
    require 'db.php';
    $id = $_GET['id'];
    $sql = 'SELECT * FROM people where id =:id';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $person = $statement->fetch(PDO::FETCH_OBJ);  
    
    if(isset ($_POST['name']) && isset($_POST['lastname']) && isset ($_POST['email'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $sql = "INSERT into people(name ,email,lasname) values(:name,:email,:lastname)";
        $statement = $connection->prepare($sql);
        if($statement->execute([':name'=>$name,':email'=>$email,':lastname'=>$lastname])){
            $message = 'Pass';
        }
    }
?>