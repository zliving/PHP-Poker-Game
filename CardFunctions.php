<?php
include_once 'PokerDeck.php';
include_once 'ShowCards.php';


	class Cards{
		function Cards($player, $cpu){
			//shows the cpu cards
			echo("---CPU Hand---<br>");
			showCards($cpu);
			//cleans the hand into one array for determing value since suits don't matter
			$player = $this->cleanHands($player);
			$cpu = $this->cleanHands($cpu);
			//calculates the the point total for each hand to find a winner
			$playerPoints = $this->findWinner($player);
			$cpuPoints  = $this->findWinner($cpu);
			//outputs the final result
			if($playerPoints>$cpuPoints)
			{
				echo("Player Wins ".$playerPoints);
			}
			else if($playerPoints==$cpuPoints)
			{
				echo("It's a draw");
			}
			else 
			{
				echo("CPU Wins ".$cpuPoints);
			}

		}
		
		//puts the card value into a single array
		function cleanHands($hand)
		{
			$handNew = array();
				
			for($i=0;$i<5;$i++)
			{
				$handNew[$i]= key($hand[$i]);
			}
			return $handNew;
		}

		//returns the point value of the hand
		function findWinner($hand)
		{
			$Points = 0;
			$HighCard = 0;
			
			echo("<br>");
			sort($hand);
			$Cards = array_count_values($hand);
			foreach($Cards as $key=>$value)
			{
				if($value>1)
				{
					$Points += $key*$value;
				}
				else{
					if($HighCard<$key)
					{
						$HighCard = $key;
					}
				}
			}
			if($Points>0)
			{
				return $Points;
			}
			else {
				return $HighCard;
			}
			
		}

	}

	
?>