<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Controller extends CI_Controller
{
    public function __construct ()
    {
        parent::__construct ();
        $this->load->model ('App_Model', 'am');
    }

    public function index ()
    {
        $db_data['home_contents'] = $this->am->showStats ();
        $this->load->view ('App_View', $db_data);
    }

    public function all_stored ()
    {
        $db_data['all_stored'] = $this->am->showAllStoredDocuments ();
        $this->load->view ('App_View', $db_data);
    }

    public function all_unstored ()
    {
        $db_data['all_unstored'] = $this->am->showAllUnStoredDocuments ();
        $this->load->view ('App_View', $db_data);
    }

    public function all_drawers ()
    {
        $db_data['all_drawers'] = $this->am->showAllDrawers ();
        $this->load->view ('App_View', $db_data);
    }

    public function add_document ()
    {
        $this->load->database ();
        $this->db->query ("INSERT INTO document (documentName, documentDesc) VALUES ('".$_POST['documentName']."', '".$_POST['documentDesc']."')");

        if (!empty($_POST['drawerName']))
        {
            $query = $this->db->query ("SELECT drawer.drawerID FROM drawer WHERE (drawer.drawerName = '".$_POST['drawerName']."')");
            $drawerID = $query->result_array ()[0]['drawerID'];
            $query = $this->db->query ("SELECT document.documentID FROM document WHERE (document.documentName = '".$_POST['documentName']."')");
            $documentID = $query->result_array ()[0]['documentID'];
            $this->db->query ("UPDATE document SET dateAdded = CURDATE(), isStored = 1 WHERE (document.documentID = '.$documentID.')");
            $this->db->query ("INSERT INTO storage (drawerID, documentID) VALUES ('.$drawerID.', '.$documentID')");
        }

        if (!empty($_POST['drawerName']))
        {
            redirect (base_url('all_stored'), 'redirect');
        }
        else
        {
            redirect (base_url('all_unstored'), 'redirect');
        }
    }

    public function add_drawer ()
    {
        $this->load->database ();
        $this->db->query ("INSERT INTO drawer (drawerName) VALUES ('".$_POST['drawerName']."')");
        redirect ($_POST['currUrl'], 'refresh');
    }

    public function delete_drawer ()
    {
        $this->load->database ();
        // check if there are documents stored in this drawer
        $this->db->query ("SELECT * FROM storage WHERE (storage.drawerID = '".$_POST['drawerID']."')");
        if ($this->db->affected_rows () > 0)
        {
            $this->db->query ("UPDATE document, storage SET isStored = 0 WHERE (storage.drawerID = '".$_POST['drawerID']."') AND (storage.documentID = document.documentID)");
            $this->db->query ("DELETE FROM storage WHERE (storage.drawerID = '".$_POST['drawerID']."')");
        }
        $this->db->query ("DELETE FROM drawer WHERE (drawer.drawerID = '".$_POST['drawerID']."')");
        if ($this->db->affected_rows () > 0)
        {
            echo "ok";
        }
        else
        {
            echo "fail";
        }
    }

    public function delete_document ()
    {
        $this->load->database ();
        // check if document is currently stored. if stored, delete from storage first
        $this->db->query ("SELECT * FROM storage WHERE (storage.documentID = '".$_POST['docID']."')");
        if ($this->db->affected_rows () > 0)
        {
            $this->db->query ("DELETE FROM storage WHERE (storage.documentID = '".$_POST['docID']."')");
        }
        // if document is not stored, delete document
        $this->db->query ("DELETE FROM document WHERE (document.documentID = '".$_POST['docID']."')");
        if ($this->db->affected_rows () > 0)
        {
            echo "ok";
        }
        else
        {
            echo "fail";
        }
        return;
    }

    public function store_document ()
    {
        if ((array_key_exists ("drawerName", $_POST) && !empty($_POST['drawerName'])) && array_key_exists ("documentID", $_POST))
        {
            $this->load->database();
            // check if drawer exists
            $this->db->query("SELECT * FROM drawer WHERE (drawer.drawerName = '".$_POST['drawerName']."')");
            if ($this->db->affected_rows() > 0)
            {
                // drawer is found
                $query = $this->db->query ("SELECT drawer.drawerID FROM drawer WHERE (drawer.drawerName = '".$_POST['drawerName']."')");
                $drawerID = $query->result_array ()[0]['drawerID'];
                $this->db->query("UPDATE document SET isStored = 1 WHERE (document.documentID = '".$_POST['documentID']."')");
                $this->db->query("INSERT INTO storage (drawerID, documentID) VALUES ('.$drawerID.', '".$_POST['documentID']."')");
                if ($this->db->affected_rows() > 0)
                {
                    echo "ok";
                    return;
                }
            }
            else
            {
                // drawer is not found
                echo "No Drawer Found";
                return;
            }
        }
    }

    public function transfer_document ()
    {
        if ((array_key_exists ("newDrawerName", $_POST) && !empty($_POST['newDrawerName'])) && array_key_exists ("documentID", $_POST))
        {
            $this->load->database();
            // check if drawer exists
            $this->db->query("SELECT * FROM drawer WHERE (drawer.drawerName = '".$_POST['newDrawerName']."')");
            if ($this->db->affected_rows() > 0)
            {
                // drawer is found
                $query = $this->db->query ("SELECT drawer.drawerID FROM drawer WHERE (drawer.drawerName = '".$_POST['newDrawerName']."')");
                $drawerID = $query->result_array ()[0]['drawerID'];
                $this->db->query ("UPDATE storage SET storage.drawerID = '.$drawerID.' WHERE (storage.documentID = '".$_POST['documentID']."')");
                if ($this->db->affected_rows() > 0)
                {
                    echo "ok";
                    return;
                }
            }
            else
            {
                // drawer is not found
                echo "No Drawer Found";
                return;
            }
        }
    }
}

?>
