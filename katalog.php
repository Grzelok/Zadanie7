<?php
session_start();
$user = $_SESSION['login'];
$name=$_POST['kat'];
chdir("$user");
if(!is_dir($name)){																
		mkdir($name, 7777);
		header('Location: zalogowany.php');
		}
		else
		{
			echo "katalog $name istnieje";
		}
?>