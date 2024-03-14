//Application Météo
const city = document.getElementById("cityInput").value;
const apiKey = "c3ef6620e120f0c02281e20dbb12bb29";// clé de l'application météo
const affichage = document.getElementById("weatherInfo");
const bouton = document.getElementById("meteo");

bouton.addEventListener("click", () => {//appel au click
  const city = document.getElementById("cityInput").value;
  getWeather(city);
});
function mapWeatherDescription(description) {//Traduction du vocabulaire météo
  const weatherDescriptions = {
    sky: "ciel",
    Clear: "Dégagé",
    Clouds: "Nuageux",
    Rain: "Pluie",
    Drizzle: "Bruine",
    Thunderstorm: "Orages",
    Snow: "Neige",
    Mist: "Brume",
    Fog: "Brouillard",
    Haze: "Léger brouillard",
  };
  return weatherDescriptions[description] || description;
}
function getWeather(city) {//appel d'API
  const url = `http://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=fr`;
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      const weatherDescription = data.weather[0].description;
      const temperature = data.main.temp;
      const humidity = data.main.humidity;
      const windSpeed = data.wind.speed;
      const weatherIcon = data.weather[0].icon;
      const iconUrl = `http://openweathermap.org/img/w/${weatherIcon}.png`;
      const weatherIconElement = document.getElementById("weatherIcon");
      weatherIconElement.classList.remove("d-none");
      weatherIconElement.src = iconUrl;
      affichage.innerHTML = `Météo à ${city}: ${weatherDescription}, Temperature: ${temperature}°C, Humidité: ${humidity}%, vitesse du vent: ${windSpeed} m/s`;
    })
    .catch((error) => {
      console.error("Error fetching weather data:", error);
    });
}


//Animation Index
var wordsToType = document //stocke les mots frappés , la vitesse de frappe et le délai entre chaque mot
    .querySelector("span[words]")
    .getAttribute("words")//mots extraits de l'attribut word
    .split(","),// divise les mots dans un tableau avec la méthode split
  typer = document.querySelector("span[words]"),
  typingSpeed = parseInt(typer.getAttribute("typing-speed")) || 70,//valeur de la vitesse de frappe
  typingDelay = parseInt(typer.getAttribute("typing-delay")) || 700;// délai entre chaque mot 

var wordsToType = document
    .querySelector("span[words]")
    .getAttribute("words")
    .split(","),
  typer = document.querySelector("span[words]"),
  typingSpeed = parseInt(typer.getAttribute("typing-speed")) || 70,
  typingDelay = parseInt(typer.getAttribute("typing-delay")) || 700;

var currentWordIndex = 0,//var qui suit l'index des mots tapé
  currentCharacterIndex = 0;// var de l'index du caractère en train d'être tapé

function type() {// function qui simule la frappe de texte, récupere le mot a partir de wordToType puis affiche chaque caracteres de ce mot
  var wordToType = wordsToType[currentWordIndex % wordsToType.length];

  if (currentCharacterIndex < wordToType.length) {
    typer.innerHTML += wordToType[currentCharacterIndex++];
    setTimeout(type, typingSpeed);
  } else {
    setTimeout(erase, typingDelay);
  }
}
function erase() {// function qui simule la suppression du texte, efface caractere par caractere puis passe au mot suivant
  var wordToType = wordsToType[currentWordIndex % wordsToType.length];
  if (currentCharacterIndex > 0) {
    typer.innerHTML = wordToType.substr(0, --currentCharacterIndex - 1);
    setTimeout(erase, typingSpeed);
  } else {
    currentWordIndex++;
    setTimeout(type, typingDelay);
  }
}
window.onload = function () {
  type();
};
