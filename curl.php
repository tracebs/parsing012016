<?php
//
	if(isset($_POST)) {		
		$str1 = implode("!",$_POST);
		//echo "post:".$str1;
		     
		#Формируем ссылку для запроса
		$link=implode("!",$_POST);

		$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
		curl_setopt($curl,CURLOPT_URL,$link);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
		
		$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
		$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
		curl_close($curl); #Завершаем сеанс cURL

		$code=(int)$code;		
		try
		{
			#Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
			if($code!=200 && $code!=204) {
				echo "error";
			} else {
				//подрежем все до тэгов body
				$pos1 = strpos($out,"<body>");
				$pos2 = strpos($out,"</body>");
				$out2 = substr($out,$pos1,$pos2);
				echo "".$out2;
			}			
		}
		catch(Exception $E)
		{
			echo "".$out;
		}
	//===================
	} else {
		echo "error";
	}
?>