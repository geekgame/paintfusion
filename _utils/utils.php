<?php
function bonjour()
{	
    if(date('G') < 18)
        return 'bonjour';
    else
        return 'bonsoir';
}

function checkPostEntry($entry)
{
	if(isset($_POST[$entry]))
	{
		if($_POST[$entry] != "" && $_POST[$entry] != NULL)
			return true;
	}
	return false;
}


?>