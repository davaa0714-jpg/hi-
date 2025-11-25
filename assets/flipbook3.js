var currentPage3 = 0;

const prevBtn3 = document.querySelector("#prev-btn3");
const nextBtn3 = document.querySelector("#next-btn3");
const scene3 = document.querySelector(".scene3");
const mediaQuery3_1 = window.matchMedia('(max-width: 1380px)');
const mediaQuery3_2 = window.matchMedia('(max-width: 1150px)');

prevBtn3.addEventListener("click", prevPage3);
nextBtn3.addEventListener("click", nextPage3);


$('.book3')
.on('click', '.active3', nextPage3)
.on('click', '.flipped3', prevPage3);

// $('.button')
// .on('click', '.next', nextPage)
// .on('click', '.prev', prevPage);

// var hammertime = new Hammer($('.book')[0]);
// hammertime.on("swipeleft", nextPage);
// hammertime.on("swiperight", prevPage);

function openBook3() {
    if(mediaQuery3_1.matches){
        scene3.style.transform = "translateX(50%)";
        prevBtn3.style.transform = "translateX(-270px)";
        nextBtn3.style.transform = "translateX(270px)";
    } else {
        scene3.style.transform = "translateX(50%)";
        prevBtn3.style.transform = "translateX(-300px)";
        nextBtn3.style.transform = "translateX(300px)";
    }
    
}

function closeBook3(isAtBeginning) {
    if(isAtBeginning) {
        scene3.style.transform = "translateX(0%)";
    } else {
        scene3.style.transform = "translateX(100%)";
    }
    
    prevBtn3.style.transform = "translateX(0px)";
    nextBtn3.style.transform = "translateX(0px)";
}

function nextPage3() {
    var element = $('.active3').first();
    if(element.is(':first-child')){
        openBook3();
        $('.active3')
        .removeClass('active3')
        .addClass('flipped3')
        .next('.page3')
        .addClass('active3')
        .siblings();
    } else if(element.is(':last-child')){
        closeBook3(false);
        $('.active3')
        .removeClass('active3')
        .addClass('flipped3')
        .next('.page3')
        .addClass('active3')
        .siblings();
    } else {
        $('.active3')
        .removeClass('active3')
        .addClass('flipped3')
        .next('.page3')
        .addClass('active3')
        .siblings();
    }
}

function prevPage3() {
    var element = $('.flipped3').last();
    if(element.is(':last-child')){
        openBook3();
        $('.flipped3')
        .last()
        .removeClass('flipped3')
        .addClass('active3')
        .siblings('.page3')
        .removeClass('active3');
    } else if(element.is(':first-child')){
        closeBook3(true);
        $('.flipped3')
        .last()
        .removeClass('flipped3')
        .addClass('active3')
        .siblings('.page3')
        .removeClass('active3');
    } else {
        $('.flipped3')
        .last()
        .removeClass('flipped3')
        .addClass('active3')
        .siblings('.page3')
        .removeClass('active3');
    }
}

// $(function(){
//     $('.main-img').okzoom({
//         width: 250,
//         height: 130,
//         border: "1.5px solid white",
//         shadow: "0 0 1px gray",
//         scaleWidth: 800,
//     });
// });