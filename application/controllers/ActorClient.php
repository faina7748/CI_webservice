<?php
Class ActorClient extends CI_Controller{
    public function index(){        
        $client = new GuzzleHttp\Client(['verify' => false]);        
        $url = 'http://localhost/CI_webservice/index.php/actor';
        $res = $client->request('GET', $url);
        $actors = json_decode($res->getBody()->getContents());
        
        echo "<h1><img src='../assets/img/actor.jpg' width='80' height='80'>TOP 10 ACTOR</h1>";
        echo '<table border=1 cellpadding=0 cellspacing=0>';
        echo '<tr bgcolor="#4dd2ff"><td>No</td><td>First Name</title><td>Last Name</td>';
        foreach ($actors as $key => $actor) {	
            echo '<tr>';
            echo '<td align="center">'.($key+1).'.</td>';
            echo '<td>'.$actor->first_name.'</td>';
            echo '<td>'.$actor->last_name.'</td>';            
            echo '</tr>';
        }
        echo '</table>';
    }
}