<?php
//--------------------------------------------------------
//An interface listing players' data manipulation functions
//--------------------------------------------------------

interface IPlayersFacade {

    public function getplayers();			//return a string of players in json format
    public function writePlayer($iPlayer);	//add $iPlayer to the players' database
}

?>