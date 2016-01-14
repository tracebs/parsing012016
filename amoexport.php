<?php
	@include_once 'amoCRM_include.php';
	
	$echostr = "";
	$strhookstatus = "";
	if(isset($_POST)) {						
		echo "success:".implode("!!!!!",$_POST);
		if ( function_exists('fncAmocrmUpdateContactTag') ){
			//$var = fncAmocrmUpdateContactTag($strhookLeadId,$arrAmocrmIdsResponsible,$strAmocrmCookieFile);				
		}						
	} else {
		//??????? ???????????? POST
	}
	
	
	
	//mail("rsdim@rambler.ru","Subj hook started","json:"."!".$var);
?>
