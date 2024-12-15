<?php
include('db/connect.php');
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $acname = $_POST['acname'];
        $acpass = $_POST['acpass'];
    
        // Kiểm tra thông tin đăng nhập trong CSDL
        $sql = "SELECT * FROM account WHERE acname = '$acname' AND acpass = '$acpass'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Lấy thông tin người dùng
            $_SESSION['acname'] = $acname; // Lưu thông tin đăng nhập vào session
            $_SESSION['roles'] = $row['roles']; // Lưu quyền hạn vào session

            // Kiểm tra phân quyền
            if ($row['roles'] == 'Admin') {
                header('Location: index.php'); // Chuyển hướng đến trang index
            } else {
                header('Location: my account.php'); // Chuyển hướng đến trang tk
            }
            exit();
        } 
        else {
            $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
     <!-- Favicon -->
     <link href="img/icon.png" rel="icon">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
        
        <!-- CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        
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
        .login-form {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form button:hover {
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
    <h1>Đăng nhập</h1>
    <div class="login-form">
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <input type="text" name="acname" placeholder="Tên đăng nhập" required>
            <input type="password" name="acpass" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
        </form> <br>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </div>
</body>
<?php
include("include/footer.php");
?>
</html>
