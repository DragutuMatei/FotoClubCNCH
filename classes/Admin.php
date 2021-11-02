<?php
class Admin
{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function getId()
    {
        return $this->_db->get("settings", array("id", ">=", "0"))->first()->id;
    }

    public static function hasAccess()
    {
        if (Session::get("admin")) {
            return true;
        } else {
            return false;
        }
    }

    public function editSite($id, $fields = array())
    {
        /** 
         * TODO:
         * SA STERG POZELE DIN FOLDERE CAND DAU EDIT
         */

        // if ($this->_db->deleteAllFromTable("settings")) {
        if ($this->_db->update("settings", $id, $fields)) {
            return true;
        }
        // }
        return false;
    }

    public function addSezon($fields = array())
    {
        if ($this->_db->insert("sezoane", $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function addPost($fields = array())
    {
        if ($this->_db->insert("posts", $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($fields = array())
    {
        if ($this->_db->delete("posts", $fields)) {
            return true;
        } else {
            return false;
        }
    }
}
