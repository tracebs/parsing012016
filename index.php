<html>
<head>
<title>Импорт данных в amo</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
	function gethtml() {				
		htmlvar = { res: $('#linkfield').val()}
		
		strdomain = "rsdim.dlinkddns.com";
		//strdomain = "192.168.2.44";
		if (htmlvar==="") {
			alert("Адрес не может быть пустой строкой");
		} else {
			//обработка input
			console.log("gethtml start:" + htmlvar);
			$.post(
				"http://"+strdomain+"/trace/post1/curl.php",
				htmlvar,
				function( data ) {
					console.log( 'Res:'+data );
					$('#parsehtml').html(data);
					//parsehtml
				},
				"text"
			);
			
		}
		
	}	
	function exportAMO() {
		console.log("click start");
		//обработка input
		itexts = "";
		itextsid = "";
		inum = 0;
		$( ":input" ).each(function(){
			if (itextsid+$(this).attr("id")==="linkfield") {
				
			} else {
				inum++;
				itextsid=itextsid+$(this).attr("id")+"!-!";
				itexts = itexts+$(this).val()+"!-!";
			}
		});		
		console.log("click1:"+itexts);
		
		//обработка textarea		
		atexts = "";
		atextsid = "";
		$( "textarea" ).each(function(){
			inum++;
			itextsid=itextsid+$(this).attr("id")+"!-!";
			itexts = itexts+$(this).val()+"!-!";
			//atextsid = atextsid + $(this).attr("id")+"!-!";
			//atexts = atexts+$(this).val()+"!-!";
		})
		console.log("click2:"+atexts);
						
		arrstr = '{"names":"'+itextsid+'","vals":"'+itexts+'"}';
		console.log("json:"+arrstr);
		//jobj = JSON.parse(arrstr);
		console.log("=====send post=====");
		$.post(
			"http://rsdim.dlinkddns.com/trace/post1/amoexport.php",
			itexts,
			function( data ) {
				console.log( 'Res:'+data );
				//console.log( 'Res:');
			},
			"text"
		);		
		console.log("click finish");
	}
	</script>
</head>
<body>
Укажите ссылку и нажмите кнопку Загрузить, далее на кнопку Импорт<br>
пример ссылки "http://rsdim.dlinkddns.com/trace/post1/parse.html"<br>
<input type="text" id="linkfield" value="" size="100"><br><br>
<button onclick="gethtml()">Загрузить</button>&nbsp;<button onclick="exportAMO()">Импорт</button><br>
<div id="parsehtml">

</div>
</body>
</html>