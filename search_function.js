function search_country()
{
	var country_name = document.getElementById("search").value;

  if (country_name != "")
	{
    var request = new XMLHttpRequest();
    request.open('GET', 'https://restcountries.eu/rest/v2/name/' + country_name, true);
    request.send();
    document.getElementById("countries_table_display").innerHTML = request.responseText;
  }
  else
  {
    window.alert("Search Field Is Empty, You Must Search a country by its name.");
  }
}
