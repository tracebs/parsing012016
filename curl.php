<?php
//
	if(isset($_POST)) {		
		$str1 = implode("!",$_POST);
		//echo "post:".$str1;
		     
		#��������� ������ ��� �������
		$link=implode("!",$_POST);

		$curl=curl_init(); #��������� ���������� ������ cURL
		curl_setopt($curl,CURLOPT_URL,$link);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
		
		$out=curl_exec($curl); #���������� ������ � API � ��������� ����� � ����������
		$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #������� HTTP-��� ������ �������
		curl_close($curl); #��������� ����� cURL

		$code=(int)$code;		
		try
		{
			#���� ��� ������ �� ����� 200 ��� 204 - ���������� ��������� �� ������
			if($code!=200 && $code!=204) {
				echo "error";
			} else {
				//�������� ��� �� ����� body
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