<?php
//Include all needed files and start a session to pass variables
include_once 'PokerDeck.php';
include_once 'CardFunctions.php';
include_once 'ShowCards.php';
session_name("Poker Game");
session_start();

//build deck object and draw hands
$deck = new Deck();
$playerHand = array();
$playerHand = $deck->drawHand($playerHand);
$cpuHand = array();
$cpuHand = $deck->drawHand($cpuHand);

$_SESSION['playerHand'] = $playerHand;
$_SESSION['cpuHand'] = $cpuHand;

//show the player his hand then ask what he wants to do
echo("---Player Hand---<br>");
showCards($_SESSION['playerHand']);
echo('<br>
		<form action="PokerMain.php" method="get">');
echo('	<input type="submit" name="play" alt="play" value="play"/>
		<input type="submit" name="fold" alt="fold" value="fold"/>
		<input type="submit" name="withdraw" alt="withdraw" value="withdraw"/>');
echo('</form><br>');

//checks if the player wants to play again
if (isset($_GET['play'])) {
	//showCards($_SESSION['playerHand']);
	$findWinner = new Cards($_SESSION['playerHand'], $_SESSION['cpuHand']);
	header('PokerMain.php');
}
else if (isset($_GET['fold'])) {
	header('PokerMain.php');
}
else if (isset($_GET['withdraw'])) {
	echo("<br> Thanks for Playing");
	session_destroy();
}



?>