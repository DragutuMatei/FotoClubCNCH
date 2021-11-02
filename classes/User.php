<?php
class User
{
    private $_db, $_data, $_sessionName;
    public $_isLoggedIn = false;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);
                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert("users", $fields)) {
            throw new Exception("NU AI INTRODUS CORECT DATELE");
        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->_db->get('users', array($field, "=", $user));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($email = null, $parola = null)
    {
        $user = $this->find($email);

        if ($user) {
            if (trim($this->data()->password) === trim(hash("sha256", trim($parola) . trim($this->data()->salt)))) {
                Session::put($this->_sessionName, $this->data()->id);

                return true;
            }
        }

        return false;
    }


    public function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }

    public function logout()
    {
        Session::delete($this->_sessionName);
        $this->_isLoggedIn = false;
    }

    public function like($post_id, $user_id)
    {
        $json = $this->_db->get("posts", array("id", "=", $post_id))->first()->users;
        $ids = json_decode($json);

        $liked = false;

        foreach ($ids as $id) {
            if ($id == $user_id) {
                $liked = !$liked;
            }
        }

        if (!$liked) {
            array_push($ids, intval($user_id));

            if ($this->_db->update("posts", $post_id, array("users" => json_encode($ids)))) {
                return true;
            }
        }
        return false;
    }

    public function likeCheck($post_id, $user_id)
    {
        $users = $this->_db->get("posts", array("id", "=", $post_id))->first()->users;
        $ids = json_decode($users);

        foreach ($ids as $id) {
            if ($id == $user_id) {
                return true;
            }
        }
        return false;
    }

    public function deleteSezon($id)
    {
        $sezon = $this->_db->get("sezoane", array("id", "=", $id));
        $sezon = $sezon->first();

        $posts = $this->_db->get("posts", array("sezon", "=", $sezon->tema));
        $posts = $posts->results();

        foreach ($posts as $post) {
            $this->_db->delete("posts", array("id", "=", $post->id));
        }

        if ($this->_db->delete("sezoane", array("id", "=", $id))) {
            return true;
        } else {
            return false;
        }
    }
}
