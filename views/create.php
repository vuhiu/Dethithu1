<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Thêm Mới</h1>
    <form action="index.php?act=create" method="POST" enctype="multipart/form-data">
    <div>
            <label for="name">Id</label>
            <input type="text" name="id" required>
        </div>
        <div>
            <label for="name">Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" required>
        </div>
        <div>
            <label for="brand">Author</label>
            <input type="text" name="author" required>
        </div>
        <div>
            <label for="color">publisher</label>
            <input type="text" name="publisher" required>
        </div>
        <div>
            <label for="color">publish_date</label>
            <input type="text" name="publish_date" required>
        </div>
        <input type="submit" name="them" value="Thêm Mới"> 
    </form>
</body>
</html>