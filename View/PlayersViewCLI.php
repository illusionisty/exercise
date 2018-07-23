<?php

//--------------------------------------
//Players' View in CLI
//--------------------------------------

include_once __DIR__ . "/../Control/ActionsController.php";

class PlayersViewCLI {

	private $players = null;	//string array
	private $anActionsController; 

	public function __construct(){
		$this->anActionsController = new ActionsController();
	}

	/**
	 * Display players' information in CLI 
	 */
	public function display() {

		if( null == $players ){

			$playerJsonString = $this->anActionsController->getPlayers();
			//if fail to read players
			if( null == $playerJsonString ){	
				return;
			}

			$this->players = json_decode($playerJsonString);
		}

		echo "Current Players: \n";
		foreach($this->players as $player) {

			foreach( $player as $key=>$val){
				$key = ucfirst($key);
				echo "\t $key : $val \n";
			}
			echo "\n";
		}

	}

}

?>