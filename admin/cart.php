<?php
    session_start();
    include './library/lib.php';
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
    if(isset($_GET['delcart']) && ($_GET['delcart'] == 1)) unset($_SESSION['giohang']);
    
    //xóa sp trong giỏ hàng:
    if(isset($_GET['delid'])&& ($_GET['delid'] >= 0)){
        array_splice($_SESSION['giohang'], $_GET['delid'],1);
    }


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
    <title>Sneaker Store | Cart</title>
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
    <!-- --------------cart---------------- -->   
    <section class="cart">
        <div class="container">
            <div class="cart-top-wrap">
                <div div class="cart-top">
                    <div class="cart-top-cart cart-top-item">
                        <i class="fas fa-shopping-cart "></i>                           
                    </div>
                    <div class="cart-top-adress cart-top-item">
                        <i class="fas fa-map-marker-alt "></i>                           
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="fas fa-money-check-alt"></i>                           
                    </div>
                </div>   
            </div>
            <div class="container">
            <form action="delivery.php" method="post">
                <div class="cart-content row">
                
                    <div class="cart-content-left">
                        <table>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Màu</th>
                                <th>Size</th>
                                <th>Sl</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th><a href="cart.php?delcart=1">Xóa giỏ hàng</a></th>
                            </tr>
                            <?php echo showgiohang()?>
                        </table>
                    </div>
                    <div class="cart-content-right">
                            <?php showtongtien() ?>
                            <div class="cart-content-right-text">
                                <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 500$</p>
                                <p style="color:red; font-weight:bold;">Mua thêm<span style="font-size:18px">300$</span>Để được miễn phí ship</p>
                            </div>
                            <div class="cart-content-right-button">
                                <button> <a href="index.php">TIẾP TỤC MUA SẮM</a></button>
                                <input type="submit" value="THANH TOÁN"></input>
                            </div>
                    </div>
                    
                </div>
            </form>
            </div>

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
                <li><a href="">Privacy Policy</a></li>
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
