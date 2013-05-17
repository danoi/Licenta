


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="inregistrarestyle.css"/>
     <link type="text/css" rel="stylesheet" href="cont.css"/>
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
         <div id="user" style="float:left;margin-left:800px; "> <h4 style="margin-top:67px; color:#003366;"><a class="active"  href=""><img src="images/omulet.png"/> Login</a>
       </h4></div>    </div>
             <div id="menu1">
    <ul >
        <li><a class="active" href="logare.php">Acasa</a></li>
        <li><a class="active" href="ajutor.html">Ajutor</a></li>
	 
        
    </ul>
             </div>
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>

     <div id="content">
<div class="account-login">
<div class="page-title">
        <h1>Autentificati-va sau creati-va un cont</h1>
    </div>
<?php	
require_once('config.php');

if(!isset($_GET['actiune'])) $_GET['actiune'] = '';

switch($_GET['actiune'])
{
case '':
    echo'
        <form action="cont.php?actiune=validare" method="post" id="login-form">
        <div class="col2-set">
            <div class="col-1 new-users">
                <div class="content">
                    <h2>Clienti noi</h2>
                    <p>Prin crearea unui cont pe site-ul nostru veti putea avea posibilitatea de a urmari vanzarea autoturismelor,veti avea acces la licitatii ca si cumparator
                    sau posiblitatea de a vinde usor produse.</p>
                </div>
            </div>
            <div class="col-2 registered-users">
                <div class="content">
                    <h2>Clienti inregistrati</h2>
                    <p>Daca aveti un cont creat, logati-va</p>
                    <ul class="form-list">
                        <li>
                            <label for="email" class="required"><em>*</em>Utilizator</label></br>
                            <div class="input-box">
                                <input type="text" name="user" value="" id="user" class="input-text required-entry validate-email" title="Adresa email" />
                            </div>
                        </li>
                        <li>
                            <label for="pass" class="required"><em>*</em>Parola</label></br>
                            <div class="input-box">
                                <input type="password" name="parola" class="input-text required-entry validate-password" id="parola" title="Parola" />
                            </div>
                        </li>
                    </ul>
                    <p class="required">* Campuri obligatorii</p>
                </div>
            </div>
        </div>
        <div class="col2-set">
            <div class="col-1 new-users">
                <div class="buttons-set">
                    <a class="button" href="inregistrare.php">Creati un nou cont</a>
                </div>
            </div>
            <div class="col-2 registered-users">
                <div class="buttons-set">
                    
                    <button type="submit" class="button" title="Autentificare" name="send" id="send2"><a href="logare.php">Autentificare</a></button>
                </div>
            </div>
        </div>
    </form>';
    break;

case 'validare':

$_SESSION['user'] = $_POST['user'];

$_SESSION['parola'] = $_POST['parola'];
if(($_POST['user'] == '') || ($_POST['parola'] == ''))
{
echo 'Completeaza casutele. <Br> 
      Apasati <a href="autentificare.php">aici</a> pentru a va intoarce la pagina precedenta.';
}
else
{
$cerereSQL = "SELECT * FROM `client` WHERE user='".addentities($_SESSION['user'])."' ";
$rezultat = mysql_query($cerereSQL);
if(mysql_num_rows($rezultat) == 1)
{
  while($rand = mysql_fetch_array($rezultat))
  {
    $_SESSION['logat'] = 'Da';
    if($_SESSION['user']=='admin'){
	 echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=admin.php">';
    }else{
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=acasa.php">';
  }}
}
else
{
   
echo 'Date incorecte. <Br> 
      Apasati <a href="cont.php">aici</a> pentru a va intoarce la pagina precedenta.';
}

}
break;
}
    ?>
</div>
                </div>
            </div>
 </div>
   </div>
 <div class="clear"></div>
 <div id="footer">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro</p>
        </div>
        <div class="clear"></div>
  </div>

</body>
</html>
