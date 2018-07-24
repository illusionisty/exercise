<?php

include_once __DIR__ . "/IPlayersFacade.php";
include_once __DIR__ . "/DataManipulator.php";
include_once __DIR__ . "/ArrayDB/ArrayManipulator.php";
include_once __DIR__ . "/JSONDB/JsonManipulator.php";
include_once __DIR__ . "/FileDB/FileManipulator.php";

define("CONTROLLER_CONFIG_PATH", __DIR__ . "/Config.json"); //The path of the config file; Used by PlayersController
//----------------------------------------------------------------------
//Players data manipulator, which implements IPlayersFacade interface 
//----------------------------------------------------------------------
class PlayersController implements IPlayersFacade {

	private $mPlayersManipulator =  null;

	/**
	 * Create a players manipulator based on the database type in the config file
	 * @Return true if creating the manipulator sucessfully; false if it fails
	 */
	private function createManipulator(){

		$jsondata = file_get_contents(CONTROLLER_CONFIG_PATH);

		//$jsondata = file_get_contents($configFilePath);
		$json = json_decode($jsondata,true);
		$databaseType = $json[0]['database'];

		switch ($databaseType) {
			 case 'array':
                $this->mPlayersManipulator = new ArrayManipulator();
                break;
            case 'json':
                $this->mPlayersManipulator = new JsonManipulator();
                break;
            case 'file':
                $this->mPlayersManipulator = new FileManipulator();
                break;
			default:
				echo "Database not found";
				return false;
		}//end switch 
		return true;
	}
	
	/**
	 * Read the players information in the database
	 * @Return a string of players in json format
	 */
    public function getplayers(){

		if( null ==  $this->mPlayersManipulator ){
		
			if( !$this->createManipulator() ){

				return null;
			}

		}

		return $this->mPlayersManipulator->getPlayers();
	}

	/**
	 * Add $player to the players' database
	 * @Param: string players
	 * @Return true if writing player sucessfully; false if writing fails
	 */
    public function writePlayer($iPlayer){

		if( null ==  $this->mPlayersManipulator ){

			if( ! $this->createManipulator() ){
				echo "Failed to create a manipulator\n";
				return false;
			}
		}

		return $this->mPlayersManipulator->writePlayer($iPlayer);
	}
}

?>


