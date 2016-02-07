<?php 
$myndir = [
	['file' => 'bobross',
	'caption' => 'falleg tré'],
	['file' => 'pinkfloyd', 
	'caption' => 'Dark side of the moon'],
	['file' => 'sea',
	'caption' => 'sjorinn er flottur'],
	['file' => 'tree',
	'caption' => 'thetta er flott background.']
];

$i = rand(0, count($myndir)-1);

$valdnarMyndir = "{$myndir[$i]['file']}.jpg";
$caption = $myndir[$i]['caption'];


?>
	<img src="<?= $valdnarMyndir; ?>" alt="Random image">
	<?php echo $caption; ?>
