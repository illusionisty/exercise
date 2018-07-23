<?php

include_once __DIR__ . "/../DataManipulator.php";

//----------------------------------------------------------------------
//A database that is a string in json format
//The manipulations of the database
//----------------------------------------------------------------------
class JsonManipulator extends DataManipulator {

	private $mJson = null;	//Keeps the players information

	public function __construct(){
		$this->initDatabase();
	}
	
	/**
	 *Initialize the database
	 */
	private function initDatabase(){
		$this->mJson = '[{"name":"Jonas Valenciunas","age":26,"job":"Center","salary":"4.66m"},{"name":"Kyle Lowry","age":32,"job":"Point Guard","salary":"28.7m"},{"name":"Demar DeRozan","age":28,"job":"Shooting Guard","salary":"26.54m"},{"name":"Jakob Poeltl","age":22,"job":"Center","salary":"2.704m"}]';
	}
	
	/**
	 *Read players from the array
	 *@return a string of players data in json format; null if the database is empty
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
