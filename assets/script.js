let slider = tns({
    container : ".my-slider",
    "slideBy" : "1",
    "speed" : 280,
    "nav" : false,
    
    controlsContainer: "#controls",
    prevButton: ".previous",
    nextButton: ".next",
    autoplay : true,
    autoplayHoverPause: false,
    // autoplayButton : "#controls",
    // controls : false,
    autoplayButtonOutput : false,
    responsive : {
        1600: {
            items : 4,
            gutter : 20, 
        },
        1024: {
            items : 3,
            gutter : 20,
        },
        768: {
            items : 2,
            gutter : 20,
        },
        480: {
            items : 1,
        }
        
    }
})


window.addEventListener("scroll", function(){
    var header = document.querySelector("#header");
    header.classList.toggle("sticky", window.scrollY > 200)
})


// faq
let toggles = document.getElementsByClassName('faq-link');
let contentDiv = document.getElementsByClassName('answer');
let icons = document.getElementsByClassName('icon');

console.log(toggles, contentDiv, icons);

for (let i=0; i<toggles.length; i++){
    toggles[i].addEventListener('click', ()=>{
        // console.log(contentDiv[i].style.height, contentDiv[i].scrollHeight + "px");
        if(parseInt(contentDiv[i].style.height)
        != contentDiv[i].scrollHeight){
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            icons[i].classList.remove('fa-plus');
            icons[i].classList.add('fa-minus');
        }
        else{
            contentDiv[i].style.height = "0px";
            icons[i].classList.remove('fa-minus');
            icons[i].classList.add('fa-plus');
        }

        for(let j=0; j<contentDiv.length; j++){
            if(j!==i){
                contentDiv[j].style.height = "0px";
                icons[j].classList.remove('fa-minus');
                icons[j].classList.add('fa-plus');
            }
        }
    });
}


const selectElement = (element) => document.querySelector(element);
selectElement('.nav-icon').addEventListener('click', () => {
    selectElement('nav').classList.toggle('active');
})

// filter

$(document).ready(function(){
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        if(value == 'structure-filter'){
            $('.structure').show()
            $('.timeline-container').hide()
        }
        else{
            $('.structure').hide()
            $('.timeline-container').show()
        }
    })
})