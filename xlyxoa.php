<?php
require("db/connect.php"); // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['giohangid'])) {
    $giohangid = intval($_POST['giohangid']); // Đảm bảo an toàn bằng cách chuyển thành số nguyên

    // Chuẩn bị câu lệnh xóa sản phẩm khỏi giỏ hàng
    $stmt = $con->prepare("DELETE FROM giohang WHERE giohangid = ?");
    $stmt->bind_param("i", $giohangid);

    // Thực hiện câu lệnh
    if ($stmt->execute()) {
        // Nếu xóa thành công, chuyển hướng về trang giỏ hàng
        header('Location: giohang.php');
        exit; // Dừng xử lý sau khi chuyển hướng
    } else {
        // Hiển thị lỗi nếu xảy ra lỗi khi xóa
        echo "Lỗi khi xóa sản phẩm: " . $stmt->error;
    }

    $stmt->close(); // Đóng câu lệnh
} else {
    // Nếu không có `giohangid` trong request hoặc phương thức không phải POST
    echo "Yêu cầu không hợp lệ.";
}
?>
