<?php
##config for homelocation and radius (in meter)
$myhomelat = "53.554340";
$myhomelng = "9.988971";
$myradius = "400";

## get the drive now json
$driveURL = "https://www.drive-now.com/php/metropolis/json.vehicle_filter?cit=40065";
$process = curl_init($driveURL);
curl_setopt($process, CURLOPT_HEADER, false);
curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
$data = json_decode(curl_exec($process), true);
curl_close($process);


#function to check, radius-distance from car-location to home-location
#from http://techhasnoboundary.blogspot.de/2011/10/check-if-gps-location-latitude-and.html
function isInArea($homeloclat, $homeloclng, $loclat, $loclng){
  $R = 6371;
    $lat1 = $loclat;
    $lon1 = $loclng;
    $lat2 = $homeloclat;
    $lon2 = $homeloclng;
    $dLat = ($lat2 - $lat1) * M_PI / 180;
    $dLon = ($lon2 - $lon1) * M_PI / 180;
    $a = sin($dLat / 2) * sin($dLat / 2) + cos($lat1 * M_PI / 180) * cos($lat2 * M_PI / 180) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$d = $R * $c;
	$result = $d * 1000;
	return ($result);
}

#get the cars
$autos = $data['rec']['vehicles']['vehicles'];
$i = 0;

# search through json, count cars within location 
foreach ($autos as $mydata){
         if ((isInArea($myhomelat, $myhomelng, $mydata['position']['latitude'], $mydata['position']['longitude']) <= $myradius) && ($mydata['address'] != 'Umrüster DE') ){
		$i++;
}  
}

echo $i;
?>
