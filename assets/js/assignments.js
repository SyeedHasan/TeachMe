
let tabs = document.querySelectorAll('div.tabs ul li.tab');
let dateSpan = document.querySelector('span#insertDate');

let month = new Date().getMonth();
let date = new Date().getDate();
let year = new Date().getFullYear();

dateSpan.innerHTML += " " + date + " / " + month + " / " + year;
