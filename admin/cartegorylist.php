<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"
?>

<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory -> show_cartegory();

?>

<div class = "admin-content-right">
<div class = "admin-content-right_list">
                <h1> Sneakers List</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>LIST</th>
                        <th>OPTION</th>
                    </tr>
                    <?php 
                        if($show_cartegory){$i=0;
                            while($result = $show_cartegory->fetch_assoc()) {$i++;
                       
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['cartegory_id'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><a href="cartegoryedit.php?cartegory.id=<?php echo $result['cartegory_id']?>">Change</a>|<a href="cartegorydelete.php?cartegory.id=<?php echo $result['cartegory_id']?>">Delete</a></td>
                    </tr>
                    <?php 
                         }
                        }
                    ?>
                </table>
            </div>
        </div>

    </section>
</body>
</html>