


<html>
	<head>
	<title>Form Edit Data</title>
	</head>
	 
	<body>
         
          
	     
	        <?php
	      include "config.php";//database connection
	      $order = "SELECT * FROM licitatia.produs
	where produs.codm='".$_GET['id']."'";
	      $result = mysql_query($order);
	      $row = mysql_fetch_array($result);
               echo'
	       <form method="post" action="edit_final.php?id='.$row['codm'].'">
	<table border=1>
	  <tr>
	    <td align=center>Form Edit Employees Data</td>	  </tr>
	  <tr>
	    <td>
	      <table>
	      <input type="hidden" name="id" value="'.$row['codm'].'">
	        <tr>       
	          <td>Marca</td>
	          <td>
	            <input type="text" name="marca" size="20" value='.$row['marca'].'>
	          </td>
	        </tr>
	        <tr>
                    <td>Descriere</td>
	          <td>
	            <input type="text" name="descriere" size="40" value='.$row['descriere'].'></td>
	        </tr>
	        <tr>
	          <td align="right">
	            <input type="submit" name="submit value" value="Edit">
	          </td>
	        </tr>
	    
	      </table>
	    </td>
	  </tr>
	</table>
          </form>';
            ?>
	</body>
	</html>
