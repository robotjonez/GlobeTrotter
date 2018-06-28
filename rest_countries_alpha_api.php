<?php
	$function = $_REQUEST["function"];
  $function();
  function get_countries_alpha_data_and_build_table()
  {
    $search_value = $_REQUEST["search_value"];
    $request = file_get_contents('https://restcountries.eu/rest/v2/alpha/' . $search_value);
    $response = json_decode($request, true);

		if ($response != null && $response != "")
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

				echo "<tr>";
					echo "<td>" . $response["name"] . "</td>";
					echo "<td>" . $response["alpha2Code"] . "</td>";
					echo "<td>" . $response["alpha3Code"] . "</td>";
					echo "<td><img src='" . $response["flag"] . "'</td>";
					echo "<td>" . $response["region"] . "</td>";
					echo "<td>" . $response["subregion"] . "</td>";
					echo "<td>" . number_format($response["population"]) . "</td>";

					echo "</td>";
				echo "</tr>";
				var_dump($response["languages"]);
			}
			else
			{
				echo "error";
			}
		echo "</table>";
	}
?>
