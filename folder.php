<?php
session_start();
$user = $_SESSION['login'];
$folder = $_POST['plik'];
$_SESSION['folder'] = $folder;
?>
<html>
<body>
<h2>Wrzuc plik</h2>
<form action="odbierz2.php" method="POST"
ENCTYPE="multipart/form-data">
<input type="file" name="plik"/>
<input type="submit" value="Wyślij plik"/><br>
</form>
<h2>Twoje pliki kliknij aby pobrac w katalogu <? echo $user."/".$folder?>/</h2>
<?php
chdir("$user/$folder");
foreach(glob("*{*.txt,*.pdf,*.zip,*.rar,*.exe,*.doc,*.docx,*.xls,*.xlsx,*.jpg,*.gif,*.png}", GLOB_BRACE) as $file)
  if($file != '.' && $file != '..') 
    echo "<a href='./$user/$file' download>$file</a><br>";
?>
<br>
<br>
<br>
<a href = "zalogowany.php">Powrot do glownego katalogu</a>

</body>
</html>