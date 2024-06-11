<?php
class Category 
{
    //kết nối db
    public $connection; 
    public function __construct()
    {
        $this->connection = connect();
    }

    public function listCate() //lấy danh sách danh mục
    {
        //B1: viết câu truy vấn
        $sql = "SELECT * FROM categories";
        //B2: prepare
        $stmt = $this->connection->prepare($sql);
        //B3: thực thi câu truy vấn
        $stmt->execute();

        //B4: trả về dữ liệu
        return $stmt->fetchAll();
    }
}
?>
