<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<?php
    $brand = new brand; 
    $brand_id = $_GET['brand_id'];
    $get_brand = $brand -> get_brand($brand_id);
    if($get_brand)  {
        $resultA = $get_brand -> fetch_assoc();
    }

if($_SERVER['REQUEST_METHOD']==='POST'){
    $cartegory_id = $_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand -> update_brand($cartegory_id,$brand_name,$brand_id);
}
?>
<style>
    select  {
        height:30px;
        width: 150px;
        margin-top: 20px;
    }
</style>

<div class = "admin-content-right">
            <div class = "admin-content-right-add">
                <h1> Add type of products</h1>
                <form action="" method="POST">
                    <select name="cartegory_id" id="">
                        <option value="#">---Choose Type list</option>
                        <?php 
                            $show_cartegory = $brand ->show_cartegory();
                            if ($show_cartegory){while($result = $show_cartegory -> fetch_assoc()) {

                        ?>
                        <option <?php if($resultA['cartegory_id']==$result['cartegory_id']) {echo "SELECTED";} ?> value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php 
                            }
                        }
                        ?>

                    </select>  <br>
                    <input required name="brand_name" type="text" placeholder="Add type of products" 
                    value = "<?php echo $resultA['brand_name'] ?>">
                    <button type="submit">Change</button>
                </form>
            </div>
        </div>

    </section>
</body>
</html>