<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nowsaigon.com</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="re.css">
</head>

<body>
    <header>

        <did class="boxtop">
            <div class="boxcenter">
                <div class="boxtopleft">Hotline: 0933.782.768</div>

                <div class="boxtopright">
                    <a href="lienhe.html">Liên Hệ</a>
                    <a href="form_dangnhap/form.html">Đăng Nhập</a>
                    <a href="dangky.html">Đăng ký</a>


                </div>
            </div>
        </did>
        <div class="boxlogo">
            <img src="img/logo (1).webp">
        </div>
        <div class="boxmenu">
            <div class="boxcenter">
                <ul id="boxmenu">
                <ul>
                    <li><a href="banhang.php">HOME</a></li>
                    <li><a href="">CLOTHING</a>
                        <ul>
                            <li><a href="">ALL ITEMS</a>
                            <li><a href="">TEE</a>
                            <li><a href="">BOTTOM</a>
                            <li><a href="">JACKET</a>
                            <li><a href="">HOODIE</a>
                            <li><a href="">SWEATER</a>
                            <li><a href="">CAP</a>
                            <li><a href="">SHIRTS</a>
                            <li><a href="">ACCESSORIES</a>
                            <li><a href="">WASH / TIE DYE</a>
                            <li><a href="">SALE</a>
                        </ul>
                    </li>
                    <li><a href="">CONTACT</a></li>
                    <li><a href=""  id="sale">CAMBO DEAL </a></li>
                    <li><a href="" id="sale1">CLEARANCE SALE </a></li>
                </ul>
            </ul>
            </div>
        <article>
        <section>
            <?php
            session_start();
            if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();
            // session_destroy();
             $products = array();
            if(isset($_SESSION['cart'])) echo count($_SESSION['cart']);
         echo('<h1>Sản phẩm nổi bật</h1>');
            foreach($products as $index=>$product){
                if($product['hot']==1){
                    echo '
                    <form action="" method="post">
                    <div class="sanpham"alt="" style="float:left; width:20%; margin-left:40px; border: 0px solid gray;  height: 380px;margin-top: 60px;">
                    <div class="khung"><div class="h1">11%</div></div>
                    <div class="sp1" alt="" style="text-align: center;">
                    <img src="'.$product['img'].'" alt="" style="width:100%;
                    " >
                        <p>'.$product['name'].'</p>
                        <p>Giá : <span>'.$product['price'].'</span> </p>
                        <input type="hidden" name="index" value="'.$index.'">
                        <input type="submit" name="dathang"  id= "input1" value="Đặt hàng"  alt="" style ="">
                        </div>
                        </div>
                        </form>
                   ';
            }
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
                        <i class="ti-facebook"></i>
                        <i class="ti-instagram"></i>
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
        <div class="row textcenter k">
            Needs Of Wisdom® All Rights Reserved.
        </div>
    </footer>




</legend>
</body>

</html>
