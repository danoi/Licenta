
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="licitatiistyle.css"/>
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
    <ul id="menu">
        <li><a class="active" href="index.html">Acasa</a></li>
        <li><a class="active" href="index.html">Vinde</a></li>
        <li><a class="active" href="index.html">Licitatii</a></li>
        <li><a class="active" href="index.html">Inregistrare</a></li>
        <li><a class="active" href="index.html">Ajutor</a></li>
        
    </ul>
     <div id="featured" style="float: left;"> 
            <img src="images/img5.jpg"/>
            <img src="images/img6.jpg"/>
            <img src="images/img7.jpg"/>
                    
        </div>
    </div>

 <div id="content">
        <div id="login">
            Utilizator:<input type="textbox">
            Parola:<input type="password"><br>
            <button style="margin-top:10px; background-color:#4169E1;width:100px; height:30px;" >Login</button>
    </div>
      <div class="cautare">
        <h1 style="color:#4169E1;">Cautare detaliata de licitatii</h1>
        <?php
require_once 'config.php';

if(!isset($_GET['pag'])) $_GET['pag'] = '';
if(!isset($_SESSION['marca'])) $_SESSION['marca'] = '';
if(!isset($_SESSION['tipm'])) $_SESSION['tipm'] = '';
if(!isset($_SESSION['tipc'])) $_SESSION['tipc'] = '';
if(!isset($_SESSION['an'])) $_SESSION['an'] = '';
switch($_GET['pag']) {

case '':
        
       echo' <form id= "lets_search" action="cautare.php?pag=cautare" method="post" name="cautareform">
        <div id="block">
        <div class="left-block-search">
            <label>Marca</label><br>
            <select class="selectbox" size="4">
                <option selected="selected" value="0" name="marca">Toate</option>
                <option value="1">Alfa Romeo</option>
                <option value="1">skoda</option>
            </select>
        
        </div>
        <div class="right-block-search">
            <label>Tipul Masinii</label><br>
            <select class="selectbox" size="4"type="width:60px;" name="tipm">
                <option selected="selected" value="0">Toate</option>
                <option value="1">camioneta</option>
            </select>
        
        </div>
        <div class="left-block-search">
            <label>Tip Combustibil</label><br>
            <select class="selectbox" size="4" name="tipc">
                <option selected="selected" value="0">Toate</option>
                <option value="1">Benzina</option>
                <option value="2">motorina</option>
            </select>
        
        </div>
        <div class="right-block-search">
            <label>An Inregistrare</label><br>
            <select  class="selectbox" size="4" name="an">
                <option  style="color: #C8DEF4;"selected="selected" value="0">Toate</option>
                <option value="1">2000</option>
                <option value="2">1999</option>
            </select>
        
        </div>
        <div class="left-block-search">
            <label>Kilometri rulati</label><br>
            <select class="selectbox" size="4" name="km">
                <option selected="selected" value="0">Toate</option>
                <option value="1">800</option>
            </select>
        
        </div>
        </div>
        <input type="submit" value="Cauta" style="margin-top:20px; width:100px; background-color:#4169E1;"/>
        
        
        </form>';
        break;

case 'cautare':

if(($_POST['marca'] == '') ||($_POST['tipm'] == '')||($_POST['tipc'] == '')||($_POST['an'] == '')||($_POST['km'] == '')) {
echo 'Introdu un cuvant pentru a cauta in baza de date. <br>
      Apasa <a href="cauta.php">aici</a> pentru a te intoarce.';
}  else {
$query= "SELECT * FROM `produs` WHERE marca='".addentities($_POST['marca'])."' and tip_masina='".addentities($_POST['tipm'])."' and tip_combustibil='".addentities($_POST['tipc'])."' and an_inreg='".addentities($_POST['an'])."'";
$rezultat = mysql_query($query);
if(mysql_num_rows($rezultat) > 0) {
	while($rand = mysql_fetch_array($rezultat))	{
    echo '<table>
		 <tbody>
		 <tr>
                        <td id="left"> '.$rand['descriere'].' </td>
                        <td></td>
                        <td>
                            <p><span id="countdown1">2013-02-17 00:00:00 GMT+00:00</span></p>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="bid">
                            <div id="btnliciteaza"><a href=""><span>Liciteaza</span></a></div>
                        </td>
                    </tr>
        </tbody>
        <table>';
	}   
} else {
echo 'Nu au fost gasite rezultate pentru cautarea: <font color="red"><b><i>bla</i></b></font> <br>
	  Apasati <a href="cauta.php">aici</a> pentru a va intoarce';
}

}
   ?>     
      </div>  
        
        
        
 </div>
 <div id="footer">
        
            <p style="text-align: center;">Copyright@liciteazasipleaca.ro
        </div>
        <div class="clear"></div>
  </div>
</body
</html>
