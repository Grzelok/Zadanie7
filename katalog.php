<?php
session_start();
$user = $_SESSION['login'];
$name=$_POST['kat'];
$_SESSION['folder'] = $name;
chdir("$user");
if(!is_dir($name)){																
		mkdir($name);
		header('Location: zalogowany.php');
		}
		else
		{
			echo "katalog $name istnieje";
		}
?>