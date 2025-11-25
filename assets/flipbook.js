var currentPage = 0;

const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
const scene = document.querySelector(".scene");
const mediaQuery = window.matchMedia('(max-width: 1380px)');
const mediaQuery2 = window.matchMedia('(max-width: 1150px)');

prevBtn.addEventListener("click", prevPage);
nextBtn.addEventListener("click", nextPage);

$('.book')
.on('click', '.active', nextPage)
.on('click', '.flipped', prevPage);

// $('.button')
// .on('click', '.next', nextPage)
// .on('click', '.prev', prevPage);

// var hammertime = new Hammer($('.book')[0]);
// hammertime.on("swipeleft", nextPage);
// hammertime.on("swiperight", prevPage);

function openBook() {
    if(mediaQuery.matches){
        scene.style.transform = "translateX(50%)";
        prevBtn.style.transform = "translateX(-270px)";
        nextBtn.style.transform = "translateX(270px)";
    } else {
        scene.style.transform = "translateX(50%)";
        prevBtn.style.transform = "translateX(-300px)";
        nextBtn.style.transform = "translateX(300px)";
    }
    
}

function closeBook(isAtBeginning) {
    if(isAtBeginning) {
        scene.style.transform = "translateX(0%)";
    } else {
        scene.style.transform = "translateX(100%)";
    }
    
    prevBtn.style.transform = "translateX(0px)";
    nextBtn.style.transform = "translateX(0px)";
}

function nextPage() {
    var element = $('.active').first();
    if(element.is(':first-child')){
        openBook();
        $('.active')
        .removeClass('active')
        .addClass('flipped')
        .next('.page')
        .addClass('active')
        .siblings();
    } else if(element.is(':last-child')){
        closeBook(false);
        $('.active')
        .removeClass('active')
        .addClass('flipped')
        .next('.page')
        .addClass('active')
        .siblings();
    } else {
        $('.active')
        .removeClass('active')
        .addClass('flipped')
        .next('.page')
        .addClass('active')
        .siblings();
    }
}

function prevPage() {
    var element = $('.flipped').last();
    if(element.is(':last-child')){
        openBook();
        $('.flipped')
        .last()
        .removeClass('flipped')
        .addClass('active')
        .siblings('.page')
        .removeClass('active');
    } else if(element.is(':first-child')){
        closeBook(true);
        $('.flipped')
        .last()
        .removeClass('flipped')
        .addClass('active')
        .siblings('.page')
        .removeClass('active');
    } else {
        $('.flipped')
        .last()
        .removeClass('flipped')
        .addClass('active')
        .siblings('.page')
        .removeClass('active');
    }
}

// $(function(){
//     $('.main-img').okzoom({
//         width: 270,
//         height: 170,
//         border: "1.5px solid white",
//         shadow: "0 0 1px gray",
//         scaleWidth: 800,
//     });
// });