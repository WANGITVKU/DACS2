<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
</head>
<body>
<?php
 session_start();
 
// Kết nối tới cơ sở dữ liệu
$hostName = "localhost:3307";
$dbUser = "root";
$dbPassword = "";
$dbName = "banhang";
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng trong cơ sở dữ liệu
$email = $_SESSION["email"];
$name=$_SESSION["full_name"];
$sql = "SELECT * FROM donhang WHERE email = '$email'";
$result = $conn->query($sql);
echo'<section class="jumbotron text-center">
        <div class="container mb-5 ">
                <h1 class="jumbotron-heading">Lịch mua hàng của '.$name.' </h1>
                <p class="lead text-muted"> Toàn bộ sản phẩm mà bạn đã mua tại cửa hàng BreakRules </p>
            </div>
            </div>
        </section>';
?>

<table class="table table-bordered table-sm">
    <tr class="table-primary">
        <th scope="col">Họ Tên</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>Số Điện THOẠi</th>
        <th>Tên SP</th>
        <th>Giá </th>
        <th>Size</th>
        <th>Số Lượng</th>
        <th>Thành Tiền</th>
        <th>Tổng Tiền</th>
        <th> Thời Gian</th>
        <th> Tình trạng đơn hàng</th>

        <!-- Thêm các cột khác nếu cần -->
    </tr>
   
    <?php
    // Kiểm tra dữ liệu trả về từ truy vấn
    if ($result->num_rows > 0) {
        // Lặp qua từng dòng dữ liệu
        while ($row = $result->fetch_assoc()) {
            // Hiển thị dữ liệu trong từng ô của bảng
            echo "<tr>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['dia_chi'] . "</td>";
            echo "<td>" . $row['sdt'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['thanh_tien'] . "</td>";
            echo "<td>" . $row['tongtien'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['tinh_trang'] . "</td>";
            // Thêm các ô khác nếu cần
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>Không có dữ liệu.</td></tr>";
    }
    ?>
</table>

<?php
// Đóng kết nối tới cơ sở dữ liệu
$conn->close();
?>
</body>