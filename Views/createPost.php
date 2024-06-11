<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới post</title>
</head>
<body>
    <form action="index.php?act=create" method="POST">
        <div>
            <label for="">Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="">Content</label>
            <input type="text" name="content">
        </div>
        <div>
            <label for="">Author</label>
            <select name="user_id" id="">
                <!-- lấy danh sách user từ bảng users
                để hiển thị ra option -->
                <?php foreach ($users as $u) { ?>
                    <!-- <option value="(giá trị lấy để lưu vào db)">Label (người dùng nhìn thấy)</option> -->
                    <option value="<?= $u['id'] ?>"><?= $u['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                <!-- lấy danh sách danh mục từ bảng categories
                để hiển thị ra option -->
                <?php foreach($categories as $c) { ?>
                    <option value="<?= $c['id'] ?>"><?=$c['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Thumbnail</label>
            <input type="text" name="thumbnail">
        </div>
        <input type="submit" value="Thêm" name="them">
    </form>
</body>
</html>