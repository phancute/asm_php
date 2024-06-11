<?php

class PostController 
{
    public $postModel;
    public $userModel;
    public $cateModel; 

    public function __construct() 
    {
        require_once './Model/Post.php';
        require_once './Model/User.php';
        require_once './Model/Category.php';
        
        $this->postModel = new Post();
        $this->userModel = new User();
        $this->cateModel = new Category();
    }

    public function index()
    {
        require_once './Views/index.php';
    }

    public function thongTinChiTiet()
    {
        if (isset($_GET['id_post']) && $_GET['id_post'] > 0) { 
            $id = $_GET['id_post'];
            $post = $this->postModel->chiTietPost($id); 
            require_once './Views/detailPost.php';
        }
    }
    

    public function taoMoi()
    {
        if (isset($_POST['them'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $userId = $_POST['user_id'];
            $cateId = $_POST['category_id'];
            $thumbnail = $_POST['thumbnail'];

            $this->postModel->themPost($title,$content,$userId,$cateId,$thumbnail);
            header('location: index.php?act=list');
        } else {
            $users = $this->userModel->listUsers();
            $categories = $this->cateModel->listCate();
            require_once './Views/createPost.php';
        }
    }
    public function chinhSua() {
        if(isset($_GET['id_post']) && $_GET['id_post'] > 0) {
            $id = $_GET['id_post'];
    
            if (isset($_POST['sua'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $userId = $_POST['user_id'];
                $cateId = $_POST['category_id'];
                $thumbnail = $_POST['thumbnail'];
    
                $this->postModel->suaPost($id,$title,$content,$userId,$cateId,$thumbnail);
                // Sử dụng header location với đường dẫn đúng đến trang editPost.php
                header('location: editPost.php?id_post=' . $id);
                exit;
            } else {
                // Lấy dữ liệu post, users và categories
                $post = $this->postModel->chiTietPost($id);
                $users = $this->userModel->listUsers();
                $categories = $this->cateModel->listCate();
                // Hiển thị trang sửa post
                require_once './Views/editPost.php';
                exit;
            }
        }
    }
    

    public function xoa(){
        if(isset($_GET['id_post']) && $_GET['id_post']>0){
            $id = $_GET['id_post'];
            $this->postModel->xoaPost($id);
        }
    }
}

?>
