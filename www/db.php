<?php

if(isset($_GET['id']))
{
    echo getBerriOsoa($_GET['id']);
}
//if(isset($_GET('user') and isset($_GET('password')))){TODO: BETE HAU}

    function makeQuery($query){
        $conection = mysqli_connect("localhost", "root", "", "ikubo_web");
        if (!$conection) return -1;
        $resultQuery = $conection->query($query);
        mysqli_close($conection);
        return $resultQuery;
    }
    function loadBerriak(){
        $done = false;
        $code = "";
        $query = makeQuery("SELECT id_noticia, autor, titulo, version_corta FROM noticias");
        while(!$done){
            $result = $query->fetch_assoc();
            if ($result == ""){
                $done = true;
            }
            else{
                $code .="<div class='berriak-small'>";    
                $code .="<a href='#' onclick='irekiBerria(". $result["id_noticia"] ."); return false;'>";
                $code .="<h2 style='margin-top: 0; margin-bottom: 0; font-weight: bold;'>" . $result["titulo"] . "</h2>";
                $code .= "</a>";
                $code .="<h5 style='margin-top: 0; margin-bottom: 0; font-weight: bold;'>By: " . $result["autor"] . "</h5>";
                $code .="<p style='margin-top: 0; margin-bottom: 0;'>" . $result["version_corta"] ."</p>";
                $code .= "</div>";
            }
        }
        echo $code;        
    }
    function getBerriOsoa($id_berria){
        $query = makeQuery("SELECT * FROM noticias WHERE id_noticia=". $id_berria ."" );
        $result = $query->fetch_assoc();
        $code = "";
        $code .="<h2>". $result["titulo"] ."</h2>";
        $code .="<h5>By: ". $result["autor"] . "</h5>";
        $code .="<p>". $result["version_completa"] ."</p>";
        echo $code;
    }

    function loadAktak(){
        $done = false;
        $code = "";
        $query = makeQuery("SELECT * FROM actas");
        while (!$done){
            $result = $query->fetch_assoc();
            if($result == "") $done = true;
            else{
                $code .="<div class='berriak-small'>";    
                $code .="<a href='". $result["url"] ."'>";
                $code .="<h2 style='margin-top: 0; margin-bottom: 0; font-weight: bold;'>" . $result["titulo"] . "</h2>";
                $code .= "</a>";
                $code .= "</div>";
            }
        }
        echo $code;
    }

//  function checkErabiltzailea(erabiltzaile, pasahitza){TODO: BETE}
?>