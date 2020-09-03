<?php 

	$jsonData = file_get_contents("https://pomber.github.io/covid19/timeseries.json"); //Grab data
	$data = json_decode($jsonData, true); //Return obj and convert to array

	foreach($data as $key => $value){ //Daily case increase
		$day_count = count($value)-1;
		$day_count_prev = $day_count-1;
	}

	$total_confirmed = 0;
	$total_recovered = 0;
	$total_deaths = 0;

	foreach($data as $key => $value){ //WorldWide Counts
		$total_confirmed = $total_confirmed + $value[$day_count]['confirmed'];
		$total_recovered = $total_recovered + $value[$day_count]['recovered'];
		$total_deaths = $total_deaths + $value[$day_count]['deaths'];
	}

?>