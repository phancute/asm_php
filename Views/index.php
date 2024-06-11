<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL; ?>/assets/css/index.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">News Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Fetch and display posts from database -->
            <?php
            // Connect to the database
            $conn = connect();
            // Fetch posts
            $stmt = $conn->prepare("SELECT * FROM posts");
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($posts as $post) {
                echo '
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="' . $post['thumbnail'] . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $post['title'] . '</h5>
                            <p class="card-text">' . substr($post['content'], 0, 100) . '...</p>
                            <a href="index.php?act=detail&id_post=' . $post['id'] . '" class="btn btn-primary mr-2">Read More</a> 
                            <a href="editPost.php?act=chinhSua&id_post=' . $post['id'] . '" class="btn btn-info mr-2">Edit</a>
                            <a href="index.php?act=delete&id_post=' . $post['id'] . '" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
                ';
            }        
            ?>
        </div>
    </div>

    <!-- Add Button -->
    <div class="container mt-4">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <a href="index.php?act=add" class="btn btn-success btn-block">Thêm bài viết mới</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 News Website. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
