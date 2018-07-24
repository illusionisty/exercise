<?php

//--------------------------------------
//Players' View in CLI
//--------------------------------------

include_once __DIR__ . "/../Control/ActionsController.php";

class PlayersViewCLI {

	private $mPlayers = null;	//string in json
	private $mActionsController; 

	public function __construct(){
		$this->mActionsController = new ActionsController();
	}

	/**
	 * Display players' information in CLI 
	 */
	public function display() {

		if( null == $this->mPlayers ){

			$playerJsonString = $this->mActionsController->getPlayers();
			//if fail to read players
			if( null == $playerJsonString ){	
				return;
			}

			$this->mPlayers = json_decode($playerJsonString);
		}

		echo "Current Players: \n";
		foreach($this->mPlayers as $player) {

			foreach( $player as $key=>$val){
				$key = ucfirst($key);
				echo "\t $key : $val \n";
			}
			echo "\n";
		}

	}

}

?>