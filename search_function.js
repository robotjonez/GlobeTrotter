function get_and_display_countries_table_from_php()
{
	var country_name = document.getElementById("search_field").value;

  if (country_name != "")
	{
    var request = new XMLHttpRequest();
    request.open('GET', "rest_countries_api.php?function=get_countries_data_and_build_table&country_name=" + country_name, false);
    request.send();
    document.getElementById("countries_table_display").innerHTML = request.responseText;
  }
  else
  {
    window.alert("Search Field Is Empty, You Must Search a country by its name.");
  }
}
