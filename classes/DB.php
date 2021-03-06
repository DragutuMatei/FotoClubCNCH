<?php

class DB
{
    private static $_instance = null;
    private $_results, $_error = false, $_pdo, $_query, $count = 0;

    private function __construct()
    {
        try {
            $this->_pdo = new PDO("mysql:host=" . Config::get("mysql/host") . ";dbname=" . Config::get("mysql/db"), Config::get("mysql/username"), Config::get("mysql/password"));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }

        return self::$_instance;
    }


    public function query($sql, $params = array())
    {
        $this->_error = false;

        if ($this->_query = $this->_pdo->prepare($sql)) {
            if (count($params)) {
                $x = 1;

                foreach ($params as $param => $plm) {
                    $this->_query->bindValue($x, $plm);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function action($action, $table, $where = array(), $option = "")
    {
        if (count($where) == 3) {
            $operators = array("=", ">=", "<=", ">", "<");
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? {$option}";
                if (!$this->query($sql, array($value))->getError()) {
                    return $this;
                }
            }
        }
        return false;
    }


    public function get($table, $where, $option = "")
    {
        return $this->action("SELECT * ", $table, $where, $option);
    }

    public function update($table, $id, $fields = array())
    {
        if (count($fields)) {
            $set = "";
            $x = 1;

            foreach ($fields as $name => $value) {
                $set .= "${name} = ?";

                if ($x < count($fields)) {
                    $set .= ", ";
                }
                $x++;
            }


            $sql = "UPDATE " . $table . " SET " . $set . " WHERE id=${id} ";

            if (!$this->query($sql, $fields)->getError()) {
                return true;
            }
        }

        return false;
    }

    public function deleteAllFromTable($table)
    {
        $sql = "DELETE FROM {$table}";
        if (!$this->query($sql, array())->getError()) {
            return true;
        }
        return false;
    }

    public function insert($table, $fields = array())
    {
        $keys = array_keys($fields);
        $values = "";
        $x = 1;

        foreach ($fields as $field) {
            $values .= "?";

            if ($x < count($fields)) {
                $values .= ", ";
            }
            $x++;
        }

        $sql = "INSERT INTO " . $table . " (`" . implode('`, `', $keys) . "`) VALUES (" . $values . ")";

        if (!$this->query($sql, $fields)->getError()) {
            return true;
        }

        return false;
    }

    public function delete($table, $fields = array())
    {
        if (!$this->action("DELETE ", $table, $fields)) {
            return true;
        }

        return false;
    }

    public function results()
    {
        return $this->_results;
    }

    public function first()
    {
        return $this->_results[0];
    }

    public function count()
    {
        return $this->_count;
    }

    public function getError()
    {
        return $this->_error;
    }
}
