<?php

//--------------------------------------
//Players' View in HTML
//--------------------------------------

include_once __DIR__ . "/../Control/ActionsController.php";

class PlayersViewHTML {

	private $players = null;	//string array
	private $anActionsController; 

	public function __construct(){
		$this->anActionsController = new ActionsController();
	}

	/**
	 * Display players' information in HTML 
	 */
	public function display() {
		
		if( null == $this->players ){
			
			//test write player
			/*
			$testString = '{"name":"Testt Test","age":26,"job":"Center","salary":"4.66m"}';
			if( false == $this->anActionsController->writePlayer($testString) ){
			
				echo "writing failed, PlayersViewHTML";
			}
			*/
			
			$playerJsonString = $this->anActionsController->getPlayers();

			//if fail to read players
			if( null == $playerJsonString ){	
				return;
			}

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
									<span ><?= ucfirst($key) ?>: <?= $val ?></span>
									
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