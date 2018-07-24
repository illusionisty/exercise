<?php

//--------------------------------------
//Players' View in HTML
//--------------------------------------

include_once __DIR__ . "/../Control/ActionsController.php";

class PlayersViewHTML {

	private $mPlayers = null;	//string array
	private $mActionsController; 

	public function __construct(){
		$this->mActionsController = new ActionsController();
	}

	/**
	 * Display players' information in HTML 
	 */
	public function display() {
		
		if( null == $this->mPlayers ){
			
			//test writePlayer()
			/*
			$testString = '{"name":"Testt Test","age":26,"job":"Center","salary":"4.66m"}';
			if( false == $this->mActionsController->writePlayer($testString) ){
			
				echo "writing failed, PlayersViewHTML";
			}
			*/
			
			$playerJsonString = $this->mActionsController->getPlayers();

			//if fail to read players
			if( null == $playerJsonString ){	
				return;
			}

			$this->mPlayers = json_decode($playerJsonString);
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
                    <?php foreach($this->mPlayers as $player) { ?>
                       
					   
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