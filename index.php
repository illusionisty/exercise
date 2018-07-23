<?php

//--------------------------------------
//Viewers' controller
//--------------------------------------

include_once "View/PlayersViewerHTML.php";
include_once "View/PlayersViewerCLI.php";

if( php_sapi_name() === 'cli' )
{
	$aPlayersViewerCLI = new PlayersViewerCLI();
	$aPlayersViewerCLI->display();
}
else {
	$aPlayersViewerHTML = new PlayersViewerHTML();
	$aPlayersViewerHTML->display();
}

?>
