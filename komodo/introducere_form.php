


<html>
	<head>
	<title>Form Introducere</title>
	</head>
	 
	<body>
         
          
	     
	        <?php
	      include "config.php";//database connection
	      $order = "SELECT * FROM licitatia.produs
	where produs.codm='".$_GET['id']."'";
	      $result = mysql_query($order);
	      $row = mysql_fetch_array($result);
               echo'
	       <form method="post" action="introducere_final.php?id='.$row['codm'].'">
	<table border=1>
	  <tr>
	    <td align=center>Form Edit Employees Data</td>	  </tr>
	  <tr>
	    <td>
	      <table>
	      <input type="hidden" name="id" value="'.$row['codm'].'">
	         <tr>       
	          <td>Nume licitatie</td>
	          <td>
	            <input type="text" name="numel" size="20" >
	          </td>
	        </tr>
                <tr>       
	          <td>Data  de Inceput</td>
	          <td>
	            <input type="text" name="data1" size="20" >
	          </td>
	        </tr>
	        <tr>
                    <td>Data de sfarsit</td>
	          <td>
	            <input type="text" name="data2" size="40" ></td>
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