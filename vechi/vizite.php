<?php
@require_once('bazadedateconfig.php');
$cerereSQLvizite = 'SELECT * FROM `vizite`';
$rezultatvizite = @mysql_query($cerereSQLvizite);
$randvizite = @mysql_fetch_array($rezultatvizite);
//daca sdunt pe index.php, adica pe prima pagina, doar at incrementez contoru
//aici phpself va fi modificat, dc e pe server sau e local, e dif
if($_SERVER['PHP_SELF']== "/index.php")
	{ 
		$contor=($randvizite['contor']+1);
		//actualizez contorul din BD
		$cerereSQLactualizare = 'UPDATE `vizite` SET contor="'.$contor.'" WHERE contor="'.$randvizite['contor'].'"';
		@mysql_query($cerereSQLactualizare);
	}//sfarsit if
	else 
		$contor=$randvizite['contor'];
echo"$contor";
?>