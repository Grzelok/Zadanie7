<?php
session_start();
$user = $_SESSION['login'];
$userdb = '25510036_z7';
$passdb = 'martin12';
$selectdb = '25510036_z7';
$link = mysqli_connect('grzelok.com.pl', $userdb,$passdb, $selectdb);
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
if($rekord['proba'] == 3)
{
echo "Konto zablokowane z powodu zbyt duzej ilosci blednych logowan<br>";
echo "Aby odblokowac konto napisz do admin@admin.pl<br>";
echo "<a href='login_klient.php'>Powrot</a></br>";
}
else
{
	echo "logowanie udane<br>";
	echo "ostatnie nieudane logowanie".$rekord['data_error']."<br>";
	echo "<a href='zalogowany.php'>Przejdz do chmury</a></br>";
}