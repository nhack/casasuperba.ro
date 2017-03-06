<?php
// Informatii baza de date
$AdresaBazaDate = "localhost";
$UtilizatorBazaDate = "rcas1903";
$ParolaBazaDate = "855171903";
$NumeBazaDate = "rcas1903_constructiicase";
$conexiune = @mysql_connect($AdresaBazaDate,$UtilizatorBazaDate,$ParolaBazaDate)
or die("Nu ma pot conecta la MySQL!");
@mysql_select_db($NumeBazaDate,$conexiune)
or die("Nu gasesc baza de date!");
?>