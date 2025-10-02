<?php

//Database
class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = "root", $password = "")
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";


        $this->connection = new PDO ($dsn, $username, $password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($sql, $params = []) 
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);

        return $this;
    }

    //helper functions


    public function get()
        //fetch all notes
    {
        return $this->statement->fetchAll();
    }

    public function find()
        //fetch a single note
    {
        return $this->statement->fetch();
    }

    public function insert($data)
        /* inserting notes 
         * $data is used to pass values outside
         * 
         */
    {
      return $this->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)',
        $data
        );
    }

    public function update($data)
    {
        return $this->query('UPDATE notes SET body = :body WHERE id = :id');
        
    }

    public function delete($data)
    {
        return $this->query('DELETE FROM  notes WHERE id = :id');
    }
}

