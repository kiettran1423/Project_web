<?php
    session_start();
    include './library/lib.php';
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $hinh = $_POST['hinh'];
        $tensp = $_POST['tensp'];
        $mau = $_POST['mau'];
        $size = $_POST['size'];
        $soluong= $_POST['soluong'];
        $gia = $_POST['gia'];
        
        //kiem tra sp co trong gio hang hay khong?
        $flag  = 0;
        for  ($i = 0; $i< sizeof($_SESSION['giohang']); $i++){
            
            if ($_SESSION['giohang'][$i][1]==$tensp  && ($_SESSION['giohang'][$i][3]==$size)){
                $flag = 1;
                $soluongnew = $soluong + $_SESSION['giohang'][$i][4];
                $_SESSION['giohang'][$i][4] = $soluongnew;
                break;
            }
        }
        if($flag==0){
            //them sp vao gio hang
            $sp = [$hinh, $tensp,$mau, $size, $soluong, $gia];
            $_SESSION['giohang'][] = $sp;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonynous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./image/logo_store.png" type="image/icon type">
    <title>Sneaker Store | Delivery</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/logo-sneaker-removebg.png" width="100%">
        </div>
        <div class="menu">
            <li><a href="index.php">HOME PAGE</a></li>
            <li><a href="">PRODUCT</a>
                <ul class="sub-menu">
                    <li><a href="nike_product.html">NIKE</a></li>
                    <li><a href="adidas_product.html">ADIDAS</a></li>
                    <li><a href="vans_product.html">VANS</a></li>
                </ul>
            </li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
        </div>
        <div class="others">
            <li><input placeholder="Tìm kiếm" type="text">
                <i class="fa-light fa-magnifying-glass"></i></li>
           <li> <a class="fas fa-user" href="user.php" ></a></li>
           <li> <a class="fas fa-shopping-cart" href="cart.php"></a></li>
           <li> <a class="fa fa-sign-out" href="logout.php"></a></li>
        </div>
    </header>
<!----------------------------Delivery---------------- -->   
<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                    <i class="fas fa-shopping-cart "></i>                           
                </div>
                <div class="delivery-top-adress delivery-top-item">
                    <i class="fas fa-map-marker-alt "></i>                           
                </div>
                <div class="delivery-top-payment delivery-top-item">
                    <i class="fas fa-money-check-alt"></i>                           
                </div>
            </div>   
        </div>
    </div>
    <div class="container">
    <form action="payment.php" method="post">
    <div class="delivery-content row">
            <div class="delivery-content-left">
                <p>Vui lòng chọn địa chỉ giao hàng</p>            
                <div class="delivery-content-left-input-top row">
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Họ tên <span style="color:red">*</span></label>
                        <input type="text" name="hoten" require>
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Điện thoại <span style="color:red">*</span></label>
                        <input type="text" name="dienthoai" require>
                    </div>

                </div>
                <div class="delivery-content-left-input-bottom">
                        <label for="">Email <span style="color:red">*</span></label>
                        <input type="email" name="email" require>
                </div>
                <div class="delivery-content-left-input-bottom">
                    <label for="">Địa chỉ<span style="color:red">*</span></label>
                    <input type="text" name="diachi" require>
                </div>
                <div class="delivery-content-left-button row">
                    <a href="cart.php" class="row"><span>&#171;</span><p>Quay lại giỏ hàng</p></a>
                    <input type="submit" name="thanhtoan" value="Thanh Toán"></input>
                </div> 
            </div>
        
            <div class="delivery-content-right">
                <table>
                    <tr>
                        <th>Tên sản phầm</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                    <tr>
                        <?php echo showdelivery() ;?>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    </div>
    
</section>
<!------------------------- footer----------------------------------------->
 <footer>
    <div class="footer-container">
        <div class="sec aboutus">
            <h2>About us</h2>
            <p>We're from VanLang University majoring in IT</p>
            <ul class="sci">
                <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="sec quicklinks">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="">About</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Privacy Policu</a></li>
                <li><a href="">Help</a></li>
                <li><a href="">Terms & Conditions</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="sec quicklinks">
            <h2>Shop</h2>
            <ul>
                <li><a href="nike_product.html">Nike</a></li>
                <li><a href="adidas_product.html">Adidas</a></li>
                <li><a href="vans_product.html">Vans</a></li>
            </ul>
        </div>
        <div class="sec contact">
            <h2>Contact Us</h2>
            <ul class="info">
                <li>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <span>Address: Alley 69/68 E. Dang Thuy Tram, Ward 13, Binh Thanh, Ho Chi Minh City</span>
                </li>
                <li>
                    <span><i class="fa fa-phone"></i></span>
                    <p><a href="tel:+84 12 345 6789">Phone: +84 12 345 6789</a></p>
                </li>
                <li>
                    <span><i class="fa fa-envelope"></i></span>
                    <p><a href="emailto:@vanlanguni.edu.vn">@vanlanguni.edu.vn</a></p>
                </li>
            </ul>
        </div>
    </div>
</footer>
    <script src="./js/script.js"></script>
    <script>
        const header = document.querySelector("header")
    window.addEventListener("scroll",function(){
        x = window.pageYOffset
        if(x>0){
            header.classList.add("sticky")
        }
        else {
            header.classList.remove("sticky")
        }
    })
    </script>
</body>


</html>
