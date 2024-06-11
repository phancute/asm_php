<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa post</title>
</head>
<body>
    <form action="editpost.php?id_post=<?php echo $post['id']; ?>" method="POST">
        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="<?php echo $post['title']; ?>">
        </div>
        <div>
            <label for="">Content</label>
            <input type="text" name="content" value="<?php echo $post['content']; ?>">
        </div>
        <div>
            <label for="">Author</label>
            <select name="user_id" id="">
                <?php foreach ($users as $u) { ?>
                    <?php if ($u['id'] == $post['user_id']) { ?>
                        <option selected value="<?php echo $u['id']; ?>"><?php echo $u['name']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $u['id']; ?>"><?php echo $u['name']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                <?php foreach($categories as $c) { ?>
                    <?php if ($c['id'] == $post['category_id']) { ?>
                        <option selected value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Thumbnail</label>
            <input type="text" name="thumbnail" value="<?php echo $post['thumbnail']; ?>">
        </div>
        <input type="submit" value="Sửa" name="sua">
    </form>
</body>
</html>
