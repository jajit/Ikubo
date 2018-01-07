<?php
//if (!session_id()) session_start();     
if(isset($_GET['id']) && isset($_GET['hizk']))
{
    echo getBerriOsoa($_GET['id'],$_GET['hizk']);
}
    //Query bat egiten dio datu euskarazko edo gaztelerazko datu baseari
    function makeQuery($query, $hizk){
        if ($hizk == "es") $conection = mysqli_connect("localhost", "ikubo", "nacle", "ikubo_web-es");
        else if ($hizk == "eu") $conection = mysqli_connect("localhost", "ikubo", "nacle", "ikubo_web-eu");
        if (!$conection) return -1;
        $resultQuery = $conection->query($query);
        mysqli_close($conection);
        return $resultQuery;
        
    }

    // Berriak datu-basetik hartzen ditu 
    function loadBerriak($hizk){
        $done = false;
        $code = "";
        $query = makeQuery("SELECT id_noticia, autor, titulo, version_corta FROM noticias ORDER BY id_noticia DESC", $hizk);
        while(!$done){
            $result = $query->fetch_assoc();
            if ($result == ""){
                $done = true;
            }
            else{
                $code .="<div class='berriak-small'>";    
                $code .="<a href='#' onclick='irekiBerria(". $result["id_noticia"] . "); return false;'>";
                $code .="<h2 style='margin-top: 0; margin-bottom: 0; font-weight: bold;'>" . $result["titulo"] . "</h2>";
                $code .= "</a>";
                $code .="<h5 style='margin-top: 0; margin-bottom: 0; font-weight: bold;'>By: " . $result["autor"] . "</h5>";
                $code .="<p style='margin-top: 0; margin-bottom: 0;'>" . $result["version_corta"] ."</p>";
                $code .= "</div>";
            }
        }
        echo $code;        
    }
    //Berri oso bat hartzen du db-tik
    function getBerriOsoa($id_berria, $hizk){
        $query = makeQuery("SELECT * FROM noticias WHERE id_noticia=". $id_berria, $hizk);
        $result = $query->fetch_assoc();
        $code = "";
        $code .="<h2>". $result["titulo"] ."</h2>";
        $code .="<h5>By: ". $result["autor"] . "</h5>";
        $code .="<p>". $result["version_completa"] ."</p>";
        echo $code;
    }

    //Akten lista hartzen du db-tik
    function loadAktak($hizk){
        $done = false;
        $code = "";
        $query = makeQuery("SELECT * FROM actas", $hizk);
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
    //Artikulu berri bat sartzen du db-an
    function igoArtikulua($title, $author, $text, $eusk){
    if($eusk == "bai"){
        $hizk = "eu";
    }
    else{
        $hizk = "es";
    }
    $bertsio_motza = wordwrap($text, 150);
    $query = makeQuery("INSERT INTO noticias(id_noticia, autor, titulo, version_corta, version_completa) VALUES (0,'". $author ."','" . $title . "','". $bertsio_motza . "','" . $text .  "')", $hizk);
        
}

    //Erabiltzaile bat existitzen den ala ez esaten du
    function checkUser(){
      $query = makeQuery("SELECT * FROM usuario WHERE username='". $_SESSION['user'] ."' AND password='". $_SESSION['password'] ."'");
      $result = $query->fetch_assoc();
      if($result == "") {$_SESSION['valid'] = false;}
      else{$_SESSION['valid'] = true;}
  }
?>
