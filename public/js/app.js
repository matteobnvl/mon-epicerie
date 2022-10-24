/* script header */


var className = "active";
var scrollTrigger = 20;

window.addEventListener('scroll',function(){
    if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {
        document.getElementsByTagName("header")[0].classList.add(className);
    } else {
        document.getElementsByTagName("header")[0].classList.remove(className);
    }
})


function BurgerActive(){
    document.getElementById('navburger').classList.toggle('active-burger');
    document.getElementById('body').classList.toggle('body-active');
    document.getElementById('filter-active').classList.toggle('filter-active');
}

function BurgerClose(){
    document.getElementById('navburger').className ="contain-burger";
    document.getElementById('body').className = "";
    document.getElementById('filter-active').className = "";
}


