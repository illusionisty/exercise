<?php

//--------------------------------------
//Views' controller
//--------------------------------------

include_once "PlayersViewHTML.php";
include_once "PlayersViewCLI.php";

class ViewsController{

	private $mPlayersViewCLI = null;	//The View in CLI
	private $mPlayersViewHTML = null;	//The View in HTML

	/**
	 * Display players' information based on the type of interface 
	 */
	public function display(){

		if( php_sapi_name() === 'cli' ){
			if( null == $this->mPlayersViewCLI ){
			
				$this->mPlayersViewCLI = new PlayersViewCLI();
			}
			$this->mPlayersViewCLI->display();
		}
		else {
			if( null == $this->mPlayersViewHTML ){
			
				$this->mPlayersViewHTML = new PlayersViewHTML();
			}
			$this->mPlayersViewHTML->display();
		}
	}
}

?>
