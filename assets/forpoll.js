var countDownDate = new Date("Sep 25, 2022 00:00:00").getTime();

var now = new Date().getTime();

var distance = countDownDate - now;

var days = Math.floor(distance / (1000 * 60 * 60 * 24));

document.getElementById("daysleft").innerHTML = days;
