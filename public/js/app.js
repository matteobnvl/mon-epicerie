/* script header */


var className = "active";
var scrollTrigger = 60;

window.addEventListener('scroll',function(){
    if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {
        document.getElementsByTagName("header")[0].classList.add(className);
    } else {
        document.getElementsByTagName("header")[0].classList.remove(className);
    }
})


function BurgerActive(){
    document.getElementById('navburger').classList.toggle('active-burger');
    document.getElementById('contain-home').classList.toggle('active-filter');
}

function BurgerClose(){
    document.getElementById('navburger').className ="contain-burger";
    document.getElementById('contain-home').className = "contain-home";
}


