<?php
	class Deck
	{
		//build the deck, value of every card is added along with the suits
		function Deck()
		{

			$suitDeck = array();
			for($i = 1; $i<14; $i++)
			{
				for($j = 0; $j<4; $j++)
				{
					$suitDeck[$i][$j] = $j;
				}

			}
			$this->deck = $suitDeck;
		}
		
		//simulates drawing of a hand
		function drawHand($hand)
		{
			while(count($hand)!=5)
			{
			//grabs one card drom the deck and one suit value for that car
			$randomCard = array_rand($this->deck,1);
			$randomSuit = $this->deck[$randomCard][array_rand($this->deck[$randomCard])];

			//if the card is in the deck put it in the hand and remove it
			if($this->find_key_value($this->deck, $randomSuit, $randomSuit))
			{
			$hand[][$randomCard] = $randomSuit;
			}
			
			}
			return $hand;
		}
		
		//checks for a the card in the deck and removes it if it finds it
		function find_key_value($array, $key, $val)
		{
			foreach ($array as $item)
			{
				if (is_array($item))
				{
					$this->find_key_value($item, $key, $val);
				}
		
				if (isset($item[$key]) && $item[$key] == $val)
				{
					unset($item[$key]); 
					return true;
				}
			}
		
			return false;
		}

	
	}

?>