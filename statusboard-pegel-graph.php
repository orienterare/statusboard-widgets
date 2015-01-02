<?php
header('Content-Type: application/json');


# HH St. Pauli: 5952050

$pegelURL = "https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/5952050/W/measurements.json?start=P7D";

$process = curl_init($pegelURL);
curl_setopt($process, CURLOPT_HEADER, false);
curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
$data = json_decode(curl_exec($process), true);
curl_close($process);

$datasequences = array();


$points = array();
foreach ($data as $pegel) {
	$date = new DateTime($pegel["timestamp"]);
	array_push($points, array("title" => $date->format("d.m. h:i"), "value" => $pegel["value"] / 100.0));
}

$seq = array("title" => "Hamburg St. Pauli", "datapoints" =>$points );
array_push($datasequences, $seq);

$graph = array('title' => "Pegel", 'datasequences' => $datasequences);
$json = array('graph' => $graph, "refreshEveryNSeconds" => 3600, "color" =>"red", "type" => "line");

echo json_encode($json);

exit;
?>