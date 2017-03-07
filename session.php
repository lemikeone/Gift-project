<?php 

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
	    echo 'Bonjour ' . $_SESSION['pseudo'] .'';
	}

else 
	{
	
	}

?>