<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài post</title>
</head>
<body>
    <a href="index.php?act=create">Create</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Category</th>
                <th>Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $p) { ?>
                <tr>
                    <td><?= $p['pid'] ?></td>
                    <td><?= $p['title'] ?></td>
                    <td><?= $p['content'] ?></td>
                    <td><?= $p['author'] ?></td>
                    <td><?= $p['name'] ?></td>
                    <td><img src="<?=$p['thumbnail']?>" alt=""></td>
                    <td>
                        <a href="index.php?act=detail&id_post=<?=$p['pid'] ?>">Detail</a>
                        <a href="index.php?act=edit&id_post=<?= $p['pid'] ?>">Edit</a>
                        <a href="index.php?act=delete?id_post=<?=$p['pid']?>"onclick
                        = return confirm('bạn có chắc không')>Delete</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>