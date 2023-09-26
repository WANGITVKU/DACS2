<?php
                        session_start();
                        ?>
                        <table>
                        <tr>
                        <th>Tên</th>
                        <th>hình ảnh </th>
                        <th>giá</th>
                        <th>số lượng</th>
                        <th>tiền</th>
                        <th>xóa</th>
                        </tr>
                        <?php foreach($_SESSION['cart'] as $item){ ?>
                        <tr>
                        <td><?php echo $item ['name']?></td>
                        <td><img src ='<?php echo $item ['img']?>' width = '100px'></td>
                        <td><?php echo $item ['price']?></td>
                        <td>1</td>
                        <td><?php echo $item ['price']?></td>
                               <td>
                                <a href="cart.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>
                        
                        <?php }?>
                        <tr>
                        <td colspan="4">Tổng tiền</td>
                        <td colspan="2">
                        <?php
                        
                        $tongtien=0;
                        foreach($_SESSION['cart']as $item){
                            $tongtien+=$item['price'];
                        }
                        echo $tongtien;
                        if(!isset($_SESSION['cart']))
                         $_SESSION['cart']=[];
                        //làm rỗng giỏ hàng
                        if(isset($_GET['cart'])&&($_GET['cart']==1)) unset($_SESSION['cart']);
                        //xóa sp trong giỏ hàng
                        if(isset($_GET['delid'])&&($_GET['delid']>=0)){
                           array_splice($_SESSION['cart'],$_GET['delid'],1);
                        }
                        ?>