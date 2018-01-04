<?php 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION['valid']=false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="eu-ES">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="main.js"></script>
    </head>
    <body onload="kargatuHizkuntza(&quot;euskera&quot;)" style="position: relative; min-height: 100%; top: 0px" onscroll="goraPegatu()">

        <div style="margin:0;padding:0;"class="header">
            <div>
                <img src="src/ikubo_motza.png" style="width:20vw;vertical-align: middle;">
                <p id="tituloa">Informatikako Ikasle Independenteak</p>
            </div>
        </div>

        <div id="navbar">
            <ul style="list-style-type: none; margin: 0px; padding: 0px">
                <li><a class="active" href="main.php">Orri Nagusia</a></li>
                <li><a href="berriak.php">Berriak</a></li>
                <div style="float:right;">
                    <li style="display:inline-block;float:right;">
                        <a href="#" onclick="laguntza(); return false;";>Kontaktua
                </a>
            </li>
                    <li style="float:right;"><a id="saioa" class="botoia" href="#" onclick="saioa(); return false;">Hasi saioa</a></li>
                    <li style="float:left;"><a style="padding:0;"id="euskbtn" class="botoia" href="#" onclick="kargatuHizkuntza(&quot;euskera&quot); return false;"><img class="botoiimg" alt="Euskera" src="src/euskara.png"></a></li>
                    <li style="float:right;"><a style="padding:0;"id="castbtn" class="botoia active" href="#" onclick="kargatuHizkuntza(&quot;castellano&quot); return false;"><img class="botoiimg" alt="Castellano" src="src/castellan.png"></a></li>
                </div>
            </ul>
        </div>

        <div class="content">
            <h3>Oops!</h3>
            <p>Errore bat okurritu da orrialde hau kargatzen</p>
            <p>Ha ocurrido un error al cargar la página</p>
            <a href="http://www.ikubo.eus">Inténtalo de nuevo - Berriro saiatu</a>
        </div>
        
        <!-- Aqui he intentado hacer la mierda esa del modal del login-->
        <div id="loginmodal" class="modal">
          <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container">
              <label><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="uname" required>

              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>

              <button type="submit">Login</button>
              <input type="checkbox" checked="checked"> Remember me
            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form>
        </div>
        
        <script>
            var navbar = document.getElementById("navbar")
            var sticky = navbar.offsetTop;
            function goraPegatu() {
                if (window.pageYOffset >= sticky) 
                { navbar.classList.add("sticky"); }
                else
                { navbar.classList.remove("sticky"); }
            }
            
            // Login egiteko modal-a
            var modal = document.getElementById("loginmodal");

            // Kanpoan sakatzerakoan, izkutatu
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>