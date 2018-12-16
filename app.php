<?php
require __DIR__ . '/vendor/autoload.php';

use Src\Category\Category;

$category = new Category;
  
$categories = $category->get_categories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalogas</title>
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
        .link{ text-align: center;  padding: 35px 10px; font-size: 25px;}
        .content{ width: 100%; margin: 0 auto; text-align:center; padding: 30px;}
        .grid-container { text-align:center; }
        .item {
            display:inline-block;
            width: 250px;
            height: 100px;
            border: 2px solid red;
            border-radius: 25px;
            background-color: #c0d1de;
            padding: 35px 10px;
            margin: 40px 20px;
            font-size: 25px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="conteiner"> <!-- Pagrindine conteneris-->
    <div class="header"> <!-- headeris-->
        <a class="link" href="app.php">Catalog</a>
        <a class="link" href="view/all_products.php">Goods</a>
    </div>     
        <div class="content"> <!-- content-->
            <h3>Catalog</h3>
            <div class="grid-container">
                <?php foreach ($categories as $row) :?>
                <a href="view/category_items.php?id=<?=$row['id'];?>" class="item" ><?=$row['title'];?></a>
                <?php endforeach;?> 
            </div>
        </div> <!-- content-->
    <div class="footer"> <!-- footer-->
    </div>
</div> <!-- Pagrindine conteneris-->
</body>
</html>



