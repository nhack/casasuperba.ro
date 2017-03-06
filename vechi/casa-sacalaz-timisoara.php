<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Casa Sacalaz Timisoara. Constructii case, vile la Sacalaz</title>
<meta name="description" content="Descriere casa Sacalaz, interior, poze exterior casa, preturi case Sacalaz">
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
						<font class="fonttextroz">
						<br>
						<?php
						$cerereSQLmeniu = 'SELECT * FROM `casa_sacalaz_meniu`';
						$rezultatmeniu = @mysql_query($cerereSQLmeniu);
						if (@mysql_num_rows($rezultatmeniu) !=0)
							{
								while($randmeniu = @mysql_fetch_array($rezultatmeniu))
									{
										$var=@str_replace(" ","-",@strtolower($randmeniu['text_meniu']));
										echo'&nbsp;&nbsp;• <a class="meniulateral" href="casa-sacalaz-timisoara.php?p='.$var.'&id='.$randmeniu['id_meniu'].'">'.$randmeniu['text_meniu'].'</a><br>';
									}//sfarsit while
							}//sfarsit if
						?>
						&nbsp;&nbsp;• <a class="meniulateral" href="stadiul-lucrarii-casa-sacalaz.php" title="Stadiul lucrarii">Poze stadiul lucrarii</a><br>
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
										<td width="20" height="25" style="border:2px solid #FFFFFF; background: url(h2_bg.jpg) #e5257c">&nbsp;</td>
										<td>
											<font class="fonttext">&nbsp;&nbsp;<b>Casa Sacalaz Timisoara</b></font>
										</td>
									</tr>
								</table>
								<br>
								<?php
								//afisare continut
								if ((@isset($_GET['p'])) && (@isset($_GET['id'])))
									{
										//afisare titlu continut
										$cerereSQLcontinut = 'SELECT * FROM `casa_sacalaz_meniu` WHERE id_meniu="'.$_GET['id'].'"';
										$rezultatcontinut = @mysql_query($cerereSQLcontinut);
										$randcontinut = @mysql_fetch_array($rezultatcontinut);
								 		echo'<font class="fonttext">&nbsp;&nbsp;<b>'.$randcontinut['text_meniu'].' - click pe imagine pentru marire</b></font><br><br>';
								 		//afisare continut
									}//sfarsit if
									else 
										{
											//afisare titlu continut
											$cerereSQLcontinut = 'SELECT * FROM `casa_sacalaz_meniu` ORDER BY `casa_sacalaz_meniu`.`id_meniu` ASC';
											$rezultatcontinut = @mysql_query($cerereSQLcontinut);
											$randcontinut = @mysql_fetch_array($rezultatcontinut);
									 		echo'<font class="fonttext">&nbsp;&nbsp;<b>'.$randcontinut['text_meniu'].'</b></font><br><br>';
									 		
									 		//afisare continut
												$cerereSQLtext = 'SELECT * FROM `casa_sacalaz_text` ORDER BY `casa_sacalaz_text`.`id_text` ASC';
												$rezultattext = @mysql_query($cerereSQLtext);
												$randtext = @mysql_fetch_array($rezultattext);
												echo''.$randtext['text'].'';
										}//sfarsit else
								switch ($_GET['id'])
									{
										case 1:
											{
												//afisare continut
												$cerereSQLtext = 'SELECT * FROM `casa_sacalaz_text` WHERE id_meniu="'.$_GET['id'].'"';
												$rezultattext = @mysql_query($cerereSQLtext);
												$randtext = @mysql_fetch_array($rezultattext);
												echo''.$randtext['text'].'';
											}
											break;
										case 2: 
											{
												//afisare continut
												$cerereSQLpoze = 'SELECT * FROM `poze_casa_sacalaz` WHERE locatie_poza="locatie" ORDER BY `poze_casa_sacalaz`.`id_poze` DESC ';
												$rezultatpoze = @mysql_query($cerereSQLpoze);
												$i=0;
												echo'<table align="center" border="0">
															<tr>';
												while($randpoze = @mysql_fetch_array($rezultatpoze))
													{
														@list($x, $y) = @getimagesize('poze-casa-sacalaz/locatie/'.$randpoze['nume_poza'].'');
														if (($i % 3) == 0)
															{
																echo'</tr>
																     <tr>
																        <td align="left" width="130">
																			    <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-locatie.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/locatie/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																		    </td>';
															}//sfarsit if
															else 
																{
																	echo'<td align="left" width="130">
																				 <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-locatie.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/locatie/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																			 </td>';
																}//sfarsit else	
														$i++;
													}//sfarsit while
													echo'</table>';
											}
											break;
										case 3: 
											{
												//afisare continut
												$cerereSQLpoze = 'SELECT * FROM `poze_casa_sacalaz` WHERE locatie_poza="exterior" ORDER BY `poze_casa_sacalaz`.`id_poze` DESC ';
												$rezultatpoze = @mysql_query($cerereSQLpoze);
												$i=0;
												echo'<table align="center" border="0">
															<tr>';
												while($randpoze = @mysql_fetch_array($rezultatpoze))
													{
														@list($x, $y) = @getimagesize('poze-casa-sacalaz/exterior/'.$randpoze['nume_poza'].'');
														if (($i % 3) == 0)
															{
																echo'</tr>
																     <tr>
																        <td align="left" width="130">
																			    <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-exterior.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/exterior/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																		    </td>';
															}//sfarsit if
															else 
																{
																	echo'<td align="left" width="130">
																				 <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-exterior.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/exterior/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																			 </td>';
																}//sfarsit else	
														$i++;
													}//sfarsit while
													echo'</table>';
											}
											break;
										case 4: 
											{
												//afisare continut
												$cerereSQLpoze = 'SELECT * FROM `poze_casa_sacalaz` WHERE locatie_poza="interior" ORDER BY `poze_casa_sacalaz`.`id_poze` DESC ';
												$rezultatpoze = @mysql_query($cerereSQLpoze);
												$i=0;
												echo'<table align="center" border="0">
															<tr>';
												while($randpoze = @mysql_fetch_array($rezultatpoze))
													{
														@list($x, $y) = @getimagesize('poze-casa-sacalaz/interior/'.$randpoze['nume_poza'].'');
														if (($i % 3) == 0)
															{
																echo'</tr>
																     <tr>
																        <td align="left" width="130">
																			    <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-interior.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/interior/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																		    </td>';
															}//sfarsit if
															else 
																{
																	echo'<td align="left" width="130">
																				 <a href="javascript: void(0)" onclick="popupul(\'vizualizare-poze-interior.php?numepoza='.$randpoze['nume_poza'].'\','.$x.','.$y.')"><img class="poze" src="poze-casa-sacalaz/interior/'.$randpoze['nume_poza'].'" '.stabiliredimensiuni($x,$y).' border="0" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;"></a>
																			 </td>';
																}//sfarsit else	
														$i++;
													}//sfarsit while
													echo'</table>';
											}
											break;
										case 5: 
											{
												echo'aaa';
											}
											break;
										case 6: 
											{
												//afisare continut
												$cerereSQLtext = 'SELECT * FROM `casa_sacalaz_text` WHERE id_meniu="'.$_GET['id'].'"';
												$rezultattext = @mysql_query($cerereSQLtext);
												$randtext = @mysql_fetch_array($rezultattext);
												echo''.$randtext['text'].'';
											}
											break;
										default: break;
									}//sfarsit switch
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