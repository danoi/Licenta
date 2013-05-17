
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="licitatiistyle.css"/>
     <link type="text/css" rel="stylesheet" href="activestyle.css"/>
     <script type="text/javascript" src="js/countdown.js" defer="defer"></script> 
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
    <title>danoibla</title>
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
    <div id="menu1">
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


      

      <div class="cautare">
        
	
        <?php
require_once 'config.php';

if(!isset($_GET['pag'])) $_GET['pag'] = '';
if(!isset($_SESSION['marca'])) $_SESSION['marca'] = '';
if(!isset($_SESSION['tipm'])) $_SESSION['tipm'] = '';
if(!isset($_SESSION['tipc'])) $_SESSION['tipc'] = '';
if(!isset($_SESSION['an'])) $_SESSION['an'] = '';
switch($_GET['pag']) {

case '':
	echo'  <h1 style="color:gray;">Cautare detaliata de licitatii</h1>
       <form id= "lets_search" action="search.php?pag=search" method="post" name="cautareform">
        <div id="block">
        <div class="left-block-search">
            <label>Marca</label><br>
            <select class="selectbox" size="4" name="marca">
                <option style="color: #A19A8D;" selected="selected" value="1" name="marca">Selecteaza Marca</option>';
		   $q="select distinct produs.marca,produs.tip_masina,produs.an_inreg,produs.tip_combustibil  from
		licitatia.produs,licitatia.licitatie where produs.codm=licitatie.codm";
		$result=mysql_query($q);
		if(mysql_num_rows($result) > 0) {
               while($rand = mysql_fetch_array($result))	{
		echo' <option selected="selected" value="'.$rand['marca'].'" id="marca" name="marca">'.$rand['marca'].'</option>';}
		}
           echo' </select>
        
        </div>
        <div class="right-block-search">
            <label >Tipul Masinii</label><br>
            <select class="selectbox" size="4"type="width:60px;" name="tipm">
                <option style="color: #A19A8D;" selected="selected" value="toate">Selecteaza tipul</option>';
		
		  $q="select distinct produs.tip_masina  from licitatia.produs,
		  licitatia.licitatie where produs.codm=licitatie.codm";
		$result=mysql_query($q);
		if(mysql_num_rows($result) > 0) {
		while($rand = mysql_fetch_array($result))	{
		echo' <option selected="selected" value="'.$rand['tip_masina'].'" id="tipm" name="tipm">'.$rand['tip_masina'].'</option>';}
		}
            echo'</select>
        
        </div>
        <div class="left-block-search">
            <label>Tip Combustibil</label><br>
            <select class="selectbox" size="4" name="tipc">
                <option style="color: #A19A8D;" selected="selected" value="0">Selecteaza Combustibil</option>';
		
		  $q="select distinct produs.tip_combustibil  from licitatia.produs,
		  licitatia.licitatie where produs.codm=licitatie.codm";
		$result=mysql_query($q);
		if(mysql_num_rows($result) > 0) {
		while($rand = mysql_fetch_array($result))	{
		echo' <option selected="selected" value="'.$rand['tip_combustibil'].'" id="tipc" name="tipc">'.$rand['tip_combustibil'].'</option>';}
		}
		
               
           echo' </select>
        
        </div>
        <div class="right-block-search">
            <label>An Inregistrare</label><br>
            <select  class="selectbox" size="4" name="an">
                <option style="color: #A19A8D;" selected="selected" value="0">Selecteza anul</option>';
		  $q="select distinct produs.an_inreg  from licitatia.produs,
		  licitatia.licitatie where produs.codm=licitatie.codm";
		  
		$result=mysql_query($q);
		if(mysql_num_rows($result) > 0) {
                while($rand = mysql_fetch_array($result))	{
		echo' <option selected="selected" value="'.$rand['an_inreg'].'" id="an" name="an">'.$rand['an_inreg'].'</option>';}
		}
		
            echo'</select>
            </select>
        
        </div>
       
        </div>
        <input type="submit" name="search" value="Cauta" style="margin-top:20px; width:100px; background-color:#4169E1;"/>
        
        
        </form>
	';
	
	
        break;

case 'search':
	
$_SESSION['marca'] = $_POST['marca'];
$_SESSION['tipm'] = $_POST['tipm'];
$_SESSION['tipc'] = $_POST['tipc'];
$_SESSION['an'] = $_POST['an'];


if(($_SESSION['marca'] == '') ||($_SESSION['tipm'] == '')||($_SESSION['tipc'] == '')||($_SESSION['an'] == '')) {
echo 'Introdu un cuvant pentru a cauta in baza de date. <br>
      Apasa <a href="search.php">aici</a> pentru a te intoarce.';
}  else {echo '<h1 style="color:#4169E1;">Licitatii active</h1>
		<table><tr><th>Produs</th><th>Timp disponibil</th><th></th></tr></table>';


$query= "SELECT produs.codm,produs.marca,produs.tip_masina,produs.tip_combustibil
              ,produs.an_inreg, produs.tip_transmisie,produs.descriere,produs.pret_min,
              produs.pret_max,licitatie.data_term,licitatie.data_inc FROM licitatia.produs,
	      licitatia.licitatie WHERE marca='".addentities($_POST['marca'])."'
	      and tip_masina='".addentities($_POST['tipm'])."'
	      and tip_combustibil='".addentities($_POST['tipc'])."'
	      and an_inreg='".addentities($_POST['an'])."'
	     and  produs.codm=licitatie.codm";
$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	while($rand = mysql_fetch_array($rezultat))	{
    echo '
    <table>
		 <tbody>
		 <tr>
			<td><a href="detalii_masina.php?id='.$rand['codm'].'">'.$rand['marca'].'</a></td>
                        <td id="left"> '.$rand['an_inreg'].' </td>
			
                        
                        <td>
                            <p><span id="countdown1">2013-05-12 00:00:00 GMT+00:00</span></p>
                        </td>
                        
                        <td class="bid">
                            <div id="btnliciteaza"><a href="licitatie_activa.php?id='.$rand['codm'].'"><span>Liciteaza</span></a></div>
                        </td>
                    </tr>
        </tbody>
        </table>';
	}   
} else {
echo 'Nu au fost gasite rezultate pentru cautarea: <font color="red"><b><i>bla</i></b></font> <br>
	  Apasati <a href="search.php">aici</a> pentru a va intoarce';echo $_POST['an'];
}

}
break;
}
   ?>     
      </div>  
        
        
        
 </div>
   <div class="clear"></div>
   
 <div id="footer" style="float:left;">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro</p>
        </div>
        <div class="clear"></div>
  </div>
</body>
</html>
