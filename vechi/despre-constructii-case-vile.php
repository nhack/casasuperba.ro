<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Despre noi - constructii de case si vile la cheie Timisoara</title>
<meta name="description" content="detalii despre experienta executie, constructie case, proiectare de rezistenta, lucrari executate">
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
							return 'width="120" height="90"';
						}//sf if
						else 	
							if ($lungime < $latime)
								{
									return 'width="90" height="120"';
								}//sfarsit if
								else 
									return 'width="120" height="120"';
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
						<font class="fonttextverde">
						<br>
						<?php
						$cerereSQLmeniu = 'SELECT * FROM `despre_noi_meniu`';
						$rezultatmeniu = @mysql_query($cerereSQLmeniu);
						if (@mysql_num_rows($rezultatmeniu) !=0)
							{
								while($randmeniu = @mysql_fetch_array($rezultatmeniu))
									{
										$var=@str_replace(" ","-",@strtolower($randmeniu['nume_meniu']));
										echo'&nbsp;&nbsp;• <a class="meniulateral" href="despre-constructii-case-vile.php?p='.$var.'&id='.$randmeniu['id_meniu'].'">'.$randmeniu['nume_meniu'].'</a><br>';
									}//sfarsit while
							}//sfarsit if
						?>
						</font>
						
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
										<td width="20" height="25" style="border:2px solid #FFFFFF; background: url(h2_bg.jpg) #7fbc2d">&nbsp;</td>
										<td>
											<font class="fonttext">&nbsp;&nbsp;<b>Despre noi</b></font>
										</td>
									</tr>
								</table>
								<br>
								<?php
								if ((@isset($_GET['p'])) && (@isset($_GET['id'])))
									{
										//afisare titlu continut
										$cerereSQLcontinut = 'SELECT * FROM `despre_noi_meniu` WHERE id_meniu="'.$_GET['id'].'"';
										$rezultatcontinut = @mysql_query($cerereSQLcontinut);
										$randcontinut = @mysql_fetch_array($rezultatcontinut);
								 		echo'<font class="fonttext">&nbsp;&nbsp;<b>'.$randcontinut['nume_meniu'].'</b></font><br><br>';
								 		//afisare continut
								 		$cerereSQLcontinut1 = 'SELECT * FROM `despre_noi_continut` WHERE id_despre_noi_meniu="'.$_GET['id'].'"';
										$rezultatcontinut1 = @mysql_query($cerereSQLcontinut1);
										$randcontinut1 = @mysql_fetch_array($rezultatcontinut1);
										if ($randcontinut1['text_continut'] == "")
											{
												$cerereSQLpoze = 'SELECT * FROM `poze_lucrari_executate` ORDER BY `poze_lucrari_executate`.`id_poza_lucrari` ASC';
												$rezultatpoze = @mysql_query($cerereSQLpoze);
												$i=0;
												echo'<table align="center" border="0">
															<tr>';
												while($randpoze = @mysql_fetch_array($rezultatpoze))
													{
														@list($x, $y) = @getimagesize('poze-lucrari/'.$randpoze['nume_poza'].'');
														if (($i % 3) == 0)
															{
																echo'</tr>
																     <tr>
																        <td align="left" width="130">
																			    <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-lucrari/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																		    </td>';
															}//sfarsit if
															else 
																{
																	echo'<td align="left" width="130">
																				 <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-lucrari/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																			 </td>';
																}//sfarsit else	
														$i++;
													}//sfarsit ehile	
												echo'</table>';
											}//sfarsit if
											else
								 				echo''.$randcontinut1['text_continut'].'';
								 		
									}//sfarsit if
									else 
										{
											//afisare titlu continut
											$cerereSQLcontinut = 'SELECT * FROM `despre_noi_meniu` ORDER BY `despre_noi_meniu`.`id_meniu` ASC';
											$rezultatcontinut = @mysql_query($cerereSQLcontinut);
											$randcontinut = @mysql_fetch_array($rezultatcontinut);
								 			echo'<font class="fonttext">&nbsp;&nbsp;<b>'.$randcontinut['nume_meniu'].'</b></font><br><br>';
								 			//afisare continut
									 		$cerereSQLcontinut1 = 'SELECT * FROM `despre_noi_continut` WHERE id_despre_noi_meniu="'.$randcontinut['id_meniu'].'"';
											$rezultatcontinut1 = @mysql_query($cerereSQLcontinut1);
											$randcontinut1 = @mysql_fetch_array($rezultatcontinut1);
									 		echo''.$randcontinut1['text_continut'].'';
										}//sfarsit else
								?>
								<br>
								
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