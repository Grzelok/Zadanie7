<?php
$server = 'serwer1745789.home.pl';
$userdb = '25510036_z7';
$passdb = 'martin12';
$selectdb = '25510036_z7';
$connect = mysqli_connect($server,$userdb,$passdb);
$choose = mysqli_select_db($connect,$selectdb);
$login = $_POST['login'];
$haslo = $_POST['haslo'];
if (IsSet($_POST['zarejestruj'])) {
	$query = mysqli_query($connect,"select * from users where user='$login'")or die('blad');
	$rekord = mysqli_fetch_array($query);
	if($rekord['user']==$login)
	{
		echo "Podany login juz istnieje<br>";
		echo "<a href='rejestracja.php'>Powrot</a>";
	}
	else
	{
	echo "Zarejestrowano pomyslnie<br>";
	$czas1 = time ();
	$czas2 = date ("d:m:Y H:i:s", $czas1);
	$dodaj = mysqli_query($connect, "insert into users (user, pass, data_ok) values ('$login', '$haslo', '$czas2')");
	echo "<br><a href='login_klient.php'>Przejdz do logowania</a>";
	}
}