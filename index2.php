<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BreakRules®.com</title>
    <title></title>
    <link rel="stylesheet" href="css/style11.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body style="margin-top: -2%;">
    <header>
        <did class="boxtop">
            <div class="boxcenter">
                <div class="boxtopleft">Hotline: 0933.782.768</div>

                    <div class="boxtopright">
                    <a href="logout.php" class="">Logout</a>
                    
                    <?php
                    session_start();

// Truy cập và sử dụng giá trị $_SESSION["fullname"]
                    $full_name = $_SESSION["full_name"];
                   $color = "red"; 

// Hiển thị tên đầy đủ

                    echo 
                    '
                    <p style="color: ' . $color . ';  
                    float: right;

                    line-height: 90px;
                    margin-right: -10px;
                    text-decoration: none;
                    ">Tên: ' .$full_name. '</p>  ';
                    ?>
                        </div>
                    </div>
                </did>
                <div class="boxlogo">
                <img src="img/logoBR.png" alt="" height="150px" width="250px">
                </div>
                <!-- Danh sách sản phẩm -->
                <section class="jumbotron text-center">
                <div class="container mb-5 ">
                        <h1 class="jumbotron-heading">Danh sách Sản phẩm</h1>
                        <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và bảo hành chính hãng.</p>
                    </div>
                    </div>
                </section>
                <div class="boxmenu">
                    <div class="boxcente1">
                        <ul id="boxmenu">
                        <ul>
                            <li><a href="http://localhost:3000/index.html">HOME</a></li>
                            <li><a href="">SNEAKERS</a>
                        
                            </li>
                            <li><a href="contact.php" id="sale1" >CONTACT</a></li>
                        </ul>
                    </ul>
                    </div>
                    <a href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping fa-bounce" alt="" style="float:left; margin-left: 100%;margin-top: -3%; "></i></a>
                </div>
                </div>
                <br>
            
            </header>
            <div>
            </div>

        <article>
            <section>
        
        <?php
        //Kiểm tra nếu biến phiên $_SESSION['cart'] chưa được khởi tạo, thì khởi tạo nó là một mảng rỗng.
        if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();
        //Bao gồm file "sanpham.php", chứa các hàm kết nối và truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm.
        include 'sanpham.php';
        $products=connectDB();
        //Kiểm tra nếu biến phiên $_SESSION['cart'] đã được khởi tạo, thì hiển thị số lượng sản phẩm trong giỏ hàng bằng cách đếm số phần tử trong mảng $_SESSION['cart'] và in ra màn hình.
        if(isset($_SESSION['cart'])) echo'<p style="color: red;  
        float: right;   
        font-size:25px;
        margin-right: 140px;
        margin-top:-43px;
        text-decoration: none;
        "> '.count($_SESSION['cart']). '</p>';
        //Hiển thị sản phẩm nổi bật khi quantily >1
        foreach($products as $index=>$product){
            if($product['quantity']>1){
        // Lấy các dữ liệu đc lưu trong  biến $product được lấy từ dữ database in ra màng hình và chỉnh nó theo khung
                echo '
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap">
                <form action="" method="post"  >
                <div class="sanpham"alt="" style="
                display:flex;float:left; width:20%; margin-left:65px; border: 0px solid gray;  height: 420px;margin-top: 65px; border: 3px solid;
                        border-image-source: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); 
                        border-image-slice :1;
                        
                        ">
            
                <div class="sp1" alt="" style="text-align: center; ">
                <a href="trangcon.php?id='.$product['id'].'"><img src="'.$product['img'].'" alt="" style ="width: 300px;height:300px"></a>
                    <p>'.$product['name'].'</p>
                    <p style ="   font-family: Roboto, sans-serif;
                    font-size: 18px;
                    font-weight: bold;
                    color: red;">Giá : <span>'.$product['price'].'</span> Đ </p>
                    <input type="hidden" name="index" value="'.$index.'">
                    <input  type="hidden" name="id" value="'.$product['id'].'" >
                    <input type="submit" name="dathang" value="thêm vào giỏ hàng"  alt="" style ="">
                    </div>
                    </div>
                    </form>';
                    if (isset($_POST['dathang']) && $_POST['dathang']) {
                        $check = true;
                        $productId = $_POST['id'];
                        echo '<script>window.location.href = "trangcon.php?id=' . $productId . '";</script>';
                        // hoặc có thể sử dụng header() để chuyển hướng
                        // header("Location: trangcon.php?id=" . $productId);
                        exit(); // Kết thúc kịch bản PHP sau khi chuyển hướng
                    }
                      
        }
        else{
            echo'Hết sản phẩm';
        }

    }
        
  
            // header("Refresh:0");
      
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
                    <div class="huongdan h "><a href="dieukhoan.html">Điều khoảng</a></div>
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
    

<div class="container">
      
</div>
<hr class="featurette-divider">
            <!-- /END THE FEATURETTES -->
        </div>

        

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
