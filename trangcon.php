<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BreakRules®.com</title>
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_trangcon.css">
</head>
<body>
    <header>
       
        <did class="boxtop">
            <div class="boxcenter">
<div class="boxtopleft">Hotline: 0914341460</div>

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
            line-height: 50px;
            margin-right: -10px;
            text-decoration: none;
            ">Tên: ' .$full_name. '</p>
            ';
            ?>
   
</div>
</div>
        </did>
        <div class="boxlogo">
        <img src="img/logoBR.png">
        </div>
        <hr>
        <div class="boxmenu">
            <div class="boxcenter">

                <ul>
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="index2.php">CỬA HÀNG </a>
                         <ul>
                           
                         </ul>
                    </li>
                    <li><a href="">Tài Khoản</a></li>
                    <li><a href="">Liên hệ</a></li>
                    </ul>
                    </div>
                    <p></p>    
</div>

        </div>
        <a href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping fa-bounce" alt="" style="float:left; margin-left: 90%;margin-top: -3%;font-size:30px; "></i></a>      
        
    </header>
<?php
  
  if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();
  // session_destroy();
  include 'sanpham.php';
  $products=connectDB();


  if(isset($_SESSION['cart'])) echo'<p style="color: red;  
  float: right;   
  line-height: 50px;
  margin-right: 100px;
  margin-top:-55px;
  font-size:25px;
  text-decoration: none;
  "> '.count($_SESSION['cart']). '</p>';

  if(isset($_GET['id'])) $id=$_GET['id'];

foreach($products as $index=>$product){
if($product["id"]==$id){
    echo '<div class="boxsp mr">
               <form action="" method="post">
                <img src="'.$product['img'].'" alt="" style="
                width: 500px;
                float: left;
                margin-left: 10%;
                margin-top: -5%;
                border: 3px solid;
                        border-image-source: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); 
                        border-image-slice :1;    
                ">
                <p style="
                margin-top: 10%;
                font-size: 25px;
                margin-left: 45%;
                ">'.$product['name'].'
                </p>
                 <p style="
                    font-size: 25px;
                   margin-left: 45%;
               ">Giá : <span> '.$product['price'].'VND</span> </p></p>
            <input type="hidden" name="index" value="'.$index.'">
                <input type="hidden" name="selectedSize" id="selectedSize" value="">
                  <input type="submit" name="dathang" value="Đặt hàng" style="float: left;   margin-top: 20%;    margin-left: 4%;">

              </div>  
                 </form>
              </div>';
   }
  }
  if(isset($_POST['dathang'])&&($_POST['dathang'])){
    $check=true;
   
    if(isset($_POST['id'])) 
    $id=$_POST['id'];
    $index=$_POST['index'];
    
    if(isset($_SESSION['cart'])&& count($_SESSION['cart'])>0){
        foreach($_SESSION['cart'] as $key=>$item){
            
            if($item['id']==$id){
                $_SESSION['quantity']+=1;
                $check=false;
            }
        }
    }
    if($check==true){
       array_push($_SESSION['cart'],$products[$index]);
       echo '<script>location.reload();</script>';
    }
    // header("Refresh:0");
}
?>
<article>

</div> 
   </div>

    <div class="chu2" style="margin-top: -24%; margin-left: 45%"> Hiệu:BreakRules®   |  Tình trạng:<u>Còn hàng </u> </div>
    <div class="chu2" style=" margin-left: 45%">
    Size:
    <script>
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

    <div class="chu5" style=" margin-left: 45%;margin-top:1.5% ; ">BreakRules® / Sneakers/ Made in Vietnam</div>
<div class="mota1" style=" margin-top: 18%;
">
     <div class="mota t">GIỚI THIỆU</div>
     <div class="chuj1">Ngay từ tên gọi “giày thể thao” đã bộc lộ rõ nó là gì rồi đúng không nào? Giày thể thao là những đôi giày được sử dụng trong các hoạt động thể dục thể thao, hay trong những hoạt động tập luyện tăng cường sức khoẻ. Tuy nhiên, ngày này giày thể thao còn được coi như một item không thể thiếu khi đi chơi, đi làm bởi tính tiện dụng mà vẫn thời trang của nó.</div>
     <div class="chuj1 t"> Chất Lượng</div>
 
    <div class="chuj1">XUẤT XỨ
    Việt Nam</div>
    <div class="chuj1">Viet Street Culture x Streetwear</div>
    
    <div class="anh2"><img src="img/sizegiay1.jpg" alt=""></div>
    </div>
    
    </article>


<footer>
<div class="row">
    <div class="boxcenter2">
<div class="boxfooter1 k">
 <h4>FOLLOW US</h4>
 <div class="facebook chu">
    <i class="ti-facebook"></i>
    <i class="ti-instagram"></i>
 </div>

</div>
<div class="boxfooter2 k">


    <h4>HƯỚNG DẪN</h4>
    <div class="huongdan h "><a href="#">Điều khoảng</a></div>
    <div class="huongdan h "><a href="#">Hướng dẫn mua hàng</a></div>
    <div class="huongdan h "><a href="#">Chính sách đổi trả hàng</a></div>
    <div class="huongdan h "><a href="#">Bảo mật thông tin KH</a></div>
    <div class="huongdan h "><a href="#">Chính sách thanh toán</a></div>
</div>
<div class="boxfooter3 k">

    <h4>CONTACT US</h4>
   <div class="diachi h"><i class="ti-location-pin" ></i>Store I: 445 Sư Vạn Hạnh, P.12, Q.10.</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Store II: 48 Trần Quang Diệu, P.14, Q.3, TP.HCM</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Store IV: G-Town 1, 350 Điện Biên Phủ, P.17, Q.Bình Thạnh, TP.HCM</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Store V: G-Town 2, 136 Nguyễn Hồng Đào, P.14, Q.Tân Bình, TP.HCM</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Store VI: TNP 26LTT - 26 Lý Tự Trọng, P.Bến Nghé, Q.1, TP.HCM</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Store VII: TNP - Sense Market, Đối diện số 90 Lê Lai, P.Bến Nghé, Q.1, TP.HCM.</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Biên Hoà: Vincom Biên Hoà - Shop House, PG2-06, 1096 Phạm Văn Thuận, Tân Mai, Biên Hoà</div>
   <div class="diachi h"><i class="ti-location-pin" ></i>Cần Thơ: Vincom Xuân Khánh - Shop House, PG2-08, Đường 30 tháng 4, Xuân Khánh, Cần Thơ.</div>
   <div class="diachi h"><i class="ti-mobile" ></i>0933782768</div>
</div>
</div>
</div>
</div>
</footer>

</body>
</html>
<script src="thuvien.js"></script>