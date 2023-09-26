<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BreakRules®.com</title>
    <title></title>
    <link rel="stylesheet" href="css/style11.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   
</head>

<body style="margin-top: -2%;">
    <header>
        <did class="boxtop">
            <div class="boxcenter">
                <div class="boxtopleft">Hotline: 0914.341.460</div>

                    <div class="boxtopright">
                    
                    <a href="registration.php">Dăng ký</a>
                    <a href="login.php">Đăng Nhập</a>
            <!--  -->
                </div>
            </div>
        </did>
        <div class="boxlogo">
        <img src="img/logoBR.png" alt="" height="150px" width="250px">
        </div>
        <div class="boxmenu">
            <div class="boxcente1">
                <ul id="boxmenu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">SNEAKERS</a>
                        <ul>
                            <li><a href="spnoibat.php">Sản phẩm nổi bật</a>
                            
                        </ul>
                    </li>
                    <li><a href="contact.php" id="sale1">CONTACT</a></li>
                    
                </ul>
            </ul>
            </div>
            <a href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping fa-bounce" alt="" style="float:left; margin-left: 100%;margin-top: -1.5%; "></i></a>
        </div>
        </div>

    </header>
      
   <article>
    <section>
        
        <?php
       session_start();
       //kiểm tra xem biến session[cart] có chứa gì chưa
       if(!isset($_SESSION['cart']))
        // nếu chưa thì tạo array mới
       $_SESSION['cart']=array();

       include 'sanpham.php';
       $products=connectDB();
        
        if(isset($_SESSION['cart'])) 

        echo'<p style="color: red;  
        float: right;   
        line-height: 40px;
        margin-right: 150px;
        text-decoration: none;
        "> '.count($_SESSION['cart']). '</p>';
        //Hiển thị sản phẩm nổi bật khi hot=1
        foreach($products as $index=>$product){
            if($product['quantity']>1){         
                echo '
              
                <form action="" method="post"  >
                <div class="sanpham"alt="" style="float:left; width:20%; margin-left:65px; border: 0px solid gray;  height: 420px;margin-top: 90px; border: 3px solid;
                border-image-source: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); 
                border-image-slice :1;">
            
                <div class="sp1" alt="" style="text-align: center;">
                <a href="login.php"><img src="'.$product['img'].'" alt="" style ="width: 300px;height:300px"></a>
                <p>'.$product['name'].'</p>
                <p>Giá : <span>'.$product['price'].'</span> </p>
                <input type="hidden" name="index" value="'.$index.'">
                <input type="hidden" name="id" value="'.$product['id'].'">
                <input type="submit" name="dathang"  id= "input1" value="Đặt hàng"  alt="" style ="">
                </div>
                </div>
                </form>';
                
    }
    }
        
      if(isset($_POST['dathang'])&&($_POST['dathang'])){
            $check=true;
            echo '<script>window.location.href = "login.php";</script>';
    
            // header("Refresh:0");
        }
        
?>

</section>
   </article>
    <footer>
        <div class="row">
            <div class="boxcenter2">
                <div class="boxfooter1 k">
                    <h4>FOLLOW US</h4>
                    <div class="facebook ">
                    <a href="https://www.facebook.com/NHQ2004/"><i class="fa-brands fa-facebook "alt="" style="font-size: 40px; "></i></a>
                    <a href="https://www.instagram.com/wuynh._.wang/"><i class="fa-brands fa-instagram "alt="" style="font-size: 40px; color: pink; "></i></a>
                    </div>

                </div>
                <div class="boxfooter2 k">
                    <h4>HƯỚNG DẪN</h4>
                    <div class="huongdan h "><a href="">Điều khoảng</a></div>
                    <div class="huongdan h "><a href="#">Hướng dẫn mua hàng</a></div>
                    <div class="huongdan h "><a href="#">Chính sách đổi trả hàng</a></div>
                    <div class="huongdan h "><a href="#">Bảo mật thông tin KH</a></div>
                    <div class="huongdan h "><a href="#">Chính sách thanh toán</a></div>
                </div>
                <div class="boxfooter3 k">

                    <h4>CONTACT US</h4>
                    <div class="diachi h"><i class="ti-location-pin"></i>Store I: 445 Sư Vạn Hạnh, P.12, Q.10.</div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Store II: 48 Trần Quang Diệu, P.14, Q.3, TP.HCM
                    </div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Store IV: G-Town 1, 350 Điện Biên Phủ, P.17,
                        Q.Bình Thạnh, TP.HCM</div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Store V: G-Town 2, 136 Nguyễn Hồng Đào, P.14,
                        Q.Tân Bình, TP.HCM</div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Store VI: TNP 26LTT - 26 Lý Tự Trọng, P.Bến
                        Nghé, Q.1, TP.HCM</div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Store VII: TNP - Sense Market, Đối diện số 90
                        Lê Lai, P.Bến Nghé, Q.1, TP.HCM.</div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Biên Hoà: Vincom Biên Hoà - Shop House, PG2-06,
                        1096 Phạm Văn Thuận, Tân Mai, Biên Hoà</div>
                    <div class="diachi h"><i class="ti-location-pin"></i>Cần Thơ: Vincom Xuân Khánh - Shop House,
                        PG2-08, Đường 30 tháng 4, Xuân Khánh, Cần Thơ.</div>
                    <div class="diachi h"><i class="ti-mobile"></i>0933782768</div>
                </div>
            </div>
           
        </div>
        <div class="k" style="text-align: center">
            <hr color="white" />
            Break Rules® All Rights Reserved.
            <br>
            .
            </div>
    </footer>
    


<!--
?php                 
            $servername = "localhost:3307";
            $username = "root";
            $password = "";
            $dbname = "login_register";      
            $conn = new mysqli($servername, $username, $password, $dbname);    
            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }     
            // Bước 2: Thực hiện truy vấn SQL để lấy dữ liệu từ cơ sở dữ liệu
            $sql = "SELECT * FROM `users` WHERE id = 0";
            $result = $conn->query($sql);     
            // Bước 3: Sử dụng PHP để hiển thị dữ liệu trên trang web
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $color = "red";      
                echo 
                '
                <span style="color: ' . $color . ';">Tên: ' . $row["full_name"] . '</span> ';
              
            } else {
                echo "Không có dữ liệu.";
            }
            // Đóng kết nối
            $conn->close();     
            ?
            -->
</body>

</html>
<!-- <script>
    function searchToggle(obj, evt){
    var container = $(obj).closest('.search-wrapper');
        if(!container.hasClass('active')){
            container.addClass('active');
            evt.preventDefault();
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
            container.removeClass('active');
            // clear input
            container.find('.search-input').val('');
        }
}
</script> -->
<!-- Hàm searchToggle được gọi khi người dùng nhấp vào biểu tượng tìm kiếm. Nó nhận hai tham số: obj (đối tượng được nhấp vào) và evt (sự kiện được truyền vào).

Dòng var container = $(obj).closest('.search-wrapper'); tìm phần tử gần nhất có lớp CSS là .search-wrapper, là phần tử chứa hộp tìm kiếm.

Dòng if (!container.hasClass('active')) { ... } kiểm tra xem phần tử .search-wrapper có không có lớp CSS là active hay không. Nếu không có, tức là hộp tìm kiếm chưa được mở, chúng ta thêm lớp CSS active vào phần tử .search-wrapper và ngăn chặn hành vi mặc định của sự kiện bằng evt.preventDefault(). Điều này ngăn người dùng chuyển hướng đến liên kết hoặc thực hiện hành động khác khi nhấp vào biểu tượng tìm kiếm.

Dòng else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) { ... } kiểm tra xem phần tử .search-wrapper có lớp CSS là active và người dùng đã nhấp vào bên ngoài phần tử .input-holder (nơi nhập liệu của hộp tìm kiếm) hay không. Nếu có, tức là người dùng muốn đóng hộp tìm kiếm. Chúng ta loại bỏ lớp CSS active khỏi phần tử .search-wrapper và làm sạch nội dung đầu vào bằng cách đặt giá trị rỗng cho phần tử .search-input.
-->
