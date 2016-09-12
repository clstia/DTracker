<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view ('Header');
    $this->load->view ('Navbar');

    echo "<div class = 'mainArea'>";

    if (current_url() == base_url())
    {
        echo heading ("Current Contents", 3, array ('class' => 'text-center'));
        echo $home_contents['home_contents'];
    }

    if (!empty ($all_drawers))
    {
        echo heading ("All Drawers", 3, array ('class' => 'text-center'));
        echo $all_drawers['all_drawers'];
    }

    if (isset ($all_stored))
    {
        echo heading ("All Stored Documents", 3, array ('class' => 'text-center'));
        $this->table->clear ();
        $template = array (
            'table_open' => '<table class = "table table-striped table-bordered text-center">',
            'heading_cell_start' => '<th class = "text-center">'
        );
        $this->table->set_template ($template);
        $this->table->set_heading ("Document Name", "Description", "Date Added", "Current Location", "Actions");
        foreach ($all_stored['allStoredDocuments'] as $row)
        {
            $delete = "<button type = 'button' class = 'btn btn-default' onclick = 'deleteDocument(".$row['id'].")'><span data-toggle = 'tooltip' data-placement = 'top' title = 'Remove from Document Tracker' aria-hidden = 'true'>delete</span></button>";

            $transfer = "<button type = 'button' class = 'btn btn-default' onclick = 'transferDocument(".$row['id'].")'><span data-toggle = 'tooltip' data-placement = 'top' title = 'Transfer Drawer' aria-hidden = 'true'>transfer</span></button>";

            $this->table->add_row ($row['name'], $row['description'], $row['date'], $row['location'], $delete.'&nbsp;&nbsp;'.$transfer);
        }
        echo $this->table->generate ();
    }

    if (isset ($all_unstored))
    {
        $this->table->clear ();
        echo heading ("All Unstored Documents", 3, array ('class' => 'text-center'));
        $template = array (
            'table_open' => '<table class = "table table-striped table-bordered text-center">',
            'heading_cell_start' => '<th class = "text-center">'
        );
        $this->table->set_template ($template);
        $this->table->set_heading ("Document Name", "Description", "Actions");
        foreach ($all_unstored['allUnStoredDocuments'] as $row)
        {
            $delete = "<button type = 'button' class = 'btn btn-default' onclick = 'deleteDocument(".$row['id'].")'><span data-toggle = 'tooltip' data-placement = 'top' title = 'Remove from Document Tracker' aria-hidden = 'true'>delete</span></button>";

            $store = "<button type = 'button' class = 'btn btn-default' onclick = 'storeDocument(".$row['id'].")'><span data-toggle = 'tooltip' data-placement = 'top' title = 'Add to Drawer' aria-hidden = 'true'>store</span></button>";

            $this->table->add_row ($row['name'], $row['description'], $delete.'&nbsp;&nbsp;'.$store);
        }
        echo $this->table->generate ();
    }
    echo "</div>";

    $this->load->view ('Modals');
    $this->load->view ('Footer');
?>
