<?php
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


$header = array('Type: application/json','token:app_token','secret:app_secret');
	$data = array 
		("function" => "authenticate", 
		"org_id" => $_POST["org_id"],
		"password" => $_POST["password"]);

	$curl = curl_init();
	$url = 'https://10.7.14.14/accio';

	/*$options = array(CURLOPT_URL => $url,
						    CURLOPT_HTTPHEADER =>$header,
							CURLOPT_SSL_VERIFYPEER => false,
							CURLOPT_SSL_VERIFYHOST => FALSE,
							CURLOPT_POST => 1,
							CURLOPT_POSTFIELDS => $data
						   );

	$opt = curl_setopt_array($curl, $options);
	echo $opt;*/

	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl,CURLOPT_POST, 1);
	curl_setopt($curl,CURLOPT_POSTFIELDS, $data);

	$result = curl_exec($curl);
	//echo $result;
	//$result = json_decode($result,true);

	/*$images = $result;

	echo $images;*/

	curl_close($curl);
	$id = multiexplode(array(",",":"),$result);
	echo $id[1];

	//print_r($result);

	
?>