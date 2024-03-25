<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"
?>

<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $cartgory_name = $_POST['cartgory_name'];
    $insert_cartegory = $cartegory -> insert_cartegory($cartgory_name);
}
?>


<div class = "admin-content-right">
            <div class = "admin-content-right-add">
                <h1> Add More List</h1>
                <form action="" method="POST">
                    <input required name="cartgory_name" type="text" placeholder="Add your products name!">
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>

    </section>
</body>
</html>