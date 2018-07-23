<?php

include_once __DIR__ . "/../DataManipulator.php";

//----------------------------------------------------------------------
//A database that is an array of players 
//Contains the manipulations of the database
//----------------------------------------------------------------------
class ArrayManipulator extends DataManipulator {

	private $mPlayers = [];

	/**
	 * Initialize the players database
	 */
	private function initDatabase(){
		
		$jonas = new Player('Jonas Valenciunas', 26,'Center', '4.66m');
        $this->mPlayers[] = $jonas;

        $kyle = new Player('Kyle Lowry', 32, 'Point Guard', '28.7m');
        $this->mPlayers[]  = $kyle;

        $demar = new Player('Demar DeRozan', 28,'Shooting Guard',  '26.54m');
        $this->mPlayers[]  = $demar;

        $jakob = new Player('Jakob Poeltl', 22,'Center',  '2.704m');
        $this->mPlayers[]  = $jakob;
	}

	public function __construct(){
		$this->initDatabase();
	}

	/**
	 *Read players from the array
	 *@return a string of players data in json format; null if the database is empty
	 */
	public function getplayers(){
	
		if( 0 == count($this->mPlayers) ){
			return null;
		}
		
		return json_encode( $this->mPlayers );
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

		$jsonToArray = json_decode($iPlayer,true);
		$this->mPlayers[] = $jsonToArray;	

		return true;

	}	
}

//----------------------------------------------------------------------
//Data structure of a player 
//----------------------------------------------------------------------
class Player implements \JsonSerializable{

	private $name;
	private $age;
	private $job;
	private $salary;

	public function __construct($iName = "", $iAge = 0, $iJob = "", $iSalary = ""){
		$this->name = $iName;
		$this->age = $iAge;
		$this->job = $iJob;
		$this->salary = $iSalary;
	}

	/**
	 *Serialize a player with private properties for json_encode()
	*/
	public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
	
}

?>