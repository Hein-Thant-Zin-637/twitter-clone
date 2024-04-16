const body = document.querySelector("body"),
    modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");
table = document.getElementById("table");
card = document.getElementById("card");
form = document.getElementsByClassName("form-control")
chose = document.getElementsByClassName("form-select")

let getMode = localStorage.getItem("mode");

if (getMode && getMode === "dark") {
    body.classList.toggle("dark");
    if (table !== null) {
        table.classList.add("table-dark");
    }
    if (card !== null) {
        card.classList.add("text-bg-dark");
        for (let i = 0; i < form.length; i++) {
            form[i].classList.add("text-bg-dark");
        }
    }
    if (chose !== null) {
        for (let i = 0; i < chose.length; i++) {
            chose[i].classList.add("text-bg-dark");
        }
    }
}

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        if (table !== null) {
            table.classList.add("table-dark");
        }
        if (card !== null) {
            card.classList.add("text-bg-dark");
            for (let i = 0; i < form.length; i++) {
                form[i].classList.add("text-bg-dark");
            }
        }
        if (chose !== null) {
            for (let i = 0; i < chose.length; i++) {
                chose[i].classList.add("text-bg-dark");
            }
        }
        localStorage.setItem("mode", "dark");
    } else {
        if(table !== null){
            table.classList.remove("table-dark");
        }
        if(card !== null){
            card.classList.remove("text-bg-dark");
            for (let i = 0; i < form.length; i++) {
                form[i].classList.remove("text-bg-dark");
            }
        }
        if (chose !== null) {
            for (let i = 0; i < chose.length; i++) {
                chose[i].classList.add("text-bg-dark");
            }
        }
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
        document.getElementById("title").innerHTML = "&nbsp;";
    } else {
        localStorage.setItem("status", "open");
        document.getElementById("title").innerHTML = "Dahsboard";
    }
})