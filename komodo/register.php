<?php
session_start();
$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$adresa=$_POST['adresa'];
$data_nasterii=$_POST['data_nasterii'];
$telefon=$_POST['telefon'];
$email=$_POST['email'];
$username=$_POST['user'];
$password=md5($_POST['parola']);
if($nume&&$prenume&&$adresa&&$data_nasterii&&$telefon&&$email&&$username&&$password){
    $connect=mysql_connect("localhost","root","root") or die ("couldnt connect with database");
     mysql_select_db("licitatia") or die ("couldnt find database");

    if(empty($username)){
        echo("You have to fill an username!");
        
    }else{if(empty($nume)){
        echo("You have to fill a nume!");
    }else{if(empty($prenume)){
        echo("You have to fill a prenume!");
    }else{if(empty($telefon)){
        echo("You have to fill a telefon!");
    }else{if(empty($email)){
         echo("You have to fill a email!");
    }
    else{
        if(empty($password)){
            echo("You have to fill a password!");
        }else{
             
            $query=mysql_query("select * from client where user='$username'");
            
            $rows=mysql_num_rows($query);
            if($rows>0){
                die("username taken!");
            }
            else{
               
                 $insert=" INSERT INTO `licitatia`.`client` (`nume`,`prenume`,`adresa`,`data_nasterii`,`telefon,email`,`user`,`parola`)  VALUES ('$nume' , '.$prenume.', '$adresa', '$data_nasterii', '$telefon','$email','$username','$password') ";
                 if(!mysql_query($insert)){
                    echo("fail");
                    
                 }else{
                echo "Inserted!";}
               
                    
                    
                }
            }
        }
    }
}
}
}
    }


?>