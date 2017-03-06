<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Stadiul lucrarii casa Sacalaz. Trasare casa, sapare fundatie, ridicare,zidarie</title>
<meta name="description" content="Etapele lucrarii casei de la Sacalaz Timisoara. Poze ridicare casa Sacalaz.">
<meta name="keywords" content="">
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="openwindow.js"></script>
</head>
<body>
<table width="700" height="600" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" align="center">
	<tr>
		<td height="35" style="background: url(images/bg_top.gif); background-repeat: repeat-x; border:3px solid #4C4C4C; border-top:0px">
			<?php
			@include 'tabel-header.php';
			?>
		</td>
	</tr>
	<tr>
		<td height="100" style="padding-top:8px;">
			<?php
			@include 'tabel-meniu.php';
			function stabiliredimensiuni($lungime,$latime)
				{
					if ($lungime > $latime)
						{
							return 'width="450" height="337"';
						}//sf if
						else 	
							if ($lungime < $latime)
								{
									return 'width="337" height="450"';
								}//sfarsit if
								else 
									return 'width="450" height="450"';
				}
			?>
		</td>
	</tr>
	<tr>
		<td style="padding-top:8px; padding-bottom:8px;">
			<!--inceput tabel continut mare----->
			<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" summary="">
				<tr>
					<td width="200" style="border:3px solid #FFFFFF; background: #e0dfe3" valign="top">
						<font class="fonttextgalben">
						<br>	
						<?php
						$cerereSQLmeniu = 'SELECT * FROM `stadiul_lucrarii_sacalaz` ORDER BY `stadiul_lucrarii_sacalaz`.`id_stadiul_lucrarii` ASC';
						$rezultatmeniu = @mysql_query($cerereSQLmeniu);
						if (@mysql_num_rows($rezultatmeniu) !=0)
							{
								while($randmeniu = @mysql_fetch_array($rezultatmeniu))
									{
										$var=@str_replace(" ","-",@strtolower($randmeniu['titlu']));
										echo'&nbsp;&nbsp;• <a class="meniulateral" href="stadiul-lucrarii-casa-sacalaz.php?p='.$var.'&id='.$randmeniu['id_stadiul_lucrarii'].'">'.$randmeniu['titlu'].'</a><br>';
									}//sfarsit while
							}//sfarsit if
						?>
					</td>
					<td width="4">&nbsp;</td>
					<td style="border:3px solid #FFFFFF; background: #e0dfe3" align="center" valign="top">
						<!--inceput tabel continut----->
						<table width="95%" height="95%" border="0" cellpadding="0" cellspacing="0" summary="">
						<tr>
							<td align="left" valign="top">
								<br>
								<table border="0" cellpadding="0" cellspacing="0" summary="">
									<tr>
										<td width="20" height="25" style="border:2px solid #FFFFFF; background: url(h2_bg.jpg) #f0af37">&nbsp;</td>
										<td>
											<font class="fonttext">&nbsp;&nbsp;<b>Stadiul lucrarii casa Sacalaz</b></font>
										</td>
									</tr>
								</table>
								<br>
								<?php
								//afisare continut
								if ((@isset($_GET['p'])) && (@isset($_GET['id'])))
									{
										//afisare titlu + poza continut
										$cerereSQLcontinut = 'SELECT * FROM `stadiul_lucrarii_sacalaz` WHERE id_stadiul_lucrarii="'.$_GET['id'].'"';
										$rezultatcontinut = @mysql_query($cerereSQLcontinut);
										$randcontinut = @mysql_fetch_array($rezultatcontinut);
								 		echo'<font class="fonttext">&nbsp;&nbsp;<b>'.$randcontinut['titlu'].' - click pe poza pentru marire</b></font><br><br>';
								 		@list($x, $y) = @getimagesize('poze-casa-sacalaz/stadiul-lucrarii/'.$randcontinut['nume_poza'].'');
								 		
								 		//echo'<table align="center" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;" border="0"><tr><td><a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-stadiul-lucrarii.php?numepoza='.$randcontinut['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/stadiul-lucrarii/'.$randcontinut['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0"></a></td></tr></table><br><br>';
										echo'<table align="center" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;" border="0"><tr><td><a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-stadiul-lucrarii.php?numepoza='.$randcontinut['nume_poza'].'\',1024,768)"><img class="poze" src="poze-casa-sacalaz/stadiul-lucrarii/'.$randcontinut['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0"></a></td></tr></table><br><br>';
									}//sfarsit if
									else 
										{
												echo'Click pe linkurile din partea stanga pentru a vedea poze cu etapele lucrarii casei de la Sacalaz !';
										}//sfarsit else
								?>
							</td>
						</tr>
					</table>
						<!--sfarsit tabel continut----->
					</td>
				</tr>
			</table>
			<!--sfarsit tabel continut mare----->
		</td>
	</tr>
	<tr>
		<td height="50" style="background: url(images/bg_top.gif); background-repeat: repeat-x; border:3px solid #4C4C4C; border-bottom:0px;">
			<?php
			@include 'tabel-copyright.php';
			?>
		</td>
	</tr>
</table>

</body>
</html>