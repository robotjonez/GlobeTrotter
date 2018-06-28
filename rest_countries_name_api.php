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

			for ($i = 0; $i < 50; $i++)
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
		}
		else
		{
			echo "error";
		}
	}
?>
