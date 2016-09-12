<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class App_Model extends CI_Model
    {
        public function __construct ()
        {
            parent::__construct ();
            $this->load->database();
        }

        public function showStats ()
        {
            $this->db->query("SELECT * FROM document");
            $totalDocuments = $this->db->affected_rows ();

            $this->db->query("SELECT * FROM drawer");
            $totalDrawers = $this->db->affected_rows ();

            $this->db->query("SELECT * FROM storage, document WHERE (document.documentID = storage.documentID)");
            $totalStored = $this->db->affected_rows();

            $this->db->query("SELECT * FROM document WHERE (document.isStored = 0)");
            $totalUnstored = $this->db->affected_rows();

            $this->table->clear ();
            $template = array (
                'table_open' => '<table class = "table table-striped table-bordered text-center">',
                'heading_cell_start' => '<th class = "text-center">'
            );
            $this->table->set_template ($template);
            $this->table->set_heading ("Total Documents", " Total Drawers", "Total Unstored Documents", "Total Stored Documents");
            $this->table->add_row ($totalDocuments, $totalDrawers, $totalUnstored, $totalStored);
            $db_data['home_contents'] = $this->table->generate ();
            return $db_data;
        }

        public function showAllStoredDocuments ()
        {
            $query = $this->db->query ("SELECT document.documentID AS 'id', document.documentName AS 'name', document.documentDesc AS 'description', document.dateAdded AS 'date', drawer.drawerName AS 'location' FROM document, drawer, storage WHERE (storage.documentID = document.documentID) AND (drawer.drawerID = storage.drawerID)");
            $db_data['allStoredDocuments'] = $query -> result_array ();
            return $db_data;
        }

        public function showAllUnStoredDocuments ()
        {
            $query = $this->db->query ("SELECT document.documentID AS 'id', document.documentName AS 'name', document.documentDesc AS 'description' FROM document WHERE (document.isStored = 0)");
            $db_data['allUnStoredDocuments'] = $query -> result_array ();
            return $db_data;
        }

        public function showAllDrawers ()
        {
            $this->table->clear ();
            $template = array (
                'table_open' => '<table class = "table table-striped table-bordered text-center">',
                'heading_cell_start' => '<th class = "text-center">'
            );
            $this->table->set_template ($template);
            $this->table->set_heading ("Drawer Name", "Number of Documents Stored", "Actions");

            $query = $this->db->query ("SELECT drawer.drawerID AS 'id', drawer.drawerName as 'name' FROM drawer");
            foreach ($query->result_array() as $result)
            {
                $query2 = $this->db->query ("SELECT COUNT(*) AS 'count' FROM storage WHERE (storage.drawerID = '".$result['id']."')");
                $count = $query2->result_array()[0]['count'];
                $name = $result['name'];
                $id = $result['id'];
                //$rename = "<button type = 'button' class = 'btn btn-default' data-toggle = 'modal' data-target = '#renameModal'><span aria-hidden = 'true' data-toggle = 'tooltip' data-placement = 'top' title = 'Rename Drawer'>Rename</span></button>";
                $delete = "<button type = 'button' class = 'btn btn-default' onclick = 'deleteDrawer ($id)'><span aria-hidden = 'true' data-toggle = 'tooltip' data-placement = 'top' title = 'Delete Drawer'>Delete</span></button>";
                $this->table->add_row ($name, $count, $delete);//$rename.'&nbsp;&nbsp;&nbsp;'.$delete);
            }

            $db_data['all_drawers'] = $this->table->generate ();
            return $db_data;
        }
    }
?>
