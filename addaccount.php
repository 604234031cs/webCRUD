<?php require 'header2.php'; ?>
<?php 
    require 'config/db.php';
    $message='';
    $id = $_SESSION['id'];
    $sql='SELECT * from account';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $person = $statement->fetch(PDO::FETCH_OBJ);

        if(isset($_POST['aid']) && isset($_POST['aname'])){
            $aid = $_POST['aid'];
            $aname = $_POST['aname'];
        $sql = 'INSERT INTO account(a_id,a_name,c_id) values(:aid,:aname,:id)';
        $statment = $connection->prepare($sql);
            if($statment->execute([':aid'=>$aid,':aname'=>$aname,':id'=>$_SESSION['id']])){
            $message = 'เพิ่มข้อมูลสำเร็จ';
            header("refresh:2;addaccount.php"); 

            }
        }

    
      
    ?>

<br>
<div>
    <title>Bank</title>
    <link rel="stylesheet" href="style.css">
    <div class="container mt-5">
        <div class="card ">
            <div class="card-header">
            <h2>เพิ่มบัญชี</h2>
            </div>
        </div>

        
        <div class="card-body">
        <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
          <label for="">รหัสผู้ใช้</label>
          <input type="text" name="cid" value="<?php echo $_SESSION['id']; ?>" readonly><br>

            <label >หมายเลขบัญชี</label>
            <input type="text" name="aid" id="" required> <br>
        
            <label >ชื่อบัญชี</label>
            <input type="text" name="aname" id="" required >
            <input type="submit" id="" value="เพิ่มบัญชี" required>
            </form>
        </div>
    </div>
</div>

