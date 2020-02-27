<?php
    require 'db.php';
    $message = '';
if(isset($_POST['name']) && isset($_POST['lastname']) &&  isset($_POST['adress']) && isset($_POST['pass'])&& isset($_POST['sex'])&& isset($_POST['username'])){
           $name  = $_POST['name'];
           $lastname = $_POST['lastname'];
           $user = $_POST['username'];
           $pass = $_POST['pass'];
           $sex = $_POST['sex'];
           $adress = $_POST['adress'];
           
$sql = 'INSERT INTO customer(c_name,c_lastname,c_address,c_sex,username,password) values(:name,:lastname,:adress,:sex,:user,:pass)';
$statment = $connection->prepare($sql);
if($statment->execute([':name'=> $name,':lastname'=>$lastname,':adress'=>$adress,':sex'=>$sex,':user'=>$user,':pass'=>$pass])) {
    $message = "ลงทะเบียนสำเร็จ";
    sleep(2);
}else{
    echo "ERRO";
}
}
?>


<?php require 'header.php'; ?>

</div>


    <div class="container ">
        <div class="card mt-5" >
            <div class="card-header">
                <h2><b>สร้างบัญชีใหม่</b></h2>
            </div>
            <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
                <form name = "signin"  method="post">

                <div class="form-group">
                    <!-- ชื่อ -->
                     <input type="text" name= "name" id="name" class = "cc" placeholder ="ชื่อ" required> 
                     </div>

                     <div class="form-group">
                    <!-- นามสกุล -->
                     <input type="text" name= "lastname" id="lastname" class = "form-control" placeholder ="นามสกุล" required> 
                     </div>
                        <div class="form-group">
                        <!-- username -->
                        <input type="text" name="username" id="username" class = "form-control" placeholder ="Username" required>
                    </div>
                     <div class="form-group">
                    <!-- pasword -->
                     <input type="password" name= "pass" id="pass" class = "form-control" placeholder ="Password" required>
                     </div> 
                     <div class="form-group">
                    <!-- adress -->
                     <input type="text" name= "adress" id="adress" class = "form-control" placeholder ="ที่อยู่" required>
                     </div> 

                     <div>
                     <label for="sex"><h3>เพศ</h3></label>
                     </div>
                     <div class="form-check">

                         <input class="form-check-input" type="radio" name="sex" id="exampleRadios1" value="ชาย" checked required>
                         <label class="form-check-label" for="exampleRadios1">ชาย</label> &nbsp; &nbsp; &nbsp; 

                         <input class="form-check-input" type="radio" name="sex" id="exampleRadios2" value="หญิง" required>
                         <label class="form-check-label" for="exampleRadios1">หญิง</label>
                    </div>
                     <div class="form-group">
                        <button type ="submit" class="btn btn-info">สมัคร</button>
                     </div>

                </form>
            
            </div>       
       </div>
                
    </div>
<?php require 'footer.php';?>