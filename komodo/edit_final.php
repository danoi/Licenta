
<html>  
<head>  
</head>  
<body>

<?php

	
	include "config.php";
      $marca= $_POST['marca'];
      $descriere=$_POST['descriere'];
      $codm=$_GET['id'];
	$order = "UPDATE licitatia.produs
	          SET produs.marca='$marca', produs.descriere='$descriere'
	          WHERE
	          produs.codm='".$_GET['id']."' ";
	$objQuery = mysql_query($order);  
if($objQuery)  
{  
echo "Save completed.";  
}  
else  
{  
echo "Error Save [".$order."]";  
} 
        ?>
        
        </body>  
</html>