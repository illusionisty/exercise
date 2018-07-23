<?php

//--------------------------------------
//Viewers' controller
//--------------------------------------

include_once "PlayersViewerHTML.php";
include_once "PlayersViewerCLI.php";

class ViewersController{

	private $mPlayersViewerCLI = null;
	private $mPlayersViewerHTML = null;

	public function display(){
		if( php_sapi_name() === 'cli' ){
			if( null == $this->mPlayersViewerCLI ){
			
				$this->mPlayersViewerCLI = new PlayersViewerCLI();
			}
			$this->mPlayersViewerCLI->display();
		}
		else {
			if( null == $this->mPlayersViewerHTML ){
			
				$this->mPlayersViewerHTML = new PlayersViewerHTML();
			}
			$this->mPlayersViewerHTML->display();
		}
	}
}


?>
