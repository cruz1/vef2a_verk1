
	
<div class="footer">
	<p>&copy;
	<?php
	$startYear = 2015;
	$thisYear = date('Y');
	if ($startYear == $thisYear) {
	echo $startYear;
	} else {
	echo "{$startYear}&ndash;{$thisYear}";
	}
	?>
	Friðrik Njálsson</p>
</div>
