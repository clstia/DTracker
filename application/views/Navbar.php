<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <body>

        <!-- Start of Navigation Bar -->
        <nav class = "navbar navbar-default navbar-fixed-top">
            <div class = "container">
                <div class = "navbar-header">
                    <!-- This button is the collapsible menu button when the window is compressed -->
                    <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#navbar" aria-expanded = "false" aria-controls = "navbar">
                        <span class = "sr-only"> Toggle Navigation </span>
                        <!-- Each .icon-bar represents one item in the menu -->
                        <span class = "icon-bar"></span> <!-- Add Functions -->
                        <span class = "icon-bar"></span> <!-- Remove Functions -->
                        <span class = "icon-bar"></span> <!-- View Functions -->
                        <span class = "icon-bar"></span> <!-- Transfer Document Drawer Location -->
                        <span class = "icon-bar"></span> <!-- Search Bar -->
                    </button>
                    <a class = "navbar-brand" href = "<?php echo base_url();?>"> Document Tracker </a>
                </div>
                <div id = "navbar" class = "navbar-collapse collapse">
                    <ul class = "nav navbar-nav">
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false"> Add <span class = "caret"></span> </a>
                            <ul class = "dropdown-menu">
                                <li><a href = "" data-toggle = "modal" data-target = "#addDocModal" role = "button"> Add Document </a></li>
                                <li><a href = "" data-toggle = "modal" data-target = "#addDrawerModal" role = "button"> Add Drawer </a></li>
                            </ul>
                        </li>
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false"> View <span class = "caret"></span> </a>
                            <ul class = "dropdown-menu">
                                <li>
                                    <a href = "<?php echo base_url();?>all_stored"> All Stored Documents </a>
                                </li>
                                <li>
                                    <a href = "<?php echo base_url();?>all_unstored"> All Unstored Documents </a>
                                </li>
                                <li>
                                    <a href = "<?php echo base_url();?>all_drawers"> All Drawers </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <form class = "navbar-form navbar-left" role = "search">
                                <div class = "form-group">
                                    <input type = "text" class = "form-control" placeholder = "Search">
                                </div>
                                <button type = "submit" class = "btn btn-default"> Submit </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End of Navigation Bar -->

        <!-- start of document listing -->
        <div class = "container" id = "mainArea">
            <div class = "row">
                <div class = "col-md-3"> &nbsp; </div>
                <div class = "col-md-6">
                    <?php
                        if (isset ($db_data))
                        {
                            echo $db_data;
                        }
                    ?>
                </div>
                <div class = "col-md-3"> &nbsp; </div>
            </div>
        </div>

        <!-- Modal for Add Document -->
