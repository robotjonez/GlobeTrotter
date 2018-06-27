function get_and_display_countries_table_from_php()
{
	var search_value = document.getElementById("search_field").value;

  if (search_value != "")
	{
    var request = new XMLHttpRequest();
    request.open('GET', "rest_countries_api.php?function=get_countries_data_and_build_table&search_value=" + search_value, false);
    request.send();
    document.getElementById("countries_table_display").innerHTML = request.responseText;
  }
  else
  {
    window.alert("Search Field Is Empty, You Must Search a country by its name.");
  }
}
