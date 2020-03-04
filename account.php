<?php
    require 'header2.php';
    require 'config/db.php';
    $id =  $_SESSION["id"];
    $sql = 'SELECT * FROM customer where c_id =:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id'=> $id]);
    $person = $statement->fetch(PDO::FETCH_OBJ);  
    $message = '';
   
    if(isset ($_POST['name']) && isset($_POST['lastname']) && isset ($_POST['email'])&& isset ($_POST['pass'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $sql = "UPDATE customer set c_name=:name ,c_email=:email,c_lastname=:lastname ,c_password=:pass WHERE c_id=:id ";
        $statement = $connection->prepare($sql);
        if($statement->execute([':name'=> $name,':email'=> $email,':lastname'=> $lastname,':id' => $id,':pass'=>$pass])){
            $message = 'แก้ไขข้อมูลสำเร็จ';
            header("refresh:2;account.php"); 
        }
    }
?>
<br>

        <div>

            <title>Account</title>
            <link rel="stylesheet" href="style.css">
        
            <div class="container mt-5">
                <div class="card">
                    <div class="card-haeder">
                   <h2>บัญชีผู้ใช้</h2>
                    </div>
                    <div class="card-body">
                        
                    <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
                 <?php endif; ?>

                    <form name = "signin"  method="post">
                        <div class="form-group">
                            <label for=""><h3>ชื่อ</h3></label>
                            <input type="text" name ="name" class = "form-control" value="<?= $person->c_name;?>" >
                        </div>
                        <div class="form-group">
                            <label for=""><h3>นามสกุล</h3></label>
                            <input type="text" name ="lastname" class = "form-control" value="<?= $person->c_lastname;?>">
                        </div>
                        <div class="form-group">
                            <label for=""><h3>Email</h3></label>
                            <input type="email" name ="email" class = "form-control"value="<?= $person->c_email;?>">
                        </div>
                        
                        <div class="form-group">
                            <label for=""><h3>Passworld</h3></label>
                            <input type="password" name ="pass" class = "form-control"value="<?= $person->c_password;?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name ="update"  value="แก้ไขข้อมูลส่วนตัว">
                        </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
<?php require 'footer.php';?>