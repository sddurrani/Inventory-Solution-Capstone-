<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<title> </title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">

<head>
</head>

<body>
</body>

<div class="sidebar">
  <a href="http://localhost:8080/index.html"> Home</a>
  <a href="http://localhost:8080/scan.html"> Scan</a>
  <a href="http://localhost:8080/create.html"> Create Item</a>
  <a href="http://localhost:8080/delete.html"> Delete Item</a>
  <a href="http://localhost:8080/inventory.php"> Inventory</a>
  <a href="http://localhost:8080/in.html"> Check In</a>
  <a href="http://localhost:8080/out.html"> Check Out</a>
  <a href="JavaScript:window.close()">Quit</a>
</div>

<div class="main">
<h2>Delete Item</h2>





	<?php	
			function displaymessage($fieldname)
			{
				echo "Please enter \"$fieldname\".<br />";
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
		//$equipment=validatedate($_POST['new'], "Equipment");
			$barcode=validatedate($_POST['barcode'], "Barcode");
			$qty=validatedate($_POST['qty'], "quantity");
			
		if(empty($barcode)||empty($qty))
		{
			echo "data";
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
      DELETE FROM barcode WHERE barcode='$barcode';
      


EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      //echo "Records created successfully\n";
	  
	  echo "You just Deleted";echo '<br />';
	    $sql =<<<EOF
      SELECT * from barcode WHERE barcode='$barcode';
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "Barcode = ". $row['barcode'] . "\n";
      echo "Equipment = ". $row['e_name'] ."\n";
      echo "Qunatity = ". $row['quantity'] ."\n";
   }
   
    $sql =<<<EOF
      SELECT * from barcode;
EOF;
echo '<br />';


echo '<br />';echo "All the equipment Available";echo '<br />';
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "Barcode = ". $row['barcode'] . "\n";
      echo "Equipment = ". $row['e_name'] ."\n";
      echo "Qunatity = ". $row['quantity'] ."\n";
	  echo '<br />';
   }
   
	  
   }
   $db->close();

		}

?>


	
</div>

</html>