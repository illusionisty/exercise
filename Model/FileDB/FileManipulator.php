<?php

include_once __DIR__ . "/../DataManipulator.php";
define("FILEDB_CONFIG_PATH", __DIR__ . "/FileDatabaseConfig.json");

//----------------------------------------------------------------------
//A database that is a json file 
//The manipulations of the database
//----------------------------------------------------------------------
class FileManipulator extends DataManipulator {

	
	private $mJson = null;

	public function __construct(){
		$this->initDatabase();
	}
	
	/**
	 *Initialize the database
	 */
	private function initDatabase(){
	
		$jsondata = file_get_contents(FILEDB_CONFIG_PATH);

		$json = json_decode($jsondata,true);
		$dataFilePath = __DIR__ . $json[0]['filePath'];

        $this->mJson = file_get_contents($dataFilePath);

	}
	
	/**
	 *Read players from the array
	 *@return a string of players data in json format
	 */
	public function getplayers(){
	
		if( null == $this->mJson ){
			return null;
		}
		
		return $this->mJson ;
	}	
	
	/**
	 *Add $iPlayer to the players' database
	 *@param $iPlayer a player's data in json format
	 *@return true if writing $iPlayer successfully; false if fails to write $iPlayer
	 */
    public function writePlayer($iPlayer){
		
		if( null == $iPlayer ){
			echo "Player information is empty. Cannot write. JsonManipulator";
			return false;
		}

		$players = [];
		if ( null != $this->mJson ) {
			$players = json_decode($this->mJson, true);
		}

		$players[] =json_decode( $iPlayer, true);
		$this->mJson = json_encode($players, true);

		return true;

	}	
}

?>
