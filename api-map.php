<?php
	try {
	require(__DIR__. '/database/db.php');
	}
	catch(Exception $e) {}
        
 $endereco = stripslashes($_REQUEST['endereco']);

 $ch = curl_init(); 
 $url = "http://www.mapquestapi.com/geocoding/v1/address?key=tMIwGu01s4teRLEGZMmSbAtKFyeaFTey&location=" . urlencode( $endereco) . "&maxResults=1";

 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

 $result_geocoding = curl_exec($ch);


 $obj = json_decode($result_geocoding, true);

 $lat = ($obj['results'][0]["locations"][0]["latLng"]['lat']);
 $lng = ($obj['results'][0]["locations"][0]["latLng"]['lng']);
     // echo strval ($lat) . " " . strval ($lng);

    $query = "SELECT *, (6378 * acos(cos(radians('".$lat."')) * cos(radians(Latitude)) * cos( radians(Longitude) - radians('".$lng."')) + sin(radians('".$lat."')) * 
           sin(radians(Latitude)))) 
           AS `distance` 
           FROM `Hostel` WHERE (6378 * acos(cos(radians('".$lat."')) * cos(radians(Latitude)) * cos( radians(Longitude) - radians('".$lng."')) + sin(radians('".$lat."')) * 
           sin(radians(Latitude)))) < 15 ORDER BY `distance`";

      $result = mysqli_query($con,$query);

        if($result){
    
		$return_arr = array();

    while($row = mysqli_fetch_array($result)){
    $id = $row['Id_hostel'];
    $hostelname = $row['hostelname'];
    $lat = $row['Latitude'];
    $lng = $row['Longitude'];

    $return_arr[] = array("id" => $id,
                    "hostelname" => $hostelname,
                    "lat" => $lat,
                    "lng" => $lng);
}
     // Encoding array in JSON format
     echo json_encode($return_arr);
    
}
?>