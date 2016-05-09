<?php


$mynd = ['bobross_v2','pinkfloyd_v2','sea_v3','gras','docks'];
$caption = ['falleg tré','Dark side of the Moon','Sjorinn er flottur','þetta er flott background','örugglega í evrópu!'];
$i = rand(0, count($mynd)-1);

$myndi = "$mynd[$i].jpg";
$caption = $caption[$i];


?>

<style type="text/css">
	body{
		background-image: url('images/<?php echo $myndi ?>');
		background-repeat: no-repeat;
	    background-attachment: fixed;
		background-size: 100% auto;
	}
	.header{
		text-align: center;
		background-color: inherit;
		opacity: 50%;
		font-family: monospace;
	}
</style>
