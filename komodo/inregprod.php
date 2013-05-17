
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
     <link type="text/css" rel="stylesheet" href="inregistrarestyle.css"/>
    <link type="text/css" rel="stylesheet" href="vindestyle.css"/>
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

      
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>
    
	

     <div id="content">

<?php
require_once 'config.php';

if(!isset($_GET['pag'])) $_GET['pag'] = '';
if(!isset($_SESSION['marca'])) $_SESSION['marca'] = '';
if(!isset($_SESSION['tip_masina'])) $_SESSION['tip_masina'] = '';
if(!isset($_SESSION['tip_combustibil'])) $_SESSION['tip_combustibil'] = '';
if(!isset($_SESSION['an_inreg'])) $_SESSION['an_inreg'] = '';
if(!isset($_SESSION['tip_transmisie'])) $_SESSION['tip_transmisie'] = '';
if(!isset($_SESSION['descriere'])) $_SESSION['descriere'] = '';
if(!isset($_SESSION['pret_min'])) $_SESSION['pret_min'] = '';
if(!isset($_SESSION['pret_max'])) $_SESSION['pret_max'] = '';


switch($_GET['pag']) {

case '':
echo '
	  
	  
	  <div class="main-container col1-layout">
            <div class="main">
                                <div class="col-main">
                                        <div class="account-create">
    <div class="page-title">
        <h1>Inregistrare Produs</h1>
    </div>
            <form action="inregprod.php?pag=verifica" method="post" id="form-validate">
        <div class="fieldset">
            
            <h2 class="legend">Informatii produs</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="customer-name">
    <div class="field name-firstname">
        <label for="firstname" class="required"><em>*</em>Marca</label>
        <div class="input-box">
            <input type="text" name="marca" value="'.$_SESSION['marca'].'" class="input-text required-entry"  />
        </div>
    </div>
    <div class="field name-lastname">
        <label for="lastname" class="required"><em>*</em>Tip</label>
        <div class="input-box">
            <input type="text" id="lastname" "name="tip_masina" value="'.$_SESSION['tip_masina'].'" title="Nume" class="input-text required-entry"  />
        </div>
    </div>
</div>
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>Combustibil </label>
                    <div class="input-box">
                        <input type="text" name="tip_combustibil" value="'.$_SESSION['tip_combustibil'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>An inregistrare</label>
                    <div class="input-box">
                        <input type="text" name="an_inreg" value="'.$_SESSION['an_inreg'].'" class="input-text validate-email required-entry" />
                    </div>
                </li>
                           
                 <li>
                    <label for="email_address" class="required"><em>*</em>Tip transmisie </label>
                    <div class="input-box">
                        <input type="text" name="tip_transmisie" value="'.$_SESSION['tip_transmisie'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li>
                 <li>
                    <label for="email_address" class="required"><em>*</em>Descriere </label>
                    <div class="input-box">
		    <textarea rows="4" cols="50" name="descriere" value="'.$_SESSION['descriere'].'" class="input-text validate-email required-entry">
		    
		    </textarea>
                        
                    </div>
                </li>
		 <li>
                    <label for="email_address" class="required"><em>*</em>Pret maxim </label>
                    <div class="input-box">
                        <input type="textarea" name="pret_max" value="'.$_SESSION['pret_max'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li>
		<li>
                    <label for="email_address" class="required"><em>*</em>Pret minim </label>
                    <div class="input-box">
                        <input type="textarea" name="pret_min" value="'.$_SESSION['pret_min'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li> 
                </ul>
        </div>
           
        <div class="buttons-set">
            <p class="required">* Campuri obligatorii</p>
            <p class="back-link"><a href="cont.php" class="back-link"><small>&laquo; </small>inapoi</a></p>
            <button type="submit" title="Trimite" class="button"><span><span>Trimite</span></span></button>
        </div>
    </form>
    
</div>
                </div>
            </div>
                   </div>

	  
	  
	  
	  
	  
	  
	  ';
break;

case 'verifica':

$_SESSION['marca'] = $_POST['marca'];
$_SESSION['tip_masina'] = $_POST['tip_masina'];
$_SESSION['tip_combustibil'] = $_POST['tip_combustibil'];
$_SESSION['an_inreg'] = $_POST['an_inreg'];
$_SESSION['tip_transmisie'] = $_POST['tip_transmisie'];
$_SESSION['descriere'] = $_POST['descriere'];
$_SESSION['pret_min'] = $_POST['pret_min'];
$_SESSION['pret_max'] = $_POST['pret_max'];





if(($_SESSION['marca'] == '') ||($_SESSION['tip_masina'] == '')||($_SESSION['tip_combustibil'] == '') ||($_SESSION['an_inreg'] == '')||($_SESSION['tip_transmisie'] == '')||($_SESSION['descriere'] == '')||($_SESSION['pret_min'] == '')||($_SESSION['pret_max'] == '') ||($_SESSION['logat'] != 'Da')) {
echo 'Completeaza corect campurile. <br>
      Vezi daca: ai	completat campurile, daca ai scris mai mult de 2 caractere si mai putin de 255<br><br>
	  Apasa <a href="inregprod.php">aici</a> pentru a te intoarce.';
}else if( !preg_match("/^1[0-9]{3}$/",$_SESSION['an_inreg']) ||  !preg_match("/^2[0-9]{3}$/",$_SESSION['an_inreg']) || $_SESSION['an_inreg']>'2013' ){
	echo'Anul inregistrarii nu este corect!';
	
}
else if($_SESSION['pret_min']>$_SESSION['pret_max'] ){
	echo'Preturile nu sunt trecute corect';
	
}

else {
	
	$query= "SELECT * FROM `client` WHERE user='".addentities($_SESSION['user'])."' ";
	$rez=mysql_query($query);
	while($row=mysql_fetch_array($rez)){
		
	
echo $row['codc'];
$codc=$row['codc'];
$cerereSQL = "INSERT INTO `produs` (`marca`, `tip_masina`, `tip_combustibil`, `an_inreg`, `tip_transmisie`, `descriere`, `pret_min`, `pret_max`, `codc`)
              VALUES ('".addentities($_SESSION['marca'])."', '".addentities($_SESSION['tip_masina'])."', '".addentities($_SESSION['tip_combustibil'])."', '".addentities($_SESSION['an_inreg'])."', '".addentities($_SESSION['tip_transmisie'])."', '".addentities($_SESSION['descriere'])."', '".addentities($_SESSION['pret_min'])."', '".addentities($_SESSION['pret_max'])."', '$codc');";
mysql_query($cerereSQL);}

$_SESSION['marca'] = '';
$_SESSION['tip_masina'] = '';
$_SESSION['tip_combustibil'] = '';
$_SESSION['an_inreg'] = '';
$_SESSION['tip_transmisie'] = '';
$_SESSION['descriere'] = '';
$_SESSION['pret_min'] = '';

$_SESSION['pret_max'] = '';

echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=licitatii.html">';
/*echo 'Am introdus datele in baza de date. <br>
	  Apasa <a href="index.php">aici</a> pentru a te intoarce la pagina principala.';*/
}


break;

}
?>
</div>
 
 <div id="footer">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro
        </div>
        <div class="clear"></div>
  </div>

</body>
</html>
