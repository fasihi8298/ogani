<?php

require_once "./includes/db-con.php";
require_once "./helpers.php";
require_once "./includes/css-links.php";
require_once "./includes/javascript-links.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){


        // upload image
        $data = uploadImage("products", $_FILES['image']);

        if ($data['errors'] === false) {
            // save info into db
            $name = $data['result'];
            $query = "INSERT INTO `products`(`name`, `unit_price`, `category_id`, `quantity`, `image`, `description`) 
            VALUES ('$_POST[name]','$_POST[unit_price]' ,'$_POST[category]','$_POST[quantity]','$name','$_POST[description]') ";
    
            if (mysqli_query($db_con, $query)) {
                header("Location:products.php");
            }
            else{
                echo "<div class='alert alert-danger mt-2 uploadingErr'>Query Failed</div>";
            }
        }
        else{
            
          echo  "<div class='alert alert-danger mt-2 uploadingErr'> $data[result]</div>";

        }

    exit;
}8702

?>