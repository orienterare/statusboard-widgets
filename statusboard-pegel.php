<?php
$pegelURL = "https://www.pegelonline.wsv.de/webservices/rest-api/v2/stations/5952050.json?includeTimeseries=true&includeCurrentMeasurement=true";
$process = curl_init($pegelURL);
curl_setopt($process, CURLOPT_HEADER, false);
curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
$data = json_decode(curl_exec($process), true);
curl_close($process);

switch ($data['timeseries'][0]['currentMeasurement']['trend']) {
	case -1:
		$trend = "-";
		break;
	case 0:
		$trend = "=";
		break;	
	case 1:
		$trend = "+";
		break;	
	default:
		$trend = "";
		break;
}


$pegel = $data['timeseries'][0]['currentMeasurement']['value'] / 100.0;

echo number_format($pegel, 1) ." m ".$trend;
?>
