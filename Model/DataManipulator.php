<?php
//----------------------------------------------------------------------
//An abstract class of data manipulators
//----------------------------------------------------------------------
abstract class DataManipulator {

	abstract public function getplayers();			//return an array of players
    abstract public function writePlayer($iPlayer);	//add $iPlayer to the players' database
}

?>