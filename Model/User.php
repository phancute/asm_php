<?php
class User 
{
    public $connection;

    public function __construct()
    {
        $this->connection = connect();
    }

    public function listUsers() //lấy danh sách trong bảng users
    {
        $sql = 'SELECT * FROM users';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
?>
