<?php

function isAdmin() {
	$result = false;
	if ( isset($_SESSION['user']) ) { 
        if ( $_SESSION['user'] == 'admin') { 
        	$result = true;
        }
    } 

    return $result;
}

?>