<table width="100%" height="100%">
				<tr>
					<td align="left" valign="bottom">
						<font class="fontheader">
							<?php
							@require_once('bazadedateconfig.php');
							$cerereSQLpersonale = 'SELECT * FROM `date_personale`';
							$rezultatpersonale = @mysql_query($cerereSQLpersonale);
							$randpersonale = @mysql_fetch_array($rezultatpersonale);
							echo'<b>'.$randpersonale['titlu_header_negru'].'</b>';
							?>
						</font>
					</td>
					<td align="right" valign="bottom">
						<font class="fontheader">
							<a class="headersus" href="index.php" title="<?php  echo''.$randpersonale['titlu_header_negru'].''; ?>">Constructii case</a> | <a class="headersus" href="contact-constructii-case-vile.php" title="Contact constructii case la cheie">Contact</a>
						</font>
					</td>
				</tr>
			</table>