<?php

	$function = $_REQUEST["function"];
  $function();
  function get_countries_data_and_build_table()
  {
    $search_value = $_REQUEST["search_value"];
    $request = file_get_contents('https://restcountries.eu/rest/v2/name/' . $search_value);
    $response = json_decode($request);

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

 			if (count($response) <= 50)
			{
				$limit = count($response);
			}
			else
			{
				$limit = 50;
			}

			for ($i = 0; $i < $limit; $i++)
			{
				echo "<tr>";
					echo "<td>" . $response[$i]->name . "</td>";
					echo "<td>" . $response[$i]->alpha2Code . "</td>";
					echo "<td>" . $response[$i]->alpha3Code . "</td>";
					echo "<td><img src='" . $response[$i]->flag . "'</td>";
					echo "<td>" . $response[$i]->region . "</td>";
					echo "<td>" . $response[$i]->subregion . "</td>";
					echo "<td>" . number_format($response[$i]->population) . "</td>";
					echo "<td>";
						for ($key = 0; $key < count($response[$i]->languages); $key++)
						{
							if (count($response[$i]->languages) > 1)
							{
								echo $response[$i]->languages[$key]->name . "<br>";
							}
							else
							{
								echo $response[$i]->languages[$key]->name;
							}
						}
					echo "</td>";
				echo "</tr>";
			}
			echo "</table>";

			if (count($response) > 50)
			{
				echo "<h2>Total countries: " . count($response) . "</h2>";
				echo "<p>Displaying 50 out of " . count($response) . " results" . "</p>";
			}
			else
			{
				echo "<h2>Total countries: " . count($response) . "</h2>";
			}

			echo "<h3>Regions: </h3>";
			echo "<ul>";

				$regions = [];

				foreach ($response as &$region)
				{
					array_push($regions,$region->region);
				}

				$region_display_value = array_count_values($regions);
				foreach ($region_display_value as $key => $value)
				{
					if ($key != null || $key != "")
					{
						echo "<li>" . $key . " (" . $value . ")</li>";
					}
				}

			echo "</ul>";

			echo "<h3>Subregions: </h3>";
			echo "<ul>";

				$subregions = [];

				foreach ($response as &$subregion)
				{
					array_push($subregions,$subregion->subregion);
				}
				$subregion_display_value = array_count_values($subregions);

				foreach ($subregion_display_value as $key => $value)
				{
					if ($key != null || $key != "")
					{
						echo "<li>" . $key . " (" . $value . ")</li>";
					}
				}

			echo "</ul>";
		}
		else
		{
			echo $search_value . " is not a valid country name, if you are trying to search by country code it must be uppercase.";
		}
	}
?>
