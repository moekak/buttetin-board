<?php

$url = "https://restcountries.com/v2/all";

$response = file_get_contents($url);
$countries = json_decode($response, true);

$countryNames = array();

foreach ($countries as $country) {
    $countryNames[] = $country['name'];
}

