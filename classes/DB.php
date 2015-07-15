<?php

class DB
{
    protected $host;
    protected $user;
    protected $pass;
    protected $db_name;
    protected $con;

    function  connect($host, $user, $pass, $db_name)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db_name = $db_name;

        try {
            $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            $this->con = new PDO($dns, $this->user, $this->pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con->exec("SET CHARACTER SET utf8");

        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }

    function select($sql)
    {
        return  $this->con->query($sql);
    }

    function delete($sql)
    {
        $this->con->exec($sql);
    }

    function insert($sql)
    {
        $this->con->query($sql);
    }

    function update($sql)
    {
        $this->con->query($sql);
    }

    function __destruct__()
    {
        $this->con = null;
    }
}
