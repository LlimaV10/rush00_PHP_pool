<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="style_sign.css">
    <style>
     * {box-sizing: border-box;}
.product-item {
  width: 600px;
  background: url(img/42.jpg) no-repeat; 
  background-color: white;
  text-align: center;
  margin: 0 auto;
  border-bottom: 2px solid #F5F5F5;
  font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial", sans-serif;
  transition: .3s ease-in;
}
.product-item:hover {border-bottom: 2px solid #fc5a5a;}
.product-item img {
  display: block;
  width: 100%;
}
#ee{
    height: 50px;
}
.product-item table {
  width: 100%;
}
.product-list {
  background: #fafafa;
  padding: 15px 0;
}
.product-list h3 {
  font-size: 18px;
  font-weight: 400;
  color: #444444;
  margin: 0 0 10px 0;
}
.price1 {
  font-size: 16px;
  color: #fc5a5a;
  display: block;
  margin-bottom: 12px;
}
.button {
  text-decoration: none;
  display: inline-block;
  padding: 0 12px;
  background: #cccccc;
  color: white;
  text-transform: uppercase;
  font-size: 12px;
  line-height: 28px;
  transition: .3s ease-in;
}
.product-item:hover .button {background: #fc5a5a;}



.five {
  background: #F7F4ED;
  padding: 50px 20px 50px 170px;
  text-align: center;
} 
.five h3 {
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
  position: relative;
  color: #587493;
  font-size: 1.5em;
  font-weight: normal;
  display: inline-block;
  margin: 0;
  line-height: 1;
  padding: 8px 20px 8px 2px;
  border-top: 4px solid;
}
.five h3:before {
  content: "buy me!";
  position: absolute;
  top: -10px;
  left: -160px;
  font-size: 1.5em;
  transform: rotate(-25deg);
  font-family: 'Marck Script', cursive;
}
.five h3:after {
  content: ""; 
  position: absolute;
  width: 120%;
  height: 4px;
  right: 0;
  bottom: -4px;
  background: #587493;
}
@media (max-width: 580px) {
  .five {padding-left: 130px;}
  .five h3 {font-size: 1em;}
  .five h3:before {left: -130px;}
}
@media (max-width: 480px) {
  .five {padding-left: 100px;}
  .five h3 {
    font-size: 1.5em;
    padding-right: 10px;
}
  .five h3:before {left: -100px;}
}
@media (max-width: 380px) {
  .five {padding-left: 90px;}
  .five h3 {font-size: 1.3em;}
  .five h3:before {left: -88px;}
}
</style>
<script>
    var duration = 1000;
    var hidetime = 2000;
    var showtime = 2000;
    var block = null;

function InitFade()
{
	block = document.getElementsByClassName("image1");
	setTimeout("fadeIn()",10);
}

function fadeIn()
{
	for (var i =0; i <= 1; i += 0.01)
	{
		setTimeout("setOpacity(" + (1 - i) + ")", duration * i);
	}

	setTimeout("fadeOut()",duration + hidetime);
}

function fadeOut()
{
	for (var i = 0; i <= 1; i += 0.01)
	{
		setTimeout("setOpacity(" + i + ")", duration * i);
	}

	setTimeout("fadeIn()", duration + showtime);
}

function setOpacity(opa)
{
    for(var i =0; i < block.length; i++)
	block[i].style.opacity = opa;
	block[i].style.MozOpacity = opa;
	block[i].style.filter = 'alpha(opacity='+ ( opa * 100 ) + ');';
}

window.onload = InitFade;
</script>
</head>
<body>
    <div id="ee"></div>
<?php require_once("menu.php"); ?>
    <?php	require_once("connect_DB.php");
         if ($_GET["categories"] != FALSE )
         {
             $cat       = $_GET["categories"];
             $sql       = "SELECT * FROM categories WHERE name='".$cat."'";
             $res       = $conn->query($sql);
             $raw       = $res->fetch_assoc();
             $products  = $raw['products'];
             $spl       = explode(' ', $products);

             foreach ($spl as $v)
                 if ($v || $v == "0")
                 {
                    $sql = "SELECT * FROM products WHERE id='".$v."'";
                    if (!($res = $conn->query($sql)))
                         continue;
                    if (!($raw = $res->fetch_assoc()))
                         continue;
                    echo "<div class=\"product-item\"><img class = \"image1\" src='".$raw['href']."'><div class=\"product-list\">";
                    $categ     = explode(' ',$raw['categories']);
                    foreach($categ as $value)
                    {
                        $sql1 = "SELECT * FROM categories WHERE id='".$value."'";
                        $res1       = $conn->query($sql1);
                        $raw1      = $res1->fetch_assoc();
                        echo "<h3><a href=\"macbook.php?categories=".$raw1['name']."\">".$raw1['name']."</a></h3>";
                    }

                 echo "<div class=\"five\"><h3>".$raw['name']."</h3></div><p>
                 '".$raw['description']."'</p>
                 <span class=\"price1\">$'".$raw['price']."'</span>   <form action='add_to_cart.php' method='POST'><input style='display: none;'' type='text' name='page' value='cart.php'><input style='display: none;'' type='text' name='id' value='".$raw['id']."''><input class='button' type='submit' name='cart' value='Add to cart'></form>   </div></div>";
         }
        }   
        else
            echo "<div class=\"product-item\"><div class=\"product-list\"><h3>Нет такой категории</h3></div>";
    ?>
    <?php require_once("footer.php"); ?>
</body>
</html>