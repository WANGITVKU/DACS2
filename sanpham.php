<?php
    function connectDB(){
        //Kết nối database
        $servername = "localhost:3307";
        $username = "root";
        $password = "";   
        try {
        //tạo đối tượng PDO
        $conn = new PDO("mysql:host=$servername;dbname=banhang", $username, $password);
        // Thiết lập chế độ báo lỗi cho đối tượng PDO.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        //prepare(...): Chuẩn bị một câu truy vấn SQL để thực thi. Trong trường hợp này, câu truy vấn SELECT được sử dụng để lấy dữ liệu từ bảng giaydep.
        $stmt = $conn->prepare("SELECT id, name, img, price, quantity, sale FROM giaydep");
        $stmt->execute();  
        //Thiết lập chế độ lấy dữ liệu theo kiểu mảng kết hợp (associative array).
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $products=$stmt->fetchAll();
        return $products;
        } catch(PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
            }
        }
?>