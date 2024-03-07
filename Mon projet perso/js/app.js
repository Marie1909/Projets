
const city = document.getElementById("cityInput").value;
const apiKey = "c3ef6620e120f0c02281e20dbb12bb29";
const affichage = document.getElementById("weatherInfo");
const bouton = document.getElementById("meteo");

meteo.addEventListener("click", () => {
    const city = document.getElementById("cityInput").value;
    getWeather(city); 
});
function mapWeatherDescription(description) {
    const weatherDescriptions = {
         'sky':'ciel',
      'Clear': 'Dégagé',
      'Clouds': 'Nuageux',
      'Rain': 'Pluie',
      'Drizzle': 'Bruine',
      'Thunderstorm': 'Orages',
      'Snow': 'Neige',
      'Mist': 'Brume',
      'Fog': 'Brouillard',
      'Haze': 'Léger brouillard',
    };
    return weatherDescriptions[description] || description;
  }
function getWeather(city) {
    const url = `http://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=fr`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const weatherDescription = data.weather[0].description;
            const temperature = data.main.temp;
            const humidity = data.main.humidity;
            const windSpeed = data.wind.speed;
            const weatherIcon = data.weather[0].icon;
            const iconUrl = `http://openweathermap.org/img/w/${weatherIcon}.png`;
            const weatherIconElement = document.getElementById('weatherIcon');
            weatherIconElement.classList.remove("d-none");
            weatherIconElement.src = iconUrl;
            affichage.innerHTML=(`Weather in ${city}: ${weatherDescription}, Temperature: ${temperature}°C, Humidity: ${humidity}%, Wind Speed: ${windSpeed} m/s`);
        })
        .catch(error => {
            console.error('Error fetching weather data:', error);
        });
}


