
let tabs = document.querySelectorAll('div.tabs ul li.tab');
let todo = document.querySelector('div.to-do');
let finished = document.querySelector('div.finished');

let finishedTab = tabs[1];
let todoTab = tabs[0];

finishedTab.addEventListener("click", function(){
    if(!finishedTab.classList.contains("active")){
        finishedTab.classList.add("active");
    }
    todoTab.classList.remove("active");

    if(!todo.classList.contains("noDisplay")){
        todo.classList.add('noDisplay');
    }
    finished.classList.remove('noDisplay');
});

todoTab.addEventListener("click", function(){
    if(!todoTab.classList.contains("active")){
        todoTab.classList.add("active");
    }
    finishedTab.classList.remove("active");

    
    if(!finished.classList.contains("noDisplay")){
        finished.classList.add('noDisplay');
    }
    todo.classList.remove('noDisplay');

});



let dateSpan = document.querySelector('span#insertDate');

let month = new Date().getMonth();
let date = new Date().getDate();
let year = new Date().getFullYear();

dateSpan.innerHTML += " " + date + " / " + month + " / " + year;


