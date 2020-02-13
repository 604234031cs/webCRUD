<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.php" class="logo">Hotel</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="admin.php"><span class="fa fa-home mr-3"></span> การจัดการห้องพัก</a>
	          </li>
            
	          <li >
	              <a href="data_customer.php"><span class="fa fa-user mr-3"></span> การจัดการข้อมูลลูกค้า</a>
	          </li>
	          <li>
              <a href="data_employee.php"><span class="fa fa-briefcase mr-3"></span> การจัดการข้อมูลพนักงาน</a>
	          </li>
	          <li>
              <a href="data_checkroom.php"><span class="fa fa-suitcase mr-3"></span> ตรวจสอบการจอง</a>
	          </li>
	           <li>
				<a href="../index.php"><span class="fa fa-paper-plane mr-3"></span> Logout</a>
				</li>
	        </ul>

	        

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
		<div class="d-flex justify-content-end mb-2">
                <a href="form_room.php" class="btn btn-success">เพิ่มข้อมูลห้องพัก</a>
    	</div>
	
      <form name="frmSearch" method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
		<input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
		<input type="submit" value="Search">
	</form><br>

	  <?php
    
    if(isset($_POST["txtKeyword"]))
		{
			$strKeyword = $_POST["txtKeyword"];
		}



		    

    $sql = "SELECT * FROM room
    WHERE rm_no LIKE '%".$strKeyword."%'";

    if($result = $conn ->query($sql))
    {
        if($result->num_rows > 0)
        {
            echo "<table class='table table-bordered'>";
            echo "<tr>";
                echo "<th>เลขห้อง</th>";
                echo "<th>ประเภทห้อง</th>";
                echo "<th>ราคาห้องพัก</th>";
                echo "<th>สถานะ</th>";
                echo "<th>ชั้น</th>";
                echo "<th>แก้ไขข้อมูล</th>";
                echo "<th>ลบข้อมูล</th>";

            echo "</tr>";
        while($row = $result->fetch_array())
            {
                    
                        echo "<tr>";
                        echo "<td>" . $row['rm_no'] . "</td>";
                        echo "<td>" . $row['rm_type'] . "</td>";
                        echo "<td>" . $row['rm_rate'] . "</td>";
                        echo "<td>" . $row['rm_status'] . "</td>";
                        echo "<td>" . $row['rm_floor'] . "</td>";
                        echo "<td style='text-align:center'>
                                <a href='config/Edit_customer.php?uid=$row[rm_id]'>
                                    <i class='fa fa-edit pointer'  >
                                    </i> 
                                </a>
                               </td>";
                        
                        echo "<td style='text-align:center'>
                                    <a href='config/Delete_room.php?uid=$row[rm_id]' onclick=\"return confirm('คุณแน่ใจที่จะลบข้อมูลนี้หรือไม่ !!!')\">
                                        <i class='fa fa-trash pointer style='color:green' '  ></i>
                                    </a>
                                    </td>";
                   
            }
                    echo "</table>";
                    // Free result set
                    $result->free();
        }
    
    } ?>
        
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>