<?php
session_start();
$user = $_SESSION['login'];
?>
<html>
<body>
<h2>Wrzuc plik</h2>
<form action="odbierz.php" method="POST"
ENCTYPE="multipart/form-data">
<input type="file" name="plik"/>
<input type="submit" value="Wyślij plik"/><br>
<h2>Twoje pliki kliknij aby pobrac</h2>
<?php
$dir = "./$user/";
if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
		  echo "<a href='./$user/$entry' download>$entry</a><br>";
        }
    }
    closedir($handle);
}
?>
</form>
</body>
</html>