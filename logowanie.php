<?php
session_start();
$userdb = '25510036_z7';
$passdb = 'martin12';
$selectdb = '25510036_z7';
$login=$_POST['login']; // login z formularza
$haslo=$_POST['haslo']; // hasło z formularza
$link = mysqli_connect('grzelok.com.pl', $userdb,$passdb, $selectdb); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT * FROM users WHERE user='$login'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
{
echo "Błąd logowania";
echo "<br><a href='login_klient.php'>Powrot</a><br>";
}
else
{ // Jeśli $rekord istnieje
if($rekord['pass']==$haslo) // czy hasło zgadza się z BD
{
		$_SESSION['zalogowany'] = true;
		$_SESSION['login'] = $login;
		$_SESSION['haslo'] = $haslo;
		$czas1 = time ();
		$czas2 = date ("d-m-Y H:i:s", $czas1);
		$result1 = mysqli_query($link, "update users set data_ok='$czas2' where user='$login'");
		if(!is_dir($login)){																
		mkdir($login);
		header('Location: auth.php');
		}
		else{
		header('Location: auth.php');
		}
}
else
{
		$_SESSION['login'] = $login;
		$czas1 = time ();
		$czas2 = date ("d-m-Y H:i:s", $czas1);
		$proba = $rekord['proba'];
		$proba++;
		$result1 = mysqli_query($link, "update users set data_error='$czas2', proba='$proba' where user='$login'");
mysqli_close($link);
header('Location: auth.php');
}
}
?>