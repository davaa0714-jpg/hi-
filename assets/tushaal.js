// tushaal

//year controller
$(document).ready(function(){
    const default_mode1 = 'tushaal23';
    let storedMode = sessionStorage.getItem('tushaalYear');
    if (!storedMode){
        sessionStorage.setItem('tushaalYear', default_mode1);
        // let_defValue = sessionStorage.getItem('item');
        $('.tushaal23').show()
        $('.tushaal22').hide()
        $('.2023').addClass('active-filter')
    } else if (storedMode == 'tushaal23'){
        $('.tushaal23').show()
        $('.tushaal22').hide()
        $('.2023').addClass('active-filter')
    } else {
        $('.tushaal23').hide()
        $('.tushaal22').show()
        $('.2022').addClass('active-filter')
    }
    
    $('.year-item').click(function(){
        const value1 = $(this).attr('data-filter')
        sessionStorage.setItem('tushaalYear', value1);
        let stored = sessionStorage.getItem('tushaalYear');
        if(stored == 'tushaal23'){
            $('.tushaal23').show()
            $('.tushaal22').hide()
        }
        else{
            $('.tushaal23').hide()
            $('.tushaal22').show()
        }
    })
    $('.year-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })
    

})

//sub controller
//tushaal23
$(document).ready(function(){
    const default_mode2 = 'tushaal-filter23';
    let storedMode = sessionStorage.getItem('tushaal23');
    if (!storedMode){
        sessionStorage.setItem('tushaal23', default_mode2);
        // let_defValue = sessionStorage.getItem('item');
        $('#a-tushaal23').show()
        $('#shiidver23').hide()
        $('.a-tushaal23').addClass('active-filter')
    } else if (storedMode == 'tushaal-filter23'){
        $('#a-tushaal23').show()
        $('#shiidver23').hide()
        $('.a-tushaal23').addClass('active-filter')
    } else {
        $('#a-tushaal23').hide()
        $('#shiidver23').show()
        $('.shiidver23').addClass('active-filter')
    }
    
    $('.23-item').click(function(){
        const value2 = $(this).attr('data-filter')
        sessionStorage.setItem('tushaal23', value2);
        let stored = sessionStorage.getItem('tushaal23');
        if(stored == 'tushaal-filter23'){
            $('#a-tushaal23').show()
            $('#shiidver23').hide()
        }
        else{
            $('#a-tushaal23').hide()
            $('#shiidver23').show()
        }
    })
    $('.23-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})

//tushaal22
$(document).ready(function(){
    const default_mode3 = 'tushaal-filter22';
    let storedMode = sessionStorage.getItem('tushaal22');
    if (!storedMode){
        sessionStorage.setItem('tushaal22', default_mode3);
        // let_defValue = sessionStorage.getItem('item');
        $('#a-tushaal22').show()
        $('#shiidver22').hide()
        $('.a-tushaal22').addClass('active-filter')
    } else if (storedMode == 'tushaal-filter22'){
        $('#a-tushaal22').show()
        $('#shiidver22').hide()
        $('.a-tushaal22').addClass('active-filter')
    } else {
        $('#a-tushaal22').hide()
        $('#shiidver22').show()
        $('.shiidver22').addClass('active-filter')
    }
    
    $('.22-item').click(function(){
        const value3 = $(this).attr('data-filter')
        sessionStorage.setItem('tushaal22', value3);
        let stored = sessionStorage.getItem('tushaal22');
        if(stored == 'tushaal-filter22'){
            $('#a-tushaal22').show()
            $('#shiidver22').hide()
        }
        else{
            $('#a-tushaal22').hide()
            $('#shiidver22').show()
        }
    })
    $('.22-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})



// $(document).ready(function() {
//     $('.tush').after('<div id="nav" class="pagination"></div>');
//     var rowsShown = 2
//     var rowsTotal = $('.tush .tushaal-box').length;
//     console.log(rowsTotal)
//     var numPages = rowsTotal / rowsShown;
//     for (i = 0; i < numPages; i++) {
//         var pageNum = i + 1;
//         $('#nav').append('<a href="#" class="pag-btn" rel="' + i + '">' + pageNum + '</a> ');
//     }
//     $('.tush .tushaal-box').hide();
//     $('.tush .tushaal-box').slice(0, rowsShown).show();
//     $('#nav a:first').addClass('active');
//     $('#nav a').bind('click', function(e) {
//         e.preventDefault();
//         $('#nav a').removeClass('active');
//         $(this).addClass('active');
//         var currPage = $(this).attr('rel');
//         var startItem = currPage * rowsShown;
//         var endItem = startItem + rowsShown;
//         $('.tush .tushaal-box').css('opacity', '0').hide().slice(startItem, endItem).
//         css('display', 'block').animate({
//         opacity: 1
//         }, 300);
//     });
// });