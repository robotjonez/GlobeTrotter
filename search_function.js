function search_country()
{
	var country_name = document.getElementById("country_name").value;
	console.log(country_name);

  var request = new XMLHttpRequest();

  request.open('GET', 'https://restcountries.eu/rest/v2/name/' + country_name, true);

  request.onload = function () {
    var data = JSON.parse(this.response);
    console.log(data);
  }
  request.send();
}
