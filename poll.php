<?php
	include "question.php";
	$s = $m->prepare("SELECT `option` FROM options WHERE poll_id = ?");
	$s->bind_param("i", $_GET[n]);
	$s->execute();
	$s->bind_result($e);
	while($s->fetch())
		$o[] = str_replace("'", "&#39;", $e);
	$s->close();
	$m->close();
?>
			<form action = "vote.php?n=<?php echo $_GET[n];?>" method = "post" autocomplete = "off">
				<textarea disabled><?php echo $q;?></textarea>
				<div id = "o">
<?php
	$c = count($o);
	for($i = 0; $i < $c; $i++)
		echo "\t\t\t\t\t<div>\n\t\t\t\t\t\t<span><input type = 'radio' name = 'o' value = '$i'></span>\n\t\t\t\t\t\t<input value = '$o[$i]' disabled>\n\t\t\t\t\t</div>\n";
?>
				</div>
				<input type = "submit" value = "Vote" name = "v">
				<input type = "submit" value = "Results" class = "r">
<?php include "footer.php";?>