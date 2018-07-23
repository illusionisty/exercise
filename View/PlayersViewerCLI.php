<?php

//--------------------------------------
//Players' viewer in CLI
//--------------------------------------

include_once __DIR__ . "/../Control/ActionsController.php";

class PlayersViewerCLI {

	private $players = null;	//string array
	private $anActionsController; 

	public function __construct(){
		$this->anActionsController = new ActionsController();
	}

	public function display() {

		if( null == $players ){

			$playerJsonString = $this->anActionsController->getPlayers();
			$this->players = json_decode($playerJsonString);
		}

		echo "Current Players: \n";
		foreach($this->players as $player) {

			foreach( $player as $key=>$val){
				echo "\t $key : $val \n";
			}
			echo "\n";
		}

	}

}

?>