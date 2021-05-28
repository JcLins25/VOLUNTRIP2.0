<?php
	
        
 $cep = stripslashes($_REQUEST['cep']);

 $ch = curl_init(); 
 $url = "https://viacep.com.br/ws/" .urlencode($cep) . "/json";

 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

 $result_geocoding = curl_exec($ch);
        echo $result_geocoding;

//  $obj = json_decode($result_geocoding, true);

 
     // Encoding array in JSON format
    //  echo json_encode($return_arr);
    
?>