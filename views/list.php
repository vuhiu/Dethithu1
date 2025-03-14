<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SACH SP</title>
</head>
<body>
    <div class="header">
        <h1>Danh Sach San Pham</h1>
    </div>

    <table>
        <thead>
            <tr>
               <th>ID</th>
               <th>Tên sách</th>
               <th>Hình ảnh bìa sách</th>
               <th>Tác giả</th>
               <th>Nhà xuất bản</th>
               <th>Ngày xuất bản</th>
               <th></th>
               <th></th>
               <th></th>
            </tr>
           
        </thead>
        <tbody>
            <?php foreach($book as $b) { ?>
                <tr>
                    <td data-label="ID"><?= $b['id']?></td>
                    <td data-label="Title"><?= $b['title']?></td>
                    <td>
                        <img style="width: 100px" src="./upload/<?= $b['image'] ?>" alt="">
                    </td>
                    <td data-label="Author"><?= $b['author']?></td>
                    <td data-label="Publisher"><?= $b['publisher']?></td>
                    <td data-label="Publish_date"><?= $b['publish_date']?></td>
                    <td data-label="Actions">
                        <a href="?act=edit&id=<?=$b['id']?>">Sua</a>
                    </td>
                    <td data-label="Actions">
                        <a href="?act=delete&id=<?=$b['id']?>">Xoa</a>
                    </td>
                    <td data-label="Actions">
                        <a href="?act=create&id=<?=$b['id']?>">them</a>
                    </td>
                </tr>

                
            <?php } ?>
        </tbody>
    </table>
</body>
</html>