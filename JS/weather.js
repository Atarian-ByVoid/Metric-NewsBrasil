const key = "5c5360dc825197a594ccbb91abc66a0f";


function putDataInScreen(data) {

    document.querySelector(".city").innerHTML = "Weather in " + data.name;
    document.querySelector(".temp").innerHTML = Math.floor(data.main.temp) + "°C";
    document.querySelector(".text-prevision").innerHTML = data.weather[0].description;
    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".image-prevision").src = `https://openweathermap.org/img/wn/${data.weather[0].icon}.png`;




}

async function findCity(city) {
    const data = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${key}&units=metric`)
        .then(response => response.json());

    putDataInScreen(data);
}


function clickOn() {

    const city = document.querySelector(".input-city").value;

    findCity(city);
}

function goBack() {
    window.history.back();
}

