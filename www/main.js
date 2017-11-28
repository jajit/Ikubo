//Aldagai global bat, hemen gordetzen dugu uneko hizkuntza
 hizkuntza = null;

function kargatuHizkuntza(beste_hizkuntza)
{
   
    if ( hizkuntza === null)
        {
            hizkuntza = "castellano";
        }
    if (beste_hizkuntza !== hizkuntza)
        {
            aldatuHizkuntzaBotoia();
            //TODO: HEMEN LORTZEN DUGU EDUKIA AJAX BIDEZ
            hizkuntza = beste_hizkuntza;
        }
}

//Hizkuntza aldatzerakoan, hauek aukeratzeko botoiak aldatu behar dira

function aldatuHizkuntzaBotoia()
{
    document.getElementById("euskbtn").classList.toggle("active");
    document.getElementById("castbtn").classList.toggle("active");
}

//Laguntza botoiari sakatzerakoan, laguntza orria gure hizkuntzan kargatuko dugu. Horretarako zerbitzariari hizkuntza bidaliko diogu URL aldagai moduan 
function laguntza()
{
    var zer = 'laguntza.php?hizk='+ hizkuntza
    window.location.href = zer;
}

//
