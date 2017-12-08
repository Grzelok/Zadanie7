<?php
session_start();
$user = $_SESSION['login'];
$userdb = '25510036_z7';
$passdb = 'martin12';
$selectdb = '25510036_z7';
$link = mysqli_connect('grzelok.com.pl', $userdb,$passdb, $selectdb); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
echo "ostatnie nieudane logowanie ".$rekord['data_error']."<br>";
?>
<html>
<body>
<h2>Wrzuc plik</h2>
<form action="odbierz.php" method="POST"
ENCTYPE="multipart/form-data">
<input type="file" name="plik"/>
<input type="submit" value="Wyślij plik"/><br>
</form>
<h2>Twoje pliki kliknij aby pobrac w katalogu <? echo $user?>/</h2>
<?php
chdir("$user");
foreach(glob("*{*.txt,*.pdf,*.zip,*.rar,*.exe,*.doc,*.docx,*.xls,*.xlsx,*.jpg,*.gif,*.png}", GLOB_BRACE) as $file)
  if($file != '.' && $file != '..') 
    echo "<a href='./$user/$file' download>$file</a><br>";
?>
<form method="post" action="katalog.php">
<h2>Tworzenie katalogu</h2>
<br><input type="text" name="kat" placeholder="Podaj nazwe katalogu"></br>
<br><input type="submit" name="stworz" value="stworz"></br>
</form>
</br>Katalogi
<?php
$katalog = '.';
$kat = opendir($katalog);

while ($plik = readdir($kat))
{
   if(is_dir($plik))
   {
	echo "<form method='post' action='folder.php'>";
	echo "</br><input type='submit' name='plik' value='$plik'></br>";
	echo "</form>";
   }
}
closedir($kat);
?>

</body>
</html>