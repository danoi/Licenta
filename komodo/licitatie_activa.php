<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="ajutorstyle.css"/>
    <!-- slider css and script -->
    <link rel="stylesheet" href="css/orbit-1.2.3.css">
    <link rel="stylesheet" href="css/demo-style.css">

    <!-- Attach necessary JS -->

    <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script>

    <!--[if IE]>
    <style type="text/css">
        .timer {
            display: none !important;
        }

        div.caption {
            background: transparent;
            filterrogidXImageTransform . Microsoft . gradient(startColorstr = #99000000, endColorstr = #99000000);
            zoom: 1;
        }
    </style>
    <![endif]-->

    <!-- Run the plugin -->
    <script type="text/javascript">
        $(window).load(function () {
            $('#featured').orbit();
        });

        $(document).ready(function () {
            if (!("WebSocket" in window)) {
                $('#chatLog, input, button, #examples').fadeOut("fast");
                $('<p>Oh no, you need a browser that supports WebSockets. How about <a href="http://www.google.com/chrome">Google Chrome</a>?</p>').appendTo('#container');
            } else {
                //The user has WebSockets

                function connect() {
                    var socket;
                    window.alert('Here');
                var host = "ws://127.0.0.1:8000/demo";
                //                var host = "ws://localhost:8000/demo";

                    try {
                        var socket = new WebSocket(host);

                        message('<p class="event">Socket Status: ' + socket.readyState);

                        socket.onopen = function () {
                            message('<p class="event">Socket Status: ' + socket.readyState + ' (open)');
                        }

                        socket.onmessage = function (msg) {
                            message('<p class="message">Someone sent: ' + msg.data);
                        }

                        socket.onclose = function () {
                            message('<p class="event">Socket Status: ' + socket.readyState + ' (Closed)');
                        }

                    } catch (exception) {
                        message('<p>Error' + exception);
                    }

                    function send() {
                        var text = $('#bid').val();

                        if (text == "") {
                            message('<p class="warning">Please enter a message');
                            return;
                        }
                        try {
                            socket.send(text);
                            message('<p class="event">Eu am licitat: ' + text)

                        } catch (exception) {
                            message('<p class="warning">');
                        }
                        $('#bid').val("");
                    }

                    function message(msg) {
                        $('#chatLog').append(msg + '</p>');
                    }

                    $('#place_bid').click(function (event) {
                        send();
                    });

                    $('#disconnect').click(function () {
                        socket.close();
                    });

                }//End connect

                connect();

            }//End else

        });


        function onClick() {
//		$('#oferte')
            window.alert('onClick');
        }
    </script>

    <!-- end slider css and script -->
    <title>danoibla</title>
</head>
<body>
<div id="container">
    <div id="header">
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
       <?php
         require_once('config.php');
      
	
	
     $query="Select  distinct licitatie.nume_licitatie,licitatie.data_term,licitatie.data_inc,produs.marca,
     produs.tip_masina,produs.pret_max,produs.pret_min
     from licitatia.produs,licitatia.client,licitatia.licitatie,licitatia.vanzare
     where produs.codm='".$_GET['id']."' and produs.codm=licitatie.codm ";
    
	
	$rezultat = mysql_query($query);
	if(mysql_num_rows($rezultat) > 0) {
            while($rand=mysql_fetch_array($rezultat)){
            echo'<h3>'.$rand['nume_licitatie'].'</h3>
            <h4>'.$rand['marca'].'   '.$rand['tip_masina'].'</h4>
            <p>Licitatia se va sfarsi la data de:'.$rand['data_term'].'
            Timp disponibil:</p>
            <h4>Pretul minim:'.$rand['pret_min'].'</h4>
            <h4>Suma maxima:'.$rand['pret_max'].'</h4><input type="submit"   value="Cumpara acum!"/>
            
            ';
            
            
            
            
            }}
            
       ?>
        
        
        <div id="chatLog"/>
        <div>
            <input type="text" name="bid" id="bid"/>
           
            <input type="button" value="Place bid" id="place_bid"/><p>*suma introdusa trebuie sa fie mai mare decat ultima suma licitata/pretul minim</p>
                 <input type="button" value="Retragere" id="disconnect"/>
        </div>
        <div id="oferte"></div>
    
    </div>
    <div id="footer">

        <p style="text-align: center;">Copyright@liciteazasipleaca.ro
    </div>
    <div class="clear"></div>
</div>
</body>