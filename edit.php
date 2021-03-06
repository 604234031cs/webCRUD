<?php
    require 'db.php';
    $id = $_GET['id'];
    $sql = 'SELECT * FROM customer where c_id =:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id'=> $id]);
    $person = $statement->fetch(PDO::FETCH_OBJ);  
    
    if(isset ($_POST['name']) && isset($_POST['lastname']) && isset ($_POST['email'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        
        $sql = "UPDATE customer set c_name=:name ,c_email=:email,c_lastname=:lastname WHERE c_id=:id ";
        $statement = $connection->prepare($sql);
        if($statement->execute([':name'=> $name,':email'=> $email,':lastname'=> $lastname,':id' => $id])){
            $message = 'Pass';
        }
    }
?>

    
<?php require 'header2.php';?> 

    <div class="container">
    <br>
    <br>
        <div class="card " >
            <div class="card-header">
                <h2><b>Update person</b></h2>
            </div>
            <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

                <form  method="post">

                <div class="form-group">
                  
                     <input  type="text" value = "<?=$person->c_name; ?>" name= "name" id="name" class = "form-control" placeholder ="ชื่อ"> 
                     </div>

                     <div class="form-group">
                   
                     <input   type="text" value = "<?=$person->c_lastname; ?>" name= "lastname" id="lastname" class = "form-control" placeholder ="นามสกุล"> 
                     </div>

                        <div class="form-group">
                        
                        <input type="email" value = "<?=$person->c_email; ?>"  name="email" id="email" class = "form-control" placeholder ="หมายเลขโทรศัพท์หรืออีเมล">
                    </div>
 

                     <div class="form-group">
                        <button type ="submit" class="btn btn-info">แก้ไข</button>
                     </div>

                </form>
            
            </div>       
       </div>
                
    </div>
    
<?php require 'footer.php';?>