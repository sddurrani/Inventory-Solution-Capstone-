<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<title> </title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<head>
<script src="javascript.js"></script>
</head>

<div class="sidebar">
  <a href="http://localhost:8080/index.html"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="http://localhost:8080/scan.html"><i class='fas fa-barcode'></i> Scan</a>
  <a href="http://localhost:8080/create.html"><i class="fas fa-database"></i> Create Item</a>
  <a href="http://localhost:8080/delete.html"><i class="far fa-trash-alt"></i> Delete Item</a>
  <a href="http://localhost:8080/inventory.html"><i class='far fa-list-alt'></i> Inventory</a>
  <a href="http://localhost:8080/in.html"><i class="far fa-check-circle"></i> Check In</a>
  <a href="http://localhost:8080/out.html"><i class="fas fa-check-circle"></i> Check Out</a>
  <a href="JavaScript:window.close()"><i class="far fa-window-close"></i> Quit</a>
</div>



<div class="container">
<h2>Item has been created</h2>

	<?php	
			function displaymessage($fieldname)
			{
				echo "Please enter \"$fieldname\"<br />";
			}
			
			function validatedate($data, $fieldname)
			{
				if(empty($data))
				{
					displaymessage($fieldname);
					$output="";
				}
				
				else
				{
					$output=trim($data);
					$output=stripcslashes($output);
				}
				
				return($output);
			}
			$equipment=validatedate($_POST['new'], "Equipment Data");
			$barcode=validatedate($_POST['barcode'], "Barcode Data");
			$qty=validatedate($_POST['qty'], "Quantity Data");
			
		if(empty($equipment)||empty($barcode)||empty($qty))
		{
			echo "";
		}
		else{
			
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db\imm.db');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO barcode (barcode,e_name,quantity)
      VALUES ('$barcode', '$equipment', '$qty');


EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      //echo "Records created successfully\n";
	  
	 
	    $sql =<<<EOF
      SELECT * from barcode WHERE barcode='$barcode';
EOF;

   $ret = $db->query($sql);
   
   $firstRow = true;
   echo '<div class="table-responsive"><table class="table">';
   $barcodename = "Barcode";
   $equipmentname = "Equipment";
   $quantityname = "Quantity";
   
   
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    if ($firstRow) {
        echo '<thead><tr>';
        foreach ($row as $key => $value) {
            echo '<th>'.$barcodename.'</th>';
			break;
        }
		foreach ($row as $key => $value) {
            echo '<th>'.$equipmentname.'</th>';
			break;
        }
		foreach ($row as $key => $value) {
            echo '<th>'.$quantityname.'</th>';
			break;
        }
        echo '</tr></thead>';
        echo '<tbody>';
        $firstRow = false;
    }

    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>'.$value.'</td>';
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table></div>';

    $sql =<<<EOF
      SELECT * from barcode;
EOF;
echo '<br />';

   $ret = $db->query($sql);
  
   }
   $db->close();

		}

?>


	
</div>

</html>