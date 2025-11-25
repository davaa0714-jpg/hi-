var currentPage2 = 0;

const prevBtn2 = document.querySelector("#prev-btn2");
const nextBtn2 = document.querySelector("#next-btn2");
const scene2 = document.querySelector(".scene2");
const mediaQuery2_1 = window.matchMedia('(max-width: 1380px)');
const mediaQuery2_2 = window.matchMedia('(max-width: 1150px)');

prevBtn2.addEventListener("click", prevPage2);
nextBtn2.addEventListener("click", nextPage2);


$('.book2')
.on('click', '.active2', nextPage2)
.on('click', '.flipped2', prevPage2);

// $('.button')
// .on('click', '.next', nextPage)
// .on('click', '.prev', prevPage);

// var hammertime = new Hammer($('.book')[0]);
// hammertime.on("swipeleft", nextPage);
// hammertime.on("swiperight", prevPage);

function openBook2() {
    if(mediaQuery2_1.matches){
        scene2.style.transform = "translateX(50%)";
        prevBtn2.style.transform = "translateX(-270px)";
        nextBtn2.style.transform = "translateX(270px)";
    } else {
        scene2.style.transform = "translateX(50%)";
        prevBtn2.style.transform = "translateX(-300px)";
        nextBtn2.style.transform = "translateX(300px)";
    }
    
}

function closeBook2(isAtBeginning) {
    if(isAtBeginning) {
        scene2.style.transform = "translateX(0%)";
    } else {
        scene2.style.transform = "translateX(100%)";
    }
    
    prevBtn2.style.transform = "translateX(0px)";
    nextBtn2.style.transform = "translateX(0px)";
}

function nextPage2() {
    var element = $('.active2').first();
    if(element.is(':first-child')){
        openBook2();
        $('.active2')
        .removeClass('active2')
        .addClass('flipped2')
        .next('.page2')
        .addClass('active2')
        .siblings();
    } else if(element.is(':last-child')){
        closeBook2(false);
        $('.active2')
        .removeClass('active2')
        .addClass('flipped2')
        .next('.page2')
        .addClass('active2')
        .siblings();
    } else {
        $('.active2')
        .removeClass('active2')
        .addClass('flipped2')
        .next('.page2')
        .addClass('active2')
        .siblings();
    }
}

function prevPage2() {
    var element = $('.flipped2').last();
    if(element.is(':last-child')){
        openBook2();
        $('.flipped2')
        .last()
        .removeClass('flipped2')
        .addClass('active2')
        .siblings('.page2')
        .removeClass('active2');
    } else if(element.is(':first-child')){
        closeBook2(true);
        $('.flipped2')
        .last()
        .removeClass('flipped2')
        .addClass('active2')
        .siblings('.page2')
        .removeClass('active2');
    } else {
        $('.flipped2')
        .last()
        .removeClass('flipped2')
        .addClass('active2')
        .siblings('.page2')
        .removeClass('active2');
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