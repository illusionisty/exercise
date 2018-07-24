<?php
//----------------------------------------------------------------------
//An abstract class of data manipulators
//----------------------------------------------------------------------
abstract class DataManipulator {

	abstract public function getplayers();			//return a string of players in json format
    abstract public function writePlayer($iPlayer);	//add $iPlayer to the players' database
}

?>