<?php
require('config.php');

$module = "default";
$game = "default";
$unprot_game = "default";

if (isset($_GET['module'])) {
    $module = $_GET['module'];
}

$sqli = new mysqli($SQL_HOST, $SQL_USER, $SQL_PASS) or die('Unable to connect to database!');

// Pulls our channel data for things like what game the channel is set to.
$channel_query = "SELECT * FROM `botleaf`.`twitch_channel` WHERE `channel`='" . $TWITCH_CHANNEL . "' LIMIT 1;";
if ($result = $sqli->query($channel_query)) {
    while ($row = $result->fetch_assoc()) {
        $game = preg_replace('/\s+/', '_', $row['game']);
    }
}

// Check to see if the game is supported for our themes.
$game_supported_query = "SELECT * FROM `botleaf`.`twitch_games` WHERE `game_title`='" . $game . "';";


if ($stmt = $sqli->prepare($game_supported_query)) {
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows < 1) {
        echo "Game: " . $game . " was unsupported, setting theme to default!";
        $game = "default";      
    }
    $stmt->close();
}
echo '<br/>';
echo "Module loaded was " . $module . ", game was " . $game;
header('Location: http://emeraldlegion.com/twitch/modules/' . $module . '.php?game=' . $game);

?>