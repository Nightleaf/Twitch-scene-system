<?php
class GameArt {
    
    function grabArt($game) {
        $game = preg_replace('/\s+/', '+', $game);
        $url = 'https://api.twitch.tv/kraken/search/games?q=' . $game . '&type=suggest';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $json = json_decode($response, true);
        curl_close($ch);
        $url = $json['games'][0]['box']['medium'];      
        $art = "<img src='" . $url . "' style='-webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222);'>";   
        return $art;  
    }     
}
?>