<?php
function bonjour()
{	
    if(date('G') < 18)
        return 'bonjour';
    else
        return 'bonsoir';
}
?>