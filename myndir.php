<?php 


$mynd = ['bobross','pinkfloyd','sea','tree'];
$caption = ['falleg tré','Dark side of the Moon','Sjorinn er flottur','þetta er flott background'];
$i = rand(0, count($mynd)-1);

$myndi = "$mynd[$i].jpg";
$caption = $caption[$i];


?>
<img src="images/<?php echo $myndi; ?>" alt="Random image">
<?php echo $caption +"ok"; ?>
