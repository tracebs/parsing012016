<?php
//
	if(isset($_POST)) {
		@file_put_contents('test.txt',"post:".implode("!",$_POST));
		echo "success";
	} else {
		$str=@file_put_contents('test.txt','!');
	}
?>