<?php
$eroare=0;
if (@isset($_POST['trimite']))
	{
		@include 'addentities.php';
		$nume=@addentities(@trim($_POST['nume']));
		$emaildestinatie1="razvan@casasuperba.ro";
		$emaildestinatie2="anca@casasuperba.ro";
		$email=@addentities(@trim($_POST['email']));
		$telefon=@addentities(@trim($_POST['telefon']));
		$mesaj=@addentities(@trim($_POST['mesaj']));
		$contact="Contact casasuperba.ro - ".$nume;
		$subiect="Contact casasuperba.ro";
		if (($nume == "") && ($telefon == "") && ($email == "") && ($mesaj == ""))
			$eroare=1;//nu am completat nimic
			else 
				{
					if (@eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$', $email))
						{
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							// Additional headers
							$headers .= 'From: '.$contact.' <'.$email.'>' . "\r\n";
							// Mail it
							@mail($emaildestinatie1, $subiect, $mesaj, $headers);	
							@mail($emaildestinatie2, $subiect, $mesaj, $headers);	
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
<title>Contact constructii case, vile, proiecte case</title>
<meta name="description" content="Detalii de contact constructii case">
<meta name="keywords" content="contact,constructii,case,vile">
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
						<img src="images/casacontact.gif" border="0" width="200" height="252">
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
										<td width="20" height="25" style="border:2px solid #FFFFFF; background: url(h2_bg.jpg) #869aae">&nbsp;</td>
										<td>
											<font class="fonttext">&nbsp;&nbsp;<b>Contact <?php $titlu=@str_replace("<br>"," ",$randpersonale['titlu_dreptunghi']); echo''.$titlu.'';  ?> </b></font>
										</td>
									</tr>
								</table>
								<br>
								<table width="90%">
									<tr>
										<td align="left" valign="top">
											<?php
											$cerereSQLcontact = 'SELECT * FROM `contact`';
											$rezultatcontact = @mysql_query($cerereSQLcontact);
											$randcontact = @mysql_fetch_array($rezultatcontact);
											echo'Website: '.$randcontact['website_contact'].'<br><br>';
											$cerereSQLcontact_persoane = 'SELECT * FROM `contact_persoane` ORDER BY `contact_persoane`.`id_contact_persoane` ASC ';
											$rezultatcontact_persoane = @mysql_query($cerereSQLcontact_persoane);
											if (@mysql_num_rows($rezultatcontact_persoane) !=0)
												{
													while($randcontact_persoane = @mysql_fetch_array($rezultatcontact_persoane))
														{
															echo'Nume: '.$randcontact_persoane['nume_contact'].'<br>Telefon: '.$randcontact_persoane['telefon_contact'].'<br> E-mail: '.$randcontact_persoane['email_contact'].'<br><br>';
														}//sfarsit while
												}//sfarsit if
											?>
										</td>
										<td align="right" valign="top">
											<img src="images/contact.jpg" width="71" height="84" alt="Constructii de case si vile la cheie.">
										</td>
									</tr>
								</table>
							
								<br>
								<table border="0" cellpadding="0" cellspacing="0" summary="">
									<tr>
										<td width="20" height="25" style="border:2px solid #FFFFFF; background: url(h2_bg.jpg) #869aae">&nbsp;</td>
										<td>
											<font class="fonttext">&nbsp;&nbsp;<b>Trimite e-mail </b></font>
										</td>
									</tr>
								</table>
								<?php
									if ((@isset($_POST['trimite'])) && ($eroare != 0))
										{
											switch($eroare)
												{
													case 1: echo'<font class="eroare">&nbsp;&nbsp;Nu ati completat nici un camp !</font>';
														break;
													case 2: echo'<font class="eroare">&nbsp;&nbsp;Adresa de e-mail nu este valida !</font>';
														break;
													case 3: echo'<font class="eroare">&nbsp;&nbsp;Mesajul s-a trimis cu succes ! Multumim !</font>';
														break;	
													default: break;
												}//sfarsit switch
										}//sfarsit if
								?>
								<br>
								<form action="contact-constructii-case-vile.php" method="POST">
								<table border="0">
									<tr>
										<td width="60">
											&nbsp; Numele:
										</td>
										<td>
											<input type="text" class="formular_contact" maxlength="100" name="nume">
										</td>
									</tr>
									<tr>
										<td>
											&nbsp; Telefon:
										</td>
										<td>
											<input type="text" class="formular_contact" maxlength="100" name="telefon">
										</td>
									</tr>
									<tr>
										<td>
											&nbsp; E-mail:
										</td>
										<td>
											<input type="text" class="formular_contact" maxlength="255" name="email">
										</td>
									</tr>
									<tr>
										<td valign="top">
											&nbsp; Mesaj:
										</td>
										<td>
											<textarea cols="3" name="mesaj"></textarea>
										</td>
									</tr>
									<tr>
										<td>
											&nbsp;
										</td>
										<td>
											<input type="submit" name="trimite" value="Trimite &raquo;" class="trimite_contact">
										</td>
									</tr>
								</table>
								</form>
								
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