<?php

     require 'db.php';
     $sql = 'SELECT * FROM customer';
     $statement = $connection->prepare($sql);
     $statement->execute();
     $people = $statement->fetchAll(PDO::FETCH_OBJ);
 
?>

<?php
     require 'header2.php';
?>

<div class ="container">
<br>
<br>
     <div class ="card ">
          <div class ="card-header">
          <h2>All people</h2>
          </div>
     </div>
     <div class ="card-body">
          <table class = "table table-bordered">
               <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lastname</th>
                    <th>Adress</th>
                    <th>Action</th>
               </tr>
               <?php foreach($people as $person): ?>
               <tr>
                    <td><?= $person->c_id ;?></td>
                    <td><?= $person->c_name ;?></td>
                    <td><?= $person->c_lastname ;?></td>
                    <td><?= $person->c_address;?></td>
                    <td>
                         <a href="edit.php?id=<?= $person->id ?>" class ="btn btn-info">Edit</a>
                         <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
               </tr>
               <?php endforeach; ?>
          </table>
     </div>
</div>



<?php require 'footer.php' ?>    