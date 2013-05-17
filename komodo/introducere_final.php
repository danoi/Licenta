
<html>  
<head>  
</head>  
<body>

<?php

	
	include "config.php";
      $numel= $_POST['numel'];
      $data1=$_POST['data1'];
       $data2=$_POST['data2'];
       $durata=(strtotime("$data2") - strtotime("$data1")) / (60 * 60 * 24);
      $codm=$_GET['id'];
	$order = "Insert into licitatia.licitatie (codm,nume_licitatie,data_inc,data_term,durata) values ('".$_GET['id']."',
        '$numel','$data1','$data2','$durata')";
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