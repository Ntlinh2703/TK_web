<?php
include 'db/connect.php'; // Kết nối đến CSDL
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acname = $_POST['acname'];
    $acpass = $_POST['acpass'];

    // Kiểm tra xem tên đăng nhập đã tồn tại chưa
    $sql = "SELECT * FROM account WHERE acname = '$acname'";
    $result = $con->query($sql);

    if ($result->num_rows == 0) {
      
      // Thêm người dùng vào CSDL
      $sql = "INSERT INTO account (acname, acpass) VALUES ('$acname', '$acpass')";
      if ($con->query($sql) === TRUE) {
        $_SESSION['acname'] = $acname; // Lưu thông tin đăng nhập vào session
        header('Location: index.php'); // Chuyển hướng đến trang chính
        exit();
      } else {
          $error = "Có lỗi xảy ra khi đăng ký!";
      }
    } else {
        $error = "Tên đăng nhập đã tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">
        
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .register-form {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .register-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .register-form button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<?php
    include("include/topbar.php");
?>  
<body>
  <h1>Đăng ký</h1>
  <div class="register-form">
    <?php if (isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="signin.php" method="POST">
      <input type="text" name="acname" placeholder="Tên đăng nhập" required>
      <input type="password" name="acpass" placeholder="Mật khẩu" required>
      <input type="text" name="mail" placeholder="Địa chỉ email" required>
      <button type="submit">Đăng ký</button>
    </form><br>
    <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
  </div>
</body>
<?php
  include("include/footer.php");
?>
</html>
