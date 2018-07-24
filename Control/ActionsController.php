<?php

include_once __DIR__ . "/../Model/PlayersController.php";

//-------------------------------------------------------------------------
//The controller that responses to the information requests from the pages
//-------------------------------------------------------------------------

class ActionsController {

	private $mPlayersController = null;	//manages players' data

	public function __construct(){
		$this->mPlayersController = new PlayersController();
	}
	
	/**
	 *Read players from the array
	 *@return a string of players data in json format; null if the database is empty
	 */
	public function getPlayers(){
        
		return $this->mPlayersController->getPlayers();
	}

	/**
	 *Add $iPlayer to the players' database
	 *@param $iPlayer a player's data in json format
	 *@return true if writing $iPlayer successfully; false if fails to write $iPlayer
	 */
    public function writePlayer($iPlayer){

		return $this->mPlayersController->writePlayer($iPlayer);
	}	

	
}

?>