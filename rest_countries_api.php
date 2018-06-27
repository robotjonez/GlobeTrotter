<?php

	$function = $_REQUEST["function"];
  $function();

  function get_countries_data_and_build_table()
  {
    $country_name = $_REQUEST["country_name"];
    $request = file_get_contents('https://restcountries.eu/rest/v2/name/' . $country_name);
    $response = json_decode($request);

		if ($response != null)
		{
      var_dump($response);
    }
  }

?>
