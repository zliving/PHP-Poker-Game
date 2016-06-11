<?php
	function showCards($hand)
	{
		//shows cards in a readable format
		$suits= array("Club","Spade","Heart","Diamond");
		$cardFace = array("Ace",1,2,3,4,5,6,7,8,9,10,"Jack","Queen","King");
		for($card = 0;$card<5;$card++)
		{
			echo('<br> Card: '.$cardFace[key($hand[$card])].' Suit: '.$suits[$hand[$card][key($hand[$card])]]);
		}
	}