<?php
$eroare=0;
if (@isset($_POST['trimite']))
	{
		@include 'addentities.php';
		$numeprieten=@addentities(@trim($_POST['numeprieten']));
		$numeletau=@addentities(@trim($_POST['numeletau']));
		$emailprieten=@addentities(@trim($_POST['emailprieten']));
		$contact="Recomandare www.casasuperba.ro";
		$email="razvan@casasuperba.ro";

		$subiect="Recomandare site - Constructii case si vile Timisoara - de la".$numeletau;
		$mesaj=$numeletau." te invita sa vizitezi website-ul www.casasuperba.ro - un website despre constructii de case si vile la cheie.";
		$emaildestinatie=$emailprieten;
		if (($numeprieten == "") && ($numeletau == "") && ($emailprieten == ""))
			$eroare=1;//nu am completat nimic
			else 
				{
					if (1)
						{
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							// Additional headers
							$headers .= 'From: '.$contact.' <'.$email.'>' . "\r\n";
							// Mail it
							@mail($emaildestinatie, $subiect, $mesaj, $headers);	
							$eroare=3;//e-mailul s-a trimis cu succes							
						}//sfarsit if
						else 
							$eroare=2;//adresa de e-mail nu este valida
				}//asarsit else
	}//sfarsit if
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Constructii case la cheie, planuri de constructii, proiecte case vile ieftine</title>
<meta name="description" content="Constructii, proiectare case, amenajare de case si vile de vacanta la cheie. Amenajari interioare, instalatii , planuri de constructie case ieftine.">
<meta name="keywords" content="constructii,case,amenajare,vila,casa,cheie,constructii case,proiecte case,constructii vile,case de vacanta,preturi mici,instalatii case,terenuri constructii case,case la cheie">
<link href="style.css" rel="stylesheet" type="text/css">
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
						<b>&nbsp;&nbsp;• </font>Recomanda unui prieten:</b>
						<br><br>
						<!--inceput tabel recomanda unui prieten----->
						<form action="index.php" method="POST">
						<table width="100%">
							<tr>
								<td>
									&nbsp; Numele tau:
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" class="formular_recomanda" maxlength="100" name="numeletau">
								</td>
							</tr>
							<tr>
								<td>
									&nbsp; Nume prieten:
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" class="formular_recomanda" maxlength="100" name="numeprieten">
								</td>
							</tr>
							<tr>
								<td>
									&nbsp; Email prieten:
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" class="formular_recomanda" maxlength="100" name="emailprieten">
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="trimite" value="Trimite &raquo;" class="trimite_recomanda">
								</td>
							</tr>
						</table>
						</form>
						<br>
						<?php
						if ((@isset($_POST['trimite'])) && ($eroare != 0))
										{
											switch($eroare)
												{
													case 1: echo'<font class="eroare">&nbsp;&nbsp;Nu ati completat nici un camp !</font>';
														break;
													case 2: echo'<font class="eroare">&nbsp;&nbsp;Adresa de e-mail nu este valida !</font>';
														break;
													case 3: echo'<font class="eroare">&nbsp;&nbsp;Recomandarea s-a trimis cu succes ! Multumim !</font>';
														break;	
													default: break;
												}//sfarsit switch
										}//sfarsit if
						?>
						<!--sfarsittabel recomanda unui prieten----->
						<table width="100%">
							<tr>
								<td align="center">
								<img src="images/images13.jpg" width="124" height="97" border="0">
								</td>
							</tr>
						</table>
						
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
										<td width="20" height="25" style="border:2px solid #FFFFFF; background: url(h2_bg.jpg) #448ccb">&nbsp;</td>
										<td>
											<font class="fonttext">&nbsp;&nbsp;<b>Bine ati venit !</b></font>
										</td>
									</tr>
								</table>
								<br>
								<!--inceput tabel poza----->
								<table align="center" cellpadding="0" cellspacing="0" style="border:2px solid #FFFFFF;" border="0">
									<tr>
										<td>
											<img src="images/index.jpg" width="450" height="293" border="0">
										</td>
									</tr>
								</table>
								<!--sfarsit tabel poza----->
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