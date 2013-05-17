<?php
require_once 'config.php';
function oferte_curente(){
    echo 'oferte_curente ran successfully.';
} 
function produse_necastigate(){
	if($_SESSION['logat'] != 'Nu'){
	$query1="Select * from licitatia.client where user='".addentities($_SESSION['user'])."' ";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez)){
	$codc=$row['codc'];
	
    $query="Select distinct  produs.tip_combustibil,produs.marca,produs.tip_masina,produs.descriere from licitatia.produs,licitatia.client,licitatia.licitatie,
	licitatia.legaturi
	where client.codc='$codc' and client.codc=legaturi.codc and legaturi.codl=licitatie.codl and licitatie.codm=produs.codm";
	$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Marca</th><th>Tip</th><th>Combustibil</th><th>Descriere</th>
		</tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
      
  echo '
      <div style=" float:right; width:700px;">
    
<table >
	<tbody>
		 <tr>
			<td>'.$rand['marca'].'</td>
                        <td id="left"> '.$rand['tip_masina'].' </td>
			  <td id="left"> '.$rand['tip_combustibil'].' </td>
			<td id="left"> '.$rand['descriere'].' </td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU aveti produse necastigate';}
	}}
} 
function produse_castigate(){
	if($_SESSION['logat'] != 'Nu'){
	$query1="Select * from licitatia.client where user='".addentities($_SESSION['user'])."'";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez)){
	$codc=$row['codc'];
	
  $query="Select distinct  produs.tip_combustibil, produs.marca,produs.tip_masina,produs.descriere from licitatia.produs,licitatia.client,licitatia.licitatie,
	licitatia.vanzare,licitatia.legaturi
	where client.codc='$codc' and client.codc=legaturi.codc and legaturi.codl=licitatie.codl and licitatie.codm=produs.codm
	and vanzare.codm=licitatie.codm and vanzare.codc=legaturi.codc";
	$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	
	
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Marca</th><th>Tip</th><th>Combustibil</th><th>Descriere</th>
		</tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
echo '
      <div style=" float:right; width:700px;">
      
<table >
	<tbody>
		 <tr>
			<td>'.$rand['marca'].'</td>
                        <td id="left"> '.$rand['tip_masina'].' </td>
			  <td id="left"> '.$rand['tip_combustibil'].' </td>
			<td id="left"> '.$rand['descriere'].' </td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU aveti produse castigate';}
	}}
} 

require_once 'config.php';

function produse_active(){
	if($_SESSION['logat'] != 'Nu'){
	$query1="Select * from licitatia.client where user='".addentities($_SESSION['user'])."' ";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez)){
	$codc=$row['codc'];

 $query="Select distinct  produs.tip_combustibil,produs.marca,produs.tip_masina,produs.descriere from licitatia.produs,licitatia.client,licitatia.licitatie,licitatia.vanzare
 
 where client.codc=produs.codc and 
   produs.codm IN (Select codm from licitatia.licitatie) 
     and licitatie.codm NOT IN (Select codm from licitatia.vanzare) 
     and client.codc='$codc' ";
	
	$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
		echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Marca</th><th>Tip</th><th>Combustibil</th><th>Descriere</th>
		</tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
     
      echo '
     <div style=" float:right; width:700px;">
<table >
	<tbody>
		 <tr>
			<td>'.$rand['marca'].'</td>
                        <td id="left"> '.$rand['tip_masina'].' </td>
			 <td id="left"> '.$rand['tip_combustibil'].' </td>
			<td id="left"> '.$rand['descriere'].' </td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU aveti produse active';}
	}}
}
function produse_asteptare(){
	if($_SESSION['logat'] != 'Nu'){
	$query1="Select * from licitatia.client where user='".addentities($_SESSION['user'])."' ";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez)){
	$codc=$row['codc'];
	
	
     $query="Select distinct produs.codm,produs.tip_combustibil, produs.marca,produs.tip_masina,produs.descriere from licitatia.produs,licitatia.client,licitatia.licitatie,licitatia.vanzare
     where client.codc='$codc' and client.codc=produs.codc and
    produs.codm NOT IN (Select codm from licitatia.licitatie)";
	
	$rezultat = mysql_query($query);
	if(mysql_num_rows($rezultat) > 0) {
		echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Marca</th><th>Tip</th><th>Combustibil</th><th>Descriere</th>
		<th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
     
    echo '
         <div style=" float:right; width:700px;overflow:hidden;">
<table >
	<tbody>
		 <tr>
			<td>'.$rand['marca'].'</td>
                        <td id="left"> '.$rand['tip_masina'].' </td>
			<td id="left"> '.$rand['tip_combustibil'].' </td>
			<td id="left"> '.$rand['descriere'].' </td>
			<td id="left"><input id="'.$rand['codm'].'" class="stergere1" type="button" value="Delete">
				<a href="edit_form.php?id='.$rand['codm'].' ">Edit</a>
			</td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU aveti produse in asteptare';}
	}}
}



function produse_inactive(){
	if($_SESSION['logat'] != 'Nu'){
	$query1="Select * from licitatia.client where user='".addentities($_SESSION['user'])."' ";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez)){
	$codc=$row['codc'];
	
    
	 $query="Select distinct  licitatie.codl,produs.tip_combustibil,produs.marca,produs.tip_masina,produs.descriere from licitatia.produs,licitatia.client,licitatia.licitatie,licitatia.vanzare
		where client.codc='$codc' and client.codc=produs.codc and
		produs.codm=licitatie.codm
		and licitatie.activ='false'";
	
	$rezultat = mysql_query($query);
	if(mysql_num_rows($rezultat) > 0) {
		echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Marca</th><th>Tip</th><th>Combustibil</th><th>Descriere</th>
		<th>Optiuni</th></tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
     
    echo '
         <div style=" float:right; width:700px;">
<table >
	<tbody>
		 <tr>
			<td>'.$rand['marca'].'</td>
                        <td id="left"> '.$rand['tip_masina'].' </td>
			<td id="left"> '.$rand['tip_combustibil'].' </td>
			<td id="left"> '.$rand['descriere'].' </td>
			<td id="left"> <input id="'.$rand['codl'].'" class="stergere" type="button" value="Delete"> </td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU aveti produse in asteptare';}
	}}
}



function produse_vandute(){
	if($_SESSION['logat'] != 'Nu'){
	$query1="Select * from licitatia.client where user='".addentities($_SESSION['user'])."' ";
		$rez=mysql_query($query1);
	while($row=mysql_fetch_array($rez)){
	$codc=$row['codc'];
	
	
     $query="Select distinct  produs.tip_combustibil,produs.marca,produs.tip_masina,produs.descriere from licitatia.produs,licitatia.client,licitatia.licitatie,licitatia.vanzare
	
	where client.codc='$codc' and client.codc=produs.codc and
	produs.codm IN (Select codm from licitatia.licitatie)
	and licitatie.codm=produs.codm
	and licitatie.codm  IN (Select codm from licitatia.vanzare)";
	$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	echo ' <div id="rezultat"><h3>Rezultate</h3>
		<table><tr><th>Marca</th><th>Tip</th><th>Combustibil</th><th>Descriere</th>
		</tr></table></div>';
	while($rand = mysql_fetch_array($rezultat))	{
    
     
    echo '
        <div style=" float:right; width:700px;">
<table >
	<tbody>
		 <tr>
			<td>'.$rand['marca'].'</td>
                        <td id="left"> '.$rand['tip_masina'].' </td>
			<td id="left"> '.$rand['tip_combustibil'].' </td>
			<td id="left"> '.$rand['descriere'].' </td>
                </tr>
        </tbody>
</table>
</div>';
	}   
} else { echo'NU aveti produse vandute';}
} }}
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
    
     <!-- stergere licitatie inactiva -->          
 <script type="text/javascript" language="javascript">
$(document).ready(function() {
 
    
    $('.stergere').click(function() {
        var parent = $(this).closest('tr');
        $.ajax({
            type: 'get',
            url: 'conditii.php', 
            data: 'ajax=1&stergere=' + $(this).attr('id'),
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
 
     
     <!-- stergere produs in asteptare -->          
 <script type="text/javascript" language="javascript">
$(document).ready(function() {
 
    
    $('.stergere1').click(function() {
        var parent = $(this).closest('tr');
        $.ajax({
            type: 'get',
            url: 'conditii.php', 
            data: 'ajax=1&stergere1=' + $(this).attr('id'),
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
</head>
<body>
 <div id="container">
	
    <div id="header">
	 <?php
require_once 'config.php';
	$query1="Select * from licitatia.client where user='".$_SESSION['user']."' ";
		$rez=mysql_query($query1);
	$row=mysql_fetch_array($rez);
	$user=$row['user'];
        
       echo'  <div id="user" style="float:left;margin-left:800px; "> <h4 style="margin-top:67px; color:#003366;"><a class="active"  href=""><img src="images/omulet.png"/> '.$user.'</a>
       </h4></div>';
    ?>
    </div>
 
    <ul ><li><a class="active" href="inregprod.php">Vinde</a></li>
        <li><a class="active" href="search.php">Licitatii</a></li>
        <li><a class="active" href="activitati.php">Activitati</a></li>
        <li><a class="active" href="ajutor.html">Ajutor</a></li>
	 

        
    </ul>
   
     </div>
     <div id="content">
      
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>
    
     <div id="content">
	
   <?php
   if (isset($_GET['run'])) $linkchoice=$_GET['run'];
else $linkchoice='';

switch($linkchoice){

case 'of.curente' :
    oferte_curente();
    break;
case 'p.necastigate' :
    produse_necastigate();
    break;
 case 'p.castigate' :
    produse_castigate();
    break;
case 'p.active' :
    produse_active();
    break;
case 'p.inactive' :
    produse_inactive();
    break;
    
case 'p.asteptare' :
    produse_asteptare();
    break;
case 'p.vandute' :
    produse_vandute();
    break;
default :
    echo '
      <div id="rezultat">
      <h3 style="color:gray;">Rezultate</h3>
<p>Nu ati facut nicio cautare!</p>
</div>';

} 
   
   
   ?>
   <div id="partea_stanga">
	
          <div id="act">
            <h3 style="color:gray;">Cumparari</h3>
            <div class="oferte">
                <ul>
                    <li>
                        <a href="?run=of.curente" style=" text-decoration: none; color: #003366;">Oferte Curente</a>
                    </li>
                    <li>
                        <a href="?run=p.necastigate" style=" text-decoration: none; color: #003366;">Produse Necastigate</a>
                    </li>
                    <li>
                        <a href="?run=p.castigate" style=" text-decoration: none; color: #003366;">Produse Castigate</a>
                    </li>
                </ul>
            </div>
	     <h3  style="color:gray;">Vanzari</h3>
             <div class="oferte">
                <ul>
                    <li>
                        <a href="?run=p.active" style=" text-decoration: none; color: #003366;">Produse Active</a>
                    </li>
		    <li>
                        <a href="?run=p.inactive" style=" text-decoration: none; color: #003366;">Produse Inactive</a>
                    </li>
                    <li>
                        <a href="?run=p.asteptare" style=" text-decoration: none; color: #003366;">Produse In Asteptare</a>
                    </li>
                    <li>
                        <a href="?run=p.vandute" style=" text-decoration: none; color: #003366;">Produse Vandute</a>
                    </li>
                </ul>
            </div>
        </div>
     </div>
        
       
       
        
     </div>
      <div id="footer">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro
        </div>
        <div class="clear"></div>
  </div>

</body>
</html>