<?php
    function taogiohang($tensp,  $hinhsp,$size, $soluong, $dongia, $thanhtien, $idbill){
        $conn = ketnoidb();
            $sql = "INSERT INTO tb_cart (tensp,  hinhsp, size, soluong, dongia, thanhtien, idbill)
            VALUES ('$tensp', '$hinhsp', '$size', '$soluong', '$dongia','$thanhtien','$idbill')";
            $conn->exec($sql);
        $conn = null;
    }
    function ketnoidb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_sneaker";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            return  $e->getMessage();
        }
    }
    function taodonhang($name,  $tel, $email, $address, $total, $pttt){
        $conn = ketnoidb();
            $sql = "INSERT INTO tb_bill (name, tel, email, address, total, pttt)
            VALUES ('$name', '$tel', '$email', '$address', '$total','$pttt')";
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
        $conn = null;
        return $last_id;
    }
    function tongdonhang(){
        $tong = 0;
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            for($i=0;$i< sizeof($_SESSION['giohang']); $i++){
                $tong += $_SESSION['giohang'][$i][4] * $_SESSION['giohang'][$i][5];
            }
        }
        return $tong;
    }
    function showdelivery(){
        $ttgh = "";
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            $sum = 0;
            for($i=0;$i < sizeof($_SESSION['giohang']); $i++){
                $tt = $_SESSION['giohang'][$i][4] * $_SESSION['giohang'][$i][5];
                $sum+= $tt;
                
                $ttgh.= '
                <tr>
                        <td>'.$_SESSION['giohang'][$i][1].'</td>
                        <td>'.$_SESSION['giohang'][$i][3].'</td>
                        <td>'.$_SESSION['giohang'][$i][4].'</td>
                        <td>'.$tt.'<sup>$</sup></td>
                </tr>
                ';
            }
            $vat = 10/100 * $sum;
            $tc = $vat + $sum;
            $ttgh.=
            '
            <tr>
            <td style="font-weight:bold;" colspan="3">Tổng</td>
            <td style="font-weight:bold;">'.$sum.'<sup>$</sup></td>
            </tr>
            <tr>
                <td style="font-weight:bold;" colspan="3">Thuế VAT (10%)</td>
                <td style="font-weight:bold;">'.$vat.'<sup>$</sup></td>
            </tr>
            <tr>
                <td style="font-weight:bold;" colspan="3">Tổng Tiền Hàng</td>
                <td style="font-weight:bold;">'.$tc.'<sup>$</sup></td>
            </tr>
            ';
        }
        else{
            echo'
                <tr>
                <td style="font-weight:bold;" colspan="3">Tổng</td>
                <td style="font-weight:bold;">0<sup>$</sup></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;" colspan="3">Thuế VAT (10%)</td>
                    <td style="font-weight:bold;">0<sup>$</sup></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;" colspan="3">Tổng Tiền Hàng</td>
                    <td style="font-weight:bold;">0<sup>$</sup></td>
                </tr>
            ';
        }
        return $ttgh;
    }
    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            for($i=0;$i < sizeof($_SESSION['giohang']); $i++){
                $tt = $_SESSION['giohang'][$i][4] * $_SESSION['giohang'][$i][5];
                echo '
                <tr>
                    <td><img src="'.$_SESSION['giohang'][$i][0].'"</td>
                    <td>'.$_SESSION['giohang'][$i][1].'</td>
                    <td><img src="'.$_SESSION['giohang'][$i][2].'"</td>
                    <td>'.$_SESSION['giohang'][$i][3].'</td>
                    <td>'.$_SESSION['giohang'][$i][4].'</td>
                    <td>'.$_SESSION['giohang'][$i][5].'<sup>$</sup></td>
                    <td>'.$tt.'<sup>$</sup></td>
                    <td><a href="cart.php?delid='.$i.'">x</a></td>
                </tr>';
            }
        }
    }
    function showtongtien(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            $tong = 0;
            $tong_sp = 0;
            for($i=0;$i< sizeof($_SESSION['giohang']); $i++){
                $tong += $_SESSION['giohang'][$i][4] * $_SESSION['giohang'][$i][5];
                $tong_sp += $_SESSION['giohang'][$i][4];
            }
            echo '
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td>'.$tong_sp.'</td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td>'.$tong.'<sup>$</sup></td>
                    </tr>
                    <tr>
                        <td>TẠM TÍNH</td>
                        <td><p style="color:black";font-weight:bold;>'.$tong.'<sup>$</sup></p></td>
                    </tr>
                </table>
            ';
        }
        else{
            echo '
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td>0<sup>$</sup></td>
                    </tr>
                    <tr>
                        <td>TẠM TÍNH</td>
                        <td><p style="color:black";font-weight:bold;>0<sup>$</sup></p></td>
                    </tr>
                </table>
            ';
        }
    }
    

?>