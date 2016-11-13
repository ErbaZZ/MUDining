<?php

	header ( 'Content-type: text/plain');
	foreach ($_POST as $key => $value) {
		echo "Key: $key;\n   Value: $value\n";
	}

?>