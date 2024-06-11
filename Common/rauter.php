<?php
// Common/router.php

class Router {
    public function route() {
        $action = isset($_GET['act']) ? $_GET['act'] : 'index';

        require_once './Controller/PostController.php';
        $postController = new PostController();

        switch ($action) {
            case 'index':
                $postController->index();
                break;
            case 'thongTinChiTiet':
                $postController->thongTinChiTiet();
                break;
            case 'taoMoi':
                $postController->taoMoi();
                break;
            case 'chinhSua':
                $postController->chinhSua();
                break;
                
            case 'xoa':
                $postController->xoa();
                break;
            case 'detail':
                $postController->thongTinChiTiet(); // Gọi hàm thongTinChiTiet() trong PostController
                break;
            default:
                // Nếu action không tồn tại, điều hướng đến trang 404
                header("HTTP/1.0 404 Not Found");
                echo "404 Not Found";
                break;
        }
    }
}
?>
