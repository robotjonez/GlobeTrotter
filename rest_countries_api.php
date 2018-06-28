<?php

	$function = $_REQUEST["function"];
  $function();

  function get_countries_data_and_build_table()
  {
    $search_value = $_REQUEST["search_value"];

    if ($search_value != null && strlen($search_value) > 3)
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
			echo "<table>";
				echo "<tr>";
					echo "<th>Country Name</th>";
					echo "<th>Alpha Code 2</th>";
					echo "<th>Alpha Code 3</th>";
					echo "<th>Flag</th>";
					echo "<th>Region</th>";
					echo "<th>Subregion</th>";
					echo "<th>Population</th>";
					echo "<th>Language(s)</th>";
				echo "</tr>";
      echo "</table>";
      var_dump($response);
    }
  }

?>
