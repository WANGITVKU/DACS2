<?php
         
          if ($_SERVER["REQUEST_METHOD"] == "POST") {

              if (isset($_POST["form2_submit"])) {           
                $dmsp = $_POST['dmsp'];    
                $id_dm = $_POST['id_dm'];
                $id_brand = $_POST['id_brand'];
                if ($_FILES['SecondImageUpload']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../img/'; // Specify the directory where you want to save the uploaded files
                    $uploadFile = $uploadDir . basename($_FILES['SecondImageUpload']['name']);       
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($_FILES['SecondImageUpload']['tmp_name'], $uploadFile)) {
                            $con = mysqli_connect("localhost:3307", "root", "", "banhang");
                            if ($dmsp !== '' && $id_dm !==''  && $id_brand  !=='' ) {
                            $sql = "INSERT INTO dm_sp(tendmsp, img, id_brand, id_dm) 
                                    VALUES ('$dmsp','$uploadFile', '$id_brand', '$id_dm')";
                            $kq = mysqli_query($con, $sql);
                            if ($kq) {
                                echo "
                        <div class='alert alert-success'> thêm sản phẩm thành công </div> ";
                        echo "<script>
                        setTimeout(function() {
                            window.location.href = 'form-add-san-pham.php';
                        }, 2000);
                        </script>";
                            } 
                
      else {
                      echo "Thêm sản phẩm thất bại!";  echo "<script>
                      
                      </script>";
                  }
              } 
                  
      
                
      else {
                  echo "File upload failed.";  echo "<script>
                 
                  </script>";
                  
              }
          } else {
              echo "<div class='alert alert-danger'>Vui lòng chọn một tập tin hợp lệ.";  echo "<script>
              
              </script>";
          }
      
  }    
      // Xử lý dữ liệu từ form thêm sản phẩm
  
}}
      // Xử lý dữ liệu từ form thêm sản phẩm
