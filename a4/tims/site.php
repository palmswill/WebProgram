<!DOCTYPE html>
<head>
<title>Thank you for Ordering at Tim Hortons!</title>
<link rel="stylesheet" href="../css/site.css">
</head>
<body>


<h1>Thanks for your order. Here it is:</h1>




<?php 

echo "test";

@$coffetype = $_POST["coffetype"];
$number = $_POST["number"];
$size = $_POST["size"];


/// if there is coffetype present, set cream and sugar
if (isset($coffetype)){
    switch($coffetype) {
    case "r":
        $cream=1;
        $sugar=1;
        break;
    case "dd":
        $cream=2;
        $sugar=2;
        break;
    
    case "tt":
        $cream=3;
        $sugar=3;
        break;
    case "b":
        $cream=0;
        $sugar=0;
        break;
    case "bs":
        $cream=0;
        $sugar=1;
        break;
    case "bss":
        $cream=0;
        $sugar=2;
        break;
    default:
        $cream=0;
        $sugar=3;
    }
        
}
// if not, get cream and sugar from form
else{
    $cream = $_POST["cream"];
    $sugar = $_POST["sugar"];
}



//determine coffee pixel according to size
switch($size) {
    case "xs":
        $imgsize="70px";
        break;
    case "s":
        $imgsize="80px";
        break;
    case "m":
        $imgsize="90px";
        break;
    case "l":
        $imgsize="100px";
        break;
    default:
    $imgsize="110px";
}

//determine price according to size
switch($size) {
    case "xs":
        $price=1.39;
        break;
    case "s":
        $price=1.59;
        break;
    case "m":
        $price=1.79;
        break;
    case "l":
        $price=1.99;
        break;
    default:
    $price=2.19;
}
//coffe cup image
$info='<div class="mainform">'.
'<img src="../img/cup.jpg" alt="cup" width='.
$imgsize
.'>';

//sugar image
if ($sugar>0){

    $info=$info.'<img src="../img/plus.jpg" width="40px "alt="plus">';

for ($x=0; $x<$sugar;$x++){
    $info=$info.'<img src="../img/sugar.jpg" width="40px "alt="sugar">';
}
}

//cream image
if ($cream>0){
$info=$info.'<img src="../img/plus.jpg" width="40px "alt="plus">';

for ($x=0; $x<$cream;$x++){
    $info=$info.'<img src="../img/cream.jpg" width="40px "alt="cream">';
}
}


$info=$info.'</div>';

for ($x=0; $x<$number;$x++){
    echo $info;
}


echo 'Cost: $'.$price.' x '.$number.' + tax = $'.number_format($price*$number*1.13,2,'.',',');
?>
</body>
</html>