<?php
//--------------------------------------------------------
//An interface listing players' data manipulation functions
//--------------------------------------------------------

interface IPlayersFacade {

    public function getplayers();			//return an array of players
    public function writePlayer($iPlayer);	//add $iPlayer to the players' database
}

?>