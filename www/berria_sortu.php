<!-- Berri bat igotzeko orri zatia -->
<?php
include 'db.php';
echo $_POST['euskaraz'];
igoArtikulua($_POST['title'], $_POST['author'], $_POST['content'], $_POST['euskaraz']);

echo "Artikulua igo da, itxaron";
header("refresh:2;url=main.php");
die();
?>
