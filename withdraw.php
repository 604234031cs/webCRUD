<?php require 'header2.php'; ?>
<?php 
    require 'config/db.php'; 
    $sql = 'SELECT c.c_name, c.c_lastname,a.a_id,a.a_money
    FROM customer c ,account a
    where c.c_id = a.c_id';
    $message = '';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $person = $statement->fetch(PDO::FETCH_OBJ);
    $amoney = $person->a_money;
    $aid= $person->a_id;

    //funtionWithdraw
    if(isset($_POST['withdraw'])){
    $withdrawM = $_POST['money'];
    if($amoney<$withdrawM){
        //ถอนไม่ได้
        $message = "จำนวนเงินในบัญชีไม่พอ";
    }elseif ($amoney>=$withdrawM) {
        //ถอนได้
        $number = $amoney - $withdrawM;

        $sql="UPDATE account set a_money=:number where a_id=:aid";
        $statement = $connection->prepare($sql);
        if( $statement->execute([':number'=>$number,':aid'=>$aid])){
                $message = "ถอนสำเร็จ";
                header("refresh:2;withdraw.php"); 
        }else{
            $message = "เกิดข้อผิดพลาดในการดำเนินการ";
        }
    }
}
//funtionDeposit
if(isset($_POST['deposit'])){
    $deposit = $_POST['money'];
    $number = $amoney + $deposit;
    $sql="UPDATE account set a_money=:number where a_id=:aid";
    $statement = $connection->prepare($sql);
    if( $statement->execute([':number'=>$number,':aid'=>$aid])){
        $message = "ฝากสำเร็จ";
        header("refresh:2;withdraw.php"); 
    }else{
        $message = "เกิดข้อผิดพลาดในการดำเนินการ";
    }

}

    
?> 


<br>
<div>
    <title>customeraccount</title>
    <link rel="stylesheet" href="style.css">
        <div class="container mt-5" >
            <div class="card">
               <div class="card-header">
                    <label for="">บัญชีเงินฝาก</label>
               </div>
               <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
               <div class="card-body">
                    <h5><b>ชื่อบัญชี</b></h5>
                    <label > <?php echo $person->c_name ?>  <?php echo $person->c_lastname ?> </label>
                    <h5><b>หมายเลขบัญชี</b></h5>
                    <label > <?php echo $person->a_id ?></label>
                    <h5><b>ยอดเงินคงเหลือ</b></h5>
                    <label > <?php echo $person->a_money ?> บาท</label>
               </div>
            </div>
        </div>
</div>
ิ<br>
<div>
    <div class="container">
        <form method ="post">
            <label for="">ระบุจำนวนเงิน</label>
            <input type="text" name ="money" pattern =[0-9] title="กรุณาใส่ตัวเลขจำนวนเงิน">
            <label for="">บาท</label>
            <input type="submit" value='ฝาก' name="deposit">
            <input type="submit" value='ถอน' name="withdraw">
        </form>
    </div>
</div>


