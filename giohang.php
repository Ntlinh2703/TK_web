<?php
require("db/connect.php"); // Kết nối cơ sở dữ liệu

// Xử lý tăng/giảm số lượng sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['giohangid'])) {
        $giohangid = $_POST['giohangid'];

        // Truy vấn số lượng hiện tại
        $stmt = $con->prepare("SELECT amount FROM giohang WHERE giohangid = ?");
        $stmt->bind_param("i", $giohangid); // Bind giá trị
        $stmt->execute(); // Thực hiện truy vấn
        $stmt->bind_result($current_amount); // Bind kết quả
        $stmt->fetch(); // Lấy kết quả
        $stmt->close();

        if ($_POST['action'] === 'increase') {
            $new_amount = $current_amount + 1; // Tăng số lượng
        } elseif ($_POST['action'] === 'decrease') {
            $new_amount = $current_amount - 1; // Giảm số lượng
            if ($new_amount <= 0) {
                // Nếu số lượng <= 0, xóa sản phẩm khỏi giỏ hàng
                $stmt = $con->prepare("DELETE FROM giohang WHERE giohangid = ?");
                $stmt->bind_param("i", $giohangid);
                $stmt->execute();
                $stmt->close();
                header("Location: giohang.php");
                exit;
            }
        }

        // Cập nhật số lượng nếu > 0
        if ($new_amount > 0) {
            $stmt = $con->prepare("UPDATE giohang SET amount = ? WHERE giohangid = ?");
            $stmt->bind_param("ii", $new_amount, $giohangid);
            $stmt->execute();
            $stmt->close();
        }

        // Làm mới trang
        header("Location: giohang.php");
        exit;
    }
}

// Truy vấn danh sách sản phẩm trong giỏ hàng
$sql = "SELECT giohangid, productid, productname, price, amount, images, (price * amount) AS total_price FROM giohang";
$result = $con->query($sql);

$total_price_all = 0; // Tổng tiền toàn bộ giỏ hàng
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Include phần header -->
    <?php include("include/topbar.php"); ?>
    
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
            </ul>
        </div>
    </div>

    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <!-- Bảng sản phẩm -->
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng giá</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <img src="img/<?php echo $row['images']; ?>" alt="<?php echo $row['productname']; ?>" style="width: 100px;">
                                            </td>
                                            <td><?php echo $row['productname']; ?></td>
                                            <td><?php echo number_format($row['price'], 0, ',', '.'); ?> VND</td>
                                            <td>
                                                <form method="POST" action="">
                                                    <input type="hidden" name="giohangid" value="<?php echo $row['giohangid']; ?>">
                                                    <div class="input-group">
                                                        <button class="btn btn-light" type="submit" name="action" value="decrease">-</button>
                                                        <input type="number" name="amount" value="<?php echo $row['amount']; ?>" class="form-control text-center" readonly>
                                                        <button class="btn btn-light" type="submit" name="action" value="increase">+</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td><?php echo number_format($row['total_price'], 0, ',', '.'); ?> VND</td>
                                            <td>
                                                <form method="POST" action="xlxoa.php">
                                                    <input type="hidden" name="giohangid" value="<?php echo $row['giohangid']; ?>">
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $total_price_all += $row['total_price']; ?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Thông tin giỏ hàng -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h1>Thông tin giỏ hàng</h1>
                        <p>Tổng tiền: <span><?php echo number_format($total_price_all, 0, ',', '.'); ?> VND</span></p>
                        <button class="btn btn-primary">Đặt hàng</button> <!-- chưa xử lý được button -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include phần footer -->
    <?php include("include/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    
    <script src="js/main.js"></script>
</body>
</html>