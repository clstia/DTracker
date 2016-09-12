<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view ('Header');
    $this->load->view ('Navbar');

    if (isset($db_data))
    {
        $template = array (
            'table_open' => '<table class = "table table-striped table-bordered text-center">',
            'heading_cell_start' => '<th class = "text-center">'
        );
        $this->table->set_template ($template);
    }

    $this->load->view ('Modals');
    $this->load->view ('Footer');
?>
