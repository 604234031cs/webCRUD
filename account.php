<?php  require 'header2.php'; ?>
<?php 
    require 'db.php';
    $id = $_SESSION['id'];
    $message = "";
    $sql = "SELECT * FROM customer where c_id=:id";
    $statment=$connection->prepare($sql);
    $statment->execute([':id'=>$id]);
    $person = $statment->fetch(PDO::FETCH_OBJ); 

    if(isset($_POST['name'])&& isset($_POST['lastname'])&& isset($_POST['address'])&& isset($_POST['password'])){
        $e_name = $_POST['name'];
        $e_lastname = $_POST['lastname'];
        $e_address = $_POST['address'];
        $e_pass = $_POST['password'];
        
        echo $e_name;
        echo $e_lastname;
        echo $e_address;
        echo $e_pass;

        // $sql = "UPDATE customer set c_name=:name,c_lastname=:lastname,password=:pass WHERE c_id=:id ";
        // $stmstatment = $connection->prepare($sql);
        // if($statment->execute([':name'=>$e_name,':lastname'=>$e_lastname,':pass'=>$e_pass,':id'=>$id])){
        //     $message = 'Pass';
        // }else{
        //     $message = 'Error';
        // }
    }
?>
<div>
    <link rel="stylesheet" href="style.css">
</div>
<br>
<br>

<div class="container ">
    <div class="card">
    <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            
   <div class="card-header">
   <h1>บัญชีผู้ใช้</h1>
   </div>
   
    <div class="card-body">

        <form medthod="post">

            <div class="form-group">
            <label for="">ชื่อ</label>
            <input type="text" name ="name" class="form-control" value='<?=$person->c_name?>' require>
            </div>

            <div class="form-group">
            <label for="">นามสกุล</label>
            <input type="text" name ="lastname" class="form-control" value='<?=$person->c_lastname?>'require>
            </div>

            <div class="form-group">
            <label for="">ที่อยู่</label>
            <input type="text" name ="address" class="form-control" value='<?=$person->c_address?>'require>
            </div>

            <div class="form-group">
            <label for="">เพศ</label>
                 <input type="text" name ="sex" class="form-control" value='<?=$person->c_sex?>' readonly>
               </div>
            <div class="form-group">
            <label for="">Password</label>
                 <input type="password" name ="pass" class="form-control" value='<?=$person->password?>'>
               </div>

               <div class="form-group"> 
               <button type ="submit" class="btn btn-primary btn-lg btn-block">แก้ไข</button>
            </div>

        </form>
    </div>
    </div>
</div>
