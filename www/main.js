//Aldagai global bat, hemen gordetzen dugu uneko hizkuntza
 hizkuntza = null;
 momentuko_atala = "nagusia"

//Hizkuntza sakatzerakoan, edukia kargatu behar dugu baina hizkuntza horretan
function kargatuHizkuntza(beste_hizkuntza, atal_berria)
{
   
    if ( hizkuntza === null)
        {
            hizkuntza = "eu";
        }
    
            aldatuHizkuntzaBotoia();
            hizkuntza = beste_hizkuntza;
            $("#content").load(momentuko_atala + ".php?hizk="+ hizkuntza);
}

//Hizkuntza aldatzerakoan, hauek aukeratzeko botoiak aldatu behar dira
function aldatuHizkuntzaBotoia()
{
    document.getElementById("euskbtn").classList.toggle("active");
    document.getElementById("castbtn").classList.toggle("active");
}

//Ataletik atalera pasatzerakoan, lehenengo botoi guztiak "itzali" behar dira
function itzaliBotoiak(){
    $(".atalBotoia").each(function() {
    $(this).removeClass("active");
    });
}

//Atal berri batera pasatzerakoan, honen botoia "piztu" behar da,
//eta atal horretan gaudela markatu hizkuntza aldatu behar bada jakiteko
function aldatuAtala(atala){
    piztekoa = document.getElementById(atala);
    piztekoa.classList.add("active");
    momentuko_atala = atala;
    
}

 
