<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/test.css">
    <title>Website - Ivy</title>
</head>
<body>
    <secsion class="top">
        <div class="container">
            <div class="row">
                <div class="top-logo">
                    <img  src="../image/logoBR.png" alt="" style="height: 150px;width: 200px; margin-top: -50px;">
                </div>
                <div class="top-menu-items">
                    <ul>
                        <li> <a href="index.html" > Trang chủ</a></li>
                        <li>Flast sale</li>
                        <li>Hot items</li>
                        <li>Bộ sưu tập</li>
                        <li>Tin tức</li>
                        <li>Thông tin</li>
                        <li>Contact</li>
                    </ul>
                </div>
                <div class="top-menu-icons">
                    <ul>
                        <li>
                            <input type="text" placeholder="tìm kiếm">
                            <i class="fas fa-search"></i>
                        </li>
                        <li>
                            <i class="fas fa-user-secret"></i>
                        </li>
                        <li>
                            <i class="fas fa-shopping-cart"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </secsion>
    <!-- -----------------------CARTEGPRY---------------------------------------------- -->
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&#8594;</span> <p>Nam</p><span>&#8594;</span><p></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                    <ul>
                      <li class="cartegory-left-li"><a href="cartegory.html">NỮ</a>
                        <ul>
                            <li><a href="">HÀNG NỮ MỚI VỀ</a></li>
                            <li><a href="">GIÀY CHẠY BỘ</a></li>
                            <li><a href="">GIÀY TENNIS</a> </li>
                            <li><a href="">GIÀY CAO GÓP</a></li>
                        </ul>                    
                      </li>
                      <li class="cartegory-left-li"><a href="cartegory.html">NAM</a>
                        <ul>
                          <li><a href="">HÀNG NAM MỚI VỀ</a></li>
                          <li><a href="">GIÀY CHẠY  BỘ</a></li>
                          <li><a href="">GIÀY TENNIS</a></li>
                          <li><a href=""> GIÀY CẦU LÔNG</a></li>
                        </ul>
                      </li>
                      <li class="cartegory-left-li"><a href="cartegory_vn.html">THƯƠNG HIỆU VIỆT</a>
                        <ul>
                        <li><a href="">BITIS HUNTER</a></li>
                        <li><a href="">ANANAS</a></li>
                      </ul>
                    </li>
                        <li class="cartegory-left-li"><a href="#">HOT ITEMS</a></li>
                        <li class="cartegory-left-li"><a href="#">HOT DEAL</a></li>
                    </ul>
                </div>
                <div class="cartegory-right">
                    <div class="cartegory-right-top row">
                        <div class="cartegory-right-top-item ">
                            <p>NIKE</p>
                        </div>
                        <div class="cartegory-right-top-item">
                            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                        </div>
                        <div class="cartegory-right-top-item">
                            <select name="" id="">
                                <option value="">Sắp xếp</option>
                                <option value="">Giá cao đến thấp</option>
                                <option value="">Giá thấp đến cao</option>
                            </select>
                        </div>
                    </div>
                      <div class="cartegory-right-content row">
                      <section class="cartegory">
        
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
      
        foreach ($products as $index => $product) {
            if ($product['quantity'] > 1) {
                echo '
                <section class="cartegory">
                    <div class="container">
                        <div class="row">
                            <div class="cartegory-right">
                                <div class="cartegory-right-content-item">
                                    <div class="image-container">
                                        <img src="'.$product['img'].'" alt="">
                                        <div class="hover-text">
                                            <a href="trangcon.php?id='.$product['id'].'">MUA HÀNG</a>
                                        </div>
                                    </div>
                                    <h1>'.$product['name'].'</h1>
                                    <p>'.$product['price'].'<sup>đ</sup></p>
                                    <input type="hidden" name="index[]" value="'.$index.'">
                                    <input type="hidden" name="id[]" value="'.$product['id'].'">
                                    <input type="submit" value="Đặt hàng">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';
            } else {
                echo 'Hết sản phẩm';
            }
        }

  
            // header("Refresh:0");
      
?>

        </section>

                          <div class="cartegory-right-content-item">
                              <div class="image-container">
                                <img id="img" src="../image/nike1.webp" alt="">
                                <div class="hover-text">
                                  <a href="#" >MUA HÀNG</a>
                                </div>
                              </div>
                              <h1>Nike Air Force One</h1>
                              <p>3.600.000<sup>đ</sup></p>
                            </div>
                        <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike2.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Nike Tech Hera</h1>
                            <p>2.900.000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike3.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Nike Air Max Pulse</h1>
                            <p>1.900.000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike4.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Air Jordan Low SE</h1>
                            <p>5.000.000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike5.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Air Jordan 1 Low FlyEase</h1>
                            <p>7.960..000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike8.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Air Jordan 1 Mid SE</h1>
                            <p>5.600.000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike6.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Promo Exclusion</h1>
                            <p>2.100.000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike7.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>Nike Air Max Plus Mercurical</h1>
                            <p>7.500.000<sup>đ</sup></p>
                          </div>
                          <div class="cartegory-right-content-item">
                            <div class="image-container">
                              <img src="../image/nike9.webp" alt="">
                              <div class="hover-text">
                                <a href="#" >MUA HÀNG</a>
                              </div>
                            </div>
                            <h1>NikeCourt Zoom Vapor</h1>
                            <p>.500.000<sup>đ</sup></p>
                          </div>
                    </div>
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-items">
                            <p>Hiện thị 2 <span>&#124;</span> 4 sản phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-items">
                            <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span> Trang cuối</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------------------Footer -->
    <section class="footer">
        <div class="footer-container">
            <p>Tải ứng dụng BreakRules</p>
            <div class="app-google">
                <a href=""><img src="../image/appstore.jpg" alt=""></a>
                <a href=""> <img src="../image/googleplay.jpg" alt=""></a>
            </div>
            <p>Nhận bản tin BreakRules</p>
            <div class="input-email">
                <input type="text" placeholder="Nhập email của bạn">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="footer-items">
                <li><a href=""><img src="../image/dathongbao.png" alt=""></a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="#img"><i class="fab fa-facebook-f"></i></a><a href=""><i class="fab fa-youtube"></i></a></li>
            </div>
          
            <div class="footer-bottom">
                ©BBreakRules All rights reserved
            </div>
        </div>
    </section>


<script src="../js/script.js"></script>
</body>
</html>   
