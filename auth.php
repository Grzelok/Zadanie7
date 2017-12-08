<?php
session_start();
$user = $_SESSION['login'];
$userdb = '25510036_z7';
$passdb = 'martin12';
$selectdb = '25510036_z7';
$haslo = $_SESSION['haslo'];
$link = mysqli_connect('grzelok.com.pl', $userdb,$passdb, $selectdb);
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
if($rekord['proba'] >= 3)
{
echo "Konto zablokowane z powodu zbyt duzej ilosci blednych logowan<br>";
echo "Aby odblokowac konto napisz do admin@admin.pl<br>";
echo "<a href='login_klient.php'>Powrot</a></br>";
}
else
{
	if($rekord['pass']==$haslo)
	{
		$proba = 0;
	$result1 = mysqli_query($link, "update users set proba='$proba' where user='$user'");
	header('Location: zalogowany.php');
	unset($_SESSION['haslo']);
	}
	else
	{
	echo "Błąd logowania";
	echo "<br><a href='login_klient.php'>Powrot</a><br>";
	}
}