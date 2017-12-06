<?php
session_start();
$user = $_SESSION['login'];
$folder = $_SESSION['folder']; 
$max_rozmiar = 1000000;
$target = "./$user/$folder/";
if (is_uploaded_file($_FILES['plik']['tmp_name']))
{
if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
else
{echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
if (isset($_FILES['plik']['type'])) {echo 'Typ: '.$_FILES['plik']['type'].'<br/>'; }
move_uploaded_file($_FILES['plik']['tmp_name'],$target.$_FILES['plik']['name']);
}
}
else {echo 'Błąd przy przesyłaniu danych!';}
echo "<br><a href='folder.php'>powrot</a></br>"
?>