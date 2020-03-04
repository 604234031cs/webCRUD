
<!-- testjoin -->
<?php 
    require 'config/db.php'; 

        $sql = 'SELECT c.c_name, c.c_lastname,a.a_id,a.a_name
                FROM customer c ,account a
                where c.c_id = a.c_id';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $person = $statement->fetch(PDO::FETCH_OBJ);  
?>

<div>
    <?php echo $person->c_name; ?>
    <?php echo $person->c_lastname; ?>
    <?php echo $person->a_id; ?>

</div>

