/* script header */


var className = "active";
var scrollTrigger = 20;

var classNameSearch = "search-ville-active";
var scrollSearch = 450;

window.addEventListener('scroll',function(){
    if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {
        document.getElementsByTagName("header")[0].classList.add(className);
    } else {
        document.getElementsByTagName("header")[0].classList.remove(className);
    }
    if (window.scrollY >= scrollSearch || window.pageYOffset >= scrollSearch) {
        document.getElementById("SearchVille").classList.add(classNameSearch);
    } else {
        document.getElementById("SearchVille").classList.remove(classNameSearch);
    }
})


document.getElementById("SearchVille").addEventListener('input', function(){
    if(this.value != ""){
        document.getElementById("btn-search-ville").classList.add('btn-search-active');
    }else{
        document.getElementById("btn-search-ville").classList.remove('btn-search-active');
    }
});

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


