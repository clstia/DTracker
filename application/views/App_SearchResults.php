<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view ('Header');
    $this->load->view ('Navbar');

    echo "<div class = 'mainArea'>";
    if (isset($emptySearch))
    {
        echo heading ("You entered an empty string", 3, array ('class' => 'text-center'));
    }
    else
    {
        echo heading ("Stored Documents", 3, array ('class' => 'text-center'));
        echo $searchRes_storedDocs;
        echo "<br/>";
        echo heading ("Unstored Documents", 3, array ('class' => 'text-center'));
        echo $searchRes_unstoredDocs;
        echo "<br/>";
        echo heading ("Drawers", 3, array ('class' => 'text-center'));
        echo $searchRes_drawers;
    }
    echo "</div>";
    $this->load->view ('Footer');
?>
