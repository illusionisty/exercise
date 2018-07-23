<?php

//--------------------------------------
//Players' viewer in HTML
//--------------------------------------

include_once __DIR__ . "/../Control/ActionsController.php";

class PlayersViewerHTML {

	private $players = null;	//string array
	private $anActionsController; 

	public function __construct(){
		$this->anActionsController = new ActionsController();
	}

	public function display() {
		
		if( null == $players ){

			$playerJsonString = $this->anActionsController->getPlayers();

			$this->players = json_decode($playerJsonString);
		}
		
		?>

		<!DOCTYPE html>
            <html>
            <head>
                <style>
                    li {
                        list-style-type: none;
                        margin-bottom: 1em;
                    }
                    span {
                        display: block;
                    }
                </style>
            </head>
            <body>
            <div>
                <span class="title">Current Players</span>
                <ul>
                    <?php foreach($this->players as $player) { ?>
                       
					   
					   <li>
                            <div>
								<?php

								//print keys and values
								foreach( $player as $key=>$val){
								?>
									<span ><?= $key ?>: <?= $val ?></span>
									
								<?php	
								}
								?>
                            </div>
                        </li>


                    <?php } ?>
                </ul>
            </body>
            </html>


		<?php
	}//end display()

	
}


?>