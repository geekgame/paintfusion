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

function getSource($url)
        {
                $curl = curl_init();
 
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);
                return $response;
        }


?>