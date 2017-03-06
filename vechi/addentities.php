<?php
function addentities($data)
	{
		if(@trim($data) != '')
			{
				$data = @htmlentities($data, ENT_QUOTES);	
				return @str_replace('\\', '&#92;', $data);
			}//sfarsit if
			else
				return $data;
	} // End addentities() --------------					
?>