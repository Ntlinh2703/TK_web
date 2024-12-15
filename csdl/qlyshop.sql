-- phpMyAdmin SQL Dump
-- version 
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 
-- Thời gian đã tạo: 
-- Phiên bản máy phục vụ: 
-- Phiên bản PHP: 

-- CREATE DATABASE qlyshop;
;
;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlyshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE account (
  acid int NOT NULL,
  roles varchar(50) NOT NULL,
  acname varchar(50) NOT NULL,
  acpass varchar(50) NOT NULL,
  names varchar(50) NOT NULL,
  mail varchar(50) NOT NULL
);

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO account (acid, roles, acname, acpass, names, mail) VALUES
(1, 'Admin', 'Admin', '123', 'Administrator', 'admin123@gmailcom'),
(2, 'customer', 'dat', '321', N'Trần Đức Đạt', 'Thegodknow1@gmail.com'),
(3, 'customer', 'anh', '321', N'Dương Ngọc Ánh', 'ngocanhcity1111@gmail.com'),
(4, 'customer', 'hieu', '321', N'Phạm Xuân Hiếu', 'hypershanicer@gmail.com'),
(5, 'customer', 'ly', '321', N'Lê Hương Ly', 'lehuongly1708@gmail.com'),
(6, 'customer', 'nga', '321', N'Nguyễn Thị Nga', 'ngangalaydy2001@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE brand (
  brandid int NOT NULL,
  brandname varchar(50) NOT NULL,
  brandimage varchar(50) NOT NULL
);

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO brand (brandid, brandname, brandimage) VALUES
(1, '1', 'brand-1.png'),
(2, '2', 'brand-2.png'),
(3, '3', 'brand-3.png'),
(4, '4', 'brand-4.png'),
(5, '5', 'brand-5.png'),
(6, '6', 'brand-6.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE category (
  categoryid varchar(50) NOT NULL,
  categoryname nvarchar(100) NOT NULL,
  categoryimage nvarchar(50) NOT NULL
);

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO category (categoryid, categoryname, categoryimage) VALUES
('A', 'Điện tử & Điện thoại', 'category-4.jpeg'),
('B', 'Gấu bông & Gối', 'category-1.jpeg'),
('C', 'Balo & Túi ví', 'category-3.jpeg'),
('D', 'Văn phòng phẩm', 'category-2.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE giohang (
  giohangid int NOT NULL,
  productid varchar(50) NOT NULL,
  productname nvarchar(50) NOT NULL,
  price decimal(19,2) NOT NULL,
  amount int NOT NULL,
  images varchar(50) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO giohang (giohangid, productid, productname, price, amount, images) VALUES
(41, 'B13', N'Gấu bông', '160000', 1, 'gấu.jpg'),
(42, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(43, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(44, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(45, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(46, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(47, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(48, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(49, 'B14', N'Quả chuối', '160000', 1, 'chuối.jpg'),
(50, 'A15', N'Tai nghe trắng', '80000', 1, 'tai nghe trắng.jpg'),
(51, 'D41', N'Hộp quà giấy xanh', '20000', 1, 'quà xanh.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `minicategory`
--

CREATE TABLE minicategory (
  categoryid varchar(50) NOT NULL,
  miniid varchar(50) NOT NULL,
  mininame nvarchar(50) NOT NULL,
  miniimage varchar(50) NOT NULL
);

--
-- Đang đổ dữ liệu cho bảng `minicategory`
--

INSERT INTO minicategory (categoryid, miniid, mininame, miniimage) VALUES
('A', 'A1', N'Phụ kiện điện thoại', 'category-6.jpeg'),
('A', 'A2', N'Máy làm tóc', ''),
('A', 'A3', N'Đồ dùng tiện ích', 'category-4.jpeg'),
('B', 'B1', N'Gấu bông cute', 'category-1.jpeg'),
('B', 'B2', N'Gối chữ U', ''),
('B', 'B3', N'Gấu bông idol', ''),
('B', 'B4', N'Chăn mền', ''),
('C', 'C1', N'Túi đeo', 'category-7.jpeg'),
('C', 'C2', N'Balo', 'category-3.jpeg'),
('C', 'C3', N'Ví', ''),
('D', 'D1', N'Dụng cụ học tập', ''),
('D', 'D2', N'Sổ vở', 'category-2.jpeg'),
('D', 'D3', N'Móc khóa', ''),
('D', 'D4', N'Quà tặng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE product (
  categoryid varchar(50) NOT NULL,
  miniid varchar(50) NOT NULL,
  productid varchar(50) NOT NULL,
  productname nvarchar(50) NOT NULL,
  amount int NOT NULL,
  price decimal(19,2) NOT NULL,
  images varchar(50) NOT NULL,
  descriptions nvarchar(4000) NOT NULL
);

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO product (categoryid, miniid, productid, productname, amount, price, images, descriptions) VALUES
('A', 'A1', 'A11', N'Ốp điện thoại vàng', 10, '50000', 'ốp đt vàng.jpg', N'- Phân loại: Micro USB, Type C, Lighting\n- Màu sắc: Vàng\n- Tên Sản Phẩm: Cáp sạc nhanh 6A'),
('A', 'A1', 'A12', N'Ốp điện thoại đỏ', 7, '50000', 'ốp đt đỏ.jpg', N'- Phân loại: Micro USB, Type C, Lighting\n- Màu sắc: Đỏ\n- Tên Sản Phẩm: Cáp sạc nhanh 6A'),
('A', 'A1', 'A13', N'Ốp điện thoại xanh', 94, '50000', 'ốp đt xanh.jpg', N'- Phân loại: Micro USB, Type C, Lighting\n- Màu sắc: Xanh\n- Tên Sản Phẩm: Cáp sạc nhanh 6A'),
('A', 'A1', 'A14', N'Dây sạc điện thoại vàng ', 78, '90000', 'dây sạc đt vàng.jpg', N' - Phân loại: Micro USB, Type C, Lighting - Màu sắc: Vàng\n- Tên Sản Phẩm: Cáp sạc nhanh 6A'),
('A', 'A1', 'A15', N'Tai nghe trắng', 76, '80000', 'tai nghe trắng.jpg', N'Thiết kế trẻ trung Tai Nghe Nhét Tai sở hữu thiết kế đơn giản kết hợp với các gam màu trẻ trung, năng động.'),
('A', 'A1', 'A16', N'Tai nghe đen', 12, '80000', 'tai nghe đen.jpg', N'Thiết kế trẻ trung Tai Nghe Nhét Tai sở hữu thiết kế đơn giản kết hợp với các gam màu trẻ trung, năng động.'),
('A', 'A1', 'A17', N'Tai nghe hồng', 54, '80000', 'tai nghe hồng.jpg', N'Thiết kế trẻ trung Tai Nghe Nhét Tai sở hữu thiết kế đơn giản kết hợp với các gam màu trẻ trung, năng động.'),
('A', 'A2', 'A21', N'Máy xoăn lọn', 70, '150000', 'máy xoăn lọn.jpg', N'- Máy phồng cụp tóc có 5 mức chỉnh nhiệt:  - Kich thước máy dài 30 cm  - Kích thước mặt là: 2 x 11 cm'),
('A', 'A2', 'A22', N'Máy xoăn sóng', 8, '150000', 'máy xoăn sóng.jpg', N'- Máy phồng cụp tóc có 5 mức chỉnh nhiệt:  - Kich thước máy dài 30 cm  - Kích thước mặt là: 2 x 11 cm'),
('A', 'A2', 'A23', N'Máy kẹp thẳng', 69, '150000', 'máy kẹp thẳng.jpg', N'- Máy phồng cụp tóc có 5 mức chỉnh nhiệt:  - Kich thước máy dài 30 cm  - Kích thước mặt là: 2 x 11 cm'),
('A', 'A2', 'A24', N'Máy tết tóc', 50, '120000', 'máy tết tóc.jpg', N'- Máy phồng cụp tóc có 5 mức chỉnh nhiệt:  - Kich thước máy dài 30 cm  - Kích thước mặt là: 2 x 11 cm'),
('A', 'A2', 'A25', N'Lược sấy tóc', 15, '160000', 'lược sấy tóc.jpg', N'- Điện áp: 110 / 240V 50-60Hz - Nhiệt độ: 60 ° C - 120 ° C / 140 ° F - 248 ° F - Công suất: 1000W.'),
('A', 'A2', 'A26', N'Máy sấy tóc', 40, '150000', 'máy sấy tóc.jpg', N'- Máy phồng cụp tóc có 5 mức chỉnh nhiệt:  - Kich thước máy dài 30 cm  - Kích thước mặt là: 2 x 11 cm'),
('A', 'A2', 'A27', N'Lược', 42, '20000', 'lược.jpg', N'- Lược chải tóc Massage, Gỡ rối, Chống rụng tóc (Vietnam)  - Sản phẩm được nhập khẩu trực tiếp từ ongtre (không qua trung gian).'),
('A', 'A3', 'A31', N'Máy mát xa', 22, '200000', 'máy mát xa.jpg', N'Công suất 18W, tạo lực rung mạnh tác động sâu vào các cơ  7 đầu massage độc đáo với kiểu dáng và công dụng riêng.'),
('A', 'A3', 'A32', N'Lược mát xa', 43, '50000', 'lược mát xa.jpg', N'- Lược chải tóc Massage, Gỡ rối, Chống rụng tóc.'),
('A', 'A3', 'A33', N'Máy phun sương', 53, '60000', 'máy phun sương.jpg', N'Nhập khẩu và Đóng gói: CÔNG TY TNHH TIGERLIFE VIỆT NAM '),
('A', 'A3', 'A34', N'Gậy mát xa bơ', 82, '20000', 'gậy mx bơ.jpg', N'Cây gậy thần kì đấm lưng hình thú siêu dễ thương'),
('A', 'A3', 'A35', N'Gậy mát xa hà mã', 70, '20000', 'gậy mx hà mã.jpg', N'Cây gậy thần kì đấm lưng hình thú siêu dễ thương '),
('A', 'A3', 'A36', N'Gậy mát xa khủng long', 48, '20000', 'gậy mx khủng long.jpg', N'Cây gậy thần kì đấm lưng hình thú siêu dễ thương '),
('A', 'A3', 'A37', N'Gậy mát xa hổ', 89, '20000', 'gậy mx hổ.jpg', N'Cây gậy thần kì đấm lưng hình thú siêu dễ thương 🍀 Phần tay cầm đư'),
('B', 'B1', 'B11', N'Mèo', 71, '160000', 'mèo.jpg', N'Màu Sắc: xám/n- Chất Liệu: 100% Bông gòn cao cấp. KÍCH THƯỚC : 25cm - 40cm - 50cm - 60cm - 70cm - 90cm '),
('B', 'B1', 'B12', N'Thỏ', 54, '160000', 'thỏ,jpg', N'Màu Sắc: xám/n- Chất Liệu: 100% Bông gòn cao cấp. KÍCH THƯỚC : 25cm - 40cm - 50cm - 60cm - 70cm - 90cm '),
('B', 'B1', 'B13', N'Gấu bông', 41, '160000', 'gấu.jpg', N'Màu Sắc: xám/n- Chất Liệu: 100% Bông gòn cao cấp. KÍCH THƯỚC : 25cm - 40cm - 50cm - 60cm - 70cm - 90cm '),
('B', 'B1', 'B14', N'Quả chuối', 75, '160000', 'chuối.jpg', N'Màu Sắc: xám/n- Chất Liệu: 100% Bông gòn cao cấp. KÍCH THƯỚC : 25cm - 40cm - 50cm - 60cm - 70cm - 90cm'),
('B', 'B1', 'B15', N'Kì lân', 50, '160000', 'kì lân.jpg', N'Màu Sắc: xám/n- Chất Liệu: 100% Bông gòn cao cấp. KÍCH THƯỚC : 25cm - 40cm - 50cm - 60cm - 70cm - 90cm '),
('B', 'B2', 'B21', N'Gối đen', 4, '60000', 'đen.jpg', N'Trạng trạng: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B2', 'B22', N'Gối xám', 40, '60000', 'xám.jpg', N'Trạng trạng: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B2', 'B23', N'Gối xanh', 31, '60000', 'xanh.jpg', N'Trạng trạng: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B2', 'B24', N'Gối hồng', 40, '60000', 'hồng.jpg', N'Trạng trạng: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B2', 'B25', N'Gối tím', 67, '60000', 'tím.jpg', N'Trạng trạng: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B3', 'B31', N'Tanjiro', 57, '200000', 'tanjiro.jpg', N'Trạng thái: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B3', 'B32', N'Nezuko', 7, '200000', 'nezuko.jpg', N'Trạng thái: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B3', 'B33', N'Zenitsu', 100, '200000', 'zenitsu.jpg', N'Trạng thái: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B3', 'B34', N'Giyu', 62, '200000', 'giyu.jpg', N'Trạng thái: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B3', 'B35', N'Obanai', 43, '200000', 'obanai.jpg', N'Trạng thái: 100% mới  Kê thêm: chi cao đạng khoảng 15 cm / 5.91in  Danh sách đóng gói: 1 * búp bê.'),
('B', 'B4', 'B41', N'Cat paw', 59, '145000', 'cat paw.jpg', N'Thông Tin Sản Phẩm Tên sản phẩm: Bộ chăn gối văn phòng hoa quả biểu cảm, hoa quả tròn, vuông.'),
('B', 'B4', 'B42', N'Cá mập', 12, '145000', 'cá mập.jpg', N'Thông Tin Sản Phẩm Tên sản phẩm: Bộ chăn gối văn phòng hoa quả biểu cảm, hoa quả tròn, vuông.'),
('B', 'B4', 'B43', N'Shiba', 45, '145000', 'shiba.jpg', N'Thông Tin Sản Phẩm Tên sản phẩm: Bộ chăn gối văn phòng hoa quả biểu cảm, hoa quả tròn, vuông.'),
('B', 'B4', 'B44', N'Rabbit star', 31, '145000', 'rabbit.jpg', N'Thông Tin Sản Phẩm Tên sản phẩm: Bộ chăn gối văn phòng hoa quả biểu cảm, hoa quả tròn, vuong.'),
('B', 'B4', 'B45', N'Cinnamoroll', 50, '145000', 'cinnamoroll.jpg', N'Thông Tin Sản Phẩm Tên sản phẩm: Bộ chăn gối văn phòng hoa quả biểu cảm, hoa quả tròn, vuông.'),
('C', 'C1', 'C11', N'Alex', 69, '110000', 'alex.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C1', 'C12', N'Cinndy', 43, '110000', 'cinndy.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C1', 'C13', N'Hannah', 51, '110000', 'hannah.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C1', 'C14', N'Andy', 90, '110000', 'andy.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C1', 'C15', N'Mon', 80, '110000', 'mon.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C1', 'C16', N'Nick', 11, '110000', 'nick.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C1', 'C17', N'Will', 51, '110000', 'will.jpg', N'Túi đeo chéo trước ngực (balo đeo chéo)'),
('C', 'C2', 'C21', N'Cat face', 25, '250000', 'cat face.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc'),
('C', 'C2', 'C22', N'Pokemon', 46, '250000', 'pokemon.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc'),
('C', 'C2', 'C23', N'Pocket', 82, '250000', 'pocket.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc'),
('C', 'C2', 'C24', N'Smiley', 72, '250000', 'smiley.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc'),
('C', 'C2', 'C25', N'Flower', 54, '250000', 'flower.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc'),
('C', 'C2', 'C26', N'Bear', 86, '250000', 'bear.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc'),
('C', 'C2', 'C27', N'Paw', 26, '250000', 'paw.jpg', N'Ba lô Kawaii Nhật Bản Harajuku JK Kẻ sọc');
INSERT INTO product (categoryid, miniid, productid, productname, amount, price, images, descriptions) VALUES
('C', 'C3', 'C31', N'Đen', 89, '250000', 'đen.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('C', 'C3', 'C32', N'Trắng', 17, '65000', 'trắng.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('C', 'C3', 'C33', N'Hồng', 58, '65000', 'hồng.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('C', 'C3', 'C34', N'Pastel', 8, '65000.00', 'pastel.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('C', 'C3', 'C35', N'Custom', 5, '65000', 'custom.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('C', 'C3', 'C36', N'Avocado', 23, '65000', 'avocado.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('C', 'C3', 'C37', N'Gucci', 41, '65000', 'gucci.jpg', N'Ví nam, ví nữ nhỏ, ví da lộn Jolizeon cao cấp mini.'),
('D', 'D1', 'D11', N'Bút chì kim', 46, '30000', 'bút chì kim.jpg', N'Bút chì kim Đức cỡ nét 0.5mm được nhập khẩu từ Đức.'),
('D', 'D1', 'D12', N'Dao rọc giấy', 39, '35000', 'dao rọc giấy.jpg', N'DỌC GIẤY VĂN PHÒNG PHẨM TIỆN ÍCH ĐA NĂNG BẰNG INOX MINI KHÔNG RỈ.'),
('D', 'D1', 'D13', N'Hộp bút', 30, '160000', 'hộp bút.jpg', N'Hộp Đựng Bút Công Suất Lớn Vải Canvas Hai Lớp Đa Chức Năng'),
('D', 'D1', 'D14', N'Kẹp tài liệu', 75, '20000', 'kẹp tài liệu.jpg', N'Mẫu bìa hồ sơ tiện dụng với 02 kẹp ngang và đứng.'),
('D', 'D1', 'D15', N'Bút sáp màu', 27, '80000', 'bút sáp màu.jpg', N'️ Kích thước: 10 cm * 11 cm * 1 cm ️ Sử dụng nguyên liệu an toàn.'),
('D', 'D2', 'D21', N'Xanh', 81, '10000', 'xanh.jpg', N'Thông tin chi tiết sản phẩm:  - Kích thước: 175 x 250 (±2mm) - Số trang: 80 trang'),
('D', 'D2', 'D22', N'Tím', 59, '10000', 'tím.jpg', N'Thông tin chi tiết sản phẩm:  - Kích thước: 175 x 250 (±2mm) - Số trang: 80 trang'),
('D', 'D2', 'D23', N'Cam', 90, '10000', 'cam.jpg', N'Thông tin chi tiết sản phẩm:  - Kích thước: 175 x 250 (±2mm) - Số trang: 80 trang'),
('D', 'D2', 'D24', N'Hồng', 65, '10000', 'hồng.jpg', N'Thông tin chi tiết sản phẩm:  - Kích thước: 175 x 250 (±2mm) - Số trang: 80 trang'),
('D', 'D2', 'D25', N'Giấy kiểm tra', 67, '16000', 'giấy kiểm tra.jpg', N'GIẤY KẺ NGANG - Kích thước: 175X250- Số lượng: 20 tờ đôi'),
('D', 'D3', 'D31', N'Cún con', 16, '20000', 'cún.jpg', N'- Móc chìa khóa hoạt hình 3D ngộ nghĩnh - món phụ kiện nhỏ xinh và vô cùng độc đáo.'),
('D', 'D3', 'D32', N'Vịt', 3, '20000', 'vịt.jpg', N'- Móc chìa khóa hoạt hình 3D ngộ nghĩnh - món phụ kiện nhỏ xinh và vô cùng độc đáo.'),
('D', 'D3', 'D33', N'Heo ', 78, '20000', 'heo.jpg', N'- Móc chìa khóa hoạt hình 3D ngộ nghĩnh - món phụ kiện nhỏ xinh và vô cùng độc đáo'),
('D', 'D3', 'D34', N'Mèo con', 70, '20000', 'mèo.jpg', N'- Móc chìa khóa hoạt hình 3D ngộ nghĩnh - món phụ kiện nhỏ xinh và vô cùng độc đáo'),
('D', 'D3', 'D35', N'Thỏ con', 80, '20000', 'thỏ con.jpg', N'- Móc chìa khóa hoạt hình 3D ngộ nghĩnh - món phụ kiện nhỏ xinh và vô cùng độc đáo'),
('D', 'D4', 'D41', N'Hộp quà giấy xanh', 80, '20000', 'quà xanh.jpg', N'Hộp quà giấy kraft được trang trí handmade'),
('D', 'D4', 'D42', N'Hộp quà giấy sky', 81, '20000', 'sky.jpg', N'Hộp quà giấy kraft được trang trí handmade'),
('D', 'D4', 'D43', N'Hôp quà giấy mail', 61, '20000', 'mail.jpg', N'Hộp quà giấy kraft được trang trí handmade.'),
('D', 'D4', 'D44', N'Hộp quà thank you', 18, '20000', 'thanku.jpg', N'Hộp quà giấy kraft được trang trí handmade.'),
('D', 'D4', 'D45', N'Hộp quà congratulation', 68, '20000', 'congratuation.jpg', N'Hộp quà giấy kraft được trang trí handmade.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE slider (
  sliderid int NOT NULL,
  sliderimage varchar(50) NOT NULL,
  slideractive int NOT NULL DEFAULT 1,
  slidercaption text NOT NULL
);

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO slider (sliderid, sliderimage, slideractive, slidercaption) VALUES
(1, 'slide-5.jpg', 1, N'Hoa xinh mừng lễ 20/10!'),
(2, 'slide-6.jpg', 1, N'Bắt trend giá sốc'),
(3, 'slide-7.jpg', 1, N'Tháng mới siêu freeship'),
(4, 'slide-8.jpg', 1, N'Siêu hội đời sống');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE account
  ADD PRIMARY KEY (acid);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE brand
  ADD PRIMARY KEY (brandid);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE category
  ADD PRIMARY KEY (categoryid);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE giohang
  ADD PRIMARY KEY (giohangid);

--
-- Chỉ mục cho bảng `minicategory`
--
ALTER TABLE minicategory
  ADD PRIMARY KEY (miniid),
  ADD KEY fk_mini (categoryid);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE product
  ADD PRIMARY KEY (productid),
  ADD KEY fk_product (categoryid),
  ADD KEY fk_minipd (miniid);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE slider
  ADD PRIMARY KEY (sliderid);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE account
  MODIFY acid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE brand
  MODIFY brandid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE giohang
  MODIFY giohangid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE slider
  MODIFY sliderid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `minicategory`
--
ALTER TABLE minicategory
  ADD CONSTRAINT fk_mini FOREIGN KEY (categoryid) REFERENCES category (categoryid);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE product
  ADD CONSTRAINT fk_minipd FOREIGN KEY (miniid) REFERENCES minicategory (miniid),
  ADD CONSTRAINT fk_product FOREIGN KEY (categoryid) REFERENCES category (categoryid);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
