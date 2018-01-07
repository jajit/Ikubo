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

        <!-- Codigo para cargar páginas con jquery AJAX -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#nagusia").click(function(){
                    $("#content").load("nagusia.php?hizk="+ hizkuntza);
                    itzaliBotoiak();
                    aldatuAtala("nagusia");

                });
                $("#berriak").click(function(){
                    $("#content").load("berriak.php?hizk="+ hizkuntza);
                    itzaliBotoiak();
                    aldatuAtala("berriak");
                });
                $("#aktak").click(function(){
                    $("#content").load("aktak.php?hizk="+ hizkuntza);
                    itzaliBotoiak();
                    aldatuAtala("aktak");
                }); 
            });
        </script>
    </head>
    <body onload="kargatuHizkuntza('eu'); $('#content').load('main.html');" style="position: relative; min-height: 100%; top: 0px" onscroll="goraPegatu()">

        <div style="margin:0;padding:0;"class="header">
            <div>
                <img src="src/ikubo_motza.png" style="width:20vw;vertical-align: middle;">
                <p id="tituloa">Informatikako Ikasle Independenteak</p>
            </div>
        </div>

        <div id="navbar">
            <ul style="list-style-type: none; margin: 0px; padding: 0px">
                <li><a id="nagusia" class="active atalBotoia" href="#nagusia">Orri Nagusia</a></li>
                <li><a id="berriak" class="atalBotoia" href="#berriak">Berriak</a></li>
                <li><a id="aktak" class="atalBotoia" href="#aktak">Aktak</a></li>
                <div style="float:right;">
                    <li style="display:inline-block;float:right;">
                        <a href="#" onclick="laguntza(); return false;";>Kontaktua
                        </a>
                    </li>
                    <li style="float:right;"><a id="saioa" class="botoia" href="#" onclick="saioa(); return false;">Hasi saioa</a></li>
                    <li style="float:left;"><a style="padding:0;"id="euskbtn" class="botoia" href="#" onclick="kargatuHizkuntza('eu'); return false;"><img class="botoiimg" alt="Euskera" src="src/euskara.png"></a></li>
                    <li style="float:right;"><a style="padding:0;"id="castbtn" class="botoia active" href="#" onclick="kargatuHizkuntza('es'); return false;"><img class="botoiimg" alt="Castellano" src="src/castellan.png"></a></li>
                </div>
            </ul>
        </div>

        <div id="content" class="content">
            <h3>Oops!</h3>
            <p>Errore bat okurritu da orrialde hau kargatzen</p>
            <p>Ha ocurrido un error al cargar la página</p>
            <a href="http://www.ikubo.eus">Inténtalo de nuevo - Berriro saiatu</a>
        </div>
        
        <!-- Login Modal -->
        <div id="loginmodal" class="modal">
          <form class="modal-content fadeIn">
            <div class="imgcontainer">
              <span id="closeLogin" class="close" title="Close Modal">&times;</span>
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
              <button type="button" onclick="document.getElementById('loginmodal').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form>
        </div>

        <!-- Contact Modal -->
        <div id="contactModal" class="modal">
            <form id="contactForm" method="post" action="email.php" class="modal-content fadeIn">
                <div class="imgcontainer">
                    <span id="closeContact" class="close" title="Close Contact">&times;</span>
                </div>

                <div class="container">
                    <label><b>E-mail</b></label>
                    <input type="text" placeholder="Enter e-mail" name="email" required>

                    <label><b>Subject</b></label>
                    <input type="text" placeholder="Enter subject of email" name="subject" required>

                    <!--<label><b>Content</b></label>-->
                    <textarea cols="183" rows ="15" form="contactForm" placeholder="Write something here..." name="content" required></textarea>

                    <button type="submit">Send e-mail</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('contactModal').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>        
        
        <!-- News Modal -->
        <div id="newsModal" class="modal">               
            <div class="modal-content fadeIn">                  
                <span id="closeNews" class="close" title="Close Modal">  
                    &times;        
                </span>
                <div id="berriak_edukia">
                </div>
            </div>
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
            var modalLogin = document.getElementById("loginmodal");
            var spanLogin = document.getElementById("closeLogin");

            var modalContact = document.getElementById("contactModal");
            var spanContact = document.getElementById("closeContact");
            
            var modalNews = document.getElementById("newsModal");
            var spanNews = document.getElementById("closeNews");


            spanLogin.onclick = function(){
                modalLogin.style.display = "none";
            }
            spanContact.onclick = function(){
                modalContact.style.display = "none";
            }
            spanNews.onclick = function(){
                modalNews.style.display = "none";
            }

            // Kanpoan sakatzerakoan, izkutatu
            window.onclick = function(event) {
                if (event.target == modalLogin) {
                    modalLogin.style.display = "none";
                }
                else if (event.target == modalContact){
                    modalContact.style.display = "none";
                }
                else if (event.target == modalNews){
                    modalNews.style.display = "none";
                }
                
            }
            function saioa(){
                modalLogin.style.display = "block";
            }
            function laguntza(){
                modalContact.style.display = "block";
            }
            function irekiBerria(id_berria, hizk){
                $("#berriak_edukia").load("db.php?id=" + id_berria + "&hizk=" + hizk);
                modalNews.style.display = "block";
            }

        </script>
    </body>
</html>
