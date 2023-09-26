<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<section class="jumbotron text-center">
        <div class="container mb-5 ">
                <h1 class="jumbotron-heading">Trang ADMIN</h1>
                <p class="lead text-muted">Danh sách đơn hàng </p>
            </div>
            </div>
        </section>
<?php
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
$sql = "SELECT * FROM donhang";
$result = $conn->query($sql);
?>

<table class="table table-bordered table-sm">
    <tr class="table-primary">
        <th scope="col">ID</th>
        <th>Họ tên</th>
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
            echo "<td>" . $row['id'] . "</td>";
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
            ?>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <td>
            <select name="status">
            <option value="Đang xử lý">Đang xử lý</option>
            <option value="Đã hủy">Đã hủy</option>
            <option value="Đang giao">Đang giao</option>
            </select>
            </td>
<?php
// Generate the select dropdown for order status

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    
    if (isset($_POST["status"])) {
        // Lấy giá trị đã chọn và lưu vào biến
        $selectedStatus = $_POST["status"];
        $orderId = $row['id'];  }
       
    // Cập nhật dữ liệu vào cột 'tinh_trang' trong cơ sở dữ liệu
    $updateSql = "UPDATE donhang SET tinh_trang = ' $selectedStatus' WHERE id = $orderId";
    if ($conn->query($updateSql) === TRUE) {
        // Tải lại trang hiện tại
        echo"cập nhâp thanh cong";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Lỗi khi cập nhật dữ liệu: " . $conn->error;
    }
}
echo "</select>";
echo "</td>
";

            // Thêm các ô khác nếu cần
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>Không có dữ liệu.</td></tr>";
    }
    ?>
    <td>
            <button type="submit" name="update_button">Cập nhật</button>
        </td>
        <td>
        <a href="index.php"><button type="button">Quay về trang chủ</button></a>
        </td>
</table>
</form>
<?php
// Đóng kết nối tới cơ sở dữ liệu
$conn->close();
?>
</body>