<?php
    require 'db.php';
    $message = '';
if(isset($_POST['name']) && isset($_POST['lastname']) &&  isset($_POST['email']) && isset($_POST['pass'])){
           $name  = $_POST['name'];
           $lastname = $_POST['lastname'];
           $email = $_POST['email'];
           $pass = $_POST['pass'];
   
$sql = 'INSERT INTO people(name,email,lasname,password) values(:name, :email,:lastname,:pass)';
$statment = $connection->prepare($sql);

if($statment->execute([':name'=> $name,':email'=> $email, ':lastname'=>$lastname , ':pass'=>$pass] ) ){
        
    $message = "ลงทะเบียนสำเร็จ";
}else{
    echo "ERRO";
}
}
?>

    
<?php require 'header.php';?> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">E-Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    
    <form method ="get" action = "index.php">
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="อีเมลหรือโทรศัพท์" name ="user" >
      <input class="form-control mr-sm-2" type="password" placeholder="รหัสผ่าน"  name = "pass">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">เข้าสู้ระบบ</button>
        </div>
    </form>
  </div>
</nav>
    <div class="container">
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

                <form  method="post">

                <div class="form-group">
                  
                     <input type="text" name= "name" id="name" class = "form-control" placeholder ="ชื่อ"> 
                     </div>

                     <div class="form-group">
                   
                     <input type="text" name= "lastname" id="lastname" class = "form-control" placeholder ="นามสกุล"> 
                     </div>

                        <div class="form-group">
                        
                        <input type="text" name="email" id="email" class = "form-control" placeholder ="หมายเลขโทรศัพท์หรืออีเมล">
                    </div>

                  
                     <div class="form-group">
                   
                     <input type="password" name= "pass" id="pass" class = "form-control" placeholder ="รหัสผ่าน">
                     </div> 

                     <div class="form-group">
                        <button type ="submit" class="btn btn-info">ลงทะเบียน</button>
                     </div>

                </form>
            
            </div>       
       </div>
                
    </div>
    
<?php require 'footer.php';?>