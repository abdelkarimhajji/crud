let manuBtn = document.getElementById("manuBtn")
let sideNav = document.getElementById("sideNav")
let menu = document.getElementById("menu")

sideNav.style.right = "-250px";

manuBtn.onclick = function(){
    if(sideNav.style.right == "-250px"){
        sideNav.style.right = "0";
        menu.src = "IMG/close.png";
    }
    else{
        sideNav.style.right = "-250px";
        menu.src = "IMG/menu.png";
    }
}
