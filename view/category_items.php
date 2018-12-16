<?php
require '../vendor/autoload.php';

use Src\Products\Products;

$products = new Products;

session_start();

$cat_id = explode("=", $_SERVER['QUERY_STRING'])[1];

$products_for_category = $products->get_products_by_category($cat_id);

$_SESSION['id'] = $cat_id; 

$sesion_id = $_SESSION['id']; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>clothes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
    body{ background-color: #DBC8C8; font: 14px sans-serif; }
    .header{
        border: 2px solid red; 
        border-radius: 5px; 
        background-color: lightgreen; 
        height: 70px; 
        text-align: center; 
        padding: 20px;
    }
    .link{ text-align: center; padding: 35px 10px; font-size: 25px;}
    .content{
        display: grid;
        grid-template-columns: auto auto auto;
        grid-gap: 40px 20px;
        padding: 30px 430px;
    }
    .card{
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid black;
        text-align: center;
        font-size: 20px;
        padding: 10px;
        color: black;
    }
    .title{ 
        text-align: center;
        font-size: 30px;
        padding: 10px 10px;
    }
    </style>
</head>
<body>
<div class="conteiner"> <!-- main conteiner-->
    <div class="header"> <!-- header-->
        <a class="link" href="/PHP/shop/app.php">Catalog</a>
        <a class="link" href="/PHP/shop/view/all_products.php">Goods</a>
    </div>
    <div class="title">Prekės</div>
    <div class="content" > <!-- content-->

        <?php foreach ($products_for_category as $row) :?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$row['title'];?></h5>
                <p class="card-text"><?=$row['price'];?></p>
                <a href="view_cat_items.php?id=<?=$row['id'];?>" class="btn btn-primary">More...</a>
            </div>
        </div>       
        <?php endforeach;?> 
    </div>   <!-- content-->
</div>   <!-- main conteiner-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>   
</body>
</html>



