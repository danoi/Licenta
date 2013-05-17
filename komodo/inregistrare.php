
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="inregistrarestyle.css"/>
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
<div class="clear"></div>
 <div id="inregistrareclient">
    <?php
   
    require_once('config.php');
    if(!isset($_GET['actiune'])) $_GET['actiune'] = '';
    if(!isset($_SESSION['nume'])) $_SESSION['nume']='';
    if(!isset($_SESSION['prenume'])) $_SESSION['prenume']='';
    if(!isset($_SESSION['adresa'])) $_SESSION['adresa']='';
    if(!isset($_SESSION['data_nasterii'])) $_SESSION['data_nasterii']='';
    if(!isset($_SESSION['telefon'])) $_SESSION['telefon']='';
    if(!isset($_SESSION['email'])) $_SESSION['email']='';
    if(!isset($_SESSION['user'])) $_SESSION['user']='';
    if(!isset($_SESSION['parola'])) $_SESSION['parola']='';
    
    
    switch($_GET['actiune'])
{
case '':
        echo'
        

 <div class="main-container col1-layout">
            <div class="main">
                                <div class="col-main">
                                        <div class="account-create">
    <div class="page-title">
        <h1>Creati un cont</h1>
    </div>
            <form action="inregistrare.php?actiune=validare" method="post" id="form-validate">
        <div class="fieldset">
            
            <h2 class="legend">Informatii personale</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="customer-name">
    <div class="field name-firstname">
        <label for="firstname" class="required"><em>*</em>Nume</label>
        <div class="input-box">
            <input type="text"name="nume" value="'.$_SESSION['nume'].'" class="input-text required-entry"  />
        </div>
    </div>
    <div class="field name-lastname">
        <label for="lastname" class="required"><em>*</em>Prenume</label>
        <div class="input-box">
            <input type="text" id="lastname" name="prenume" value="'.$_SESSION['prenume'].'" title="Nume" class="input-text required-entry"  />
        </div>
    </div>
</div>
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>Adresa </label>
                    <div class="input-box">
                        <input type="text" name="adresa" value="'.$_SESSION['adresa'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>Data Nasterii</label>
                    <div class="input-box">
                        <input type="text" name="data_nasterii" value="'.$_SESSION['data_nasterii'].'" class="input-text validate-email required-entry" />
                    </div>
                </li>
                           
                 <li>
                    <label for="email_address" class="required"><em>*</em>Adresa Email </label>
                    <div class="input-box">
                        <input type="text" name="email" value="'.$_SESSION['email'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li>
                 <li>
                    <label for="email_address" class="required"><em>*</em>Telefon </label>
                    <div class="input-box">
                        <input type="text" name="telefon" value="'.$_SESSION['telefon'].'" title="Adresa email" class="input-text validate-email required-entry" />
                    </div>
                </li>  
                </ul>
        </div>
            <div class="fieldset">
            <h2 class="legend">Informatii autentificare</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="field">
                        <label for="password" class="required"><em>*</em>Utilizator</label>
                        <div class="input-box">
                            <input type="text" name="user" value="'.$_SESSION['user'].'" id="user" title="Parola" class="input-text required-entry validate-password" />
                        </div>
                    </div>
                    <div class="field">
                        <label for="confirmation" class="required"><em>*</em> Parola</label>
                        <div class="input-box">
                            <input type="password" name="parola" value="'.$_SESSION['parola'].'" title="Confirmare parola" id="confirmation" class="input-text required-entry validate-cpassword" />
                        </div>
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

case 'validare':
require_once('validare_mail.php');
$_SESSION['nume'] = $_POST['nume'];
$_SESSION['prenume'] = $_POST['prenume'];
$_SESSION['adresa'] = $_POST['adresa'];
$_SESSION['data_nasterii'] = $_POST['data_nasterii'];
$_SESSION['telefon'] = $_POST['telefon'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['user'] = $_POST['user'];
$_SESSION['parola'] = $_POST['parola'];


if(($_SESSION['nume'] == '') || ($_SESSION['prenume'] == '') || ($_SESSION['adresa'] =='') || ($_SESSION['data_nasterii']=='') || ($_SESSION['telefon'] == '') || ($_SESSION['email'] == '') || ($_SESSION['user'] == '') || ($_SESSION['parola']=='') )
{
echo 'Nu ai introdus date in formular sau cele introduse nu sunt corecte. <br>
      Apasa <a href="inregistrare.php">aici</a> pentru a te intoarce la pagina anterioara.';
} 
else if( !preg_match("/^07[0-9]{8}$/",$_SESSION['telefon'])){
    echo'Numarul de telefon nu este valid!';
}else if( !is_email($_SESSION['email'])){
    echo'Email-ul nu este valid!';
}else if( strlen($_SESSION['parola'])<6 || $_SESSION['parola']==$_SESSION['user']){
    echo'Parola nu este valida!';
}else if( !preg_match("/^1[0-9]{3}$/",$_SESSION['data_nasterii'])){
    echo'anul  nu este valid!';
}
else{ $int="Select * from licitatia.client where user='".$_SESSION['user']."' ";
    $x=mysql_query($int);
    $randuri=mysql_num_rows($x);
    if($randuri>0){
        echo'User taken!';}
        else{
echo 'Va multumim. <br> 
      Datele au fost introduse cu succes in baza de date. <br>
	  Pentru a va autentifica apasati <a href="autentificare.php">aici</a>.';

$cerereSQL = "INSERT INTO  `client` (`nume`, `prenume`, `adresa`, `data_nasterii`, `telefon`, `email`,`user`,`parola`)
	          VALUES ('".addentities($_SESSION['nume'])."', '".addentities($_SESSION['prenume'])."', '".addentities($_SESSION['adresa'])."', '".addentities($_SESSION['data_nasterii'])."', '".addentities($_SESSION['telefon'])."', '".addentities($_SESSION['email'])."','".addentities($_SESSION['user'])."','".md5($_SESSION['parola'])."')";
mysql_query($cerereSQL);

$_SESSION['nume'] = '';
$_SESSION['prenume'] = '';
$_SESSION['adresa'] = '';
$_SESSION['data_nasterii'] = '';
$_SESSION['telefon'] = '';
$_SESSION['email'] = '';
$_SESSION['user'] = '';
$_SESSION['parola'] = '';

}
    }
break;

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