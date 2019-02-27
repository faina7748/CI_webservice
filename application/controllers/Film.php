<?php
Class Film extends CI_Controller{
    public function index(){        
        $client = new GuzzleHttp\Client(['verify' => false]);        
        $url = 'http://localhost/webservice/sakila/film_svc.php';
        $res = $client->request('GET', $url);
        $films = json_decode($res->getBody()->getContents());
        
        echo "<h1><img src='../assets/img/film.png' width='50' height='50'>My Favourite Film List</h1>";
        echo '<table border=1 cellpadding=0 cellspacing=0>';
        echo '<tr bgcolor="#4dd2ff"><td>No</td><td>Title</title><td>Description</td><td>Language</td><td>Show</td>';
        foreach ($films as $key => $film) {	
            echo '<tr>';
            echo '<td align="center">'.($key+1).'.</td>';
            echo '<td>'.$film->title.'</td>';
            echo '<td>'.$film->descr.'</td>';
            echo '<td align="center">'.$film->lang.'</td>';
            echo '<td align="center"><a href="img/smile.jpg" target=_blank><img src="../assets/img/movie.png" height="20" width="20"></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}