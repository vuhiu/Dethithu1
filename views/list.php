<?php
require_once __DIR__ . '/../../../commons/connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = connectDB();
if (!$conn) {
    die("Lỗi kết nối CSDL");
}

// Truy vấn danh sách sản phẩm
$sql = "SELECT p.*, c.name as category_name FROM products p 
        LEFT JOIN categories c ON p.category_id = c.category_id 
        ORDER BY p.created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
?>

<h2>Danh sách sản phẩm</h2>

<!-- Hiển thị thông báo -->
<?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
    <div class="alert alert-success">Xóa sản phẩm thành công!</div>
<?php elseif (isset($_GET['error'])): ?>
    <div class="alert alert-danger">Lỗi khi xóa sản phẩm!</div>
<?php endif; ?>

<a href="?act=sanpham&page=them" class="btn btn-success mb-3">Thêm sản phẩm</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá gốc</th>
      <th scope="col">Giá khuyến mãi</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $index => $product): ?>
      <tr>
        <th scope="row"><?= $index + 1 ?></th>
        <td>
          <img src="<?= htmlspecialchars('../uploads/' . $product['image']) ?>" width="80" height="80" alt="<?= htmlspecialchars($product['name']) ?>">
        </td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td><?= number_format($product['price']) ?>đ</td>
        <td><?= number_format($product['sale_price']) ?>đ</td>
        <td><?= htmlspecialchars($product['category_name']) ?></td>
        <td>
          <a href="?act=sanpham&page=sua&id=<?= $product['product_id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
          <a href="modules/sanpham/delete_product.php?id=<?= $product['product_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>

    <?php if (empty($products)): ?>
      <tr><td colspan="7" class="text-center">Không có sản phẩm nào</td></tr>
    <?php endif; ?>
  </tbody>
</table>
