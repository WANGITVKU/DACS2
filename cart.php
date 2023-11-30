<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="css/style5.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1>cửa hàng</h1>
        </div>    
        <div class="row mb menu">
            <ul>
                <li><a href="index2.php">Trang chủ</a></li>
                <li><a href="cart.html">Giỏ hàng</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi đáp</a></li>
            </ul>
        </div>      
        <div class="row mb ">
            <div class="boxtrai mr">
                <div class="row">
                    <h1>THÔNG TIN NHẬN HÀNG</h1>
                    <?php  session_start();
                     $full_name = $_SESSION["full_name"];
                     $email=$_SESSION["email"];
                     ?>
    <div class="d-flex justify-content-center">
    <table  class="table table-bordered">
        <tr class="table-primary">
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Xóa</th>
        </tr>
        <?php if(isset($_SESSION['cart'])) foreach($_SESSION['cart'] as $index=>$item) { ?>
            
        <tr>
        <td class="align-middle text-center"><?php echo $item['name'] ?></td>
            <td><img src="<?php echo $item['img'] ?>" width="50px" ></td>
            <td class="align-middle text-center"><?php echo $item['price'] ?></td>
            <td class="align-middle text-center">
                <a href="cart.php?increase=<?=$index?>"> - </a>
                <?php echo $item['quantity'] ?>
                <a href="cart.php?decrease=<?=$index?>"> + </a>
            </td>
            <td class="align-middle text-center"><?php echo $item['price'] ?></td>
            <td class="align-middle text-center">
                <a href="cart.php?del=<?=$index?>">Xóa</a>
            </td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="4">Tổng tiền</td>
          <td colspan="2">
            <?php
                $tongtien=0;
                foreach($_SESSION['cart'] as $item){
                    $tongtien+=$item['price']*$item['quantity'];
                } 
                echo $tongtien;
            ?>
          </td>  
        </tr>
    </table>
            </div>
    <a href="index2.php">Tiếp tục mua hàng</a>
    <a href="cart.php?del=all">Xóa hết giỏ hàng</a>
    <a href="history.php">Lịch sử mua hàng của bạn</a>
    <?php
    if(isset($_GET['del'])){
        if($_GET['del']=='all'){
            unset($_SESSION['cart']);
            header("Location:index2.php");
        } else{
            $index=$_GET['del'];
            unset($_SESSION['cart'][$index]);
            header("Location:cart.php");
        }
    }
    if(isset($_GET['increase'])){   
       $index=$_GET['increase'];
       if($_SESSION['cart'][$index]['quantity']>1){
         $_SESSION['cart'][$index]['quantity']-=1;
       }
       header("Location: cart.php");
      

    }
    if(isset($_GET['decrease'])){
        $index=$_GET['decrease'];
        $_SESSION['cart'][$index]['quantity']+=1;
        header("Location: cart.php");

    }
    //Kiểm tra nút "submit": Dòng mã if (isset($_POST["submit"])) kiểm tra xem người dùng đã nhấn nút "submit" trên biểu mẫu hay chưa. 
    if (isset($_POST['submit'])) {
       
        $hostName = "localhost:3307";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "banhang";
        $conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);
       
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
      
        $option = $conn->real_escape_string($_POST['option']);
        $full_name = $conn->real_escape_string($_POST['full_name']);
        $email = $conn->real_escape_string($_POST['email']);
        $diachi = $conn->real_escape_string($_POST['diachi']);
        $std =  $_POST['dienthoai'];
        // Kiểm tra xem giỏ hàng có sản phẩm không
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Kết nối tới cơ sở dữ liệu
            
            // Tạo truy vấn INSERT dữ liệu vào bảng "donhang"
            $tongtien = 0; // Tổng tiền
            $time = date('Y-m-d H:i:s');
            foreach($_SESSION['cart'] as $item) {
              
                $name = $conn->real_escape_string($item['name']);
                $img = $conn->real_escape_string($item['img']);
                $price = $item['price'];
                $quantity = $item['quantity'];
                $thanh_tien = $price * $quantity;
        
                // Tính tổng tiền
                
                
                // Thực hiện truy vấn INSERT
                $sql = "INSERT INTO donhang (full_name,email,dia_chi,sdt,name,price,size, quantity, thanh_tien,time) VALUES ('$full_name','$email',' $diachi','$std','$name',  $price,'$option', $quantity, $thanh_tien,'$time')";
                if ($conn->query($sql) === FALSE) {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            }
        
             echo '
             <div class="alert alert-success" role="alert">
             Đã đặt hàng thành công
            </div>';
            // Đóng kết nối tới cơ sở dữ liệu
            $conn->close();
        
            // Hiển thị thông báo thành công
           
        
            // Cập nhật tổng tiền vào bảng 'donhang'
            $conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);
            $tongtien = $conn->real_escape_string($tongtien);
            $update_sql = "UPDATE donhang SET tongtien = $tongtien WHERE time = '$time'";
            if ($conn->query($update_sql) === FALSE) {
                echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">
           Giỏ hàng trống
           </div>';
        }
    }
    ?>
    <form action="cart.php" method="POST">
    <table class="thongtinnhanhang">
    <tr>
    <td width="20%">Họ tên</td>
    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
    </tr>
        <tr>
            <td>Email</td>                
            <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi"></td>                         
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai"></td>  
        </tr>
        <tr>
            <td>chọn size</td>
            <td><
                  <div class="row">
                  <div class="col-sm-6">
                  <select name="option" class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" id="sizeSelect">
                  <option selected>Chọn size Giày</option>
                  </select> 
                  </div>
                </div>
                </td>     
        </tr>
    </table>
    <div class="row mb">
                <input type="submit" class="btn btn-primary" value="Đồng Ý Mua Hàng " name="submit">
                </div>
</form><script>
     var selectElement = document.getElementById("sizeSelect");
    var hiddenInputElement = document.getElementById("selectedSize");
    for (var i = 37; i <= 43; i=i+0.5) {
      var optionElement = document.createElement("option");
      optionElement.value = i;
      optionElement.text = i;
      selectElement.appendChild(optionElement);
    }
    selectElement.addEventListener("change", function() {
        var selectedValue = selectElement.value;
        hiddenInputElement.value = selectedValue;
    });
  </script>
   
    </div>
</body>

</html>



