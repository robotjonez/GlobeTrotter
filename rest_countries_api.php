<?php

	$function = $_REQUEST["function"];
  $function();

  function get_countries_data_and_build_table()
  {
    $search_value = $_REQUEST["search_value"];

    if (strlen($search_value) > 3)
    {
      $request = file_get_contents('https://restcountries.eu/rest/v2/name/' . $search_value);
      $response = json_decode($request);
    }
    else {
      $request = file_get_contents('https://restcountries.eu/rest/v2/alpha/' . $search_value);
      $response = json_decode($request);
    }


		if ($response != null)
		{
      var_dump($response);
    }
  }

?>
