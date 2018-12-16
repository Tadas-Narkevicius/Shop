<?php
include('../vendor/autoload.php');

use Src\Products\Products;

session_start();

$id = explode("=", $_SERVER['QUERY_STRING'])[1];

$product = new Products;

$product->load($id);

$sesion_id = $_SESSION['id'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view</title>
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
    .card{
        height: 200px;
        width: 50%;
        top: 50px;
        left: 450px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="conteiner"> <!-- main conteiner-->
        <div class="header"> <!-- header-->
            <a class="link" href="/PHP/shop/app.php">Catalog</a>
            <a class="link" href="/PHP/shop/view/all_products.php">Goods</a>
        </div>
        <div class="content" > <!-- content-->            
        <div class="card">
            <div class="card-header">
                <h4><?=$product->title;?> </h4>
            </div>
            <div class="card-body">
                <h5 class="card-title"> <?=$product->price;?> </h5>
                <h5 class="card-text"> <?=$product->description;?>  </h5>
                <a href="category_items.php?id=<?=$sesion_id;?>" class="btn btn-primary">Return to goods</a>
            </div>
        </div>
        </div>  <!-- content-->
    </div>   <!-- main conteiner-->
</body>
</html>
