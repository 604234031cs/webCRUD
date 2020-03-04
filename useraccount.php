<?php require 'header2.php'; ?>
<?php 
    require 'config/db.php'; 
    $sql = 'SELECT c.c_name, c.c_lastname,a.a_id,a.a_money
    FROM customer c ,account a
    where c.c_id = a.c_id';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $person = $statement->fetch(PDO::FETCH_OBJ);   

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