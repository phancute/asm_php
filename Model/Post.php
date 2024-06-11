<?php
class Post 
{
    //tạo kết nối với CSDL
    public $connection;
    public function __construct()
    {   
        $this->connection = connect();
    }

    //lấy toàn bộ bản ghi trong bảng post
    public function danhSachPost() {
        //B1: Viết câu truy vấn 
        //cú pháp join dữ liệu JOIN tenBangCanJoin ON tenBangGoc.ForeignKey = tenBangCanJoin.id 
        $sql = "SELECT *,users.name as author,posts.id as pid
                FROM posts 
                JOIN users ON posts.user_id = users.id
                JOIN categories ON posts.category_id = categories.id";
        // var_dump($sql);
        // die;
        //B2: Thực thi câu truy vấn: 
        $stmt = $this->connection->prepare($sql); //B2.1: prepare
        $stmt->execute(); //B2.2: execute: thực thi câu truy vấn

        //lấy dữ liệu trả về cho controller, 
        //lấy danh sách nên sử dụng hàm fetchAll()
        return $stmt->fetchAll(); 
    }

    public function chiTietPost($id) {
        $sql = "SELECT * FROM posts WHERE id =".$id;
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        //lấy 1 bài post trả về nên sử dụng hàm fetch()
        return $stmt->fetch();
    }

    public function themPost($title,$content,$userId,$cateId,$thumbnail)
    {
        $sql = "INSERT INTO posts (title,content,user_id,category_id,thumbnail) 
                VALUES ('$title','$content','$userId','$cateId','$thumbnail')";

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function suaPost($id,$title,$content,$userId,$cateId,$thumbnail)
    {
        $sql = "UPDATE posts 
            SET title='$title',content='$content',user_id='$userId',category_id='$cateId',thumbnail='$thumbnail'
            WHERE id=$id";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute();
    }

    
    public function xoaPost($id){
        $sql = "DELETE FROM post where id=$id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
}
?>
