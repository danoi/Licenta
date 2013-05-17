<?php
if(isset($_GET['SUBMIT'])){
    mysql_connect("localhost","root","root")or die ("nu se poate conecta");
		mysql_select_db("licitatia") or die("nu se poate conecta la bd");
			$marca=$_GET['marca'];
			$tipm=$_GET['tipm'];
			$tipc=$_GET['tipc'];
			$an=$_GET['an'];

$query="select *  from produs where marca='$marca' and tip_masina='$tipm' and tip_combustibil='$tipc' and an_inreg='$an' ";
			$result=mysql_query($query) or die(mysql_error());
		mysql_close();
			
			
			





echo "<table>
                <tbody>
                    <tr>
                        <th >
                            Marca si Model</th>
                        <th >Kilometraj</th>
                        <th >Timp disponibil</th>
                        <th >Ultima suma</th>
                        <th >Numar licitatori</th>
                        <th ></th>
                    </tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['marca'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
}


?> 