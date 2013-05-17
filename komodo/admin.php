<?php
require_once 'config.php';

	
	
	  function toti_clientii(){

    $query="Select client.codc,client.nume,client.prenume,client.adresa,client.data_nasterii,client.telefon,
    client.email,client.user from licitatia.client";
	$rezultat = mysql_query($query);
	if(mysql_num_rows($rezultat) > 0) {
		 
		echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Nume</th><th>Prenume</th><th>Adresa</th><th>Anul Nasterii</th>
		<th>Telefon</th><th>Email</th><th>User</th><th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
  
  echo '
     
      <div style=" float:right; width:700px;">
      <form action="conditii.php " method="get">
<table >
	<tbody>
		 <tr>
			<td><input type="text" style="width:60px;" value="'.$rand['nume'].'"></td>
                        <td id="left"><input type="text" style="width:50px;" value="'.$rand['prenume'].'">  </td>
			<td id="left"><input type="text" style="width:50px;" value="'.$rand['adresa'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['data_nasterii'].'"> </td>
			<td id="left"> <input type="text" style="width:90px;" value="'.$rand['telefon'].'"> </td>
			<td id="left"><input type="text" style="width:120px;" value="'.$rand['email'].'"> </td>
			<td id="left"> <input type="text" name="user" style="width:50px;" value="'.$rand['user'].'"></td>
			<td id="left"> <input id="'.$rand['codc'].'" class="delete" type="button" value="Delete"</td>
                </tr>
        </tbody>
</table></form></div>';
  
	}   
} else { echo'NU sunt clienti inregistrati';}
}
 	

function clienti_participanti(){
    $query="Select client.nume,client.prenume,client.adresa,client.data_nasterii,client.telefon,
    client.email,client.user,licitatie.nume_licitatie from licitatia.client,licitatia.licitatie,licitatia.legaturi,licitatia.produs,licitatia.vanzare
    where client.codc=legaturi.codc
    and legaturi.codl=licitatie.codl
    and produs.codm=licitatie.codm
    and licitatie.codm not in(select vanzare.codm from licitatia.vanzare)";
	$rezultat = mysql_query($query);
	if(mysql_num_rows($rezultat) > 0) {
		
		 echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Nume</th><th>Prenume</th><th>Adresa</th><th>Anul Nasterii</th>
		<th>Telefon</th><th>Email</th><th>User</th><th>Nume Licitatie</th><th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
      
  echo '
      <div style=" float:right; width:700px;">
     
<table >
	<tbody>
		 <tr>
			<td><input type="text" style="width:60px;" value="'.$rand['nume'].'"></td>
                        <td id="left"><input type="text" style="width:50px;" value="'.$rand['prenume'].'">  </td>
			<td id="left"><input type="text" style="width:50px;" value="'.$rand['adresa'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['data_nasterii'].'"> </td>
			<td id="left"> <input type="text" style="width:90px;" value="'.$rand['telefon'].'"> </td>
			<td id="left"><input type="text" style="width:120px;" value="'.$rand['email'].'"> </td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['user'].'"></td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['nume_licitatie'].'"></td>
			<td id="left"> <input id="'.$rand['codc'].'" class="interzicere" type="button" value="Interzicere Participare"</td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU sunt clienti participanti';}
} 
function produse_asteptare(){
     $query="Select distinct produs.codm, produs.marca ,produs.tip_masina,
     produs.tip_combustibil,produs.an_inreg,produs.tip_transmisie,
     produs.pret_min,produs.pret_max,produs.descriere,
     client.nume,client.prenume,client.user
      from licitatia.produs,licitatia.client,licitatia.licitatie
     where  client.codc=produs.codc and
    produs.codm not in (select licitatie.codm from licitatia.licitatie)";
	
	$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	echo ' <div id="rezultat" ><h3 style="margin-left:20px;">Rezultate</h3>
		<table style="margin-left:20px;"><tr><th>Codul Masinii</th><th>Marca</th><th>Tip </th><th> Combustibil</th>
		<th>An</th><th>Transmisie</th><th>Descriere</th><th>Pret Minim</th><th>Pret Maxim</th>
		<th>Proprietar</th><th>Nume Licitatie</th><th>Data de inceput</th><th>Data Terminare</th>
		<th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
		  echo '
     <div style=" float:right; width:700px; ">
  <form action="#" method="get">   
<table style="margin-left:20px;">
	<tbody>
		
		<tr>
			<td><input type="text" style="width:60px;" value="'.$rand['codm'].'"></td>
                        <td id="left"><input type="text" style="width:50px;" value="'.$rand['marca'].'">  </td>
			<td id="left"><input type="text" style="width:50px;" value="'.$rand['tip_masina'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['tip_combustibil'].'"> </td>
			<td id="left"> <input type="text" style="width:90px;" value="'.$rand['an_inreg'].'"> </td>
			<td id="left"><input type="text" style="width:120px;" value="'.$rand['tip_transmisie'].'"> </td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['descriere'].'"></td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['pret_min'].'"></td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['pret_max'].'"></td>
			<td id="left"> <input type="text" style="width:200px;" value="'.$rand['nume']." ".$rand['prenume']." ".$rand['user'].'"></td>
			<td id="left"> 	<a href="introducere_form.php?id='.$rand['codm'].' ">Introducere in licitatie</a></td>
                </tr>
        </tbody>
</table>
</form >


</div>';
	}   
} else { echo'NU sunt produse in asteptare';}
} 

function licitatii_inactive(){
	
     $query="Select licitatie.codl,licitatie.nume_licitatie,licitatie.data_inc,licitatie.data_term,
     licitatie.durata,produs.marca,produs.codm,produs.tip_masina,
     client.nume,client.prenume,client.user
     from licitatia.client,licitatia.produs,licitatia.licitatie
     where client.codc=produs.codc and produs.codm=licitatie.codm
     and licitatie.activ='false' and licitatie.anulat='false'";
		$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th style="width:60px;">Nume Licitatie</th><th style="width:70px;">Data Incepere</th>
		<th style="width:70px;">Data Terminare</th><th style="width:40px;">Durata</th>
		<th style="width:150px;">Detalii masina</th><th style="width:180px;">Proprietar </th>
		<th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
		  echo '
      <div style=" float:right; width:700px;">
      
<table >
	<tbody>
		
		
		 <tr>
			<td><input type="text" style="width:60px;" value="'.$rand['nume_licitatie'].'"></td>
                        <td id="left"><input type="text" style="width:70px;" value="'.$rand['data_inc'].'">  </td>
			<td id="left"><input type="text" style="width:70px;" value="'.$rand['data_term'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['durata'].'"> </td>
			<td id="left"> <input type="text" style="width:150px;" value="'.$rand['codm']." ".$rand['marca']." ".$rand['tip_masina'].'"> </td>
			<td id="left"> <input type="text" style="width:180px;" value="'.$rand['nume']." ".$rand['prenume']." ".$rand['user'].'"></td>
			
			<td id="left"> <input id="'.$rand['codl'].'" class="stergere" type="button" value="Delete"</td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU sunt produse inactive';}
} 
function licitatii_active(){
    
     $query="Select licitatie.nume_licitatie,licitatie.data_inc,licitatie.data_term,
     licitatie.durata,produs.marca,produs.codm,produs.tip_masina,
     client.nume,client.prenume,client.user
     from licitatia.client,licitatia.produs,licitatia.licitatie
     where client.codc=produs.codc and produs.codm=licitatie.codm
     and licitatie.activ='true' and licitatie.anulat='false'";
		$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Nume Licitatie</th><th>Data Incepere</th><th>Data Terminare</th><th>Durata</th>
		<th>Detalii Masina</th><th>Proprietar </th>
		<th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
		  echo '
      <div style=" float:right; width:700px;">
      
<table >
	<tbody>
		 <tr>
			
			<td><input type="text" style="width:60px;" value="'.$rand['nume_licitatie'].'"></td>
                        <td id="left"><input type="text" style="width:50px;" value="'.$rand['data_inc'].'">  </td>
			<td id="left"><input type="text" style="width:50px;" value="'.$rand['data_term'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['duarata'].'"> </td>
			<td id="left"> <input type="text" style="width:250px;" value="'.$rand['codm']." ".$rand['marca']." ".$rand['tip_masina'].'"> </td>
			<td id="left"> <input type="text" style="width:200px;" value="'.$rand['nume']." ".$rand['prenume']." ".$rand['user'].'"></td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU sunt produse active';}
} 
function licitatii_terminate(){
 
     $query="Select licitatie.nume_licitatie,licitatie.data_inc,licitatie.data_term,
     licitatie.durata,produs.marca,produs.codm,produs.tip_masina,
     client.nume,client.prenume,client.user
     from licitatia.client,licitatia.produs,licitatia.licitatie,licitatia.vanzare
     where client.codc=produs.codc and produs.codm=licitatie.codm
     and licitatie.codm in (select vanzare.codm from licitatia.vanzare)";
		$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Nume Licitatie</th><th>Data Incepere</th><th>Data Terminare</th><th>Durata</th>
		<th>Detalii Masina</th><th>Proprietar </th>
		<th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
		  echo '
      <div style=" float:right; width:700px;">
      
<table >
	<tbody>
		 <tr>
			<td><input type="text" style="width:60px;" value="'.$rand['nume_licitatie'].'"></td>
                        <td id="left"><input type="text" style="width:50px;" value="'.$rand['data_inc'].'">  </td>
			<td id="left"><input type="text" style="width:50px;" value="'.$rand['data_term'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['duarata'].'"> </td>
			<td id="left"> <input type="text" style="width:250px;" value="'.$rand['codm']." ".$rand['marca']." ".$rand['tip_masina'].'"> </td>
		<td id="left"> <input type="text" style="width:200px;" value="'.$rand['nume']." ".$rand['prenume']." ".$rand['user'].'"></td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU sunt produse in asteptare';}
} 
function toate_produsele(){
	
$query="Select produs.codm,produs.marca,produs.tip_masina,produs.tip_combustibil,produs.an_inreg,
produs.tip_transmisie,produs.descriere,produs.pret_min,produs.pret_max,client.nume,
client.prenume,client.user
from licitatia.produs,licitatia.client
where client.codc=produs.codc";	
	$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Codul Masinii</th><th>Marca</th><th>Tip </th><th> Combustibil</th>
		<th>An</th><th>Transmisie</th><th>Descriere</th><th>Pret Minim</th><th>Pret Maxim</th>
		<th>Proprietar</th><th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
		  echo '
     <div style=" float:right; width:700px;">
      
<table >
	<tbody>
		 <tr>
			<td><input type="text" style="width:50px;" value="'.$rand['codm'].'"></td>
                        <td id="left"><input type="text" style="width:50px;" value="'.$rand['marca'].'">  </td>
			<td id="left"><input type="text" style="width:70px;" value="'.$rand['tip_masina'].'"> </td>
			<td id="left"> <input type="text" style="width:60px;" value="'.$rand['tip_combustibil'].'"> </td>
			<td id="left"> <input type="text" style="width:40px;" value="'.$rand['an_inreg'].'"> </td>
			<td id="left"><input type="text" style="width:120px;" value="'.$rand['tip_transmisie'].'"> </td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['descriere'].'"></td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['pret_min'].'"></td>
			<td id="left"> <input type="text" style="width:50px;" value="'.$rand['pret_max'].'"></td>
			<td id="left"> <input type="text" style="width:200px;" value="'.$rand['nume']." ".$rand['prenume']." ".$rand['user'].'"></td>
			
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU sunt produse in asteptare';}	
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="inregistrarestyle.css"/>
    <link type="text/css" rel="stylesheet" href="activitatistyle.css"/>
    <!-- slider css and script -->
          <link rel="stylesheet" href="css/orbit-1.2.3.css">
          <link rel="stylesheet" href="css/demo-style.css">
          
        <!-- Attach necessary JS -->
       
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script> 
        
            <!--[if IE]>
                 <style type="text/css">
                     .timer { display: none !important; }
                     div.caption { background:transparent; filterrogidXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
                </style>
            <![endif]-->
        
        <!-- Run the plugin -->
        <script type="text/javascript">
            $(window).load(function() {
                $('#featured').orbit();
            });
        </script>
    <!-- end slider css and script -->
    <title><danoibla></title>
    
 <!-- Stergere client -->
          
 <script type="text/javascript" language="javascript">
$(document).ready(function() {
 
    
    $('.delete').click(function() {
        var parent = $(this).closest('tr');
        $.ajax({
            type: 'get',
            url: 'conditii.php', 
            data: 'ajax=1&delete=' + $(this).attr('id'),
            beforeSend: function() {
                parent.animate({'backgroundColor':'#fb6c6c'},300);
            },
            success: function() {
                parent.fadeOut(300,function() {
                    parent.remove();
                });
            }
        });        
    });
  
       
});
 </script>
 
  <!-- Introducere in licitatie -->
          
 <script type="text/javascript" language="javascript">
$(document).ready(function() {
 
    
    $('.introducere').click(function() {
        var parent = $(this).closest('tr');
        $.ajax({
            type: 'get',
            url: 'introducere_licitatie.php', 
            data: 'ajax=1&introducere=' + $(this).attr('id'),
	    
            
           
        });        
    });
  
       
});
 </script>

 
  <!-- Stergere licitatie inactiva -->
 <script type="text/javascript" language="javascript">
$(document).ready(function() {
 
    
    $('.stergere').click(function() {
        var parent = $(this).closest('tr');
        $.ajax({
            type: 'get',
            url: 'stergereLicitatie.php', 
            data: 'ajax=1&stergere=' + $(this).attr('id'),
            
            success: function() {
                parent.fadeOut(300,function() {
                    parent.remove();
                });
            }
        });        
    });
  
       
});
 </script>
</head>
<body>
 <div id="container">
    <div id="header">
    <ul id="menu">
        <li><a class="active" href="logare.php">Acasa</a></li>
        <li><a class="active" href="search.php">Licitatii</a></li>
         <li><a class="active" href="ajutor.html">Ajutor</a></li>
	 <li><a class="active" href="admin.php">Administrare</a></li>
        
    </ul>
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>
    </div>
     <div id="content" >
	
   <div id="partea_stanga" style="float:left;">
	
          <div id="act">
            <h3>Clienti</h3>
            <div class="oferte">
                <ul>
                    <li>
                        <a href="?run=all.clients">Toti Clientii</a>
                    </li>
                    <li>
                        <a href="?run=activi">Clienti Participanti</a>
                    </li>
                    
                </ul>
            </div>
	     <h3>Produse</h3>
             <div class="oferte">
                <ul>
			 <li>
                        <a href="?run=all.prod">Toate Produsele</a>
                    </li>
                    <li>
                        <a href="?run=produse">Produse In Asteptare</a>
                    </li>
                    <li>
                        <a href="?run=l.inactive">Licitatii Inactive</a>
                    </li>
                    <li>
                        <a href="?run=l.active">Licitatii Active</a>
                    </li>
		    <li>
                        <a href="?run=p.vandute">Licitatii Terminate</a>
                    </li>
                </ul>
            </div>
        </div>
     </div>
   <div class="clear"></div>
     <div id="partea_dreapta" style="overflow:scroll; float:right; width:700px;">
	
     <?php
   
   if (isset($_GET['run'])) $linkchoice=$_GET['run'];
else $linkchoice='';

switch($linkchoice){

case 'all.clients' :
	
    toti_clientii();
    break;
case 'activi' :
    clienti_participanti();
    break;
 case 'produse' :
    produse_asteptare();
    break;
case 'l.inactive' :
   licitatii_inactive();
    break;
    
case 'l.active' :
   licitatii_active();
    break;
case 'p.vandute' :
   licitatii_terminate();
    break;
case 'all.prod' :
   toate_produsele();
    break;

default :
    echo '
      <div id="rezultat">
      <h3>Rezultate</h3>
<p>Nu ati facut nicio cautare!</p>
</div>';

} 
   
   
   ?>
     </div>   
       
       
        
     </div>
      <div id="footer">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro
        </div>
        <div class="clear"></div>
  </div>

</body>
</html>